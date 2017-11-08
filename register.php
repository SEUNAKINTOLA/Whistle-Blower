<?php
include_once('app/init.php');

//global $user;
//if ($user->is_loggedin()) {
//    $user_is_logged_in = "yes";
//} else {
//    $user_is_logged_in = "no";
//}

?>
<?php $nickname = "whistler". date("Y/m/d")."/".rand(1, 100000);?>
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
<div class="section section-header section-header-small">
    <div class="parallax filter filter-color-black">
        <div class="image"
             style="background-image:url('assets/img/how-it-works.png')">
        </div>
        <div class="container">
            <div class="content">
                <h1>New User</h1>
                <!--                    <h3 class="subtitle">Here's how we start to kick out corruption from our nation</h3>-->
            </div>
        </div>
    </div>
</div>


<nav class="navbar navbar-default navbar-transparent navbar-fixed-top" color-on-scroll="200">
    <!-- if you want to keep the navbar hidden you can add this class to the navbar "navbar-burger"-->
    <div class="container">
        <div class="navbar-header">
            <button id="menu-toggle" type="button" class="navbar-toggle" data-toggle="collapse"
                    data-target="#example">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar bar1"></span>
                <span class="icon-bar bar2"></span>
                <span class="icon-bar bar3"></span>
            </button>
            <a href="index.php" class="navbar-brand">
                <img src="<?php load_asset('img/whistleblowerlogo.png') ?>" alt="Whistleblower.ng"/>
            </a>
        </div>

<?php load_template('not_user_nav')?>

    </div>
</nav>


<div class="section">
    <div class="container">
        <div class="row">
            <div class="col-lg-6  col-md-offset-3">
                <span id="signup_error"></span>
                <div class="form">
                    <form method="post" html="{:multipart=>true}" data-remote="true"  action="#" accept-charset="UTF-8" id="signup_form" >

                        <label style="color:#AC2925 " for="first_name">Firstname:</label>
                        <input id="first_name" class="form-control" style="background: #ffffff; text-decoration-color: #000000;
                            color: #AC2925" type="text" placeholder="Firstname" name="first_name" required>
                             <input id="nickname" class="form-control" style="background: #ffffff; text-decoration-color: #000000;
                            color: #AC2925" type="hidden"  value="<?php echo trim(htmlspecialchars($nickname)) ;?>" placeholder="Nickname" name="nickname" required>
                        <label style="color:#AC2925 " for="last_name">Lastname:</label>
                        <input id="last_name"  required class="form-control" style="background: #ffffff;
                            color: #AC2925" type="text" placeholder="Lastname" name="last_name">
                        <label style="color:#AC2925 " for="email">Email:</label>
                        <input id="email" required class="form-control" style="background: #ffffff;  color: #AC2925"
                               type="text" placeholder="Email" name="email">
                        <label style="color:#AC2925 " for="phone">Phone Number:</label>
                        <input id="phone"  required class="form-control" style="background: #ffffff;
                            color: #AC2925" type="tel" placeholder="Phone Number" name="phone">
                        <label style="color:#AC2925 " for="password">Password :</label>
                        <input id="spassword"  required class="form-control" style="background: #ffffff;
                            color: #AC2925" type="password" placeholder="Password" name="password">
                        <label style="color:#AC2925; " for="password">Confirm Password :</label>
                        <input id="password_confirmation"  required class="form-control" style="background: #ffffff;
                            color:  #AC2925;" type="password" placeholder="Repeat Password"
                               name="password_confirmation">

                            
                    <input class="btn btn-default btn-login col-lg-6   form-control" style="background: #ed1c24; color: #ffffff" type="submit" name="commit"  value="Create account">
              
                    <center>
                     <div > 
                        <strong>     <a href="login.php" style="color: #ed1c24;"> Already registered?    Click here to Login </a></strong>
                        

                        <br>

                  
                       </div> 
                        </center>
                            
                               
                               
                    </form>
                </div>


            </div>


        </div>
    </div>
</div>


<?php
include('inc/footer.php');
?>


<script>
    $("#signup_form").submit(function(e){

        e.preventDefault(e);
        var email = $("#email").val();
        var password =  $("#spassword").val();
           var nickname = $("#nickname").val();
        var phone =  $("#phone").val();
        var first_name =  $("#first_name").val();
        var last_name =  $("#last_name").val();
        var form_data = new FormData();
        form_data.append("email",email);
        form_data.append("password",password);
         form_data.append("nickname", nickname);
        form_data.append("first_name",first_name);
        form_data.append("last_name",last_name);
        form_data.append("phone",phone);

        form_data.append("register",1);

        $.ajax({
            type:"POST",
            url:'./WhistleBlow/parser/parser.php',
            contentType: false,
            cache: false,
            processData:false,
            data: form_data,
            beforeSend:function(){
                $('.btn-register').css('opacity','0.6');
                $('.btn-register').prop('disabled',true);
            },

            success: function(html){

                console.log(html);
                obj=JSON.parse(html);
                //alert(obj[0]);
                            if(obj['status'] == 1){
                    $("#signup_error").html(" ");
                    $("#signup_error").html("<div class='alert alert-success'><strong>"+obj['message']+"</strong></div>");
                    $('.btn-register').css('opacity','1');
                    $('.btn-register').prop('disabled',false);
                    $("#signup_form").hide();
//                    window.location = "blow_whistle.php";

                }

                else{
                    $("#signup_error").html(" ");
                    $("#signup_error").html("<div class='alert alert-danger'><strong>"+obj['message']+"</strong></div>");
                    $('.btn-register').css('opacity','1');
                    $('.btn-register').prop('disabled',false);


                }

            }



        });




    });
    //  Remove this comments when moving to server
    //    var form_data = new form_data(this)
    //    console.log(form_data);



    /*   Simulate error message from the server   */
    // shakeModal();


</script>




