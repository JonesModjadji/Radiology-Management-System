<?php 
include("Connection.php");
session_start();
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
				$STATUS3=$STATUS[13];
			}
			if(isset($STATUS[14])) {
				$STATUS4=$STATUS[14];
			}
			if(isset($STATUS[15])) {
				$STATUS5=$STATUS[15];
			}
			if(isset($STATUS[16])) {
				$STATUS6=$STATUS[16];
			}
			if(isset($STATUS[17])) {
				$STATUS7=$STATUS[17];
			}
			if(isset($STATUS[18])) {
				$STATUS8=$STATUS[18];
			}
			if(isset($STATUS[19])) {
				$STATUS9=$STATUS[19];
			}
			if(isset($STATUS[20])) {
				$STATUS10=$STATUS[20];
			}
			if(isset($STATUS[21])) {
				$STATUS11=$STATUS[21];
			}
			if(isset($STATUS[22])) {
				$STATUS12=$STATUS[22];
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
       $Searching1 = "SELECT * FROM patients ";
       $SearchingResults1=mysqli_query($con,$Searching1);
       if($SearchingResults1->num_rows > 0){
       header("location: SearchedFilterRef.php?MRN=$MRNFILTER&S=$SFILTER&NAME=$NAMEFILTER&SURNAME=$SURNAMEFILTER&PHYSICIAN=$PHYSICIAN&BRANCH=$BRANCH&FROM=$FROMFILTER&TO=$TOFILTER".http_build_query($STATUS));
	   }
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
<title>Searched</title>
<link href="Css/style.css" rel="stylesheet" type="text/css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<link rel="stylesheet" href="https://fonts.google.com/specimen/Montserrat"type='text/css'>
<link href='http://fonts.googleapis.com/css?family=Montserrat' rel='stylesheet' type='text/css'>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
</head> 
<body>
<div class="Content1">
<div class="tab" style="background: black;border: 2px solid black;border-bottom: 2px solid red;">
<button class="tablinks" onclick="window.open('Receptionist.php');" >RIS</button>
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
 <button class="input-group-text" onclick="window.open('Receptionist.php');" style="color: white;"><i class="fa fa-times"></i> CLEAR</button>
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
        <td style="text-align: center;color: red;">PROCEDURE</td>
        <td style="text-align: center;color: red;">STATUS</td>
      </tr>
        <?php
		 $Ref= $_SESSION['susername'];
        $Searching1 = "SELECT * FROM study,patients WHERE study.SESSIONID=$var.SESSIONID AND study.Status ='Waiting' AND study.RefDoctor ='$Ref'
		AND (study.Status ='$STATUS1s' OR study.Status ='$STATUS2' OR study.Status ='$STATUS3' OR study.Status ='$STATUS4' 
		OR study.Status ='$STATUS5' OR study.Status ='$STATUS6' OR study.Status ='$STATUS7' OR study.Status ='$STATUS8' 
		OR study.Status ='$STATUS9' OR study.Status ='$STATUS10' OR study.Status ='$STATUS11' OR study.Status ='$STATUS12')AND( 
		patients.Name='$NAMEFILTER' OR patients.Surname='$SURNAMEFILTER' OR study.AssignedRadiographer ='$PHYSICIAN' 
		OR study.AssignedRadiologist ='$PHYSICIAN' OR patients.Branch='$STATUS1s' OR patients.Branch='$STATUS2' OR patients.Branch='$STATUS3'
		 OR patients.Branch='$STATUS4' OR patients.Branch='$STATUS5' OR patients.Branch='$STATUS6' OR patients.Branch='$STATUS7'
		  OR patients.Branch='$STATUS8' OR patients.Branch='$STATUS9' OR patients.Branch='$STATUS10' OR patients.Branch='$STATUS11'
		  OR patients.Branch='$STATUS12' OR patients.Branch='$STATUS13'
		 OR patients.Branch='$STATUS14' OR patients.Branch='$STATUS15' OR patients.Branch='$STATUS16' OR patients.Branch='$STATUS17'
		  OR patients.Branch='$STATUS18' OR patients.Branch='$STATUS19' OR patients.Branch='$STATUS20' OR patients.Branch='$STATUS21'
		   OR patients.Branch='$STATUS22'  OR patients.MRN='$MRNFILTER' 
		OR study.Accession='$SFILTER' ) ";
		
       $Searching2 = "SELECT * FROM study,patients WHERE (study.SESSIONID=$var.SESSIONID AND study.Status ='Waiting' AND study.RefDoctor ='$Ref' 
		AND (study.Status ='$STATUS1s' OR study.Status ='$STATUS2' OR study.Status ='$STATUS3' OR study.Status ='$STATUS4' 
		OR study.Status ='$STATUS5' OR study.Status ='$STATUS6' OR study.Status ='$STATUS7' OR study.Status ='$STATUS8' 
		OR study.Status ='$STATUS9' OR study.Status ='$STATUS10' OR study.Status ='$STATUS11' OR study.Status ='$STATUS12'))";
		
		$Searching3 = "SELECT * FROM study,patients WHERE (study.SESSIONID=$var.SESSIONID AND study.Status ='Waiting'  AND study.RefDoctor ='$Ref'
		AND (patients.Name='$NAMEFILTER' OR patients.Surname='$SURNAMEFILTER' OR study.AssignedRadiographer ='$PHYSICIAN' 
		OR study.AssignedRadiologist ='$PHYSICIAN'  OR patients.MRN='$MRNFILTER' 
		OR study.Accession='$SFILTER' OR study.ExamDate BETWEEN '$FROMFILTER' AND '$TOFILTER' ))";
		
		$Searching4 = "SELECT * FROM study,patients WHERE (study.SESSIONID=$var.SESSIONID AND study.Status ='Waiting'  AND study.RefDoctor ='$Ref'
		AND (patients.Name='$NAMEFILTER' AND patients.Surname='$SURNAMEFILTER') AND '$STATUS1s'='' )";
		
		$Searching5 = "SELECT * FROM study,patients WHERE (study.SESSIONID=$var.SESSIONID AND study.Status ='Waiting'  AND study.RefDoctor ='$Ref'
		AND (patients.Branch='$STATUS1s' OR patients.Branch='$STATUS2' OR patients.Branch='$STATUS3'
		 OR patients.Branch='$STATUS4' OR patients.Branch='$STATUS5' OR patients.Branch='$STATUS6' OR patients.Branch='$STATUS7'
		  OR patients.Branch='$STATUS8' OR patients.Branch='$STATUS9' OR patients.Branch='$STATUS10' OR patients.Branch='$STATUS11'
		  OR patients.Branch='$STATUS12' OR patients.Branch='$STATUS13'
		 OR patients.Branch='$STATUS14' OR patients.Branch='$STATUS15' OR patients.Branch='$STATUS16' OR patients.Branch='$STATUS17'
		  OR patients.Branch='$STATUS18' OR patients.Branch='$STATUS19' OR patients.Branch='$STATUS20' OR patients.Branch='$STATUS21'
		   OR patients.Branch='$STATUS22'))";
		
if (($NAMEFILTER !=="")&&($SURNAMEFILTER =="")) {
	$SearchingResults3=mysqli_query($con,$Searching3);
	   if($SearchingResults3->num_rows > 0){
  while ($rows1=mysqli_fetch_array($SearchingResults3) ) {
    $STUDYID1 = $rows1['StudyID'];
	$IDNUMBER = $rows1['IdentityNumber'];
	$ACCESSION1= $rows1['Accession'];
    $PATIENTSID1 = $rows1['MRN'];
    $PATIENTSPROCEDURE1= $rows1['PatientsProcedure'];
    $DOCTOR1 = $rows1['AssignedRadiographer'];
    $STATUS1 = $rows1['Status'];
	$NAME1 = $rows1['Name'];
	$SURNAME1 = $rows1['Surname'];
	$MRN1 = $rows1['MRN'];
	$SESSIONID1 = $rows1['SESSIONID'];

     echo '
     <tr>
        <td style="text-align: center;color:white;">'.$IDNUMBER.'</td>
        <td style="text-align: center;color:white;">'.$ACCESSION1.'</td>
        <td style="text-align: center;color:white;">'.$PATIENTSID1.'</td>
        <td style="text-align: center;color:white;"><a href="Add5.php?SESSIONID='.$SESSIONID1.'&MRN='.$MRN1.'&PatientsID='.$PATIENTSID1.'&Accession='.$ACCESSION1.'" 
		style="text-decoration:none;color: red;">'.$NAME1.'</a></td>
		<td style="text-align: center;color:white;"><a href="Add5.php?SESSIONID='.$SESSIONID1.'&MRN='.$MRN1.'&PatientsID='.$PATIENTSID1.'&Accession='.$ACCESSION1.'" 
		style="text-decoration:none;color: red;">'.$SURNAME1.'</a></td>
        <td style="text-align: center;color:white;">'.$PATIENTSPROCEDURE1.'</td>
        <td style="text-align: center;color:white;"><a style="text-decoration:none;color:white;" href="Update1.php?ID='.$PATIENTSID1.'&ACC='.$ACCESSION1.'&NOTE=&SCHEDULE=&PRI=&RAD=">'.$STATUS1.'</a></td>
	 </tr>
    ';

	   }} 
}
if (($NAMEFILTER =="")&&($SURNAMEFILTER =="")&&($STATUS1s =="")) {
	$SearchingResults3=mysqli_query($con,$Searching3);
	   if($SearchingResults3->num_rows > 0){
  while ($rows1=mysqli_fetch_array($SearchingResults3) ) {
    $STUDYID1 = $rows1['StudyID'];
	$IDNUMBER = $rows1['IdentityNumber'];
	$ACCESSION1= $rows1['Accession'];
    $PATIENTSID1 = $rows1['MRN'];
    $PATIENTSPROCEDURE1= $rows1['PatientsProcedure'];
    $DOCTOR1 = $rows1['AssignedRadiographer'];
    $STATUS1 = $rows1['Status'];
	$NAME1 = $rows1['Name'];
	$SURNAME1 = $rows1['Surname'];
	$MRN1 = $rows1['MRN'];
	$SESSIONID1 = $rows1['SESSIONID'];

     echo '
     <tr>
        <td style="text-align: center;color:white;">'.$IDNUMBER.'</td>
        <td style="text-align: center;color:white;">'.$ACCESSION1.'</td>
        <td style="text-align: center;color:white;">'.$PATIENTSID1.'</td>
        <td style="text-align: center;color:white;"><a href="Add5.php?SESSIONID='.$SESSIONID1.'&MRN='.$MRN1.'&PatientsID='.$PATIENTSID1.'&Accession='.$ACCESSION1.'" 
		style="text-decoration:none;color: red;">'.$NAME1.'</a></td>
		<td style="text-align: center;color:white;"><a href="Add5.php?SESSIONID='.$SESSIONID1.'&MRN='.$MRN1.'&PatientsID='.$PATIENTSID1.'&Accession='.$ACCESSION1.'" 
		style="text-decoration:none;color: red;">'.$SURNAME1.'</a></td>
        <td style="text-align: center;color:white;">'.$PATIENTSPROCEDURE1.'</td>
        <td style="text-align: center;color:white;"><a style="text-decoration:none;color:white;" href="Update1.php?ID='.$PATIENTSID1.'&ACC='.$ACCESSION1.'&NOTE=&SCHEDULE=&PRI=&RAD=">'.$STATUS1.'</a></td>
	 </tr>
    ';

	   }} 
}
if (($NAMEFILTER =="")&&($SURNAMEFILTER !=="")) {
	$SearchingResults3=mysqli_query($con,$Searching3);
	   if($SearchingResults3->num_rows > 0){
  while ($rows1=mysqli_fetch_array($SearchingResults3) ) {
    $STUDYID1 = $rows1['StudyID'];
	$IDNUMBER = $rows1['IdentityNumber'];
	$ACCESSION1= $rows1['Accession'];
    $PATIENTSID1 = $rows1['MRN'];
    $PATIENTSPROCEDURE1= $rows1['PatientsProcedure'];
    $DOCTOR1 = $rows1['AssignedRadiographer'];
    $STATUS1 = $rows1['Status'];
	$NAME1 = $rows1['Name'];
	$SURNAME1 = $rows1['Surname'];
	$MRN1 = $rows1['MRN'];
	$SESSIONID1 = $rows1['SESSIONID'];

     echo '
     <tr>
        <td style="text-align: center;color:white;">'.$IDNUMBER.'</td>
        <td style="text-align: center;color:white;">'.$ACCESSION1.'</td>
        <td style="text-align: center;color:white;">'.$PATIENTSID1.'</td>
        <td style="text-align: center;color:white;"><a href="Add5.php?SESSIONID='.$SESSIONID1.'&MRN='.$MRN1.'&PatientsID='.$PATIENTSID1.'&Accession='.$ACCESSION1.'" 
		style="text-decoration:none;color: red;">'.$NAME1.'</a></td>
		<td style="text-align: center;color:white;"><a href="Add5.php?SESSIONID='.$SESSIONID1.'&MRN='.$MRN1.'&PatientsID='.$PATIENTSID1.'&Accession='.$ACCESSION1.'" 
		style="text-decoration:none;color: red;">'.$SURNAME1.'</a></td>
        <td style="text-align: center;color:white;">'.$PATIENTSPROCEDURE1.'</td>
        <td style="text-align: center;color:white;"><a style="text-decoration:none;color:white;" href="Update1.php?ID='.$PATIENTSID1.'&ACC='.$ACCESSION1.'&NOTE=&SCHEDULE=&PRI=&RAD=">'.$STATUS1.'</a></td>
	 </tr>
    ';

	   }} 
}
 if (($NAMEFILTER !=="")&&($SURNAMEFILTER !=="") ) {
		$SearchingResults4=mysqli_query($con,$Searching4);
		if($SearchingResults4->num_rows > 0){
  while ($rows1=mysqli_fetch_array($SearchingResults4) ) {
    $STUDYID1 = $rows1['StudyID'];
	$IDNUMBER = $rows1['IdentityNumber'];
	$ACCESSION1= $rows1['Accession'];
    $PATIENTSID1 = $rows1['MRN'];
    $PATIENTSPROCEDURE1= $rows1['PatientsProcedure'];
    $DOCTOR1 = $rows1['AssignedRadiographer'];
    $STATUS1 = $rows1['Status'];
	$NAME1 = $rows1['Name'];
	$SURNAME1 = $rows1['Surname'];
	$MRN1 = $rows1['MRN'];
	$SESSIONID1 = $rows1['SESSIONID'];

     echo '
     <tr>
        <td style="text-align: center;color:white;">'.$IDNUMBER.'</td>
        <td style="text-align: center;color:white;">'.$ACCESSION1.'</td>
        <td style="text-align: center;color:white;">'.$PATIENTSID1.'</td>
        <td style="text-align: center;color:white;"><a href="Add5.php?SESSIONID='.$SESSIONID1.'&MRN='.$MRN1.'&PatientsID='.$PATIENTSID1.'&Accession='.$ACCESSION1.'" 
		style="text-decoration:none;color: red;">'.$NAME1.'</a></td>
		<td style="text-align: center;color:white;"><a href="Add5.php?SESSIONID='.$SESSIONID1.'&MRN='.$MRN1.'&PatientsID='.$PATIENTSID1.'&Accession='.$ACCESSION1.'" 
		style="text-decoration:none;color: red;">'.$SURNAME1.'</a></td>
        <td style="text-align: center;color:white;">'.$PATIENTSPROCEDURE1.'</td>
        <td style="text-align: center;color:white;"><a style="text-decoration:none;color:white;" href="Update1.php?ID='.$PATIENTSID1.'&ACC='.$ACCESSION1.'&NOTE=&SCHEDULE=&PRI=&RAD=">'.$STATUS1.'</a></td>
	  </tr>
    ';

	   }} 
}
if (($NAMEFILTER =="")&&($SURNAMEFILTER =="")&&($STATUS !=="") ) {
	$SearchingResults1=mysqli_query($con,$Searching1);
	   $SearchingResults2=mysqli_query($con,$Searching2);
	   $SearchingResults5=mysqli_query($con,$Searching5);
		if($SearchingResults1->num_rows > 0){
  while ($rows1=mysqli_fetch_array($SearchingResults1) ) {
    $STUDYID1 = $rows1['StudyID'];
	$IDNUMBER = $rows1['IdentityNumber'];
	$ACCESSION1= $rows1['Accession'];
    $PATIENTSID1 = $rows1['MRN'];
    $PATIENTSPROCEDURE1= $rows1['PatientsProcedure'];
    $DOCTOR1 = $rows1['AssignedRadiographer'];
    $STATUS1 = $rows1['Status'];
	$NAME1 = $rows1['Name'];
	$SURNAME1 = $rows1['Surname'];
	$MRN1 = $rows1['MRN'];
	$SESSIONID1 = $rows1['SESSIONID'];

     echo '
     <tr>
        <td style="text-align: center;color:white;">'.$IDNUMBER.'</td>
        <td style="text-align: center;color:white;">'.$ACCESSION1.'</td>
        <td style="text-align: center;color:white;">'.$PATIENTSID1.'</td>
        <td style="text-align: center;color:white;"><a href="Add5.php?SESSIONID='.$SESSIONID1.'&MRN='.$MRN1.'&PatientsID='.$PATIENTSID1.'&Accession='.$ACCESSION1.'" 
		style="text-decoration:none;color: red;">'.$NAME1.'</a></td>
		<td style="text-align: center;color:white;"><a href="Add5.php?SESSIONID='.$SESSIONID1.'&MRN='.$MRN1.'&PatientsID='.$PATIENTSID1.'&Accession='.$ACCESSION1.'" 
		style="text-decoration:none;color: red;">'.$SURNAME1.'</a></td>
        <td style="text-align: center;color:white;">'.$PATIENTSPROCEDURE1.'</td>
        <td style="text-align: center;color:white;"><a style="text-decoration:none;color:white;" href="Update1.php?ID='.$PATIENTSID1.'&ACC='.$ACCESSION1.'&NOTE=&SCHEDULE=&PRI=&RAD=">'.$STATUS1.'</a></td>
	 </tr>
    ';

	   }} 
	   else if($SearchingResults5->num_rows > 0){
  while ($rows1=mysqli_fetch_array($SearchingResults5) ) {
    $STUDYID1 = $rows1['StudyID'];
	$IDNUMBER = $rows1['IdentityNumber'];
	$ACCESSION1= $rows1['Accession'];
    $PATIENTSID1 = $rows1['MRN'];
    $PATIENTSPROCEDURE1= $rows1['PatientsProcedure'];
    $DOCTOR1 = $rows1['AssignedRadiographer'];
    $STATUS1 = $rows1['Status'];
	$NAME1 = $rows1['Name'];
	$SURNAME1 = $rows1['Surname'];
	$MRN1 = $rows1['MRN'];
	$SESSIONID1 = $rows1['SESSIONID'];

     echo '
     <tr>
        <td style="text-align: center;color:white;">'.$IDNUMBER.'</td>
        <td style="text-align: center;color:white;">'.$ACCESSION1.'</td>
        <td style="text-align: center;color:white;">'.$PATIENTSID1.'</td>
        <td style="text-align: center;color:white;"><a href="Add5.php?SESSIONID='.$SESSIONID1.'&MRN='.$MRN1.'&PatientsID='.$PATIENTSID1.'&Accession='.$ACCESSION1.'" 
		style="text-decoration:none;color: red;">'.$NAME1.'</a></td>
		<td style="text-align: center;color:white;"><a href="Add5.php?SESSIONID='.$SESSIONID1.'&MRN='.$MRN1.'&PatientsID='.$PATIENTSID1.'&Accession='.$ACCESSION1.'" 
		style="text-decoration:none;color: red;">'.$SURNAME1.'</a></td>
        <td style="text-align: center;color:white;">'.$PATIENTSPROCEDURE1.'</td>
        <td style="text-align: center;color:white;"><a style="text-decoration:none;color:white;" href="Update1.php?ID='.$PATIENTSID1.'&ACC='.$ACCESSION1.'&NOTE=&SCHEDULE=&PRI=&RAD=">'.$STATUS1.'</a></td>
	 </tr>
    ';

	   }}
	   else if($SearchingResults2->num_rows > 0){
  while ($rows1=mysqli_fetch_array($SearchingResults2) ) {
    $STUDYID1 = $rows1['StudyID'];
	$IDNUMBER = $rows1['IdentityNumber'];
	$ACCESSION1= $rows1['Accession'];
    $PATIENTSID1 = $rows1['MRN'];
    $PATIENTSPROCEDURE1= $rows1['PatientsProcedure'];
    $DOCTOR1 = $rows1['AssignedRadiographer'];
    $STATUS1 = $rows1['Status'];
	$NAME1 = $rows1['Name'];
	$SURNAME1 = $rows1['Surname'];
	$MRN1 = $rows1['MRN'];
	$SESSIONID1 = $rows1['SESSIONID'];

     echo '
     <tr>
        <td style="text-align: center;color:white;">'.$IDNUMBER.'</td>
        <td style="text-align: center;color:white;">'.$ACCESSION1.'</td>
        <td style="text-align: center;color:white;">'.$PATIENTSID1.'</td>
        <td style="text-align: center;color:white;"><a href="Add5.php?SESSIONID='.$SESSIONID1.'&MRN='.$MRN1.'&PatientsID='.$PATIENTSID1.'&Accession='.$ACCESSION1.'" 
		style="text-decoration:none;color: red;">'.$NAME1.'</a></td>
		<td style="text-align: center;color:white;"><a href="Add5.php?SESSIONID='.$SESSIONID1.'&MRN='.$MRN1.'&PatientsID='.$PATIENTSID1.'&Accession='.$ACCESSION1.'" 
		style="text-decoration:none;color: red;">'.$SURNAME1.'</a></td>
        <td style="text-align: center;color:white;">'.$PATIENTSPROCEDURE1.'</td>
        <td style="text-align: center;color:white;"><a style="text-decoration:none;color:white;" href="Update1.php?ID='.$PATIENTSID1.'&ACC='.$ACCESSION1.'&NOTE=&SCHEDULE=&PRI=&RAD=">'.$STATUS1.'</a></td>
	  </tr>
    ';

	   }} 
}
 
  ?>

  <?php
        $Searching1 = "SELECT * FROM study,patients WHERE (study.PatientsID=patients.MRN AND study.Status !='Waiting' AND study.RefDoctor ='$Ref'
		AND (study.Status ='$STATUS1s' OR study.Status ='$STATUS2' OR study.Status ='$STATUS3' OR study.Status ='$STATUS4' 
		OR study.Status ='$STATUS5' OR study.Status ='$STATUS6' OR study.Status ='$STATUS7' OR study.Status ='$STATUS8' 
		OR study.Status ='$STATUS9' OR study.Status ='$STATUS10' OR study.Status ='$STATUS11' OR study.Status ='$STATUS12')AND( 
		patients.Name='$NAMEFILTER' OR patients.Surname='$SURNAMEFILTER' OR study.AssignedRadiographer ='$PHYSICIAN' 
		OR study.AssignedRadiologist ='$PHYSICIAN' OR patients.Branch='$STATUS1s' OR patients.Branch='$STATUS2' OR patients.Branch='$STATUS3'
		 OR patients.Branch='$STATUS4' OR patients.Branch='$STATUS5' OR patients.Branch='$STATUS6' OR patients.Branch='$STATUS7'
		  OR patients.Branch='$STATUS8' OR patients.Branch='$STATUS9' OR patients.Branch='$STATUS10' OR patients.Branch='$STATUS11'
		  OR patients.Branch='$STATUS12' OR patients.Branch='$STATUS13'
		 OR patients.Branch='$STATUS14' OR patients.Branch='$STATUS15' OR patients.Branch='$STATUS16' OR patients.Branch='$STATUS17'
		  OR patients.Branch='$STATUS18' OR patients.Branch='$STATUS19' OR patients.Branch='$STATUS20' OR patients.Branch='$STATUS21'
		   OR patients.Branch='$STATUS22'  OR patients.MRN='$MRNFILTER' 
		OR study.Accession='$SFILTER'))";
		
		$Searching2 = "SELECT * FROM study,patients WHERE (study.PatientsID=patients.MRN AND study.Status !='Waiting' AND study.RefDoctor ='$Ref'
		AND (study.Status ='$STATUS1s' OR study.Status ='$STATUS2' OR study.Status ='$STATUS3' OR study.Status ='$STATUS4' 
		OR study.Status ='$STATUS5' OR study.Status ='$STATUS6' OR study.Status ='$STATUS7' OR study.Status ='$STATUS8' 
		OR study.Status ='$STATUS9' OR study.Status ='$STATUS10' OR study.Status ='$STATUS11' OR study.Status ='$STATUS12'))";
		
		$Searching3 = "SELECT * FROM study,patients WHERE (study.PatientsID=patients.MRN AND study.Status !='Waiting' AND study.RefDoctor ='$Ref'
		AND (patients.Name='$NAMEFILTER' OR patients.Surname='$SURNAMEFILTER' OR study.AssignedRadiographer ='$PHYSICIAN' 
		OR study.AssignedRadiologist ='$PHYSICIAN' OR patients.MRN='$MRNFILTER' 
		OR study.Accession='$SFILTER' OR study.ExamDate BETWEEN '$FROMFILTER' AND '$TOFILTER' ))";
		
		$Searching4 = "SELECT * FROM study,patients WHERE (study.PatientsID=patients.MRN AND study.Status !='Waiting' AND study.RefDoctor ='$Ref'
		AND (patients.Name='$NAMEFILTER' AND patients.Surname='$SURNAMEFILTER') AND '$STATUS1s'='' )";
		
		$Searching5 = "SELECT * FROM study,patients WHERE (study.PatientsID=patients.MRN AND study.Status !='Waiting' AND study.RefDoctor ='$Ref'
		AND (patients.Branch='$STATUS1s' OR patients.Branch='$STATUS2' OR patients.Branch='$STATUS3'
		 OR patients.Branch='$STATUS4' OR patients.Branch='$STATUS5' OR patients.Branch='$STATUS6' OR patients.Branch='$STATUS7'
		  OR patients.Branch='$STATUS8' OR patients.Branch='$STATUS9' OR patients.Branch='$STATUS10' OR patients.Branch='$STATUS11'
		  OR patients.Branch='$STATUS12' OR patients.Branch='$STATUS13'
		 OR patients.Branch='$STATUS14' OR patients.Branch='$STATUS15' OR patients.Branch='$STATUS16' OR patients.Branch='$STATUS17'
		  OR patients.Branch='$STATUS18' OR patients.Branch='$STATUS19' OR patients.Branch='$STATUS20' OR patients.Branch='$STATUS21'
		   OR patients.Branch='$STATUS22'))";
		
		if (($NAMEFILTER !=="")&&($SURNAMEFILTER =="")) {
	$SearchingResults3=mysqli_query($con,$Searching3);
	   if($SearchingResults3->num_rows > 0){
  while ($rows1=mysqli_fetch_array($SearchingResults3) ) {
    $STUDYID1 = $rows1['StudyID'];
	$IDNUMBER = $rows1['IdentityNumber'];
	$ACCESSION1= $rows1['Accession'];
    $PATIENTSID1 = $rows1['MRN'];
    $PATIENTSPROCEDURE1= $rows1['PatientsProcedure'];
    $DOCTOR1 = $rows1['AssignedRadiographer'];
    $STATUS1 = $rows1['Status'];
	$NAME1 = $rows1['Name'];
	$SURNAME1 = $rows1['Surname'];
	$MRN1 = $rows1['MRN'];
	$SESSIONID1 = $rows1['SESSIONID'];

     echo '
     <tr>
        <td style="text-align: center;color:white;">'.$IDNUMBER.'</td>
        <td style="text-align: center;color:white;">'.$ACCESSION1.'</td>
        <td style="text-align: center;color:white;">'.$PATIENTSID1.'</td>
        <td style="text-align: center;color:white;"><a href="Add5.php?SESSIONID='.$SESSIONID1.'&MRN='.$MRN1.'&PatientsID='.$PATIENTSID1.'&Accession='.$ACCESSION1.'" 
		style="text-decoration:none;color: red;">'.$NAME1.'</a></td>
		<td style="text-align: center;color:white;"><a href="Add5.php?SESSIONID='.$SESSIONID1.'&MRN='.$MRN1.'&PatientsID='.$PATIENTSID1.'&Accession='.$ACCESSION1.'" 
		style="text-decoration:none;color: red;">'.$SURNAME1.'</a></td>
        <td style="text-align: center;color:white;">'.$PATIENTSPROCEDURE1.'</td>
        <td style="text-align: center;color:white;">'.$STATUS1.'</td>
	  </tr>
    ';

	   }} 
}
if (($NAMEFILTER =="")&&($SURNAMEFILTER =="")&&($STATUS1s =="")) {
	$SearchingResults3=mysqli_query($con,$Searching3);
	   if($SearchingResults3->num_rows > 0){
  while ($rows1=mysqli_fetch_array($SearchingResults3) ) {
    $STUDYID1 = $rows1['StudyID'];
	$IDNUMBER = $rows1['IdentityNumber'];
	$ACCESSION1= $rows1['Accession'];
    $PATIENTSID1 = $rows1['MRN'];
    $PATIENTSPROCEDURE1= $rows1['PatientsProcedure'];
    $DOCTOR1 = $rows1['AssignedRadiographer'];
    $STATUS1 = $rows1['Status'];
	$NAME1 = $rows1['Name'];
	$SURNAME1 = $rows1['Surname'];
	$MRN1 = $rows1['MRN'];
	$SESSIONID1 = $rows1['SESSIONID'];

     echo '
     <tr>
        <td style="text-align: center;color:white;">'.$IDNUMBER.'</td>
        <td style="text-align: center;color:white;">'.$ACCESSION1.'</td>
        <td style="text-align: center;color:white;">'.$PATIENTSID1.'</td>
        <td style="text-align: center;color:white;"><a href="Add5.php?SESSIONID='.$SESSIONID1.'&MRN='.$MRN1.'&PatientsID='.$PATIENTSID1.'&Accession='.$ACCESSION1.'" 
		style="text-decoration:none;color: red;">'.$NAME1.'</a></td>
		<td style="text-align: center;color:white;"><a href="Add5.php?SESSIONID='.$SESSIONID1.'&MRN='.$MRN1.'&PatientsID='.$PATIENTSID1.'&Accession='.$ACCESSION1.'" 
		style="text-decoration:none;color: red;">'.$SURNAME1.'</a></td>
        <td style="text-align: center;color:white;">'.$PATIENTSPROCEDURE1.'</td>
        <td style="text-align: center;color:white;">'.$STATUS1.'</td>
	  </tr>
    ';

	   }} 
}
if (($NAMEFILTER =="")&&($SURNAMEFILTER !=="")) {
	$SearchingResults3=mysqli_query($con,$Searching3);
	   if($SearchingResults3->num_rows > 0){
  while ($rows1=mysqli_fetch_array($SearchingResults3) ) {
    $STUDYID1 = $rows1['StudyID'];
	$IDNUMBER = $rows1['IdentityNumber'];
	$ACCESSION1= $rows1['Accession'];
    $PATIENTSID1 = $rows1['MRN'];
    $PATIENTSPROCEDURE1= $rows1['PatientsProcedure'];
    $DOCTOR1 = $rows1['AssignedRadiographer'];
    $STATUS1 = $rows1['Status'];
	$NAME1 = $rows1['Name'];
	$SURNAME1 = $rows1['Surname'];
	$MRN1 = $rows1['MRN'];
	$SESSIONID1 = $rows1['SESSIONID'];

     echo '
     <tr>
        <td style="text-align: center;color:white;">'.$IDNUMBER.'</td>
        <td style="text-align: center;color:white;">'.$ACCESSION1.'</td>
        <td style="text-align: center;color:white;">'.$PATIENTSID1.'</td>
        <td style="text-align: center;color:white;"><a href="Add5.php?SESSIONID='.$SESSIONID1.'&MRN='.$MRN1.'&PatientsID='.$PATIENTSID1.'&Accession='.$ACCESSION1.'" 
		style="text-decoration:none;color: red;">'.$NAME1.'</a></td>
		<td style="text-align: center;color:white;"><a href="Add5.php?SESSIONID='.$SESSIONID1.'&MRN='.$MRN1.'&PatientsID='.$PATIENTSID1.'&Accession='.$ACCESSION1.'" 
		style="text-decoration:none;color: red;">'.$SURNAME1.'</a></td>
        <td style="text-align: center;color:white;">'.$PATIENTSPROCEDURE1.'</td>
        <td style="text-align: center;color:white;">'.$STATUS1.'</td>
	  </tr>
    ';

	   }} 
}
 if (($NAMEFILTER !=="")&&($SURNAMEFILTER !=="") ) {
		$SearchingResults4=mysqli_query($con,$Searching4);
		if($SearchingResults4->num_rows > 0){
  while ($rows1=mysqli_fetch_array($SearchingResults4) ) {
    $STUDYID1 = $rows1['StudyID'];
	$IDNUMBER = $rows1['IdentityNumber'];
	$ACCESSION1= $rows1['Accession'];
    $PATIENTSID1 = $rows1['MRN'];
    $PATIENTSPROCEDURE1= $rows1['PatientsProcedure'];
    $DOCTOR1 = $rows1['AssignedRadiographer'];
    $STATUS1 = $rows1['Status'];
	$NAME1 = $rows1['Name'];
	$SURNAME1 = $rows1['Surname'];
	$MRN1 = $rows1['MRN'];
	$SESSIONID1 = $rows1['SESSIONID'];

     echo '
     <tr>
        <td style="text-align: center;color:white;">'.$IDNUMBER.'</td>
        <td style="text-align: center;color:white;">'.$ACCESSION1.'</td>
        <td style="text-align: center;color:white;">'.$PATIENTSID1.'</td>
        <td style="text-align: center;color:white;"><a href="Add5.php?SESSIONID='.$SESSIONID1.'&MRN='.$MRN1.'&PatientsID='.$PATIENTSID1.'&Accession='.$ACCESSION1.'" 
		style="text-decoration:none;color: red;">'.$NAME1.'</a></td>
		<td style="text-align: center;color:white;"><a href="Add5.php?SESSIONID='.$SESSIONID1.'&MRN='.$MRN1.'&PatientsID='.$PATIENTSID1.'&Accession='.$ACCESSION1.'" 
		style="text-decoration:none;color: red;">'.$SURNAME1.'</a></td>
        <td style="text-align: center;color:white;">'.$PATIENTSPROCEDURE1.'</td>
        <td style="text-align: center;color:white;">'.$STATUS1.'</td>
	  </tr>
    ';

	   }} 
}
if (($NAMEFILTER =="")&&($SURNAMEFILTER =="")&&($STATUS !=="") ) {
	   $SearchingResults2=mysqli_query($con,$Searching2);
	   $SearchingResults5=mysqli_query($con,$Searching5);
		$SearchingResults1=mysqli_query($con,$Searching1);
		if($SearchingResults1->num_rows > 0){
  while ($rows1=mysqli_fetch_array($SearchingResults1) ) {
    $STUDYID1 = $rows1['StudyID'];
	$IDNUMBER = $rows1['IdentityNumber'];
	$ACCESSION1= $rows1['Accession'];
    $PATIENTSID1 = $rows1['MRN'];
    $PATIENTSPROCEDURE1= $rows1['PatientsProcedure'];
    $DOCTOR1 = $rows1['AssignedRadiographer'];
    $STATUS1 = $rows1['Status'];
	$NAME1 = $rows1['Name'];
	$SURNAME1 = $rows1['Surname'];
	$MRN1 = $rows1['MRN'];
	$SESSIONID1 = $rows1['SESSIONID'];

     echo '
     <tr>
        <td style="text-align: center;color:white;">'.$IDNUMBER.'</td>
        <td style="text-align: center;color:white;">'.$ACCESSION1.'</td>
        <td style="text-align: center;color:white;">'.$PATIENTSID1.'</td>
        <td style="text-align: center;color:white;"><a href="Add5.php?SESSIONID='.$SESSIONID1.'&MRN='.$MRN1.'&PatientsID='.$PATIENTSID1.'&Accession='.$ACCESSION1.'" 
		style="text-decoration:none;color: red;">'.$NAME1.'</a></td>
		<td style="text-align: center;color:white;"><a href="Add5.php?SESSIONID='.$SESSIONID1.'&MRN='.$MRN1.'&PatientsID='.$PATIENTSID1.'&Accession='.$ACCESSION1.'" 
		style="text-decoration:none;color: red;">'.$SURNAME1.'</a></td>
        <td style="text-align: center;color:white;">'.$PATIENTSPROCEDURE1.'</td>
        <td style="text-align: center;color:white;">'.$STATUS1.'</td>
	  </tr>
    ';

	   }} 
	   else if($SearchingResults5->num_rows > 0){
  while ($rows1=mysqli_fetch_array($SearchingResults5) ) {
    $STUDYID1 = $rows1['StudyID'];
	$IDNUMBER = $rows1['IdentityNumber'];
	$ACCESSION1= $rows1['Accession'];
    $PATIENTSID1 = $rows1['MRN'];
    $PATIENTSPROCEDURE1= $rows1['PatientsProcedure'];
    $DOCTOR1 = $rows1['AssignedRadiographer'];
    $STATUS1 = $rows1['Status'];
	$NAME1 = $rows1['Name'];
	$SURNAME1 = $rows1['Surname'];
	$MRN1 = $rows1['MRN'];
	$SESSIONID1 = $rows1['SESSIONID'];

     echo '
     <tr>
        <td style="text-align: center;color:white;">'.$IDNUMBER.'</td>
        <td style="text-align: center;color:white;">'.$ACCESSION1.'</td>
        <td style="text-align: center;color:white;">'.$PATIENTSID1.'</td>
        <td style="text-align: center;color:white;"><a href="Add5.php?SESSIONID='.$SESSIONID1.'&MRN='.$MRN1.'&PatientsID='.$PATIENTSID1.'&Accession='.$ACCESSION1.'" 
		style="text-decoration:none;color: red;">'.$NAME1.'</a></td>
		<td style="text-align: center;color:white;"><a href="Add5.php?SESSIONID='.$SESSIONID1.'&MRN='.$MRN1.'&PatientsID='.$PATIENTSID1.'&Accession='.$ACCESSION1.'" 
		style="text-decoration:none;color: red;">'.$SURNAME1.'</a></td>
        <td style="text-align: center;color:white;">'.$PATIENTSPROCEDURE1.'</td>
        <td style="text-align: center;color:white;">'.$STATUS1.'</td>
	  </tr>
    ';

	   }}
	   else if($SearchingResults2->num_rows > 0){
  while ($rows1=mysqli_fetch_array($SearchingResults2) ) {
    $STUDYID1 = $rows1['StudyID'];
	$IDNUMBER = $rows1['IdentityNumber'];
	$ACCESSION1= $rows1['Accession'];
    $PATIENTSID1 = $rows1['MRN'];
    $PATIENTSPROCEDURE1= $rows1['PatientsProcedure'];
    $DOCTOR1 = $rows1['AssignedRadiographer'];
    $STATUS1 = $rows1['Status'];
	$NAME1 = $rows1['Name'];
	$SURNAME1 = $rows1['Surname'];
	$MRN1 = $rows1['MRN'];
	$SESSIONID1 = $rows1['SESSIONID'];

     echo '
     <tr>
        <td style="text-align: center;color:white;">'.$IDNUMBER.'</td>
        <td style="text-align: center;color:white;">'.$ACCESSION1.'</td>
        <td style="text-align: center;color:white;">'.$PATIENTSID1.'</td>
        <td style="text-align: center;color:white;"><a href="Add5.php?SESSIONID='.$SESSIONID1.'&MRN='.$MRN1.'&PatientsID='.$PATIENTSID1.'&Accession='.$ACCESSION1.'" 
		style="text-decoration:none;color: red;">'.$NAME1.'</a></td>
		<td style="text-align: center;color:white;"><a href="Add5.php?SESSIONID='.$SESSIONID1.'&MRN='.$MRN1.'&PatientsID='.$PATIENTSID1.'&Accession='.$ACCESSION1.'" 
		style="text-decoration:none;color: red;">'.$SURNAME1.'</a></td>
        <td style="text-align: center;color:white;">'.$PATIENTSPROCEDURE1.'</td>
        <td style="text-align: center;color:white;">'.$STATUS1.'</td>
	  </tr>
    ';

	   }} 
}
  ?>
 
  </table>
  </section>
</form>
</div>

<div id="PRINT" class="tabcontent" style="border: 1px solid black;">
  
</div>

<div id="REPORTS" class="tabcontent" style="border: 1px solid black;">

</div>

<div id="HELP" class="tabcontent" style="border: 1px solid black;">

</div>

<div id="PACS" class="tabcontent" style="border: 1px solid black;">

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