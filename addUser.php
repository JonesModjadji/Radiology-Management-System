<?php
include("Connection.php");

$Username = $_POST['username'];
$Name = $_POST['name'];
$Surname = $_POST['surname'];
$Password = $_POST['password'];
$Role = $_POST['role'];
$Branch = $_POST['branch'];

$query = "SELECT * FROM `user` WHERE `UserName` = '".$Username."'";
$sqlsearch = mysqli_query($con,$query);

$sql = $sql = "INSERT INTO `user` (Name, Surname, UserName, Password, Role, Branch)
        VALUES ('$Name','$Surname','$Username','$Password','$Role','$Branch')";



if(mysqli_num_rows($sqlsearch) > 0){
		header("Location: admin.php?return='Record already made'");
		exit();
}else{


	if ($Role == "Receptionist"){
		 mysqli_query($con,$sql) ;
		header("Location: admin.php?return='Receptionist'");
		exit();

	} elseif ($Role == "Radiographer") {
		 mysqli_query($con,$sql) ;
		header("Location: admin.php?return='Radiographer' ");
		exit();

	} elseif ($Role == "Typist") {
		 mysqli_query($con,$sql) ;
		header("Location: admin.php?return='Radiographer' ");
		exit();

	} else{
		 mysqli_query($con,$sql) ;
		header("Location:admin.php?return='Radiolagist.php' ");
		exit();

	}

}







?>
