<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
//General service API class 
class Category extends Common_Admin_Controller{
    
    public function __construct(){
        parent::__construct();
        $this->check_admin_service_auth();
    }
    public function addCategory_post(){
       
        $this->form_validation->set_rules('category', 'category', 'trim|required|is_unique[category.category]',
            array('is_unique' => 'Category already exist'));
        if($this->form_validation->run() == FALSE){
            $response = array('status' => FAIL, 'message' => strip_tags(validation_errors()));
            
        }else{
                $categoryId = decoding($this->post('categoryId'));
                $showMenu = $this->post('showMenu');
				$data_val['category']       	= $this->post('category');
				$data_val['showMenu']       	= $showMenu ? $showMenu:0;
			
				$where = array('categoryId'=>$categoryId);
            	$isExist=$this->common_model->is_data_exists('category',$where);
            	if($isExist){
            		$result = $this->common_model->updateFields('category',$data_val,$where);
            		$msg = "Category record updated successfully.";
            	}else{
            		$result = $this->common_model->insertData('category',$data_val);
            		
            		$msg = "Category record added successfully.";
            	}
                
                if($result){
                  
                     $response = array('status'=>SUCCESS,'message'=>$msg);
                }else{
                     $response = array('status'=>FAIL,'message'=>ResponseMessages::getStatusCodeMessage(118));
                } 
             
               
           
        }
        $this->response($response);
    }//end function 

    public function categoryList_post(){
        $this->load->helper('text');
        $this->load->model('category_model');
        $this->category_model->set_data();
        $list = $this->category_model->get_list();
        
        $data = array();
        $no = $_POST['start'];
        foreach ($list as $serData) { 
        $action ='';
        $no++;
        $row = array();
        $row[] = $no;
        //$row[] = '<img src='.base_url($serData->profileImage).' alt="user profile" style="height:50px;width:50px;" >';
        $row[] = display_placeholder_text($serData->category); 

        if($serData->showMenu){
        $row[] = '<label class="label label-success">'.$serData->showMenuShow.'</label>';
        }else{ 
        $row[] = '<label class="label label-danger">'.$serData->showMenuShow.'</label>'; 
        }  
        if($serData->status){
        $row[] = '<label class="label label-success">'.$serData->statusShow.'</label>';
        }else{ 
        $row[] = '<label class="label label-danger">'.$serData->statusShow.'</label>'; 
        } 
            $link  ='javascript:void(0)';
            $action .= "";
        if($serData->status){

            $action .= '<a href="'.$link.'" onclick="categoryStatus(this);" data-message="You want to change status!" data-useid="'.encoding($serData->categoryId).'"  class="btn btn-danger btn-circle" title="status"><i class="fa fa-check" aria-hidden="true"></i></a>';
        }else{
             $action .= '&nbsp;<a href="'.$link.'" onclick="categoryStatus(this);" data-message="You want to change status!" data-useid="'.encoding($serData->categoryId).'"  class="btn btn-success btn-circle" title="status"><i class="fa fa-times" aria-hidden="true"></i></a>';
        }
             $action .= '&nbsp;<a href="'.$link.'" onclick="categoryEdit(this);" data-category="'.$serData->category.'" data-showmenu="'.$serData->showMenu.'" data-categoryid="'.encoding($serData->categoryId).'"  class="btn btn-primary btn-circle" title="Edit"><i class="fa fa-edit" aria-hidden="true"></i></a>';
      /*  $link = base_url().'vehicles/vehicleDetail/'.encoding($serData->vehicleId);
        $action .= '&nbsp;&nbsp;|&nbsp;&nbsp;<a href="'.$link.'"  class="on-default edit-row table_action" title="Detail"><i class="fa fa-eye" aria-hidden="true"></i></a>';*/
        

        $row[] = $action;
        $data[] = $row;

        }

        $output = array(
            "draw" => $_POST['draw'],
            "recordsTotal" => $this->category_model->count_all(),
            "recordsFiltered" => $this->category_model->count_filtered(),
            "data" => $data,
        );
        //output to json format
       
        $this->response($output);
    }//end function 
    function categoryStatus_post(){
        $categoryId  = decoding($this->post('use'));
    
        $where = array('categoryId'=>$categoryId);
         $dataExist=$this->common_model->is_data_exists('category',$where);
        if($dataExist){
            $status = $dataExist->status ?0:1;

             $dataExist=$this->common_model->updateFields('category',array('status'=>$status),$where);
              $showmsg  =($status==1)? "Category request is Active" : "Category request is Inactive";
                $response = array('status'=>SUCCESS,'message'=>$showmsg);
        }else{
           $response = array('status'=>FAIL,'message'=>ResponseMessages::getStatusCodeMessage(118));  
        }
        $this->response($response);
    }//end function
 	function categoryDelete_post(){
        $categoryId  = decoding($this->post('use'));
   
        $where = array('categoryId'=>$categoryId);
         $dataExist=$this->common_model->is_data_exists('category',$where);
        if($dataExist){
              
             $dataExist=$this->common_model->deleteData('category',$where);
              $showmsg  ='record has been deleted successfully.';
                $response = array('status'=>SUCCESS,'message'=>$showmsg);
        }else{
           $response = array('status'=>FAIL,'message'=>ResponseMessages::getStatusCodeMessage(118));  
        }
        $this->response($response);
    }//end function
  

}//End Class 

