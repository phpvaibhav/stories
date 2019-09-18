<?php 
 /**
 * 
 */
 class My404 extends Common_Front_Controller
 {
  
  function __construct()
  {
    parent::__construct();
    
  }

  function index(){
     $data['page_title'] = "404";
      $this->load->front_render('my404', $data, '');

  } 
  
 }
 ?>