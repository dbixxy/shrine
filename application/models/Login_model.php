<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');
/* Author: Jorge Torres
 * Description: Login model class
 */

class Login_model extends CI_Model {

    function __construct() {
        parent::__construct();
        $this->load->helper('cookie');
        
    }

    public function validate() {
        $username = $this->security->xss_clean($this->input->post('username'));
        $password = $this->security->xss_clean($this->input->post('password'));

        $password = md5($password);

        $sql = "SELECT u.user_id, u.username, u.password, u.user_email
                FROM cas_user u
                WHERE u.username = '" . $username . "' 
                AND u.password = '" . $password . "' 
                AND u.activated = 1 
                AND u.deleted = 0";
        //echo $sql;
        //$row = $this->db->query($sql)->row();
        $query = $this->db->query($sql);
        //$result = $query->result();
        $row = $query->row();


        // Let's check if there are any results
        if ($row) {
            date_default_timezone_set("Asia/Bangkok");
            $last_login_time = date('Y-m-d H:i:s');
            $data = array(
                'last_login' => $last_login_time
            );
            $this->db->where('user_id', $row->user_id);
            $result = $this->db->update('cas_user', $data);

            $_SESSION['user_id'] = $row->user_id;
            $_SESSION['username'] =  $row->username;
            $_SESSION['user_email'] = $row->user_email;
            $_SESSION['validated'] = true;
            
            return 1;
        }
        // If the previous process did not validate
        // then return false.
        return 0;
    }

    public function signup(){

        $username = $this->security->xss_clean($this->input->post('username'));
        $password = $this->security->xss_clean($this->input->post('password'));
        $user_email = $this->security->xss_clean($this->input->post('user_email'));

        $password = md5($password);

        $sql = "SELECT u.username, u.user_email
                FROM cas_user u
                WHERE u.username = '" . $username . "' 
                OR u.user_email = '" . $user_email . "'";

        $query = $this->db->query($sql);

        //$result = $this->db->query($sql)->result();
        if($query->num_rows() <= 0){

            $user_id =  uniqid();
            $token = get_token();
            date_default_timezone_set("Asia/Bangkok");
            $token_expire_time = date("Y-m-d H:i:s", strtotime("+30 minutes"));
            $create_time = date("Y-m-d H:i:s");
            $data = array(
                'user_id' => $user_id,
                'username' => $username,
                'password' => $password,
                'user_email' => $user_email,
                'activated' => 0,
                'token' => $token,
                'token_expire_time' => $token_expire_time,
                'create_by' => $user_id,
                'create_time' => $create_time
            );
            $result = $this->db->insert('cas_user', $data);
            $msg = 1;
            // send email


        }
        else{
            $msg = 0; // "ชื่อผู้ใช้งาน หรืออีเมลนี้ ได้ลงทะเบียนไปแล้ว";
        }
        return $msg;
    }

    public function signup_activate($user_id, $token){
        $sql = "SELECT u.user_id, u.token
                FROM cas_user u
                WHERE u.user_id = '" . $user_id . "' 
                AND u.token = '" . $token . "'
                AND u.token_expire_time >= NOW()";

        $query = $this->db->query($sql);

        //$result = $this->db->query($sql)->result();
        if($query->num_rows() > 0){

            $token = get_token();
            date_default_timezone_set("Asia/Bangkok");
            $token_expire_time = date("Y-m-d H:i:s", strtotime("+30 minutes"));
            $update_time = date("Y-m-d H:i:s");
            $data = array(
                'activated' => 1,
                'token' => $token,
                'token_expire_time' => $token_expire_time,
                'update_by' => $user_id,
                'update_time' => $update_time
            );
            $this->db->where('user_id', $user_id);
            $result = $this->db->update('cas_user', $data);
            $msg = 1;
        }
        else{
            $msg = 0; // "ยืนยันการลงทะเบียนไม่ภูกต้อง";
            
        }
        return $msg;

    }

    public function forget_password(){
        $user_email = $this->security->xss_clean($this->input->post('user_email'));

        $sql = "SELECT u.user_id
                FROM cas_user u
                WHERE u.user_email = '" . $user_email . "'
                AND activated = 1
                AND deleted = 0";

        $query = $this->db->query($sql);

        //$result = $this->db->query($sql)->result();
        if($query->num_rows() > 0){
            $row = $query->row();
            $user_id = $row->user_id;
            $token = get_token();
            date_default_timezone_set("Asia/Bangkok");
            $token_expire_time = date("Y-m-d H:i:s", strtotime("+30 minutes"));
            $update_time = date("Y-m-d H:i:s");
            $data = array(
                'token' => $token,
                'token_expire_time' => $token_expire_time,
                'update_by' => $user_id,
                'update_time' => $update_time
            );
            $this->db->where('user_id', $user_id);
            $result = $this->db->update('cas_user', $data);
            $msg = 1;
        }
        else{
            $msg = 0 ; // "ไม่พบผู้ใช้งาน";
            
        }
        return $msg;

    }

    public function check_to_recovery_password($user_id, $token){
        $sql = "SELECT u.user_id, u.token
                FROM cas_user u
                WHERE u.user_id = '" . $user_id . "' 
                AND u.token = '" . $token . "'
                AND u.token_expire_time >= NOW()";

        $query = $this->db->query($sql);
        $result = $query->result();
        //$result = $this->db->query($sql)->result();
        if(($result) && ($query->num_rows() > 0)){
            $msg = 1;
        }
        else{
            $msg = 0; // "การขอแก้ไขรหัสผ่านไม่ถูกต้อง";  
        }
        return $msg;
    }

    public function recovery_password(){
        $user_id = $this->security->xss_clean($this->input->post('user_id'));
        $password = $this->security->xss_clean($this->input->post('password'));
        
        $password = md5($password);
        
        $token = get_token();
        date_default_timezone_set("Asia/Bangkok");
        $token_expire_time = date("Y-m-d H:i:s", strtotime("+30 minutes"));
        $update_time = date("Y-m-d H:i:s");

        $data = array(
            'password' => $password,
            'token' => $token,
            'token_expire_time' => $token_expire_time,
            'update_by' => $user_id,
            'update_time' => $update_time
        );
        $this->db->where('user_id', $user_id);
        $result = $this->db->update('cas_user', $data);

        if($result){
            $msg = 1;
        }
        else{
             $msg = 0; // "กู้รหัสผ่านล้มเหลว";
        }
        return $msg;
    }
}

?>