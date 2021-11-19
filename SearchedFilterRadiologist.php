<?php 
session_start(); 
include("Connection.php");
            $MRNFILTER= $_GET['MRN'];
            $SFILTER= $_GET['S'];
            $NAMEFILTER= $_GET['NAME'];
            $SURNAMEFILTER= $_GET['SURNAME'];
            $STATUS= $_GET;
            $BRANCH= $_GET;
            $PHYSICIAN= $_GET['PHYSICIAN'];
            $FROMFILTER=  $_GET['FROM'];
            $TOFILTER=  $_GET['TO'];
			$DATE1=date("Y-m-d");
			$DATE2=date("Y-m-d");
			$DATE3=date("Y-m-d");
			$STATUS1s="";
			$STATUS2="";
			$STATUS3="";
			$STATUS4="";
			$STATUS5="";
			$STATUS6="";
			$STATUS7="";
			$STATUS8="";
			$STATUS9="";
			$STATUS10="";
			$STATUS11="";
			$STATUS12="";
			$STATUS13="";
			$STATUS14="";
			$STATUS15="";
			$STATUS16="";
			$STATUS17="";
			$STATUS18="";
			$STATUS19="";
			$STATUS20="";
			$STATUS21="";
			$STATUS22="";
			$STATUS23="";
			$STATUS24="";
			$STATUS25="";
			$STATUS26="";
			$STATUS27="";
			
			
			if(isset($STATUS[1])) {
				$STATUS1s=$STATUS[1];
			}
			if(isset($STATUS[2])) {
				$STATUS2=$STATUS[2];
			}
			if(isset($STATUS[3])) {
				$STATUS3=$STATUS[3];
			}
			if(isset($STATUS[4])) {
				$STATUS4=$STATUS[4];
			}
			if(isset($STATUS[5])) {
				$STATUS5=$STATUS[5];
			}
			if(isset($STATUS[6])) {
				$STATUS6=$STATUS[6];
			}
			if(isset($STATUS[7])) {
				$STATUS7=$STATUS[7];
			}
			if(isset($STATUS[8])) {
				$STATUS8=$STATUS[8];
			}
			if(isset($STATUS[9])) {
				$STATUS9=$STATUS[9];
			}
			if(isset($STATUS[10])) {
				$STATUS10=$STATUS[10];
			}
			if(isset($STATUS[11])) {
				$STATUS11=$STATUS[11];
			}
			if(isset($STATUS[12])) {
				$STATUS12=$STATUS[12];
			}
			if(isset($STATUS[13])) {
				$STATUS13=$STATUS[13];
			}
			if(isset($STATUS[14])) {
				$STATUS14=$STATUS[14];
			}
			if(isset($STATUS[15])) {
				$STATUS15=$STATUS[15];
			}
			if(isset($STATUS[16])) {
				$STATUS16=$STATUS[16];
			}
			if(isset($STATUS[17])) {
				$STATUS17=$STATUS[17];
			}
			if(isset($STATUS[18])) {
				$STATUS18=$STATUS[18];
			}
			if(isset($STATUS[19])) {
				$STATUS19=$STATUS[19];
			}
			if(isset($STATUS[20])) {
				$STATUS20=$STATUS[20];
			}
			if(isset($STATUS[21])) {
				$STATUS21=$STATUS[21];
			}
			if(isset($STATUS[22])) {
				$STATUS22=$STATUS[22];
			}
			if(isset($STATUS[23])) {
				$STATUS23=$STATUS[23];
			}
			if(isset($STATUS[24])) {
				$STATUS24=$STATUS[24];
			}
			if(isset($STATUS[25])) {
				$STATUS25=$STATUS[25];
			}
			if(isset($STATUS[26])) {
				$STATUS26=$STATUS[26];
			}
			if(isset($STATUS[27])) {
				$STATUS27=$STATUS[27];
			}
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
       header("location: SearchedFilterRadiologist.php?MRN=$MRNFILTER&S=$SFILTER&NAME=$NAMEFILTER&SURNAME=$SURNAMEFILTER&PHYSICIAN=$PHYSICIAN&FROM=$FROMFILTER&TO=$TOFILTER".http_build_query($STATUS));
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
<title>SearchedRadiologist</title>
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
<button class="tablinks" onclick="window.open('Radiologist.php');" >RIS</button>
<button style="width: 30%;"></button>
<i class="fa fa-search" id ="left" style="color: white;"></i><button class="tablinks" onclick="openCity(event, 'SEARCHED')" >SEARCHED</button>
<i class="fa fa-briefcase" id ="left" style="color: white;"></i><button class="tablinks" onclick="openCity(event, 'PRINT')"> PRINT</button>
<i class="fa fa-envelope" id ="left" style="color: white;"></i><button class="tablinks" onclick="openCity(event, 'REPORTS')">REPORT</button>
<i class="fa fa-question-circle" id ="left" style="color: white;"></i><button class="tablinks" onclick="openCity(event, 'HELP')">HELP</button>
<button class="tablinks" onclick="window.open('http://192.168.50.160/login.html');" style="border: none;">PACS</button>
</div>

<!-- Tab content -->
<div id="RIS" class="tabcontent">
<center>
<Section id="Search">
  
</Section>
</center>
</div>

<div id="SEARCHED" class="tabcontent" style="display:block;border: 1px solid black;">
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
      <td colspan="4"><hr style="width: 90%;border: 1px solid red;"></td> <tr><td style="text-align:center;"><label style="color:white;"><?php 
	  $Searching1 = "SELECT * FROM branch WHERE PREFIX= '$var2'  LIMIT 1";
       $SearchingResults1=mysqli_query($con,$Searching1);
       if($SearchingResults1->num_rows > 0){
  while ($rows=mysqli_fetch_array($SearchingResults1)) {
    $BRANCHNAME = $rows['DESCRIPTION'];

	echo $BRANCHNAME;
}
}
	 ?></label><br><br></td></tr>
	<tr></tr>
      <tr><td><br><br></td></tr>
	<tr>
        <td style="text-align: center;color: white;" colspan="2">STATUS:</td>
      </tr>
	<tr>
	<td style="text-align: center;color: white;">
		<input type="checkbox" id="Authorize" name="STATUS[]" value="Authorize"><label for="Authorize">Authorize </label>
		<input type="checkbox" id="Authorizing" name="STATUS[]" value="Authorizing"><label for="Authorizing">Authorizing </label>
		</td>
		</tr>
	<tr>
	<td style="text-align: center;color: white;">
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
        <td style="text-align: center;"><input type="Date" name="FROM" value="<?php echo $DATE1 ;?>" style="border-radius: 20px 20px 20px 20px;padding-left: 20px;padding-right: 20px;border: 1px solid white;background: black;color: white;"></td>
      </tr>
      <tr>
        <td style="text-align: center;color: white;">TO :</td>
      </tr>
      <tr>
        <td style="text-align: center;"><input type="date" name="TO" value="<?php echo $DATE2 ;?>" style="border-radius: 20px 20px 20px 20px;padding-left: 20px;padding-right: 20px;border: 1px solid white;background: black;color: white;"></td>
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
<table>
	  <tr>
	  <td>
	  <div class="hover">
 <button class="input-group-text" type="submit" for="Search1" style="color: white;"><i class="fa fa-search"></i> SEARCH</button>
 <input type="hidden" name="SearchFilter" class="input-group-text" id="Search1">
 </div>
	  </td>
	  <td>
	  <div class="hover">
 <button class="input-group-text" onclick="window.open('Radiologist.php');" style="color: white;"><i class="fa fa-times"></i> CLEAR</button>
 </div>
	  </td>
	  </tr>
	  </table>
 </center>
    <br>
    <br>
    <section class="display">
    <table border="1px" style="width: 100%;">
       <tr>
        <td style="text-align: center;color: red;">ID NUMBER</td>
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
	   $dbname = 'ris';
	   $sql = "SHOW TABLES FROM $dbname";
	   $result = mysqli_query($con,$sql);
	 while ($row = mysqli_fetch_row($result)) {
		 ob_start();
echo "{$row[0]}";
$var = ob_get_clean();
ob_start();

echo $_SESSION['suserbranch'];
$var2 = ob_get_clean();
		
                $Searching1 = "SELECT * FROM study,$var WHERE study.SESSIONID=$var.SESSIONID AND (study.Status ='Dictating' OR study.Status ='Dictate' OR study.Status ='Authorize' OR study.Status ='Authorizing') AND $var.Branch LIKE '%$var2%'
		AND (study.Status ='$STATUS1s' OR study.Status ='$STATUS2' OR study.Status ='$STATUS3' OR study.Status ='$STATUS4' 
		OR study.Status ='$STATUS5' OR study.Status ='$STATUS6' OR study.Status ='$STATUS7' OR study.Status ='$STATUS8' 
		OR study.Status ='$STATUS9' OR study.Status ='$STATUS10' OR study.Status ='$STATUS11' OR study.Status ='$STATUS12')AND( 
		$var.Name='$NAMEFILTER' OR $var.Surname='$SURNAMEFILTER' OR study.AssignedRadiographer ='$PHYSICIAN' 
		OR study.AssignedRadiologist ='$PHYSICIAN' OR $var.MRN='$MRNFILTER' 
		OR study.Accession='$SFILTER') ";
		
       $Searching2 = "SELECT * FROM study,$var WHERE (study.SESSIONID=$var.SESSIONID AND (study.Status ='Dictating' OR study.Status ='Dictate' OR study.Status ='Authorize' OR study.Status ='Authorizing') AND $var.Branch LIKE '%$var2%'
		AND (study.Status ='$STATUS1s' OR study.Status ='$STATUS2' OR study.Status ='$STATUS3' OR study.Status ='$STATUS4' 
		OR study.Status ='$STATUS5' OR study.Status ='$STATUS6' OR study.Status ='$STATUS7' OR study.Status ='$STATUS8' 
		OR study.Status ='$STATUS9' OR study.Status ='$STATUS10' OR study.Status ='$STATUS11' OR study.Status ='$STATUS12'))";
		
		$Searching3 = "SELECT * FROM study,$var WHERE (study.SESSIONID=$var.SESSIONID AND (study.Status ='Dictating' OR study.Status ='Dictate' OR study.Status ='Authorize' OR study.Status ='Authorizing') AND $var.Branch LIKE '%$var2%'
		AND ($var.Name='$NAMEFILTER' OR $var.Surname='$SURNAMEFILTER' OR study.AssignedRadiographer ='$PHYSICIAN' 
		OR study.AssignedRadiologist ='$PHYSICIAN' OR $var.MRN='$MRNFILTER' 
		OR study.Accession='$SFILTER' OR study.ExamDate BETWEEN '$FROMFILTER' AND '$TOFILTER' ))";
		
		$Searching4 = "SELECT * FROM study,$var WHERE (study.SESSIONID=$var.SESSIONID AND (study.Status ='Dictating' OR study.Status ='Dictate' OR study.Status ='Authorize' OR study.Status ='Authorizing') AND $var.Branch LIKE '%$var2%'
		AND ($var.Name='$NAMEFILTER' AND $var.Surname='$SURNAMEFILTER') AND '$STATUS1s'='' )";
		
		$Searching5 = "SELECT * FROM study,$var WHERE (study.SESSIONID=$var.SESSIONID AND (study.Status ='Dictating' OR study.Status ='Dictate' OR study.Status ='Authorize' OR study.Status ='Authorizing')  
		AND ($var.Branch='$STATUS1s' OR $var.Branch='$STATUS2' OR $var.Branch='$STATUS3'
		 OR $var.Branch='$STATUS4' OR $var.Branch='$STATUS5' OR $var.Branch='$STATUS6' OR $var.Branch='$STATUS7'
		  OR $var.Branch='$STATUS8' OR $var.Branch='$STATUS9' OR $var.Branch='$STATUS10' OR $var.Branch='$STATUS11'
		  OR $var.Branch='$STATUS12' OR $var.Branch='$STATUS13'
		 OR $var.Branch='$STATUS14' OR $var.Branch='$STATUS15' OR $var.Branch='$STATUS16' OR $var.Branch='$STATUS17'
		  OR $var.Branch='$STATUS18' OR $var.Branch='$STATUS19' OR $var.Branch='$STATUS20' OR $var.Branch='$STATUS21'
		   OR $var.Branch='$STATUS22' OR $var.Branch='$STATUS24' OR $var.Branch='$STATUS25'  
		   OR $var.Branch='$STATUS26' OR $var.Branch='$STATUS27' ))";
		
		$Searching6 = "SELECT * FROM study,$var WHERE (study.SESSIONID=$var.SESSIONID AND (study.Status ='Dictating' OR study.Status ='Dictate' OR study.Status ='Authorize' OR study.Status ='Authorizing') 
		AND ($var.Name='$NAMEFILTER' AND $var.Surname='$SURNAMEFILTER') AND '$STATUS1s'='$var2' )";
		
		$Searching7 = "SELECT * FROM study,$var WHERE (study.SESSIONID=$var.SESSIONID AND (study.PatientsID=patients.MRN AND (study.Status ='Dictating' OR study.Status ='Dictate' OR study.Status ='Authorize' OR study.Status ='Authorizing') AND ($var.Branch='$STATUS1s' OR $var.Branch='$STATUS2' OR $var.Branch='$STATUS3'
		 OR $var.Branch='$STATUS4' OR $var.Branch='$STATUS5' OR $var.Branch='$STATUS6' OR $var.Branch='$STATUS7'
		  OR $var.Branch='$STATUS8' OR $var.Branch='$STATUS9' OR $var.Branch='$STATUS10' OR $var.Branch='$STATUS11'
		  OR $var.Branch='$STATUS12' OR $var.Branch='$STATUS13'
		 OR $var.Branch='$STATUS14' OR $var.Branch='$STATUS15' OR $var.Branch='$STATUS16' OR $var.Branch='$STATUS17'
		  OR $var.Branch='$STATUS18' OR $var.Branch='$STATUS19' OR $var.Branch='$STATUS20' OR $var.Branch='$STATUS21'
		   OR $var.Branch='$STATUS22' OR $var.Branch='$STATUS24' OR $var.Branch='$STATUS25'  
		   OR $var.Branch='$STATUS26' OR $var.Branch='$STATUS27' )
		AND ($var.Name='$NAMEFILTER' OR $var.Surname='$SURNAMEFILTER' OR study.AssignedRadiographer ='$PHYSICIAN' 
		OR study.AssignedRadiologist ='$PHYSICIAN'  OR $var.MRN='$MRNFILTER' 
		OR study.Accession='$SFILTER' OR study.ExamDate BETWEEN '$FROMFILTER' AND '$TOFILTER' ))";
		
		echo'
	<div id="myform" style="display:none">
    <form action="" method="post" enctype="multipart/form-data">
	<input type="text"  name="ACCESSION3" id="ACCESSION" hidden >
        <select name="PHYSICIAN3" id="PHYSICIAN3" style=" width: 240px; text-align: center;border-radius: 20px 20px 20px 20px;padding-left: 10px;margin-left: 20px;border: 1px solid white;background: black;color: white;">
          <option value="NONE"></option>
          ';
		  
       $Searching8 = "SELECT * FROM referring_doctor ORDER BY INITIALS ASC";
       $SearchingResults8=mysqli_query($con,$Searching8);
       if($SearchingResults8->num_rows > 0){
  while ($rows3=mysqli_fetch_array($SearchingResults8)) {
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

if (($NAMEFILTER !=="")&&($SURNAMEFILTER =="")&&($STATUS1s =="")) {
	$SearchingResults3=mysqli_query($con,$Searching3);
	   if($SearchingResults3==true){
  while ($rows1=mysqli_fetch_array($SearchingResults3) ) {
     $STUDYID = $rows1['StudyID'];
	$ACCESSION = $rows1['Accession'];
    $PATIENTSID = $rows1['PatientsID'];
    $PATIENTSPROCEDURE= $rows1['PatientsProcedure'];
    $DOCTOR = $rows1['AssignedRadiologist'];
	$PRIORITY = $rows1['Priority'];
    $STATUS = $rows1['Status'];
	$CANCELLED = $rows1['Cancelled'];
	$SESSIONID1 = $rows1['SESSIONID'];
	$MRN1 = $rows1['MRN'];
	$NAME = $rows1['Name'];
	$SURNAME = $rows1['Surname'];
	$IDNUMBER = $rows1['IdentityNumber'];

     echo '
     <tr>
        <td style="text-align: center;color:white;">'.$IDNUMBER.'</td>
        <td style="text-align: center;color:white;">'.$ACCESSION.'</td>
		<td style="text-align: center;color:white;">'.$MRN1.'</td>
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

	   }} elseif($SearchingResults3==false){
        echo "";
}
}
if (($NAMEFILTER !=="")&&($SURNAMEFILTER =="")&&($STATUS1s !=="")) {
	$SearchingResults7=mysqli_query($con,$Searching7);
	   if($SearchingResults7==true){
  while ($rows1=mysqli_fetch_array($SearchingResults7) ) {
    $STUDYID = $rows1['StudyID'];
	$ACCESSION = $rows1['Accession'];
    $PATIENTSID = $rows1['PatientsID'];
    $PATIENTSPROCEDURE= $rows1['PatientsProcedure'];
    $DOCTOR = $rows1['AssignedRadiologist'];
	$PRIORITY = $rows1['Priority'];
    $STATUS = $rows1['Status'];
	$CANCELLED = $rows1['Cancelled'];
	$SESSIONID1 = $rows1['SESSIONID'];
	$MRN1 = $rows1['MRN'];
	$NAME = $rows1['Name'];
	$SURNAME = $rows1['Surname'];
	$IDNUMBER = $rows1['IdentityNumber'];

     echo '
     <tr>
        <td style="text-align: center;color:white;">'.$IDNUMBER.'</td>
        <td style="text-align: center;color:white;">'.$ACCESSION.'</td>
		<td style="text-align: center;color:white;">'.$MRN1.'</td>
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

	   }} elseif($SearchingResults7==false){
        echo "";
}
}
if (($NAMEFILTER =="")&&($SURNAMEFILTER !=="")&&($STATUS1s =="")) {
	$SearchingResults3=mysqli_query($con,$Searching3);
	   if($SearchingResults3==true){
  while ($rows1=mysqli_fetch_array($SearchingResults3) ) {
    $STUDYID = $rows1['StudyID'];
	$ACCESSION = $rows1['Accession'];
    $PATIENTSID = $rows1['PatientsID'];
    $PATIENTSPROCEDURE= $rows1['PatientsProcedure'];
    $DOCTOR = $rows1['AssignedRadiologist'];
	$PRIORITY = $rows1['Priority'];
    $STATUS = $rows1['Status'];
	$CANCELLED = $rows1['Cancelled'];
	$SESSIONID1 = $rows1['SESSIONID'];
	$MRN1 = $rows1['MRN'];
	$NAME = $rows1['Name'];
	$SURNAME = $rows1['Surname'];
	$IDNUMBER = $rows1['IdentityNumber'];

     echo '
     <tr>
        <td style="text-align: center;color:white;">'.$IDNUMBER.'</td>
        <td style="text-align: center;color:white;">'.$ACCESSION.'</td>
		<td style="text-align: center;color:white;">'.$MRN1.'</td>
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

	   }} elseif($SearchingResults3==false){
        echo "";
}
}
if (($NAMEFILTER =="")&&($SURNAMEFILTER !=="")&&($STATUS1s !=="")) {
	$SearchingResults7=mysqli_query($con,$Searching7);
	   if($SearchingResults7==true){
  while ($rows1=mysqli_fetch_array($SearchingResults7) ) {
    $STUDYID = $rows1['StudyID'];
	$ACCESSION = $rows1['Accession'];
    $PATIENTSID = $rows1['PatientsID'];
    $PATIENTSPROCEDURE= $rows1['PatientsProcedure'];
    $DOCTOR = $rows1['AssignedRadiologist'];
	$PRIORITY = $rows1['Priority'];
    $STATUS = $rows1['Status'];
	$CANCELLED = $rows1['Cancelled'];
	$SESSIONID1 = $rows1['SESSIONID'];
	$MRN1 = $rows1['MRN'];
	$NAME = $rows1['Name'];
	$SURNAME = $rows1['Surname'];
	$IDNUMBER = $rows1['IdentityNumber'];

     echo '
     <tr>
        <td style="text-align: center;color:white;">'.$IDNUMBER.'</td>
        <td style="text-align: center;color:white;">'.$ACCESSION.'</td>
		<td style="text-align: center;color:white;">'.$MRN1.'</td>
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

	   }} elseif($SearchingResults7==false){
        echo "";
}
}
if (($NAMEFILTER =="")&&($SURNAMEFILTER =="")&&($STATUS1s =="")) {
	$SearchingResults3=mysqli_query($con,$Searching3);
	   if($SearchingResults3==true){
  while ($rows1=mysqli_fetch_array($SearchingResults3) ) {
    $STUDYID = $rows1['StudyID'];
	$ACCESSION = $rows1['Accession'];
    $PATIENTSID = $rows1['PatientsID'];
    $PATIENTSPROCEDURE= $rows1['PatientsProcedure'];
    $DOCTOR = $rows1['AssignedRadiologist'];
	$PRIORITY = $rows1['Priority'];
    $STATUS = $rows1['Status'];
	$CANCELLED = $rows1['Cancelled'];
	$SESSIONID1 = $rows1['SESSIONID'];
	$MRN1 = $rows1['MRN'];
	$NAME = $rows1['Name'];
	$SURNAME = $rows1['Surname'];
	$IDNUMBER = $rows1['IdentityNumber'];

     echo '
     <tr>
        <td style="text-align: center;color:white;">'.$IDNUMBER.'</td>
        <td style="text-align: center;color:white;">'.$ACCESSION.'</td>
		<td style="text-align: center;color:white;">'.$MRN1.'</td>
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

	   }} elseif($SearchingResults3==false){
        echo "";
}
}
if (($NAMEFILTER =="")&&($SURNAMEFILTER =="")&&($STATUS1s !=="")) {
	$SearchingResults7=mysqli_query($con,$Searching7);
	   if($SearchingResults7==true){
  while ($rows1=mysqli_fetch_array($SearchingResults7) ) {
    $STUDYID = $rows1['StudyID'];
	$ACCESSION = $rows1['Accession'];
    $PATIENTSID = $rows1['PatientsID'];
    $PATIENTSPROCEDURE= $rows1['PatientsProcedure'];
    $DOCTOR = $rows1['AssignedRadiologist'];
	$PRIORITY = $rows1['Priority'];
    $STATUS = $rows1['Status'];
	$CANCELLED = $rows1['Cancelled'];
	$SESSIONID1 = $rows1['SESSIONID'];
	$MRN1 = $rows1['MRN'];
	$NAME = $rows1['Name'];
	$SURNAME = $rows1['Surname'];
	$IDNUMBER = $rows1['IdentityNumber'];

     echo '
     <tr>
        <td style="text-align: center;color:white;">'.$IDNUMBER.'</td>
        <td style="text-align: center;color:white;">'.$ACCESSION.'</td>
		<td style="text-align: center;color:white;">'.$MRN1.'</td>
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

	   }} elseif($SearchingResults7==false){
        echo "";
}
}

 if (($NAMEFILTER !=="")&&($SURNAMEFILTER !=="")&&($STATUS1s =="")) {
		$SearchingResults4=mysqli_query($con,$Searching4);
		if($SearchingResults4==true){
  while ($rows1=mysqli_fetch_array($SearchingResults4) ) {
    $STUDYID = $rows1['StudyID'];
	$ACCESSION = $rows1['Accession'];
    $PATIENTSID = $rows1['PatientsID'];
    $PATIENTSPROCEDURE= $rows1['PatientsProcedure'];
    $DOCTOR = $rows1['AssignedRadiologist'];
	$PRIORITY = $rows1['Priority'];
    $STATUS = $rows1['Status'];
	$CANCELLED = $rows1['Cancelled'];
	$SESSIONID1 = $rows1['SESSIONID'];
	$MRN1 = $rows1['MRN'];
	$NAME = $rows1['Name'];
	$SURNAME = $rows1['Surname'];
	$IDNUMBER = $rows1['IdentityNumber'];

     echo '
     <tr>
        <td style="text-align: center;color:white;">'.$IDNUMBER.'</td>
        <td style="text-align: center;color:white;">'.$ACCESSION.'</td>
		<td style="text-align: center;color:white;">'.$MRN1.'</td>
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

	   }} elseif($SearchingResults4==false){
        echo "";
}
}
if (($NAMEFILTER !=="")&&($SURNAMEFILTER !=="")&&($STATUS1s !=="")) {
		$SearchingResults6=mysqli_query($con,$Searching6);
		if($SearchingResults6==true){
  while ($rows1=mysqli_fetch_array($SearchingResults6) ) {
    $STUDYID = $rows1['StudyID'];
	$ACCESSION = $rows1['Accession'];
    $PATIENTSID = $rows1['PatientsID'];
    $PATIENTSPROCEDURE= $rows1['PatientsProcedure'];
    $DOCTOR = $rows1['AssignedRadiologist'];
	$PRIORITY = $rows1['Priority'];
    $STATUS = $rows1['Status'];
	$CANCELLED = $rows1['Cancelled'];
	$SESSIONID1 = $rows1['SESSIONID'];
	$MRN1 = $rows1['MRN'];
	$NAME = $rows1['Name'];
	$SURNAME = $rows1['Surname'];
	$IDNUMBER = $rows1['IdentityNumber'];

     echo '
     <tr>
        <td style="text-align: center;color:white;">'.$IDNUMBER.'</td>
        <td style="text-align: center;color:white;">'.$ACCESSION.'</td>
		<td style="text-align: center;color:white;">'.$MRN1.'</td>
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

	   }} elseif($SearchingResults6==false){
        echo "";
}
}
if (($NAMEFILTER =="")&&($SURNAMEFILTER =="")&&($STATUS !=="") ) {
	$SearchingResults1=mysqli_query($con,$Searching1);
		if($SearchingResults1==true){
  while ($rows1=mysqli_fetch_array($SearchingResults1) ) {
    $STUDYID = $rows1['StudyID'];
	$ACCESSION = $rows1['Accession'];
    $PATIENTSID = $rows1['PatientsID'];
    $PATIENTSPROCEDURE= $rows1['PatientsProcedure'];
    $DOCTOR = $rows1['AssignedRadiologist'];
	$PRIORITY = $rows1['Priority'];
    $STATUS = $rows1['Status'];
	$CANCELLED = $rows1['Cancelled'];
	$SESSIONID1 = $rows1['SESSIONID'];
	$MRN1 = $rows1['MRN'];
	$NAME = $rows1['Name'];
	$SURNAME = $rows1['Surname'];
	$IDNUMBER = $rows1['IdentityNumber'];

     echo '
     <tr>
        <td style="text-align: center;color:white;">'.$IDNUMBER.'</td>
        <td style="text-align: center;color:white;">'.$ACCESSION.'</td>
		<td style="text-align: center;color:white;">'.$MRN1.'</td>
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

	   }} elseif($SearchingResults1==false){
        echo "";
}
}
if (($NAMEFILTER =="")&&($SURNAMEFILTER =="")&&($STATUS !=="") ) {
	   $SearchingResults5=mysqli_query($con,$Searching5);
	   if($SearchingResults5==true){
  while ($rows1=mysqli_fetch_array($SearchingResults5) ) {
    $STUDYID = $rows1['StudyID'];
	$ACCESSION = $rows1['Accession'];
    $PATIENTSID = $rows1['PatientsID'];
    $PATIENTSPROCEDURE= $rows1['PatientsProcedure'];
    $DOCTOR = $rows1['AssignedRadiologist'];
	$PRIORITY = $rows1['Priority'];
    $STATUS = $rows1['Status'];
	$CANCELLED = $rows1['Cancelled'];
	$SESSIONID1 = $rows1['SESSIONID'];
	$MRN1 = $rows1['MRN'];
	$NAME = $rows1['Name'];
	$SURNAME = $rows1['Surname'];
	$IDNUMBER = $rows1['IdentityNumber'];

     echo '
     <tr>
        <td style="text-align: center;color:white;">'.$IDNUMBER.'</td>
        <td style="text-align: center;color:white;">'.$ACCESSION.'</td>
		<td style="text-align: center;color:white;">'.$MRN1.'</td>
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

	   }}elseif($SearchingResults5==false){
        echo "";
}
}
if (($NAMEFILTER =="")&&($SURNAMEFILTER !=="")&&($STATUS =="") ) {
	   $SearchingResults5=mysqli_query($con,$Searching5);
	   if($SearchingResults5==true){
  while ($rows1=mysqli_fetch_array($SearchingResults5) ) {
    $STUDYID = $rows1['StudyID'];
	$ACCESSION = $rows1['Accession'];
    $PATIENTSID = $rows1['PatientsID'];
    $PATIENTSPROCEDURE= $rows1['PatientsProcedure'];
    $DOCTOR = $rows1['AssignedRadiologist'];
	$PRIORITY = $rows['Priority'];
    $STATUS = $rows1['Status'];
	$CANCELLED = $rows1['Cancelled'];
	$SESSIONID1 = $rows1['SESSIONID'];
	$MRN1 = $rows1['MRN'];
	$NAME = $rows1['Name'];
	$SURNAME = $rows1['Surname'];
	$IDNUMBER = $rows1['IdentityNumber'];

     echo '
     <tr>
        <td style="text-align: center;color:white;">'.$IDNUMBER.'</td>
        <td style="text-align: center;color:white;">'.$ACCESSION.'</td>
		<td style="text-align: center;color:white;">'.$MRN1.'</td>
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

	   }}elseif($SearchingResults5==false){
        echo "";
}
}

if (($NAMEFILTER =="")&&($SURNAMEFILTER =="")&&($STATUS !=="") ) {
	    $SearchingResults2=mysqli_query($con,$Searching2);
	    if($SearchingResults2==true){
  while ($rows1=mysqli_fetch_array($SearchingResults2) ) {
    $STUDYID = $rows1['StudyID'];
	$ACCESSION = $rows1['Accession'];
    $PATIENTSID = $rows1['PatientsID'];
    $PATIENTSPROCEDURE= $rows1['PatientsProcedure'];
    $DOCTOR = $rows1['AssignedRadiologist'];
	$PRIORITY = $rows1['Priority'];
    $STATUS = $rows1['Status'];
	$CANCELLED = $rows1['Cancelled'];
	$SESSIONID1 = $rows1['SESSIONID'];
	$MRN1 = $rows1['MRN'];
	$NAME = $rows1['Name'];
	$SURNAME = $rows1['Surname'];
	$IDNUMBER = $rows1['IdentityNumber'];

     echo '
     <tr>
        <td style="text-align: center;color:white;">'.$IDNUMBER.'</td>
        <td style="text-align: center;color:white;">'.$ACCESSION.'</td>
		<td style="text-align: center;color:white;">'.$MRN1.'</td>
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

	   }} elseif($SearchingResults2==false){
        echo "";
}
	 }
	 if (($NAMEFILTER !=="")&&($SURNAMEFILTER !=="")&&($STATUS !=="") ) {
	   $SearchingResults6=mysqli_query($con,$Searching6);
	   if($SearchingResults6==true){
  while ($rows1=mysqli_fetch_array($SearchingResults6) ) {
    $STUDYID = $rows1['StudyID'];
	$ACCESSION = $rows1['Accession'];
    $PATIENTSID = $rows1['PatientsID'];
    $PATIENTSPROCEDURE= $rows1['PatientsProcedure'];
    $DOCTOR = $rows1['AssignedRadiologist'];
	$PRIORITY = $rows1['Priority'];
    $STATUS = $rows1['Status'];
	$CANCELLED = $rows1['Cancelled'];
	$SESSIONID1 = $rows1['SESSIONID'];
	$MRN1 = $rows1['MRN'];
	$NAME = $rows1['Name'];
	$SURNAME = $rows1['Surname'];
	$IDNUMBER = $rows1['IdentityNumber'];

     echo '
     <tr>
        <td style="text-align: center;color:white;">'.$IDNUMBER.'</td>
        <td style="text-align: center;color:white;">'.$ACCESSION.'</td>
		<td style="text-align: center;color:white;">'.$MRN1.'</td>
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

	   }}elseif($SearchingResults6==false){
        echo "";
}
}

	 }
  ?>
 
  </table>
  </section>
</form>
</div>

<div id="PRINT" class="tabcontent">
  
</div>

<div id="REPORTS" class="tabcontent">

</div>

<div id="HELP" class="tabcontent">

</div>

<div id="PACS" class="tabcontent">

</div>
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