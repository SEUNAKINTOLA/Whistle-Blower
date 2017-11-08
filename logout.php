<?php
include_once('app/init.php');
global $user;
if($user->logout()){
  header("Location: index.php");
}




?>