<?php
session_start(); 
$con = mysqli_connect("localhost", "root", "", "ris");
$acc =$_GET['ACC'];
$PatientID = $_GET['PatientsID'];
$MRN = $_GET['MRN'];
$array = explode(';',$acc);
$dbname = 'ris';
	   $sql = "SHOW TABLES FROM $dbname";
	   $result = mysqli_query($con,$sql);
	 while ($row = mysqli_fetch_row($result)) {
		 ob_start();
echo "{$row[0]}";
$var = ob_get_clean();
$sql = "SELECT * FROM $var,study WHERE $var.MRN = '$MRN' AND study.PatientsID='$MRN' ";
$result=mysqli_query($con,$sql);
if($result==true){
while ($rows=mysqli_fetch_array($result)) {
		 $MRN1 = $rows['MRN'];
		 $ACC= $rows['Accession'];
		 $NAME = $rows['Name'];
		 $SURNAME = $rows['Surname'];
		 $ID = $rows['IdentityNumber2'];
		 $EMAIL= $rows['EmailAddress1'];
		 $NOTE = $rows['Note'];
		 $CITY = $rows['City'];
		 $TOWN = $rows['TownSuburb'];
		 $POSTALCODE = $rows['PostalCode'];
		 $ALLERGY =$rows['Allergies'];
		 $SEX = $rows['Sex'];
		 $MEDICALSCHEME = $rows['MedicalAid'];
		 $BRANCH = $rows['Branch'];
		 $PATIENTSPROCEDURE = $rows['PatientsProcedure'];
		 $PRIORITY = $rows['Priority'];
		 $DOB = $rows['DOB'];
		 $PhoneNumber = $rows['PhoneNumber1'];
		 $ASSIGNEDRADIOGRAPHER = $rows['AssignedRadiographer'];
		 $ASSIGNEDRADIOLOGIST = $rows['AssignedRadiologist'];

}
	 }elseif($result==false){
        echo "";
}}


 ?>
 <!DOCTYPE html >
 <html>
 <head><title>Radiology Jobcard :  <?php echo $MRN; ?></title>
 <meta http-equiv="Content-Type" content="text/html; charset=tis-620" />
 <link href="css/main.css" rel="stylesheet" type="text/css" />
 <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
 <link rel="stylesheet" href="awesome/css/css/font-awesome.min.css"></head>
 <div class="Content1">
 <div class="tab" style="background: black;border: 2px solid black;border-bottom: 2px solid red;">
 <button class="tablinks" onclick="openCity(event, 'RIS')" style="color: white;">Go Back RIS</button>

 </div>
 <script>
 function printpage()
   {
   window.print()
   }

 </script>
 <?php
echo $BRANCH;

$jc= '<body style="padding-left:10px;padding-right:10px">
<br>
<div class="row">

<div class="col-md-6"><img style="margin-left:10px" src="images/novi.png" ></div>
<div style="margin-top:20px" class="col-md-6">
<div> Radiologyc</div>
<div> 25 12th Myfer</div>
<div>Linksfield</div>
<div>Gauteng</div>
<div>2019</div>

</div>
</div>

<div>
<hr>
<h4>Patient Details</h4>
<div class="row">

<div class="col-md-3">
<div class="input-group mb-2 mr-sm-2">
    <div class="input-group-prepend">
      <div class="input-group-text">Date/Datum</div>
    </div>
    <input type="text" class="form-control" id="inlineFormInputGroupUsername2"  value=" ">
</div>
</div>

<div class="col-md-3">
<div class="input-group mb-2 mr-sm-2">
    <div class="input-group-prepend">
      <div class="input-group-text">Branch/Tak</div>
    </div>
    <input type="text" class="form-control" id="inlineFormInputGroupUsername2"  value="'.$BRANCH.'">
</div>
</div>

<div class="col-md-3">
<div class="input-group mb-2 mr-sm-2">
    <div class="input-group-prepend">
      <div class="input-group-text">Captured By</div>
    </div>
    <input type="text" class="form-control" id="inlineFormInputGroupUsername2"  value="">
</div>
</div>

<div class="col-md-3">
<div class="input-group mb-2 mr-sm-2">
    <div class="input-group-prepend">
      <div class="input-group-text">Visit Number</div>
    </div>
    <input type="text" class="form-control" id="inlineFormInputGroupUsername2" placeholder="" value="'.$ACC.'">
</div>
</div>

</div>

<div class="row">

<div class="col-md-6">
<div class="input-group mb-2 mr-sm-2">
    <div class="input-group-prepend">
      <div class="input-group-text">Surname</div>
    </div>
    <input type="text" class="form-control" id="inlineFormInputGroupUsername2" placeholder="" value="'.$SURNAME.'">
</div>
</div>

<div class="col-md-2">
<div class="input-group mb-2 mr-sm-2">
    <div class="input-group-prepend">
      <div class="input-group-text">Initials</div>
    </div>
    <input type="text" class="form-control" id="inlineFormInputGroupUsername2" placeholder="" value="">
</div>
</div>

<div class="col-md-2">
<div class="input-group mb-2 mr-sm-2">
    <div class="input-group-prepend">
      <div class="input-group-text">Title</div>
    </div>
    <input type="text" class="form-control" id="inlineFormInputGroupUsername2" placeholder="" value="">
</div>
</div>

<div class="col-md-2">
<div class="input-group mb-2 mr-sm-2">
    <div class="input-group-prepend">
      <div class="input-group-text">Language</div>
    </div>
    <input type="text" class="form-control" id="inlineFormInputGroupUsername2" placeholder="" value="">
</div>
</div>
</div>

<div class="row">

<div class="col-md-3">
<div class="input-group mb-2 mr-sm-2">
    <div class="input-group-prepend">
      <div class="input-group-text">Frist Names</div>
    </div>
    <input type="text" class="form-control" id="inlineFormInputGroupUsername2" placeholder="" value="'.$NAME.'">
</div>
</div>



<div class="col-md-3">
<div class="input-group mb-2 mr-sm-2">
    <div class="input-group-prepend">
      <div class="input-group-text">DOB</div>
    </div>
    <input type="text" class="form-control" id="inlineFormInputGroupUsername2" placeholder="" value="'.$DOB.'">
</div>
</div>

<div class="col-md-3">
<div class="input-group mb-2 mr-sm-2">
    <div class="input-group-prepend">
      <div class="input-group-text">AGE</div>
    </div>
    <input type="text" class="form-control" id="inlineFormInputGroupUsername2" placeholder="" value="">
</div>
</div>


</div>

<div class="row">

<div class="col-md-3">
<div class="input-group mb-2 mr-sm-2">
    <div class="input-group-prepend">
      <div class="input-group-text">WCA</div>
    </div>
    <input type="text" class="form-control" id="inlineFormInputGroupUsername2" placeholder="" value="">
</div>
</div>

<div class="col-md-3">
<div class="input-group mb-2 mr-sm-2">
    <div class="input-group-prepend">
      <div class="input-group-text">Injury Date</div>
    </div>
    <input type="text" class="form-control" id="inlineFormInputGroupUsername2" placeholder=" " value="">
</div>
</div>

<div class="col-md-3">
<div class="input-group mb-2 mr-sm-2">
    <div class="input-group-prepend">
      <div class="input-group-text">Claim No:</div>
    </div>
    <input type="text" class="form-control" id="inlineFormInputGroupUsername2" placeholder="" value="">
</div>
</div>
<div class="col-md-3">
<div class="input-group mb-2 mr-sm-2">
    <div class="input-group-prepend">
      <div class="input-group-text">Work / Home No:</div>
    </div>
    <input type="text" class="form-control" id="inlineFormInputGroupUsername2" placeholder="" value="'.$PhoneNumber.' /">
</div>
</div>


</div>
<hr>
<h4>Member Details</h4>
<div class="row">

<div class="col-md-4">
<div class="input-group mb-2 mr-sm-2">
    <div class="input-group-prepend">
      <div class="input-group-text">Email</div>
    </div>
    <input type="text" class="form-control" id="inlineFormInputGroupUsername2" placeholder="" value="'.$EMAIL.'">
</div>
</div>
</div>

<div class="row">

<div class="col-md-3">
<div class="input-group mb-2 mr-sm-2">
    <div class="input-group-prepend">
      <div class="input-group-text">Surname</div>
    </div>
    <input type="text" class="form-control" id="inlineFormInputGroupUsername2" placeholder="" value="'.$SURNAME.'">
</div>
</div>

<div class="col-md-3">
<div class="input-group mb-2 mr-sm-2">
    <div class="input-group-prepend">
      <div class="input-group-text">Initials</div>
    </div>
    <input type="text" class="form-control" id="inlineFormInputGroupUsername2" placeholder="" value="">
</div>
</div>

<div class="col-md-3">
<div class="input-group mb-2 mr-sm-2">
    <div class="input-group-prepend">
      <div class="input-group-text">Title</div>
    </div>
    <input type="text" class="form-control" id="inlineFormInputGroupUsername2" placeholder="" value="">
</div>
</div>

<div class="col-md-3">
<div class="input-group mb-2 mr-sm-2">
    <div class="input-group-prepend">
      <div class="input-group-text">ID Number</div>
    </div>
    <input type="text" class="form-control" id="inlineFormInputGroupUsername2" placeholder="" value="'.$ID.'">
</div>
</div>
</div>

<div class="row">

<div class="col-md-6">
<div class="input-group mb-2 mr-sm-2">
    <div class="input-group-prepend">
      <div class="input-group-text">Postal Address</div>
    </div>
    <textarea style="height:250px" type="text" class="form-control" id="inlineFormInputGroupUsername2" placeholder="" >
	PO Box
	'.$CITY.'
	'.$TOWN.'
	'.$POSTALCODE.'
	</textarea>
</div>
</div>

<div class="col-md-6" >
<div class="input-group mb-2 mr-sm-2">
    <div class="input-group-prepend">
      <div class="input-group-text">Residential Address</div>
    </div>
    <textarea style="height:250px" type="text" class="form-control" id="inlineFormInputGroupUsername2" placeholder="" >
		'.$CITY.'
		'.$TOWN.'
		'.$POSTALCODE.'
	</textarea>
</div>
</div>

</div>


<div class="row">

<div class="col-md-6">
<div class="input-group mb-2 mr-sm-2">
    <div class="input-group-prepend">
      <div class="input-group-text">Patient Addresses</div>
    </div>
    <textarea type="text" style="height:250px" class="form-control" id="inlineFormInputGroupUsername2" placeholder="" value="">
		'.$CITY.'
		'.$TOWN.'
		'.$POSTALCODE.'
	</textarea>
</div>
</div>

<div class="col-md-6">
<h4>Medical Aid details</h4>
<div class="input-group mb-2 mr-sm-2">
    <div class="input-group-prepend">
      <div class="input-group-text">Med Aid Code</div>
    </div>
    <input type="text" class="form-control" id="inlineFormInputGroupUsername2" placeholder="" value="">
</div>
<div class="input-group mb-2 mr-sm-2">
    <div class="input-group-prepend">
      <div class="input-group-text">Med Aid Name</div>
    </div>
    <input type="text" class="form-control" id="inlineFormInputGroupUsername2" placeholder="" value="">
</div>
<div class="input-group mb-2 mr-sm-2">
    <div class="input-group-prepend">
      <div class="input-group-text">Med Aid Ref No</div>
    </div>
    <input type="text" class="form-control" id="inlineFormInputGroupUsername2" placeholder="" value="">
</div>
<div class="input-group mb-2 mr-sm-2">
    <div class="input-group-prepend">
      <div class="input-group-text">Ref Doctor</div>
    </div>
    <input type="text" class="form-control" id="inlineFormInputGroupUsername2" placeholder="" value="">
</div>
</div>
</div>

<div class="row">



<div class="col-md-12">
<p>I hereby give consent for the injection or other administration on any drugs or contrast medicine which may be necessary for the performance of the xray examination</p>
<div class="input-group mb-2 mr-sm-2">
    <div class="input-group-prepend">
      <div class="input-group-text">Allergies (specify)</div>
    </div>
    <input type="text" class="form-control" id="inlineFormInputGroupUsername2" placeholder="" value="'.$ALLERGY.'">
</div>
<div class="input-group mb-2 mr-sm-2">
    <div class="input-group-prepend">
      <div class="input-group-text">Asthma</div>
    </div>
    <input type="text" class="form-control" id="inlineFormInputGroupUsername2" placeholder="" value="">
</div>


</div>
</div>
<div class="row">



<div class="col-md-4">
<div class="input-group mb-2 mr-sm-2">
    <div class="input-group-prepend">
      <div class="input-group-text">Are you pregnant</div>
    </div>
    <input type="text" class="form-control" id="inlineFormInputGroupUsername2" placeholder="" value="">
</div>
</div>
<div class="col-md-4">
<div class="input-group mb-2 mr-sm-2">
    <div class="input-group-prepend">
      <div class="input-group-text">Signature</div>
    </div>
    <input type="text" class="form-control" id="inlineFormInputGroupUsername2" value="">
</div>
</div>
<div class="col-md-4">
<div class="input-group mb-2 mr-sm-2">
    <div class="input-group-prepend">
      <div class="input-group-text">Date</div>
    </div>
    <input type="text" class="form-control" id="inlineFormInputGroupUsername2"  value=""';
    echo $jc;
    echo DATE('Y-M-d');
echo '"></div>
</div>
</div>

<div class="row">

<div class="col-md-6">
<div class="input-group mb-2 mr-sm-2">
    <div class="input-group-prepend">
      <div class="input-group-text">Exam Notes</div>
    </div>
    <textarea type="text" style="height:250px" class="form-control" id="inlineFormInputGroupUsername2" placeholder="" value="'.$NOTE.'">'.$NOTE.'</textarea>
</div>
</div>

<div class="col-md-6">
<div class="input-group mb-2 mr-sm-2">
    <div class="input-group-prepend">
      <div class="input-group-text">Exam Notes</div>
    </div>
    <textarea type="text" style="height:250px" class="form-control" id="inlineFormInputGroupUsername2" placeholder="" value="'.$NOTE.'">'.$PATIENTSPROCEDURE.'</textarea>
</div>
</div>

</div>

<div class="input-group mb-2 mr-sm-2">
    <div class="input-group-prepend">
      <div class="input-group-text">Radiographer</div>
    </div>
    <input type="text" class="form-control" id="inlineFormInputGroupUsername2" placeholder="" value="'.$ASSIGNEDRADIOGRAPHER.'">
</div>
<div class="input-group mb-2 mr-sm-2">
    <div class="input-group-prepend">
      <div class="input-group-text">Radiologist</div>
    </div>
    <input type="text" class="form-control" id="inlineFormInputGroupUsername2" placeholder="" value="'.$ASSIGNEDRADIOLOGIST.'">
</div>
<div class="input-group mb-2 mr-sm-2">
    <div class="input-group-prepend">
      <div class="input-group-text">Consumables</div>
    </div>
    <input type="text" class="form-control" id="inlineFormInputGroupUsername2" placeholder="" value="">
</div>
</div>
</div>
<input type="button" value="Print Jobcard" onclick="printpage()" />
</body>'


?>
