<?php if (!defined('BASEPATH'))exit('No direct script access allowed');
class Home_model extends CI_Model {    
   //var $table , $column_order, $column_search , $order =  '';
    var $table = 'stories';
    var $column_order = array('s.storyId','s.title','s.authorBy','s.isFeatured','c.category','sc.subCategory'); //set column field database for datatable orderable
    var $column_sel = array('s.storyId','s.categoryId','s.title','s.authorBy','s.isFeatured','s.storyUrl','s.description','s.status','s.crd as date','c.category','c.pageUrl as catUrl','sc.subCategory','(case when (s.status = 1) 
        THEN "Active" ELSE
        "Inactive" 
        END) as statusShow','(case when (s.isFeatured = 1) 
        THEN "Yes" ELSE
        "No" 
        END) as isFeaturedShow','u.fullName as postBy','(case when (s.featuredImage = "") 
        THEN "frontend_assets/upload/tech_blog_01.jpg" ELSE
        concat("uploads/stories/",s.featuredImage) 
        END) as featuredImage','(case when (s.featuredImage = "") 
        THEN "frontend_assets/upload/tech_blog_01.jpg" ELSE
        concat("uploads/stories/large/",s.featuredImage) 
        END) as largeImage','(case when (s.featuredImage = "") 
        THEN "frontend_assets/upload/tech_blog_01.jpg" ELSE
        concat("uploads/stories/medium/",s.featuredImage) 
        END) as mediumImage','(case when (s.featuredImage = "") 
        THEN "frontend_assets/upload/tech_blog_01.jpg" ELSE
        concat("uploads/stories/thumb/",s.featuredImage) 
        END) as thumbImage'); //set column field database for datatable orderable
    var $column_search = array('s.title','s.authorBy','s.isFeatured','c.category'); //set column field database for datatable searchable 
    var $order = array('s.storyId' => 'DESC');  // default order
    var $where = array();
    var $group_by = 's.storyId'; 
  	public function get_stories($where=array(),$order=array(),$limit=5)
	{
		$res =array();
		$sel_fields = array_filter($this->column_sel); 
		$this->db->select($sel_fields);
		$this->db->from('stories as s');
		$this->db->join('category as c','c.categoryId=s.categoryId','left');
		$this->db->join('subCategory as sc','sc.subCategoryId=s.subCategoryId','left');
		$this->db->join('users as u','u.id=s.postedById','left');
		(!empty($where)) ?$this->db->where($where):""; 
		!empty($order) ? $this->db->order_by(key($order), $order[key($order)]) :  $this->db->order_by('s.storyId','DESC');
		$this->db->group_by($this->group_by);
		$this->db->limit($limit);
		$sql = $this->db->get();
		//lq();
		if($sql->num_rows()){
			$res = $sql->result();
		}
		return $res;
  }//end function   
  public function single_story($where=array())
    {
        $res =array();
        $sel_fields = array_filter($this->column_sel); 
        $this->db->select($sel_fields);
        $this->db->from('stories as s');
        $this->db->join('category as c','c.categoryId=s.categoryId','left');
        $this->db->join('subCategory as sc','sc.subCategoryId=s.subCategoryId','left');
        $this->db->join('users as u','u.id=s.postedById','left');
        (!empty($where)) ?$this->db->where($where):""; 
      
        $this->db->limit(1);
        $sql = $this->db->get();
        //lq();
        if($sql->num_rows()){
            $res = $sql->row_array();
        }
        return $res;
  }//end function
}//end class
