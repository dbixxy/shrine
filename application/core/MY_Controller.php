<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class MY_Controller extends CI_Controller {


    function __construct()
    {

        parent::__construct();

        //Initialization code that affects all controllers
        $this->load->library('session');
        $this->load->helper('form');
        $this->load->helper('url');
        $this->load->helper('inflector');
        $this->load->helper('cookie');
        $this->load->helper('../../common/helpers/thai_date');
        if($this->check_isvalidated()){

        }

    }

    protected function loadData(){
        $this->data['session_user_id'] = $this->session->user_id;
        $this->data['session_username'] = $this->session->username;
        $this->data['session_user_email'] = $this->session->user_email;
        $this->data['session_validated'] = $this->session->validated;
    }
    
    protected function loadView($body_views){
        $this->load->view('common/header', $this->data);
        $this->load->view('common/body_top', $this->data);
        $this->load->view('common/menu_part', $this->data);
        foreach($body_views as $body_view){
            $this->load->view($body_view, $this->data);
        }
        $this->load->view('common/footer',$this->data);
        $this->load->view('common/load_script',$this->data);
        $this->load->view('common/body_bottom',$this->data);
    }

    protected function loadViewWithScript($body_views,$body_scripts){
        $this->load->view('common/header', $this->data);
        $this->load->view('common/body_top', $this->data);
        $this->load->view('common/menu_part', $this->data);
        foreach($body_views as $body_view){
            $this->load->view($body_view, $this->data);
        }
        $this->load->view('common/footer',$this->data);
        $this->load->view('common/load_script',$this->data);
        foreach($body_scripts as $body_script){
            $this->load->view($body_script, $this->data);
        }
        $this->load->view('common/body_bottom',$this->data);
    }
    
    protected function check_isvalidated(){
        if((!isset($this->session->validated)) || (!$this->session->validated)){
            return false;
        }
        else{
            return true;
        }
    }

    protected function check_canAccess($class_name, $method_name){
        // $tmp = $class_name . "/" . $method_name;
        // if(in_array($tmp,$this->session->access, TRUE)){
        //     return true;
        // }
        header("location:javascript://history.go(-1)");
    }

}
