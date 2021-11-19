<?php
date_default_timezone_set('Africa/Johannesburg');
include("Connection.php");
			$SESSIONID=$_GET['SESSIONID'];
			$MRN=$_GET['MRN'];
			$PATIENTSID=$_GET['PatientsID'];
			$Branch=$_GET['Branch'];
			$PHYSICIAN="";
			$RECEPTIONIST="";
			$EXAMDATE="";
			$DATE=date("Y/m/d");
			$DATE2 = date('Y-m-d\TH:i'); 
			$RECEPTIONIST ="";
			$REFDOCTOR ="";
			$REFDOCTOR2 ="";
            $Searching1 = "SELECT * FROM $Branch WHERE SESSIONID = '$SESSIONID' AND MRN = '$MRN'";
       $SearchingResults1=mysqli_query($con,$Searching1);
       if($SearchingResults1->num_rows > 0){
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

}
}
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
 $sql1 = "UPDATE $Branch SET AccIndex ='$ACCINDEX'  WHERE PatientsID = '$PATIENTSID'";

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

elseif (isset($_POST['Home'])) {
	 $sql1 = "UPDATE $Branch SET AccIndex2 ='Done'  WHERE PatientsID = '$PATIENTSID'";
	  $results2 = mysqli_query($con,$sql1,);
	   if ($results2) {
	header("location: Receptionist.php");
exit;
 }
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

 $sql1 = "UPDATE patients SET Name ='$NAME',Surname ='$SURNAME',Name2 ='$NAME2',Surname2 ='$SURNAME2',IdentityNumber ='$IDNUMBER',
 IdentityNumber2 ='$IDNUMBER2',PhoneNumber1 ='$PHONENUMBER1',PhoneNumber2 ='$PHONENUMBER2',Allergies ='$ALLERGY',City ='$CITY',
 TownSuburb ='$TS',PostalCode='$PC',City2 ='$CITY2',TownSuburb2 ='$TS2',PostalCode2='$PC2',MedicalAid='$MEDICALAIDNAME',
 MedicalAidNumber='$MEDICALAIDNUMBER',VatNumber='$VATNUMBER',RelationToMember='$RELATIONTOMEMBER',NumberOfDependants='$DEPENDANTS',Occupation='$OCCUPATION',
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
