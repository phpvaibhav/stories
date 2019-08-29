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
    function  assignJobs($where){
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
    function  jobDetail($jobId){
        $this->column_sel[] = 'j.jobReport';
         $sel_fields = array_filter($this->column_sel); 
         $this->db->select($sel_fields);
        $this->db->from('jobs as j');
        $this->db->join('jobType as jt','j.jobTypeId=jt.jobTypeId');
        $this->db->join('users as c','c.id=j.customerId','left');
        $this->db->join('users as d','d.id=j.driverId','left');
        $this->db->where('j.jobId',$jobId);
        $sql = $this->db->get();
        if($sql->num_rows()):
           $row = $sql->row();
           $report = !empty($row->jobReport) ? json_decode($row->jobReport,true): array();
            if(!empty($report)):
                $bimage = $aimage = array();
                $report['beforeWork']['driverSignature'] = S3JOBS_URL.$report['beforeWork']['driverSignature'];
                $beforeWorkImage = $report['beforeWork']['workImage'];
                for ($i=0; $i <sizeof($beforeWorkImage) ; $i++) { 
                  $bimage[] = S3JOBS_URL.$beforeWorkImage[$i];
                }
                $report['beforeWork']['workImage']          = $bimage;
                $report['afterWork']['customerSignature']   = S3JOBS_URL.$report['afterWork']['customerSignature'];
                $afterWorkImage = $report['afterWork']['workImage'];
                for ($j=0; $j <sizeof($afterWorkImage) ; $j++) { 
                  $aimage[] = S3JOBS_URL.$afterWorkImage[$j];
                }
                $report['afterWork']['workImage'] = $aimage;
            endif;
            $row->jobReport = $report;
            $row->generatePdf  = base_url().'pdfset/download/'.encoding($row->jobId);
         
            return $row;
        endif;
        return false;
    }


}//Function 