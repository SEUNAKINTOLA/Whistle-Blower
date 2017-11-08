<?php



$config['SITE_URL'] = 'http://whistleblower.ng/';

$config['SITE_ASSETS'] = $config['SITE_URL'].'admin/assets/';
$config['SITE_PATH'] = $_SERVER['DOCUMENT_ROOT'].'/admin/';


//
////DATABASE CONFIGURATION
//$config['DB_HOST'] = 'localhost';
//$config['DB_USER'] = 'root';
//$config['DB_PASS'] = '';
//$config['DB_NAME'] = 'cloudware_mlm';



foreach ($config as $key => $value) {
    define($key, $value);
}