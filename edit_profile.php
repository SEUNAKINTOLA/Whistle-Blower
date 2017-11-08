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
                <h1>Edit Profile</h1>
                <!--                    <h3 class="subtitle">Here's how we start to kick out corruption from our nation</h3>-->
            </div>
        </div>
    </div>
</div>


<?php
if($user->is_loggedin()){
    $user_is_logged_in  = "yes";
    load_template("user_nav");
}else{
    $user_is_logged_in  = "no";
    load_template('not_user_nav');
}
?>


<div class="section">
    <div class="container">
        <div class="row">
            <div class="col-lg-6 col-md-offset-3">
                <span id="update_error"></span>
                <form method="post" html="{:multipart=>true}" data-remote="true" action="#" accept-charset="UTF-8"
                      id="edit_profile">


                        <input type="hidden" name="email" id="email" value="<?php echo htmlspecialchars($user->logged_in_user()); ?>"
                     <input type="text" value="email" id="email">
                    <div class="form-group">
                        <label for="password">Your new Password</label>
                        <input type="password" name="password" id="password" class="form-control" placeholder="Password">

                    </div>
                    <div class="form-group">
                        <label for="name">Firstname</label>
                        <input type="text" class="form-control"  name="first_name" id="first_name" placeholder="Firstname">

                    </div>
                    <div class="form-group">
                        <label for="name">Lastname</label>
                        <input type="text" class="form-control"  name="last_name" id="last_name" placeholder="Lastname">

                    </div>
                    <div class="form-group">
                        <label for="name">phone</label>
                        <input type="tel" class="form-control" id="phone" name="phone" placeholder="Phone Number">

                    </div>


                    <input class="btn btn-default btn-register" style="background: #ed1c24; color: #ffffff" type="submit"
                           value="Update Profile" name="commit">
                </form>


            </div>


        </div>
    </div>
</div>


<?php
include('inc/footer.php');
?>


<script>
    $("#edit_profile").submit(function (e) {

        e.preventDefault(e);
        var email = $("#email").val();
        var password = $("#password").val();
        var first_name = $("#first_name").val();
        var last_name = $("#last_name").val();
        var phone = $("#phone").val();
        var form_data = new FormData();
        form_data.append("email", email);
        form_data.append("password", password);
        form_data.append("first_name", first_name);
        form_data.append("last_name", last_name);
        form_data.append("phone", phone);

        form_data.append("update_profile", 1);
        $.ajax({
            type: "POST",
            url: './WhistleBlow/parser/parser.php',
            contentType: false,
            cache: false,
            processData: false,
            data: form_data,
//            beforeSend:function(){
//                $('.btn-register').css('opacity','0.6');
//                $('.btn-register').prop('disabled',true);
//            },
            success: function (html) {

                console.log(html);
                obj = JSON.parse(html);
                //alert(obj[0]);
                if (obj['status'] == 1) {


                    $("#update_error").html(" ");
                    $("#update_error").html("<div class='alert alert-success'><strong>" + obj['message'] + "</strong></div>");
                    $("#edit_profile").hide();
                    console.log('Testing ...');

                } else {
                    $("#update_error").html(" ");
                    $("#update_error").html("<div class='alert alert-danger'><strong>" + obj['message'] + "</strong></div>");
                    $("#edit_profile").hide();
//                    $('.btn-register').css('opacity','1');
//                    $('.btn-register').prop('disabled',false);
//                    $("#edit_profile").fadeOut();


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




