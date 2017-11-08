<?php
include_once('app/init.php');
//
// global $user;
//if ($user->is_loggedin()) {
//    $user_is_logged_in = "yes";
//} else {
//    $user_is_logged_in = "no";
//}

?>


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

<?php load_template('not_user_nav')?>
<div class="section section-header section-header-small">
    <div class="parallax filter filter-color-black">
        <div class="image"
             style="background-image:url('assets/img/how-it-works.png')">
        </div>
        <div class="container">
            <div class="content">
                <h1>Login</h1>

            </div>
        </div>
    </div>
</div>



<div class="section">
    <div class="container">
        <div class="row">
            <div class="col-lg-6 col-md-offset-3">

                <form method="get"  action="#" id="form-login"  accept-charset="UTF-8">
                    <span id="login_error"></span>
                    <label style="color:#AC2925 " for="first_name">Email:</label>
                    <input id="lemail"  class="form-control" type="text" placeholder="Email" name="email">
                    <label style="color:#AC2925 " for="password">Password:</label>
                    <input id="lpassword"  class="form-control" type="password" placeholder="Password" name="password">

                    <input class="btn btn-default btn-login col-lg-6   form-control" style="background: #ed1c24; color: #ffffff" type="submit" value="Login" >
              
                    <center>
                     <div > 
                        <strong>     <a href="register.php" style="color: #ed1c24;"> New User?    Click here to register </a></strong>
                        

                        <br>

                    <strong> <a href="forgotpassword.php" style="color: #ed1c24;"> Forgot Password? </a></strong>
                       </div> 
                        </center>
               
                </form>

            </div>


        </div>
    </div>
</div>


<?php
include('inc/footer.php');
?>
<script>
    $("#form-login").submit(function(e){

        e.preventDefault(e);
        var email = $("#lemail").val();
        var password =  $("#lpassword").val();
        var form_data = new FormData();
        form_data.append("email",email);
        form_data.append("password",password);
        form_data.append("login",1);

        $.ajax({
            type:"POST",
            url:'./WhistleBlow/parser/parser.php?email='+email+'&password='+password+'&login=1',
            contentType: false,
            cache: false,
            processData:false,
            data: form_data,
            beforeSend:function(){
                $('.btn-login').css('opacity','0.6');
                $('.btn-login').prop('disabled',true);
            },
            success: function(html){

                console.log(html);
                obj=JSON.parse(html);
                //alert(obj[0]);

                if(obj['status'] == 1){
                    $("#login_error").html(" ");
                    $("#login_error").html("<div class='alert alert-success'><strong>"+obj['message']+"</strong></div>");
                    $('.btn-login').css('opacity','1');
                    $('.btn-login').prop('disabled',false);
                    if(obj['usertype'] == 'admin'){
                        window.location = "admin/admin_dashboard.php";
                    }
                    else{
                        window.location = "view_all_whistle.php";
                    }

                }

                else{
                    $("#login_error").html(" ");
                    $("#login_error").html("<div class='alert alert-danger'><strong>"+obj['message']+"</strong></div>");
                    $('.btn-login').css('opacity','1');
                    $('.btn-login').prop('disabled',false);

                }
            }


        });




    });


</script>






