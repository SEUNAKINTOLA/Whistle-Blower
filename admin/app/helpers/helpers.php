
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

