<?php require "sidebar.php";
require_once('../ProductClass.php');
$product=new Products();
if(isset($_POST['add_prod'])){
	echo $_POST['parentid']." ".$_POST["product_name"];
	$details = array("webspace"=>$_POST['webspace'],
					"bandwidth"=>$_POST['bandwidth'],
					"free_domain"=>$_POST['freedomain'],
					"support"=>$_POST['support'],
					"mailbox"=>$_POST['mailbox']
				);
	$details1=json_encode($details);
	
	if($_POST['link']==''){$link="NULL";}else{$link=$_POST['link'];}
				//echo $check." ".$_POST['product_name']." ".$link." ".$_POST['parentid'];
				$sq=$product->addpro($_POST['parentid'],$_POST['product_name'],$link,1);
				$sql1=$product->addpro_details($sq,$details1,$_POST['monthly'],$_POST['yearly'],$_POST['sku']);
				if($sql1){
					echo "<script> alert('product added')</script>";
					echo "<script>window.location.replace('viewproduct.php')</script>";
				}
				else{
					echo "there is some error";
				}
}
?>
<div class="container mx-auto">
<h1 >ADD PRODUCTS</h1></div>
<div class="container">
	
	<form class="w-50 mx-auto py-5" action="" method="POST">

<div class="form-group">
<label for="example-search-input" class="form-control-label">Product Category</label>
<?php
	require_once('../ProductClass.php');
	$product=new Products();
	$sql=$product->fetchproducts(1);
?>
<select name="parentid" id="parentid" class="form-control">
<?php
	while($rows=mysqli_fetch_assoc($sql)){
		echo "<option value='".$rows['id']."'>".$rows['prod_name']."</option>";
	}
?>

</select>
</div>
<div class="form-group">
<label for="example-text-input" class="form-control-label">Product Name</label>
<input class="form-control" type="text" id="example-text-input" name="product_name" required pattern="(^([A-Za-z]+\-\d+(\.\d+)*)$)|(^([A-Za-z])+$)" onfocusout="validate(this)" >
</div>
<div class="form-group">
<label for="example-email-input" class="form-control-label" >Product URL</label>
<input class="form-control" type="text" id="example-email-input" name="link" >
</div>
<hr class="my-3">
<h2>Product Description</h2>
<hr class="my-3">
<div class="form-group">
<label for="example-email-input" class="form-control-label">Monthly Price</label>
<input class="form-control" type="text" id="example-email-input" name="monthly" required pattern='([0-9]+(\.[0-9]+)?)' onfocusout="validate(this)">
</div>
<div class="form-group">
<label for="example-email-input" class="form-control-label">Annual Price</label>
<input class="form-control" type="text" id="example-email-input" name="yearly" required pattern='([0-9]+(\.[0-9]+)?)' onfocusout="validate(this)">
</div>
<div class="form-group">
<label for="example-email-input" class="form-control-label">SKU</label>
<input class="form-control" type="text" id="example-email-input" name="sku" required pattern="^[a-zA-Z0-9#](?:[a-zA-Z0-9_-]*[a-zA-Z0-9])?$" onfocusout="validate(this)">
</div>
<hr class="my-3">
<h2>Features</h2>
<hr class="my-3">

<div class="form-group">
<label for="example-email-input" class="form-control-label">Web Space(in GB)</label>
<input class="form-control" type="text" id="example-email-input" name="webspace" required pattern='([0-9]+(\.[0-9]+)?)' onfocusout="validate(this)">
<small>Enter 0.5 for 512 MB</small>
</div>
<div class="form-group">
<label for="example-email-input" class="form-control-label">Bandwidth (in GB)</label>
<input class="form-control" type="text" id="example-email-input" name="bandwidth" required pattern='([0-9]+(\.[0-9]+)?)' onfocusout="validate(this)">
<small>Enter 0.5 for 512 MB</small>
</div>
<div class="form-group">
<label for="example-email-input" class="form-control-label">Free Domain</label>
<input class="form-control" type="text" id="example-email-input" name="freedomain" required pattern="((^[0-9]*$)|(^[A-Za-z]+$))" onfocusout="validate(this)">
<small>Enter 0 for no domain available in this service</small>
</div>
<div class="form-group">
<label for="example-email-input" class="form-control-label">Language/Technology Support</label>
<input class="form-control" type="text" id="example-email-input" name="support" required onfocusout="validate(this)">
<small>Separate by (,) Ex: PHP, MySQL, MongoDB</small>
</div>
<div class="form-group">
<label for="example-email-input" class="form-control-label">MailBox</label>
<input class="form-control" type="text" id="example-email-input" name="mailbox" required pattern="((^[0-9]*$)|(^[A-Za-z]+$))" onfocusout="validate(this)">
<small>Enter Number of mailbox will be provided, enter 0 if none</small>
</div>
<input type="submit" class="btn btn-primary btn-lg btn-block" name="add_prod" value="ADD PRODUCTS">
</form>
</div>

<?php require "footer.php";
?>