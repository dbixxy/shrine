<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');
$config = array();
$config[''] = 'admin.xxx';
$config['my'] = 'my.xx';
/*
	Define the SITE constant.
*/

foreach ($config as $site => $host)
if ($_SERVER['HTTP_HOST'] === $host)
{
    define('SITE', $site);
    break;
}