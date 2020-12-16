<?php 
echo $_GET['id'];
require_once "../ProductClass.php";
$prod= new Products();
$pro=$prod->prod_delete($_GET['id']);
header("location:viewproduct.php");
?>