<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Jobs extends Common_Back_Controller {

    public $data = "";

    function __construct() {
        parent::__construct();
        $this->check_admin_user_session();
       $this->load->library('pdf');
     
    }

    public function index() { 
        
        $data['title'] = 'Jobs';
        $count = $this->common_model->get_total_count('jobs');
        $data['recordSet'] = array('<li class="sparks-info"><h5>Job<span class="txt-color-blue"><a class="anchor-btn" data-toggle="modal" data-target="#addJob"><i class="fa fa-plus-square"></i></a></span></h5></li>','<li class="sparks-info"><h5>Jobs PDF<span class="txt-color-blue"><a class="anchor-btn" href="'.base_url().'jobs/jobPdf" target="_blank" ><i class="fa fa-file-pdf-o"></i></a></span></h5></li>','<li class="sparks-info"><h5>Total Jobs <span class="txt-color-darken" id="totalCust"><i class="fa fa-lg fa-fw fa fa-tasks"></i>&nbsp;'.$count.'</span></h5></li>');
        $data['jobTypes']        =  $this->common_model->getAll('jobType');
        $data['drivers']         =  $this->common_model->getAll('users',array('userType'=>2,'status'=>1));
        $data['customers']       =  $this->common_model->getAll('users',array('userType'=>1,'status'=>1));
        $this->load->admin_render('jobs', $data);
    } 
    public function jobDetail(){
      //pr('admin@admin.com');
        $jobId  = decoding($this->uri->segment(3));

        $data['title'] = "Job Detail";
         $data['recordSet'] = array('<li class="sparks-info"><h5>Job Report<span class="txt-color-blue"><a class="anchor-btn" href="'.base_url().'jobs/jobDetailPdf/'.$this->uri->segment(3).'" target="_blank" ><i class="fa fa-file-pdf-o"></i></a></span></h5></li>');
        $where = array('jobId'=>$jobId);
        $this->load->model('job_model');
        $data['job'] = $this->job_model->jobDetail($jobId);
        $data['jobTypes']        =  $this->common_model->getAll('jobType');
        $data['drivers']         =  $this->common_model->getAll('users',array('userType'=>2,'status'=>1));
        $data['customers']       =  $this->common_model->getAll('users',array('userType'=>1,'status'=>1));
       
        $this->load->admin_render('jobDetail', $data, '');
    } //end function
    public function jobPdf()
   {

    ob_start();
    // create new PDF document

        $pdf = new TCPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);

      // set document information
      $pdf->SetCreator(PDF_CREATOR);
      $pdf->SetAuthor('Job Services');
      $pdf->SetTitle('Job Information');
      $pdf->SetSubject('Job Services');
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
        $pdf->Cell(0, 12, 'JOBS',0, 0, 'C');

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
             
                <th width="20%">Job Name</th>
                <th  width="15%">Job Type</th>
                <th width="15%">Customer</th>
                <th  width="15%">Driver</th>
                <th  width="20%">Start Date Time</th>
                <th  width="15%">Status</th>
                </tr>';
            //$content .= $this->fetch_employeePdf_info();
          $content .= '</table>';
       $this->load->model('job_model');
       $jobs = $this->job_model->assignJobs();

       foreach ($jobs as $k => $job) {
        if($k++%2 == 1){
             $colr = "background-color:#f1f1f1;";
         }else{
            $colr = "background-color:#fff;";
         }
                    
           $content .='<tr nobr="true" style="color:#000; '.$colr.'">';
           $content .='<td>'.$job->jobName.'</td>';
           $content .='<td>'.$job->jobType.'</td>';
           $content .='<td>'.$job->customerName.'</td>';
           $content .='<td>'.$job->driverName.'</td>';
           $content .='<td>'.date("d/m/Y",strtotime($job->startDate))." ".$job->startTime.'</td>';
            $content .='<td>'.'<span style="color:green;">'.$job->statusShow.'</span>'.'</td>';
          
           $content .='</tr>';
       }

        $content .='</table>';
        $pdf->writeHTML($content, true, false, true, false, '');
        // reset pointer to the last page
        $pdf->lastPage();
        $fileName = "job-".strtotime(date("Y-m-d H:i:s")).".pdf";
        $pdf->Output($fileName, 'I');
        ob_end_flush();
      //Close and output PDF document


      //============================================================+
      // END OF FILE
      //============================================================+
   }
   // End job PFD  
    public function jobDetailPdf()
   {
      $jobId  = decoding($this->uri->segment(3));

      $where = array('jobId'=>$jobId);
      $this->load->model('job_model');
      $job = $this->job_model->jobDetail($jobId);
      ob_start();
      // create new PDF document

        $pdf = new TCPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);

      // set document information
      $pdf->SetCreator(PDF_CREATOR);
      $pdf->SetAuthor('Job Detail');
      $pdf->SetTitle('Job Information');
      $pdf->SetSubject('Job Services');
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
        $pdf->Cell(0, 12, 'JOB DETAIL',0, 0, 'C');

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
      $showbtn = false;
                $labelShow ="";
                switch ($job['jobStatus']) {
                  case 0:
                    $labelShow ='<label color="red">Open</label>';
                    break;
                  case 1:
                    $labelShow ='<label color="blue">In Progress</label>';
                    break;
                  case 2:
                  
                    $labelShow ='<label color="green">Completed</label>';
                    break;
                  
                  default:
                    break;
                }
     
       // $content .= '<table bgcolor="#cccccc" border="0" cellspacing="1" cellpadding="4">';
        $content .= '<table  border="0" cellspacing="1" cellpadding="4" bgcolor="#EAECF0">';
        $content .= '<tr  bgcolor="#cccccc"><th align="left" colspan="4"><b>Basic Information</b></th></tr>';
        $content .= '<tr bgcolor="#EAECF0">';
        $content .= '<td><strong>Job Name</strong> :</td><td>'.$job['jobName'].'</td>';
        $content .= '<td><strong>Job Type</strong> :</td><td>'.$job['jobType'].'</td>';
        $content .= '</tr>';  
        $content .= '<tr bgcolor="#EAECF0">';
        $content .= '<td><strong>Job Status</strong> :</td><td><span style="font-size: medium;"><b>'.$labelShow.'</b></span></td>';
        $content .= '<td><strong>Creation Date</strong> :</td><td>'.date("d F Y",strtotime($job['startDate']))." ".$job['startTime'].'</td>';
        $content .= '</tr>';   
        $content .= '<tr bgcolor="#EAECF0">';
        $content .= '<td><strong>Customer Name</strong> :</td><td>'.$job['customerName'].'</td>';
        $content .= '<td><strong>Driver Name</strong> :</td><td>'.$job['driverName'].'</td>'; 
        $content .= '</tr>';
        $content .= '<tr bgcolor="#EAECF0">';
        $content .= '<td><strong>Address</strong> :</td><td colspan="3">'.$job['address'].'</td>';
        $content .= '</tr>';
         $content .= '</table>';
         $content .= '<table  border="0" cellspacing="1" cellpadding="4">';
        $content .= '<tr  bgcolor="#cccccc"><th align="left" colspan="2"><b>BEFORE WORK</b></th><th align="left" colspan="2"><b>AFTER WORK</b></th></tr>';
        $content .= '<tr>';
        if(!empty($job['jobReport'])):
            $reports  = json_decode($job['jobReport'],true);
          $before   = isset($reports['beforeWork']) ? $reports['beforeWork']:array();
          $after    = isset($reports['afterWork']) ? $reports['afterWork']:array();
          
          
          if(!empty($before)):
          $content .='<td colspan="2"><p><strong>Job Start </strong><span align="right" >&nbsp;&nbsp;'.date("Y-m-d H:i A",strtotime($before['startDateTime'])).'</span></p><p><strong>Work image</strong></p><div>';
            for ($i=0; $i <sizeof($before['workImage']) ; $i++) {
              $image1 = S3JOBS_URL.$before['workImage'][$i];
              $content .= '<img src="'.$image1.'" alt="" width="95" height="95" border="0" />&nbsp;';
            }
          $content .='</div><p><strong>Comments </strong></p><p align="left" >&nbsp;&nbsp;'.$before['comments'].'</p><p align="right"><img src="'.S3JOBS_URL.$before['driverSignature'].'" alt="" width="90" height="90" border="0" /></p><p align="right">Driver Signature</p></td>';
           else:
             $content .='<td colspan="2" align="center"> No record found</td>';
         endif;  if(!empty($after)):
           $content .='<td colspan="2"><p><strong>Job End </strong><span align="right" >&nbsp;&nbsp;'.date("Y-m-d H:i A",strtotime($after['endDateTime'])).'</span></p><p><strong>Work image</strong></p><div>';
            for ($j=0; $j <sizeof($after['workImage']) ; $j++) {
              $image = S3JOBS_URL.$after['workImage'][$j];
              $content .= '<img src="'.$image.'" alt="" width="95" height="95" border="0" />&nbsp;';
            }
            $content .='</div><p><strong>Comments </strong></p><p align="left" >&nbsp;&nbsp;'.$after['comments'].'</p><p align="right"><img src="'.S3JOBS_URL.$after['customerSignature'].'" alt="" width="90" height="90" border="0" /></p><p align="right">Customer Signature</p></td>';
             else:
             $content .='<td colspan="2" align="center"> No record found</td>';
            endif;
           
        else:
            $content .='<td colspan="4" align="center"> No record found</td>';
           
        endif;
         $content .='</tr>'; 
        $content .='</table>';
  

       
        $pdf->writeHTML($content, true, false, true, false, '');
        // reset pointer to the last page
        $pdf->lastPage();
        $fileName = "cg-".$job['jobName'].strtotime(date("Y-m-d H:i:s")).".pdf";
       // $pdf->Output($fileName, 'I');
        // $pdf->Output($fileName,'D');
        $pdf->Output($fileName, 'I');
        ob_end_flush();
      //Close and output PDF document


      //============================================================+
      // END OF FILE
      //============================================================+
   }
   // End job PFD 
 
}