<?php 
include("Connection.php");
             $SESSIONID=$_GET['SESSIONID'];
			$MRN=$_GET['MRN'];
			$PATIENTSID=$_GET['PatientsID'];
			$ACCESSION1=$_GET['Accession'];
			$dbname = 'ris';
	   $sql = "SHOW TABLES FROM $dbname";
	   $result = mysqli_query($con,$sql);
	 while ($row = mysqli_fetch_row($result)) {
		 ob_start();
echo "{$row[0]}";
$var = ob_get_clean();
            $Searching1 = "SELECT * FROM study,$var WHERE study.PatientsID=$var.MRN AND $var.SESSIONID = '$SESSIONID' AND $var.MRN = '$MRN'AND study.Accession = '$ACCESSION1'";
       $SearchingResults1=mysqli_query($con,$Searching1);
       if($SearchingResults1==true){
  while ($rows=mysqli_fetch_array($SearchingResults1)) {
     $BRANCH = $rows['Branch'];
	 $ACCESSION = $rows['Accession'];
	 $NAME = $rows['Name'];
	 $SURNAME = $rows['Surname'];
	 $NAME2 = $rows['Name2'];
	 $SURNAME2 = $rows['Surname2'];
	 $MEDICALAID = $rows['MedicalAid'];
	 $VATNUMBER = $rows['VatNumber'];
	 $REFDOCTOR = $rows['RefDoctor'];
	 $PATIENTSPROCEDURE = $rows['PatientsProcedure'];
	 $NOTE2 = $rows['Note2'];
            }
	 } elseif($SearchingResults1==false){
        echo "";
}}
 $Searching1 = "SELECT * FROM branch WHERE PREFIX = '$BRANCH'";
       $SearchingResults1=mysqli_query($con,$Searching1);
       if($SearchingResults1->num_rows > 0){
  while ($rows=mysqli_fetch_array($SearchingResults1)) {
     $CODE = $rows['CODE'];
            }
} 
?>

<!doctype html>
<html>
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta http-equiv="X-UA-Compatible" content="IE=Edge">
<meta name="keywords" content="">
<meta name="description" content="">
<title>Report</title>
<link href="Css/style.css" rel="stylesheet" type="text/css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<link rel="stylesheet" href="https://fonts.google.com/specimen/Montserrat"type='text/css'>
<link href='http://fonts.googleapis.com/css?family=Montserrat' rel='stylesheet' type='text/css'>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
</head> 
<body>
<center> <input type="button" value="Print Report" style="border: 1px solid black;border-radius: 15px;background: white;
    "onclick="this.style.display='none';window.print();window.location.href='Receptionist.php';" /></center>
<table  style="width:100%;">
<tr>
<th colspan="4" style="font-size:15px;"><center>XXXXXXXXXXXXXXX XXXXXXXXXXXXXXXX XXXXXXXXXXXXXX</center></th>
</tr>
<tr>
<th colspan="4" style="font-size:10px;"><center>XXXXXXXXXXXXXXX XXXXXXXXXXXXXXXX XXXXXXXXXXXXXX</center></th>
</tr>
<tr>
<td colspan="4" style="font-size:15px;"><center>(<b>RADIOLOGIST</b>)</center></td>
</tr>
<tr>
<td colspan="4" style="font-size:10px;"><center>Practice Number : <?php echo $CODE;?></center></td>
</tr>
<tr><td><br></td></tr>
<tr>
<td style="font-size:10px;"><center>xxxxxxxxxxxxxxxxxxxx</center></td>
<td style="font-size:10px;"><center>xxxxxxxxxxxxxxxxxxxx</center></td>
<td style="font-size:10px;"><center>xxxxxxxxxxxxxxxxxxxx</center></td>
<td style="font-size:10px;"><center>xxxxxxxxxxxxxxxxxxxx</center></td>
</tr>
<tr>
<td style="font-size:10px;"><center>xxxxxxxxxxxxxxxxxxxx</center></td>
<td style="font-size:10px;"><center>xxxxxxxxxxxxxxxxxxxx</center></td>
<td style="font-size:10px;"><center>xxxxxxxxxxxxxxxxxxxx</center></td>
<td style="font-size:10px;"><center>xxxxxxxxxxxxxxxxxxxx</center></td>
</tr>
<tr>
<td style="font-size:10px;"><center>Tel(xxx) xxx xxxx</center></td>
<td style="font-size:10px;"><center>Tel(xxx) xxx xxxx</center></td>
<td style="font-size:10px;"><center>Tel(xxx) xxx xxxx</center></td>
<td style="font-size:10px;"><center>Tel(xxx) xxx xxxx</center></td>
</tr>
<tr><td><br></td></tr>
<tr>
<th></th>
<th></th>
<th style="font-size:10px;text-align:right;">ACC NO.</th>
<th style="font-size:10px;text-align:left;"><?php echo $ACCESSION?></th>
</tr>
<tr>
<th></th>
<th></th>
<th style="font-size:10px;text-align:right;">DATE</th>
<th style="font-size:10px;text-align:left;"><?php echo date("Y/m/d")?></th>
</tr>
<tr>
<th></th>
<th></th>
<th style="font-size:10px;text-align:right;">TIME</th>
<th style="font-size:10px;text-align:left;"><?php echo date("h:i:sa")?></th>
</tr>
<tr><td><br></td></tr>
<tr>
<td style="font-size:10px;"><center><b>PATIENT</b></center></td>
<td colspan="3" style="font-size:10px;">: <b><?php echo $NAME." ".$SURNAME;?></b></td>
</tr>
<tr>
<td style="font-size:10px;"><center><b>MEMBER</b></center></td>
<td colspan="3" style="font-size:10px;">: <b><?php echo $NAME2." ".$SURNAME2;?></b></td>
</tr>
<tr>
<td style="font-size:10px;"><center><b>MEDICAL AID</b></center></td>
<td colspan="3" style="font-size:10px;">: <b><?php echo $MEDICALAID." ".$VATNUMBER;?></b></td>
</tr>
<tr>
<td style="font-size:10px;"><center><b>REFFERING DOCTOR</b></center></td>
<td colspan="3" style="font-size:10px;">: <b><?php echo $REFDOCTOR;?></b></td>
</tr>
<tr><td><br></td></tr><tr>
<th colspan="4" style="font-size:10px;"><center><b><u>REPORT</u></b></center></th>
</tr>
<tr><td><br></td></tr><tr>
<tr>
<td colspan="4"style="font-size:10px;padding-left:8%;">Dear Dr...<br>Thank You For the Refferal.</td>
</tr>
<tr><td><br></td></tr><tr>
<tr>
<td colspan="4" style="font-size:10px;padding-left:8%;"><b><u><?php echo $PATIENTSPROCEDURE;?></u></b></td>
</tr>
<tr><td><br></td></tr><tr>
<tr>
<td colspan="4" style="font-size:10px;padding-left:8%;"><?php echo $NOTE2;?></td>
</tr>
<tr><td><br></td></tr><tr>
<tr>
<td colspan="4" style="font-size:10px;padding-left:8%;">Regards.</td>
</tr>
<tr><td><br></td></tr><tr>
<tr>
<td colspan="4" style="font-size:10px;padding-left:8%;">xxxxxxxxxx</td>
</tr>
<tr>
<td colspan="4" style="font-size:10px;padding-left:8%;">xxxxxxxx</td>
</tr>
<tr>
<td colspan="4" style="font-size:10px;padding-left:8%;">xxxxxxxxxx</td>
</tr>
</table>
</body>
<script src="Javascript/jquery-1.11.0.js"></script>
<script src="Javascript/effects.js"></script>
</html>