<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
//General service API class 
class Jobs extends Common_Admin_Controller{
    
    public function __construct(){
        parent::__construct();
        $this->check_admin_service_auth();
    }
    public function createJob_post(){
       
        $this->form_validation->set_rules('jobName', 'job name', 'trim|required');
        $this->form_validation->set_rules('jobTypeId', 'jobType', 'trim|required');
        $this->form_validation->set_rules('driverId', 'driver name', 'trim|required');
        $this->form_validation->set_rules('customerId', 'customer name', 'trim|required');
        $this->form_validation->set_rules('startDate', 'startDate', 'trim|required');
        $this->form_validation->set_rules('startTime', 'startTime', 'trim|required');
        $this->form_validation->set_rules('address', 'address', 'trim|required');
          $this->form_validation->set_rules('latitude', 'latitude', 'trim|required|min_length[2]|callback_validate_address');
        if($this->form_validation->run() == FALSE){
            $response = array('status' => FAIL, 'message' => strip_tags(validation_errors()));
            
        }
        else{
      
                $data_val['jobName']       = $this->post('jobName');
                $data_val['jobTypeId']     = $this->post('jobTypeId');
                $data_val['driverId']      = $this->post('driverId');
                $data_val['customerId']    = $this->post('customerId');
                $data_val['startDate']     = date("Y-m-d",strtotime($this->post('startDate')));
                $data_val['startTime']      = $this->post('startTime');
               
                $data_val['address']               = $this->post('address');
                $data_val['street']                = $this->post('street');
                $data_val['street2']               = $this->post('street2');
                $data_val['city']                  = $this->post('city');
                $data_val['state']                 = $this->post('state');
                $data_val['zip']                   = $this->post('zip');
                $data_val['country']               = $this->post('country');
                $data_val['latitude']              = $this->post('latitude');
                $data_val['longitude']             = $this->post('longitude');
               
                $jobId  = decoding($this->post('jobId'));

                $where = array('jobId'=>$jobId);
                $isExist=$this->common_model->is_data_exists('jobs',$where);
                if($isExist){
                    $result = $this->common_model->updateFields('jobs',$data_val,$where);
                    $msg = "Job record updated successfully.";
                }else{
                    $result = $this->common_model->insertData('jobs',$data_val);
                    
                    $msg = "Job created successfully.";
                }
                //$jobId = $this->common_model->insertData('jobs',$data_val);
                if($result){
                 
                     $response = array('status'=>SUCCESS,'message'=>$msg);
                }else{
                     $response = array('status'=>FAIL,'message'=>ResponseMessages::getStatusCodeMessage(118));
                } 
              
               
           
        }
        $this->response($response);
    }//end function
 
    public function jobList_post(){
        $this->load->helper('text');
        $this->load->model('job_model');
        $this->job_model->set_data();
        $list = $this->job_model->get_list();
        
        $data = array();
        $no = $_POST['start'];
        foreach ($list as $serData) { 
        $action ='';
        $no++;
        $row = array();
        $row[] = $no;
        //$row[] = '<img src='.base_url($serData->profileImage).' alt="user profile" style="height:50px;width:50px;" >';
        $row[] = display_placeholder_text($serData->jobName); 
        $row[] = display_placeholder_text($serData->jobType); 
        $row[] = display_placeholder_text($serData->customerName); 
        $row[] = display_placeholder_text($serData->driverName); 
        $row[] = date("d/m/Y",strtotime($serData->startDate))." ".display_placeholder_text($serData->startTime); 
        switch ($serData->jobStatus) {
            case 2:
               $row[] = '<label class="label label-success">'.$serData->statusShow.'</label>';
                break;
            case 1:
               $row[] = '<label class="label label-danger">'.$serData->statusShow.'</label>';
                break;
            case 0:
               $row[] = '<label class="label label-warning">'.$serData->statusShow.'</label>';
                break;
            
            default:
                  $row[] = '<label class="label label-warning">'.$serData->statusShow.'</label>';
                break;
        }
       
            $link  ='javascript:void(0)';
            $action .= "";
       
        $userLink = base_url().'jobs/jobDetail/'.encoding($serData->jobId);
       // $userLink = "javascript:void(0);";
        $action .= '&nbsp;&nbsp;<a href="'.$userLink.'"  class="on-default edit-row table_action" title="Detail"><i class="fa fa-eye" aria-hidden="true"></i></a>&nbsp;&nbsp;|';
          $pdfLink = base_url().'jobs/jobDetailPdf/'.encoding($serData->jobId);
        $action .= '&nbsp;&nbsp;<a href="'.$pdfLink.'"  class="on-default edit-row table_action" title="Pdf Download" target="_blank"><i class="fa fa-file-pdf-o" aria-hidden="true"></i></a>';

            

        $row[] = $action;
        $data[] = $row;

        }

        $output = array(
            "draw" => $_POST['draw'],
            "recordsTotal" => $this->job_model->count_all(),
            "recordsFiltered" => $this->job_model->count_filtered(),
            "data" => $data,
        );
        //output to json format
       
        $this->response($output);
    }//end function 
     public function customnerjobList_post(){
        $this->load->helper('text');
        $this->load->model('job_model');
        $this->job_model->set_data(array('j.customerId'=>$this->post('id')));
        $list = $this->job_model->get_list();
        
        $data = array();
        $no = $_POST['start'];
        foreach ($list as $serData) { 
        $action ='';
        $no++;
        $row = array();
        $row[] = $no;
        //$row[] = '<img src='.base_url($serData->profileImage).' alt="user profile" style="height:50px;width:50px;" >';
        $row[] = display_placeholder_text($serData->jobName); 
        $row[] = display_placeholder_text($serData->jobType); 
        $row[] = display_placeholder_text($serData->customerName); 
        $row[] = display_placeholder_text($serData->driverName); 
        $row[] = date("d/m/Y",strtotime($serData->startDate))." ".display_placeholder_text($serData->startTime); 
        switch ($serData->jobStatus) {
            case 2:
               $row[] = '<label class="label label-success">'.$serData->statusShow.'</label>';
                break;
            case 1:
               $row[] = '<label class="label label-danger">'.$serData->statusShow.'</label>';
                break;
            case 0:
               $row[] = '<label class="label label-warning">'.$serData->statusShow.'</label>';
                break;
            
            default:
                  $row[] = '<label class="label label-warning">'.$serData->statusShow.'</label>';
                break;
        }
       
            $link  ='javascript:void(0)';
            $action .= "";
       
        $userLink = base_url().'jobs/jobDetail/'.encoding($serData->jobId);
       // $userLink = "javascript:void(0);";
        $action .= '&nbsp;<a href="'.$userLink.'"  class="on-default edit-row table_action" title="Detail"><i class="fa fa-eye" aria-hidden="true"></i></a>&nbsp;';
                 $pdfLink = base_url().'jobs/jobDetailPdf/'.encoding($serData->jobId);
        $action .= '&nbsp;<a href="'.$pdfLink.'"  class="on-default edit-row table_action" title="Pdf Download" target="_blank"><i class="fa fa-file-pdf-o" aria-hidden="true"></i></a>';
            

        $row[] = $action;
        $data[] = $row;

        }

        $output = array(
            "draw" => $_POST['draw'],
            "recordsTotal" => $this->job_model->count_all(),
            "recordsFiltered" => $this->job_model->count_filtered(),
            "data" => $data,
        );
        //output to json format
       
        $this->response($output);
    }//end function 
       public function driverjobList_post(){
        $this->load->helper('text');
        $this->load->model('job_model');
        $this->job_model->set_data(array('j.driverId'=>$this->post('id')));
        $list = $this->job_model->get_list();
       
        $data = array();
        $no = $_POST['start'];
        foreach ($list as $serData) { 
        $action ='';
        $no++;
        $row = array();
        $row[] = $no;
        //$row[] = '<img src='.base_url($serData->profileImage).' alt="user profile" style="height:50px;width:50px;" >';
        $row[] = display_placeholder_text($serData->jobName); 
        $row[] = display_placeholder_text($serData->jobType); 
        $row[] = display_placeholder_text($serData->customerName); 
        $row[] = display_placeholder_text($serData->driverName); 
        $row[] = date("d/m/Y",strtotime($serData->startDate))." ".display_placeholder_text($serData->startTime); 
        switch ($serData->jobStatus) {
            case 2:
               $row[] = '<label class="label label-success">'.$serData->statusShow.'</label>';
                break;
            case 1:
               $row[] = '<label class="label label-danger">'.$serData->statusShow.'</label>';
                break;
            case 0:
               $row[] = '<label class="label label-warning">'.$serData->statusShow.'</label>';
                break;
            
            default:
                  $row[] = '<label class="label label-warning">'.$serData->statusShow.'</label>';
                break;
        }
       
            $link  ='javascript:void(0)';
            $action .= "";
       
        $userLink = base_url().'jobs/jobDetail/'.encoding($serData->jobId);
       // $userLink = "javascript:void(0);";
        $action .= '<a href="'.$userLink.'"  class="on-default edit-row table_action" title="Detail"><i class="fa fa-eye" aria-hidden="true"></i></a>&nbsp;';
                    $pdfLink = base_url().'jobs/jobDetailPdf/'.encoding($serData->jobId);
        $action .= '&nbsp;<a href="'.$pdfLink.'"  class="on-default edit-row table_action" title="Pdf Download" target="_blank"><i class="fa fa-file-pdf-o" aria-hidden="true"></i></a>';
            

        $row[] = $action;
        $data[] = $row;

        }

        $output = array(
            "draw" => $_POST['draw'],
            "recordsTotal" => $this->job_model->count_all(),
            "recordsFiltered" => $this->job_model->count_filtered(),
            "data" => $data,
        );
        //output to json format
       
        $this->response($output);
    }//end function 
    function jobStatus_post(){
        $jobId  = decoding($this->post('use'));
        $status  =$this->post('status');
    
        $where = array('jobId'=>$jobId);
         $dataExist=$this->common_model->is_data_exists('jobs',$where);
        if($dataExist){
           
             $dataExist=$this->common_model->updateFields('jobs',array('jobStatus'=>$status),$where);
              $showmsg  =($status==2)? "Job has been manually completed successfully." : "Job has been manually  started successfully.";
                $response = array('status'=>SUCCESS,'message'=>$showmsg);
        }else{
           $response = array('status'=>FAIL,'message'=>ResponseMessages::getStatusCodeMessage(118));  
        }
        $this->response($response);
    }//end function
    function jobDelete_post(){
        $jobId  = decoding($this->post('use'));
     
    
        $where = array('jobId'=>$jobId);
         $dataExist=$this->common_model->is_data_exists('jobs',$where);
        if($dataExist){
           
             $dataExist=$this->common_model->deleteData('jobs',$where);
              $showmsg  ="Job has been deleted successfully.";
                $response = array('status'=>SUCCESS,'message'=>$showmsg);
        }else{
           $response = array('status'=>FAIL,'message'=>ResponseMessages::getStatusCodeMessage(118));  
        }
        $this->response($response);
    }//end function
        function validate_address($str)
    {
        if(!empty($str)){
            return true;
        }else{
          $this->form_validation->set_message('validate_address','Please enter valid google place address.');
        return false;  
        }
        
    }
    

}//End Class 

