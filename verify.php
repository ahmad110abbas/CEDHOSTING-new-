<?php session_start();
if(isset($_POST['mobile'])){
	$mobile=$_POST['mobile'];
	$_SESSION['mobile']=$mobile;
    $otp = rand(1000,9999);
    $_SESSION['otp']=$otp;
    $fields = array(
    "sender_id" => "FSTSMS",
    "message" => "The one time password for CedHosting account activation is- ".$otp,
    "language" => "english",
    "route" => "p",
    "numbers" => "$mobile",
    );

    $curl = curl_init();

    curl_setopt_array($curl, array(
    CURLOPT_URL => "https://www.fast2sms.com/dev/bulk",
    CURLOPT_RETURNTRANSFER => true,
    CURLOPT_ENCODING => "",
    CURLOPT_MAXREDIRS => 10,
    CURLOPT_TIMEOUT => 30,
    CURLOPT_SSL_VERIFYHOST => 0,
    CURLOPT_SSL_VERIFYPEER => 0,
    CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
    CURLOPT_CUSTOMREQUEST => "POST",
    CURLOPT_POSTFIELDS => json_encode($fields),
    CURLOPT_HTTPHEADER => array(
    "authorization: U6WjZOCs7M1lNqcYrxDBwPEIFHAzn30iRo5SGJVk8umtaphvgbn6Bm7oEMyKvNIHL1htq8VWA4SrzukD",
    "accept: */*",
    "cache-control: no-cache",
    "content-type: application/json"
    ),
    ));

    $response = curl_exec($curl);
    $err = curl_error($curl);

    curl_close($curl);

    if ($err) {
    echo "cURL Error #:" . $err;
    }   else {
	header("location:otp.php");
    }
}
?>
<!--
Author: W3layouts
Author URL: http://w3layouts.com
License: Creative Commons Attribution 3.0 Unported
License URL: http://creativecommons.org/licenses/by/3.0/
-->
<!DOCTYPE HTML>
<html>
<head>
<title>Planet Hosting a Hosting Category Flat Bootstrap Responsive Website Template | Login :: w3layouts</title>
<link href="css/bootstrap.css" rel="stylesheet" type="text/css" media="all"/>
<link href="css/style.css" rel="stylesheet" type="text/css" media="all"/>
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="keywords" content="Planet Hosting Responsive web template, Bootstrap Web Templates, Flat Web Templates, Android Compatible web template, 
Smartphone Compatible web template, free webdesigns for Nokia, Samsung, LG, SonyEricsson, Motorola web design" />
<script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false); function hideURLbar(){ window.scrollTo(0,1); } </script>
<script src="js/jquery-1.11.1.min.js"></script>
<script src="js/bootstrap.js"></script>
<!---fonts-->
<link href='//fonts.googleapis.com/css?family=Voltaire' rel='stylesheet' type='text/css'>
<link href='//fonts.googleapis.com/css?family=Open+Sans:400,300,300italic,400italic,600,600italic,700,700italic,800,800italic' rel='stylesheet' type='text/css'>
<!---fonts-->
<?php 
if(isset($_GET['email'])){
	$email=$_GET['mail'];
}?>
<div class="content">
				<div class="main-1">
					<div class="container">
						<div class="login-page">
							<div class="account_grid">
								<h3 class="mb-3">Verification</h3>
								<div class="container">
								<div class="col-md-6 login-right">
									
									<p>email verification</p>

									<form action="test.php" method="post">
									  <div>
										<span>Email Address<label>*</label></span>
										<input type="text" name="email" <?php echo" value='".$_GET['mail']."'";?>> 
									  </div>
									  
									  <input type="submit" value="verify" name="emailbtn" class="butn">
									</form>
								</div>
								<div class="col-md-6 login-right">
									
									<p>phone verification</p>

									<form action="" method="post">
									  <div>
										<span>Phone<label>*</label></span>
										<input type="text" name="mobile" <?php echo" value='".$_GET['phone']."'";?>> 
									  </div>
									  
									  <input type="submit" value="verify" name="mobilebtn" class="butn">
									</form>
								</div>
								</div>	
								<div class="clearfix"> </div>
							</div>
						</div>
					</div>
				</div>
			</div>
