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
                    <h1>How it works</h1>
                    <h3 class="subtitle">Here's how we start to kick out corruption from our nation</h3>
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
                <div class="title-area">
                    <h2>How it works</h2>
                    <div class="separator separator-danger">✻</div>
                    <p class="description">This site is meant for free-of-charge public use to report <b>any</b> corrupt practice happening among us either in government, private businesses or our immediate community. 
					Report corrupt daily activities  e.g bribery in the judiciary during filling of paper for court,they collect Hugh amount of money without reciept.Road safety collecting more than stipulated official price for driver license renewal. Nigeria Army,civil defence corps,police and navy collecting money from bunkering participants in my area for free passage etc.
					
					The following, and more, can be reported:</p>
                </div>
            </div>
            <div class="row">
			<div class="col-md-4">
                    <div class="info-icon">
                        <div class="icon text-danger">
                            <i class="pe-7s-graph1"></i>
                        </div>
                        <h3>Fake Products</h3>
					<!--<p class="description">We make our design perfect for you. Our adjustment turn our clothes into your clothes.</p>-->
                    </div>
                </div>
               <div class="col-md-4">
                    <div class="info-icon">
                        <div class="icon text-danger">
                            <i class="pe-7s-graph1"></i>
                        </div>
                        <h3>Bribery</h3>
					<!--<p class="description">We make our design perfect for you. Our adjustment turn our clothes into your clothes.</p>-->
                    </div>
                </div>
               <div class="col-md-4">
                    <div class="info-icon">
                        <div class="icon text-danger">
                            <i class="pe-7s-graph1"></i>
                        </div>
                        <h3>Extortion</h3>
					<!--<p class="description">We make our design perfect for you. Our adjustment turn our clothes into your clothes.</p>-->
                    </div>
                </div>
               
			
                <div class="col-md-4">
                    <div class="info-icon">
                        <div class="icon text-danger">
                            <i class="pe-7s-graph1"></i>
                        </div>
                        <h3>Diversion of revenues</h3>
					<!--<p class="description">We make our design perfect for you. Our adjustment turn our clothes into your clothes.</p>-->
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="info-icon">
                        <div class="icon text-danger">
                            <i class="pe-7s-graph1"></i>
                        </div>
                        <h3>Violation of TSA guidelines</h3>
					<!--<p class="description">We make our design perfect for you. Our adjustment turn our clothes into your clothes.</p>-->
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="info-icon">
                        <div class="icon text-danger">
                            <i class="pe-7s-graph1"></i>
                        </div>
                        <h3>Underreporting of revenues</h3>
					<!--<p class="description">We make our design perfect for you. Our adjustment turn our clothes into your clothes.</p>-->
                    </div>
                </div>
				<div class="col-md-4">
                    <div class="info-icon">
                        <div class="icon text-danger">
                            <i class="pe-7s-graph1"></i>
                        </div>
                        <h3>Over payment in government offices</h3>
					<!--<p class="description">We make our design perfect for you. Our adjustment turn our clothes into your clothes.</p>-->
                    </div>
                </div>
              
				<div class="col-md-4">
                    <div class="info-icon">
                        <div class="icon text-danger">
                            <i class="pe-7s-graph1"></i>
                        </div>
                        <h3>Non-remittance or late remittance of revenues</h3>
					<!--<p class="description">We make our design perfect for you. Our adjustment turn our clothes into your clothes.</p>-->
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="info-icon">
                        <div class="icon text-danger">
                            <i class="pe-7s-graph1"></i>
                        </div>
                        <h3>Manipulation of revenue collection receipts</h3>
					<!--<p class="description">We make our design perfect for you. Our adjustment turn our clothes into your clothes.</p>-->
                    </div>
                </div>
           
				<div class="col-md-4">
                    <div class="info-icon">
                        <div class="icon text-danger">
                            <i class="pe-7s-graph1"></i>
                        </div>
                        <h3>Mismanagement of revenues</h3>
					<!--<p class="description">We make our design perfect for you. Our adjustment turn our clothes into your clothes.</p>-->
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="info-icon">
                        <div class="icon text-danger">
                            <i class="pe-7s-graph1"></i>
                        </div>
                        <h3>Unapproved expenditures</h3>
					<!--<p class="description">We make our design perfect for you. Our adjustment turn our clothes into your clothes.</p>-->
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="info-icon">
                        <div class="icon text-danger">
                            <i class="pe-7s-graph1"></i>
                        </div>
                        <h3>Undocumented expenditures</h3>
					<!--<p class="description">We make our design perfect for you. Our adjustment turn our clothes into your clothes.</p>-->
                    </div>
                </div>
				<div class="col-md-4">
                    <div class="info-icon">
                        <div class="icon text-danger">
                            <i class="pe-7s-graph1"></i>
                        </div>
                        <h3>Non-compliance with expenditure guidelines/circulars</h3>
					<!--<p class="description">We make our design perfect for you. Our adjustment turn our clothes into your clothes.</p>-->
                    </div>
                </div>
				     <div class="col-md-4">
                    <div class="info-icon">
                        <div class="icon text-danger">
                            <i class="pe-7s-graph1"></i>
                        </div>
                        <h3>Conversion of funds to personal use</h3>
					<!--<p class="description">We make our design perfect for you. Our adjustment turn our clothes into your clothes.</p>-->
                    </div>
                </div>
                
                <div class="col-md-4">
                    <div class="info-icon">
                        <div class="icon text-danger">
                            <i class="pe-7s-graph1"></i>
                        </div>
                        <h3>Violation of public procurement procedures</h3>
					<!--<p class="description">We make our design perfect for you. Our adjustment turn our clothes into your clothes.</p>-->
                    </div>
                </div>
				<div class="col-md-4">
                    <div class="info-icon">
                        <div class="icon text-danger">
                            <i class="pe-7s-graph1"></i>
                        </div>
                        <h3>Procurement fraud (kickbacks, over-invoicing, etc.)</h3>
					<!--<p class="description">We make our design perfect for you. Our adjustment turn our clothes into your clothes.</p>-->
                    </div>
                </div>
				   <div class="col-md-4">
                    <div class="info-icon">
                        <div class="icon text-danger">
                            <i class="pe-7s-graph1"></i>
                        </div>
                        <h3>Misstatement of financial information</h3>
					<!--<p class="description">We make our design perfect for you. Our adjustment turn our clothes into your clothes.</p>-->
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="info-icon">
                        <div class="icon text-danger">
                            <i class="pe-7s-graph1"></i>
                        </div>
                        <h3>Mismanagement of public funds and assets</h3>
					<!--<p class="description">We make our design perfect for you. Our adjustment turn our clothes into your clothes.</p>-->
                    </div>
                </div>
				<div class="col-md-4">
                    <div class="info-icon">
                        <div class="icon text-danger">
                            <i class="pe-7s-graph1"></i>
                        </div>
                        <h3>Fraudulent payments</h3>
					<!--<p class="description">We make our design perfect for you. Our adjustment turn our clothes into your clothes.</p>-->
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="info-icon">
                        <div class="icon text-danger">
                            <i class="pe-7s-graph1"></i>
                        </div>
                        <h3>Splitting of contracts</h3>
					<!--<p class="description">We make our design perfect for you. Our adjustment turn our clothes into your clothes.</p>-->
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="info-icon">
                        <div class="icon text-danger">
                            <i class="pe-7s-graph1"></i>
                        </div>
                        <h3>Manipulation of data or records</h3>
					<!--<p class="description">We make our design perfect for you. Our adjustment turn our clothes into your clothes.</p>-->
                    </div>
                </div>
             
                <div class="col-md-4">
                    <div class="info-icon">
                        <div class="icon text-danger">
                            <i class="pe-7s-graph1"></i>
                        </div>
                        <h3>Collecting/soliciting bribes</h3>
					<!--<p class="description">We make our design perfect for you. Our adjustment turn our clothes into your clothes.</p>-->
                    </div>
                </div>
				<div class="col-md-4">
                    <div class="info-icon">
                        <div class="icon text-danger">
                            <i class="pe-7s-graph1"></i>
                        </div>
                        <h3>Conflict of interest</h3>
					<!--<p class="description">We make our design perfect for you. Our adjustment turn our clothes into your clothes.</p>-->
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="info-icon">
                        <div class="icon text-danger">
                            <i class="pe-7s-graph1"></i>
                        </div>
                        <h3>Fraud</h3>
					<!--<p class="description">We make our design perfect for you. Our adjustment turn our clothes into your clothes.</p>-->
                    </div>
                </div>
				<div class="col-md-4">
                    <div class="info-icon">
                        <div class="icon text-danger">
                            <i class="pe-7s-graph1"></i>
                        </div>
                        <h3>Corruption</h3>
					<!--<p class="description">We make our design perfect for you. Our adjustment turn our clothes into your clothes.</p>-->
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="info-icon">
                        <div class="icon text-danger">
                            <i class="pe-7s-graph1"></i>
                        </div>
                        <h3>Information on stolen public funds</h3>
					<!--<p class="description">We make our design perfect for you. Our adjustment turn our clothes into your clothes.</p>-->
                    </div>
                </div>
				<div class="col-md-4">
                    <div class="info-icon">
                        <div class="icon text-danger">
                            <i class="pe-7s-graph1"></i>
                        </div>
                        <h3>Information on concealed public funds</h3>
					<!--<p class="description">We make our design perfect for you. Our adjustment turn our clothes into your clothes.</p>-->
                    </div>
                </div>
			</div>
				<center>
			<a href="#" target="_blank" class="btn btn-info btn-fill btn-lg ">
                            View all Whistles
                        </a>
			<a href="#" target="_blank" class="btn btn-danger btn-fill btn-lg ">
                           See How it works
                        </a></center>
        </div>
    </div>
	
	

<?php
include('inc/footer.php');
?>