<?php

class Products
{
	function __construct(){
		$con=mysqli_connect('localhost','root','','CedHosting');
		$this->dbh=$con;
		if (mysqli_connect_errno())
		{
			echo "Failed to connect to MySQL: " . mysqli_connect_error();
		}
		else{
			 //echo "connected";
		}
	}
	public function fetchproduct()
		{
	$result =mysqli_query($this->dbh,"SELECT * FROM `tbl_product`");
		
			return $result;
		}
    public function fetchproducts($n)
		{
	$result =mysqli_query($this->dbh,"SELECT * FROM `tbl_product` where `prod_parent_id`= ".$n);
		
			return $result;
		}
		public function addcat($pid,$pname,$link,$pavailable)
		{
			$result =mysqli_query($this->dbh,"INSERT INTO `tbl_product` (`prod_parent_id`, `prod_name`, `link`, `prod_available`, `prod_launch_date`) VALUES (".$pid.",'".$pname."',' ',".$pavailable.",NOW())");
			return $result;
		}
		public function name($a)
		{
			$result =mysqli_query($this->dbh,"SELECT `prod_name` FROM `tbl_product` WHERE `id`=".$a);
			$row=mysqli_fetch_assoc($result);
			return $row;
		}
		public function values($a)
		{
			$result =mysqli_query($this->dbh,"SELECT * FROM `tbl_product` WHERE `id`=".$a);
			$row=mysqli_fetch_assoc($result);
			return $row;
		}
		public function updatecat($id,$pid,$pname,$link,$pavailable)
		{
			$result =mysqli_query($this->dbh,"UPDATE `tbl_product` SET `prod_parent_id`=".$pid.",`prod_name` = '".$pname."',`html`='".$link."',`prod_available`=".$pavailable." WHERE `id`=".$id);
			return $result;
		}
		public function fetchprod()
		{
		$result =mysqli_query($this->dbh,"SELECT * FROM `tbl_product` where `prod_parent_id`=1");
		
			return $result;
		}
		public function addpro($pid,$pname,$link,$pavailable)
		{
			$result =mysqli_query($this->dbh,"INSERT INTO `tbl_product` (`prod_parent_id`, `prod_name`, `html`, `prod_available`, `prod_launch_date`) VALUES (".$pid.",'".$pname."',' ',".$pavailable.",NOW())");
			$last_id = mysqli_insert_id($this->dbh);
			return $last_id;
		}
		public function addpro_details($pid,$desc,$monthly,$yearly,$sku)
		{
			$result =mysqli_query($this->dbh,"INSERT INTO `tbl_product_description`(`prod_id`, `description`, `mon_price`, `annual_price`, `sku`) VALUES (".$pid.",'".$desc."','".$monthly."','".$yearly."','".$sku."')");
			
			return $result;
		}
		public function showpro_details()
		{
			$result =mysqli_query($this->dbh,"SELECT tbl_product_description.id,prod_id,description,mon_price,annual_price,sku,tbl_product.id,prod_parent_id,prod_name,html,prod_available,prod_launch_date FROM tbl_product_description INNER JOIN tbl_product ON tbl_product_description.prod_id =tbl_product.id");	
			return $result;
		}
		public function prod_edit_detail($id)
		{
			$result =mysqli_query($this->dbh,"SELECT tbl_product_description.id,prod_id,description,mon_price,annual_price,sku,tbl_product.id,prod_parent_id,prod_name,html,prod_available,prod_launch_date FROM tbl_product_description INNER JOIN tbl_product ON tbl_product_description.prod_id =tbl_product.id  where `prod_id` =".$id);	
			$row=mysqli_fetch_assoc($result);
			return $row;
		}
		public function prod_delete($id)
		{
			$result =mysqli_query($this->dbh,"DELETE tbl_product, tbl_product_description
			FROM tbl_product
			INNER JOIN tbl_product_description
			ON tbl_product.id=tbl_product_description.prod_id
			WHERE tbl_product.id=".$id);	
			$row=mysqli_affected_rows($result);
			return $row;
		}
		public function prod_detail($pid)
		{
			$result =mysqli_query($this->dbh,"SELECT tbl_product_description.id,prod_id,description,mon_price,annual_price,sku,tbl_product.id,prod_parent_id,prod_name,html,prod_available,prod_launch_date FROM tbl_product_description INNER JOIN tbl_product ON tbl_product_description.prod_id =tbl_product.id  where `prod_parent_id` = '$pid'");	
			return $result;
		}
		public function cat_detail($pid)
		{
			$result =mysqli_query($this->dbh,"SELECT * from `tbl_product` where `id` =".$pid);	
			return $result;
		}

		
		

}