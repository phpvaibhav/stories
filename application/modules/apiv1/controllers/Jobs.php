<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
//General service API class 
class Jobs extends Common_Service_Controller{
    
    public function __construct(){
        parent::__construct();
        $this->check_service_auth();
        $this->load->model('job_model'); //load image model
    }

    function assignJobs_get(){
        $authCheck  = $this->check_service_auth();
        $authToken  = $this->authData->authToken;
        $userId     = $this->authData->id;
        $userType   = $this->authData->userType;
        $authtoken  = $this->api_model->generate_token();
        switch ($userType) {
            case 1:
             $where =  array('j.customerId'=> $userId);
                break;
            case 2:
              $where =  array('j.driverId'=> $userId);
                break;
            
            default:
                $where =  array();
                break;
        }
        $jobs = $this->job_model->assignJobs($where);
        if(is_array($jobs)){
            $response = array('status' => SUCCESS, 'message' => ResponseMessages::getStatusCodeMessage(114), 'jobs' =>$jobs);
                
        }else{
            $response = array('status' => FAIL, 'message' => ResponseMessages::getStatusCodeMessage(127),'jobs'=>array());
        }   
        $this->response($response);    
    } //End Function    
    function jobDetail_post(){
        $authCheck  = $this->check_service_auth();
        $authToken  = $this->authData->authToken;
        $userId     = $this->authData->id;
        $userType   = $this->authData->userType;
        $authtoken  = $this->api_model->generate_token();
       $this->form_validation->set_rules('jobId', 'jobId', 'trim|required');
        if($this->form_validation->run() == FALSE){
            $response = array('status' => FAIL, 'message' => strip_tags(validation_errors()));
           
        }
        else{
            $jobId = $this->post('jobId');
            $jobs = $this->job_model->jobDetail($jobId);
            if($jobs){
                $response = array('status' => SUCCESS, 'message' => ResponseMessages::getStatusCodeMessage(114), 'jobs' =>$jobs);

            }else{
                $response = array('status' => FAIL, 'message' => ResponseMessages::getStatusCodeMessage(127),'jobs'=>new stdClass());
            } 
        }
        $this->response($response);    
    } //End Function
    function jobActivity_post(){
        $this->form_validation->set_rules('jobId', 'jobId', 'trim|required');
        $this->form_validation->set_rules('jobDateTime', 'jobDateTime', 'trim|required');
        $this->form_validation->set_rules('jobStatus', 'job status', 'trim|required');
        if (empty($_FILES['signature']['name'])) {
            $this->form_validation->set_rules('signature', 'signature image', 'trim|required');
        }
        if (empty($_FILES['workImage']['name'])) {
            $this->form_validation->set_rules('workImage', 'work image', 'trim|required');
        }
        if($this->form_validation->run() == FALSE){
            $response = array('status' => FAIL, 'message' => strip_tags(validation_errors()));
       
        }else{
            $filesCount = sizeof($_FILES['workImage']['name']);
          //   pr($_FILES['workImage']['name']);
              if($filesCount>3){
                $response = array('status' => FAIL, 'message' =>"work image max 3 image upload.");
                 $this->response($response);  
            }
            $data_val = array();
            $jobId                  = $this->post('jobId');
            $where   = array('jobId'=>$jobId);
            $isExist = $this->common_model->is_data_exists('jobs',$where);
            if($isExist){
                if($isExist->jobStatus==2){
                     $response = array('status' => FAIL, 'message' =>"job already completed.");
                }else{
                    $jobReport = $isExist->jobReport;
                    $report = !empty($jobReport) ? json_decode( $jobReport,true):array();
                    $jobStatus                  = $this->post('jobStatus');
                    $jobDateTime                  =  date("Y-m-d h:i:s A",strtotime($this->post('jobDateTime')));;
                    switch ($jobStatus) {
                        case 'start':
                            $res=1;
                            $jobActivity = 1;
                            $data_val['startDateTime']    = $jobDateTime;
                            break;
                        case 'end':
                            $res=1;
                            $jobActivity = 2;
                            $data_val['endDateTime']    = $jobDateTime;
                            break;
                        
                        default:
                             $res=0;
                            break;
                    }
                    $data_val['comments']       = $this->post('comments');
                    if($res){
                        $this->load->library('s3');
                        $this->load->model('s3_model');
                        $uploadFor = "jobs";
                      for ($i=0; $i <$filesCount ; $i++) { 
                            $name = $_FILES['workImage']['name'][$i];
                            $size = $_FILES['workImage']['size'][$i];
                            $tmp  = $_FILES['workImage']['tmp_name'][$i];
                            $ext  = $this->s3_model->getExtension($name);
                            $actual_image_name = time().".".$ext;
                            if($this->s3->putObjectFile($tmp, BUCKETNAME , $uploadFor.'/'.$actual_image_name, S3::ACL_PUBLIC_READ) )
                            {
                            $workImage[]   = $actual_image_name;
                            }
                                         
                      }
                      //sinature
                        $signaturename = $_FILES['signature']['name'];
                        $signaturesize = $_FILES['signature']['size'];
                        $signaturetmp  = $_FILES['signature']['tmp_name'];
                        $signatureext  = $this->s3_model->getExtension($signaturename);;

                        //Rename image name.
                        $actual_image_signature = time().".".$signatureext;
                        if($this->s3->putObjectFile($signaturetmp, BUCKETNAME , $uploadFor.'/'.$actual_image_signature, S3::ACL_PUBLIC_READ) )
                        {
                        $signature    = $actual_image_signature;
                        }
                        switch ($jobStatus) {
                            case 'start':
                         
                            $data_val['driverSignature']    = $signature;
                            $data_val['workImage']          = $workImage;
                            $report['beforeWork']           =   $data_val;
                            break;
                            case 'end':
                          
                            $data_val['customerSignature']   = $signature;
                            $data_val['workImage']           = $workImage;
                            $report['afterWork']            = $data_val;
                            break;

                            default:
                            $res=0;
                            break;
                        }
                         $update=$this->common_model->updateFields('jobs',array('jobStatus'=>$jobActivity,'jobReport'=>json_encode($report)),$where);
                        $showmsg  =($jobActivity==2)? "Job has been completed successfully." : "Job has been started successfully.";
                        $response = array('status'=>SUCCESS,'message'=>$showmsg);

                    }//end if
                    
                }
              
            }else{
               $response = array('status' => FAIL, 'message' => ResponseMessages::getStatusCodeMessage(118)); 
            }
           
        }//end if
        $this->response($response);    
    }//end function
    function s3_post(){
      $file = '';
      if (!empty($_FILES['file']['name'])) {
            $this->load->library('s3');

           $this->load->model('s3_model');
           $img = $this->s3_model->uploadImgS3('jobs');
             if(is_string($img))
            {
            $file = $img;
            }
             $response = array('status' => SUCCESS, 'message' => ResponseMessages::getStatusCodeMessage(200), 'file' => $file);
        }else{
             $response = array('status' => FAIL, 'message' => ResponseMessages::getStatusCodeMessage(118));
        }
          $this->response($response);   
    }//end function


   
}//End Class 

