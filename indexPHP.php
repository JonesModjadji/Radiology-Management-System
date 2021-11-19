<?php
session_start();
include('Connection.php');
if (isset($_POST['Login'])) {
	$Username = $_POST['username'];
	$Password = $_POST['password'];
	//search for email ans password
	$query = "SELECT * FROM user WHERE UserName ='$Username'and Password='$Password' and Role = 'Receptionist' ";
	$results = mysqli_query($con , $query);
	$row = mysqli_fetch_array($results,MYSQLI_ASSOC);
    $count = mysqli_num_rows($results);
	    if($count == 1) {
			$Branch = $row['Branch'];
	    $_SESSION['susername'] = $_POST['username'];
		$_SESSION['suserbranch'] = $row['Branch'];
          header("location: Receptionist.php");
	}
	else{
		echo "<script>alert('username or password incorrect')</script>";
	}
}
	if (isset($_POST['Login'])) {
	$Username = $_POST['username'];
	$Password = $_POST['password'];
	//search for email ans password
	$query = "SELECT * FROM user WHERE UserName ='$Username'and Password='$Password' and Role = 'Radiographer' ";
	$results = mysqli_query($con , $query);
	$row = mysqli_fetch_array($results,MYSQLI_ASSOC);
    $count = mysqli_num_rows($results);
	    if($count == 1) {
	    $_SESSION['susername'] = $_POST['username'];
		$_SESSION['suserbranch'] = $row['Branch'];
          header("location: Radiographer.php");
	}
	else{
		echo "<script>alert('username or password incorrect')</script>";
	}
}

if (isset($_POST['Login'])) {
$Username = $_POST['username'];
$Password = $_POST['password'];
//search for email ans password
$query = "SELECT * FROM user WHERE UserName ='$Username'and Password='$Password' and Role = 'Ref-doctor' ";
$results = mysqli_query($con , $query);
$row = mysqli_fetch_array($results,MYSQLI_ASSOC);
	$count = mysqli_num_rows($results);
		if($count == 1) {
		$_SESSION['susername'] = $_POST['username'];
		$_SESSION['suserbranch'] = $row['Branch'];
				header("location: Ref-doctor.php");
}
else{
	echo "<script>alert('username or password incorrect')</script>";
}
}
if (isset($_POST['Login'])) {
	$Username = $_POST['username'];
	$Password = $_POST['password'];
	//search for email ans password
	$query = "SELECT * FROM user WHERE UserName ='$Username'and Password='$Password' and Role = 'Radiologist' ";
	$results = mysqli_query($con , $query);
	$row = mysqli_fetch_array($results,MYSQLI_ASSOC);
    $count = mysqli_num_rows($results);
	    if($count == 1) {
	    $_SESSION['susername'] = $_POST['username'];
		$_SESSION['suserbranch'] = $row['Branch'];
          header("location: Radiologist.php");
	}
	else{
		echo "<script>alert('username or password incorrect')</script>";
	}
}
if (isset($_POST['Login'])) {
	$Username = $_POST['username'];
	$Password = $_POST['password'];
	//search for email ans password
	$query = "SELECT * FROM user WHERE UserName ='$Username'and Password='$Password' and Role = 'Typist' ";
	$results = mysqli_query($con , $query);
	$row = mysqli_fetch_array($results,MYSQLI_ASSOC);
    $count = mysqli_num_rows($results);
	    if($count == 1) {
	    $_SESSION['susername'] = $_POST['username'];
		$_SESSION['suserbranch'] = $row['Branch'];
          header("location: Typist.php");
	}
	else{
		echo "<script>alert('username or password incorrect')</script>";
	}
}
if (isset($_POST['Login'])) {
	$Username = $_POST['username'];
	$Password = $_POST['password'];
	//search for email ans password
	$query = "SELECT * FROM user WHERE UserName ='$Username'and Password='$Password' and Role = 'Admin' ";
	$results = mysqli_query($con , $query);
	$row = mysqli_fetch_array($results,MYSQLI_ASSOC);
    $count = mysqli_num_rows($results);
	    if($count == 1) {
	    $_SESSION['susername'] = $_POST['username'];
		$_SESSION['suserbranch'] = $row['Branch'];
          header("location: Admin.php");
	}
	else{
		echo "<script>alert('username or password incorrect')</script>";
	}

}

?>