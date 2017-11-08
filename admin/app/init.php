<?php
//ob_start();
session_start();

include('config/config.php');

include('helpers/helpers.php');

include('classes/User.php');

//global $db_conn;

//include_once 'classes/User.php';
//include_once 'classes/Admin.php';
//include_once 'classes/Settings.php';
//include_once 'classes/System.php';
//
$user = new User();
//$admin = new Admin($db_conn);
//$settings = new Settings($db_conn);
//$system = new System($db_conn);
//
