<?php
include_once('app/init.php');

global $user;
if ($user->is_loggedin()) {
    $user_is_logged_in = "yes";
} else {
    $user_is_logged_in = "no";
}

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
                <h1>My Wallet</h1>
                <!--                    <h3 class="subtitle">Here's how we start to kick out corruption from our nation</h3>-->
            </div>
        </div>
    </div>
</div>
  <?php
                if($user_is_logged_in == "no"){

                      load_template('not_user_nav');

    ?>

     <div class="section" style="margin-bottom:15em;">
        <div class="container">
        <div class="row">
            <div class="col-lg-7 col-lg-offset-2">
                    <?php
                    $string = "You need to be a registered user before you can access this page, <a href='login.php'> signup/login here </a>";
                 echo   "<div class='alert alert-danger'>".$string."<strong></strong></div>";
                    ?>
                </div>



            </div>
        </div>
    </div>

    <?php
               } else{
     ?>



            <?php

            load_template("user_nav"); ?>

<?php
//
$email = $user->logged_in_user();
$data1 = "http://whistleblower.ng/api/get_wallet_balance.php?email=$email";

$response1 = file_get_contents($data1);
// var_dump($response1);
$json_response1 = json_decode($response1,true);
$num1= $json_response1['count'];
?>
<div class="container">
  <h2>Wallet Details</h2>            
  <table class="table table-bordered">
    <tbody>
    
      <tr>
        <td>Wallet Blance</td>
        <td>NGN <?php echo $json_response1['balance']; ?></td>
        
      </tr>
    </tbody>
  </table>
</div>
<?php
}
?>

<!---->


<div class="section">
    <div class="container">
        <div class="row">
            <div class="col-lg-6 col-md-offset-3">
<!--              Wallet BALANCE HERE-->
            </div>


        </div>
    </div>
</div>


<?php
include('inc/footer.php');
?>


