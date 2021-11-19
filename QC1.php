<?php 
session_start();
ob_start();

echo $_SESSION['suserbranch'];
$var2 = ob_get_clean();
include("Connection.php");
            $ID = $_GET['ID'];
			$ACC = $_GET['ACC'];
            if (isset($_POST['Submit'])) {
               $NOTE= $_POST['NOTE'];
			   $PHYSICIAN = $_POST['PHYSICIAN'];
               $SCHEDULE= $_POST['SCHEDULE'];
               $PRIORITY=$_POST['PRIORITY'];
               $RAD= $_POST['PHYSICIAN2'];
        header("location: Update1.php?ID=$ID&NOTE=$NOTE&PHYSICIAN=$PHYSICIAN&SCHEDULE=$SCHEDULE&PRI=$PRIORITY&RAD=$RAD&ACC=$ACC");
      
}
       $Searching1 = "SELECT * FROM $var2,study WHERE $var2.MRN = '$ID' AND study.Accession= '$ACC'";
       $SearchingResults1=mysqli_query($con,$Searching1);
       if($SearchingResults1->num_rows > 0){
  while ($rows=mysqli_fetch_array($SearchingResults1)) {
            $MRN = $rows['MRN'];
			      $NAME = $rows['Name'];
			      $SURNAME = $rows['Surname'];
            $EMAIL = $rows['EmailAddress1'];
            $NOTE = $rows['Note'];
            $CITY = $rows['City'];
            $TOWN = $rows['TownSuburb'];
			      $IDNUMBER = $rows['IdentityNumber'];
            $POSTALCODE = $rows['PostalCode'];
            $ALLERGY =$rows['Allergies'];
            $SEX = $rows['Sex'];
            $MEDICALSCHEME = $rows['MedicalAid'];
            $BRANCH = $rows['Branch'];
            $PROCEDURE = $rows['PatientsProcedure'];
            $SESSIONID = $rows['SESSIONID'];
			      $ASSIGNEDRADIOGRAPHER = $rows['AssignedRadiographer'];
            if ($rows['Image1']) {
              $Img1 = 'Images/'.$rows['Image1'];
            }
            if ($rows['Image2']) {
              $Img2 = 'Images/'.$rows['Image2'];
            }
            if ($rows['Image3']) {
              $Img3 = 'Images/'.$rows['Image3'];
            }
            
            
}
}  
if (isset($_POST['Cancel'])) {
	 $QC = "QC";
	 $Searching1 = "SELECT * FROM study WHERE PatientsID = '$ID' AND Status ='QC Pending' AND Accession= '$ACC' ";
	$SearchingResults1=mysqli_query($con,$Searching1);
	$rows1=mysqli_num_rows($SearchingResults1);
	 if($rows1>0){
    $qry=mysqli_query($con,"UPDATE study SET Status='$QC'  WHERE Accession = '$ACC'"); 
  header("location: Radiographer.php");
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
<title>QC</title>
<link href="Css/style.css" rel="stylesheet" type="text/css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<link rel="stylesheet" href="https://fonts.google.com/specimen/Montserrat"type='text/css'>
<link href='http://fonts.googleapis.com/css?family=Montserrat' rel='stylesheet' type='text/css'>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
</head> 
<body>
<style>
img {
  border: 1px solid #ddd; 
  border-radius: 4px;  
  padding: 5px; 
  width: 20px;
  height: 20px; 
}
</style>
<div id="SEARCHED" class="tabcontent" style="display:block;border: 2px solid black;">
  <form action="" method="post" enctype="multipart/form-data">
 <section class="display">
  <CENTER style="height: 850px;">
<table>
      <br>
      <tr>
        <td colspan="5"><hr style="border: 1px solid red;"></td>
      </tr>
  <tr>
        <td><label style="width: 142px;text-align: center; color: white;"><?php echo $SESSIONID;?></label></td>
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
    <td style="text-decoration: underline; color: white;">QC Record Data</td>
    <td style="text-align: center;"></td>
    <td style="text-decoration: underline;text-align: center; color: white;">Exam Note</td>
    <td style="text-align: center;"></td>
    <td style="text-decoration: underline;text-align: right; color: white;">Document Upload Data</td>
  </tr>
  <tr>
        <td></td>
        <td></td>
        <td></td>
        <td></td>
        <td></td>  
  </tr>
  <tr>
        <td style="max-width: 200px;">
          <label style="color: white;">Name &nbsp;&nbsp; &nbsp;&nbsp; &nbsp;&nbsp; &nbsp;&nbsp; &nbsp;&nbsp; :  &nbsp;</label><br><label style="width: 142px; color: white;"><?php echo ucfirst($NAME.' '.$SURNAME) ;?></label>
          <br>
          <label style="color: white;">MRN  &nbsp;&nbsp; &nbsp;&nbsp;&nbsp; &nbsp; &nbsp;&nbsp; &nbsp;&nbsp; &nbsp;&nbsp;:  &nbsp;</label><br><label style="width: 142px; color: white;"><?php echo $MRN ;?></label>
          <br>
          <label style="color: white;">Sex  &nbsp; &nbsp; &nbsp; &nbsp;&nbsp; &nbsp; &nbsp; &nbsp; &nbsp;&nbsp; &nbsp;&nbsp;:  &nbsp;</label><label style="width: 142px; color: white;"><?php echo $SEX ;?></label>
          <br>
          <label style="color: white;">Accession  &nbsp; &nbsp; &nbsp; &nbsp;:  &nbsp;</label><label style="width: 142px; color: white;"><?php echo $ACC ;?></label>
          <br>
          <label style="color: white;">Procedure  &nbsp; &nbsp; &nbsp; &nbsp;:  &nbsp;</label><br><label style="width: 142px; color: white;"><?php echo $PROCEDURE ;?></label>
        </td>
        <td></td>
        <td>
          <br>
      <textarea rows = "10" style="margin-left:-10px;width: 100%;text-align: center;border-radius: 20px 20px 20px 20px;border: 1px solid white;background: black;color: white;text-align: center; " name = "NOTE" id="NOTE">
        <?php echo $NOTE;?>
      </textarea>
    </td>
        <td></td>
        <td>
           <label style=" color: white;">
            <a target="_blank" href="<?php echo $Img1; ?>">
              <img src="<?php echo $Img1; ?>" alt="no image" />
            </a>
              <br>
            <a target="_blank" href="<?php echo $Img2; ?>">
              <img src="<?php echo $img2; ?>" alt="no image" />
            </a>
              <br>
            <a target="_blank" href="<?php echo $Img3; ?>">
              <img src="<?php echo $Img3; ?>" alt="no image" />
            </a>  
              <br>
            </label>
              <br><br>
            <label style=" color: white;">Medical Aid Number :  &nbsp;</label><label style="width: 142px; color: white;">
            <br><?php echo $IDNUMBER; ?></label>
        </td>
  </tr>
  <tr>
        <td></td>
        <td></td>
        <td></td>
        <td></td>
        <td></td>  
  </tr>
  <tr>
        <td colspan="5"><hr  style="border: 1px solid red;"></td>
      </tr>
  <tr>
    <td style="text-decoration: underline; color: white;">Radiographer</td>
    <td style="text-align: center;"></td>
    <td style="text-align: center;"></td>
    <td style="text-align: center;"></td>
    <td style="text-align: center;"></td>
  </tr>
  <tr>
        <td>
    <select name="PHYSICIAN" id="PHYSICIAN" style=" width: 200px; text-align: center;border-radius: 20px 20px 20px 20px;padding-left: 10px;border: 1px solid white;background: black;color: white;">
          <option value="<?php echo $ASSIGNEDRADIOGRAPHER;?>"><?php echo $ASSIGNEDRADIOGRAPHER;?></option>
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
        <td></td>
        <td></td>
        <td></td>
        <td></td>
        <td></td>  
  </tr>
  <tr>
        <td colspan="5"><hr  style="border: 1px solid red;"></td>
      </tr>
      <tr>
        <td style="max-width: 142px;">
    <label style="text-decoration: underline; color: white;">Priority Reporting</label>
    <select name="PRIORITY" style="width: 200px;border-radius: 20px 20px 20px 20px;padding-left: 20px;padding-right: 20px;border: 1px solid white;background: black;color: white;text-align: center;">
    <option value="" disabled="disabled" ></option>
    <option value="No Report">No Report</option>
    <option value="<?php echo date('Y-m-d');?>">One Day &nbsp;<?php echo date('Y-m-d');?></option>
    <option value="<?php echo date('Y-m-d', strtotime("+1 day"));?>">Two Days <?php echo date('Y-m-d', strtotime("+1 day"));?></option>
    <option value="<?php echo date('Y-m-d', strtotime("+7 day"));?>">One Week <?php echo date('Y-m-d', strtotime("+7 day"));?></option>
    <option value="Urgent">Urgent</option>
    <option value="VIP">VIP</option>
    </select>
    <br><br>
    <label style=" color: white;">Schedule</label>
    <br>
    <input type="DATE" name="SCHEDULE" value="" style="width: 142px;border-radius: 20px 20px 20px 20px;padding-left: 20px;padding-right: 20px;border: 1px solid white;background: black;color: white;text-align: center;">
    <br><br>
    <label style="text-decoration: underline; color: white;">Assign Radiologist</label>
    <br>
     <select name="PHYSICIAN2" id="PHYSICIAN2" style=" width: 200px; text-align: center;border-radius: 20px 20px 20px 20px;padding-left: 10px;border: 1px solid white;background: black;color: white;">
          <option value="">Assign Radiologist</option>
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
<table>
  <tr>
    <td><div class="hover">
 <button class="input-group-text" type="submit" name="Submit" style=" color: white;"><i class="fa fa-search"></i> Submit</button>
</div></td>
    <td><div class="hover">
 <button class="input-group-text" type="submit" name="Cancel" style="color: white;"><i class="fa fa-times"></i> Cancel</button>
</div></td>
  </tr>
</table>
</CENTER>
  </section>
</div>
</form>

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