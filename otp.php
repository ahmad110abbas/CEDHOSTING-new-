<?php session_start();
if(isset($_POST['verifyotp'])){
    if($_POST['otp']==$_SESSION['otp']){
        require_once "Db_con.php";
	$user=new DB_con();
    $sql=$user->verify($_SESSION['mobile'],'phone_approved','mobile');
    session_destroy();
    header("location:login.php");
    }else{
        echo "try again";
    }
}
?>
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
<div class="content">
				<div class="main-1">
					<div class="container">
						<div class="login-page">
							<div class="account_grid">
								<h3 class="mb-3">Verification</h3>
								<div class="container">
								<div class="col-md-6 login-right">
									
									<p>Enter OTP</p>

									<form action="" method="post">
									  <div>
										<span>Enter OTP<label>*</label></span>
										<input type="text" name="otp"> 
									  </div>
									  
									  <input type="submit" value="verify" name="verifyotp" class="butn">
									</form>
								</div>
					
                                <div class="clearfix"> </div>
							</div>
						</div>
					</div>
				</div>
			</div>
