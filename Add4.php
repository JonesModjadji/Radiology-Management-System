<?php
date_default_timezone_set('Africa/Johannesburg');
session_start();
include("Connection.php");
			$SESSIONID=$_GET['SESSIONID'];
			$MRN=$_GET['MRN'];
			$PATIENTSID=$_GET['PatientsID'];
			$PHYSICIAN="";
			$Branch=$_GET['Branch'];
			$RECEPTIONIST="";
			$EXAMDATE="";
			$DATE=date("Y/m/d");
			$DATE2 = date('Y-m-d\TH:i'); 
			$RECEPTIONIST ="";
			$REFDOCTOR ="";
			$SESSIONID2= rand(1111111111,9999999999);
            $MRN2= rand(1111111111,9999999999);
			
			ob_start();

echo $_SESSION['suserbranch'];
$var2 = ob_get_clean();
			
			$dbname = 'ris';
	   $sql = "SHOW TABLES FROM $dbname";
	   $result = mysqli_query($con,$sql);
	 while ($row = mysqli_fetch_row($result)) {
		 ob_start();
echo "{$row[0]}";
$var = ob_get_clean();
			$Searching3 = "SELECT * FROM $var2";
       $SearchingResults3=mysqli_query($con,$Searching3);
       if($SearchingResults3==true){
  while ($rows=mysqli_fetch_array($SearchingResults3)) {
    $PATIENTSID2 = $rows['PatientsID'];
}}elseif($SearchingResults3==false){
        echo "";
	 }}
			
			 $dbname = 'ris';
	   $sql = "SHOW TABLES FROM $dbname";
	   $result = mysqli_query($con,$sql);
	 while ($row = mysqli_fetch_row($result)) {
		 ob_start();
echo "{$row[0]}";
$var = ob_get_clean();
	 
            $Searching1 = "SELECT * FROM $var WHERE SESSIONID = '$SESSIONID' AND MRN = '$MRN'";
       $SearchingResults1=mysqli_query($con,$Searching1);
       if($SearchingResults1==true){
  while ($rows=mysqli_fetch_array($SearchingResults1)) {
	$SESSIONID = $rows['SESSIONID'];
    $PATIENTSID = $rows['PatientsID'];
	$ACCINDEX = $rows['AccIndex'];
	$NAME = $rows['Name'];
			$SURNAME = $rows['Surname'];
			$NAME2 = $rows['Name2'];
			$SURNAME2 =$rows['Surname2'];
			$SEX = $rows['Sex'];
			$IDNUMBER = $rows['IdentityNumber'];
			$IDNUMBER2 = $rows['IdentityNumber2'];
			$PHONENUMBER1 = $rows['PhoneNumber1'];
			$EMAIL1 = $rows['EmailAddress1'];
			$MEDICALAIDNAME = $rows['MedicalAid'];
			$BRANCHNAME = $rows['Branch'];
			$DESCRIPTION = $rows['Allergies'];
			$CITY = $rows['City'];
			$TS = $rows['TownSuburb'];
			$PC = $rows['PostalCode'];
			$CITY2 = $rows['City2'];
			$TS2 = $rows['TownSuburb2'];
			$PC2 = $rows['PostalCode2'];
			$INITIALS = $rows['Initials'];
			$DOB = $rows['DOB'];
			$TITLE = $rows['Title'];
			$MAN = $rows['MedicalAidNumber'];
			$VN = $rows['VatNumber'];
			$RTM = $rows['RelationToMember'];
			$NOD = $rows['NumberOfDependants'];
			$PHONENUMBER2 = $rows['PhoneNumber2'];
			$OCCUPATION= $rows['Occupation'];
			$COMPANY = $rows['CompanyName'];
			$COMPANYNUMBER =  $rows['CompanyNumber'];
			$OCCUPATIONADDRESS= $rows['OCCUPATIONADDRESS'];
			$EMPLOYMENTNUMBER= $rows['EMPLOYMENTNUMBER'];
			$ADDRESS1= $rows['Address1'];
			$ADDRESS2= $rows['Address2'];
			$ADDRESS3= $rows['Address3'];
			$ADDRESS4= $rows['Address4'];


	   }}elseif($SearchingResults1==false){
        echo "";
}
	   }
$dbname = 'ris';
	   $sql = "SHOW TABLES FROM $dbname";
	   $result = mysqli_query($con,$sql);
	 while ($row = mysqli_fetch_row($result)) {
		 ob_start();
echo "{$row[0]}";
$var = ob_get_clean();
$Searching1 = "SELECT * FROM $var WHERE SESSIONID = '$SESSIONID' AND MRN = '$MRN'";
       $SearchingResults1=mysqli_query($con,$Searching1);
       if($SearchingResults1==true){
  while ($rows=mysqli_fetch_array($SearchingResults1)) {
    $PATIENTSID1 = $rows['PatientsID'];
}}elseif($SearchingResults1==false){
        echo "";
}
}
$PATIENTSID2++;
$PATIENTSID3=str_pad($PATIENTSID2,10,'0',STR_PAD_LEFT);
$ACCINDEX++;
$ACCINDEXLetter = chr(64 + 1);

$ACCESSION = str_pad($PATIENTSID2,10,'0',STR_PAD_LEFT)."$ACCINDEXLetter";

if (isset($_POST['Save'])) {
            $ACCESSION = $_POST['ACCESSION'];
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
 ,'','','','','','','','$MRN','$SESSIONID2','$PROCEDURE','$PHYSICIAN','$PHYSICIAN2','$RECEPTIONIST','$EXAMDATE','white')";
 
 $sql1 = "INSERT INTO $var2(SESSIONID,MRN,AccIndex,AccIndex2,Name,Surname,Name2,Surname2,Sex,
			  IdentityNumber,IdentityNumber2,PhoneNumber1,EmailAddress1,MedicalAid,Branch,Allergies,City,TownSuburb,PostalCode,City2
			  ,TownSuburb2,PostalCode2,Initials,DOB,Title,MedicalAidNumber,VatNumber,RelationToMember,NumberOfDependants,PhoneNumber2
			  ,Occupation,CompanyName,CompanyNumber,Address1,Address2,Address3,Address4,OCCUPATIONADDRESS,EMPLOYMENTNUMBER) 
			  VALUES ('$SESSIONID2','$MRN','1','Still','$NAME','$SURNAME','$NAME2','$SURNAME2','$SEX','$IDNUMBER','$IDNUMBER2','$PHONENUMBER1','$EMAIL1',
			  '$MEDICALAIDNAME','$var2','$DESCRIPTION','$CITY','$TS','$PC','$CITY2','$TS2','$PC2','$INITIALS','$DOB','$TITLE','$MAN'
			  ,'$VN','$RTM','$NOD','$PHONENUMBER2','$OCCUPATION','$COMPANY','$COMPANYNUMBER','$ADDRESS1','$ADDRESS2','$ADDRESS3','$ADDRESS4','$OCCUPATIONADDRESS'
			  ,'$EMPLOYMENTNUMBER')";
			  
 $results1 = mysqli_query($con,$sql,);
 $results2 = mysqli_query($con,$sql1,);

 if ($results1) {
	 header("location: Add5.php?SESSIONID=$SESSIONID2&MRN=$MRN&PatientsID=$PATIENTSID3&ID=$IDNUMBER&Branch=$var2");
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

elseif (isset($_POST['Home'])) {
header("location: Receptionist.php");
}

		$Searching2 = "SELECT * FROM medical_aid WHERE CODE = '$MEDICALAIDNAME' ";
       $SearchingResults2=mysqli_query($con,$Searching2);
	   $rows2=mysqli_fetch_array($SearchingResults2);
    $MEDICALAIDNAME = $rows2['NAME'];
	$MEDICALAIDCODE = $rows2['CODE'];


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
<button class="tablinks" onclick="window.location.href='Receptionist.php'" >RIS</button>
<button class="tablinks"><a style="text-decoration: none; color:white;" href="logout.php">logout</a></button>
<button style="width: 30%;"></button>
<i class="fa fa-search" id ="left" style="color: white;"></i><button class="tablinks" onclick="openCity(event, 'ADD')">ADD</button>
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
  <th colspan="3" style="color: white;">PATIENT <?php echo strtoupper(" ".$NAME." ".$SURNAME." ".$var2);?></th>
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
        <td><input type="text" name="PATIENSTID" value="<?php echo $PATIENTSID3;?>" style="width: 142px;border-radius: 20px 20px 20px 20px;padding-left: 20px;padding-right: 20px;border: 1px solid white;background: black;color: white;text-align: center;" readonly></td>
        <td><input type="text" name="ACCESSION" value="<?php echo $var2.$ACCESSION;?>" style="width: 152px;border-radius: 20px 20px 20px 20px;padding-left: 20px;padding-right: 20px;border: 1px solid white;background: black;color: white;text-align: center;"readonly></td>
        <td><input type="text" name="MRN" value="<?php echo $MRN;?>" style="width: 142px;border-radius: 20px 20px 20px 20px;padding-left: 20px;padding-right: 20px;border: 1px solid white;background: black;color: white;text-align: center;"readonly></td>

  </tr>
    </table>
  <table>
   <tr>
	<td colspan="1" style="text-align: center;color: white;">Procedure/Exam</td>
	<td style="text-align: center;color: white;">Ref Doctor</td>
  </tr>
  <tr><td colspan="1">
		<select name="PROCEDURE" style="width: 400px; text-align: center;border-radius: 20px 20px 20px 20px;padding-left: 35px;border: 1px solid white;background: black;color: white;text-align: center;" required>
		<option value="">Select Patients Procedure</option>
		<?php
		$Searching1 = "SELECT * FROM exams ORDER BY NAME ASC ";
       $SearchingResults1=mysqli_query($con,$Searching1);
       if($SearchingResults1->num_rows > 0){
  while ($rows=mysqli_fetch_array($SearchingResults1)) {
    $PROCEDURENAME = $rows['NAME'];
	echo'<option value="'.$PROCEDURENAME.'">'.$PROCEDURENAME.'</option>';

}
}
		?>
		    </select>
		</td>
		<td>
		<select name="PHYSICIAN" id="PHYSICIAN" style=" width: 250px; text-align: center;border-radius: 20px 20px 20px 20px;padding-left: 10px;margin-left: 20px;border: 1px solid white;background: black;color: white;"required>
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
		   echo'<center><label style="color:white;">Studies Added Today</label></center><br>';
		   echo'<textarea style="width: 500px;text-align:center;height:200px;">';
  while ($rows=mysqli_fetch_array($SearchingResults1)) {
			$PROCEDURE = $rows['PatientsProcedure'];
			echo $PROCEDURE."\n";

            }} ?>
  </textarea></center></td>
  </tr></table>
  <table>
   <tr><td><br></td></tr>
  <tr>
  <td>
  <?php $Searching1 = "SELECT * FROM study WHERE PatientsID = '$MRN'";
       $SearchingResults1=mysqli_query($con,$Searching1);
       if($SearchingResults1->num_rows > 0){
		   echo'<center><label style="color:white;">Studies Added Total</label></center><br>';
		   echo'<textarea style="width: 500px;text-align:center;height:200px;">';
  while ($rows=mysqli_fetch_array($SearchingResults1)) {
			$PROCEDURE = $rows['PatientsProcedure'];
			echo $PROCEDURE."\n";

            }} ?>
  </textarea></center></td>
  </tr></table>
</CENTER>
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
        $('#MS1').click(function(){
            $("Select[name='MEDICALAIDNAME']").attr("disabled", false);
            document.getElementById("MS").focus();
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
        $('#RTM1').click(function(){
            $("Select[name='RELATIONTOMEMBER']").attr("disabled", false);
            document.getElementById("RTM").focus();
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
