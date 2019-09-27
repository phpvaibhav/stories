<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends Common_Front_Controller {

    public $data = "";
    public $row = array();

    function __construct() {
        parent::__construct();
    }

    public function index() { 
        $data['page_title'] = "Home";
        $this->load->model('home_model');
        $data['topstories'] = $this->home_model->get_stories(array('s.status'=>1),array('DATE(s.crd)'=>'desc'),'4');
    	$this->load->front_render('home', $data, '');
    } 
    public function contactus() { 
        $data['page_title'] = "Contact us";
        $row = $this->common_model->getsingle('pages',array('pageUrl'=>'contactus'));
        $data['title']          = $row['metaTitle'];
        $data['keywords']       = $row['metaKeyword'];
        $data['description']    = $row['metaDescription'];
        $data['author']         = 'lojanlo';
        $data['row']            = $row;
        $data['front_styles'] = array('https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/css/toastr.min.css');
       $data['front_scripts'] = array('https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/js/toastr.min.js','backend_assets/js/plugin/masked-input/jquery.maskedinput.min.js','backend_assets/js/plugin/jquery-validate/jquery.validate.min.js','frontend_assets/js/contactus.js');
    	$this->load->front_render('contact', $data, '');
    } 
    public function aboutus() { 
        $data['page_title'] = "About us";
        $row = $this->common_model->getsingle('pages',array('pageUrl'=>'aboutus'));
        $data['title'] = $row['metaTitle'];
        $data['keywords'] = $row['metaKeyword'];
        $data['description'] = $row['metaDescription'];
        $data['author'] = 'lojanlo';
        $data['row'] = $row;
       
    	$this->load->front_render('aboutus', $data, '');
    } 
    public function termConditions() { 
        $data['page_title'] = "Term & Conditions";
       
        $row = $this->common_model->getsingle('pages',array('pageUrl'=>'termConditions'));
         $data['title'] = $row['metaTitle'];
        $data['keywords'] = $row['metaKeyword'];
        $data['description'] = $row['metaDescription'];
        $data['author'] = 'lojanlo';
        $data['row'] = $row;
    	$this->load->front_render('termConditions', $data, '');
    }
    public function privacyPolicy() { 
        $data['page_title'] = "Privacy Policy";
      
         $row = $this->common_model->getsingle('pages',array('pageUrl'=>'privacyPolicy'));
           $data['title'] = $row['metaTitle'];
        $data['keywords'] = $row['metaKeyword'];
        $data['description'] = $row['metaDescription'];
        $data['author'] = 'lojanlo';
        $data['row'] = $row;
    	$this->load->front_render('privacyPolicy', $data, '');
    }
    public function category() { 
        $data['page_title'] = "Category";
        $row['icon']= "fa fa-hashtag";
        $row['title']= str_replace(array('-','lojanlo'),array(' ',' '),$this->uri->segment(2));
        $row['subTitle']= "";
        $data['row'] = $row;
        $this->load->front_render('category', $data, '');
    } 
    public function singleCategory() { 
        $pageId = $this->uri->segment(2);
        $this->load->model('home_model');
        $story = $this->home_model->single_story(array('s.status'=>1,'s.storyUrl'=>trim($pageId)));

        $row['icon']= "fa fa-hashtag";
        $row['title']= str_replace(array('-','lojanlo'),array(' ',' '),$pageId);
        $row['subTitle']= "";
        $data['page_title'] =str_replace(array('-','lojanlo'),array(' ',' '),$pageId);
        $data['row'] = $row;
        (empty($story)) ? redirect(base_url(),true):'';
        $data['story'] = $story;
        $this->load->front_render('storyPage', $data, '');
    }
}//end class