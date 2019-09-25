<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Pages extends Common_Back_Controller {

    public $data = "";

    function __construct() {
        parent::__construct();
        $this->check_admin_user_session();
     
    }

    public function index() { 
        
        $data['title'] = 'Pages';
        $count = $this->common_model->get_total_count('pages');
        $data['recordSet'] = array('<li class="sparks-info"><h5>Page<span class="txt-color-blue"><a class="anchor-btn" href="pages/addPage" ><i class="fa fa-plus-square"></i></a></span></h5></li>','<li class="sparks-info"><h5>Total Pages <span class="txt-color-darken" id="totalCust"><i class="fa fa-lg fa-fw fa fa-file"></i>&nbsp;'.$count.'</span></h5></li>');
        $data['front_scripts'] = array('backend_assets/custom/js/pages.js');
        $this->load->admin_render('pages', $data);
    } 
    public function addPage() { 
        
        $data['title'] = 'Page';
         $pageId  = decoding($this->uri->segment(3));
    
        $where = array('pageId'=>$pageId);
        $data['page'] = $this->common_model->getsingle('pages',$where);
        $data['front_scripts'] = array('backend_assets/js/plugin/ckeditor/ckeditor.js','backend_assets/custom/js/pages.js');
        $this->load->admin_render('addPage', $data);
    } 
  
}