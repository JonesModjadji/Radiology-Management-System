<?php
date_default_timezone_set('Africa/Johannesburg');
include("Connection.php");
			$SESSIONID=$_GET['SESSIONID'];
			$MRN=$_GET['MRN'];
			$PATIENTSID=$_GET['PatientsID'];
			$ACCESSION1=$_GET['Accession'];
			$PHYSICIAN="";
			$RECEPTIONIST="";
			$EXAMDATE="";
			$DATE=date("Y/m/d");
			$DATE2 = date('Y-m-d\TH:i'); 
			$RECEPTIONIST ="";
			$REFDOCTOR ="";
			
			$dbname = 'ris';
	   $sql = "SHOW TABLES FROM $dbname";
	   $result = mysqli_query($con,$sql);
	 while ($row = mysqli_fetch_row($result)) {
		 ob_start();
echo "{$row[0]}";
$var = ob_get_clean();
            $Searching1 = "SELECT * FROM study,$var WHERE $var.SESSIONID = '$SESSIONID' AND $var.MRN = '$MRN' AND study.Accession = '$ACCESSION1'";
       $SearchingResults1=mysqli_query($con,$Searching1);
       if($SearchingResults1==true){
  while ($rows=mysqli_fetch_array($SearchingResults1)) {
	$SESSIONID = $rows['SESSIONID'];
    $PATIENTSID = $rows['PatientsID'];
	$ACCINDEX = $rows['AccIndex'];
	$NAME = $rows['Name'];
	$SURNAME1 = $rows['Surname'];
	$BRANCH = $rows['Branch'];
	$IDNUMBER = $rows['IdentityNumber'];
	$EMAIL= $rows['EmailAddress1'];
	$CITY = $rows['City'];
	$TOWN = $rows['TownSuburb'];
	$POSTALCODE = $rows['PostalCode'];
	$ALLERGY =$rows['Allergies'];
	$SEX = $rows['Sex'];
	$CITY2 = $rows['City2'];
	$TOWN2 = $rows['TownSuburb2'];
	$POSTALCODE2 = $rows['PostalCode2'];
	$PHONENUMBER1 = $rows['PhoneNumber1'];
	$PHONENUMBER2 = $rows['PhoneNumber2'];
	$VATNUMBER = $rows['VatNumber'];
	$RELATIONTOMEMBER= $rows['RelationToMember'];
	$DEPENDANTS = $rows['NumberOfDependants'];
	$MEDICALAID=$rows['MedicalAid'];
	$MEDICALAIDNUMBER=$rows['MedicalAidNumber'];
	$NAME2 = $rows['Name2'];
	$SURNAME2 = $rows['Surname2'];
	$IDNUMBER2 = $rows['IdentityNumber2'];
	$OCCUPATION = $rows['Occupation'];
	$COMPANY = $rows['CompanyName'];
	$COMPANYNUMBER = $rows['CompanyNumber'];
	$OCCUPATIONADDRESS= $rows['OCCUPATIONADDRESS'];
			$EMPLOYMENTNUMBER= $rows['EMPLOYMENTNUMBER'];
			$ADDRESS1= $rows['Address1'];
			$ADDRESS2= $rows['Address2'];
			$ADDRESS3= $rows['Address3'];
			$ADDRESS4= $rows['Address4'];

}
	 }
	 elseif($SearchingResults1==false){
        echo "";
	 }}
$ACCINDEX++;
$ACCINDEXLetter = chr(64 + $ACCINDEX);

$ACCESSION = str_pad($PATIENTSID,10,'0',STR_PAD_LEFT)."$ACCINDEXLetter";

if (isset($_POST['Save'])) {
            $ACCESSION = $_POST['ACCESSION'];
			$SESSIONID=$_GET['SESSIONID'];
			$MRN=$_GET['MRN'];
			$PROCEDURE=$_POST['PROCEDURE'];
			$PHYSICIAN=$_POST['PHYSICIAN'];
			$PHYSICIAN2=$_POST['PHYSICIAN2'];
			$RECEPTIONIST=$_POST['RECEPTIONIST'];
			$EXAMDATE=$_POST['EXAMDATE'];

$sql ="INSERT INTO `study`(Accession,AssignedRadiographer,AssignedRadiologist
,AssignedTypist,Note,Status,Priority,Recording1,Recording2,Recording3,Recording4,
Recording5,Recording6,Recording7,Recording8,Recording9,Recording10,PatientsID,SESSIONID,PatientsProcedure,RefDoctor,RefDoctor2,Receptionist,ExamDate,Cancelled)
					  VALUES ('$ACCESSION','','',''
 ,'','Waiting','','','',''
 ,'','','','','','','','$MRN','$SESSIONID','$PROCEDURE','$PHYSICIAN','$PHYSICIAN2','$RECEPTIONIST','$EXAMDATE','white')";

 $sql1 = "UPDATE $BRANCH SET AccIndex ='$ACCINDEX'  WHERE PatientsID = '$PATIENTSID'";

 $results1 = mysqli_query($con,$sql,);
 $results2 = mysqli_query($con,$sql1,);

 if ($results1) {
	 header("Refresh:0");
exit;
 }
 else
 {
   echo "<script>alert('Nowhere')</script>";
}
 if ($results2) {
	header("Refresh:0");
exit;
 }
 else
 {
   echo "<script>alert('Nowhere')</script>";

}
}
elseif (isset($_POST['SaveJobcard'])) {

header("location: Jobcard.php?SESSIONID=$SESSIONID&MRN=$MRN&PatientsID=$PATIENTSID&ACC=$BRANCH$ACCESSION");
}
elseif (isset($_POST['Label'])) {

header("location: Label.php?SESSIONID=$SESSIONID&MRN=$MRN&PatientsID=$PATIENTSID&Accession=$ACCESSION1");
}
elseif (isset($_POST['Report'])) {

header("location: Report1.php?SESSIONID=$SESSIONID&MRN=$MRN&PatientsID=$PATIENTSID&Accession=$ACCESSION1");
}

elseif (isset($_POST['Home'])) {
header("location: Receptionist.php");
}
elseif (isset($_POST['Cancel'])) {
	$qry=mysqli_query($con,"UPDATE study SET Status='Cancelled'  WHERE Accession = '$ACCESSION1'");  
header("location: Receptionist.php");
}

		$Searching2 = "SELECT * FROM medical_aid WHERE CODE = '$MEDICALAID' ";
       $SearchingResults2=mysqli_query($con,$Searching2);
	   $rows2=mysqli_fetch_array($SearchingResults2);
    $MEDICALAIDNAME = $rows2['NAME'];
	$MEDICALAIDCODE = $rows2['CODE'];

	if (isset($_POST['UPDATE'])) {
			$NAME = $_POST['NAME'];
			$SURNAME = $_POST['SURNAME'];
			$NAME2 = $_POST['MEMBERFIRSTNAME'];
			$SURNAME2 = $_POST['MEMBERLASTNAME'];
			$IDNUMBER = $_POST['IDNUMBER'];
			$IDNUMBER2 = $_POST['IDNUMBERPASSPORT'];
			$PHONENUMBER1 = $_POST['PHONENUMBER1'];
			$EMAIL1 = $_POST['EMAIL1'];
			$MEDICALAIDNAME = $_POST['MEDICALAIDNAME'];
			$MEDICALAIDNUMBER = $_POST['MEDICALAIDNUMBER'];
			$ALLERGY = $_POST['ALLERGY'];
			$CITY = $_POST['CITY'];
			$TS = $_POST['TOWN'];
			$PC = $_POST['POSTALCODE'];
			$CITY2 = $_POST['CITY2'];
			$TS2 = $_POST['TOWN2'];
			$PC2 = $_POST['POSTALCODE2'];
			$MEDICALAIDNUMBER = $_POST['MEDICALAIDNUMBER'];
			$VATNUMBER = $_POST['VATNUMBER'];
			$RELATIONTOMEMBER = $_POST['RELATIONTOMEMBER'];
			$DEPENDANTS = $_POST['NUMBEROFDEPENDANTS'];
			$PHONENUMBER2 = $_POST['PHONENUMBER2'];
			$OCCUPATION= $_POST['OCCUPATION'];
			$COMPANY = $_POST['COMPANY'];
			$COMPANYNUMBER = $_POST['COMPANYNUMBER'];
			$OCCUPATIONADDRESS= $_POST['OCCUPATIONADDRESS'];
			$EMPLOYMENTNUMBER= $_POST['EMPLOYMENTNUMBER'];
			$ADDRESS1= $_POST['ADDRESS1'];
			$ADDRESS2= $_POST['ADDRESS2'];
			$ADDRESS3= $_POST['ADDRESS3'];
			$ADDRESS4= $_POST['ADDRESS4'];

 $sql1 = "UPDATE $BRANCH SET Name ='$NAME',Surname ='$SURNAME',Name2 ='$NAME2',Surname2 ='$SURNAME2',IdentityNumber ='$IDNUMBER',
 IdentityNumber2 ='$IDNUMBER2',PhoneNumber1 ='$PHONENUMBER1',PhoneNumber2 ='$PHONENUMBER2',Allergies ='$ALLERGY',City ='$CITY',
 TownSuburb ='$TS',PostalCode='$PC',City2 ='$CITY2',TownSuburb2 ='$TS2',PostalCode2='$PC2',MedicalAid='$MEDICALAIDNAME',
 MedicalAidNumber='$MEDICALAIDNUMBER',VatNumber='$VATNUMBER',RelationToMember='$RELATIONTOMEMBER',NumberOfDependants='$DEPENDANTS',Occupation='$OCCUPATION',
 Address1='$ADDRESS1',Address2='$ADDRESS2',Address3='$ADDRESS3',Address4='$ADDRESS4',OCCUPATIONADDRESS='$OCCUPATIONADDRESS',EMPLOYMENTNUMBER='$EMPLOYMENTNUMBER',
 CompanyName='$COMPANY',CompanyNumber='$COMPANYNUMBER'
 WHERE SESSIONID =$SESSIONID AND MRN = '$MRN'";

 $results2 = mysqli_query($con,$sql1,);

 if ($results2) {
	 header("location: Receptionist.php");
 }
 else
 {
   echo "<script>alert('Nowhere')</script>";

}
}
$Searching1 = "SELECT * FROM study WHERE SESSIONID = '$SESSIONID' AND PatientsID = '$MRN' ";
       $SearchingResults1=mysqli_query($con,$Searching1);
       if($SearchingResults1->num_rows > 0){
  while ($rows=mysqli_fetch_array($SearchingResults1)) {
			$RECEPTIONIST = $rows['Receptionist'];
			$REFDOCTOR = $rows['RefDoctor'];
			$REFDOCTOR2 = $rows['RefDoctor2'];
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
<title>ADD PATIENT</title>
<link href="Css/style.css" rel="stylesheet" type="text/css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<link rel="stylesheet" href="https://fonts.google.com/specimen/Montserrat"type='text/css'>
<link href='http://fonts.googleapis.com/css?family=Montserrat' rel='stylesheet' type='text/css'>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
</head>
<body>
<div class="Content1">
<div class="tab" style="background: black;border: 2px solid black;border-bottom: 2px solid red;">
<button class="tablinks" onclick="openCity(event, 'RIS')" style="color: white;">RIS</button>
<button class="tablinks"><a style="text-decoration: none; color:white;" href="logout.php">logout</a></button>
<button style="width: 30%;"></button>
<i class="fa fa-search" id ="left" style="color: white;"></i><button class="tablinks" onclick="openCity(event, 'ADD')">ADD</button>
<i class="fa fa-briefcase" id ="left" style="color: white;"></i><button class="tablinks" onclick="openCity(event, 'EDIT')">EDIT</button>
<i class="fa fa-file" id ="left" style="color: white;"></i><button class="tablinks" onclick="openCity(event, 'REPORT')">PRINT</button>
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


<div id="ADD" class="tabcontent" style="display:block;border: 2px solid black;">
<form action="" method="post"  enctype="multipart/form-data">
<CENTER style="height: 550px;">
<table>
  <th colspan="3" style="color: white;">PATIENT <?php echo strtoupper(" ".$NAME." ".$SURNAME1);?></th>
      <br>
      <tr>
        <td colspan="3"><hr style="width: 90%;border: 1px solid red;"></td>
      </tr>
  <tr>
    <td style="text-align: center;color: white;">Patient ID</td>
    <td style="text-align: center;color: white;">Accession</td>
    <td style="text-align: center;color: white;">MRN</td>
  </tr>
  <tr>
        <td><input type="text" name="PATIENSTID" value="<?php echo $PATIENTSID;?>" style="width: 142px;border-radius: 20px 20px 20px 20px;padding-left: 20px;padding-right: 20px;border: 1px solid white;background: black;color: white;text-align: center;" readonly></td>
        <td><input type="text" name="ACCESSION" value="<?php echo $BRANCH.$ACCESSION;?>" style="width: 152px;border-radius: 20px 20px 20px 20px;padding-left: 20px;padding-right: 20px;border: 1px solid white;background: black;color: white;text-align: center;"></td>
        <td><input type="text" name="MRN" value="<?php echo $MRN;?>" style="width: 142px;border-radius: 20px 20px 20px 20px;padding-left: 20px;padding-right: 20px;border: 1px solid white;background: black;color: white;text-align: center;"></td>

  </tr>
   </table>
  <table>
   <tr>
	<td colspan="1" style="text-align: center;color: white;padding-left:-1000px;">Procedure/Exam</td>
	<td style="text-align: center;color: white;">Ref Doctor</td>
  </tr>
 
  <tr>
  <td colspan="1">
		<select name="PROCEDURE" style="width: 400px;text-align: center;border-radius: 20px 20px 20px 20px;padding-left: 35px;border: 1px solid white;background: black;color: white;text-align: center;" required>
		<option value="">Select Patients Procedure</option>
		<?php
		$Searching1 = "SELECT * FROM exams ORDER BY NAME ASC ";
       $SearchingResults1=mysqli_query($con,$Searching1);
       if($SearchingResults1->num_rows > 0){
  while ($rows=mysqli_fetch_array($SearchingResults1)) {
    $PROCEDURENAME = $rows['NAME'];
	$PROCEDURECODE = $rows['CODE'];
	echo'<option value="'.$PROCEDURENAME.'">'.$PROCEDURENAME.'</option>';
    echo'<option value="'.$PROCEDURENAME.'">'.$PROCEDURECODE.'</option>';
}
}
		?>
		    </select>
		</td>
		<td><select name="PHYSICIAN" id="PHYSICIAN" style=" width: 250px;text-align: center;border-radius: 20px 20px 20px 20px;padding-left: 10px;margin-left: 20px;border: 1px solid white;background: black;color: white;" required>
          <option value="<?php echo $REFDOCTOR;?>"><?php echo $REFDOCTOR;?></option>
          <?php
       $Searching1 = "SELECT * FROM referring ORDER BY INITIALS ASC";
       $SearchingResults1=mysqli_query($con,$Searching1);
       if($SearchingResults1->num_rows > 0){
  while ($rows=mysqli_fetch_array($SearchingResults1)) {
     $TITLE = $rows['TITLE'];
	 $INITIALS = $rows['INITIALS'];
	 $SURNAME = $rows['SURNAME'];
echo '<option value="'.$TITLE.' '.$INITIALS.' '.$SURNAME.'">'.$INITIALS.' '.$SURNAME.' '.$TITLE.'</option>';
}
}
  ?>
    </select>
		</td>
  </tr>
   </table>
  <table>
  <tr>
    <td style="text-align: center;color: white;">Ref Doctor 2</td>
    <td style="text-align: center;color: white;">Receptionist</td>
	<td style="text-align: center;color: white;">Exam Date</td>
  </tr>
  <tr>
        <td><center>
		<select name="PHYSICIAN2" id="PHYSICIAN2" style=" width: 250px; text-align: center;border-radius: 20px 20px 20px 20px;padding-left: 10px;margin-left: 20px;border: 1px solid white;background: black;color: white;">
          <option value="<?php echo $REFDOCTOR2;?>"><?php echo $REFDOCTOR2;?></option>
          <?php
       $Searching1 = "SELECT * FROM referring ORDER BY INITIALS ASC";
       $SearchingResults1=mysqli_query($con,$Searching1);
       if($SearchingResults1->num_rows > 0){
  while ($rows=mysqli_fetch_array($SearchingResults1)) {
     $TITLE = $rows['TITLE'];
	 $INITIALS = $rows['INITIALS'];
	 $SURNAME = $rows['SURNAME'];
echo '<option value="'.$TITLE.' '.$INITIALS.' '.$SURNAME.'">'.$INITIALS.' '.$SURNAME.' '.$TITLE.'</option>';
}
}
  ?>
    </select>/<center>
		</td>
        <td><input type="text" name="RECEPTIONIST" Placeholder="xxxxxxxxxxx" value="<?php echo $RECEPTIONIST;?>" style="width: 200px;border-radius: 20px 20px 20px 20px;padding-left: 20px;padding-right: 20px;border: 1px solid white;background: black;color: white;text-align: center;" Required></td>
		<td><input type="datetime-local" name="EXAMDATE" value="<?php echo $DATE2;?>" style="width: 200px;border-radius: 20px 20px 20px 20px;padding-left: 20px;padding-right: 20px;border: 1px solid white;background: black;color: white;text-align: center;" Required></td>
  </tr>
 </table>
 <table>
<td><div class="hover">
 <button class="input-group-text" type="submit" name="Save" style="color: white;"><i class="fa fa-floppy-o"></i> SAVE</button>
</div></td>
</form>
<form action="" method="post"  enctype="multipart/form-data"><td><div class="hover">
 <button class="input-group-text" type="submit" name="Home" style="color: white;"><i class="fa fa-times"></i> GO TO RECEPTIONIST</button>
</div></td>
<td><div class="hover">
 <button class="input-group-text" type="submit" name="Cancel" style="color: white;"><i class="fa fa-times"></i>  Cancel Current Study</button>
</div></td></form>
  </tr>
  </table>
     <table>
   <tr><td><br></td></tr>
  <tr>
  <td>
  <?php $Searching1 = "SELECT * FROM study WHERE SESSIONID = '$SESSIONID' AND PatientsID = '$MRN' AND DATE(ExamDate) = '$DATE'";
       $SearchingResults1=mysqli_query($con,$Searching1);
       if($SearchingResults1->num_rows > 0){
		   echo'<textarea style="width: 500px;text-align:center;height:200px;">';
  while ($rows=mysqli_fetch_array($SearchingResults1)) {
			$PROCEDURE = $rows['PatientsProcedure'];
			echo $PROCEDURE."\n";

            }} ?>
  </textarea></center></td>
  </tr></table>
</CENTER>
</div>
<div id="EDIT" class="tabcontent">
<div class="tab" style="opacity: 0.8;background: black;border: 2px solid black;border-bottom: 2px solid red;">
<center style="margin-top: 15px;">
<label class="tablinks" onclick="openCity(event, 'EDIT')" >PATIENT INFO</label>
<label class="tablinks" onclick="openCity(event, 'SCHEME DETAILS')">SCHEME DETAILS</label>
<label class="tablinks" onclick="openCity(event, 'EMPLOYER DETAILS')">EMPLOYER DETAILS</label>
<label class="tablinks" onclick="openCity(event, 'END')">END</label>
</center>
</div>
 <section class="display">
 <form action="" method="post"  enctype="multipart/form-data">
  <CENTER style="height: 650px;">
<table>
  <th colspan="5"  style="color: white;">PATIENT INFORMATION</th>
      <br>
      <tr>
        <td colspan="5"><hr style="border: 1px solid red;"></td>
      </tr>
  <tr>
    <td style="text-align: center;color: white;">Session ID</td>
    <td style="text-align: center;color: white;"></td>
    <td style="text-align: center;color: white;">MRN</td>
    <td style="text-align: center;color: white;"></td>
    <td style="text-align: center;color: white;">Patient ID</td>
  </tr>
  <tr>
        <td><input type="text" name="SESSIONID" value="<?php echo $SESSIONID;?>" style="width: 142px;border-radius: 20px 20px 20px 20px;padding-left: 20px;padding-right: 20px;border: 1px solid white;background: black;color: white;text-align: center;" readonly></td>
        <td></td>
        <td><input type="text" name="MRN" id="MRN" value="<?php echo $MRN;?>" style="width: 142px;border-radius: 20px 20px 20px 20px;padding-left: 20px;padding-right: 20px;border: 1px solid white;background: black;color: white;text-align: center;" readonly></td>
        <td></td>
        <td><input type="text" name="PID" id="PID" value="<?php echo $PATIENTSID;?>" style="width: 142px;border-radius: 20px 20px 20px 20px;padding-left: 20px;padding-right: 20px;border: 1px solid white;background: black;color: white;text-align: center;" readonly></td>
  </tr>
  <tr>
     <tr>

        <td></td>
        <td></td>
        <td></td>
        <td></td>
        <td></td>
  </tr>
  </tr>
  <tr>
    <td style="text-align: center;color: white;">NAME</td>
    <td style="text-align: center;color: white;"></td>
    <td style="text-align: center;color: white;">SURNAME</td>
    <td style="text-align: center;color: white;"></td>
    <td style="text-align: center;color: white;">ID NUMBER</td>
  </tr>
  <tr>
        <td><input type="text" name="NAME" id="FN" value="<?php echo $NAME;?>" placeholder="John" style="width: 142px;border-radius: 20px 20px 20px 20px;padding-left: 20px;padding-right: 20px;border: 1px solid white;background: black;color: white;text-align: center;" readonly></td>
        <td></td>
        <td><input type="text" name="SURNAME" id="LN" value="<?php echo $SURNAME1;?>" placeholder="Doe" style="width: 142px;border-radius: 20px 20px 20px 20px;padding-left: 20px;padding-right: 20px;border: 1px solid white;background: black;color: white;text-align: center;" readonly></td>
        <td></td>
        <td><input type="text" name="IDNUMBER" id="IDN" value="<?php echo $IDNUMBER;?>" placeholder="xxxxxxxxxxxxx" style="width: 142px;border-radius: 20px 20px 20px 20px;padding-left: 20px;padding-right: 20px;border: 1px solid white;background: black;color: white;text-align: center;" readonly></td>
  </tr>
  <tr>
        <td style="font-size: 10px;text-align: center;color: white;"><button class="edit" id="FN1" type="button" >EDIT</button></td>
        <td style="font-size: 10px;text-align: center;color: white;"></td>
        <td style="font-size: 10px;text-align: center;color: white;"><button class="edit" id="LN1" type="button" >EDIT</button></td>
        <td style="font-size: 10px;text-align: center;color: white;"></td>
        <td style="font-size: 10px;text-align: center;color: white;"><button class="edit" id="IDN1" type="button" >EDIT</button></td>
  </tr>
  <tr>
        <td></td>
        <td></td>
        <td></td>
        <td></td>
        <td></td>
  </tr>
  <tr>
    <td style="text-align: center;color: white;">Phone Number</td>
    <td style="text-align: center;color: white;"></td>
    <td style="text-align: center;color: white;">Email Address</td>
	<td style="text-align: center;color: white;"></td>
	<td style="text-align: center;color: white;">Allergy</td>
  </tr>
  <tr>
        <td><input type="text" name="PHONENUMBER1" id="PN" value="<?php echo $PHONENUMBER1;?>" placeholder="000 000 0000" style="width: 142px;border-radius: 20px 20px 20px 20px;padding-left: 20px;padding-right: 20px;border: 1px solid white;background: black;color: white;text-align: center;" readonly></td>
        <td></td>
        <td><input type="text" name="EMAIL1" id="EA" value="<?php echo $EMAIL;?>" placeholder="JohnDoe@Gmail.com" style="width: 142px;border-radius: 20px 20px 20px 20px;padding-left: 20px;padding-right: 20px;border: 1px solid white;background: black;color: white;text-align: center;" readonly></td>
		<td></td>
        <td><input type="text" name="ALLERGY" id="Alg" value="<?php echo $ALLERGY;?>"  style="width: 142px;border-radius: 20px 20px 20px 20px;padding-left: 20px;padding-right: 20px;border: 1px solid white;background: black;color: white;text-align: center;" readonly></td>
  </tr>
  <tr>
        <td style="font-size: 10px;text-align: center;color: white;"><button class="edit" id="PN1" type="button" >EDIT</button></td>
        <td style="font-size: 10px;text-align: center;color: white;"></td>
        <td style="font-size: 10px;text-align: center;color: white;"><button class="edit" id="EA1" type="button" >EDIT</button></td>
        <td style="font-size: 10px;text-align: center;color: white;"></td>
        <td style="font-size: 10px;text-align: center;color: white;"><button class="edit" id="Alg1" type="button" >EDIT</button></td>
  </tr>
  <tr>
        <td></td>
        <td></td>
        <td></td>
        <td></td>
        <td></td>
  </tr>
   <th colspan="5" style="color: white;">PHYSICAL ADDRESS</th>
      <br>
      <tr>
        <td colspan="5"><hr style="border: 1px solid red;"></td>
      </tr>
	  <tr>
    <td style="text-align: center;color: white;"></td>
	<td style="text-align: center;color: white;">Address</td>
    <td style="text-align: center;color: white;"></td>
    <td style="text-align: center;color: white;">Address</td>
	<td style="text-align: center;color: white;"></td>
  </tr>
  <tr>
    <td style="text-align: center;color: white;"></td>
	<td style="text-align: center;color: white;"><center><input type="text" name="ADDRESS1" id="ADDRESS1" placeholder="xxxxxxxxxxxxx" value="<?php echo $ADDRESS1;?>" style="width: 142px;border-radius: 20px 20px 20px 20px;padding-left: 20px;padding-right: 20px;border: 1px solid white;background: black;color: white;text-align: center;"required></center></td>
    <td style="text-align: center;color: white;"></td>
    <td style="text-align: center;color: white;"><center><input type="text" name="ADDRESS3" id="ADDRESS3" placeholder="xxxxxxxxxxxxx" value="<?php echo $ADDRESS3;?>" style="width: 142px;border-radius: 20px 20px 20px 20px;padding-left: 20px;padding-right: 20px;border: 1px solid white;background: black;color: white;text-align: center;"required></center></td>
	<td style="text-align: center;color: white;"></td>
  </tr>
  <tr>
    <td style="text-align: center;color: white;">CITY</td>
    <td style="text-align: center;color: white;"></td>
    <td style="text-align: center;color: white;">TOWN/SUBURB</td>
    <td style="text-align: center;color: white;"></td>
    <td style="text-align: center;color: white;">POSTAL CODE</td>
  </tr>
  <tr>
        <td><input type="text" name="CITY" id="CTY" value="<?php echo $CITY;?>" placeholder="14 Bert Booysen" style="width: 142px;border-radius: 20px 20px 20px 20px;padding-left: 20px;padding-right: 20px;border: 1px solid white;background: black;color: white;text-align: center;" readonly></td>
        <td></td>
        <td><input type="text" name="TOWN" id="T" value="<?php echo $TOWN;?>" placeholder="Limpopo" style="width: 142px;border-radius: 20px 20px 20px 20px;padding-left: 20px;padding-right: 20px;border: 1px solid white;background: black;color: white;text-align: center;" readonly></td>
        <td></td>
		<td><input type="text" name="POSTALCODE" id="PC" value="<?php echo $POSTALCODE;?>"  placeholder="0000" style="width: 142px;border-radius: 20px 20px 20px 20px;padding-left: 20px;padding-right: 20px;border: 1px solid white;background: black;color: white;text-align: center;" readonly></td>
  </tr>
   <tr>
        <td style="font-size: 10px;text-align: center;color: white;"><button class="edit" id="CTY1" type="button" >EDIT</button></td>
        <td style="font-size: 10px;text-align: center;color: white;"></td>
        <td style="font-size: 10px;text-align: center;color: white;"><button class="edit" id="T1" type="button" >EDIT</button></td>
        <td style="font-size: 10px;text-align: center;color: white;"></td>
        <td style="font-size: 10px;text-align: center;color: white;"><button class="edit" id="PC1" type="button" >EDIT</button></td>
  </tr>
  <tr>
        <td></td>
        <td></td>
        <td></td>
        <td></td>
        <td></td>
  </tr>
</table>
<br>
   <div class="hover">
 <label class="input-group-text" onclick="openCity(event, 'SCHEME DETAILS')" style="color: white;"><i class="fa fa-arrow-right"></i> NEXT</label>
</CENTER>
</div>
  </section>
</div>

<div id="SCHEME DETAILS" class="tabcontent" style="border: 1px solid black;">
  <div class="tab" style="opacity: 0.8;background: black;border: 2px solid black;border-bottom: 2px solid red;">
<center style="margin-top: 15px;">
<label class="tablinks" onclick="openCity(event, 'EDIT')" >PATIENT INFO</label>
<label class="tablinks" onclick="openCity(event, 'SCHEME DETAILS')">SCHEME DETAILS</label>
<label class="tablinks" onclick="openCity(event, 'EMPLOYER DETAILS')">EMPLOYER DETAILS</label>
<label class="tablinks" onclick="openCity(event, 'END')">END</label>
</center>
</div>
 <section class="display">
  <CENTER style="height: 650px;">
<table>
  <th colspan="5" style="color: white;">SCHEME DETAILS</th>
      <br>
      <tr>
        <td colspan="5"><hr style="border: 1px solid red;"></td>
      </tr>
  <tr>
   <td style="text-align: center;color: white;">Medical Scheme</td>
    <td style="text-align: center;color: white;">Medical Aid No.</td>
    <td style="text-align: center;color: white;">Member F. Name</td>
    <td style="text-align: center;color: white;">Member L. Name</td>
    <td style="text-align: center;color: white;">IDNo./Passport</td>
  </tr>
  <tr>
        <td><select name="MEDICALAIDNAME" id="MS" style="width: 182px; text-align: center;border-radius: 20px 20px 20px 20px;padding-left: 20px;padding-right: 20px;border: 1px solid white;background: black;color: white;text-align: center;" >
		<option value="<?php echo $MEDICALAIDCODE;?>" selected><?php echo $MEDICALAIDNAME;?></option>
		<?php
		$Searching1 = "SELECT * FROM medical_aid ";
       $SearchingResults1=mysqli_query($con,$Searching1);
       if($SearchingResults1->num_rows > 0){
  while ($rows=mysqli_fetch_array($SearchingResults1)) {
    $MEDICALAIDNAME = $rows['NAME'];
	$MEDICALAIDCODE = $rows['CODE'];
	echo'<option value="'.$MEDICALAIDCODE.'">'.$MEDICALAIDNAME.'</option>';

}
}
		?>
		    </select></td>
        <td><input type="text" name="MEDICALAIDNUMBER" id="MAIDN" value="<?php echo $MEDICALAIDNUMBER;?>" placeholder="000 000 0000" style="width: 142px;border-radius: 20px 20px 20px 20px;padding-left: 20px;padding-right: 20px;border: 1px solid white;background: black;color: white;text-align: center;" readonly></td>
        <td><input type="text" name="MEMBERFIRSTNAME" id="MFN" value="<?php echo $NAME2;?>" placeholder="John" style="width: 142px;border-radius: 20px 20px 20px 20px;padding-left: 20px;padding-right: 20px;border: 1px solid white;background: black;color: white;text-align: center;" readonly></td>
        <td><input type="text" name="MEMBERLASTNAME" id="MLN" value="<?php echo $SURNAME2;?>" placeholder="Doe" style="width: 142px;border-radius: 20px 20px 20px 20px;padding-left: 20px;padding-right: 20px;border: 1px solid white;background: black;color: white;text-align: center;" readonly></td>
        <td><input type="text" name="IDNUMBERPASSPORT" id="IDNP" value="<?php echo $IDNUMBER2;?>" placeholder="000000000000" style="width: 142px;border-radius: 20px 20px 20px 20px;padding-left: 20px;padding-right: 20px;border: 1px solid white;background: black;color: white;text-align: center;" readonly></td>
  </tr>
  <tr>
        <td style="font-size: 10px;text-align: center;color: white"></td>
        <td style="font-size: 10px;text-align: center;color: white;"><button class="edit" id="MAIDN1" type="button" >EDIT</button></td>
        <td style="font-size: 10px;text-align: center;color: white;"><button class="edit" id="MFN1" type="button" >EDIT</button></td>
        <td style="font-size: 10px;text-align: center;color: white;"><button class="edit" id="MLN1" type="button" >EDIT</button></td>
        <td style="font-size: 10px;text-align: center;color: white;"><button class="edit" id="IDNP1" type="button" >EDIT</button></td>
  </tr>
  <tr>
     <tr>
        <td></td>
        <td></td>
        <td></td>
        <td></td>
        <td></td>
  </tr>
  </tr>
  <tr>
    <td style="text-align: center;color: white;">Plan Number</td>
    <td style="text-align: center;color: white;">Relation To Member</td>
    <td></td>
    <td style="text-align: center;color: white;">Dependents Code</td>
    <td style="text-align: center;color: white;">Phone Number</td>
  </tr>
  <tr>
        <td><input type="text" name="VATNUMBER" id="VATN" value="<?php echo $VATNUMBER;?>" style="width: 142px;border-radius: 20px 20px 20px 20px;padding-left: 20px;padding-right: 20px;border: 1px solid white;background: black;color: white;text-align: center;" readonly></td>
        <td>
          <select name="RELATIONTOMEMBER" id="RTM" style="width: 182px; text-align: center;border-radius: 20px 20px 20px 20px;padding-left: 20px;padding-right: 20px;border: 1px solid white;background: black;color: white;text-align: center;" >
    <option value="<?php echo $RELATIONTOMEMBER;?>" selected><?php echo $RELATIONTOMEMBER;?></option>
    <option value="Self">Self</option>
		<option value="Brother">Brother</option>
		<option value="Sister">Sister</option>
		<option value="Son">Son</option>
		<option value="Daughter">Daughter</option>
		<option value="Father">Father</option>
		<option value="Mother">Mother</option>
		<option value="Grand Father">Grand Father</option>
		<option value="Grand Mother">Grand Mother</option>
		<option value="Grand Son">Grand Son</option>
		<option value="Grand Daughter">Grand Daughter</option>
		<option value="Other">Other</option>
    </select>
        </td>
        <td></td>
        <td><input type="number" name="NUMBEROFDEPENDANTS" id="NOD" value="<?php echo $DEPENDANTS;?>" style="width: 142px;border-radius: 20px 20px 20px 20px;padding-left: 20px;padding-right: 20px;border: 1px solid white;background: black;color: white;text-align: center;" readonly></td>
        <td><input type="text" name="PHONENUMBER2" id="PHONE2" value="<?php echo $PHONENUMBER2;?>"  placeholder="xxxxxxxxxx" style="width: 142px;border-radius: 20px 20px 20px 20px;padding-left: 20px;padding-right: 20px;border: 1px solid white;background: black;color: white;text-align: center;" readonly></td>
        </tr>
  <tr>
        <td style="font-size: 10px;text-align: center;color: white;"><button class="edit" id="VATN1" type="button" >EDIT</button></td>
        <td style="font-size: 10px;text-align: center;color: white;"></td>
        <td style="font-size: 10px;text-align: center;color: white;"></td>
        <td style="font-size: 10px;text-align: center;color: white;"><button class="edit" id="NOD1" type="button" >EDIT</button></td>
        <td style="font-size: 10px;text-align: center;color: white;"><button class="edit" id="PHONE21" type="button" >EDIT</button></td>
  </tr>
  <tr>
        <td></td>
        <td></td>
        <td></td>
        <td></td>
        <td></td>
  </tr>
   <th colspan="5" style="color: white;">PHYSICAL ADDRESS</th>
      <br>
      <tr>
        <td colspan="5"><hr style="border: 1px solid red;"></td>
      </tr>
	  <tr>
     <td style="text-align: center;color: white;"></td>
	<td style="text-align: center;color: white;">Address</td>
    <td style="text-align: center;color: white;"></td>
    <td style="text-align: center;color: white;">Address</td>
	<td style="text-align: center;color: white;"></td>
  </tr>
  <tr>
    <td style="text-align: center;color: white;"></td>
	<td style="text-align: center;color: white;"><center><input type="text" name="ADDRESS2" id="ADDRESS2" placeholder="xxxxxxxxxxxxx" value="<?php echo $ADDRESS2;?>" style="width: 142px;border-radius: 20px 20px 20px 20px;padding-left: 20px;padding-right: 20px;border: 1px solid white;background: black;color: white;text-align: center;"required></center></td>
    <td style="text-align: center;color: white;"></td>
    <td style="text-align: center;color: white;"><center><input type="text" name="ADDRESS4" id="ADDRESS4" placeholder="xxxxxxxxxxxxx" value="<?php echo $ADDRESS4;?>" style="width: 142px;border-radius: 20px 20px 20px 20px;padding-left: 20px;padding-right: 20px;border: 1px solid white;background: black;color: white;text-align: center;"required></center></td>
	<td style="text-align: center;color: white;"></td>
  </tr>
  <tr>
    <td style="text-align: center;color: white;"></td>
    <td style="text-align: center;color: white;">CITY</td>
    <td style="text-align: center;color: white;">TOWN/SUBURB</td>
    <td style="text-align: center;color: white;">POSTAL CODE</td>
    <td style="text-align: center;color: white;"></td>
  </tr>
  <tr>
        <td></td>
        <td><input type="text" name="CITY2" id="Cty2"  value="<?php echo $CITY2;?>" placeholder="Tzaneen" style="width: 142px;border-radius: 20px 20px 20px 20px;padding-left: 20px;padding-right: 20px;border: 1px solid white;background: black;color: white;text-align: center;" readonly></td>
        <td><input type="text" name="TOWN2" id="T2" value="<?php echo $TOWN2;?>" placeholder="Limpopo" style="width: 142px;border-radius: 20px 20px 20px 20px;padding-left: 20px;padding-right: 20px;border: 1px solid white;background: black;color: white;text-align: center;" readonly></td>
        <td><input type="text" name="POSTALCODE2" id="PC2" value="<?php echo $POSTALCODE2;?>" placeholder="0850" style="width: 142px;border-radius: 20px 20px 20px 20px;padding-left: 20px;padding-right: 20px;border: 1px solid white;background: black;color: white;text-align: center;" readonly></td>
        <td></td>
  </tr>
  <tr>
        <td style="font-size: 10px;text-align: center;color: white;"></td>
        <td style="font-size: 10px;text-align: center;color: white;"><button class="edit" id="Cty21" type="button" >EDIT</button></td>
        <td style="font-size: 10px;text-align: center;color: white;"><button class="edit" id="T21" type="button" >EDIT</button></td>
        <td style="font-size: 10px;text-align: center;color: white;"><button class="edit" id="PC21" type="button" >EDIT</button></td>
        <td style="font-size: 10px;text-align: center;color: white;"></td>
  </tr>
  <tr>
        <td></td>
        <td></td>
        <td></td>
        <td></td>
        <td></td>
  </tr>

  <tr>
        <td></td>
        <td></td>
        <td></td>
        <td></td>
        <td></td>
  </tr>
</table>
<br>
   <table>
  <tr>
    <td><div class="hover">
 <label class="input-group-text" onclick="openCity(event, 'EDIT')" style="color: white;"><i class="fa fa-arrow-left"></i> BACK</label>
</div></td>
    <td><div class="hover">
 <label class="input-group-text" onclick="openCity(event, 'EMPLOYER DETAILS')" style="color: white;"><i class="fa fa-arrow-right"></i> NEXT</label>
</div></td>
  </tr>
</table>
</CENTER>
  </section>
</div>

<div id="EMPLOYER DETAILS" class="tabcontent" style="border: 1px solid black;">
  <div class="tab" style="opacity: 0.8;background: black;border: 2px solid black;border-bottom: 2px solid red;">
<center style="margin-top: 15px;">
<label class="tablinks" onclick="openCity(event, 'EDIT')" >PATIENT INFO</label>
<label class="tablinks" onclick="openCity(event, 'SCHEME DETAILS')">SCHEME DETAILS</label>
<label class="tablinks" onclick="openCity(event, 'EMPLOYER DETAILS')">EMPLOYER DETAILS</label>
<label class="tablinks" onclick="openCity(event, 'END')">END</label>
</center>
</div>
 <section class="display">
  <CENTER style="height: 650px;">
<table>
  <th colspan="5" style="color: white;">EMPLOYER DETAILS</th>
      <br>
      <tr>
        <td colspan="5"><hr style="border: 1px solid red;"></td>
      </tr>
  <tr>
	<td style="text-align: center;color: white;">OCCUPATION</td>
    <td style="text-align: center;color: white;">COMPANY NAME</td>
    <td style="text-align: center;color: white;">COMPANY NO.</td>
	<td style="text-align: center;color: white;">ADDRESS</td>
	<td style="text-align: center;color: white;">EMPLOYMENT NUMBER</td>
  </tr>
  <tr>
		<td><input type="text" name="OCCUPATION" id="OCC" value="<?php echo $OCCUPATION;?>" placeholder="I Dont Know" style="width: 142px;border-radius: 20px 20px 20px 20px;padding-left: 20px;padding-right: 20px;border: 1px solid white;background: black;color: white;text-align: center;" readonly></td>
		<td><input type="text" name="COMPANY" id="COMP" value="<?php echo $COMPANY;?>" placeholder="Gautrain" style="width: 142px;border-radius: 20px 20px 20px 20px;padding-left: 20px;padding-right: 20px;border: 1px solid white;background: black;color: white;text-align: center;" readonly></td>
		<td><input type="text" name="COMPANYNUMBER" id="COMPN" value="<?php echo $COMPANYNUMBER?>" placeholder="000 000 0000" style="width: 142px;border-radius: 20px 20px 20px 20px;padding-left: 20px;padding-right: 20px;border: 1px solid white;background: black;color: white;text-align: center;" readonly></td>
		<td><center><input type="text" name="OCCUPATIONADDRESS" placeholder="xxxxxxxxxxxxx" value="<?php echo $OCCUPATIONADDRESS;?>" style="width: 142px;border-radius: 20px 20px 20px 20px;padding-left: 20px;padding-right: 20px;border: 1px solid white;background: black;color: white;text-align: center;"></center></td>
		<td><center><input type="text" placeholder="xxxxxxxxxx" name="EMPLOYMENTNUMBER" value="<?php echo $EMPLOYMENTNUMBER;?>" style="width: 142px;border-radius: 20px 20px 20px 20px;padding-left: 20px;padding-right: 20px;border: 1px solid white;background: black;color: white;text-align: center;"></center></td>
 </tr>
  <tr>
        <td style="font-size: 10px;text-align: center;color: white;"><button class="edit" id="OCC1" type="button" >EDIT</button></td>
        <td style="font-size: 10px;text-align: center;"></td>
		<td style="font-size: 10px;text-align: center;color: white;"><button class="edit" id="COMP1" type="button" >EDIT</button></td>
        <td style="font-size: 10px;text-align: center;"></td>
		<td style="font-size: 10px;text-align: center;color: white;"><button class="edit" id="COMPN1" type="button" >EDIT</button></td>
  </tr>
  <tr>
     <tr>
        <td></td>
        <td></td>
        <td></td>
        <td></td>
        <td></td>
  </tr>

</table>
<br>
   <table>
  <tr>
    <td><div class="hover">
 <label class="input-group-text" onclick="openCity(event, 'SCHEME DETAILS')" style="color: white;"><i class="fa fa-arrow-left"></i> BACK</label>
</div></td>
    <td><div class="hover">
 <label class="input-group-text" onclick="openCity(event, 'END')" style="color: white;"><i class="fa fa-arrow-right"></i> NEXT</label>
</div></td>
  </tr>
</table>
</CENTER>
  </section>
</div>

<div id="END" class="tabcontent" style="border: 1px solid black;">
  <div class="tab" style="opacity: 0.8;background: black;border: 2px solid black;border-bottom: 2px solid red;">
<center style="margin-top: 15px;">
<label class="tablinks" onclick="openCity(event, 'EDIT')" >PATIENT INFO</label>
<label class="tablinks" onclick="openCity(event, 'SCHEME DETAILS')">SCHEME DETAILS</label>
<label class="tablinks" onclick="openCity(event, 'EMPLOYER DETAILS')">EMPLOYER DETAILS</label>
<label class="tablinks" onclick="openCity(event, 'END')">END</label>
</center>
</div>
 <section class="display">
  <CENTER style="height: 650px;">
<table>
  <th colspan="5" style="color: white;">END</th>
      <br>
      <tr>
        <td colspan="5"><hr style="border: 1px solid red;"></td>
      </tr>
<td><div class="hover">
 <button class="input-group-text" type="submit" name="UPDATE" style="color: white;"><i class="fa fa-floppy-o"></i>UPDATE</button>
</div></td>
  </tr>
</table>
<br>
   <table>
  <tr>
    <td><div class="hover">
 <label class="input-group-text" onclick="openCity(event, 'EMPLOYER DETAILS')" style="color: white;"><i class="fa fa-arrow-left"></i> BACK</label>
</div></td>
  </tr>
</table>
</CENTER>
</form>
  </section>
</div>

<div id="REPORT" class="tabcontent" style="border: 1px solid black;">
<center style="margin-top: 15px;">
<form action="" method="post"  enctype="multipart/form-data">
<table>
<th colspan="5" style="color: white;">END</th>
      <br>
      <tr>
        <td colspan="5"><hr style="border: 1px solid red;"></td>
      </tr>
<td><div class="hover">
 <button class="input-group-text" type="submit" name="SaveJobcard" style="color: white;"><i class="fa fa-floppy-o"></i> Job Card</button>
</div></td>
<td><div class="hover">
 <button class="input-group-text" type="submit" name="Label" style="color: white;"><i class="fa fa-floppy-o"></i> Label</button>
</div></td>
<td><div class="hover">
 <button class="input-group-text" type="submit" name="Report" style="color: white;"><i class="fa fa-floppy-o"></i> Report</button>
</div></td>
</table>
</form>
</center>
</div>

<div id="HELP" class="tabcontent"  style="border: 1px solid black;">
<div class="tab" style="background: black;border: 2px solid black;border-bottom: 2px solid red;">
<center>
<i class="fa fa-envelope" id ="left" style="color: white;"></i><button class="tablinks"  onclick="window.location.href='Receptionist.php'">RECEPTIONIST</button>
<i class="fa fa-briefcase" id ="left" style="color: white;"></i><button class="tablinks"  onclick="window.location.href='Radiographer.php'">RADIOGRAPHER</button>
<i class="fa fa-briefcase" id ="left" style="color: white;"></i><button class="tablinks"  onclick="window.location.href='Radiologist.php'">RADIOLOGIST</button>
<i class="fa fa-envelope" id ="left" style="color: white;"></i><button class="tablinks"  onclick="window.location.href='Typist.php'">TYPIST</button>
</center>
</div>
<br>
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
<script>
    $(document).ready(function(){
        $('#FN1').click(function(){
            $("input[name='NAME']").attr("readonly", false);
            document.getElementById("FN").focus();
        });
        $('#LN1').click(function(){
            $("input[name='SURNAME']").attr("readonly", false);
            document.getElementById("LN").focus();
        });
        $('#IDN1').click(function(){
            $("input[name='IDNUMBER']").attr("readonly", false);
            document.getElementById("IDN").focus();
        });
        $('#PN1').click(function(){
            $("input[name='PHONENUMBER1']").attr("readonly", false);
            document.getElementById("PN").focus();
        });
        $('#EA1').click(function(){
            $("input[name='EMAIL1']").attr("readonly", false);
            document.getElementById("EA").focus();
        });
        $('#NOTE1').click(function(){
            $("textarea[name='NOTE']").attr("readonly", false);
            document.getElementById("NOTE").focus();
        });
        $('#CTY1').click(function(){
            $("input[name='CITY']").attr("readonly", false);
            document.getElementById("CTY").focus();
        });
        $('#T1').click(function(){
            $("input[name='TOWN']").attr("readonly", false);
            document.getElementById("T").focus();
        });
        $('#PC1').click(function(){
            $("input[name='POSTALCODE']").attr("readonly", false);
            document.getElementById("PC").focus();
        });
        $('#Alg1').click(function(){
            $("input[name='ALLERGY']").attr("readonly", false);
            document.getElementById("Alg").focus();
        });
       $('#MAIDN1').click(function(){
            $("input[name='MEDICALAIDNUMBER']").attr("readonly", false);
            document.getElementById("MAIDN").focus();
        });
        $('#MFN1').click(function(){
            $("input[name='MEMBERFIRSTNAME']").attr("readonly", false);
            document.getElementById("MFN").focus();
        });
        $('#MLN1').click(function(){
            $("input[name='MEMBERLASTNAME']").attr("readonly", false);
            document.getElementById("MLN").focus();
        });
        $('#IDNP1').click(function(){
            $("input[name='IDNUMBERPASSPORT']").attr("readonly", false);
            document.getElementById("IDNP").focus();
        });
        $('#VATN1').click(function(){
            $("input[name='VATNUMBER']").attr("readonly", false);
            document.getElementById("VATN").focus();
        });
        $('#NOD1').click(function(){
            $("input[name='NUMBEROFDEPENDANTS']").attr("readonly", false);
            document.getElementById("NOD").focus();
        });
        $('#PHONE21').click(function(){
            $("input[name='PHONENUMBER2']").attr("readonly", false);
            document.getElementById("PHONE2").focus();
        });

        $('#Cty21').click(function(){
            $("input[name='CITY2']").attr("readonly", false);
            document.getElementById("Cty2").focus();
        });
        $('#T21').click(function(){
            $("input[name='TOWN2']").attr("readonly", false);
            document.getElementById("T2").focus();
        });
        $('#PC21').click(function(){
            $("input[name='POSTALCODE2']").attr("readonly", false);
            document.getElementById("PC2").focus();
        });
        $('#COMP1').click(function(){
            $("input[name='COMPANY']").attr("readonly", false);
            document.getElementById("COMP").focus();
        });
        $('#COMPN1').click(function(){
            $("input[name='COMPANYNUMBER']").attr("readonly", false);
            document.getElementById("COMPN").focus();
        });
        $('#OCC1').click(function(){
            $("input[name='OCCUPATION']").attr("readonly", false);
            document.getElementById("OCC").focus();
        });
        $('#RN1').click(function(){
            $("Select[name='RECEPTIONISTNAME']").attr("disabled", false);
            document.getElementById("RN").focus();
        });
        $('#RDN1').click(function(){
            $("input[name='REFDOCTORNAME']").attr("readonly", false);
            document.getElementById("RDN").focus();
        });
        $('#RDE1').click(function(){
            $("input[name='REFDOCTOREMAIL']").attr("readonly", false);
            document.getElementById("RDE").focus();
        });
        $('#RDP1').click(function(){
            $("input[name='REFDOCTORPHONE']").attr("readonly", false);
            document.getElementById("RDP").focus();
        });
        $('#Brn1').click(function(){
            $("Select[name='BRANCH']").attr("disabled", false);
            document.getElementById("Brn").focus();
        });
        $('#PT21').click(function(){
            $("Select[name='PAYMENTTYPE']").attr("disabled", false);
            document.getElementById("PT2").focus();
        });
        $('#Wrd1').click(function(){
            $("Select[name='WARD']").attr("disabled", false);
            document.getElementById("Wrd").focus();
        });
        $('#ED1').click(function(){
            $("input[name='EXAMDATE']").attr("readonly", false);
            document.getElementById("ED").focus();
        });
        $('#AR1').click(function(){
            $("Select[name='ASSIGNRADIOGRAPHER']").attr("disabled", false);
            document.getElementById("AR").focus();
        });
        $('#AD1').click(function(){
            $("Select[name='ASSIGNDOCTOR']").attr("disabled", false);
            document.getElementById("AD").focus();
        });
        $('#Dte1').click(function(){
            $("input[name='DATE']").attr("readonly", false);
            document.getElementById("Dte").focus();
        });
        $('#Sltn1').click(function(){
            $("textarea[name='SELECTION']").attr("readonly", false);
            document.getElementById("SELECTION").focus();
        });
    });
</script>
</body>
<script src="Javascript/jquery-1.11.0.js"></script>
<script src="Javascript/effects.js"></script>
</html>
