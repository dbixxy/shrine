<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/* Author: Jorge Torres
 * Description: Home controller class
 * This is only viewable to those members that are logged in
 */

 class Games extends CI_Controller{
    public function __construct(){
        parent::__construct();
    }
    
    public function index(){
        echo "TEST";
    }

    public function slot(){

        $this->data['head_title'] = "Fruit Slot Machine";
        $this->loadData();
        // $this->loadView(array("games/slot/home_header","games/slot/home_view","games/slot/script_include","games/slot/home_script","games/slot/home_footer"));
        $this->loadView(array("games/slot/game_view"));
    }
  
    protected function loadData(){
        $this->data['session_user_id'] = $this->session->user_id;
        $this->data['session_username'] = $this->session->username;
        $this->data['session_user_email'] = $this->session->user_email;
        $this->data['session_validated'] = $this->session->validated;
    }
    
    protected function loadView($body_views){
        foreach($body_views as $body_view){
            $this->load->view($body_view, $this->data);
        }
    }

 }
 ?>