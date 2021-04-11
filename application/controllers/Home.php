<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/* Author: Jorge Torres
 * Description: Home controller class
 * This is only viewable to those members that are logged in
 */
 class Home extends MY_Controller{
    public function __construct(){
        parent::__construct();
    }
    
    public function index(){
        $this->data['head_title'] = "หน้าแรก";
        $this->loadData();
        $this->loadViewWithScript(array('banner_part', 'game_part', 'promotion_part', 'payment_part'), array());   //, 'claim_part', 'tournament_part'
    }
    
    public function logout(){
        $this->session->sess_destroy();
        header("Location:".base_url()."Home");
    }
 }
 ?>