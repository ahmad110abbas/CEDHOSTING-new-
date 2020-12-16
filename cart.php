<?php
if(isset($_SESSION['user'])){
if(isset($_GET['id'])){
    session_start();
    $_SESSION['id']=$_GET['id'];
    
}
}else{
    header("location:login.php");
}
?>