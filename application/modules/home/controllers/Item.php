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
  		$result['stories'] = $this->home_model->get_stories();
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
         $orderBy = array('s.title'=>'asc');
      }else{
         $orderBy = array('DATE(s.crd)'=>'desc');
      }
     
      $limit =5;
      $result['stories'] = $this->home_model->get_stories($where,$orderBy);
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
     
      $limit =5;
      $result['stories'] = $this->home_model->get_stories($where,$orderBy);
      //pr($result['stories']);
      $this->load->view('items/similarStory',$result);
    } 
    function categoryWiseStory(){
      $search   = decoding($this->input->post('search'));
      $type   = trim($this->input->post('type'));
      $page  = trim($this->input->post('page'));
    
      $where = array('s.status'=>1);
      if($type=='similar'){
          $where['c.pageUrl']= $search;
         $orderBy = array('s.title'=>'asc');
      }else{
         $where['s.isFeatured']=1;
         $orderBy = array('s.title'=>'asc');
      }
     
      $limit =5;
      $result['stories'] = $this->home_model->get_stories($where,$orderBy);
      //pr($result['stories']);
      $this->load->view('items/categoryPage',$result);
    } 

 
}//end class.php