<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Stories_model extends CI_Model {
      //var $table , $column_order, $column_search , $order =  '';
    var $userPath    ='uploads/stories/medium/';
    var $userDefault = 'frontend_assets/upload/tech_blog_01.jpg';
    var $table = 'stories';
    var $column_order = array('s.storyId','s.title','s.authorBy','s.isFeatured','c.category','sc.subCategory'); //set column field database for datatable orderable

    var $column_sel = array('s.*','s.title','s.authorBy','s.isFeatured','s.status','s.crd','c.category','sc.subCategory','(case when (s.status = 1) 
        THEN "Active" ELSE
        "Inactive" 
        END) as statusShow','(case when (s.isFeatured = 1) 
        THEN "Yes" ELSE
        "No" 
        END) as isFeaturedShow','(case when (s.featuredImage = "") 
        THEN "frontend_assets/upload/tech_blog_01.jpg" ELSE
        concat("uploads/stories/",s.featuredImage) 
        END) as featuredImage'); //set column field database for datatable orderable
    var $column_search = array('s.title','s.authorBy','s.isFeatured','c.category'); //set column field database for datatable searchable 
    var $order = array('s.storyId' => 'DESC');  // default order
    var $where = array();
    var $group_by = 's.storyId'; 
    public function __construct(){
        parent::__construct();
    }
    function  storyDetail($storyId){
         $sel_fields = array_filter($this->column_sel); 
         $this->db->select($sel_fields);
        $this->db->from('stories as s');
        $this->db->join('category as c','c.categoryId=s.categoryId');
        $this->db->join('subCategory as sc','sc.subCategoryId=s.subCategoryId');
        $this->db->where('s.storyId',$storyId);
        $sql = $this->db->get();
       // lq();
        if($sql->num_rows()):
            return $sql->row_array();
        endif;
        return false;
    }//
   


}//Function 