<?php
//include('inc/header.php');
include_once('app/init.php');

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
    <div class="section section-header section-header-small">
        <div class="parallax filter filter-color-black">
            <div class="image"
                 style="background-image:url('assets/img/how-it-works.png')">
            </div>
            <div class="container">
                <div class="content">
                    <h1>Change Password</h1>
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
            <div class="collapse navbar-collapse">
                <ul class="nav navbar-nav navbar-right navbar-uppercase">
                    <!--                    <li class="dropdown">-->
                    <!--                        <a href="view_all_whistle.php" target="">Profile</a>-->
                    <!--                    </li>-->

                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Profile <span class="caret"></span></a>
                        <ul class="dropdown-menu">


                            <li ><a href="changepassword.php"   style="color: #AC2925"> Change Password</a></li>
                            <li> <a href="edit_profile.php"   style="color: #AC2925"> Edit Profile</a></li>

                        </ul>
                    </li>
                    <li>
                        <a href="how_it_works.php" target="">My Whistles</a>
                    </li>
                    <li>
                        <a href="view_all_whistle.php" target="">View all Whistles</a>
                    </li>

                    <li>
                        <a href="blow_whistle.php" class="btn btn-danger btn-fill">Blow Whistle</a>
                    </li>
                </ul>
            </div>
            <!-- /.navbar-collapse -->
        </div>
    </nav>


    <div class="section">
        <div class="container">
            <div class="row">


                <!-- Page -->
                <div class="col-md-6 col-md-offset-3">

                    <div class="page animsition vertical-align text-center" data-animsition-in="fade-in"
                         data-animsition-out="fade-out">
                        <div class="page-content vertical-align-middle">
                            <h2>Change your Password ?</h2>
                            <!--                              <p>Input your registered email to reset your password</p>-->

                            <form method="post" role="form">
                                <div class="form-group">
                                    <label for="old_password">  Supply your old password:  </label>
                                    <input type="password" class="form-control"style="color: #ed1c24" id="old_password" name="old_password" placeholder="Supply Your Old Password">
                                </div>
                                <div class="form-group">
                                    <label for="new_password">  Supply your new password:  </label>
                                    <input type="password" class="form-control" style="color: #ed1c24" id="new_password" name="new_password" placeholder=" Supply Your New Password">
                                </div>

                                <div class="form-group">
                                    <button type="submit" class="btn btn-primary " style="background: #ed1c24;color: #ffffff; width: 160px">Confirm</button>
                                </div>
                            </form>


                        </div>
                    </div>
                </div>
                <!-- End Page -->



            </div>


        </div>
    </div>
    </div>


<?php
include('inc/footer.php');
?>