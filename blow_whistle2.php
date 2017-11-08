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
                style="background-image:url('assets/img/whistles.png')">
            </div>
            <div class="container">
                <div class="content">
                    <h1>Blow Whistle</h1>
                    <h3 class="subtitle">Here's how we start to kick out corruption from our nation</h3>
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
                    $string = "You need to be a registered user before you can blow whistle, <a href='login.php'> signup/login here </a>";
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

            <!-- /.navbar-collapse -->

      <style>
        #file-box{
            display:none;
        }
        #file-box1{
            display:none;
        }

    </style>


    <div class="section">
        <div class="container">
        <div class="row">
            <div class="col-lg-7">

                    <span id="whistle_error"></span>

                    <form id="whistle">

                        <div class="form-group">


                            <input type="hidden" value="<?php echo htmlspecialchars($user->logged_in_user()); ?>" name="email" class="form-control" id="email" placeholder="Email">
                        </div>
                        <div class="form-group">
                            <label for="title">Title</label>
                            <input type="text" name="title" class="form-control">

                            </div>

                            <div class="form-group"> <!-- State Button -->
                                <label for="category_id" class="control-label">Category </label>
                                <select class="form-control" name="category" id="lsTipType" onchange="tipSelectionEvent(this)">
                        <optgroup label="Revenues">
	                        <option value="Diversion of revenues">Diversion of revenues</option>
	                        <option value="Violation of TSA guidelines">Violation of TSA guidelines (e.g. multiple revenue accounts)</option>
	                        <option>Underreporting of revenues</option>
	                        <option>Non-remittance or late remittance of revenues</option>
	                        <option>Manipulation of revenue collection receipts</option>
	                        <option>Conversion of funds to personal use</option>
	                        <option>Mismanagement of revenues</option>
                        </optgroup>
                        <optgroup label="Expenses">
	                        <option>Unapproved expenditures</option>
	                        <option value="Undocumented expenditures">Undocumented expenditures (e.g. no payment vouchers with appropriate signatures)</option>
	                        <option>Non-compliance with efficiency unit expenditure guidelines/circulars</option>
	                        <option value="Fraudulent payments">Fraudulent payments</option>
	                        <option>Violation of public procurement procedures</option>
	                        <option>Procurement fraud (kickbacks, over-invoicing etc)</option>
	                        <option>Splitting of contracts</option>
                        </optgroup>
                        <optgroup label="Ethics/Others">
	                        <option>Manipulation of data or records</option>
	                        <option>Misstatement of financial information</option>
	                        <option value="Mismanagement or misappropriation of public funds and assets">Mismanagement or misappropriation of public funds and assets (e.g. properties, vehicles etc.)</option>
	                        <option>Collecting / soliciting bribes</option>
	                        <option>Conflict of interest</option>
	                        <option>Fraud</option>
	                        <option>Corruption</option>
                            <option>Information on stolen public funds</option>
                            <option>Information on concealed public funds</option>
                        </optgroup>
                        <optgroup label="Uncategorized">
                            <option value="Others">Specify</option>
                        </optgroup>
                    </select>

                            </div>
                            <div class="form-group">
                                <label for="description" class="control-label">Description </label>
                                <textarea name="description" class="form-control" id="description" cols="150" rows="10" style="resize: none" placeholder="Descriptions"></textarea>
                            </div>

                            <div class="form-group">
                                <label class="radio-inline">
                                    <input type="radio" name="inlineRadioOptions" id="inlineRadio1" value="1"> Live Upload
                                    </label>
                                    <label class="radio-inline">
                                    <input type="radio" name="inlineRadioOptions" id="inlineRadio2" value="2"> Document Upload
                                    </label>

                            </div>
                             <div id="file-box1" class="form-group">
                              <video controls autoplay src=""></video><br>
                                <button id="rec" type="button" onclick="onBtnRecordClicked()">Record</button>
                                <button id="pauseRes" type="button"  onclick="onPauseResumeClicked()" disabled>Pause</button>
                                <button id="stop" type="button" onclick="onBtnStopClicked()" disabled>Stop</button>
                            </div>
                            <div id="file-box" class="form-group">
                                <label for="file">File input</label>
                                <input  class="form-control" name="uploadFile"  type="file" id="file">
                                <p class="help-block">Document backing whistle you want to blow</p>
                            </div>
                            <div id="file-box" class="form-group">

                                <input  class="form-control" name="add_whistle"  type="hidden" id="file">

                            </div>

                            <button type="submit" class="btn btn-submit btn-default" style="background:#ED1C24;color:#ffffff">Submit</button>
                            <span id="whistle_error1"></span>
                    </form>


                </div>



            </div>
        </div>
    </div>
 <?php
     }

     ?>

<?php

load_template('footer');
?>
<script>
    $("input[name='inlineRadioOptions']").change(function(){

            if( $("input[name='inlineRadioOptions']:checked").val() == 2){
                 $("#file-box1").css('display','none');
                $("#file-box").css('display','block');
            }else{
                 $("#file-box").css('display','none');
                  $("#file-box1").css('display','block');
            }
    });

</script>
<script>
  $("#whistle").submit(function(e){
      e.preventDefault();
            $.ajax({
								    type:"POST",
									url:'./WhistleBlow/parser/parser.php',
									 contentType: false,
         							cache: false,
  									 processData:false,
                                      data: new FormData(this),
                                     beforeSend:function(){
                                      $('.btn-submit').css('opacity','0.6');
                                      $('.btn-submit').prop('disabled',true);
                                       },
									success: function(html){

										console.log(html);
						        	obj=JSON.parse(html);
										//alert(obj[0]);
                                    if(obj['status'] == 1){

                                         $("#whistle_error").html(" ");


                                          $("#whistle_error").html("<div class='alert alert-success'><strong>"+obj['message']+"  "+"click <a href='blow_whistle.php'>here to blow another whistle</a></strong></div>" );

                                           $('.btn-submit').css('opacity','1');
                                             $('.btn-submit').prop('disabled',true);
                                             $("#whistle").fadeOut();

                                    }else{
                                          $("#whistle_error").html(" ");

                                        $("#whistle_error").html("<div class='alert alert-danger'><strong>"+obj['message']+"</strong></div>");
                                         $('.btn-submit').css('opacity','1');
                                         $('.btn-submit').prop('disabled',false);
                                         $("#whistle").fadeOut();

                                    }
                                  }

 });
  });
</script>


