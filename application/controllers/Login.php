<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/* Author: Jorge Torres
 * Description: Login controller class
 */
class Login extends CI_Controller{
    
    function __construct(){
        parent::__construct();
        // $this->load->library('../controllers/Home');
        //$this->load->library('session');
        $this->load->library('email');
        $this->load->helper('form');
        $this->load->helper('url');
        $this->load->helper('inflector');
        $this->load->helper('cookie');
        $this->load->helper('../../common/helpers/token');
        $this->load->model('Login_model','Login');
        //$this->load->library('../controllers/Home', 'Home');
    }
    
    public function index($msg = NULL){
        $this->data['msg'] = $msg;
        $this->data['head_title'] = "เข้าสู่ระบบ";

        $this->load->view('common/header', $this->data);
        $this->load->view('common/body_top', $this->data);
        $this->load->view('common/menu_part', $this->data);
        $this->load->view('login/login_banner_part', $this->data);
            $this->load->view('login/login_login_part', $this->data);
            $this->load->view('payment_part', $this->data);
        $this->load->view('common/footer',$this->data);
        $this->load->view('common/load_script',$this->data);
        $this->load->view('msg_script',$this->data);
        $this->load->view('common/body_bottom',$this->data);

    }
    
    public function process(){
        // Load the model
        //$this->load->view("welcome_message");
        
        //$this->load->model('Login_model');
        // Validate the user can login
        $result = $this->Login->validate();
        // Now we verify the result
        if($result == 1){
            //echo "Not Pass";
            //$this->load->view("login_view");
            // If user did not validate, then show them login page again
            header("Location:".base_url()."Home");

        }else if($result == 0){
            //$this->load->view("welcome_message");
            // If user did validate, 
            // Send them to members area
            //echo "Passed";
            
            $msg = 'ชื่อผู้ใช้งาน หรือรหัสผ่านไม่ถูกต้อง';
            $this->index($msg);
        }
          
              
    }

    public function signup($msg = NULL){
       
        $this->data['msg'] = $msg;
        $this->data['head_title'] = "เข้าสู่ระบบ";

        $this->load->view('common/header', $this->data);
        $this->load->view('common/body_top', $this->data);
        $this->load->view('common/menu_part', $this->data);
        $this->load->view('login/signup_banner_part', $this->data);
        $this->load->view('login/signup_signup_part', $this->data);
        $this->load->view('payment_part', $this->data);
        $this->load->view('common/footer',$this->data);
        $this->load->view('common/load_script',$this->data);
        $this->load->view('msg_script',$this->data);
        $this->load->view('login/signup_script',$this->data);
        $this->load->view('common/body_bottom',$this->data);
    }

    public function signup_do(){
        $result = $this->Login->signup();

        if($result == 1){
            $msg = "สมัครสมาชิกสำเร็จ โปรดตรวจสอบอีเมลของท่าน เพื่อทำการยืนยัน";
            $this->index($msg);
        }else if($result == 0){
            $msg = "ชื่อผู้ใช้งาน หรืออีเมลนี้ ได้ลงทะเบียนไปแล้ว";
            $this->signup($result);
        }
    }

    public function signup_activate($msg = NULL){
        $this->data['msg'] = $msg;
        $this->data['head_title'] = "ยืนยันมการสมัครสมาชิก";

        $this->load->view('common/header', $this->data);
        $this->load->view('common/body_top', $this->data);
        $this->load->view('common/menu_part', $this->data);
        $this->load->view('login/signup_activate_part', $this->data);
        $this->load->view('common/footer',$this->data);
        $this->load->view('common/load_script',$this->data);
        $this->load->view('msg_script',$this->data);
        $this->load->view('common/body_bottom',$this->data);
    }

    public function signup_activate_do($user_id, $token){
        
        $result = $this->Login->signup_activate($user_id, $token);

        if($result == 1){
            $msg = "ยืนยันสมาชิกสำเร็จ";
            $this->index($msg);
        }else if($result == 0){
            $msg = "ยืนยันสมาชิกไม่สำเร็จ";
            $this->signup($msg);
        }
    }

    public function forget_password($msg = NULL){
        $this->data['msg'] = $msg;
        $this->data['head_title'] = "ลืมรหัสผ่าน";

        $this->load->view('common/header', $this->data);
        $this->load->view('common/body_top', $this->data);
        $this->load->view('common/menu_part', $this->data);
        $this->load->view('login/forget_password_part', $this->data);
        $this->load->view('common/footer',$this->data);
        $this->load->view('common/load_script',$this->data);
        $this->load->view('login/forget_password_script',$this->data);
        $this->load->view('msg_script',$this->data);
        $this->load->view('common/body_bottom',$this->data);
    }

    public function forget_password_do(){
        
        $result = $this->Login->forget_password();

        if($result == 1){
            $user_email = $this->security->xss_clean($this->input->post('user_email'));
 
            $msg = "โปรดตรวจสอบอีเมลของคุณ";
            $this->index($msg);
        }else if($result == 0){
            $msg = "ไม่พบผู้ใช้งาน";
            $this->forget_password($msg);
        }
    }

    public function recovery_password($user_id, $token){

        $result = $this->Login->check_to_recovery_password($user_id, $token);
        if($result == 0){
            $msg = "การขอแก้ไขรหัสผ่านไม่ถูกต้อง";
            $this->index($msg);
        }else if($result == 1){

            $msg = "";
            $this->data['head_title'] = "กู้รหัสผ่าน";
            $this->data['msg'] = $msg;
            $this->data['user_id'] = $user_id;
            $this->load->view('common/header', $this->data);
            $this->load->view('common/body_top', $this->data);
            $this->load->view('common/menu_part', $this->data);
            $this->load->view('login/recovery_password_part', $this->data);
            $this->load->view('common/footer',$this->data);
            $this->load->view('common/load_script',$this->data);
            $this->load->view('login/recovery_password_script',$this->data);
            $this->load->view('common/body_bottom',$this->data);
        }
    }

    public function recovery_password_do(){
        $result = $this->Login->recovery_password();

        if($result == 1){
            $msg = "แก้ไขรหัสผ่านสำเร็จ";
            $this->index($msg);
        }else if($result == 0){
            $msg = "กู้รหัสผ่านล้มเหลว";
            $this->forget_password($msg);
        }
    }

    public function logout(){
        $this->session->sess_destroy();
        header("Location:".base_url()."Home");
    }

    public function send_email($user_email, $subject, $message){
        

        $this->email->from('mjrenx@gmail.com', 'Big Bonus');
        $this->email->to('dbixxy@gmail.com');
        // // $this->email->cc('another@another-example.com');
        // // $this->email->bcc('them@their-example.com');
        
        $this->email->subject($subject);
        $this->email->message($message);
        
        // $this->email->send();
    }
}
?>
