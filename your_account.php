<?php
include_once('app/init.php');
global $user;
if(isset($_GET['activate']) && isset($_GET['user']) ){
    $can_connect = true;
    $activate = htmlspecialchars($_GET['activate']);
     $email = htmlspecialchars($_GET['user']);
    $send_to_api = "http://whistleblower.ng/api/activation.php?activate=$activate"."&"."user=$email"."";
    $response = file_get_contents($send_to_api);
    $json_response = json_decode($response,true);
    $status = $json_response['status'];
    $message = $json_response['details'];

}else{
    $can_connect = false;
}


?>
 <!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <link rel="apple-touch-icon" sizes="76x76" href="assets/img/apple-icon.png">
	<link rel="icon" type="image/png" sizes="96x96" href="assets/img/favicon.png">

    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
    <title>WhistleBlower.ng | Report Anything corrupt practice that we encounter in our daily lives, business, and community</title>
    <meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0' name='viewport' />
    <link href="assets/css/bootstrap.css" rel="stylesheet" />
    <link href="assets/css/gaia.css" rel="stylesheet"/>

    <!--     Fonts and icons     -->
    <link href='https://fonts.googleapis.com/css?family=Cambo|Poppins:400,600' rel='stylesheet' type='text/css'>
    <link href="http://maxcdn.bootstrapcdn.com/font-awesome/latest/css/font-awesome.min.css" rel="stylesheet">
    <link href="assets/css/fonts/pe-icon-7-stroke.css" rel="stylesheet">
</head>

<body>

           
  <div class="section section-header section-header-small">
        <div class="parallax filter filter-color-black">
            <div class="image"
                style="background-image:url('assets/img/whistles.png')">
            </div>
            <div class="container">
                <div class="content">
                    <h1>Blow Whistle</h1>
                    <h3 class="subtitle">Here's how we start to kick out corruption from our nation</h3>
                </div>
            </div>
        </div>
    </div>
         
   
     <?php 
           
             
                      load_template('not_user_nav');

    ?>  
  
     <div class="section" style="margin-bottom:15em;">
        <div class="container">
        <div class="row">
            <div class="col-lg-7 col-lg-offset-2">
                    
                    <?php
                        if($can_connect == true){
                            if($status == 1){
                         $string = "Your activation is successful, you can  <a href='login.php'>login here </a>";
//                         $string = "Your activation is successful,  <a href='login.php'>Click here to login here </a>";
                        echo   "<div class='alert alert-success'>".$string."<strong></strong></div>";
                            }else{
                                 $string = "$message you can <a href='login.php'>  signup here </a>";
                        echo   "<div class='alert alert-danger'>".$string."<strong></strong></div>";
                            }
                        }else{
                             $string = "You are not authorised to access this page, You can <a href='login.php'> login or signup here </a>";
                        echo   "<div class='alert alert-danger'>".$string."<strong></strong></div>";
                        }    
                    ?>
                </div>



            </div>
        </div>
    </div>
   
   
   

           
          


   
<?php

load_template('footer');
?>
