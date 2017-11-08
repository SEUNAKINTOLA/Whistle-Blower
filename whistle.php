<?php
include_once('app/init.php');
global $user;
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8"/>
    <link rel="apple-touch-icon" sizes="76x76" href="assets/img/apple-icon.png">
    <link rel="icon" type="image/png" sizes="96x96" href="assets/img/favicon.png">

    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1"/>
    <title>WhistleBlower.ng | Report Anything corrupt practice that we encounter in our daily lives, business, and
        community</title>
    <meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0' name='viewport'/>
    <link href="assets/css/bootstrap.css" rel="stylesheet"/>
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
             style="background-image:url('assets/img/how-it-works.png')">
        </div>
        <div class="container">
            <div class="content">
                <h1>View whistle</h1>
                <h3 class="subtitle">No corrupt practice will ever be secret again</h3>
            </div>
        </div>
    </div>
</div>
<?php
if ($user->is_loggedin()) {
    $user_is_logged_in = "yes";
    load_template("user_nav");
} else {
    $user_is_logged_in = "no";
    load_template('not_user_nav');
}

?>
<?php
if (isset($_GET['postId']) ){
$postId = htmlspecialchars($_GET['postId']);
$data = "http://127.0.0.1/whistleb/api/get_whistle.php?postId=$postId";
$response = file_get_contents($data);
//var_dump($response);
if (!isset($_GET['page'])){
    $page = 0;
} else {
    $page= htmlspecialchars($_GET['page']);
    $reportID = htmlspecialchars($_GET['postId']);
}

$json_response = json_decode($response, true);
$status = $json_response['status'];
if ($status == 1) {

    ?>


    <div class="section">
        <div class="container">
        <a href="view_all_whistle.php">
            <button  class="btn btn-warning" style="background:red; color:white;">Go back</button>
            </a>

            <div class="row">       
                <div class="col-md-8">
                                   <center>  <p><strong><?php echo ucfirst($json_response['title']);
                    ?></strong></p></center>
                    <div class="separator separator-danger">✻</div>
                    <div>
                        <?php
                        $type = $json_response['type'];
                        if ($type == "audio") {
                            ?>
                            <audio src="<?php echo $json_response['urlToImage']; ?>"></audio>
                            <?php

                        } else if ($type == "video") {
                            ?>
                            <video width="640" height="400" src="<?php echo $json_response['urlToImage']; ?>"
                                   poster="images/video.jpg" controls autoplay>

                            </video>

                            <?php
                        } elseif ($type == "other") {

                            ?>
                            <a href="<?php echo $json_response['urlToImage']; ?>" download >Download Document
                                Here </a>
                            <?php

                        } else {
                            ?>
                            <img src="<?php echo $json_response['urlToImage']; ?>"
                                 style="width:640px;height:400px;" class="img-responsive"/>

                            <?php
                        }
                        ?>
                    </div>
                    <div class="content-blog">
                        <p>
                            <?php echo $json_response['description']; ?>
                        </p>
                    </div>
                    <div class="separator separator-danger">✻</div>
                </div>
                <div class="col-md-3 col-md-offset-1 text-center">
                    <h3 class="social-title">Author</h3>
                    <div class="author">


                        <div class="description text-center">
                            <h3 class="big-text"></h3>
                            <p class="small-text"><?php echo $json_response['nickname']; ?></p>
                        </div>

                    </div>
                    <h3 class="social-title">Category</h3>
                    <a href="view_all_whistle.php"><span
                            class="label label-fill label-danger"><?php echo $json_response['category']; ?></span></a>

                    <h3 class="social-title">Views - <?php echo $json_response['views']; ?></h3>

                </div>
            </div>
        </div>
    </div>
    <div class="section">
        <div class="container">
            <h3>Comments </h3>

            <?php

            $data1 = "http://127.0.0.1/whistleb/api/getcomments.php?page=$page&reportID=$postId";
            $response1 = file_get_contents($data1);
                     
            $json_response1 = json_decode($response1, true);
            $num1 = count($json_response1['comments']);
            if ($num1 == 0) {

            }
            else {

            $i = 0;

            while ($i < $num1) {
                ?>

    
                <div class="row">
                    <?php
                    for ($j = 0; $j <= 2; $j++) {
                        if (!isset($json_response1['comments'][$i]))
                            break;
                        ?>


                        <div class="row">

                            <div class="col-md-8">
                                <div class="media-area">
                                    <div class="media">
                                                                                <a href="#" class="avatar avatar-danger pull-left">
                                                                                    <!--<img class="media-object" src="../assets/img/faces/face_1.jpg">-->
                                                                                </a>
                                        <div class="media-body">
                                            <h3 class="media-heading">  <?php echo $json_response1['comments'][$i]['nickname'] ?></h3>
                                            <h5 class="text-muted pull-right"><?php 
                                                    $date = getdate( $json_response1['comments'][$i]['comment_time']);
                                                    $month = $date['month'];
                                                    $year =  $date['year'];
                                                    $day = $date['mday'];
                                                    echo $day.'-'.$month.'-'.$year;
                                            
                                            ?> </h5>


                                            <p><?php echo $json_response1['comments'][$i]['comment'] ?></p>
                                            <!--                                            <div class="media-footer">-->
                                            <!--                                                <button class="btn btn-info btn-simple">-->
                                            <!--                                                    <i class="fa fa-reply"></i>-->
                                            <!--                                                    Reply-->
                                            <!--                                                </button>-->
                                            <!--                                                <button class="btn btn-danger btn-simple pull-right">-->
                                            <!--                                                    <i class="fa fa-heart"></i>-->
                                            <!--                                                    123-->
                                            <!--                                                </button>-->
                                            <!--                                            </div>-->
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>


                        <?php
                        $i++;
                    }

                    ?>


                </div>

                <?php
            }

            ?>


        </div>
        <?php
        }
        ?>
        <div class="section">
            <div class="container">
                <div class="contact-form">
                    <form method="POST"  action="#" id="form-login"  accept-charset="UTF-8">
                        <span id="login_error"></span>
                        <div class="row">
                            <div class="col-md-8">
                                <input id="reportID"  class="form-control"  value="<?php echo htmlspecialchars($postId); ?>" type="hidden" placeholder="reportID" name="reportID">
                                <input id="email"  value="<?php echo  htmlspecialchars($user->logged_in_user()); ?>" class="form-control" type="hidden" placeholder="Email" name="email">
                                <input id="nickname"  value="<?php echo htmlspecialchars($_SESSION['nickname']) ?>" class="form-control" type="hidden" name="nickname">
                                <div class="form-group">
                                           <textarea name="content" id="textarea"   class="form-control"
                                                     placeholder="Here you can write your nice text"
                                                     rows="8"></textarea>
                                </div>
                                <!--                                <button type="button" class="btn btn-danger btn-fill pull-right">Post Comment-->
                                <!--                                </button>-->
                                <input class="btn btn-default btn-login col-lg-6  col-md-offset-3" style="background: #ed1c24; color: #ffffff" type="submit" value="Post Comment" >
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <?php
} else {
?>
<div class="section">
    <div class="container">
        <div class="row">
            <div class="col-md-8">
                <div class="alert alert-danger"><strong>No Such post in our record</strong></div>
            </div>
        </div>
    </div>

    <?php
    }
    } else {
    ?>
    <div class="section">
        <div class="container">
            <div class="row">
                <div class="col-md-8">
                    <div class="alert alert-danger"><strong>No Such post in our record</strong></div>
                </div>
            </div>
        </div>
        <?php
        }
        ?>

        <div class="section section-small section-get-started">
            <div class="parallax filter">
                <div class="image"
                     style="background-image: url('assets/img/chain.jpg')">
                </div>
                <div class="container">
                    <div class="title-area">
                        <h2 class="text-white">Want to join us in kicking corruption out of Nigeria?</h2>
                        <div class="separator line-separator">♦</div>
                        <p class="description"> We are keen on reducing or if possible eradicating corrupt practices and to see a better Nigeria free of corruption, a safe haven for generations to come.</p>
                    </div>

                    <!--                <div class="button-get-started">-->
                    <!--                    <a href="#gaia" class="btn btn-danger btn-fill btn-lg">Blow Whistle</a>-->
                    <!--                </div>-->
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

</body>

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

<script>
    $("#form-login").submit(function(e){

        e.preventDefault(e);
        var email = $("#email").val();
        var reportID = $("#reportID").val();
        var nickname = $("#nickname").val();
        var comment = $("#textarea").val();
        var form_data = new FormData();
        form_data.append("email",email);
        form_data.append("reportID",reportID);
        form_data.append("nickname",nickname);
        form_data.append("comment",comment);

        form_data.append("add_comment",1);

        $.ajax({
            type:"post",

            url:'./WhistleBlow/parser/parser.php',

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
//                            $("#login_error").html(" ");
//                            $("#login_error").html("<div class='alert alert-success'><strong>"+obj['message']+"</strong></div>");
//                            $('.btn-login').css('opacity','1');
//                            $('.btn-login').prop('disabled',false);
                    location.reload();




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
