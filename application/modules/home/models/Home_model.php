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
        END) as thumbImage','(select count(visitorId) from visitors as v where v.storyId = s.storyUrl) as viewCount','(select count(likeId) from likeStory as ls where ls.storyId = s.storyId) as likeCount'); //set column field database for datatable orderable
    var $column_search = array('s.title','s.authorBy','u.fullName','s.isFeatured','c.category','sc.subCategory'); //set column field database for datatable searchable 
    var $order = array('s.storyId' => 'DESC');  // default order
    var $where = array();
    var $group_by = 's.storyId'; 
  	public function get_stories($where=array(),$order=array(),$limit=0)
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
		!empty($limit) ? $this->db->limit($limit):"";
		$sql = $this->db->get();
		//lq();
		if($sql->num_rows()){
			$res = $sql->result();
		}
		return $res;
    }//end function  
  public function get_stories_category($where=array(),$order=array(),$search='',$limit=null,$start=null)
    {
        $res =array();
        $sel_fields = array_filter($this->column_sel); 
        $this->db->select($sel_fields);
        $this->db->from('stories as s');
        $this->db->join('category as c','c.categoryId=s.categoryId','left');
        $this->db->join('subCategory as sc','sc.subCategoryId=s.subCategoryId','left');
        $this->db->join('users as u','u.id=s.postedById','left');
        (!empty($where)) ?$this->db->where($where):""; 
                $i = 0;
        foreach ($this->column_search as $emp) // loop column 
        {
            if(isset($search) && !empty($search)){
            $search = $search;
        } else
            $search = '';
        if($search) // if datatable send POST for search
        {
            if($i===0) // first loop
            {
                $this->db->group_start();
                $this->db->like(($emp),$search);
            }
            else
            {
                $this->db->or_like(($emp), $search);
            }

            if(count($this->column_search) - 1 == $i) //last loop
                $this->db->group_end(); //close bracket
        }
        $i++;
        }
        !empty($order) ? $this->db->order_by(key($order), $order[key($order)]) :  $this->db->order_by('s.storyId','DESC');
        $this->db->group_by($this->group_by);
        if($limit!='' && $start!=''){
        $this->db->limit($limit, $start);
        }
        $sql = $this->db->get();
       
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

  function addComment($postData){
    $postData['storyId'] = decoding($postData['storyId']);
    $this->db->insert('comments',$postData);
    return true;
  }

  function getComicComment($storyId){
        $comment = $this->db->order_by('commentId','desc')->get_where('comments',array('storyId' => $storyId,'parentId' => 0))->result_array();
        $i1 = 0;
        foreach ($comment as $comment1) {
            $comment[$i1]['subComment'] = $this->db->get_where('comments',array('storyId' => $storyId,'parentId' => $comment1['commentId']))->result_array();
                //lq();
                $i2 = 0;
                foreach ($comment[$i1]['subComment'] as $comment2) {
                    $comment[$i1]['subComment'][$i2]['subComment'] = $this->db->get_where('comments',array('storyId' => $storyId,'parentId' => $comment2['commentId']))->result_array();

                        $i3 = 0;
                        foreach ($comment[$i1]['subComment'][$i2]['subComment'] as $comment3) {
                            $comment[$i1]['subComment'][$i2]['subComment'][$i3]['subComment'] = $this->db->get_where('comments',array('storyId' => $storyId,'parentId' => $comment3['commentId']))->result_array();

                                $i4 = 0;
                                foreach ($comment[$i1]['subComment'][$i2]['subComment'][$i3]['subComment'] as $comment4) {
                                    $comment[$i1]['subComment'][$i2]['subComment'][$i3]['subComment'][$i4]['subComment'] = $this->db->get_where('comments',array('storyId' => $storyId,'parentId' => $comment4['commentId']))->result_array();

                                        $i5 = 0;
                                        foreach ($comment[$i1]['subComment'][$i2]['subComment'][$i3]['subComment'][$i4]['subComment'] as $comment5) {
                                            $comment[$i1]['subComment'][$i2]['subComment'][$i3]['subComment'][$i4]['subComment'][$i5]['subComment'] = $this->db->get_where('comments',array('storyId' => $storyId,'parentId' => $comment5['commentId']))->result_array();
                                            $i5++;
                                        }

                                    $i4++;
                                }

                            $i3++;
                        }

                    $i2++;
                }

            $i1++;
        }
        return $comment;
    }

}//end class
