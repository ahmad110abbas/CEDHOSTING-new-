<?php
if (isset($_GET['email'])) {
	require_once "Db_con.php";
	$user=new DB_con();
	$sql=$user->verify($_GET['email'],'email_approved','email');
}
?>