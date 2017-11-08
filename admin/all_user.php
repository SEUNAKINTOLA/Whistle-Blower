<?php
include_once('app/init.php');
//for test
// $_SESSION['user_session'] = "sola@sola.com";
// $_SESSION['type']  = "admin";

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
                <h1>All Users</h1>
                <h3 class="subtitle">No corrupt practice will ever be secret again</h3>
            </div>
        </div>
    </div>
</div>
<?php
if($user->is_loggedin() && $user->is_admin()){
    $user_is_logged_in  = "yes";
    load_template("admin_nav");
}else{
    $user_is_logged_in  = "no";
    load_template('not_admin_nav');
}
?>

<?php
// include_once 'api_function.php';
if($user_is_logged_in == "yes"){
if(!isset($_GET['page'])){
    $page = 1;
}else{
    $page = htmlspecialchars($_GET['page']);
}
$email = $user->logged_in_user();
$data = "http://whistleblower.ng/api/get_all_user.php?adminemail=$email&page=$page";


$response = file_get_contents($data);
//var_dump($response);

$json_response = json_decode($response,true);
$num = $json_response['count'];
//echo $num;
if($num == 0){
//
    ?>
<div class="section">
    <div class="container">
        <div class="row">
            <div class="alert alert-danger"><strong><center>No content for page loaded</center></strong></div>
            </div>
        </div>
    </div>
<?php

}

else{

?>
<div class="section">
    <div class="container">
        <div class="row">
        <center><h3>All Users</h3></center>
            <table class="table table-responsive">
                <th>Sn</th>
                <th>Fist Name</th>
                <th>Last Name</th>
                <th>Email</th>
                <th>Phone</th>
                <th></th>
                <th></th>

                <?php


                $i = 0;

                // the end line
                while($i < $num){
                ?>
                <tr> <td> <?php echo $i + 1; ?></td>
                    <td> <?php echo $json_response['user'][$i]['first_name']; ?></td>
                    <td> <?php echo $json_response['user'][$i]['last_name']; ?></td>
                    <td> <?php echo $json_response['user'][$i]['email']; ?></td>
                    <td> <?php echo $json_response['user'][$i]['phone']; ?></td>
                     <?php 
                        $status =  $json_response['user'][$i]['status'];
                     if($status == 0){  ?>
                         <td><a href="javascript:void(0)" id="<?php echo $i ?>" onclick='suspend_user(<?php echo $i ?>,<?php echo "\" ".$json_response['user'][$i]['email']."\""; ?>,<?php echo "\" ".$user->logged_in_user()."\""; ?>)' class='btn btn-success'>
                          
                        <?php
                        echo 'Suspend</a>';
                        
                     }else{ ?>
                         <td><a href="javascript:void(0)" id="<?php echo $i ?>" onclick='suspend_user(<?php echo $i ?>,<?php echo "\" ".$json_response['user'][$i]['email']."\""; ?>,<?php echo "\" ".$user->logged_in_user()."\""; ?>)' class='btn btn-danger'>
                         <?php
                         echo 'Unsuspend</a>';
                     }  
                     ?> 
            
                   
                    </a></td>
                    <td><a id="<?php echo 'id'.$i; ?>"  href="javascript:void(0)" onclick='remove_user(<?php echo $i; ?>,<?php echo "\" ".$json_response['user'][$i]['email']."\""; ?>,<?php echo "\" ".$user->logged_in_user()."\""; ?>)'  class="btn btn-danger">Remove </a></td>
                    </tr>


        <?php
        ++$i;
        }

        ?>
 </table>
        <?php
        }








        if($num  == 21){
        $page = $page + 1;
//  echo  $page;
        ?>
           
    <div class="row">
        <div class="col-md-6 col-md-offset-5">
            <a href="all_user.php?page=<?php echo $page; ?>" class="btn btn-danger">Load more</a>
        </div>
    </div>


<?php
}
?>
<?php

}else{

}
?>

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
            function suspend_user(id,email,adminemail){

                id = id;

                var form_data = new FormData();
               
                form_data.append("email",email);
                form_data.append("adminemail",adminemail);
                form_data.append("blockuser",1);


                $.ajax({
                    type:"POST",
                    url:'../WhistleBlow/parser/adminparser.php',
                    contentType: false,
                    cache: false,
                    processData:false,
                    data: form_data,
                    beforeSend:function(){
                        $("#"+id).css('opacity','0.4');
                        $('.btn-approve').prop('disabled',true);
                        if($("#"+id).hasClass('btn-success')){
                            $("#"+id).removeClass("btn-success");
	                        $("#"+id).addClass("btn-danger");
                        }else{
                            $("#"+id).removeClass("btn-danger");
                            $("#"+id).addClass("btn-success");
                        }

                    },
                    success: function(html){

                        console.log(html);
                        obj=JSON.parse(html);
                        //alert(obj[0]);
                        if(obj['status'] == 1){


                             if(obj['type'] == 1){
                                   $("#"+id).html("Unsuspend");    
                                      $("#"+id).css('opacity','1');
                             }else{
                                   $("#"+id).html("Suspend");  
                                     $("#"+id).css('opacity','1');
                             }
                     
                            

                        }else{



                        }

                    }


                });

            }
        </script>
        <script>
            function remove_user(id,user,admin){
                id = id;
                var form_data = new FormData();
                form_data.append("email",user);
                form_data.append("adminemail",admin);
                form_data.append("remove_user",1);
               


                $.ajax({
                    type:"POST",
                    url:'../WhistleBlow/parser/adminparser.php',
                    contentType: false,
                    cache: false,
                    processData:false,
                    data: form_data,
                    beforeSend:function(){
                        $("#id"+id).css('opacity','0.4');
                        $('.btn-remove').prop('disabled',true);
                        
                        
                        

                    },
                    success: function(html){

                        console.log(html);
                        obj=JSON.parse(html);
                        //alert(obj[0]);
                        if(obj['status'] == 1){

                            location.reload();

                        }else{



                        }

                    }


                });

            }
        </script>
