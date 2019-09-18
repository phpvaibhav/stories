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
    public function contactus() { 
        $data['page_title'] = "Contact us";
    	$this->load->front_render('contact', $data, '');
    } 
    public function aboutus() { 
        $data['page_title'] = "About us";
    	$this->load->front_render('aboutus', $data, '');
    } 
    public function termConditions() { 
        $data['page_title'] = "Term & Conditions";
    	$this->load->front_render('termConditions', $data, '');
    }
    public function privacyPolicy() { 
        $data['page_title'] = "Privacy Policy";
    	$this->load->front_render('privacyPolicy', $data, '');
    }
}//end class