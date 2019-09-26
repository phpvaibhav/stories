<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
//General service API class 
class Category extends Common_Admin_Controller{
    
    public function __construct(){
        parent::__construct();
        $this->check_admin_service_auth();
    }
    public function addCategory_post(){
            $category = $this->post('categoryId');
        if(!empty($category)){
            $this->form_validation->set_rules('category', 'category', 'trim|required');
        }else{
            $this->form_validation->set_rules('category', 'category', 'trim|required|is_unique[category.category]',
            array('is_unique' => 'Category already exist'));
        }
        
        if($this->form_validation->run() == FALSE){
            $response = array('status' => FAIL, 'message' => strip_tags(validation_errors()));
            
        }else{
                $categoryId = decoding($this->post('categoryId'));
                $showMenu = $this->post('showMenu');
                $category=$this->post('category');
				$data_val['category']       	= $this->post('category');
				$data_val['showMenu']       	= $showMenu ? $showMenu:0;
               
                 $pageUrl                            = $this->common_model->cleanString($category);
                $data_val['pageUrl']           = $pageUrl.'-lojanlo';
				$where = array('categoryId'=>$categoryId);
            	$isExist=$this->common_model->is_data_exists('category',$where);
            	if($isExist){
                    $isCat= $this->common_model->is_data_exists('category',array('category'=>$data_val['category'],'categoryId !='=>$categoryId));
                    if(!$isCat){
                        $result = $this->common_model->updateFields('category',$data_val,$where);
                        $status = SUCCESS;
                        $msg = "Category record updated successfully.";
                    }else{
                        $status = FAIL;
                         $result =1;
                        $msg = "Category already exist";
                    }
            		
            	}else{
            		$result = $this->common_model->insertData('category',$data_val);
            		$status = SUCCESS;
            		$msg = "Category record added successfully.";
            	}
                
                if($result){
                  
                     $response = array('status'=>$status,'message'=>$msg);
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
    public function addSubCategory_post(){
       
        $this->form_validation->set_rules('subCategory', 'subCategory','trim|required|is_unique[subCategory.subCategory]',
            array('is_unique' => 'Sub Category already exist'));
         $this->form_validation->set_rules('categoryId', 'category', 'trim|required');
        if($this->form_validation->run() == FALSE){
            $response = array('status' => FAIL, 'message' => strip_tags(validation_errors()));
            
        }else{
            
                $subCategoryId = decoding($this->post('subCategoryId'));
                
                $subCategory                = $this->post('subCategory');
                $data_val['subCategory']    = $this->post('subCategory');
                $data_val['categoryId']     = $this->post('categoryId');
                $pageUrl                            = $this->common_model->cleanString($subCategory);
                $data_val['pageUrl']           = $pageUrl.'-lojanlo';
                $where = array('subCategoryId'=>$subCategoryId);
                $isExist=$this->common_model->is_data_exists('subCategory',$where);
                if($isExist){
                    $result = $this->common_model->updateFields('subCategory',$data_val,$where);
                    $msg = "Sub category record updated successfully.";
                }else{
                    $result = $this->common_model->insertData('subCategory',$data_val);
                    
                    $msg = "Sub category record added successfully.";
                }
                
                if($result){
                  
                     $response = array('status'=>SUCCESS,'message'=>$msg);
                }else{
                     $response = array('status'=>FAIL,'message'=>ResponseMessages::getStatusCodeMessage(118));
                } 
             
               
           
        }
        $this->response($response);
    }//end function 
    public function subcategoryList_post(){
        $this->load->helper('text');
        $this->load->model('subcategory_model');
        $this->subcategory_model->set_data();
        $list = $this->subcategory_model->get_list();
        
        $data = array();
        $no = $_POST['start'];
        foreach ($list as $serData) { 
        $action ='';
        $no++;
        $row = array();
        $row[] = $no;
        //$row[] = '<img src='.base_url($serData->profileImage).' alt="user profile" style="height:50px;width:50px;" >';
        $row[] = display_placeholder_text($serData->subCategory); 
        $row[] = display_placeholder_text($serData->category); 

         
        if($serData->status){
        $row[] = '<label class="label label-success">'.$serData->statusShow.'</label>';
        }else{ 
        $row[] = '<label class="label label-danger">'.$serData->statusShow.'</label>'; 
        } 
            $link  ='javascript:void(0)';
            $action .= "";
        if($serData->status){

            $action .= '<a href="'.$link.'" onclick="subcategoryStatus(this);" data-message="You want to change status!" data-useid="'.encoding($serData->subCategoryId).'"  class="btn btn-danger btn-circle" title="status"><i class="fa fa-check" aria-hidden="true"></i></a>';
        }else{
             $action .= '&nbsp;<a href="'.$link.'" onclick="subcategoryStatus(this);" data-message="You want to change status!" data-useid="'.encoding($serData->subCategoryId).'"  class="btn btn-success btn-circle" title="status"><i class="fa fa-times" aria-hidden="true"></i></a>';
        }
             $action .= '&nbsp;<a href="'.$link.'" onclick="subcategoryEdit(this);" data-categoryId="'.$serData->categoryId.'" data-subcategory="'.$serData->subCategory.'"  data-subcategoryid="'.encoding($serData->subCategoryId).'"  class="btn btn-primary btn-circle" title="Edit"><i class="fa fa-edit" aria-hidden="true"></i></a>';
      /*  $link = base_url().'vehicles/vehicleDetail/'.encoding($serData->vehicleId);
        $action .= '&nbsp;&nbsp;|&nbsp;&nbsp;<a href="'.$link.'"  class="on-default edit-row table_action" title="Detail"><i class="fa fa-eye" aria-hidden="true"></i></a>';*/
        

        $row[] = $action;
        $data[] = $row;

        }

        $output = array(
            "draw" => $_POST['draw'],
            "recordsTotal" => $this->subcategory_model->count_all(),
            "recordsFiltered" => $this->subcategory_model->count_filtered(),
            "data" => $data,
        );
        //output to json format
       
        $this->response($output);
    }//end function 
    function subcategoryStatus_post(){
        $subCategoryId  = decoding($this->post('use'));
    
        $where = array('subCategoryId'=>$subCategoryId);
         $dataExist=$this->common_model->is_data_exists('subCategory',$where);
        if($dataExist){
            $status = $dataExist->status ?0:1;

             $dataExist=$this->common_model->updateFields('subCategory',array('status'=>$status),$where);
              $showmsg  =($status==1)? "Sub Category request is Active" : "Sub Category request is Inactive";
                $response = array('status'=>SUCCESS,'message'=>$showmsg);
        }else{
           $response = array('status'=>FAIL,'message'=>ResponseMessages::getStatusCodeMessage(118));  
        }
        $this->response($response);
    }//end function
    function subcategoryDelete_post(){
        $subCategoryId  = decoding($this->post('use'));
   
        $where = array('subCategoryId'=>$subCategoryId);
         $dataExist=$this->common_model->is_data_exists('subCategory',$where);
        if($dataExist){
              
             $dataExist=$this->common_model->deleteData('subCategory',$where);
              $showmsg  ='record has been deleted successfully.';
                $response = array('status'=>SUCCESS,'message'=>$showmsg);
        }else{
           $response = array('status'=>FAIL,'message'=>ResponseMessages::getStatusCodeMessage(118));  
        }
        $this->response($response);
    }//end function  
    function categoryWiseSubCategory_post(){
        $categoryId  = $this->post('categoryId');
   
        $where = array('categoryId'=>$categoryId);
        $dataExist = $this->common_model->getAll('subCategory',$where);
        if(!empty($dataExist)){
            $response = array('status'=>SUCCESS,'message'=>ResponseMessages::getStatusCodeMessage(200),'subcategories'=>$dataExist);
        }else{
           $response = array('status'=>FAIL,'message'=>"Sub category not found.",'subcategories'=>array());  
        }
        $this->response($response);
    }//end function  

}//End Class 

