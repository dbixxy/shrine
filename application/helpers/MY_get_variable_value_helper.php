<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

if (!function_exists('get_variable_value'))
{
    function get_variable_value($line){
        $line_arr = explode("=", $line);
        $data = str_replace(";","", $line_arr[1]);
        $data = str_replace("'","", $data);
        $data = str_replace('"','', $data);
        $data = trim($data);
        return $data;
    }
}
    