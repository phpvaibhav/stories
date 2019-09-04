<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Job_model extends CI_Model {
    var $column_sel = array('j.*','j.jobId','j.jobName','j.jobTypeId','j.driverId','c.fullName as customerName','jt.jobType','d.fullName as driverName','j.customerId','j.jobStatus','j.startDate','j.startTime','(case when (j.jobStatus = 0) 
        THEN "Open" when (j.jobStatus = 1) 
        THEN "In-progress" when (j.jobStatus = 2) 
        THEN "Completed" ELSE
        "Unknown" 
        END) as statusShow');
    public function __construct(){
        parent::__construct();
    }
    function  jobDetail($jobId){
         $sel_fields = array_filter($this->column_sel); 
         $this->db->select($sel_fields);
        $this->db->from('jobs as j');
        $this->db->join('jobType as jt','j.jobTypeId=jt.jobTypeId');
        $this->db->join('users as c','c.id=j.customerId','left');
        $this->db->join('users as d','d.id=j.driverId','left');
        $this->db->where('j.jobId',$jobId);
        $sql = $this->db->get();
        if($sql->num_rows()):
            return $sql->row_array();
        endif;
        return false;
    }//
    function  assignJobs($where=array()){
        $sel_fields = array_filter($this->column_sel); 
        $this->db->select($sel_fields);
        $this->db->from('jobs as j');
        $this->db->join('jobType as jt','j.jobTypeId=jt.jobTypeId');
        $this->db->join('users as c','c.id=j.customerId','left');
        $this->db->join('users as d','d.id=j.driverId','left');
        !empty($where) ? $this->db->where($where) :"";
        $sql = $this->db->get();
        if($sql->num_rows()):
            return $sql->result();
        endif;
        return false;
    } 


}//Function 