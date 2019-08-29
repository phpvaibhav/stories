<?php
defined('BASEPATH') OR exit('No direct script access allowed');
 
class Pdfset extends Common_Front_Controller {
 
    /**
     * load list modal 
     */
     function __Construct(){
       parent::__Construct();
			  $this->load->library('pdf');
     }
	
	function download(){
		 $jobId  = decoding($this->uri->segment(3));

      $where = array('jobId'=>$jobId);
      $this->load->model('jobs/job_model');
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
        $pdf->Cell(0, 12, 'JOBS DETAIL',0, 0, 'C');

        $pdf->Ln(5);
         $pdf->Ln(5);
      $pdf->Write(0, 'Date: '. date('m/d/Y') , '', 0, 'L', false, 0, true, false, 0);
     

      // Logged in username
    /*  $userName = "Admin";

      $pdf->Write(0, 'By: '.$userName, '', 0, 'R', true, 0, false, false, 0);*/
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
        $content .= '<table  border="0" cellspacing="1" cellpadding="4">';
        $content .= '<tr  bgcolor="#cccccc"><th align="left" colspan="2"><b>Basic Information</b></th></tr>';
        $content .= '<tr><td>
          <p><strong>Job Name</strong><span align="right" >&nbsp;&nbsp;'.$job['jobName'].'</span></p>
          <p><strong>Job Type</strong><span align="right" >&nbsp;&nbsp;&nbsp;&nbsp;'.$job['jobType'].'</span></p>
          <p><strong>Create Date Time</strong><span align="right" >&nbsp;&nbsp;'.date("d F Y",strtotime($job['startDate']))." ".$job['startTime'].'</span></p>
          <p><strong>Job Status</strong><span align="right" style="font-size: medium;">&nbsp;&nbsp;<b>'.$labelShow.'</b></span></p>
          </td><td>
          <p><span>&nbsp;&nbsp;<a>'.$job['address'].'</a></span></p>
          <p><strong>Customer Name</strong><span align="right" >&nbsp;&nbsp;'.$job['customerName'].'</span></p>
          <p><strong>Driver Name</strong><span align="right" >&nbsp;&nbsp;'.$job['driverName'].'</span></p>
          </td></tr>'; 
        if(!empty($job['jobReport'])):
            $reports  = json_decode($job['jobReport'],true);
          $before   = isset($reports['beforeWork']) ? $reports['beforeWork']:array();
          $after    = isset($reports['afterWork']) ? $reports['afterWork']:array();
          $content .= '<tr  bgcolor="#cccccc"><th align="left"><b>BEFORE WORK</b></th><th align="left"><b>AFTER WORK</b></th></tr>';
          $content .= '<tr>';
          if(!empty($before)):
          $content .='<td><p><strong>Job Start </strong><span align="right" >&nbsp;&nbsp;'.date("Y-m-d H:i A",strtotime($before['startDateTime'])).'</span></p><p><strong>Work image</strong></p><div>';
            for ($i=0; $i <sizeof($before['workImage']) ; $i++) {
              $image1 = S3JOBS_URL.$before['workImage'][$i];
              $content .= '<img src="'.$image1.'" alt="" width="95" height="95" border="0" />&nbsp;';
            }
          $content .='</div><p><strong>Comments </strong></p><p align="left" >&nbsp;&nbsp;'.$before['comments'].'</p><p align="right"><img src="'.S3JOBS_URL.$before['driverSignature'].'" alt="" width="90" height="90" border="0" /></p><p align="right">Driver Signature</p></td>';
         endif;  if(!empty($after)):
           $content .='<td><p><strong>Job End </strong><span align="right" >&nbsp;&nbsp;'.date("Y-m-d H:i A",strtotime($after['endDateTime'])).'</span></p><p><strong>Work image</strong></p><div>';
            for ($j=0; $j <sizeof($after['workImage']) ; $j++) {
              $image = S3JOBS_URL.$after['workImage'][$j];
              $content .= '<img src="'.$image.'" alt="" width="95" height="95" border="0" />&nbsp;';
            }
            $content .='</div><p><strong>Comments </strong></p><p align="left" >&nbsp;&nbsp;'.$after['comments'].'</p><p align="right"><img src="'.S3JOBS_URL.$after['customerSignature'].'" alt="" width="90" height="90" border="0" /></p><p align="right">Customer Signature</p></td>';
            endif;
            $content .='</tr>'; 
        endif;
        $content .='</table>';
  

       
        $pdf->writeHTML($content, true, false, true, false, '');
        // reset pointer to the last page
        $pdf->lastPage();
        $fileName = "cg-".$job['jobName'].strtotime(date("Y-m-d H:i:s")).".pdf";
       // $pdf->Output($fileName, 'I');
         $pdf->Output($fileName,'D');
        //$pdf->Output($fileName, 'I');
        ob_end_flush();
      //Close and output PDF document


      //============================================================+
      // END OF FILE
      //============================================================+
	
	}//ENd FUnction
	
}
?>
