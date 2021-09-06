<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class ADMIN_Controller extends CI_Controller {

    function __construct()
    {
        parent::__construct();

        $logged_in_value = 'logged_in';
        $redirect_url = 'admin/login';

        if (SITE == 'my')
        {
            $logged_in_value = 'my_logged_in';
            $redirect_url = 'my/mylogin';
        }

        if($this->session->userdata($logged_in_value) !== TRUE)
        {
            $this->session->set_userdata('redirect_url', current_url());
            redirect($redirect_url);
        }
    }
}