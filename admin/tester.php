<?php require_once "../ProductClass.php";
$pr= new Products();
$pro=$pr->prod_edit_detail(14);
while($rows=mysqli_fetch_assoc($pro)){
    echo $rows['description'];
}
?>