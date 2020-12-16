<?php
if(isset($_SESSION)){

}
else{ session_start();}
if(isset($_SESSION['isadmin'])){
	if($_SESSION['isadmin']==1){
		header("location:login.php");
	}
}
?>
	<style type="text/css">
		.logocolor{
			color: #e7663f;
		}
		.logocolor2{
			color: #585CA7;
		}
	</style>

	<!---header--->
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
		<div class="header">
			<div class="container">
				<nav class="navbar navbar-default">
					<div class="container-fluid">
			<!-- Brand and toggle get grouped for better mobile display -->
						<div class="navbar-header">
							<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
								<i class="sr-only">Toggle navigation</i>
								<i class="icon-bar"></i>
								<i class="icon-bar"></i>
								<i class="icon-bar"></i>
							</button>				  
							<div class="navbar-brand" >
								<h1><a href="index.php"><span class="logocolor">Ced</span><span class="logocolor2"> Hosting</span></a></h1>
							</div>
						</div>

			<!-- Collect the nav links, forms, and other content for toggling -->
						<div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
							<ul class="nav navbar-nav">
								<li class="active"><a href="index.php">Home <i class="sr-only">(current)</i></a></li>
								<li><a href="about.php">About</a></li>
								<li class="dropdown">
									<a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Services<i class="caret"></i></a>
										<ul class="dropdown-menu">
											
											<li><a href="services.php">Hosting</a></li>
											
										</ul>
									</li>
									<li class="dropdown">
									<a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Hosting<i class="caret"></i></a>
										<ul class="dropdown-menu">
											<?php require_once "ProductClass.php";
											$pro=new Products();
											$sql=$pro->fetchprod();
											while($rows=mysqli_fetch_assoc($sql))
											{
												echo "<li><a href='catpage.php?id=".$rows['id']."'>".$rows['prod_name']."</a></li>";
											}
											?>
											
										</ul>
									</li>
								
								
								<li><a href="pricing.php">Pricing</a></li>
								<li><a href="blog.php">blog</a></li>
								<li><a href="contact.php">Contact</a></li>
								<li><a href="#" ><i class="fa fa-shopping-cart" aria-hidden="true"></i><span class="badge badge-primary">5</span></a></li>
								<?php if(isset($_SESSION['user']))
									{
										echo "<li>hello".$_SESSION['user']."</li>";
										echo "<li><a href='logout.php'>logout</a></li>";
									}
								else
									{
										echo "<li><a href='login.php'>login</a></li>";
									}
								?>
								
							</ul>
									  
						</div><!-- /.navbar-collapse -->
					</div><!-- /.container-fluid -->
				</nav>
			</div>
		</div>
	<!---header--->