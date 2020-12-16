<?php
require "sidebar.php";
echo "edit things here";
if(isset($_GET['id'])){
    echo $_GET['id'];
}
?>
<div class="container">
	
	<form class="w-50 mx-auto py-5" action="" method="POST">

<div class="form-group">
<label for="example-search-input" class="form-control-label">Product Category</label>
<?php
	require_once('../ProductClass.php');
	$product=new Products();
	$sql=$product->fetchproducts();
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
<input class="form-control" type="text" id="example-text-input" name="product_name" required>
</div>
<div class="form-group">
<label for="example-email-input" class="form-control-label">Product URL</label>
<input class="form-control" type="text" id="example-email-input" name="link">
</div>
<hr class="my-3">
<h2>Product Description</h2>
<hr class="my-3">
<div class="form-group">
<label for="example-email-input" class="form-control-label">Monthly Price</label>
<input class="form-control" type="text" id="example-email-input" name="monthly">
<small>In dollars</small>
</div>
<div class="form-group">
<label for="example-email-input" class="form-control-label">Annual Price</label>
<input class="form-control" type="text" id="example-email-input" name="yearly">
<small>In dollars</small>
</div>
<div class="form-group">
<label for="example-email-input" class="form-control-label">SKU</label>
<input class="form-control" type="text" id="example-email-input" name="sku">
</div>
<hr class="my-3">
<h2>Features</h2>
<hr class="my-3">

<div class="form-group">
<label for="example-email-input" class="form-control-label">Web Space(in GB)</label>
<input class="form-control" type="text" id="example-email-input" name="webspace">
<small>Enter 0.5 for 512 MB</small>
</div>
<div class="form-group">
<label for="example-email-input" class="form-control-label">Bandwidth (in GB)</label>
<input class="form-control" type="text" id="example-email-input" name="bandwidth">
<small>Enter 0.5 for 512 MB</small>
</div>
<div class="form-group">
<label for="example-email-input" class="form-control-label">Free Domain</label>
<input class="form-control" type="text" id="example-email-input" name="freedomain">
<small>Enter 0 for no domain available in this service</small>
</div>
<div class="form-group">
<label for="example-email-input" class="form-control-label">Language/Technology Support</label>
<input class="form-control" type="text" id="example-email-input" name="support">
<small>Separate by (,) Ex: PHP, MySQL, MongoDB</small>
</div>
<div class="form-group">
<label for="example-email-input" class="form-control-label">MailBox</label>
<input class="form-control" type="text" id="example-email-input" name="mailbox">
<small>Enter Number of mailbox will be provided, enter 0 if none</small>
</div>

<input type="submit" class="btn btn-primary btn-lg btn-block" name="add_prod" value="ADD PRODUCTS">
</form>
</div>
<?php
require "footer.php";
?>