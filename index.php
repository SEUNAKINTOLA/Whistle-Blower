<?php
include_once('app/init.php');
global $user;
if($user->is_loggedin()){
    $user_is_logged_in  = "yes";
}else{
     $user_is_logged_in  = "no";
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
<?php
    if($user_is_logged_in == "no"){

                      load_template('nav');
    }else{
                          load_template('user_nav');
    }                  

?>

<div class="section section-header">
    <div class="parallax filter filter-color-black">
        <div class="image"
             style="background-image: url('assets/img/home-page-slidder.png')">
        </div>
        <div class="container">
            <div class="content">
                <div class="title-area">
                    <h1 class="title-modern">whistleblower.ng</h1>
                    <h3>Working towards a new Nigeria free of corruption and illegality!</h3>
                    <div class="separator line-separator">♦</div>
                </div>

                <div class="button-get-started">
                    <a href="view_all_whistle.php" target="_blank" class="btn btn-white btn-fill btn-lg ">
                        See all Corrupt Practices
                    </a>
                    <a href="blow_whistle.php" target="_blank" class="btn btn-danger btn-fill btn-lg ">
                        Blow whistle
                    </a>
                </div>

            </div>

        </div>
    </div>
</div>

<div class="section section-faq">
    <div class="container">
        <div class="header-faq text-center">
            <h2>Our Vision and Mission</h2>
            <div class="separator separator-danger">✻</div>
        </div>
        <div class="row">
            <div class="col-sm-6">
                <div class="box">
                    <h3 class="title-description">Vision</h3>
                    <p class="text-description text-gray">To see a better Nigeria free of corruption for generation to
                        come</p>
                </div>

            </div>
            <div class="col-sm-6">
                <div class="box">
                    <h3 class="title-description">Mission</h3>
                    <p class="text-description text-gray">To reduce or eradicate corrupt practices in our society</p>
                </div>

            </div>
        </div>
    </div>
</div>
<div class="section">
    <div class="modal fade login " id="loginModal">

        <div class="modal-dialog login animated modal-lg">
            <div class="modal-content">
                <a href="index.php" class="navbar-brand">
                   <img src="assets/img/whistleblowerlogo.png " style="width: 250px" alt="Whistleblower.ng"/>
                </a>
                <div class="modal-header">

                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                    <h3 class="modal-title" style="margin-left: 4em">Login</h3>
                </div>
                <div class="modal-body">
                    <div class="box">
                        <div class="content">

                            <div class="error"></div>
                            <div class="form loginBox">
                                <form method="get"  action="#" id="form-login"  accept-charset="UTF-8">
                                  <span id="login_error"></span>
                                    <label style="color:#AC2925 " for="first_name">Email:</label>
                                    <input id="lemail"  class="form-control" type="text" placeholder="Email" name="email">
                                    <label style="color:#AC2925 " for="password">Password:</label>
                                    <input id="lpassword"  class="form-control" type="password" placeholder="Password"
                                           name="password">
                                    <input class="btn btn-default btn-login" style="background:#AC2925 " type="submit"
                                           value="Login" >
                                </form>
                            </div>
                        </div>
                    </div>
                    <div class="box">
                        <div class="content registerBox" style="display:none;">
                            <div class="form">


                                <form method="post" html="{:multipart=>true}" data-remote="true"  action="#" accept-charset="UTF-8" id="signup_form" >
                                     <span id="signup_error"></span>
                                    <label style="color:#AC2925 " for="first_name">Firstname:</label>
                                    <input id="first_name" class="form-control" style="background: #ffffff; text-decoration-color: #000000;
                            color: #AC2925" type="text" placeholder="Firstname" name="first_name" required>
                                    <label style="color:#AC2925 " for="last_name">Othername:</label>
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

                                    <input class="btn btn-default btn-register" style="background: #AC2925" type="submit"
                                           value="Create account" name="commit">
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <div class="forgot login-footer">
                            <span>Looking to
                                 <a href="javascript: showRegisterForm();" style="color: #AC2925">create an account</a>
                            </span>
<br>
                        <span>
                 <a href="forgotpassword.php" style="color:#AC2925 " >Forgot Password ?  <strong>Click Here</strong> </a>

<!--                                 <a href="javascript: showRegisterForm();" style="color: #AC2925">Password</a>-->
                            </span>
                    </div>
                    <div class="forgot register-footer" style="display:none">
                        <span>Already have an account?</span>
                        <a href="javascript: showLoginForm();" style="color: #AC2925"> Login</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Trigger the modal with a button -->
    
    <!-- Modal -->
    <div id="forgotpass" class="modal fade" role="dialog">
        <div class="modal-dialog">

            <!-- Modal content-->
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h4 class="modal-title">Modal Header</h4>
                </div>
                <div class="modal-body">
                    <p>Some text in the modal.</p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                </div>
            </div>

        </div>
    </div>
    <div class="container">
        <div class="row">
            <div class="title-area">
                <h2>About Whistleblower.ng</h2>
                <div class="separator separator-danger">✻</div>
                <p class="description">This site is meant for free-of-charge public use to report any corrupt practice
                    happening among us either in Government or private businesses. The following, <a
                        href="how_it_works.php">and more</a>, can be reported</p>
            </div>
        </div>
        <div class="row">
            <div class="col-md-4">
                <div class="info-icon">
                    <div class="icon text-danger">
                        <i class="pe-7s-graph1"></i>
                    </div>
                    <h3>Corruption</h3>
                    <p class="description">Blow the whistle on all dishonest an unethical conducts by people in
                        authority that you observe in your day-to-day activities.</p>
                </div>
            </div>
            <div class="col-md-4">
                <div class="info-icon">
                    <div class="icon text-danger">
                        <i class="pe-7s-note2"></i>
                    </div>
                    <h3>Fake Products</h3>
                    <p class="description">Report all counterfeit products or unauthorised/adulterated replicas of
                        genuine products in your environment.</p>
                </div>
            </div>
            <div class="col-md-4">
                <div class="info-icon">
                    <div class="icon text-danger">
                        <i class="pe-7s-music"></i>
                    </div>
                    <h3>Extortion</h3>
                    <p class="description">Expose any person/organisation that obtains money, properties or services
                        through coercion. Report them here.</p>
                </div>
            </div>
        </div>
        <center>
            <!--			<a href="view_all_whistle.php" target="" class="btn btn-info btn-fill btn-lg ">-->
            <!--                            View all Whistles-->
            <!--                        </a>-->
            <!--			<a href="how_it_works.php" target="" class="btn btn-danger btn-fill btn-lg ">-->
            <!--                           See How it works-->
            <!--                        </a></center>-->
    </div>
</div>

<?php
load_template('footer')
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
                                          window.location = "view_all_whistle.php";
                                        
                                                    
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
   //  Remove this comments when moving to server
	//    var form_data = new form_data(this)
	//    console.log(form_data);
   
    

/*   Simulate error message from the server   */
    // shakeModal();


</script>
<script>
$("#signup_form").submit(function(e){

            e.preventDefault(e);
               var email = $("#email").val();
                var password =  $("#spassword").val();
                        var phone =  $("#phone").val();
                        var first_name =  $("#first_name").val();
                        var last_name =  $("#last_name").val();
                       var form_data = new FormData();
                     form_data.append("email",email);
                      form_data.append("password",password);
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
                                        $("#signup_form").hide();
                                    }else{
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