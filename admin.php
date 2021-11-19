<?php
session_start();
include("Connection.php");
            $Searched="";
            $MRNFILTER="";
            $SFILTER="";
            $NAMEFILTER="";
            $SURNAMEFILTER= "";
            $PHYSICIAN= "";
            $STATUS= "";
            $BRANCH= "";
            $FROMFILTER=date("Y-m-d");
            $TOFILTER=date("Y-m-d");
			$DATE=date("Y-m-d");
			ob_start();

echo $_SESSION['suserbranch'];
$var2 = ob_get_clean();

if (isset($_POST['Submit'])) {
	   $Search = $_POST['Search'];
	   $DONE="Done";
	   $dbname = 'ris';
	   $sql = "SHOW TABLES FROM $dbname";
	   $result = mysqli_query($con,$sql);
	 while ($row = mysqli_fetch_row($result)) {
		 ob_start();
echo "{$row[0]}";
$var = ob_get_clean();

    $Searching = "SELECT * FROM $var WHERE AccIndex2='$DONE' AND (PatientsID = '$Search' OR SESSIONID = '$Search' OR MRN = '$Search' OR IdentityNumber ='$Search') ";
       $SearchingResults=mysqli_query($con,$Searching);
       if($SearchingResults==false){
		     echo'<script>
    var txt;
    var r = confirm("Patient Does Not Exist \n Create Patient");
    if (r == true) {
		window.location.href = "Add.php";
    } else {
        window.location.href = "Receptionist.php";
 }
 </script>';

		  }
	   elseif($SearchingResults==true){
         while ($rows=mysqli_fetch_array($SearchingResults) ) {
		   $PATIENTSID= $rows['PatientsID'];
		   $MRN= $rows['MRN'];
		   $SESSIONID = $rows['SESSIONID'];
		   $IDENTITYNUMBER= $rows['IdentityNumber'];
		   $BRANCHNAME= $rows['Branch'];
        header("location: Add4.php?SESSIONID=$SESSIONID&MRN=$MRN&PatientsID=$PATIENTSID&ID=$IDENTITYNUMBER&Branch=$BRANCHNAME");
       }
}
}

}
if (isset($_POST['SearchFilter'])) {
            $MRNFILTER= $_POST['MRN'];
            $SFILTER= $_POST['S'];
            $NAMEFILTER= $_POST['NAME'];
            $SURNAMEFILTER= $_POST['SURNAME'];
            $PHYSICIAN= $_POST['PHYSICIAN'];
			$STATUS=$_POST['STATUS'];
             $BRANCH= $_POST['BRANCH'];
            $FROMFILTER= $_POST['FROM'];
            $TOFILTER= $_POST['TO'];
             $i = 0;
			 $dbname = 'ris';
	   $sql = "SHOW TABLES FROM $dbname";
	   $result = mysqli_query($con,$sql);
	 while ($row = mysqli_fetch_row($result)) {
		 ob_start();
echo "{$row[0]}";
$var = ob_get_clean();
       $Searching1 = "SELECT * FROM $var ";
       $SearchingResults1=mysqli_query($con,$Searching1);
       if($SearchingResults1->num_rows > 0){
        header("location: SearchedFilter.php?MRN=$MRNFILTER&S=$SFILTER&NAME=$NAMEFILTER&SURNAME=$SURNAMEFILTER&PHYSICIAN=$PHYSICIAN&FROM=$FROMFILTER&TO=$TOFILTER".http_build_query($STATUS));
	   }
}}
?>
<!doctype html>
<html style="background: black;">
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta http-equiv="X-UA-Compatible" content="IE=Edge">
<meta name="keywords" content="">
<meta name="description" content="">
<title>Admin</title>
<link href="Css/style.css" rel="stylesheet" type="text/css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<link rel="stylesheet" href="https://fonts.google.com/specimen/Montserrat"type='text/css'>
<link href='http://fonts.googleapis.com/css?family=Montserrat' rel='stylesheet' type='text/css'>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
</head>
<body>
<style>
* {
  box-sizing: border-box;
}

input[type=text], select{
  width: 100%;
  padding: 12px;
  border: 1px solid #ccc;
  border-radius: 4px;
  resize: vertical;
}

input[type=password] {
  width: 100%;
  padding: 12px;
  border: 1px solid #ccc;
  border-radius: 4px;
  resize: vertical;
}

label {
  padding: 12px 12px 12px 0;
  display: inline-block;
  color: white;
}

input[type=submit] {
  background-color: #04AA6D;
  color: white;
  padding: 12px 20px;
  border: none;
  border-radius: 4px;
  cursor: pointer;
  float: right;
}

input[type=submit]:hover {
  background-color: #45a049;
}

.container {
  border-radius: 5px;
  background-color: black;
  padding: 20px;
}

.col-25 {;
  width: 25%;
  margin-top: 6px;
}

.col-75 {
  width: 75%;
  margin-top: 6px;
}

/* Clear floats after the columns */
.row:after {
  content: "";
  display: table;
  clear: both;
}

/* Responsive layout - when the screen is less than 600px wide, make the two columns stack on top of each other instead of next to each other */
@media screen and (max-width: 600px) {
  .col-25, .col-75, input[type=submit] {
    width: 100%;
    margin-top: 0;
  }
}
</style>

<div class="Content1">
<div class="tab" style="background: black;border: 2px solid black;border-bottom: 2px solid red;">
<button class="tablinks" onclick="window.open('Receptionist.php');" >RIS</button>
<button class="tablinks"><a style="text-decoration: none; color:white;" href="logout.php">logout</a></button>
<button style="width: 30%;"></button>
<i class="fa fa-search" id ="left" style="color: white;"></i><button class="tablinks" onclick="openCity(event, 'Add_User')" >Add User</button>
<i class="fa fa-question-circle" id ="left" style="color: white;"></i><button class="tablinks" onclick="openCity(event, 'Add_Branch')" >Add Branch</button>
<i class="fa fa-briefcase" id ="left" style="color: white;"></i><button class="tablinks" onclick="openCity(event, 'WORKLIST')" > WORKLIST</button>
<i class="fa fa-envelope" id ="left" style="color: white;"></i><button class="tablinks" onclick="openCity(event, 'REPORTS')" >REPORTS</button>
<i class="fa fa-calendar" id ="left" style="color: white;"></i><button class="tablinks" onclick="openCity(event, 'CALENDAR')" >CALENDAR</button>
<button class="tablinks" onclick="window.open('http://192.168.50.160/login.html');" style="border: none;">PACS</button>

</div>


<div id="Add_User" class="tabcontent" style="border: 1px solid black;">
<center>
<div class="container">
  <form method="post" action="addUser.php">

  <div class="row">
      <div class="col-25">
        <label for="fname">Name</label>
      </div>
      <br />
      <div class="col-75">
        <input type="text" id="fname" name="username" placeholder="Your Username">
      </div>
    </div>

    <div class="row">
      <div class="col-25">
        <label for="fname">Username</label>
      </div>
      <div class="col-75">
        <input type="text" id="fname" name="username" placeholder="Your Username">
      </div>
    </div>

    <div class="row">
      <div class="col-25">
        <label for="fname">Password</label>
      </div>
      <div class="col-75">
        <input type="Password" id="fname" name="password">
      </div>
    </div>

    <div class="row">
      <div class="col-25">
        <label for="fname">Branch</label>
      </div>
      <div class="col-75">
        <input type="text" id="fname" name="branch" placeholder="Your Branch">
      </div>
    </div>
    <div class="row">
      <div class="col-25">
        <label for="Role">Role</label>
      </div>
      <div class="col-75">
        <select id="country" name="role">
        <option>Receptionist</option>
        <option>Radiologist</option>
        <option>Receptionist</option>
        <option>Typist</option>
        <option>Ref-doctor</option>
        <option>Admin</option>
        </select>
      </div>
    </div>
    <div class="row">
      <input type="submit" value="Submit">
    </div>
  </form>
</div>
</center>
</div>

<div id="Add_Branch" class="tabcontent">
<div class="container">
  <form method="post" action="addBranch.php">

    <div class="row">
      <div class="col-25">
        <label for="fname">Branch Name</label>
      </div>
      <div class="col-75">
        <input type="text" id="fname" name="Branch_Name" placeholder="Branch Name">
      </div>
    </div>

    <div class="row">
      <div class="col-25">
        <label for="fname">Branch Sufex</label>
      </div>
      <div class="col-75">
        <input type="text" id="fname" name="Branch_Sufex">
      </div>
    </div>

    <div class="row">
      <input type="submit" value="Submit">
    </div>
  </form>
</div>
</div>

<div id="WORKLIST" class="tabcontent" style="display:block;border: 1px solid black;">
  <section class="filter">
  <div class="left">
  <div class="left">
    <form action="" method="post"  enctype="multipart/form-data">
    <table>
      <th colspan="2" style="color: white;">Search Order Xray</th>
      <br>
      <tr>
        <td colspan="2"><hr style="width: 90%;border: 1px solid red;"></td>
      </tr>
      <tr>
        <td style="text-align: center;color: white;">MRN :</td>
        <td style="text-align: center;color: white;">ACCESSION :</td>
      </tr>
      <tr>
        <td><input type="text" name="MRN" value="" style="width: 120px;border-radius: 20px 20px 20px 20px;padding-left: 10px;padding-right: 10px;border: 1px solid white;background: black;color: white;"></td>
        <td><input type="text" name="S" value="" style="width: 110px;border-radius: 20px 20px 20px 20px;padding-left: 10px;padding-right: 10px;border: 1px solid white;background: black;color: white;"></td>
      </tr>
      <tr>
        <td style="text-align: center;color: white;">NAME :</td>
        <td style="text-align: center;color: white;">SURNAME :</td>
      </tr>
      <tr>
        <td><input type="text" name="NAME" value="" style="width: 120px;border-radius: 20px 20px 20px 20px;padding-left: 10px;padding-right: 10px;border: 1px solid white;background: black;color: white;"></td>
        <td><input type="text" name="SURNAME" value="" style="width: 110px;border-radius: 20px 20px 20px 20px;padding-left: 10px;padding-right: 10px;border: 1px solid white;background: black;color: white;"></td>
      </tr>
    </table>
  </div>
  <div class="right">
    <table>
      <th colspan="4" style="width: 500px;color: white;">Option Search Today</th>
      <br>
      <tr>
      <td colspan="4"><hr style="width: 90%;border: 1px solid red;"></td>
      </tr>
      <tr>
        <td style="text-align: center;color: white;" colspan="2">PHYSICIAN :</td>
      </tr>
      <tr>
        <td> <select name="PHYSICIAN" id="PHYSICIAN" style=" width: 240px; text-align: center;border-radius: 20px 20px 20px 20px;padding-left: 10px;margin-left: 20px;border: 1px solid white;background: black;color: white;">
          <option value="NONE"></option>
          <?php
       $Searching1 = "SELECT * FROM referring_doctor ORDER BY INITIALS ASC";
       $SearchingResults1=mysqli_query($con,$Searching1);
       if($SearchingResults1->num_rows > 0){
  while ($rows=mysqli_fetch_array($SearchingResults1)) {
	 $DOCCODE = $rows['CODE'];
     $TITLE = $rows['TITLE'];
	 $INITIALS = $rows['INITIALS'];
	 $SURNAME = $rows['SURNAME'];
echo '<option value="'.$TITLE.' '.$INITIALS.' '.$SURNAME.'">'.$INITIALS.' '.$SURNAME.' '.$TITLE.'</option>';
}
}
  ?>
    </select></td>
      </tr>
      <tr>
        <td style="text-align: center;color: white;" colspan="2">STATUS:</td>
      </tr>
      <tr>
        <td style="text-align: center;color: white;">
		<input type="checkbox" id="None" name="STATUS[]" value="None" style="visibility: hidden;"  checked>
		<input type="checkbox" id="Waiting" name="STATUS[]" value="Waiting"><label for="Waiting">Waiting </label>
		<input type="checkbox" id="StartExam" name="STATUS[]" value="Start Exam"><label for="StartExam">Start Exam </label><br>
		<input type="checkbox" id="qc" name="STATUS[]" value="QC"><label for="qc">QC </label>
		<input type="checkbox" id="QCPending" name="STATUS[]" value="QC Pending"><label for="QCPending">QC Pending </label><br>
		<input type="checkbox" id="Dictated" name="STATUS[]" value="Dictated"><label for="Dictated">Dictated </label>
		<input type="checkbox" id="Authorize" name="STATUS[]" value="Authorize"><label for="Authorize">Authorize </label>
		</td>
      </tr>
    </table>
  </div>
  </div>
  <div class="right">
  <div class="left">
      <table>
      <th colspan="4" style="width: 500px;color: white;">BRANCH</th>
      <br>
      <tr>
      <td colspan="4"><hr style="width: 90%;border: 1px solid red;"></td>
      </tr>
     <tr><td><br><br></td></tr>
	<tr>
        <td style="text-align: center;color: white;" colspan="2">STATUS:</td>
      </tr>
	<tr>
	<td style="text-align: center;color: white;">
		<input type="checkbox" id="Started" name="STATUS[]" value="Started"><label for="Started">Started </label>
		<input type="checkbox" id="Processing" name="STATUS[]" value="Processing"><label for="Processing">Processing </label><br>
		<input type="checkbox" id="Dictate" name="STATUS[]" value="Dictate"><label for="Dictate">Dictate </label>
		<input type="checkbox" id="Dictating" name="STATUS[]" value="Dictating"><label for="Dictating">Dictating </label><br>
		<input type="checkbox" id="Authorizing" name="STATUS[]" value="Authorizing"><label for="Authorizing">Authorizing </label>
		<input type="checkbox" id="Done" name="STATUS[]" value="Done"><label for="Done">Done </label>
		</td>
		</tr>
    </table>
  </div>
  <div class="right">
      <table>
      <th colspan="4" style="width: 500px;color: white;">Select Date</th>
      <br>
      <tr>
      <td colspan="4"><hr style="width: 90%;border: 1px solid red;"></td>
      </tr>
      <tr>
        <td style="text-align: center;color: white;">FROM :</td>

      </tr>
      <tr>
        <td style="text-align: center;"><input type="Date" name="FROM" value="<?php echo $FROMFILTER ;?>" style="border-radius: 20px 20px 20px 20px;padding-left: 20px;padding-right: 20px;border: 1px solid white;background: black;color: white;"></td>
      </tr>
      <tr>
        <td style="text-align: center;color: white;">TO :</td>
      </tr>
      <tr>
        <td style="text-align: center;"><input type="date" name="TO" value="<?php echo $TOFILTER ;?>" style="border-radius: 20px 20px 20px 20px;padding-left: 20px;padding-right: 20px;border: 1px solid white;background: black;color: white;"></td>
      </tr>
    </table>
  </div>
</div>
  </section>
      <center>
	  <table>
  <tr>
        <td style="text-align: center;color: white;"><b>BRANCH</b></td>
      </tr>
	   <tr>
      <td><hr style="width: 90%;border: 1px solid red;"></td>
      </tr>
	  <tr>

        <td style="text-align: center;color: white;"><br></td>

      </tr>
      <tr>
        <td style="text-align: center;">
          <?php
       $Searching1 = "SELECT * FROM branch ORDER BY DESCRIPTION ASC ";
       $SearchingResults1=mysqli_query($con,$Searching1);
       if($SearchingResults1->num_rows > 0){
  while ($rows=mysqli_fetch_array($SearchingResults1)) {
    $BRANCHNAME = $rows['DESCRIPTION'];
	$BRANCHPREFIX = $rows['PREFIX'];
	echo'<input type="checkbox" id="'.$BRANCHPREFIX.'" name="STATUS[]" value="'.$BRANCHPREFIX.'"><label style="color:white;" for="'.$BRANCHPREFIX.'">'.$BRANCHNAME.' | </label>';
}
}
  ?>
    </select></td>
	</tr>
  </table>
<div class="hover">
 <button class="input-group-text" type="submit" for="Search1" style="color: white;"><i class="fa fa-search" ></i> SEARCH</button>
 <input type="hidden" name="SearchFilter" class="input-group-text" id="Search1">
 </div>
 </center>
    <br>
    <br>
    <section class="display">
    <table border="2px" style="width: 100%; border-collapse: collapse;">
      <tr>
        <td style="text-align: center;color: red;">ID NUMBER</td>
        <td style="text-align: center;color: red;">ACCESSION</td>
        <td style="text-align: center;color: red;">MRN</td>
        <td style="text-align: center;color: red;">NAME</td>
		<td style="text-align: center;color: red;">SURNAME</td>
        <td style="text-align: center;color: red;">PROCEDURE</td>
        <td style="text-align: center;color: red;">STATUS</td>
      </tr>
  <?php
  $Searching1 = "SELECT * FROM study WHERE ACCESSION LIKE '%$var2%'";
  $SearchingResults1=mysqli_query($con,$Searching1);

 if($SearchingResults1->num_rows > 0){
  while ($rows=mysqli_fetch_array($SearchingResults1) ) {
    $STUDYID = $rows['StudyID'];
	$SESSIONID = $rows['SESSIONID'];
	$ACCESSION = $rows['Accession'];
    $PATIENTSID = $rows['PatientsID'];
    $PATIENTSPROCEDURE= $rows['PatientsProcedure'];
    $DOCTOR = $rows['AssignedRadiographer'];
    $STATUS = $rows['Status'];

	 $Searching2 = "SELECT * FROM $var2 WHERE SESSIONID = '$SESSIONID' AND AccIndex2!=''";
  $SearchingResults2=mysqli_query($con,$Searching2);
   if($SearchingResults2==true){
	$rows2=mysqli_fetch_array($SearchingResults2);
		$NAME = $rows2['Name'];
	$SURNAME = $rows2['Surname'];
	$IDNUMBER = $rows2['IdentityNumber'];
	$SESSIONID1 = $rows2['SESSIONID'];
	$MRN1 = $rows2['MRN'];
	$SEX = $rows2['Sex'];
     echo '
     <tr>
        <td style="text-align: center;color:white;">'.$IDNUMBER.'</td>
        <td style="text-align: center;color:white;">'.$ACCESSION.'</td>
        <td style="text-align: center;color:white;">'.$PATIENTSID.'</td>
        <td style="text-align: center;color:white;"><a href="Add3.php?SESSIONID='.$SESSIONID1.'&MRN='.$MRN1.'&PatientsID='.$PATIENTSID.'&Accession='.$ACCESSION.'"
		style="text-decoration:none;color: red;">'.$NAME.'</a></td>
		<td style="text-align: center;color:white;"><a href="Add3.php?SESSIONID='.$SESSIONID1.'&MRN='.$MRN1.'&PatientsID='.$PATIENTSID.'&Accession='.$ACCESSION.'"
		style="text-decoration:none;color: red;">'.$SURNAME.'</a></td>
        <td style="text-align: center;color:white;">'.$PATIENTSPROCEDURE.'</td>
        <td style="text-align: center;color:white;"><a style="text-decoration:none;color:white;" href="Update1.php?ID='.$PATIENTSID.'&ACC='.$ACCESSION.'&NOTE=&SCHEDULE=&PRI=&RAD=">'.$STATUS.'</a></td>
	  </tr>
    ';

 }}}
  ?>
   <?php
  $Searching1 = "SELECT * FROM study WHERE Status != 'Waiting' AND ACCESSION LIKE '%$var2%'";
  $SearchingResults1=mysqli_query($con,$Searching1);

 if($SearchingResults1->num_rows > 0){
  while ($rows=mysqli_fetch_array($SearchingResults1) ) {
    $STUDYID = $rows['StudyID'];
	$SESSIONID = $rows['SESSIONID'];
	$ACCESSION = $rows['Accession'];
    $PATIENTSID = $rows['PatientsID'];
    $PATIENTSPROCEDURE= $rows['PatientsProcedure'];
    $DOCTOR = $rows['AssignedRadiographer'];
    $STATUS = $rows['Status'];

	 $Searching2 = "SELECT * FROM $var2 WHERE SESSIONID = '$SESSIONID' AND AccIndex2!=''";
  $SearchingResults2=mysqli_query($con,$Searching2);
	$rows2=mysqli_fetch_array($SearchingResults2);
		$NAME = $rows2['Name'];
	$SURNAME = $rows2['Surname'];
	$IDNUMBER = $rows2['IdentityNumber'];
	$SESSIONID1 = $rows2['SESSIONID'];
	$MRN1 = $rows2['MRN'];
	$SEX = $rows2['Sex'];
     echo '
     <tr>
        <td style="text-align: center;color:white;">'.$IDNUMBER.'</td>
        <td style="text-align: center;color:white;">'.$ACCESSION.'</td>
        <td style="text-align: center;color:white;">'.$PATIENTSID.'</td>
        <td style="text-align: center;color:white;"><a href="Add3.php?SESSIONID='.$SESSIONID1.'&MRN='.$MRN1.'&PatientsID='.$PATIENTSID.'&Accession='.$ACCESSION.'"
		style="text-decoration:none;color: red;">'.$NAME.'</a></td>
		<td style="text-align: center;color:white;"><a href="Add3.php?SESSIONID='.$SESSIONID1.'&MRN='.$MRN1.'&PatientsID='.$PATIENTSID.'&Accession='.$ACCESSION.'"
		style="text-decoration:none;color: red;">'.$SURNAME.'</a></td>
        <td style="text-align: center;color:white;">'.$PATIENTSPROCEDURE.'</td>
        <td style="text-align: center;color:white;">'.$STATUS.'</td>
	  </tr>
    ';

	   }}
  ?>
  </table>
  </section>
</form>
</div>

<div id="REPORTS" class="tabcontent" style="border: 1px solid black;">
<div class="tab" style="background: black;border: 2px solid black;border-bottom: 2px solid red;">
<center>
<i class="fa fa-envelope" id ="left" style="color: white;"></i><button class="tablinks" onclick="openCity(event, 'FILM PRINT')">FILM PRINT</button>
<i class="fa fa-search" id ="left" style="color: white;"></i><button class="tablinks" onclick="openCity(event, 'FILM USE')">FILM USE</button>
<i class="fa fa-briefcase" id ="left" style="color: white;"></i><button class="tablinks" onclick="openCity(event, 'REPEAT XRAY')"> REPEAT XRAY</button>
<i class="fa fa-envelope" id ="left" style="color: white;"></i><button class="tablinks" onclick="openCity(event, 'MAMMO STAT')">MAMMO STAT</button>
<i class="fa fa-question-circle" id ="left" style="color: white;"></i><button class="tablinks" onclick="openCity(event, 'WORKLOAD')">WORKLOAD</button>
<i class="fa fa-question-circle" id ="left" style="color: white;"></i><button class="tablinks" onclick="openCity(event, 'QUERY')" style="border: none;">QUERY</button>
</center>
</div>
</div>
<div id="FILM PRINT" class="tabcontent">

</div>
<div id="FILM USE" class="tabcontent">

</div>
<div id="REPEAT XRAY" class="tabcontent">

</div>
<div id="MAMMO STAT" class="tabcontent">

</div>
<div id="WORKLOAD" class="tabcontent">

</div>
<div id="QUERY" class="tabcontent">

</div>



<div id="PACS" class="tabcontent">


</div>
</div>
<div id="CALENDAR" class="tabcontent" style="border: 1px solid black;color:white;">

</div>
<script>
  function openCity(evt, cityName) {
  // Declare all variables
  var i, tabcontent, tablinks;

  // Get all elements with class="tabcontent" and hide them
  tabcontent = document.getElementsByClassName("tabcontent");
  for (i = 0; i < tabcontent.length; i++) {
    tabcontent[i].style.display = "none";
  }

  // Get all elements with class="tablinks" and remove the class "active"
  tablinks = document.getElementsByClassName("tablinks");
  for (i = 0; i < tablinks.length; i++) {
    tablinks[i].className = tablinks[i].className.replace(" active", "");
  }

  // Show the current tab, and add an "active" class to the button that opened the tab
  document.getElementById(cityName).style.display = "block";
  evt.currentTarget.className += " active";
}
</script>
<script>
function Hide() {
  var x = document.getElementById("Hide");
  if (x.style.display === "none") {
    x.style.display = "block";
  } else {
    x.style.display = "none";
  }
}
function HideThis() {
  var x = document.getElementById("HideThis");
  if (x.style.display === "none") {
    x.style.display = "block";
  } else {
    x.style.display = "none";
  }
}
</script>
</body>
<script src="Javascript/jquery-1.11.0.js"></script>
<script src="Javascript/effects.js"></script>
</html>
