<?php require "sidebar.php";?>
<div class="container">
<?php
if(isset($_GET['id'])){
	$id=$_GET['id'];
    require_once "../ProductClass.php";
    $prod=new Products();
    $ss=$prod->values($_GET['id']);
}?>
	<form class="w-50 mx-auto py-5" action="" method="POST">
<div class="form-group">
<label for="example-text-input" class="form-control-label">Product Name</label>
<input class="form-control" type="text" id="example-text-input" name="product_name"  required value="<?php echo $ss['prod_name']; ?>">
</div>
<div class="form-group">
<label for="example-search-input" class="form-control-label">Product Parent ID</label>
<?php
	require_once('../ProductClass.php');
	$product=new Products();
	$sql=$product->fetchproducts(0);
?>
<select name="parentid" id="parentid" class="form-control" <?php echo "value=".$ss['prod_parent_id']; ?>>
<?php
	while($rows=mysqli_fetch_assoc($sql)){
		echo "<option value='".$rows['id']."'>".$rows['prod_name']."</option>";
	}
?>
	
</select>
</div>
<div class="form-group">
<label for="example-email-input" class="form-control-label">Link</label>
<input class="form-control" type="text" id="example-email-input" name="link" <?php echo "value=".$ss['html']; ?>>
</div>
<div class="form-group">
<label class="form-control-label">Product Availability</label><br>
<label class="custom-toggle">
<input type="checkbox" name="check">
<span class="custom-toggle-slider rounded-circle" data-label-off="No" data-label-on="Yes"></span>
</label>
</div>
<input type="submit" class="btn btn-primary btn-lg btn-block" name="update" value="Update">
</form>

		<?php
			if(isset($_POST['update'])){
				if(isset($_POST['check'])){$check=1;}
				else{ $check=0;}
				if($_POST['link']==''){$link="NULL";}
				else{$link=$_POST['link'];}
				
				$sq=$product->updatecat($id,$_POST['parentid'],$_POST['product_name'],$link,$check);
				if($sq){
					echo "<script>alert('category updated')</script>";
				echo "<script>window.location.replace('addcategory.php')</script>";
				}
				else{
					echo "<div class='alert alert-danger alert-dismissible fade show' role='alert'>
					<span class='alert-icon'><i class='ni ni-like-2'></i></span>
					<span class='alert-text'><strong>there was some problem!</strong></span>
					<button type='button' class='close' data-dismiss='alert' aria-label='Close'>
						<span aria-hidden='true'>&times;</span>
					</button>
				</div>";
				}
			}
	?>



</div>

<?php require "footer.php"; ?>