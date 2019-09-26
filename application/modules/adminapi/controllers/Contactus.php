<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
//General service API class 
class Contactus extends Common_Admin_Controller{
    
    public function __construct(){
        parent::__construct();
       
    }
    public function contactUs_post(){
        
        
        $this->form_validation->set_rules('fullName', 'full Name', 'trim|required|min_length[2]'); $this->form_validation->set_rules('fullName', 'fullName', 'trim|required');
         $this->form_validation->set_rules('email', 'Email', 'trim|required|valid_email');
          $this->form_validation->set_rules('contact', 'Contact Number', 'trim|required|min_length[10]|max_length[20]');
          $this->form_validation->set_rules('subject', 'subject', 'trim|required');
          $this->form_validation->set_rules('message', 'message', 'trim|required');
        
        if($this->form_validation->run() == FALSE){
            $response = array('status' => FAIL, 'message' => strip_tags(validation_errors()));
            
        }else{
              
            $data_val['fullName']       	= $this->post('fullName');
            $data_val['email']              = $this->post('email');
            $data_val['contact']            = $this->post('contact');
            $data_val['subject']            = $this->post('subject');
            $data_val['message']            = $this->post('message');
                $result     = $this->common_model->insertData('contactus',$data_val);
                $status     = SUCCESS;
                $msg        = "Message delivered successfully.";
            	
                
                if($result){
                  
                     $response = array('status'=>$status,'message'=>$msg);
                }else{
                     $response = array('status'=>FAIL,'message'=>ResponseMessages::getStatusCodeMessage(118));
                }  
        }
        $this->response($response);
    }//end function 
    function contactList_post(){
       $this->load->helper('text');
        $this->load->model('contact_model');
        $this->contact_model->set_data();
        $list = $this->contact_model->get_list();
        
        $data = array();
        $no = $_POST['start'];
        foreach ($list as $serData) { 
        $action ='';
        $no++;
        $row = array();
        $row[] = $no;
        //$row[] = '<img src='.base_url($serData->profileImage).' alt="user profile" style="height:50px;width:50px;" >';
        $row[] = display_placeholder_text($serData->fullName); 
        $row[] = display_placeholder_text($serData->email); 
        $row[] = display_placeholder_text($serData->contact); 
        $row[] = display_placeholder_text($serData->subject); 
        $row[] = display_placeholder_text($serData->message); 
        if($serData->reply){
        $row[] = '<label class="label label-success">'.$serData->replyShow.'</label>';
        }else{ 
        $row[] = '<label class="label label-danger">'.$serData->replyShow.'</label>'; 
        } 
            $link  ='javascript:void(0)';
            $action .= "";
      /*  if($serData->status){

            $action .= '<a href="'.$link.'" onclick="customerStatus(this);" data-message="You want to change status!" data-useid="'.encoding($serData->id).'"  class="on-default edit-row table_action" title="status"><i class="fa fa-check" aria-hidden="true"></i></a>&nbsp;&nbsp;|';
        }else{
             $action .= '&nbsp;&nbsp;<a href="'.$link.'" onclick="customerStatus(this);" data-message="You want to change status!" data-useid="'.encoding($serData->id).'"  class="on-default edit-row table_action" title="status"><i class="fa fa-times" aria-hidden="true"></i></a>&nbsp;&nbsp;|';
        }*/
      
              

        $row[] = $action;
        $data[] = $row;

        }

        $output = array(
            "draw" => $_POST['draw'],
            "recordsTotal" => $this->contact_model->count_all(),
            "recordsFiltered" => $this->contact_model->count_filtered(),
            "data" => $data,
        );
        //output to json format
       
        $this->response($output);
    }//end function





}//End Class 

