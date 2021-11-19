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
        header("location: SearchedFilterRadiologist.php?MRN=$MRNFILTER&S=$SFILTER&NAME=$NAMEFILTER&SURNAME=$SURNAMEFILTER&PHYSICIAN=$PHYSICIAN&BRANCH=$BRANCH&FROM=$FROMFILTER&TO=$TOFILTER".http_build_query($STATUS));
	   }
}}
if (isset($_POST['Save'])) {
           $PHYSICIAN3= $_POST['PHYSICIAN3'];
		   $ACCESSION3= $_POST['ACCESSION3'];
$qry=mysqli_query($con,"UPDATE study SET AssignedRadiologist='$PHYSICIAN3'  WHERE Accession = '$ACCESSION3'"); 
 header("location: Radiologist.php");
	    
	   }
?>
<!doctype html>
<html style="background: black;">
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta http-equiv="X-UA-Compatible" content="IE=Edge">
<meta name="keywords" content="">
<meta name="description" content="">
<title>Radiologist</title>
<link href="Css/style.css" rel="stylesheet" type="text/css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<link rel="stylesheet" href="https://fonts.google.com/specimen/Montserrat"type='text/css'>
<link href='http://fonts.googleapis.com/css?family=Montserrat' rel='stylesheet' type='text/css'>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script>
function new_disp(ACCESSION){
   document.getElementById('myform').style.display='block';
   document.getElementById("ACCESSION").value = ACCESSION;
 }
 function new_disp2(){
   document.getElementById('myform').style.display='none';
 }
</script>
</head> 
<body>
<div class="Content1">
<div class="tab" style="background: black;border: 2px solid black;border-bottom: 2px solid red;">
<button class="tablinks" onclick="window.location.href='Radiologist.php'" >RIS</button>
<button class="tablinks"><a style="text-decoration: none; color:white;" href="logout.php">logout</a></button>
<button style="width: 30%;"></button>
<i class="fa fa-briefcase" id ="left" style="color: white;"></i><button class="tablinks" onclick="openCity(event, 'WORKLIST')" > WORKLIST</button>
<i class="fa fa-search" id ="left" style="color: white;"></i><button class="tablinks" onclick="openCity(event, 'ADDENDUM')">ADDENDUM</button>
<i class="fa fa-envelope" id ="left" style="color: white;"></i><button class="tablinks" onclick="openCity(event, 'REPORTS')" >REPORTS</button>
<i class="fa fa-question-circle" id ="left" style="color: white;"></i><button class="tablinks" onclick="openCity(event, 'HELP')" >HELP</button>
<button class="tablinks" onclick="window.open('http://192.168.50.160/login.html');" style="border: none;">PACS</button>
</div>
</div>

<!-- Tab content -->
<div id="RIS" class="tabcontent">
<center>
<Section id="Search">
  
</Section>
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
		<input type="checkbox" id="Dictate" name="STATUS[]" value="Dictate"><label for="Dictate">Dictate </label>
		<input type="checkbox" id="Dictating" name="STATUS[]" value="Dictating"><label for="Dictating">Dictating </label>
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
		<input type="checkbox" id="Authorize" name="STATUS[]" value="Authorize"><label for="Authorize">Authorize </label>
		<input type="checkbox" id="Authorizing" name="STATUS[]" value="Authorizing"><label for="Authorizing">Authorizing </label>
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
    <table border="1px" style="width: 100%;">
      <tr>
        <td style="text-align: center;color: red;">STUDY ID</td>
        <td style="text-align: center;color: red;">ACCESSION</td>
		<td style="text-align: center;color: red;">MRN</td>
        <td style="text-align: center;color: red;">NAME</td>
		<td style="text-align: center;color: red;">SURNAME</td>
		<td style="text-align: center;color: red;">RADIOLOGIST</td>
        <td style="text-align: center;color: red;">PROCEDURE</td>
        <td style="text-align: center;color: red;">REPORT DATE</td>
        <td style="text-align: center;color: red;">STATUS</td>
      </tr>
       <?php
  $Searching1 = "SELECT * FROM study WHERE (Status = 'Dictate' OR Status = 'Dictating' OR Status = 'Authorize' OR Status = 'Authorizing') AND ACCESSION LIKE '%$var2%'";
  $SearchingResults1=mysqli_query($con,$Searching1);
 
 if($SearchingResults1->num_rows > 0){
  while ($rows=mysqli_fetch_array($SearchingResults1) ) {
    $STUDYID = $rows['StudyID'];
	$ACCESSION = $rows['Accession'];
    $PATIENTSID = $rows['PatientsID'];
	$SESSIONID = $rows['SESSIONID'];
    $PATIENTSPROCEDURE= $rows['PatientsProcedure'];
    $DOCTOR = $rows['AssignedRadiologist'];
	$PRIORITY = $rows['Priority'];
    $STATUS = $rows['Status'];
	$CANCELLED = $rows['Cancelled'];

	 $Searching2 = "SELECT * FROM $var2 WHERE SESSIONID = '$SESSIONID' AND AccIndex2!=''";
  $SearchingResults2=mysqli_query($con,$Searching2);
	$rows2=mysqli_fetch_array($SearchingResults2);
		$NAME = $rows2['Name'];
	$SURNAME = $rows2['Surname'];
	$SESSIONID1 = $rows2['SESSIONID'];
	$MRN1 = $rows2['MRN'];
	$SEX = $rows2['Sex'];
	echo'
	<div id="myform" style="display:none">
    <form action="" method="post" enctype="multipart/form-data">
	<input type="text"  name="ACCESSION3" id="ACCESSION" hidden >
        <select name="PHYSICIAN3" id="PHYSICIAN3" style=" width: 240px; text-align: center;border-radius: 20px 20px 20px 20px;padding-left: 10px;margin-left: 20px;border: 1px solid white;background: black;color: white;">
          <option value="NONE"></option>
          ';
		  
       $Searching3 = "SELECT * FROM referring_doctor ORDER BY INITIALS ASC";
       $SearchingResults3=mysqli_query($con,$Searching3);
       if($SearchingResults3->num_rows > 0){
  while ($rows3=mysqli_fetch_array($SearchingResults3)) {
	 $DOCCODE = $rows3['CODE'];
     $TITLE = $rows3['TITLE'];
	 $INITIALS = $rows3['INITIALS'];
	 $SURNAME1 = $rows3['SURNAME'];
echo '<option value="'.$TITLE.' '.$INITIALS.' '.$SURNAME1.'">'.$INITIALS.' '.$SURNAME1.' '.$TITLE.'</option>';
}
}
  echo'
    </select>
        <input type="submit" value="Save" name="Save">
    </form>
	<button onclick="new_disp2();">Cancel</button>
</div>
';
     echo '
	  <tr>
        <td style="text-align: center;color:white;">'.$STUDYID.'</td>
        <td style="text-align: center;color:white;">'.$ACCESSION.'</td>
		<td style="text-align: center;color:white;">'.$PATIENTSID.'</td>
        <td style="text-align: center;color:white;"><a href="Add3.php?SESSIONID='.$SESSIONID1.'&MRN='.$MRN1.'&PatientsID='.$PATIENTSID.'&Accession='.$ACCESSION.'" 
		style="text-decoration:none;color: red;">'.$NAME.'</a></td>
		<td style="text-align: center;color:white;"><a href="Add3.php?SESSIONID='.$SESSIONID1.'&MRN='.$MRN1.'&PatientsID='.$PATIENTSID.'&Accession='.$ACCESSION.'" 
		style="text-decoration:none;color: red;">'.$SURNAME.'</a></td>
		<td style="text-align: center;color:white;">'.$DOCTOR.'<button style="float:right;" onclick="new_disp(\''.$ACCESSION.'\');">ADD</button></td>
        <td style="text-align: center;color:white;">'.$PATIENTSPROCEDURE.'</td>
        <td style="text-align: center;color:white;">'.$PRIORITY.'</td>
        <td style="text-align: center;color:white;"><a style="text-decoration:none;color:'.$CANCELLED.';" href="Update1.php?ID='.$PATIENTSID.'&ACC='.$ACCESSION.'&NOTE=&SCHEDULE=&PRI=&RAD="">'.$STATUS.'</a></td>
      </tr>
    ';

	   }}
  ?>
  </table>
  </section>
</form>
</div>

<div id="ADDENDUM" class="tabcontent" style="border: 1px solid black;">
<center>
<Section id="Search">
  <input type="text" class="form-control" placeholder="MRN" id="MRN" name="MRN" style="margin-top: 120px;color: black;">
  <br>
  <br>
  <input type="text" class="form-control" placeholder="NAME" id="NAME" name="NAME" style="margin-top: -60px;">
  <br>
  <br>
  <input type="text" class="form-control" placeholder="SURNAME" id="SURNAME" name="SURNAME" style="margin-top: -20px;">
  <br>
  <br>
  <label style="color: red;">
    Search Patient Order For Addendum
  </label>
  <br>
  <br>
  <div class="hover">
  <span class="input-group-text" id="Submit" type="submit" name="Submit" value="Submit" onclick="submit()" style="color: white;"><i class="fa fa-search" ></i> SEARCH
 </span>
 </div>
  <table border="1px" style="width: 100%;margin-top: 30px;">
      <tr>
        <td style="text-align: center;color: red;">HN</td>
        <td style="text-align: center;color: red;">NAME</td>
        <td style="text-align: center;color: red;">SURNAME</td>
        <td style="text-align: center;color: red;">HN</td>
      </tr>
    </table>
</div>
</Section>
</center>
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
</div>

<div id="PACS" class="tabcontent">

</div>
<script>
  function submit()
  {
    document.getElementById('Search').submit();
  }
</script>
<script>
  function submit1()
  {
    document.getElementById('CTN').submit1();
  }
</script>
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