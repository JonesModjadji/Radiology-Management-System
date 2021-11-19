<?php
session_start();
ob_start();

echo $_SESSION['suserbranch'];
$var2 = ob_get_clean();
include("Connection.php");

            $ID = $_GET['ID'];
			$ACC = $_GET['ACC'];
			$PHYSICIAN = "";
			$SCHEDULE = "";
			$PRIORITY = "";
			$RAD = "";
			if (isset($_POST['Back'])) {


             $qry=mysqli_query($con,"UPDATE study SET Status='Dictated'  WHERE Accession = '$ACC'");
			header("location: Typist.php");;
  }
  if (isset($_POST['Back2'])) {


             $qry=mysqli_query($con,"UPDATE study SET Status='Authorize'  WHERE Accession = '$ACC'");
			header("location: Radiologist.php");;
  }


            if (isset($_POST['Save'])) {
              $NOTE1 = $_POST['NOTE1'];
			  $NOTE2 = $_POST['NOTE2'];
			  $RAD = $_POST['PHYSICIAN'];


             $qry=mysqli_query($con,"UPDATE study SET Note = '$NOTE1',Note2 = '$NOTE2',AssignedRadiologist='$RAD'  WHERE Accession = '$ACC'");

    header("location: Update1.php?ID=$ID&NOTE=$NOTE&PHYSICIAN=$PHYSICIAN&SCHEDULE=$SCHEDULE&PRI=$PRIORITY&RAD=$RAD&ACC=$ACC");
  }
       $Searching1 = "SELECT * FROM $var2,study WHERE $var2.MRN = '$ID' AND study.Accession= '$ACC'";
       $SearchingResults1=mysqli_query($con,$Searching1);
       if($SearchingResults1->num_rows > 0){
  while ($rows=mysqli_fetch_array($SearchingResults1)) {
    $MRN1 = $rows['MRN'];
			$ACC1= $rows['Accession'];
			$NAME1 = $rows['Name'];
			$SURNAME1 = $rows['Surname'];
            $EMAIL1 = $rows['EmailAddress1'];
            $NOTE1 = $rows['Note'];
			$NOTE2 = $rows['Note2'];
            $CITY1 = $rows['City'];
            $TOWN1 = $rows['TownSuburb'];
            $POSTALCODE1 = $rows['PostalCode'];
            $ALLERGY1 =$rows['Allergies'];
            $SEX1 = $rows['Sex'];
            $MEDICALSCHEME1 = $rows['MedicalAid'];
            $BRANCH1 = $rows['Branch'];
            $PATIENTSPROCEDURE1 = $rows['PatientsProcedure'];
            $PRIORITY1 = $rows['Priority'];
			$ASSIGNEDRADIOGRAPHER1 = $rows['AssignedRadiographer'];
			$ASSIGNEDRADIOLOGIST1 = $rows['AssignedRadiologist'];
			$Rec1 = $rows['Recording1'];
    $Rec2 = $rows['Recording2'];
    $Rec3 = $rows['Recording3'];
    $Rec4 = $rows['Recording4'];
    $Rec5 = $rows['Recording5'];
    $Rec6 = $rows['Recording6'];
    $Rec7 = $rows['Recording7'];
    $Rec8 = $rows['Recording8'];
    $Rec9 = $rows['Recording9'];
    $Rec10 = $rows['Recording10'];
}
}
if (isset($_POST['Cancel'])) {
	 $NOTE1 = $_POST['NOTE1'];
			  $NOTE2 = $_POST['NOTE2'];
			  $RAD = $_POST['PHYSICIAN'];


             $qry=mysqli_query($con,"UPDATE study SET Note = '$NOTE1',Note2 = '$NOTE2',AssignedRadiologist='$RAD'  WHERE Accession = '$ACC'");

	 $Dictated = "Dictated";
	 $Searching1 = "SELECT * FROM study WHERE PatientsID = '$ID' AND Status ='Dictated' OR Status ='Authorizing'  ";
	$SearchingResults1=mysqli_query($con,$Searching1);
	$rows1=mysqli_num_rows($SearchingResults1);
	 if($rows1>0){
    $qry=mysqli_query($con,"UPDATE study SET Status='$Dictated',Cancelled='red'  WHERE Accession = '$ACC'");
  header("location: Typist.php");
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
<title>Typist1</title>
<link href="Css/style.css" rel="stylesheet" type="text/css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<link rel="stylesheet" href="https://fonts.google.com/specimen/Montserrat"type='text/css'>
<link href='http://fonts.googleapis.com/css?family=Montserrat' rel='stylesheet' type='text/css'>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script src="https://cdn.ckeditor.com/4.13.1/standard/ckeditor.js"></script>
</head>
<body>
<div id="SEARCHED" class="tabcontent" style="display:block;">
  <form action="" method="post" enctype="multipart/form-data">
 <section class="display">
  <CENTER >
<table>
      <br>
      <tr>
        <td colspan="5"><hr style="border: 1px solid red;"></td>
      </tr>
  <tr>
        <td><label style="width: 142px;text-align: center;color: white;"><?php echo $MRN1;?></label></td>
        <td></td>
        <td></td>
        <td></td>
        <td></td>
  </tr>
  <tr>
     <tr>
        <td></td>
        <td></td>
        <td></td>
        <td></td>
        <td></td>
  </tr>
  <tr>
    <td>
      <button type="button" onclick = "Hide1()">PATIENTS</button>
      <button type="button" onclick = "Hide2()">PATIENTS DONE</button>
    </td>
    <td  style="text-decoration: underline;width: 500px;text-align: center;color: white;">ORDER INFORMATION</td>
    <td style="text-decoration: underline;text-align: right;width: 200px;color: white;">OPTIONS</td>
  </tr>
  <tr>
        <td></td>
        <td></td>
        <td></td>
  </tr>
  <tr>
        <td >
          <div id="Hide1" style="display: block;">
    <table border="1px" style="width: 270px;;padding:4px;position: absolute;margin-top: -35px;border: 2px solid white;border-radius: 7px;font-size: 13px;color: white;">
      <tr>
        <th style="text-align: center;border: none;"><b>PATIENT</b></th>
        <th style="text-align: center;border: none;"><b>PROCEDURE</b></th>
      </tr>
      <tr>
        <br>
      </tr>
           <?php
            $Searching1 = "SELECT * FROM study WHERE Status ='Dictated' LIMIT 5 ";
       $SearchingResults1=mysqli_query($con,$Searching1);
       if($SearchingResults1->num_rows > 0){
  while ($rows=mysqli_fetch_array($SearchingResults1)) {
    $PATIENTSID = $rows['PatientsID'];
	   $PATIENTSPROCEDURE= $rows['PatientsProcedure'];
     $Searching2 = "SELECT * FROM $var2  WHERE MRN ='$PATIENTSID' ";
  $SearchingResults2=mysqli_query($con,$Searching2);
	$rows2=mysqli_fetch_array($SearchingResults2);
		$NAME = $rows2['Name'];
	$SURNAME = $rows2['Surname'];

     echo '

     <tr>
        <td style="text-align: center;">'.$NAME.' '.$SURNAME.'</td>
        <td style="text-align: center;">'.$PATIENTSPROCEDURE.'</td>
      </tr>
    ';
}
}

  ?>
          </table>
          </div>
          <div id="Hide2" style="display: none;">
             <table border="1px" style="width: 270px;padding:4px;position: absolute;margin-top: -35px;border: 2px solid white;border-radius: 7px;font-size: 13px;color: white;">
      <tr>
        <th style="text-align: center;border: none;"><b>PATIENT</b></th>
        <th style="text-align: center;border: none;"><b>PROCEDURE</b></th>
      </tr>
      <tr>
        <br>
      </tr>
           <?php
            $Searching1 = "SELECT * FROM study WHERE  Status ='Done' LIMIT 5";
       $SearchingResults1=mysqli_query($con,$Searching1);
       if($SearchingResults1->num_rows > 0){
  while ($rows=mysqli_fetch_array($SearchingResults1)) {
	  $PATIENTSID = $rows['PatientsID'];
	   $PATIENTSPROCEDURE= $rows['PatientsProcedure'];
     $Searching2 = "SELECT * FROM $var2";
  $SearchingResults2=mysqli_query($con,$Searching2);
	$rows2=mysqli_fetch_array($SearchingResults2);
		$NAME = $rows2['Name'];
	$SURNAME = $rows2['Surname'];
	$SEX = $rows2['Sex'];

     echo '

     <tr>
        <td style="text-align: center;">'.$NAME.' '.$SURNAME.'</td>
        <td style="text-align: center;">'.$PATIENTSPROCEDURE.'</td>
      </tr>
    ';
}
}

  ?>
          </table>
          </div>

        </td>
        <td>
          <br>
          <div style="float: left;width: 50%;color: white;margin-left:15%;">
          <label>Name &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp :</label> <label>&nbsp <?php echo ucfirst($NAME1) ;?></label><br>
          <label>Surname &nbsp&nbsp&nbsp&nbsp :</label> <label>&nbsp <?php echo ucfirst($SURNAME1) ;?></label><br>
          <label>Sex &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp :</label> <label>&nbsp <?php echo $SEX1 ;?></label><br>
          <label>Allergy &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp :</label> <label>&nbsp <?php echo ucfirst($ALLERGY1) ;?></label><br>
		  <label>Priority &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp :</label> <label><br><?php echo $PRIORITY1 ;?></label><br>
		  <label>Radiographer &nbsp :</label> <label><br> <?php echo ucfirst($ASSIGNEDRADIOGRAPHER1) ;?></label><br>
          </div>

          <div style="float: right;width: 35%;color: white;">
          <label>MRN  :</label> <label>&nbsp <?php echo $MRN1 ;?></label><br>
          <label>Accession &nbsp&nbsp :</label> <label>&nbsp <?php echo $ACC1;?></label><br>
          <label>Procedure &nbsp :</label> <label><br><?php echo $PATIENTSPROCEDURE1;?></label><br>
		  <label>Radiologist &nbsp:</label><br><select name="PHYSICIAN" id="PHYSICIAN" style=" width: 200px; text-align: center;border-radius: 20px 20px 20px 20px;padding-left: 10px;border: 1px solid white;background: black;color: white;">
          <option value="<?php echo $ASSIGNEDRADIOLOGIST1 ;?>"><?php echo ucfirst($ASSIGNEDRADIOLOGIST1) ;?></option>
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
    </select><br>
          </div>
    </td>
        <td style="text-align: right;color: red;">
          <a href="#" style="color: red;">ORDER INFORMATION</a><br>
          <a href="#" style="color: red;">OPEN PACS</a><br>
          <label>ICD &nbsp :</label> <label></label><br>
          <label>Referrer ICD &nbsp :</label> <label></label><br>
          <label>Procedure ICD &nbsp :</label> <label></label><br>
        </td>
  </tr>
  <tr>
        <td><br></td>
        <td><br></td>
        <td><br></td>
  </tr>

      <tr>
        <td style="width: 300px;"></td>
    <td  style="width: 500px;text-align: center;">
    </td>
    <td style="width: 200px;"></td>
      </tr>
       <tr>
        <td style="width: 300px;"><form action="" method="post"  enctype="multipart/form-data">
      <textarea style="width: 200px;height: 200px;margin-top: -160px;margin-left:25px;" name="NOTE1"><?php echo $NOTE1; ?>
      </textarea></td>

    <td  style="width: 500px;text-align: left;">
      <textarea style="width: 500px;height: 200px;margin-top: -380px;margin-right:25px;" name="NOTE2"><?php echo $NOTE2; ?>
      </textarea>

    </td>
    <td style="width: 200px;">
        <div style="">
          <?php

     echo '
     <table>
     <tr>
        <td style="text-align: center;"><audio controls>
  <source src="Recordings/'.$Rec1.'" type="audio/ogg">
  <source src="Recordings/'.$Rec1.'" type="audio/mpeg">
Your browser does not support the audio element.
</audio></td>
      </tr>
      <tr>
        <td style="text-align: center;"><audio controls>
  <source src="Recordings/'.$Rec2.'" type="audio/ogg">
  <source src="Recordings/'.$Rec2.'" type="audio/mpeg">
Your browser does not support the audio element.
</audio></td>
      </tr>
      <tr>
        <td style="text-align: center;"><audio controls>
  <source src="Recordings/'.$Rec3.'" type="audio/ogg">
  <source src="Recordings/'.$Rec3.'" type="audio/mpeg">
Your browser does not support the audio element.
</audio></td>
      </tr>
      <tr>
        <td style="text-align: center;"><audio controls>
  <source src="Recordings/'.$Rec4.'" type="audio/ogg">
  <source src="Recordings/'.$Rec4.'" type="audio/mpeg">
Your browser does not support the audio element.
</audio></td>
      </tr>
      <tr>
        <td style="text-align: center;"><audio controls>
  <source src="Recordings/'.$Rec5.'" type="audio/ogg">
  <source src="Recordings/'.$Rec5.'" type="audio/mpeg">
Your browser does not support the audio element.
</audio></td>
      </tr>
      <tr>
        <td style="text-align: center;"><audio controls>
  <source src="Recordings/'.$Rec6.'" type="audio/ogg">
  <source src="Recordings/'.$Rec6.'" type="audio/mpeg">
Your browser does not support the audio element.
</audio></td>
      </tr>
      <tr>
        <td style="text-align: center;"><audio controls>
  <source src="Recordings/'.$Rec7.'" type="audio/ogg">
  <source src="Recordings/'.$Rec7.'" type="audio/mpeg">
Your browser does not support the audio element.
</audio></td>
      </tr>
      <tr>
        <td style="text-align: center;"><audio controls>
  <source src="Recordings/'.$Rec8.'" type="audio/ogg">
  <source src="Recordings/'.$Rec8.'" type="audio/mpeg">
Your browser does not support the audio element.
</audio></td>
      </tr>
      <tr>
        <td style="text-align: center;"><audio controls>
  <source src="Recordings/'.$Rec9.'" type="audio/ogg">
  <source src="Recordings/'.$Rec9.'" type="audio/mpeg">
Your browser does not support the audio element.
</audio></td>
      </tr>
      <tr>
        <td style="text-align: center;"><audio controls>
  <source src="Recordings/'.$Rec10.'" type="audio/ogg">
  <source src="Recordings/'.$Rec10.'" type="audio/mpeg">
Your browser does not support the audio element.
</audio></td>
      </tr>
      </table>
    ';
?>
        </div>
    </td>
      </tr>
      <tr>
        <td></td>
        <td></td>
        <td>
        </td>
      </tr>
</table>
<table style="margin-top: -100px;margin-bottom: 250px;">
  <tr>
    <td><div class="hover">
 <button class="input-group-text" type="submit" name="Save" style="color: white;margin-left:-30px;"><i class="fa fa-floppy-o"></i> Save/Complete</button>
</div></td>
<td><div class="hover">
	<button class="input-group-text" type="submit" name="Back2" style="color: white;"><i class="fa fa-times"></i> Back To Radiologist</button>
</div></td>
<td><div class="hover">
	<button class="input-group-text" type="submit" name="Back" style="color: white;"><i class="fa fa-times"></i> Back To Typist</button>
</div></td>
    <td><div class="hover">
	<button class="input-group-text" type="submit" name="Cancel" style="color: white;"><i class="fa fa-times"></i> Pause Study</button>
</div></td>
  </tr>
</table>
</CENTER>
  </section>
</div>
</form>

<script>
  CKEDITOR.replace( 'NOTE2' );
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
  CKEDITOR.replace( 'NOTE2' );
function Hide1() {
  var x = document.getElementById("Hide1");
  var y = document.getElementById("Hide2");
  var z = document.getElementById("Hide3");
  if (x.style.display === "none") {
    x.style.display = "block";
    y.style.display = "none";
    z.style.display = "none";
  } else {
    x.style.display = "none";
  }
}
function Hide2() {
  var x = document.getElementById("Hide1");
  var y = document.getElementById("Hide2");
  var z = document.getElementById("Hide3");
  if (y.style.display === "none") {
    x.style.display = "none";
    y.style.display = "block";
    z.style.display = "none";
  } else {
    y.style.display = "none";
  }
}
function Hide3() {
  var x = document.getElementById("Hide1");
  var y = document.getElementById("Hide2");
  var z = document.getElementById("Hide3");
  if (z.style.display === "none") {
    x.style.display = "none";
    y.style.display = "none";
    z.style.display = "block";
  } else {
    z.style.display = "none";
  }
}
</script>
</body>
<script src="Javascript/jquery-1.11.0.js"></script>
<script src="Javascript/effects.js"></script>
</html>
