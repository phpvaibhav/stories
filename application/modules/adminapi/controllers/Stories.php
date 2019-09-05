<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
//General service API class 
class Stories extends Common_Admin_Controller{
    
    public function __construct(){
        parent::__construct();
        $this->check_admin_service_auth();
    }
    public function createStory_post(){
       
        $this->form_validation->set_rules('title', 'title', 'trim|required');
        $this->form_validation->set_rules('categoryId', 'category', 'trim|required');
        $this->form_validation->set_rules('subCategoryId', 'sub category', 'trim|required');
        $this->form_validation->set_rules('authorBy', 'author by', 'trim|required');
        $this->form_validation->set_rules('postedById', 'post by', 'trim|required');
        $this->form_validation->set_rules('ckeditor', 'description', 'trim|required');
       
        
        if($this->form_validation->run() == FALSE){
            $response = array('status' => FAIL, 'message' => strip_tags(validation_errors()));
            
        }
        else{
      
                $data_val['title']              = $this->post('title');
                $data_val['categoryId']         = $this->post('categoryId');
                $data_val['subCategoryId']      = $this->post('subCategoryId');
                $data_val['authorBy']           = $this->post('authorBy');
                $data_val['postedById']         = $this->post('postedById');
                $data_val['description']        = $this->post('ckeditor');
                $data_val['storyDate']          = date("Y-m-d",strtotime($this->post('storyDate')));
               
               
                $storyId  = decoding($this->post('storyId'));

                $where = array('storyId'=>$storyId);
                $isExist=$this->common_model->is_data_exists('stories',$where);
                if($isExist){
                    $result = $this->common_model->updateFields('stories',$data_val,$where);
                    $msg = "story record updated successfully.";
                }else{
                    $result = $this->common_model->insertData('stories',$data_val);
                    
                    $msg = "Story created successfully.";
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
 
    public function storiesList_post(){
        $this->load->helper('text');
        $this->load->model('stories_model');
        $this->stories_model->set_data();
        $list = $this->stories_model->get_list();
        
        $data = array();
        $no = $_POST['start'];
        foreach ($list as $serData) { 
        $action ='';
        $no++;
        $row = array();
        $row[] = $no;
        //$row[] = '<img src='.base_url($serData->profileImage).' alt="user profile" style="height:50px;width:50px;" >';
        $row[] = display_placeholder_text($serData->title); 
        $row[] = display_placeholder_text($serData->category); 
        $row[] = display_placeholder_text($serData->subCategory); 
       
        $row[] = date("d/m/Y",strtotime($serData->crd))." ".display_placeholder_text($serData->crd); 
        switch ($serData->status) {
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
       
        $userLink = base_url().'jobs/jobDetail/'.encoding($serData->storyId);
       // $userLink = "javascript:void(0);";
        $action .= '&nbsp;&nbsp;<a href="'.$userLink.'"  class="on-default edit-row table_action" title="Detail"><i class="fa fa-eye" aria-hidden="true"></i></a>&nbsp;&nbsp;|';
          $pdfLink = base_url().'jobs/jobDetailPdf/'.encoding($serData->storyId);
        $action .= '&nbsp;&nbsp;<a href="'.$pdfLink.'"  class="on-default edit-row table_action" title="Pdf Download" target="_blank"><i class="fa fa-file-pdf-o" aria-hidden="true"></i></a>';

            

        $row[] = $action;
        $data[] = $row;

        }

        $output = array(
            "draw" => $_POST['draw'],
            "recordsTotal" => $this->stories_model->count_all(),
            "recordsFiltered" => $this->stories_model->count_filtered(),
            "data" => $data,
        );
        //output to json format
       
        $this->response($output);
    }//end function 

    function stroyStatus_post(){
        $storyId  = decoding($this->post('use'));
        $status  =$this->post('status');
    
        $where = array('storyId'=>$storyId);
         $dataExist=$this->common_model->is_data_exists('stories',$where);
        if($dataExist){
           
             $dataExist=$this->common_model->updateFields('stories',array('status'=>$status),$where);
              $showmsg  =($status==2)? "Story has been manually completed successfully." : "Story has been manually  started successfully.";
                $response = array('status'=>SUCCESS,'message'=>$showmsg);
        }else{
           $response = array('status'=>FAIL,'message'=>ResponseMessages::getStatusCodeMessage(118));  
        }
        $this->response($response);
    }//end function
    function storyDelete_post(){
        $jobId  = decoding($this->post('use'));
     
    
        $where = array('storyId'=>$storyId);
         $dataExist=$this->common_model->is_data_exists('stories',$where);
        if($dataExist){
           
             $dataExist=$this->common_model->deleteData('stories',$where);
              $showmsg  ="Story has been deleted successfully.";
                $response = array('status'=>SUCCESS,'message'=>$showmsg);
        }else{
           $response = array('status'=>FAIL,'message'=>ResponseMessages::getStatusCodeMessage(118));  
        }
        $this->response($response);
    }//end function
   
    

}//End Class 

