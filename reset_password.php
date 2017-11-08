<?php
include_once('app/init.php');
if(isset($_GET['code']) && isset($_GET['user']) ){
    $can_connect = true;
    $code = htmlspecialchars($_GET['code']);
     $email = htmlspecialchars($_GET['user']);
    

}else{
    $can_connect = false;
    $error= "<div class='alert alert-danger'><strong>You are not authorised to access this page</strong></div>";
}

if(isset($_POST['reset_password'])){
     $can_connect = true;
     $error = "";
    $newpassword = htmlspecialchars($_POST['newpassword']);
    $confirm_newpassword = htmlspecialchars($_POST['confirm_newpassword']);
    $code = htmlspecialchars($_POST['code']);
    $email = htmlspecialchars($_POST['email']);
    if($newpassword == $confirm_newpassword){
        $newpassword = md5($newpassword);
        $send_to_api = "http://whistleblower.ng/api/reset.php?code=$code"."&"."user=$email"."&"."password=$newpassword"."";
        $response = file_get_contents($send_to_api);
        var_dump($response);
        $json_response = json_decode($response,true);
        $status = $json_response['status'];
        $message = $json_response['details'];
        
        $success ="<div class='alert alert-success'><strong>". $message." you can <a href='index.php'>login here</a>". "</strong></div>";
    }else{
        $error = "<div class='alert alert-danger'><strong>password entered does not matched</strong></div>";
    }
    
}

?>
    <!DOCTYPE html>
    <html lang="en">

    <head>
        <meta charset="utf-8"/>
        <link rel="apple-touch-icon" sizes="76x76" href="<?php load_asset('img/apple-icon.png') ?>">
        <link rel="icon" type="image/png" sizes="96x96" href="<?php load_asset('img/favicon.png') ?>">

        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1"/>
        <title>WhistleBlower.ng | Report Anything corrupt practice that we encounter in our daily lives, business, and
            community</title>
        <meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0' name='viewport'/>
        <link href="<?php load_asset('css/bootstrap.css') ?>" rel="stylesheet"/>
        <link href="<?php load_asset('css/gaia.css') ?>" rel="stylesheet"/>

        <!--     Fonts and icons     -->
        <link href='https://fonts.googleapis.com/css?family=Cambo|Poppins:400,600' rel='stylesheet' type='text/css'>
        <link href="http://maxcdn.bootstrapcdn.com/font-awesome/latest/css/font-awesome.min.css" rel="stylesheet">
        <link href="<?php load_asset('css/fonts/pe-icon-7-stroke.css') ?>" rel="stylesheet">

        <link href="assets/css/custom.css" rel="stylesheet"/>
        <link href="assets/css/login-register.css" rel="stylesheet"/>
        <script src="assets/js/login-register.js" type="text/javascript"></script>
    </head>

<body>


<?php load_template('nav') ?>


    <div class="section section-header">
        <div class="parallax filter filter-color-black">
            <div class="image"
                 style="background-image: url('assets/img/home-page-slidder.png')">
            </div>
            <div class="container">
                <div class="content">

                    <!-- Page -->
                    <div class="row">
                        <!--                  col-md-3 .col-md-offset-3-->
                        <div class="col-md-4" style="margin-left: 500px">

                            <div class="page animsition vertical-align text-center" data-animsition-in="fade-in"
                                 data-animsition-out="fade-out">
                                <div class="page-content vertical-align-middle">
<!--                                    <h2>Forgot Your Password ?</h2>-->
                                <?php
                                        if($can_connect == true){
                                            if(!empty($error)){
                                                echo $error;
                                                unset($error);
                                            }
                                            if(!empty($success)){
                                                echo $success;
                                                unset($success);
                                            }
                                
                                ?>
                                    

                                    <form method="post" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" role="form">
                                       
                                        
                                        <div class="form-group">
                                            <label>Enter new password</label>
                                            <input type="password" class="form-control" id="inputEmail" name="newpassword"
                                                   placeholder="Your New Password">
                                        </div>
                                         <div class="form-group">
                                                <label>Confirm new password</label>
                                            <input type="password" class="form-control" id="inputEmail" name="confirm_newpassword"
                                                   placeholder="Your New Password">
                                            <input type="hidden" class="form-control" id="inputEmail" name="code" value="<?php echo $code; ?>"
                                                   />
                                            <input type="hidden" class="form-control" id="inputEmail" name="email" value="<?php echo $email; ?>"
                                                   />               
                                        </div>
                                        <div class="form-group">
                                            <button type="submit" name="reset_password" class="btn btn-primary "
                                                    style="background: #ed1c24;color: #ffffff">Reset Your Password
                                            </button>
                                        </div>
                                    </form>
                                <?php
                                        }else{
                                            echo $error;
                                        }
                                
                                ?>

                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- End Page -->

                </div>

            </div>
        </div>
    </div>


<?php
load_template('footer')
?>