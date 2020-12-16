<?php 
session_start();
if(isset($_SESSION['isadmin'])){
		if($_SESSION['isadmin']==1)
			{	echo "admin";
				header("location: admin/index.php");
			}
			elseif($_SESSION['isadmin']==0)
			{
				echo "user";
				header("location:index.php");
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
<!--script-->
<link rel="stylesheet" href="css/swipebox.css">
			<script src="js/jquery.swipebox.min.js"></script> 
			    <script type="text/javascript">
					jQuery(function($) {
						$(".swipebox").swipebox();
					});
				</script>
<!--script-->
</head>
<body>
<?php require "header1.php"; ?>
		<!---login--->
			<div class="content">
				<div class="main-1">
					<div class="container">
						<div class="login-page">
							<div class="account_grid">
								<div class="col-md-6 login-left">
									 <h3>new customers</h3>
									 <p>By creating an account with our store, you will be able to move through the checkout process faster, store multiple shipping addresses, view and track your orders in your account and more.</p>
									 <a class="acount-btn" href="account.php">Create an Account</a>
								</div>
								<div class="col-md-6 login-right">
									<h3>registered</h3>
									<p>If you have an account with us, please log in.</p>
									<form action="" method="post">
									  <div>
										<span>Email Address<label>*</label></span>
										<input type="text" name="email"> 
									  </div>
									  <div>
										<span>Password<label>*</label></span>
										<input type="password" name="pass"> 
									  </div>
									  <a class="forgot" href="#">Forgot Your Password?</a>
									  <input type="submit" value="Login" name="login">
									</form>
									<?php 
										if (isset($_POST['login'])) 
										{
											require_once "Db_con.php";
											$user=new DB_con();
											if ($_POST['email']==""||$_POST['pass']=="") {
												echo "feilds can't be empty";
											}else{
												$sq=$user->login($_POST['email'],$_POST['pass']);
												$sql=mysqli_fetch_assoc($sq);
												
												if ($sql['is_admin']==1) {
													$_SESSION['user']=$sql['name'];
													$_SESSION['email']=$_POST['email'];
													$_SESSION['user_id']=$sql['id'];
													$_SESSION['isadmin']=1;
													//header("location:admin/index.php");
													echo "<script>window.location.replace('admin/index.php?name=".$sql['name']."')</script>";
												}else{
													if($sql['active']==1)
													{
													$_SESSION['user']=$sql['name'];
													$_SESSION['email']=$sql['email'];
													$_SESSION['id']=$sql['id'];
													$_SESSION['isadmin']=0;
													echo "<script>window.location.replace('index.php')</script>";
												}
												else{

													//header("location:verify.php");
													echo "<script>window.location.replace('verify.php?mail=".$sql['email']."&phone=".$sql['mobile']."')</script>";
												}
											}
										}
									}
									?>
								</div>	
								<div class="clearfix"> </div>
							</div>
						</div>
					</div>
				</div>
			</div>
<!-- login -->
				<!---footer--->
			<?php require "footer.php";?>