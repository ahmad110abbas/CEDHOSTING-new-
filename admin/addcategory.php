<?php require "sidebar.php";?>
<div class="container mx-auto">
<h1 >ADD CATEGORIES</h1></div>
<div class="container">
	
	<form class="w-50 mx-auto py-5" action="" method="POST">
<div class="form-group">
<label for="example-text-input" class="form-control-label">Product Name</label>
<input class="form-control" type="text" id="example-text-input" name="product_name" required >
</div>
<div class="form-group">
<label for="example-search-input" class="form-control-label">Product Parent ID</label>
<?php
	require_once('../ProductClass.php');
	$product=new Products();
	$sql=$product->fetchproducts(0);
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
<label for="example-email-input" class="form-control-label">Link</label>
<input class="form-control" type="text" id="example-email-input" name="link">
</div>
<div class="form-group">
<label class="form-control-label">Product Availability</label><br>
<label class="custom-toggle">
<input type="checkbox" name="check">
<span class="custom-toggle-slider rounded-circle" data-label-off="No" data-label-on="Yes"></span>
</label>
</div>
<input type="submit" class="btn btn-primary btn-lg btn-block" name="create" value="CREATE">
</form>

		<?php
			if(isset($_POST['create'])){
				if(isset($_POST['check'])){$check=1;}
				else{ $check=0;}
				if($_POST['link']==''){$link="NULL";}
				else{$link=$_POST['link'];}
				//echo $check." ".$_POST['product_name']." ".$link." ".$_POST['parentid'];
				$sq=$product->addcat($_POST['parentid'],$_POST['product_name'],$link,$check);
				if($sq){
					echo "<div class='alert alert-success alert-dismissible fade show' role='alert'>
					<span class='alert-icon'><i class='ni ni-like-2'></i></span>
					<span class='alert-text'><strong>done</strong> Category Added</span>
					<button type='button' class='close' data-dismiss='alert' aria-label='Close'>
						<span aria-hidden='true'>&times;</span>
					</button>
				</div>";
				}
				else{
					echo "<div class='alert alert-danger alert-dismissible fade show' role='alert'>
					<span class='alert-icon'><i class='ni ni-like-2'></i></span>
					<span class='alert-text'><strong>Danger!</strong> This is a danger alert—check it out!</span>
					<button type='button' class='close' data-dismiss='alert' aria-label='Close'>
						<span aria-hidden='true'>&times;</span>
					</button>
				</div>";
				}
			}
		
	
	?>
<h2 class='mb-3'>Basic example</h2>
<table id="dtBasicExample" class="table" width="100%">
  <thead>
   
      <th class="th-sm">Category
      </th>
      <th class="th-sm">Parent Category
      </th>
      <th class="th-sm">Availability
      </th>
      <th class="th-sm">Launch Date-time
      </th>
	  <th class="th-sm">Action
      </th>
    </tr>
  </thead>
  <tbody>
  <?php 
  require_once('../ProductClass.php');
  $product=new Products();
  $sql=$product->fetchproducts(1);
  while($rows=mysqli_fetch_assoc($sql)){
   echo "<tr>";
   echo "<td>".$rows['prod_name']."</td>";
	  echo "<td>";
	  $s=$product->name($rows['prod_parent_id']);
	  echo $s['prod_name'];
	  echo "</td>";
	 
	  
	  echo "<td>";
	  if($rows['prod_available']==1){echo "available";}else{echo "not available";}
	  echo "</td>";
	  echo "<td>".$rows['prod_launch_date']."</td>";
	  echo "<td><a href='editcategory.php?id=".$rows['id']."' ><img src='edit.png'> </a>";
	  echo " <a href='editcategory.php?id=".$rows['id']."' > <img src='delete.png'></a></td>";
	echo "</tr>";
  }
    ?>
  </tbody>
  <tfoot>
  <th class="th-sm">Category
      </th>
      <th class="th-sm">Sub Category
      </th>
      <th class="th-sm">Link
      </th>
      <th class="th-sm">Availability
      </th>
      <th class="th-sm">Launch Date-time
      </th>
    </tr>
  </tfoot>
</table>

</div>

<?php require "footer.php"; ?>
<script src="//ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
<script src="https://cdn.datatables.net/1.10.22/js/jquery.dataTables.min.js"></script>
  <script>
    $(document).ready(function () {
  $('#dtBasicExample').dataTable();
});
function my(){
	if(this.value()==""){
		alert("empty");
	}
	
}
  </script>