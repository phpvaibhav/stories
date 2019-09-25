<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Customers extends Common_Back_Controller {

    public $data = "";

    function __construct() {
        parent::__construct();
        $this->check_admin_user_session();
        $this->load->library('pdf');
     
    }

    public function index() { 
        
        $data['title'] = 'Customers';
        $count = $this->common_model->get_total_count('users',array('userType' =>1));
        $data['recordSet'] = array('<li class="sparks-info"><h5>Customer<span class="txt-color-blue"><a class="anchor-btn" data-toggle="modal" data-target="#addCustomers"><i class="fa fa-plus-square"></i></a></span></h5></li>','<li class="sparks-info"><h5>Customers PDF<span class="txt-color-blue"><a class="anchor-btn" href="'.base_url().'customers/customersPdf" target="_blank" ><i class="fa fa-file-pdf-o"></i></a></span></h5></li>','<li class="sparks-info"><h5>Total Customers <span class="txt-color-darken" id="totalCust"><i class="fa fa-lg fa-fw fa fa-users"></i>&nbsp;'.$count.'</span></h5></li>');
         $data['front_scripts'] = array('backend_assets/custom/js/customer.js');
        $this->load->admin_render('customers', $data);
    } 
    public function customerDetail(){
      //pr('admin@admin.com');
        $userId  = decoding($this->uri->segment(3));
           $data['recordSet'] = array('<li class="sparks-info"><h5>Customer PDF<span class="txt-color-blue"><a class="anchor-btn" href="'.base_url().'customers/customersDetailPdf/'.$this->uri->segment(3).'" target="_blank" ><i class="fa fa-file-pdf-o"></i></a></span></h5></li>');

        $data['title'] = "Customer Detail";
        $where = array('id'=>$userId);
        $result = $this->common_model->getsingle('users',$where);
        $data['customer'] = $result;
        $data['customermeta'] =$this->common_model->getsingle('customerMeta',array('userId' =>$result['id']));
        $this->load->admin_render('customerDetail', $data, '');
    } //end function
     public function customersPdf()
   {

    ob_start();
    // create new PDF document
        $pdf = new TCPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);

      // set document information
      $pdf->SetCreator(PDF_CREATOR);
      $pdf->SetAuthor('CGRobinsons');
      $pdf->SetTitle('Customer Information');
      $pdf->SetSubject('CGRobinsons');
      $pdf->SetKeywords('CGRobinsons');

      // set default header data
      //$pdf->SetHeaderData(PDF_HEADER_LOGO, PDF_HEADER_LOGO_WIDTH, PDF_HEADER_TITLE.'', PDF_HEADER_STRING);
      //$pdf->SetHeaderData(PDF_HEADER_LOGO, PDF_HEADER_LOGO_WIDTH);
        $pdf->SetHeaderData(PDF_HEADER_LOGO, PDF_HEADER_LOGO_WIDTH, PDF_HEADER_TITLE.'', PDF_HEADER_STRING);
      // set header and footer fonts
      $pdf->setHeaderFont(Array(PDF_FONT_NAME_MAIN, '', PDF_FONT_SIZE_MAIN));
      $pdf->setFooterFont(Array(PDF_FONT_NAME_DATA, '', PDF_FONT_SIZE_DATA));

      // set default monospaced font
      $pdf->SetDefaultMonospacedFont(PDF_FONT_MONOSPACED);

      // set margins
      $pdf->SetMargins(PDF_MARGIN_LEFT, PDF_MARGIN_TOP, PDF_MARGIN_RIGHT);
      $pdf->SetHeaderMargin(PDF_MARGIN_HEADER);
      $pdf->SetFooterMargin(PDF_MARGIN_FOOTER);

      // set auto page breaks
      $pdf->SetAutoPageBreak(TRUE, PDF_MARGIN_BOTTOM);

      // set image scale factor
      $pdf->setImageScale(PDF_IMAGE_SCALE_RATIO);

      // set some language-dependent strings (optional)
      if (@file_exists(dirname(__FILE__).'/lang/eng.php')) {
         require_once(dirname(__FILE__).'/lang/eng.php');
         $pdf->setLanguageArray($l);
      }
      // ---------------------------------------------------------

      // set font
      $pdf->SetFont('helvetica', 'N', 10);

      // add a page
      $pdf->AddPage();
        // print a line
        $pdf->Cell(0, 12, 'CUSTOMERS',0, 0, 'C');

        $pdf->Ln(5);
         $pdf->Ln(5);
      $pdf->Write(0, 'Date: '. date('m/d/Y') , '', 0, 'L', false, 0, true, false, 0);
     

      // Logged in username
     $userName = $_SESSION[ADMIN_USER_SESS_KEY]['fullName'];


      $pdf->Write(0, 'By: '.$userName, '', 0, 'R', true, 0, false, false, 0);
        $pdf->Ln(5);
       
      $pdf->SetFont('helvetica', '', 9);
      // -----------------------------------------------------------------------------
      $content = '';
      
     
        $content .= '
            
            <table border="0" cellspacing="1" cellpadding="4">
                <tr style="background-color:#707070;color:#FFFFFF;"  nobr="true">
                <th>Customer Name</th>
                <th>Email</th>
                <th>Contact Number</th>
                
                </tr>';
            //$content .= $this->fetch_employeePdf_info();
          $content .= '</table>';
      
          $users =  $this->common_model->getAll('users',array('userType'=>1),'id','desc');

       foreach ($users as $k => $user) {
        if($k++%2 == 1){
             $colr = "background-color:#f1f1f1!important;";
         }else{
            $colr = "background-color:#fff!important;;";
         }
                    
           $content .='<tr nobr="true" style="color:#000; '.$colr.'">';
           $content .='<td>'.$user->fullName.'</td>';
           $content .='<td>'.$user->email.'</td>';
           $content .='<td>'.$user->contactNumber.'</td>';
       
          
           $content .='</tr>';
       }

        $content .='</table>';
        $pdf->writeHTML($content, true, false, true, false, '');
        // reset pointer to the last page
        $pdf->lastPage();
        $fileName = "customers-".strtotime(date("Y-m-d H:i:s")).".pdf";
        $pdf->Output($fileName, 'I');
        ob_end_flush();
      //Close and output PDF document


      //============================================================+
      // END OF FILE
      //============================================================+
   }
   // End job PFD 
  function customersDetailPdf(){
       $userId  = decoding($this->uri->segment(3));
       $where = array('id'=>$userId);
      $customer = $this->common_model->getsingle('users',$where);
     
      $customermeta =$this->common_model->getsingle('customerMeta',array('userId' =>$customer['id']));
        $this->load->model('jobs/job_model');
       $jobs = $this->job_model->assignJobs(array('j.customerId'=>$userId));
       ob_start();
      // create new PDF document

      $pdf = new TCPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);

      // set document information
      $pdf->SetCreator(PDF_CREATOR);
      $pdf->SetAuthor('Customer Detail');
      $pdf->SetTitle('Customer Information');
      $pdf->SetSubject('Customer Services');
      $pdf->SetKeywords('CGRobinsons');

      // set default header data
      //$pdf->SetHeaderData(PDF_HEADER_LOGO, PDF_HEADER_LOGO_WIDTH, PDF_HEADER_TITLE.'', PDF_HEADER_STRING);
      //$pdf->SetHeaderData(PDF_HEADER_LOGO, PDF_HEADER_LOGO_WIDTH);
        $pdf->SetHeaderData(PDF_HEADER_LOGO, PDF_HEADER_LOGO_WIDTH, PDF_HEADER_TITLE.'', PDF_HEADER_STRING);
      // set header and footer fonts
      $pdf->setHeaderFont(Array(PDF_FONT_NAME_MAIN, '', PDF_FONT_SIZE_MAIN));
      $pdf->setFooterFont(Array(PDF_FONT_NAME_DATA, '', PDF_FONT_SIZE_DATA));

      // set default monospaced font
      $pdf->SetDefaultMonospacedFont(PDF_FONT_MONOSPACED);

      // set margins
      $pdf->SetMargins(PDF_MARGIN_LEFT, PDF_MARGIN_TOP, PDF_MARGIN_RIGHT);
      $pdf->SetHeaderMargin(PDF_MARGIN_HEADER);
      $pdf->SetFooterMargin(PDF_MARGIN_FOOTER);

      // set auto page breaks
      $pdf->SetAutoPageBreak(TRUE, PDF_MARGIN_BOTTOM);

      // set image scale factor
      $pdf->setImageScale(PDF_IMAGE_SCALE_RATIO);

      // set some language-dependent strings (optional)
      if (@file_exists(dirname(__FILE__).'/lang/eng.php')) {
         require_once(dirname(__FILE__).'/lang/eng.php');
         $pdf->setLanguageArray($l);
      }
      // ---------------------------------------------------------

      // set font
      $pdf->SetFont('helvetica', 'N', 10);

      // add a page
      $pdf->AddPage();
        // print a line
        $pdf->Cell(0, 12, 'CUSTOMER DETAIL',0, 0, 'C');

        $pdf->Ln(5);
         $pdf->Ln(5);
      $pdf->Write(0, 'Date: '. date('m/d/Y') , '', 0, 'L', false, 0, true, false, 0);
     

      // Logged in username
     $userName = $_SESSION[ADMIN_USER_SESS_KEY]['fullName'];

      $pdf->Write(0, 'By: '.$userName, '', 0, 'R', true, 0, false, false, 0);
        $pdf->Ln(5);
       
      $pdf->SetFont('helvetica', '', 9);
      // -----------------------------------------------------------------------------
      $content = '';

       // $content .= '<table bgcolor="#cccccc" border="0" cellspacing="1" cellpadding="4">';
        $content .= '<table  border="0" cellspacing="1" cellpadding="4" bgcolor="#EAECF0">';
        $content .= '<tr  bgcolor="#cccccc"><th align="left" colspan="4"><b>Customer Information</b></th></tr>';
          $content .= '<tr >';
          $content .= '<td><strong>Customer Name</strong> :</td><td>'.$customer['fullName'].'</td>';
          $content .= '<td><strong>Credit Hold</strong> :</td><td>'.($customermeta['creditHoldStatus'] ?'Yes' :'No').'</td>';
          $content .= '</tr>';
          $content .= '<tr>';
          $content .= '<td><strong>Email</strong> :</td><td>'.$customer['email'].'</td>';
          $content .= '<td><strong>Contact Number</strong> :</td><td>'.$customer['contactNumber'].'</td>';
          $content .= '</tr>';
          $content .= '<tr>';
          $content .= '<td><strong>Address</strong> :</td><td colspan="3">'.$customermeta['address'].'</td>';
          $content .= '</tr>';
          $content .= '<tr>';
          $content .= '<td><strong>Billing Address</strong> :</td><td colspan="3">'.$customermeta['billAddress'].'</td>';
          $content .= '</tr>';
        $content .='</table>';
         $content .= '<table  border="0" cellspacing="1" cellpadding="4">';
        $content .= '<tr  bgcolor="#cccccc"><th align="left" colspan="7"><b>Customer Jobs</b></th></tr>';
        $content .= '<tr  bgcolor="#EAECF0"><th width="5%"><b>#</b></th><th><b>Job Name</b></th><th><b>Job Type</b></th><th><b>Customer</b></th><th><b>Driver</b></th><th width="23.5%"><b>Creation Date</b></th><th><b>Status</b></th></tr>';
        if(!empty($jobs)):
          for ($i=0; $i <sizeof($jobs) ; $i++) { 
             $content .= '<tr>';
              $content .= '<td>'.($i+1).'</td>';
              $content .= '<td>'.$jobs[$i]->jobName.'</td>';
              $content .= '<td>'.$jobs[$i]->jobType.'</td>';
              $content .= '<td>'.$jobs[$i]->customerName.'</td>';
              $content .= '<td>'.$jobs[$i]->driverName.'</td>';
              $content .= '<td>'.date("d/m/Y",strtotime($jobs[$i]->startDate))." ".$jobs[$i]->startTime.'</td>';
           
              $content .= '<td><span style="color:green;">'.$jobs[$i]->statusShow.'</span></td>';
              $content .= '</tr>';
          }
        else :
            $content .= '<tr>';
              $content .= '<td colspan="7"><p align="center">No record found</p></td>';
            $content .= '</tr>';
        endif;


        $content .='</table>';
  

       
        $pdf->writeHTML($content, true, false, true, false, '');
        // reset pointer to the last page
        $pdf->lastPage();
        $fileName = "cg-".$customer['fullName'].strtotime(date("Y-m-d H:i:s")).".pdf";
       // $pdf->Output($fileName, 'I');
        // $pdf->Output($fileName,'D');
        $pdf->Output($fileName, 'I');
        ob_end_flush();
      //Close and output PDF document


      //============================================================+
      // END OF FILE
      //============================================================+
  }//end function
}//end Class