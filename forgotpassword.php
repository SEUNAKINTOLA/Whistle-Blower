<?php
include_once('app/init.php');
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


<?php load_template('not_user_nav')?>



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
                  <div class="col-md-4"  style="margin-left: 500px">

                      <div class="page animsition vertical-align text-center" data-animsition-in="fade-in"
                           data-animsition-out="fade-out">
                          <div class="page-content vertical-align-middle">
                              <h2>Forgot Your Password ?</h2>
                              <p>Input your registered email to reset your password</p>

                              <form method="get"  action="#" id="form-login"  accept-charset="UTF-8">
                                  <span id="login_error"></span>
                                  <div class="form-group">
                                      <input type="email" class="form-control" id="email" name="email" placeholder="Your Email">
                                  </div>
                                  <div class="form-group">
                                      <button type="submit" class="btn btn-primary " style="background: #ed1c24;color: #ffffff">Reset Your Password</button>
                                  </div>
                              </form>


                          </div>
                      </div>
                  </div>
              </div>
                <!-- End Page -->

            </div>

        </div>
    </div>
</div>


<footer class="footer footer-big footer-color-black" data-color="black">
    <div class="container">
        <div class="row">
            <div class="col-md-2 col-sm-3">
                <div class="info">
                    <h5 class="title">Whistleblower.ng</h5>
                    <nav>
                        <ul>
                            <li>
                                <a href="#">Login</a></li>
                            <li>
                            <li>
                                <a href="#">Register</a></li>
                            <li>
                                <a href="view_all_whistle.php">View all whistle</a>
                            </li>
                            <li>
                                <a href="#">Blow whistle Anonymously</a>
                            </li>

                        </ul>
                    </nav>
                </div>
            </div>
            <div class="col-md-3 col-md-offset-1 col-sm-3">
                <div class="info">
                    <h5 class="title"> Help and Support</h5>
                    <nav>
                        <ul>
                            <li>
                                <a href="contact_us.php">Contact Us</a>
                            </li>
                            <li>
                                <a href="how_it_works.php">How it works</a>
                            </li>
                            <li>
                                <a href="terms.php">Privacy Policy</a>
                            </li>

                        </ul>
                    </nav>
                </div>
            </div>
            <div class="col-md-3 col-sm-3">
                <div class="info">
                    <h5 class="title">Latest News</h5>
                    <nav>
                        <ul>
                            <li>
                                <a href="#">
                                    <i class="fa fa-twitter"></i> <b>Get Shit Done</b> The best kit in the market is here, just give it a try and let us...
                                    <hr class="hr-small">
                                </a>
                            </li>
                            <li>
                                <a href="#">
                                    <i class="fa fa-twitter"></i> We've just been featured on <b> Awwwards Website</b>! Thank you everybody for...
                                </a>
                            </li>
                        </ul>
                    </nav>
                </div>
            </div>
            <div class="col-md-2 col-md-offset-1 col-sm-3">
                <div class="info">
                    <h5 class="title">Follow us on</h5>
                    <nav>
                        <ul>
                            <li>
                                <a href="#" class="btn btn-social btn-facebook btn-simple">
                                    <i class="fa fa-facebook-square"></i> Facebook
                                </a>
                            </li>
                            <li>
                                <a href="#" class="btn btn-social btn-dribbble btn-simple">
                                    <i class="fa fa-instagram"></i> Instagram
                                </a>
                            </li>
                            <li>
                                <a href="#" class="btn btn-social btn-twitter btn-simple">
                                    <i class="fa fa-twitter"></i> Twitter
                                </a>
                            </li>
                            <li>
                                <a href="#" class="btn btn-social btn-reddit btn-simple">
                                    <i class="fa fa-google-plus-square"></i> Google+
                                </a>
                            </li>
                        </ul>
                    </nav>
                </div>
            </div>
        </div>
        <hr>
        <div class="copyright">
            © Westzone Developers<script> document.write(new Date().getFullYear()) </script> Whistleblower.ng &reg;, All Rights reserved<br/> Website Designed by <a href="http://cloudware.ng">CloudWare Technologies</a>
        </div>
    </div>
</footer>


<!--   core js files    -->
<script src="assets/js/jquery.min.js" type="text/javascript"></script>
<script src="assets/js/bootstrap.js" type="text/javascript"></script>

<!--  js library for devices recognition -->
<script type="text/javascript" src="assets/js/modernizr.js"></script>

<!--  script for google maps   -->
<script type="text/javascript" src="https://maps.googleapis.com/maps/api/js"></script>

<!--   file where we handle all the script from the Gaia - Bootstrap Template   -->
<script type="text/javascript" src="assets/js/gaia.js"></script>

</html>

<?php
//load_template('footer')
?>
<script>
    $("#form-login").submit(function(e){

        e.preventDefault(e);
        var email = $("#email").val();
        var form_data = new FormData();
        form_data.append("email",email);
        form_data.append("forgot_pass",1);

        $.ajax({
            type:"POST",
            url:'./WhistleBlow/parser/parser.php?email='+email+'&forgot_pass=1',
//            url:'./WhistleBlow/parser/parser.php?email='+email+'&password='+password+'&login=1',
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
                    $('.btn-login').css('opacity','0.3');
                    $('.btn-login').prop('disabled',false);
                    $('#email').val('');

//                    if(obj['usertype'] == 'admin'){
//                        window.location = "admin/admin_dashboard.php";
//                    }
//                    else{
//                        window.location = "view_all_whistle.php";
//                    }

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

