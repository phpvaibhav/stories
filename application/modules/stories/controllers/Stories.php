<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Stories extends Common_Back_Controller {

    public $data = "";

    function __construct() {
        parent::__construct();
        $this->check_admin_user_session();

     
    }

    public function index() { 
        
        $data['title'] = 'Stories';
        $count = $this->common_model->get_total_count('stories');
        $data['recordSet'] = array('<li class="sparks-info"><h5>Story<span class="txt-color-blue"><a class="anchor-btn" href="stories/addStory" ><i class="fa fa-plus-square"></i></a></span></h5></li>','<li class="sparks-info"><h5>Total Stories <span class="txt-color-darken" id="totalCust"><i class="fa fa-lg fa-fw fa fa-tasks"></i>&nbsp;'.$count.'</span></h5></li>');
        $data['front_scripts'] = array('backend_assets/custom/js/stories.js');
  
        $this->load->admin_render('stories', $data);
    }     
    public function addStory() { 
        
        $data['title'] = 'Story';
        $storyId  = decoding($this->uri->segment(3));
        $data['storyId'] = $storyId;
        $this->load->model('stories_model');
        $data['story'] = $this->stories_model->storyDetail($storyId);
        $data['categories']       =  $this->common_model->getAll('category',array('status'=>1));
        $data['users']       =  $this->common_model->getAll('users',array('status'=>1));
        $data['front_styles'] = array('https://cdnjs.cloudflare.com/ajax/libs/croppie/2.6.4/croppie.min.css');
        $data['front_scripts'] = array('https://cdnjs.cloudflare.com/ajax/libs/croppie/2.6.4/croppie.min.js','backend_assets/js/plugin/ckeditor/ckeditor.js','backend_assets/js/plugin/select2/select2.min.js','backend_assets/custom/js/stories.js','backend_assets/custom/js/category.js','backend_assets/custom/js/custom_cropper.js');
        $this->load->admin_render('addStory', $data);
    } 
    public function storyDetail(){
      //pr('admin@admin.com');
        $storyId  = decoding($this->uri->segment(3));

        $data['title'] = "Story Detail";
       /*  $data['recordSet'] = array('<li class="sparks-info"><h5>PDF<span class="txt-color-blue"><a class="anchor-btn" href="'.base_url().'jobs/jobDetailPdf/'.$this->uri->segment(3).'" target="_blank" ><i class="fa fa-file-pdf-o"></i></a></span></h5></li>');*/
        $where = array('storyId'=>$storyId);
        $this->load->model('stories_model');
        $data['story'] = $this->stories_model->storyDetail($storyId);
    
        $this->load->admin_render('storyDetail', $data, '');
    } //end function

}