<?php (defined('BASEPATH')) OR exit('No direct script access allowed');

/* load the MX_Loader class */
require APPPATH."third_party/MX/Loader.php";

class MY_Loader extends MX_Loader {

    function front_render($template_name, $vars = array(), $page_script = '') {
        $vars['menus'] = $this->common_model->getAll('category',array('status'=>1,'showMenu'=>1),'category','asc');
        $vars['subMenus'] = $this->common_model->getAll('category',array('status'=>1,'showMenu !='=>1),'category','asc');
        $vars['title']  = (isset($vars['title']) && !empty($vars['title'])) ? $vars['title'] :" Lojanlo";
        $vars['keywords'] =  "lojanlo,lo-jan-lo,kisse kahini,ansuni kahani ,mazedar kisse,kisse,kisse kahani,ansuni kahani hindi,book,books,stories,story,blogs,artcles,biography,current affairs,lojanlo,lo jan lo,lo jaan lo,kahani,khekh,kavita,shayri,kavi, rajneta,shahitya,shahityakar,political story,poem,writer,cricketer,cricket,history,mistory,old story,purani kahani, bollywood,hollywood,tollywood,hero,actor,actress,heroing,abhineta,abhinetri,kavitri,shayar,shayra,mushayara,gajal,sangeet, music,instrument,instumental,institute,institution,environment,status,natinal,internatinal,#lojanloappweb,#artical,#stroy,#book,#shayri,#kavi,".((isset($vars['keywords']) && !empty($vars['keywords'])) ? $vars['keywords']:"");
        $vars['description']    = (isset($vars['description']) && !empty($vars['description'])) ? $vars['description']:"Lojanlo believe it is important that we make the best use of the gift of knowledge and share to as many as possible so that we achieve great feats and heights in every domain of our life. Lojanlo is a sharing blog, we share stories, news and articles.";
        $vars['author']         = (isset($vars['author']) && !empty($vars['author'])) ? $vars['author']:"5insight org.";
       
        $this->view('frontend_includes/front_header', $vars);
        $this->view($template_name, $vars);
        
        $this->view('frontend_includes/front_footer', $vars);
        //$this->view('front_includes/common_script', $vars);
        if (!empty($page_script)):
            $this->view($page_script, $vars);
        endif;
    }

    function front_render_minimal($template_name, $vars = array(), $page_script = ''){
        //$this->view('frontend_includes/front_header', $vars);
        $this->view('frontend_includes/front_header_minimal', $vars);
        $this->view($template_name, $vars);
        
        $this->view('frontend_includes/front_footer_minimal', $vars);
        //$this->view('front_includes/common_script', $vars);
        if (!empty($page_script)):
            $this->view($page_script, $vars);
        endif;
    }

    function login_render($template_name, $vars = array(), $page_script = '') {
        
        
        $this->view('backend_includes/login_header', $vars);
        
        $this->view($template_name, $vars);
       
        $this->view('backend_includes/login_footer', $vars);
        //$this->view('backend_includes/back_script', $vars);
        if (!empty($page_script)):
            $this->view($page_script, $vars);
        endif;
    } 
    function admin_render($template_name, $vars = array(), $page_script = '') {
 
        $user_sess_data = $_SESSION[ADMIN_USER_SESS_KEY]; 
        $session_u_id = $user_sess_data['id']; //user ID
     
        $where = array('id'=>$session_u_id,'status'=>1); //status:0 means active 
        $uData = $this->common_model->adminInfo($where);
        
        $vars['user'] =  $uData;
        $this->view('backend_includes/admin_header', $vars);
        $this->view($template_name, $vars);

        $this->view('backend_includes/admin_footer', $vars);
        //$this->view('backend_includes/back_script', $vars);
        if (!empty($page_script)):
            $this->view($page_script, $vars);
        endif;
    }
}
