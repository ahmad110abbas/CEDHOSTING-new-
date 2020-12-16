<?php

class DB_con
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
	public function available($a,$b)
		{
	$result =mysqli_query($this->dbh,"SELECT `".$a."` FROM `tbl_user` WHERE `".$a."`='".$b."'");
			$num=mysqli_num_rows($result);
			return $num;
		}
	public function register($mail,$name,$mobile,$pass,$quest,$ans)
		{
			$email_approved=0;
			$phone_approved=0;
			$active=0; 
			$is_admin=0;
			
			$pass=md5($pass);
			$result =mysqli_query($this->dbh,"INSERT INTO `tbl_user`(`email`, `name`, `mobile`, `email_approved`, `phone_approved`, `active`, `is_admin`, `sign_up_date`, `password`, `security_question`, `security_answer`) VALUES ('".$mail."','".$name."','".$mobile."',".$email_approved.",".$phone_approved.",".$active.",".$is_admin.",NOW(),'".$pass."','".$quest."','".$ans."')");
		$rows=mysqli_fetch_assoc($result);
			return $rows;
		}
		public function login($email,$pass){
			$pass=md5($pass);
			$result=mysqli_query($this->dbh,"SELECT * from `tbl_user` WHERE `email`='".$email."' AND `password` = '".$pass."'");
			return $result;
		}
		public function verify($a,$b,$c)
		{
			$result =mysqli_query($this->dbh,"UPDATE `tbl_user` SET `".$b."`=1 ,`active`=1 WHERE `".$c."`='".$a."'" );
	
			return $result;
		}

}

?>