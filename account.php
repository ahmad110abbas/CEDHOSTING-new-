<!--
Au
Author: W3layouts
Author URL: http://w3layouts.com
License: Creative Commons Attribution 3.0 Unported
License URL: http://creativecommons.org/licenses/by/3.0/
-->
<!DOCTYPE HTML>
<html>
<head>
<title>Planet Hosting a Hosting Category Flat Bootstrap Responsive Website Template | Account :: w3layouts</title>
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
	<!---header--->
		<!---login--->
			<div class="content">
				<!-- registration -->
	<div class="main-1">
		<div class="container">
			<div class="register">
		  	  <form action="", method="post"> 
				 <div class="register-top-grid">
					<h3>personal information</h3>
					 <div>
						<span>Name<label class="red1">*</label></span>
						<input type="text" name="name" pattern="^([A-Za-z]+ )+[A-Za-z]+$|^[A-Za-z]+$" required> 
					 </div>
					 <div>
						<span>Mobile<label class="red1">*</label></span>
						<input type="text" name="mobile"  required> 
					 </div>
					 <div>
						 <span>Email Address<label class="red1">*</label></span>
						 <input type="email" name="email" pattern="^(?!.*\.{2})[a-zA-Z0-9.]+@[a-zA-Z]+(?:\.[a-zA-Z]+)*$" required class="Question"> 
					 </div>
					 
					 <div class="clearfix"> </div>
					   <a class="news-letter" href="#">
						 <label class="checkbox"><input type="checkbox" name="checkbox" checked=""><i> </i>Sign Up for Newsletter</label>
					   </a>
					 </div>
				     <div class="register-bottom-grid">
						    <h3>login information</h3>
						    <p><small id="passwordHelpBlock" class="form-text text-muted">
  								<strong class="red1">*</strong> Required Fields.
								</small></p>
						    <small id="passwordHelpBlock" class="form-text text-muted">
  								<strong class="red1">**</strong> Your password must be 8-20 characters long, contain letters and numbers, and must not contain spaces, special characters, or emoji.
								</small>
							 <div>
								<span>Password<label class="red1">**</label></span>
								<input type="password" name="pass1" pattern="^((?!.*[\s])(?=.*[A-Z])(?=.*\d).{8,16})" title="Must contain at least one number and one uppercase and lowercase letter, and at least 8 or more characters" required>
							 </div>

							 <div>
								<span>Confirm Password<label class="red1">**</label></span>
								<input type="password" name="pass2" required>
							 </div>
							 
							 <div>
						 <span>Security Question<label class="red1">*</label></span>
						 <select name="security_question" class="Question">
						 	<option value="What was your childhood nickname?">What was your childhood nickname?</option>
						 	<option value="What is the name of your favourite childhood friend?">What is the name of your favourite childhood friend?</option>
						 	<option value="What was your favourite place to visit as a child?">What was your favourite place to visit as a child?</option>
						 	<option value="What was your dream job as a child?">What was your dream job as a child?</option>
						 	<option value="What is your favourite teacher's nickname?">What is your favourite teacher's nickname?</option>
						 </select>  
					 </div>
					 <div>
						 <span>Security answer<label class="red1">*</label></span>
						 <input type="text" name="security_answer" class="Question" pattern='^([A-Za-z0-9]+ )+[A-Za-z0-9]+$|^[A-Za-z0-9]+$' required>
					 </div>
							 
					 </div>
				
				<div class="clearfix"> </div>
				<div class="register-but">
				   
					   <input type="submit" value="submit" name="signup" class="butn">
					   <div class="clearfix"> </div>
				   </form>
				   <?php require_once "Db_con.php";
				   $user=new DB_con();
				   if(isset($_POST['signup']))
				   {
				   		if ($_POST['pass1']==$_POST['pass2']) 
				   		{
				   			$s1=$user->available('email',$_POST['email']);
				   			$s2=$user->available('mobile',$_POST['mobile']);
				   			if($s1>0)
				   				{
				   					echo "email already exists";
				   				} 
				   			if ($s2>0)
				   			{
				   				echo "mobile number exists";
				   			}
				   		else
				   		{
				   			$sql=$user->register($_POST['email'],$_POST['name'],$_POST['mobile'],$_POST['pass1'],$_POST['security_question'],$_POST['security_answer']);
				   		if($sql)
				   			{
				   				echo "<p class='bg-success'> Registeration successfull</p>";
				   			}
				   		else{
				   				echo "<p class='bg-danger'>something went wrong</p>";
				   			}
				   		}
				   	}
				   	else{
				   			echo "<p class='bg-danger'>passwords don't match</p>";
				   		}
				
			}
				   ?>
				</div>
		   </div>
		 </div>
	</div>
<!-- registration -->

			</div>
<!-- login -->
<?php require "footer.php"; ?>
				<!---footer--->
