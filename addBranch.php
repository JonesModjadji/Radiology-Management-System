<?php
include("Connection.php");

$DESCRIPTION = $_POST['Branch_Name'];
$PREFIX = $_POST['Branch_Sufex'];

$query = "SELECT * FROM `branch` WHERE `PREFIX` = '".$PREFIX."'";
$sqlsearch = mysqli_query($con,$query);
$sql2 = "CREATE TABLE $PREFIX LIKE `A0`";
$sql1 = "INSERT INTO `branch`(`DESCRIPTION`, `PREFIX`) VALUES ('$DESCRIPTION','$PREFIX')";


if(mysqli_num_rows($sqlsearch) > 0){
    header("Location: admin.php?return='Record already made'");
    exit();
}else{
    
    mysqli_query($con,$sql2) ;
	mysqli_query($con,$sql1) ;
    header("Location: admin.php?return='Created branch' ");
    exit();
}
?>