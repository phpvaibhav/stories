<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Reports extends Common_Back_Controller {

    public $data = "";

    function __construct() {
        parent::__construct();
        $this->check_admin_user_session();
     
    }

    public function index() { 
        
        $data['title'] = 'Reports';
      
     
        $this->load->admin_render('reports', $data);
    } //end function
}//end Class