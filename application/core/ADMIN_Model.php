<?php

class ADMIN_Model extends CI_Model
{
    function __construct()
    {
        parent::__construct();

        //If the site is for my.xxx load new db config
        $site = SITE; 
    }
}