<?php
include_once('app/init.php');
//for test
// $_SESSION['user_session'] = "sola@sola.com";
// $_SESSION['type'] = "admin";
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
                    <h1>Approve User Pending Whistles</h1>
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
                $page = 0;
            }else{
                $page = htmlspecialchars($_GET['page']);
            }
            $email = $user->logged_in_user();
            $data = "http://127.0.0.1/whistleb/api/whistlesToApprove.php?email=$email&page=$page";
            

            $response = file_get_contents($data);
            // var_dump($response);
            

            $json_response = json_decode($response,true);
            $num = $json_response['count'];
            if($num == 0){
?>
<div class="section">
        <div class="container">
            <div class="row">
                <div class="col-md-8">
                   <div class="alert alert-success"><strong>No New Whistle From Users Yet</strong></div>
            </div>
        </div>
    </div>
</div>

<?php
            }else{

?>
 
 <div class="section section-card-blog">
 <center>
		
        <div class="container">
		
            <div class="title-area">
                <h5 class="text-gray"></h5>
                <h2>Approve user whistles</h2>
                <div class="separator separator-danger">✻</div>
            </div>
  <?php

   
    $i = 0;
  
    // the end line
    while($i < $num){
?>


            <div class="row">
                 <?php 
             for($j = 0;$j <= 2;$j++){
                if(!isset($json_response['articles'][$i]))
                    break;
            ?>
                <div class="col-md-4">
                    <div class="card card-blog">
                    <?php
                        $postId=$json_response['articles'][$i]['postId'];
                    ?>
                        <a href='<?php  echo "view_whistle.php?postId=$postId"; ?>' class="header">
                                <?php
                                    $type = $json_response['articles'][$i]['type'];
                                    if($type == "audio")
                                        $image_src = "images/audio.png";
                                    
                                    if($type == "video")
                                     
                                        $image_src = "images/video.jpg";
                                    if($type == "image")   

                                     $image_src =  $json_response['articles'][$i]['urlToImage'] ;

                                    if($type == "other")
                                        $image_src =  "images/file.png";

                                ?>
                            <img src="<?php  echo $image_src; ?>" class="image-header img-responsive" style="width:360px;height:220px;">
                        </a>
                        <div class="content">
                            <div class="circle-black">
                                <div class="circle">
                                    <div class="date-wrapper">
                                        <?php 
                                            $date = strtotime($json_response['articles'][$i]['publishedAt'] );

                                            $date_array = getdate($date);
                                            $month = $date_array['month'];
                                            $day =  $date_array['mday'];


                                                    

                                            ?>
                                        <span class="month"><?php echo $month; ?></span>
                                        <span class="date"><?php echo $day; ?></span>
                                    </div>
                                </div>
                            </div>
                            
                            <a href="<?php  echo $json_response['articles'][$i]['url'] ?>" class="card-title"><h3></h3></a>
                            <h6 class="card-category text-warning"><?php  echo $json_response['articles'][$i]['title'] ?></h6>
                            <p class="text-description text-gray"><?php 
                             $substring = substr($json_response['articles'][$i]['description'],0,100);
                             $substring = $substring."...";
                             echo $substring ?></p>
                            <p> <a href="javascript:void(0)" id="<?php echo $i; ?>" onclick='approve_whistle(<?php echo $i; ?>,<?php echo "\" ".$json_response['articles'][$i]['postId']."\""; ?>,<?php echo "\" ".$user->logged_in_user()."\""; ?>)' class='btn btn-success'>Approve </a>&nbsp;<a href="javascript:void(0)"  id="<?php echo "id".$i; ?>" class='btn btn-success '  onclick='remove_whistle(<?php echo $i; ?>,<?php echo "\" ".$json_response['articles'][$i]['postId']."\""; ?>,<?php echo "\" ".$user->logged_in_user()."\""; ?>)'>Remove </a>&nbsp;<a href="fund_user.php?user_to_fund=<?php echo base64_encode($json_response['articles'][$i]['author']);?>&whistleblown=<?php echo $json_response['articles'][$i]['postId'];?>"  class='btn btn-success '>Fund User </a></p>
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
    if($num == 21){
        $page = $page + 1;
    
    ?>
    <div class="row">
        <div class="col-md-6 col-md-offset-5">
            <a href="admin_dashboard.php?page=<?php echo $page; ?>" class="btn btn-danger">Load more</a>
        </div>
    </div>
    </div>
    <?php
 }
 ?>
<?php
}
   }else{
?>
<div class="section">
        <div class="container">
            <div class="row">
                <div class="col-md-8">
                   <div class="alert alert-danger"><strong>You are not authorised to view this page</strong></div>
            </div>
        </div>
    </div>
</div>
<?php
   }

?>
</div>
<?php
   
include('inc/footer.php');
?>
<script>
    function approve_whistle(id,reportId,admin){
        
        id = id;
        
           var form_data = new FormData();
                      //
                      form_data.append("reportID",reportId);
                       form_data.append("adminemail",admin);
                       form_data.append("approvewhistle",1);


            // $(document).ready(function(){
            //     $("button").click(function(){
            //         $("#test").hide();
            //     });
            // });
                    

	              $.ajax({     
								    type:"POST",
									url:'../WhistleBlow/parser/adminparser.php',
									 contentType: false,
         							cache: false,
  									 processData:false,
                                      data: form_data,
                                     beforeSend:function(){
                                    $("#"+id).css('opacity','0.4');
                                    //   $('.btn-approve').prop('disabled',true);
                                     $("#"+id).removeClass('btn-success').addClass('btn-danger');
                                   
                                       },
									success: function(html){
							
									
						        	obj=JSON.parse(html);
										//alert(obj[0]);
                                    if(obj['status'] == 1){
                                              $("#"+id).css('opacity','1');
                                            $("#"+id).html("Approved");
                                            $("#"+id).removeClass("btn-success");
                                            $("#"+id).addClass("btn-danger");
                                    }else{
                                         
                                        
                                    
                                    }
										 
			}
								
					
			});

    }
</script>
<script>
    function remove_whistle(id,reportId,admin){
      
            id = id;
           var form_data = new FormData();
                      //
                      form_data.append("reportID",reportId);
                       form_data.append("adminemail",admin);
                       form_data.append("remove_whistle",1);
                    

	              $.ajax({     
								    type:"GET",
									url:'../WhistleBlow/parser/adminparser.php?remove_whistle=1'+'&reportID='+reportId+'&adminemail='+admin,
									 contentType: false,
         							cache: false,
  									 processData:false,
                                      data: form_data,
                                     beforeSend:function(){
                                      $("#id"+ id).css('opacity','0.4');
                                       $("#id"+ id).prop('disabled',true);
                                   
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
