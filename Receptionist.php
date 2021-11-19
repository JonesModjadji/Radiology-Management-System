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
if (isset($_POST['Delete'])) {
	$ID = $_POST['ID'];
	$sql2 ="DELETE FROM event_calendar WHERE id='$ID'";
	$results2 = mysqli_query($con,$sql2);

 if ($results2) {
	 header("location: Receptionist.php");

 }
}

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
<title>Receptionist</title>
<link href="Css/style.css" rel="stylesheet" type="text/css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<link rel="stylesheet" href="https://fonts.google.com/specimen/Montserrat"type='text/css'>
<link href='http://fonts.googleapis.com/css?family=Montserrat' rel='stylesheet' type='text/css'>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
</head> 
<body>
<div class="Content1">
<div class="tab" style="background: black;border: 2px solid black;border-bottom: 2px solid red;">
<button class="tablinks" onclick="window.location.href='Receptionist.php'" >RIS</button>
<button class="tablinks"><a style="text-decoration: none; color:white;" href="logout.php">logout</a></button>
<button style="width: 25%;"></button>
<i class="fa fa-search" id ="left" style="color: white;"></i><button class="tablinks" onclick="openCity(event, 'SEARCHS')" >SEARCH</button>
<i class="fa fa-briefcase" id ="left" style="color: white;"></i><button class="tablinks" onclick="openCity(event, 'WORKLIST')" > WORKLIST</button>
<i class="fa fa-envelope" id ="left" style="color: white;"></i><button class="tablinks" onclick="openCity(event, 'REPORTS')" >REPORTS</button>
<i class="fa fa-calendar" id ="left" style="color: white;"></i><button onclick="window.open('Calendar.php?ID=<?php echo $var2?>', '_blank');">SCHEDULER</button>
<i class="fa fa-question-circle" id ="left" 
<?php  
$Searching0 = "SELECT * FROM event_calendar WHERE start LIKE '%$DATE%' AND Branch = '$var2'";
       $SearchingResults0=mysqli_query($con,$Searching0);
if (mysqli_num_rows($SearchingResults0) > 0){
	echo'style="color: red;">';
}
else{
	echo'style="color: white;">';
}
?>
</i><button class="tablinks" onclick="openCity(event, 'HELP')" >HELP</button>



<button class="tablinks" onclick="window.open('http://192.168.50.160/login.html');" style="border: none;">PACS</button>

</div>

<div id="RIS" class="tabcontent" onclick="window.open('http://192.168.50.160/?accnum=12345678');" >
<!-- Tab content -->
<center>
<Section id="Search">
  
</Section>
</center>
</div>

<div id="SEARCHS" class="tabcontent" style="border: 1px solid black;">
<center>
  <form action="" method="post" enctype="multipart/form-data">
<Section id="Search">
  <input type="text" class="form-control" placeholder="Enter Patient ID" name="Search" required="" style="color: white;">
  <br>
   <br>
  <label style="color: white;font-size: 11px;">
    Search Identity Number,Session ID,Patient ID or MRN
  </label>
  <br>
  <label style="color: red;">
    Search existing patients before entering new patients
  </label>
  <br>
  <br>
  <div class="hover">
 <button class="input-group-text" type="submit" for="Search" style="color: white;"><i class="fa fa-search"></i> SEARCH</button>
 <input type="hidden" name="Submit" class="input-group-text" id="Search">
 </div>
</div>
</Section>
</form>
</center>
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
        <td> <select name="PHYSICIAN" id="PHYSICIAN" style=" width: 300px; text-align: center;border-radius: 20px 20px 20px 20px;padding-left: 10px;margin-left: 50px;border: 1px solid white;background: black;color: white;">
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
     <tr><td style="text-align:center;"><label style="color:white;"><?php 
	  $Searching1 = "SELECT * FROM branch WHERE PREFIX= '$var2'  LIMIT 1";
       $SearchingResults1=mysqli_query($con,$Searching1);
       if($SearchingResults1->num_rows > 0){
  while ($rows=mysqli_fetch_array($SearchingResults1)) {
    $BRANCHNAME = $rows['DESCRIPTION'];

	echo $BRANCHNAME;
}
}
	 ?></label><br><br></td></tr>
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
  $Searching1 = "SELECT * FROM study WHERE Status = 'Waiting' AND ACCESSION LIKE '%$var2%'";
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
		style="text-decoration:none;color: white;">'.$NAME.'</a></td>
		<td style="text-align: center;color:white;"><a href="Add3.php?SESSIONID='.$SESSIONID1.'&MRN='.$MRN1.'&PatientsID='.$PATIENTSID.'&Accession='.$ACCESSION.'" 
		style="text-decoration:none;color: white;">'.$SURNAME.'</a></td>
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
		style="text-decoration:none;color: white;">'.$NAME.'</a></td>
		<td style="text-align: center;color:white;"><a href="Add3.php?SESSIONID='.$SESSIONID1.'&MRN='.$MRN1.'&PatientsID='.$PATIENTSID.'&Accession='.$ACCESSION.'" 
		style="text-decoration:none;color: white;">'.$SURNAME.'</a></td>
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

<div id="HELP" class="tabcontent"  style="border: 1px solid black;">
<div class="tab" style="background: black;border: 2px solid black;border-bottom: 2px solid red;">
<center>
<i class="fa fa-envelope" id ="left" style="color: white;"></i><button class="tablinks"  onclick="window.open('Receptionist.php');">RECEPTIONIST</button>
<i class="fa fa-briefcase" id ="left" style="color: white;"></i><button class="tablinks"  onclick="window.open('Radiographer.php');">RADIOGRAPHER</button>
<i class="fa fa-briefcase" id ="left" style="color: white;"></i><button class="tablinks"  onclick="window.open('Radiologist.php');">RADIOLOGIST</button>
<i class="fa fa-envelope" id ="left" style="color: white;"></i><button class="tablinks"  onclick="window.open('Typist.php');">TYPIST</button>
</center>
</div>
<br>
<section class="display">
    <table border="2px" style="width: 100%; border-collapse: collapse;">
      <tr>
        <td style="text-align: center;color: red;">TITLE</td>
        <td style="text-align: center;color: red;">NAME</td>
        <td style="text-align: center;color: red;">SURNAME</td>
        <td style="text-align: center;color: red;">START</td>
		<td style="text-align: center;color: red;">END</td>
        <td style="text-align: center;color: red;">ADD</td>
        <td style="text-align: center;color: red;">REMOVE</td>
      </tr>
	   <?php
  $Searching3 = "SELECT * FROM event_calendar WHERE start LIKE '%$DATE%' AND Branch = '$var2' order by start ASC";
  $SearchingResults3=mysqli_query($con,$Searching3);
 
 if($SearchingResults3->num_rows > 0){
  while ($rows=mysqli_fetch_array($SearchingResults3) ) {
    $TITLE = $rows['title'];
	$START = $rows['start'];
	$END = $rows['end'];
    $NAME = $rows['Name'];
    $SURNAME = $rows['Surname'];
	$ID = $rows['id'];
	$IDNUMBER = $rows['IDNumber'];
	$CONTACT = $rows['Contact'];
	$REFDOCTOR = $rows['RefDoctor'];
	$REFDOCTOR2 = $rows['RefDoctor2'];
	$BRANCH = $rows['Branch'];
	$date = strtotime($START);
	$date2 = strtotime($END);
	 
     echo '
     <tr>
        <td style="text-align: center;color:white;">'.$TITLE.'</td>
        <td style="text-align: center;color:white;">'.$NAME.'</td>
        <td style="text-align: center;color:white;">'.$SURNAME.'</td>
        <td style="text-align: center;color:white;">'.date('H:i:s', $date).'</td>
		<td style="text-align: center;color:white;">'.date('H:i:s', $date2).'</td>
        <td style="text-align: center;color:white;"><div class="hover">
		<a href="CAdd.php?ID='.$ID.'&NAME='.$NAME.'&SURNAME='.$SURNAME.'&CONTACT='.$CONTACT.'&IDNUMBER='.$IDNUMBER.'&BRANCH='.$BRANCH.'&REFDOCTOR='.$REFDOCTOR.'&REFDOCTOR2='.$REFDOCTOR2.'"><button>Add Patient</button></a></div></td>
        <form action="" method="post" enctype="multipart/form-data"><input type="text" id="ID" name="ID" value="'.$ID.'" hidden>
		<td style="text-align: center;color:white;"><div class="hover"><input type="submit" name="Delete" id="Delete" value="Remove Patient"></div></td>
	  </tr></form>
    ';

 }}
  ?>
	  </table>
	  </section>
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