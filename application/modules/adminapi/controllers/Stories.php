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
          
            $storyId  = decoding($this->post('storyId'));
            $title              = $this->post('title');
            $data_val['title']              = $this->post('title');
            $data_val['categoryId']         = $this->post('categoryId');
            $data_val['subCategoryId']      = $this->post('subCategoryId');
            $data_val['authorBy']           = $this->post('authorBy');
            $data_val['postedById']         = $this->post('postedById');
            $data_val['description']        = $this->post('ckeditor');
            $data_val['isFeatured']         = $this->post('isFeatured');
            $data_val['storyDate']          = date("Y-m-d",strtotime($this->post('storyDate')));
            $stroyUrl                       = str_ireplace(" ","-",$title)."-".time().'-lojanlo';
            $featuredImageBase64     =   $this->input->post('recImageData'); 
           
           /*image uploads*/
            $storyId  = decoding($this->post('storyId'));
            $where = array('storyId'=>$storyId);
            $isExist=$this->common_model->is_data_exists('stories',$where);
             $folder    = 'stories';
            $hieght = 300;
            $width  = 400;
            if(!empty($featuredImageBase64)){
                $this->load->model('image_model');
                $featuredImage = $this->image_model->updateMediaBase64($featuredImageBase64,$folder,$hieght,$width);
            }      
             $image = array(); $featuredImage = '';
                  //  $image = array(); $featuredImage = '';
               /*     if (!empty($_FILES['featuredImage']['name'])) {
                         $this->load->model('image_model');
                    $folder     = 'stories';
                    $image      = $this->image_model->upload_image('featuredImage',$folder); //upload media of Seller

                    //check for error
                    if(array_key_exists("error",$image) && !empty($image['error'])){
                        $response = array('status' => FAIL, 'message' => strip_tags($image['error'].'(In featured image)'));
                       $this->response($response);die;
                    }

                    //check for image name if present
                    if(array_key_exists("image_name",$image)):
                        $featuredImage = $image['image_name'];
                          if(!empty($isExist->featuredImage)){
                             $this->image_model->delete_image('uploads/stories/',$isExist->featuredImage);
                          }
                       
                    endif;

                    }*/
                    //check for image name if present
                    if(array_key_exists("image_name",$image)):
                        $featuredImage = $image['image_name'];
                          if(!empty($isExist->featuredImage)){
                             $this->image_model->delete_image('uploads/stories/',$isExist->featuredImage);
                          }
                       
                    endif;
                    if(!empty($featuredImage)){
                        $data_val['featuredImage']           =   $featuredImage;
                    }
           /*image uploads*/
           
          
           // $isExist=$this->common_model->is_data_exists('stories',$where);

            if($isExist){
                $result = $this->common_model->updateFields('stories',$data_val,$where);
                $msg = "Story record updated successfully.";
            }else{
                $data_val['stroyUrl']           = $stroyUrl;
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
       
        $userLink = base_url().'stories/storyDetail/'.encoding($serData->storyId);
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

