<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends Common_Front_Controller {

    public $data = "";

    function __construct() {
        parent::__construct();
    }

    public function index() { 
        $data['page_title'] = "Home";
    	$this->load->front_render('home', $data, '');
    }
}//end class