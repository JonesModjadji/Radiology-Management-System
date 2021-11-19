<?php
session_start();
ob_start();

echo $_SESSION['suserbranch'];
$var2 = ob_get_clean();
include("Connection.php");
$ID = $_GET['ID'];
$ACC = $_GET['ACC'];
$NOTE = $_GET['NOTE'];
$PHYSICIAN = $_GET['PHYSICIAN'];
$SCHEDULE = $_GET['SCHEDULE'];
$PRI = $_GET['PRI'];
$RAD = $_GET['RAD'];
$result0 ="Waiting";
$result1 ="Start Exam";
$result2 ="Started";
$result3 ="Processing";
$result4 ="QC";
$result5 ="QC Pending";
$result6 ="Dictate";
$result7 ="Dictating";
$result8 ="Dictated";
$result9 ="Authorize";
$result91 ="Authorizing";
$result10 ="Done";

$Searching0 = "SELECT * FROM $var2,study WHERE $var2.MRN = '$ID' AND study.Status ='$result0' AND study.Accession ='$ACC' ";
$Searching1 = "SELECT * FROM $var2,study WHERE $var2.MRN = '$ID' AND study.Status ='$result1' AND study.Accession ='$ACC' ";
$Searching2 = "SELECT * FROM $var2,study WHERE $var2.MRN = '$ID' AND study.Status ='$result2' AND study.Accession ='$ACC' ";
$Searching3 = "SELECT * FROM $var2,study WHERE $var2.MRN = '$ID' AND study.Status ='$result3' AND study.Accession ='$ACC' ";
$Searching4 = "SELECT * FROM $var2,study WHERE $var2.MRN = '$ID' AND study.Status ='$result4' AND study.Accession ='$ACC' ";
$Searching5 = "SELECT * FROM $var2,study WHERE $var2.MRN = '$ID' AND study.Status ='$result5' AND study.Accession ='$ACC' ";
$Searching6 = "SELECT * FROM $var2,study WHERE $var2.MRN = '$ID' AND study.Status ='$result6' AND study.Accession ='$ACC' ";
$Searching7 = "SELECT * FROM $var2,study WHERE $var2.MRN = '$ID' AND study.Status ='$result7' AND study.Accession ='$ACC' ";
$Searching8 = "SELECT * FROM $var2,study WHERE $var2.MRN = '$ID' AND study.Status ='$result8' AND study.Accession ='$ACC' ";
$Searching9 = "SELECT * FROM $var2,study WHERE $var2.MRN = '$ID' AND study.Status ='$result9' AND study.Accession ='$ACC' ";
$Searching91 = "SELECT * FROM $var2,study WHERE $var2.MRN = '$ID' AND study.Status ='$result91' AND study.Accession ='$ACC' ";
$Searching10 = "SELECT * FROM $var2,study WHERE $var2.MRN = '$ID' AND study.Status ='$result10' AND study.Accession ='$ACC' ";

$SearchingResults0=mysqli_query($con,$Searching0);
$SearchingResults1=mysqli_query($con,$Searching1);
$SearchingResults2=mysqli_query($con,$Searching2);
$SearchingResults3=mysqli_query($con,$Searching3);
$SearchingResults4=mysqli_query($con,$Searching4);
$SearchingResults5=mysqli_query($con,$Searching5);
$SearchingResults6=mysqli_query($con,$Searching6);
$SearchingResults7=mysqli_query($con,$Searching7);
$SearchingResults8=mysqli_query($con,$Searching8);
$SearchingResults9=mysqli_query($con,$Searching9);
$SearchingResults91=mysqli_query($con,$Searching91);
$SearchingResults10=mysqli_query($con,$Searching10);

$rows0=mysqli_num_rows($SearchingResults0);
$rows1=mysqli_num_rows($SearchingResults1);
$rows2=mysqli_num_rows($SearchingResults2);
$rows3=mysqli_num_rows($SearchingResults3);
$rows4=mysqli_num_rows($SearchingResults4);
$rows5=mysqli_num_rows($SearchingResults5);
$rows6=mysqli_num_rows($SearchingResults6);
$rows7=mysqli_num_rows($SearchingResults7);
$rows8=mysqli_num_rows($SearchingResults8);
$rows9=mysqli_num_rows($SearchingResults9);
$rows91=mysqli_num_rows($SearchingResults91);
$rows10=mysqli_num_rows($SearchingResults10);

if($rows0>0){
    $qry=mysqli_query($con,"UPDATE study SET Status='$result1'  WHERE Accession = '$ACC'");  
  header("location: Receptionist.php");
} 
if($rows1>0){
    $qry=mysqli_query($con,"UPDATE study SET Status='$result2'  WHERE Accession = '$ACC'");  
  header("location: Radiographer.php");
} 
if($rows2>0){
    $qry=mysqli_query($con,"UPDATE study SET Status='$result3'  WHERE Accession = '$ACC'");  
 header("location: Radiographer.php");
} 
if($rows3>0){
    $qry=mysqli_query($con,"UPDATE study SET Status='$result4'  WHERE Accession = '$ACC'");  
 header("location: Radiographer.php");
} 
if($rows4>0){
    $qry=mysqli_query($con,"UPDATE study SET Status='$result5'  WHERE Accession = '$ACC'");   
 header("location: QC1.php?ID=$ID&ACC=$ACC");
} 
if($rows5>0){
    $qry=mysqli_query($con,"UPDATE study SET Status='$result6',NOTE='$NOTE',NOTE2='$NOTE2',Schedule='$SCHEDULE',AssignedRadiographer='$PHYSICIAN',Priority='$PRI',AssignedRadiologist='$RAD'  WHERE Accession = '$ACC'"); ;  
 header("location: Radiographer.php");
} 
if($rows6>0){
    $qry=mysqli_query($con,"UPDATE study SET Status='$result7'  WHERE Accession = '$ACC'");   
 header("location: Dictate1.php?ID=$ID&ACC=$ACC");
} 
if($rows7>0){
    $qry=mysqli_query($con,"UPDATE study SET Status='$result8'  WHERE Accession = '$ACC'");   
 header("location: Radiologist.php");
} 
if($rows8>0){
    $qry=mysqli_query($con,"UPDATE study SET Status='$result9'  WHERE Accession = '$ACC'"); 
 header("location: Typist.php");
} 
if($rows9>0){
    $qry=mysqli_query($con,"UPDATE study SET Status='$result91'  WHERE Accession = '$ACC'");  
 header("location: Typist1.php?ID=$ID&ACC=$ACC");
} 
if($rows91>0){
    $qry=mysqli_query($con,"UPDATE study SET Status='$result10'  WHERE Accession = '$ACC'");  
 header("location: Radiologist.php");
} 
if($rows10>0){
    $qry=mysqli_query($con,"UPDATE study SET Status='$result0'  WHERE Accession = '$ACC'");  
 header("location: Receptionist.php");
} 

$con->close();
?>