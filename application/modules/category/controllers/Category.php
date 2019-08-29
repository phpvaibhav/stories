<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Category extends Common_Back_Controller {

    public $data = "";

    function __construct() {
        parent::__construct();
        $this->check_admin_user_session();
     
    }

    public function index() { 
        
        $data['title'] = 'Categories';
        $count = $this->common_model->get_total_count('category');
        $data['recordSet'] = array('<li class="sparks-info"><h5>Category<span class="txt-color-blue"><a class="anchor-btn" data-toggle="modal" data-target="#addCategory"><i class="fa fa-plus-square"></i></a></span></h5></li>','<li class="sparks-info"><h5>Total Categories <span class="txt-color-darken" id="totalCust"><i class="fa fa-lg fa-fw fa fa-taxi"></i>&nbsp;'.$count.'</span></h5></li>');
    
        $this->load->admin_render('category', $data);
    }  
}