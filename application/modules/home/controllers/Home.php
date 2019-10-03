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
        $data['title']          = "Home";
        $data['keywords']       = "";
        $data['description']    = "";
        $data['author']         = '5insight org.';
        $keywords =array();
        $this->load->model('home_model');
        $topstories = $this->home_model->get_stories(array('s.status'=>1),array('DATE(s.crd)'=>'desc'),'4');
        if(!empty($topstories)){
            foreach ($topstories as $k => $tag) {
              $keywords[] = $tag->title;
            }
        }
         $data['keywords']       = !empty($keywords) ? implode(",",$keywords):"";
       
        
        $data['topstories'] = $topstories;
    	$this->load->front_render('home', $data, '');
    } 
    public function contactus() { 
        $data['page_title'] = "Contact us";
        $row = $this->common_model->getsingle('pages',array('pageUrl'=>'contactus'));
        $data['title']          = $row['metaTitle'];
        $data['keywords']       = $row['metaKeyword'];
        $data['description']    = $row['metaDescription'];
        $data['author']         = '5insight org.';
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
        $data['author'] = '5insight org.';
        $data['row'] = $row;
       
    	$this->load->front_render('aboutus', $data, '');
    } 
    public function termConditions() { 
        $data['page_title'] = "Term & Conditions";
       
        $row = $this->common_model->getsingle('pages',array('pageUrl'=>'termConditions'));
         $data['title'] = $row['metaTitle'];
        $data['keywords'] = $row['metaKeyword'];
        $data['description'] = $row['metaDescription'];
        $data['author'] = '5insight org.';
        $data['row'] = $row;
    	$this->load->front_render('termConditions', $data, '');
    }
    public function privacyPolicy() { 
        $data['page_title'] = "Privacy Policy";
      
         $row = $this->common_model->getsingle('pages',array('pageUrl'=>'privacyPolicy'));
           $data['title'] = $row['metaTitle'];
        $data['keywords'] = $row['metaKeyword'];
        $data['description'] = $row['metaDescription'];
        $data['author'] = '5insight org.';
        $data['row'] = $row;
    	$this->load->front_render('privacyPolicy', $data, '');
    }
    public function category() { 
        $pageId = rawurldecode($this->uri->segment(2));
        $res = $this->common_model->getsingle('category',array('pageUrl'=>$pageId));
        (empty($res)) ? redirect(base_url(),true) : '';
        $data['page_title'] = $res['category'];
        $row['icon'] = "fa fa-hashtag";
        $row['title']= $res['category'];
        $row['subTitle']= "";
        $data['row'] = $row;
        $data['category'] = $res;
        $data['title'] = $res['category'];
        $data['keywords'] = $res['category'];
        $data['description'] ="";
        $data['author'] = '5insight org.';
        $data['front_scripts'] = array('frontend_assets/lojanlo/js/load_more.js');
         $where = array('categoryId'=>$res['categoryId']);
        $data['subCategoies']= $this->common_model->getAll('subCategory',$where);
        $this->load->front_render('category', $data, '');
    } 
    public function singleCategory() { 
        
        $pageId = rawurldecode($this->uri->segment(2));
        countView($pageId);
        $this->load->model('home_model');
        $story = $this->home_model->single_story(array('s.status'=>1,'s.storyUrl'=>trim($pageId)));
        (empty($story)) ? redirect(base_url(),true) : '';
        $row['icon'] = "fa fa-hashtag";
        $row['title'] = $story['title'];
        $row['subTitle'] = "";
        $data['page_title'] = $story['title'];
        $data['title'] = $story['title'];
        $data['keywords'] = $story['category'].','.$story['subCategory'].','.$story['title'];
        $data['description'] = substr(strip_tags($story['description']),0,400) . "...";
        $data['author'] = $story['authorBy'].',Post by:'.$story['postBy'];
        $data['imageUrl'] = $story['featuredImage'];
        $data['row'] = $row;
        $userId     = $_SESSION['anonymous'];
        $data_val = array('storyId'=>$story['storyId'],'userId'=>$userId);
        $islike = $this->common_model->is_data_exists('likeStory',$data_val);
        $story['islikeyou']  = isset($islike->isLike) ? $islike->isLike:0;
        $data['story'] = $story;
        $data['front_scripts'] = array('frontend_assets/lojanlo/js/comment.js','frontend_assets/lojanlo/js/like.js','frontend_assets/lojanlo/js/share.js');
        $this->load->front_render('storyPage', $data, '');
    }

    function getComment(){
        $this->load->model('home_model');
        $storyId = decoding($this->input->post('storyId'));
        $data['comment'] = $this->home_model->getComicComment($storyId);
        $this->load->view('comicCommentList',$data);
    }

    function addComment(){
        $postData = $this->input->post();
      //  pr($postData);
        $this->load->model('home_model');
        $this->home_model->addComment($postData);
    } 
}//end class