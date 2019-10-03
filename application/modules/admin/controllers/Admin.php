<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Admin extends Common_Back_Controller {

    public $data = "";

    function __construct() {
        parent::__construct();
        $this->check_admin_user_session();
      //  $this->load->model('admin_model');
    }

    public function index() { 
        
        $data['title'] = "Login";
        $this->load->login_render('login', $data);
    }
    public function signup() { 

    $data['title'] = "Sign up";
    $this->load->login_render('signup', $data);
    }
    public function forgot() { 

    $data['title'] = "Forgot";
    $this->load->login_render('forgot', $data);
    }

 
     public function logout() {

        $this->admin_logout(FALSE);
        $this->session->set_flashdata('success', 'Sign out successfully done! ');
        $response = array('status' => 1);
        redirect(base_url());
        echo json_encode($response);
        die;
    }
    
    public function dashboard() {
       
        $data['parent'] = "Dashboard";
        $data['title'] = '<i class="fa-fw fa fa-home"></i> Dashboard';
        $data['customers'] = $this->common_model->get_total_count('users',array('userType' =>1));
        $data['stories'] = $this->common_model->get_total_count('stories');
        $data['category'] = $this->common_model->get_total_count('category');
        $data['subCategory'] = $this->common_model->get_total_count('subCategory');
        
        $this->load->admin_render('dashboard', $data, '');
    }
     public function contactus() {
           
            $data['parent'] = "Contacts us";
            $data['title'] = '<i class="fa-fw fa fa-envelope"></i> Contacts us';
            $data['front_scripts'] = array('frontend_assets/js/contactus.js');
            $this->load->admin_render('contactus', $data, '');
    }   

      //view admin profile
    public function admin_profile(){

        $data['title'] = "Admin profile";
        $where = array('id'=>$_SESSION[ADMIN_USER_SESS_KEY]['id']);
        $result = $this->common_model->getsingle(ADMIN,$where);
        $data['userData'] = $result;
        $this->load->admin_render('admin_profile', $data, '');
    }
    //update admin profile
    public function admin_update(){
        $this->form_validation->set_rules('fullName','name','trim|required');
        $this->form_validation->set_rules('email','email','trim|required');
        if($this->form_validation->run($this) == FALSE){
           $messages = (validation_errors()) ? validation_errors() : '';
           $response = array('status' => 0, 'message' => $messages);
        }
        else{
           $update_data = array();
            $image = array(); 
            $where_id = $this->input->post('admin_id');
            $existing_img = $this->input->post('exit_image');

            if (!empty($_FILES['image']['name'])) {
                $this->load->model('Image_model');
                $folder = 'user_avatar';
                $image = $this->Image_model->upload_image('image',$folder); //upload media of 
            }
            if(array_key_exists("error",$image) && !empty($image['error'])){
                $response = array('status' => 0, 'message' =>$image['error']); 
                echo json_encode($response); die;   
            }      
               
            if(array_key_exists("image_name",$image)){

                $admin_image = $image['image_name'];
                if(!empty($admin_image)){
                    $update_data['image'] = $admin_image;
                    $this->Image_model->delete_image(USER_AVATAR_PATH,$existing_img);
                }
            }

            $set = array('fullName','email');
            foreach ($set as $key => $val) {
                $post= $this->input->post($val);
                $update_data[$val] = (isset($post) && !empty($post)) ? $post :''; 
            }
            $update_where = array('id'=>$where_id);
            $userId = $this->common_model->updateFields(ADMIN, $update_data, $update_where);

           
            $u_id = $_SESSION[ADMIN_USER_SESS_KEY]['id'];
            $user = $this->common_model->getsingle(ADMIN, array('id'=>$u_id));
            //update session 
            $_SESSION[ADMIN_USER_SESS_KEY]['fullName']   = $user->fullName ;
            $_SESSION[ADMIN_USER_SESS_KEY]['email']      = $user->email ;
            $_SESSION[ADMIN_USER_SESS_KEY]['image']      = $user->image;
            $_SESSION[ADMIN_USER_SESS_KEY]['isLogin']    = TRUE ;
           
            $response = array('status' => 1, 'message' => 'Successfully Updated', 'url' => base_url('admin/admin_profile'));
           
        }
        echo json_encode($response); die;
    }

    public function changePassword()
    {

        $this->load->library('form_validation');
        $this->form_validation->set_rules('password', 'password', 'trim|required|min_length[6]');
        $this->form_validation->set_rules('npassword', 'new password', 'trim|required|matches[rnpassword]|min_length[6]');
        $this->form_validation->set_rules('rnpassword', 'retype new password ','trim|required|min_length[6]');

        
       if($this->form_validation->run($this) == FALSE){
           $messages = (validation_errors()) ? validation_errors() : '';
           $response = array('status' => 0, 'message' => $messages);
        }
        else 
        {
            $password =$this->input->post('password');
            $npassword =$this->input->post('npassword');
            $select = "password";
            $where = array('id' => $_SESSION[ADMIN_USER_SESS_KEY]['id']); 
            $admin = $this->common_model->getsingle(ADMIN, $where,'password');
            if(password_verify($password, $admin->password)){
                $set =array('password'=> password_hash($this->input->post('npassword') , PASSWORD_DEFAULT)); 
                $update = $this->common_model->updateFields(ADMIN, $set, $where);
                if($update){
                    $res = array();
                    if($update){
                        $response = array('status' => 1, 'message' => 'Successfully Updated', 'url' => base_url('admin/admin_profile'));
                    }
                    else{
                         $response = array('status' => 0, 'message' => 'Failed! Please try again', 'url' => base_url('admin/admin_profile'));
                        
                    }
                    
                } 
            }else{
                 $response = array('status' => 0, 'message' => 'Your Current Password is Wrong !', 'url' => base_url('admin/admin_profile'));                 
            }
        }
        echo json_encode($response); die;  
    }//End Function
   

}