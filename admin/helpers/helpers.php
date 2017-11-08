<?php

function load_asset($file) {
	$path = SITE_ASSETS.$file;
	if(!file_exists($path)) {
		echo $path;
	}
	else {
		echo "The required <b>".$path."</b> file does not exist";
	}
}

function load_template($file) {
	$path = SITE_PATH.'templates/'.$file.'.php';
	if(file_exists($path)) {
		include_once ($path);
	}
	else {
		echo "The required <b>".$path."</b> file does not exist";
	}
}

function load_page($pathtofile) {
	$path = SITE_PATH.$pathtofile.'.php';
	if(file_exists($path)) {
		include_once ($path);
	}
	else {
		echo "<h2>Opps! The requested page cannot be found!</h2>";
	}
}

function site_url($url) {
	echo SITE_URL.$url;
}

function redirect($url) {
	header("Location: ".SITE_URL.$url);
}
function failure_alert($string){
	return  "<div class='alert alert-danger'>".$string."<strong></strong></div>";
}
function success_alert($string){
	echo  "<div class='alert alert-success'>".$string."<strong></strong></div>";
}

function set_form_message($message) {

/*
	if($type == 'error') {
		$_SESSION['error_msg'] = $message;
	}
	elseif($type == 'success') {
		$_SESSION['success_msg'] = $message;		
	}
*/
    if (!isset($_SESSION['messages'])) {
            $_SESSION['messages'] = array();
        }
        $_SESSION['messages'][] = $message;

}

function form_message() {

	if(isset($_GET['status']) && !empty($_GET['status'])) {
		$status = $_GET['status'];

		if($status == 'success') {
			$message =  '
					  <div class="alert alert-success">
					      <i class="glyphicon glyphicon-warning-sign"></i> &nbsp; Your query has been successfully processed!
					  </div>
				';			
		}
		elseif($status == 'failed') {
			$message =  '
					  <div class="alert alert-danger">
					      <i class="glyphicon glyphicon-warning-sign"></i> &nbsp; An error occured while processing query. Please, try again!
					  </div>
				';			
		}

		return $message;
	}

}


function displayErrors($errors) {
     	 echo '<div class="alert alert-danger">';
      	foreach ($errors as $error) {
          echo '<i class="glyphicon glyphicon-warning-sign"></i> &nbsp;'. $error .'!';
      	}
      	echo '</div>';
}



function currentPage($page) {
	if(isset($_GET['p']) && ($page == $_GET['p'])) {
		return true;
	}
}


function sendSMS($destination, $message) {

		$destination = preg_replace('/0/', '+234', $destination, 1);

		$url = "http://developers.cloudsms.com.ng/api.php?userid=".SMS_USER_ID."&password=".SMS_USER_PASSWORD."&type0&destination=".$destination."&sender=".SMS_SENDER."&message=".$message;


		$ch = curl_init();

		// set URL and other appropriate options
		curl_setopt($ch, CURLOPT_URL, $url);
		curl_setopt($ch, CURLOPT_HEADER, 0);

		// grab URL and pass it to the browser
		curl_exec($ch);

		// close cURL resource, and free up system resources
		curl_close($ch);

		return true;

}

function sendMail($recepient, $subject, $body) {
	global $mail;


	//Enable SMTP debugging. 
	$mail->SMTPDebug = 3;                               
	//Set PHPMailer to use SMTP.
	$mail->isSMTP();            
	//Set SMTP host name                          
	$mail->Host = MAIL_SENDING_SERVER;
	//Set this to true if SMTP host requires authentication to send email
	$mail->SMTPAuth = true;                          
	//Provide username and password     
	$mail->Username = MAIL_SENDING_ADDRESS;                 
	$mail->Password = MAIL_SENDING_PASSWORD;                           
	//If SMTP requires TLS encryption then set it
	$mail->SMTPSecure = MAIL_SECURE_TYPE;                           
	//Set TCP port to connect to 
	$mail->Port = MAIL_PORT; 


	$mail->From = SYSTEM_EMAIL;
	$mail->FromName = SYSTEM_EMAIL_FROM;

	$mail->addAddress($recepient); //Recipient name is optional
	$mail->addReplyTo(SYSTEM_EMAIL, "Reply");

	$mail->isHTML(false);

	$mail->Subject = $subject;
	$mail->Body = $body;

	if(!$mail->send()) 
	{
	    return "Mailer Error: " . $mail->ErrorInfo;
	} 
	else 
	{
	    return "Message has been sent successfully";
	}
}

