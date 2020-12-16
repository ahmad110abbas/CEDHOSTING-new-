<!--
Author: W3layouts
Author URL: http://w3layouts.com
License: Creative Commons Attribution 3.0 Unported
License URL: http://creativecommons.org/licenses/by/3.0/
-->
<!DOCTYPE HTML>
<html>
<head>
<title>Planet Hosting a Hosting Category Flat Bootstrap Responsive Website Template | Prices :: w3layouts</title>
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
<?php require "header1.php"; 
if(isset($_GET['id'])){
    
require_once "ProductClass.php";
$pro=new Products();
$sql=$pro->cat_detail($_GET['id']);
while($rows=mysqli_fetch_assoc($sql)){
    $ht= $rows['html'];
    print_r($ht);
}
}?>
                   <div class="tab-prices">
						<div class="container">
							<div class="bs-example bs-example-tabs" role="tabpanel" data-example-id="togglable-tabs">
								<ul id="myTab" class="nav nav-tabs left-tab" role="tablist">
									<li role="presentation" class="active"><a href="#home" id="home-tab" role="tab" data-toggle="tab" aria-controls="home" aria-expanded="true">IN Hosting</a></li>
									<li role="presentation"><a href="#profile" role="tab" id="profile-tab" data-toggle="tab" aria-controls="profile">US Hosting</a></li>
									</ul>
								<div id="myTabContent" class="tab-content">
									<div role="tabpanel" class="tab-pane fade in active" id="home" aria-labelledby="home-tab">
                                    <div class='linux-prices'>
											
                                            
											
                                                <?php
                                                if(isset($_GET['id'])){
                                                require_once 'ProductClass.php';
                                                $product=new Products();
                                                $product_detail=$product->prod_detail($_GET['id']);
                                                while($html=mysqli_fetch_assoc($product_detail)){
                                                    ?>
                                                    
                                                 <div class='col-md-3 linux-price'>
												<div class='linux-top us-top'>
                                                <h4><?php echo $html['prod_name'];?></h4>
												</div>
												<div class='linux-bottom us-bottom'>
                                                <?php $desc=json_decode($html['description']);?> 
													<h5><?php echo $html['mon_price'];?> <span class='month'>per month</span></h5>
                                                    <h5><?php echo $html['annual_price'];?> <span class='month'>per year</span></h5>
													<h6><?php  if($desc->free_domain==1){echo "UNLIMITED DOMAINS";}else{echo "N/A";}?></h6>
													<ul>
                                                   
													<li><strong><?php echo $desc->webspace;?>GB</strong> Disk Space</li>
													<li><strong><?php echo $desc->bandwidth;?>GB</strong> Data Transfer</li>
													<li><strong><?php echo $desc->mailbox;?></strong> Email Accounts</li>
													<li><strong> laguage suppport : </strong><?php echo $desc->support;?> 
                                                    
                                                    </li>
													<li><strong>High Performance</strong>  Servers</li>
													<li><strong>location</strong> : <img src='images/us.png'></li>
													</ul>
												</div>
                                                <a href="cart.php?id=<?php echo $html['id'];?>" class='us-button'>buy now</a>
											</div>
											
                                                <?php
                                                }
                                            }
                                                ?>
                                                <div class='clearfix'></div>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
<?php require "footer.php";
?>