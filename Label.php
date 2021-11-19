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
            $Searching1 = "SELECT * FROM $var WHERE SESSIONID = '$SESSIONID' AND MRN = '$MRN'";
       $SearchingResults1=mysqli_query($con,$Searching1);
       if($SearchingResults1==true){
  while ($rows=mysqli_fetch_array($SearchingResults1)) {
    $PatientsID = $rows['PatientsID'];
            $MRN1 = $rows['MRN'];
			$SESSIONID1 = $rows['SESSIONID'];
            $FIRSTNAME= $rows['Name'];
            $LASTNAME= $rows['Surname'];
            $IDENTITYNUMBER = $rows['IdentityNumber'];
			$BRANCH = $rows['Branch'];
			$PHONE = $rows['PhoneNumber1'];
            }
	 } elseif($SearchingResults1==false){
        echo "";
} }
$Searching1 = "SELECT * FROM study WHERE SESSIONID = '$SESSIONID1' AND PatientsID = '$MRN1' AND Accession = '$ACCESSION1'";
       $SearchingResults1=mysqli_query($con,$Searching1);
       if($SearchingResults1->num_rows > 0){
  while ($rows=mysqli_fetch_array($SearchingResults1)) {
			$EXAMDATE = $rows['ExamDate'];
			$REFDOCTOR = $rows['RefDoctor'];
			$RADIOLOGIST = $rows['AssignedRadiologist'];
            }}
			
			if (isset($_POST['Email'])) {
echo'<script>
    var txt;
    var r = prompt("Enter Email Address");
    if (r) {
		 window.location.href="mailto:"+r+"?subject="+document.title+"&body="+escape(window.location.href);
    } else {
        window.location.href = "";
 }
 </script>';

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
<title>Label</title>
<link href="Css/style.css" rel="stylesheet" type="text/css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<link rel="stylesheet" href="https://fonts.google.com/specimen/Montserrat"type='text/css'>
<link href='http://fonts.googleapis.com/css?family=Montserrat' rel='stylesheet' type='text/css'>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
</head> 
<body>
<div class="Content1">
  <center><form action="" method="post"  enctype="multipart/form-data">
   <input type="button" value="Print Lable" style="border: 1px solid black;border-radius: 15px;background: white;
    "onclick="this.style.display='none';window.print();window.location.href='Receptionist.php';" />
	
	<input type="submit" name="Email" value="Email Lable" style="border: 1px solid black;border-radius: 15px;background: white;" />
  </form>
  <table>
  <th colspan="5" style="font-size: 25px;">xxxxxxxxxxxxx xxxxxx xxxxxxx</th>
      <br>
      <tr>
        <td colspan="5" style="font-size: 10px;"><div style="float: left;">TEL : xxxxxxxxxx</div><div style="float: right;">Email : xxxxx@xxxxx.com</div></td>
      </tr>
      <tr>
        <td colspan="5" style="font-size: 10px;text-align: center;">DIAGNOSTIC RADIOLOGIST</td>
      </tr>
      <tr>
        <td colspan="5"><hr></td>
      </tr>
      <tr>
        <td colspan="5" style="text-align: center;font-size: 10px;">BRANCH : <?php
		$Searching1 = "SELECT * FROM branch WHERE PREFIX='$BRANCH' ";
       $SearchingResults1=mysqli_query($con,$Searching1);
       if($SearchingResults1->num_rows > 0){
  while ($rows=mysqli_fetch_array($SearchingResults1)) {
    $BRANCHNAME = $rows['DESCRIPTION'];
	echo $BRANCHNAME;
}
} 
		?></td>
      </tr>
      <tr>
        <th colspan="5" style="font-size: 45px;"><?php echo $RADIOLOGIST?></th>
      </tr>
      <tr>
        <td colspan="5"><hr style="border: 1px solid black;"></td>
      </tr>
      <tr>
        <td>NAME:<br>NAAM:</td><td> <?php echo strtoupper($FIRSTNAME);?> <?php echo strtoupper($LASTNAME);?></td>
		<td>ACC NO.:<br>REK NO.:</td><td> <?php echo $PATIENTSID;?></td>
      </tr>
      <tr>
        <td>TEL:<br>TEL:</td><td> <?php echo $PHONE;?></td>
        <td>DATE:<br>DATUUM:</td><td> <?php echo date('Y-m-d', strtotime($EXAMDATE));?></td>
      </tr>
      <tr>
        <td>REFERRED BY:<br>VERWYS DEUR:</td><td> <?php echo $REFDOCTOR;?></td>
      </tr>
      <tr>
        <td colspan="5"><hr style="border: 1px solid black;"></td>
      </tr>
      <tr>
        <td colspan="5" style="font-size: 10px;text-align: center;">EXAMINATION / ONDERSOEK</td>
      </tr>
      <tr>
        <td colspan="5" style="width:100%;text-align:center;"><?php $Searching1 = "SELECT * FROM study WHERE SESSIONID = '$SESSIONID1' AND PatientsID = '$MRN1' AND DATE(ExamDate) = DATE('$EXAMDATE')";
       $SearchingResults1=mysqli_query($con,$Searching1);
       if($SearchingResults1->num_rows > 0){
  while ($rows=mysqli_fetch_array($SearchingResults1)) {
			$PROCEDURE = $rows['PatientsProcedure'];
			echo $PROCEDURE.' <br>';
            }} ?>
			</td>
      </tr>
    </table>
  </center>
</div>
</body>
<script src="Javascript/jquery-1.11.0.js"></script>
<script src="Javascript/effects.js"></script>
</html>