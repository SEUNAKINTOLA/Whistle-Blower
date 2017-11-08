<?php
include_once('app/init.php');
global $user;
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
                 style="background-image:url('assets/img/how-it-works.png')">
            </div>
            <div class="container">
                <div class="content">
                    <h1>View all whistle</h1>
                    <h3 class="subtitle">No corrupt practice will ever be secret again</h3>
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

<?php
// include_once 'api_function.php';
if(!isset($_GET['page'])){
    $page = 0;
}else{
    $page = htmlspecialchars($_GET['page']);
}

$email = $user->logged_in_user();
$data = "http://whistleblower.ng/api/mywhistles.php?email=$email&page=$page";


$response = file_get_contents($data);
//  var_dump($response);
$json_response = json_decode($response,true);
$num = count($json_response['articles']);

//echo $num;
if($num == 0){

}else{

    ?>

   <div class="section section-card-blog">
    <center>

        <h3 class="social-title">Categories</h3>
<?php
//
$data1 = "http://whistleblower.ng/api/get_whistlecategory.php?";
$response1 = file_get_contents($data1);
$json_response1 = json_decode($response1,true);
$num1= $json_response1['count'];


$x = 0;
while ($x < $num1) {
    ?>


    <div class="row container">
        <?php
        for ($z = 0; $z <= $num1; $z++) {
            if (!isset($json_response1['data'][$x]))
                break;
            ?>

            <span class="label label-fill label-danger"><a href="category_whistle.php?cat=<?php echo $json_response1['data'][$x]['id'] ?>&name=<?php echo $json_response1['data'][$x]['name'] ?>" style="color:white;"><?php echo $json_response1['data'][$x]['name'] ?></a></span>
            &nbsp;
            <?php
            $x++;
        }

        ?>


    </div>

    <?php
}


?>
                
    <!--             <span class="label label-fill label-danger"><a href="category_whistle.php?cat=Fraud" style="color:white;">Fraud</a></span>-->
    <!--             <span class="label label-fill label-danger"><a href="category_whistle.php?cat=Fake Products" style="color:white;">Fake Products</a></span>-->
    <!--             <span class="label label-fill label-danger"><a href="category_whistle.php?cat=Conflict of interest" style="color:white;">Conflict of interest</a></span>-->
    <!--             <span class="label label-fill label-danger"><a href="category_whistle.php?cat=Collecting/soliciting bribes" style="color:white;">Collecting/soliciting bribes</a></span>-->

    </center>
    <div class="container">

        <div class="title-area">
            <h5 class="text-gray"></h5>
            <h2>All  Whistle Blown</h2>
            <div class="separator separator-danger">✻</div>
        </div>
        <?php


        $i = 0;

    // the end line
    // the end line
    while ($i < $num) {
        ?>


        <div class="row">
            <?php
            for ($j = 0; $j <= 2; $j++) {
                if (!isset($json_response['articles'][$i]))
                    break;
                ?>

                <div class="col-md-4">
                    <div class="card card-blog">

                        <?php
                        $postId = $json_response['articles'][$i]['postId'];
                        ?>
                        <a href='<?php echo "whistle.php?postId=$postId"; ?>' class="header">
                            <?php
                            $type = $json_response['articles'][$i]['type'];
                            if ($type == "audio")
                                $image_src = "images/audio.png";

                            if ($type == "video")

                                $image_src = "images/video.jpg";
                            if ($type == "image")

                                $image_src = $json_response['articles'][$i]['urlToImage'];
                                

                            if ($type == "others")
                                $image_src = "images/file.png";

                            ?>
                            
                            <img src="<?php echo $image_src; ?>" class="image-header img-responsive"
                                 style="width:360px;height:220px;">
                        </a>

                        <div class="content">
                            <div class="circle-black">
                                <div class="circle">
                                    <div class="date-wrapper">
                                        <?php
                                        $date = strtotime($json_response['articles'][$i]['publishedAt']);

                                        $date_array = getdate($date);
                                        $month = $date_array['month'];
                                        $day = $date_array['mday'];
                                        ?>
                                        <span class="month"><?php echo $month; ?></span>
                                        <span class="date"><?php echo $day; ?></span>
                                    </div>
                                </div>
                            </div>


                            <a href="<?php echo $json_response['articles'][$i]['url'] ?>" class="card-title">
                                <h3></h3></a>
                            <h6 class="card-category text-warning"><?php echo $json_response['articles'][$i]['title'] ?></h6>
                            <p class="text-description text-gray"><?php
                                $substring = substr($json_response['articles'][$i]['description'], 0, 50);
                                $substring = $substring . "...";
                                echo $substring ?></p>

                            <!--                             <a href="-->
                            <?php // echo $json_response['articles'][$i]['url']
                            ?><!--" class="card-title"><h3></h3></a>-->
                            <!--                             <h6 class="card-category text-warning">-->
                            <?php // echo $json_response['articles'][$i]['title']
                            ?><!--</h6>-->
                            <!--                             <p class="text-description text-gray">-->
                            <?php // echo $json_response['articles'][$i]['description']
                            ?><!--</p>-->
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
    if ($num == 21) {
        $page = $page + 1;

        ?>
        <div class="row">
            <div class="col-md-6 col-md-offset-5">

                <!--            <a href='--><?php // echo "whistle.php?postId=$postId";
                ?><!--' class="header">-->
                <a href="view_all_whistle.php?page=<?php echo $page; ?>" class="btn btn-danger">Load more</a>

            </div>
        </div>
        <?php
    }
    ?>
    </div>
    <?php
}






include('inc/footer.php');
?>