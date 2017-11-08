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
                    <h1>Fund User</h1>
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

     
 <div class="section section-card-blog">
 <center>
		
        <div class="container">
		
            <div class="title-area">
                <h5 class="text-gray"></h5>
                <h2>Fund User</h2>
                <div class="separator separator-danger">✻</div>
	
    </div>

    </div>

 <?php
   // include_once 'api_function.php';
   if($user_is_logged_in == "yes"){
        if(isset($_GET['user_to_fund']) && isset($_GET['whistleblown'])){
               $whistleblown = htmlspecialchars($_GET['whistleblown']);
                 $user_to_fund = base64_decode(htmlspecialchars($_GET['user_to_fund']));
 ?> 
    
<div class="section">
    <div class="container">
        <div class="row">
            <div class="col-lg-6 col-md-offset-3">
                <span id="fund_error"></span>
                <form method="post" id="form1" html="{:multipart=>true}" data-remote="true" action="#" accept-charset="UTF-8"
                      id="edit_profile">
    

                        <input type="hidden" name="adminemail" id="email" value="<?php echo htmlspecialchars($user->logged_in_user()); ?>" />
                     <input type="hidden" value="<?php echo trim(htmlspecialchars($whistleblown)); ?>" id="whistleblown" name="whistleblown" />
                  
                    <div class="form-group">
                        <label for="name">User To Fund</label>
                        <input type="email" class="form-control" value="<?php echo trim(htmlspecialchars($user_to_fund)); ?>" readonly name="email" id="user_email" placeholder="User email">

                    </div>
                    <div class="form-group">
                        <label for="name">Admin Password</label>
                        <input type="password" class="form-control" required  name="adminpass" id="last_name" placeholder="Admin Password">

                    </div>
                    <div class="form-group">
                        <label for="name">Amount</label>
                        <input type="tel" class="form-control" required id="amount" name="amount" placeholder="Amount to fund user">

                    </div>
                    <input  type="hidden"
                           value="1" name="fund_user">


                    <input class="btn btn-default btn-register" id="fund" style="background: #ed1c24; color: #ffffff" type="submit"
                           value="Fund User" name="fund_user">
                </form>


            </div>


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
            <div class="">
                 <div class="alert alert-danger"><strong>System Integrartion Error!,  No user is selected</strong></div>

            </div>


        </div>
    </div>
</div>

<?php        
}
   }
else{
?>
<div class="section">
    <div class="container">
        <div class="row">
            <div class="">
                 <div class="alert alert-danger"><strong>You are not authorised to view this page</strong></div>

            </div>


        </div>
    </div>
</div>
<?php
}
?>
<?php
   
include('inc/footer.php');
?>
<script>
  
  $("#form1").submit(function(e){
        e.preventDefault();
          $.ajax({     
								    type:"POST",
									url:'../WhistleBlow/parser/adminparser.php',
									 contentType: false,
         							cache: false,
  									 processData:false,
                                      data: new FormData(this),
                                     beforeSend:function(){
                                    $("#fund").css('opacity','0.4');
                                    //   $('.btn-approve').prop('disabled',true);
                                   
                                       },
									success: function(html){
							
									    console.log(html);
						        	obj=JSON.parse(html);
										//alert(obj[0]);
                                    if(obj['status'] == 1){
                                        
                                           $("#fund").css('opacity','1');
                                           $("#form1").hide();
                                            $("#fund_error").html("<div class='alert alert-success'><strong>"+obj['message']+"</strong></div>");
                                                    
                                    }else{
                                         
                                          $("#fund_error").html("<div class='alert alert-danger'><strong>"+obj['message']+"</strong></div>");
                                          $("#fund").css('opacity','1');
                                    
                                    }
										 
		                    	}
								
					
			});

  })      
       

	            

</script>
