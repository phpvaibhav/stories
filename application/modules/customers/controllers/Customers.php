<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Customers extends Common_Back_Controller {

    public $data = "";

    function __construct() {
        parent::__construct();
        $this->check_admin_user_session();
        //$this->load->library('pdf');
     
    }

    public function index() { 
        
        $data['title'] = 'Customers';
        $count = $this->common_model->get_total_count('users',array('userType' =>1));
        $data['recordSet'] = array('<li class="sparks-info"><h5>Customer<span class="txt-color-blue"><a class="anchor-btn" data-toggle="modal" data-target="#addCustomers"><i class="fa fa-plus-square"></i></a></span></h5></li>','<li class="sparks-info"><h5>Total Customers <span class="txt-color-darken" id="totalCust"><i class="fa fa-lg fa-fw fa fa-users"></i>&nbsp;'.$count.'</span></h5></li>');
         $data['front_scripts'] = array('backend_assets/custom/js/customer.js');
        $this->load->admin_render('customers', $data);
    } 
    public function customerDetail(){
      //pr('admin@admin.com');
        $userId  = decoding($this->uri->segment(3));
           $data['recordSet'] = array();

        $data['title'] = "Customer Detail";
        $where = array('id'=>$userId);
        $result = $this->common_model->getsingle('users',$where);
        $data['front_scripts'] = array('backend_assets/custom/js/customer.js');
        $data['customer'] = $result;
        $this->load->admin_render('customerDetail', $data, '');
    } //end function

}//end Class