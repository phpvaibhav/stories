<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Item extends Common_Front_Controller {

	public $result = array();
    function __construct() {
    	parent::__construct();
       	$this->load->model('home_model');
    }
  	function sideItem(){
  	   //	$type 	= trim($this->input->post('type'));
      //page 	= trim($this->input->post('page'));
      $where=array('s.status'=>1);
      $order=array('viewCount'=>'desc');
  		$result['stories'] = $this->home_model->get_stories($where,$order,6);
  		//pr($result['stories']);
  		$this->load->view('items/sidePage',$result);
  	} 
    function homeItem(){
      $type   = trim($this->input->post('type'));
      //page  = trim($this->input->post('page'));
      $result['icon'] = $type=='Recent' ? "fa fa-flag" :"fa fa-bookmark";
      $result['title'] = $type;
      $where = array('s.status'=>1);
      if($type=='Featured'){
          $where['s.isFeatured']=1;
          $orderBy = array('viewCount'=>'asc');
      }else{
         $orderBy = array('DATE(s.crd)'=>'desc');
      }
     
      $limit =6;
      $result['stories'] = $this->home_model->get_stories($where,$orderBy,$limit);
      //pr($result['stories']);
      $this->load->view('items/homePage',$result);
    } 
    function similarStory(){
      $search   = decoding($this->input->post('search'));
      $type   = trim($this->input->post('type'));
      $page  = trim($this->input->post('page'));
    
      $where = array('s.status'=>1);
      if($type=='similar'){
          $where['s.categoryId']= $search;
         $orderBy = array('s.title'=>'asc');
      }else{
         $where['s.isFeatured']=1;
         $orderBy = array('s.title'=>'asc');
      }
     
      $limit =6;
      $result['stories'] = $this->home_model->get_stories($where,$orderBy,$limit);
      //pr($result['stories']);
      $this->load->view('items/similarStory',$result);
    } //end function
    function categoryWiseStory(){
      $search   = decoding($this->input->post('search'));
      $type   = trim($this->input->post('type'));
      $page  = trim($this->input->post('page'));
    
      $where = array('s.status'=>1);
      if($type=='similar'){
          $where['s.categoryId']= $search;
         $orderBy = array('s.title'=>'asc');
      }else{
         $where['s.isFeatured']=1;
         $orderBy = array('s.title'=>'asc');
      }
     
      $limit =6;
      $result['stories'] = $this->home_model->get_stories($where,$orderBy,$limit);
      //pr($result['stories']);
      $this->load->view('items/categoryPage',$result);
    } //end function 
  function categoryStory(){
      $category   = decoding($this->input->post('category'));
      $subCategoryId   = $this->input->post('subCategoryId');
      $subCategoryId   = !empty($subCategoryId) ? decoding($subCategoryId) :'';
      $limit   = trim($this->input->post('limit'));
      $start  = trim($this->input->post('start'));
      $where = array('s.status'=>1);

      $where['s.categoryId']= $category;
      if(!empty($subCategoryId)){
         $where['s.subCategoryId']= $subCategoryId;
      }
     
      $orderBy = array('s.storyId'=>'desc');
     
      $result['stories'] = $this->home_model->get_stories_category($where,$orderBy,$limit,$start);
      $result['start'] =$start;
      //pr($result['stories']);
      $this->load->view('items/categoryPage',$result);
    } //end function 
    
    function getComment(){
       
        $storyId = decoding($this->input->post('storyId'));
        $data['comment'] = $this->home_model->getComicComment($storyId);
        $this->load->view('comicCommentList',$data);
    }

    function addComment(){
        $postData = $this->input->post();
     
        $this->home_model->addComment($postData);
    } 

 
}//end class.php
