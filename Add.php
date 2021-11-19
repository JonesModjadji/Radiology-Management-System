<?php 
date_default_timezone_set('Africa/Johannesburg');
session_start();
include("Connection.php");
            $SESSIONID= rand(1111111111,9999999999);
            $MRN= rand(1111111111,9999999999);
            $NAME="";
			$SURNAME="";
			$NAME2="";
			$SURNAME2="";
			$SEX="";
			$IDNUMBER="";
			$IDNUMBER2="";
			$PHONENUMBER1="";
			$EMAIL1="";
			$MEDICALAIDNAME="";
			$INITIALS="";
			$DOB="";
			$OCCUPATION="";
			$COMPANYNAME="";
			$COMPANYNO="";
			$MAN="";
			$VN="";
			$RTM="";
			$NOD="";
			$PHONENUMBER2="";
			$PATIENTSID="";
			$OCCUPATIONADDRESS="";
			$OCCUPATIONADDRESS2="";
			$EMPLOYMENTNUMBER="";
			$ADDRESS1="";
			$ADDRESS2="";
			$ADDRESS3="";
			$ADDRESS4="";


if (isset($_POST['Save'])) {
       $SESSIONID = $_POST['SESSIONID'];
            $MRN = $_POST['MRN'];
            $NAME = $_POST['NAME'];
			$SURNAME = $_POST['SURNAME'];
			$NAME2 = $_POST['NAME2'];
			$SURNAME2 = $_POST['SURNAME2'];
			$SEX = $_POST['SEX'];
			$IDNUMBER = $_POST['IDNUMBER'];
			$IDNUMBER2 = $_POST['IDNUMBER2'];
			$PHONENUMBER1 = $_POST['PHONENUMBER1'];
			$EMAIL1 = $_POST['EMAIL1'];
			$MEDICALAIDNAME = $_POST['MEDICALAIDNAME'];
			$BRANCHNAME = $_POST['BRANCHNAME'];
			$BRANCHNAME2 ='a0';
			$DESCRIPTION = $_POST['DESCRIPTION'];
			$CITY = $_POST['CITY'];
			$TS = $_POST['TS'];
			$PC = $_POST['PC'];
			$CITY2 = $_POST['CITY2'];
			$TS2 = $_POST['TS2'];
			$PC2 = $_POST['PC2'];
			$CITY3 = $_POST['CITY3'];
			$TS3 = $_POST['TS3'];
			$PC3 = $_POST['PC3'];
			$INITIALS = $_POST['INITIALS'];
			$DOB = $_POST['DOB'];
			$TITLE = $_POST['TITLE'];
			$MAN = $_POST['MAN'];
			$VN = $_POST['VN'];
			$RTM = $_POST['RTM'];
			$NOD = $_POST['NOD'];
			$PHONENUMBER2 = $_POST['PHONENUMBER2'];
			$OCCUPATION= $_POST['OCCUPATION'];
			$COMPANY = $_POST['COMPANYNAME'];
			$COMPANYNUMBER = $_POST['COMPANYNO'];
			$OCCUPATIONADDRESS= $_POST['OCCUPATIONADDRESS'];
			$OCCUPATIONADDRESS2= $_POST['OCCUPATIONADDRESS2'];
			$EMPLOYMENTNUMBER= $_POST['EMPLOYMENTNUMBER'];
			$ADDRESS1= $_POST['ADDRESS1'];
			$ADDRESS2= $_POST['ADDRESS2'];
			$ADDRESS3= $_POST['ADDRESS3'];
			$ADDRESS4= $_POST['ADDRESS4'];

      $allowTypes = array('jpg','png','jpeg');
     
      $img1 = $_FILES['Img1']['name'];
      $dataImg1 = $_FILES['Img1']['tmp_name'];
      $FileDir1= "images/".$img1;
      move_uploaded_file($dataImg1,$FileDir1);

      $img2 = $_FILES['Img2']['name'];
      $dataImg2 =$_FILES['Img2']['tmp_name'];
      $FileDir2= "images/".$img2;
      move_uploaded_file($dataImg2,$FileDir2);

      $img3 = $_FILES['Img3']['name'];
      $dataImg3 = $_FILES['Img3']['tmp_name'];
      $FileDir3= "images/".$img3;
      move_uploaded_file($dataImg3,$FileDir3);
            
            $sql = "INSERT INTO $BRANCHNAME(SESSIONID,MRN,AccIndex,AccIndex2,Name,Surname,Name2,Surname2,Sex,
			      IdentityNumber,IdentityNumber2,PhoneNumber1,EmailAddress1,MedicalAid,Branch,Allergies,City,TownSuburb,PostalCode,City2
			      ,TownSuburb2,PostalCode2,Initials,DOB,Title,MedicalAidNumber,VatNumber,RelationToMember,NumberOfDependants,PhoneNumber2
			      ,Occupation,CompanyName,CompanyNumber,Address1,Address2,Address3,Address4,OCCUPATIONADDRESS,OCCUPATIONADDRESS2,City3
			      ,TownSuburb3,PostalCode3,EMPLOYMENTNUMBER,Image1,Image2,Image3) 
			      VALUES ('$SESSIONID','$MRN','0','Still','$NAME','$SURNAME','$NAME2','$SURNAME2','$SEX','$IDNUMBER','$IDNUMBER2','$PHONENUMBER1','$EMAIL1',
			      '$MEDICALAIDNAME','$BRANCHNAME','$DESCRIPTION','$CITY','$TS','$PC','$CITY2','$TS2','$PC2','$INITIALS','$DOB','$TITLE','$MAN'
			      ,'$VN','$RTM','$NOD','$PHONENUMBER2','$OCCUPATION','$COMPANY','$COMPANYNUMBER','$ADDRESS1','$ADDRESS2','$ADDRESS3','$ADDRESS4','$OCCUPATIONADDRESS'
			      ,'$OCCUPATIONADDRESS2','$CITY3','$TS3','$PC3','$EMPLOYMENTNUMBER','$img1','$img2','$img3')";

      $results = mysqli_query($con,$sql);

 if ($results) {
	 header("location: Add2.php?SESSIONID=$SESSIONID&MRN=$MRN&PatientsID=$PATIENTSID&Branch=$BRANCHNAME");

 }
 else 
 {
 echo '<script type="text/javascript">';
            echo ' alert("my msg1")';
            echo '</script>'; 
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



<form name="myForm" action="" method="post"  enctype="multipart/form-data" onsubmit="return validateForm()">
<div id="STEP 1" class="tabcontent" style="display:block;border: 2px solid black;">
<div class="tab" style="opacity: 0.8;background: black;border: 2px solid black;border-bottom: 2px solid red;height: 30px;">
<center>
<i class="fa fa-play" id ="left1" style="color: white;margin-top: 5px;"></i><label class="tablinks" onclick="openCity(event, 'STEP 1')" >STEP 1</label>
<i class="fa fa-arrow-right" id ="left1" style="color: white;margin-top: 5px;"></i><label class="tablinks" onclick="openCity(event, 'STEP 2')">STEP 2</label>
<i class="fa fa-arrow-right" id ="left1" style="color: white;margin-top: 5px;"></i><label class="tablinks" onclick="openCity(event, 'STEP 3')">STEP 3</label>
<i class="fa fa-floppy-o" id ="left1" style="color: white;margin-top: 5px;"></i><label class="tablinks" onclick="openCity(event, 'END')" style="border: none;">END</label>
</center>
</div>
<CENTER style="height: 100%;">
<table>
  <th colspan="3" style="color: white;">NEW PATIENT</th>
      <br>
      <tr>
        <td colspan="3"><hr style="width: 500px;border: 1px solid red;"></td>
      </tr>
  <tr>
    <td style="text-align: center;color: white;">Session ID</td>
	<td style="text-align: center;color: white;">Branch</td>
    <td style="text-align: center;color: white;">MRN</td>
  </tr>
  <tr>
        <td><center><input type="text" name="SESSIONID" value="<?php echo $SESSIONID;?>" style="width: 142px;border-radius: 20px 20px 20px 20px;padding-left: 20px;padding-right: 20px;border: 1px solid white;background: black;color: white;text-align: center;" readonly></center></td>
		<td><center>
		<select name="BRANCHNAME" style="width: 200px; text-align: center;border-radius: 20px 20px 20px 20px;border: 1px solid white;background: black;color: white;" required>
		<option value="">Select Branch</option>
		<?php
		$Searching1 = "SELECT * FROM branch ORDER BY DESCRIPTION ASC ";
       $SearchingResults1=mysqli_query($con,$Searching1);
       if($SearchingResults1->num_rows > 0){
  while ($rows=mysqli_fetch_array($SearchingResults1)) {
    $BRANCHNAME = $rows['DESCRIPTION'];
	$BRANCHPREFIX = $rows['PREFIX'];
	echo'<option value="'.$BRANCHPREFIX.'">'.$BRANCHPREFIX.' '.$BRANCHNAME.'</option>';

}
} 
		?>
		    </select></center></td>
        <td><center><input type="text" name="MRN" value="<?php echo $MRN;?>" style="width: 142px;border-radius: 20px 20px 20px 20px;padding-left: 20px;padding-right: 20px;border: 1px solid white;background: black;color: white;text-align: center;" readonly></center></td>
  </tr>
  <tr>
	<td style="text-align: center;color: white;">Title<div name="LTitle" id="LTitle" style="display:none;"><i class="fa fa-question-circle"  style="color: red;"></i></div></td>
    <td style="text-align: center;color: white;"></td>
    <td style="text-align: center;color: white;">Initials<div name="Linitial" id="LInitial" style="display:none;"><i class="fa fa-question-circle"  style="color: red;"></i></div></td>
  </tr>
  <tr>
		<td><center>
		<select name="TITLE" style="width: 180px; text-align: center;border-radius: 20px 20px 20px 20px;border: 1px solid white;background: black;color: white;text-align: center;">
		<option value="" selected>Select Title</option>
		<option value="Mr">Mr</option>
		<option value="Mrs">Mrs</option>
		</select></center>
		</td>
        <td></td>
		<td><input type="text" name="INITIALS" placeholder="xxx" value="<?php echo $INITIALS;?>" style="width: 160px;border-radius: 20px 20px 20px 20px;padding-left: 20px;padding-right: 20px;border: 1px solid white;background: black;color: white;text-align: center;"></td>
  </tr>
  <tr>
    <td style="text-align: center;color: white;">Name</td>
    <td style="text-align: center;color: white;">Surname</td>
    <td style="text-align: center;color: white;">Sex</td>
  </tr>
  <tr>
        <td><center><input type="text"id="NAME" name="NAME" placeholder="xxxxxxxxxx" value="<?php echo $NAME;?>" style="width: 142px;border-radius: 20px 20px 20px 20px;padding-left: 20px;padding-right: 20px;border: 1px solid white;background: black;color: white;text-align: center;" ></center></td>
		<td><center><input type="text" id="SURNAME" name="SURNAME" placeholder="xxxxxxxxxx" value="<?php echo $SURNAME;?>" style="width: 160px;border-radius: 20px 20px 20px 20px;padding-left: 20px;padding-right: 20px;border: 1px solid white;background: black;color: white;text-align: center;" ><center></td>
        <td><center>
		<select name="SEX" style="width: 180px; text-align: center;border-radius: 20px 20px 20px 20px;border: 1px solid white;background: black;color: white;text-align: center;">
		<option value=" " selected>Select Sex</option>
		<option value="Male">Male</option>
		<option value="Female">Female</option>
    </select></center>
		</td>
  </tr>
  <tr>
  <td><center><input type="checkbox" id="NON" name="NON" value="NON"><label for="NON" style="color:white;">Non SA ID</label></center></td>
  <td><br></td>
  <td><br></td>
  </tr>
  <tr>
    <td style="text-align: center;color: white;">ID Number/Passport</td>
	<td style="text-align: center;color: white;">Date Of Birth</td>
    <td style="text-align: center;color: white;">Phone Number</td>
  </tr>
  <tr>
        <td><center><input type="text" name="IDNUMBER" id="IDNUMBER" placeholder="xxxxxxxxxxxxx" value="<?php echo $IDNUMBER;?>" style="width: 142px;border-radius: 20px 20px 20px 20px;padding-left: 20px;padding-right: 20px;border: 1px solid white;background: black;color: white;text-align: center;" ></center></td>
		<td><center><input type="date" name="DOB" value="<?php echo $DOB;?>" style="width: 160px;border-radius: 20px 20px 20px 20px;padding-left: 20px;padding-right: 20px;border: 1px solid white;background: black;color: white;text-align: center;"></center></td>
		<td><input type="tel" placeholder="xxxxxxxxxx" id="PHONENUMBER1"  name="PHONENUMBER1" value="<?php echo $PHONENUMBER1;?>" style="width: 160px;border-radius: 20px 20px 20px 20px;padding-left: 20px;padding-right: 20px;border: 1px solid white;background: black;color: white;text-align: center;" ></td>
  </tr>
  <tr><td><br></td></tr>
  <tr>
    <td style="text-align: center;color: white;"></td>
    <td style="text-align: center;color: white;">Email Address</td>
    <td style="text-align: center;color: white;"></td>
  </tr>
  <tr>
        <td></td>
		<td><center><input type="text" placeholder="xxxx@xxxx.com" name="EMAIL1" value="<?php echo $EMAIL1;?>" style="width: 200px;border-radius: 20px 20px 20px 20px;padding-left: 20px;padding-right: 20px;border: 1px solid white;background: black;color: white;text-align: center;"></center></td>
        <td></td>
  </tr>
</table>
<br>
   <div class="hover">
 <label class="input-group-text" onclick="openCity(event, 'STEP 2')" style="color: white;"><i class="fa fa-arrow-right"></i> NEXT</label>
</CENTER>
</div>
</div>

<div id="STEP 2" class="tabcontent" style="border: 2px solid black;">
<div class="tab" style="opacity: 0.8;background: black;border: 2px solid black;border-bottom: 2px solid red;height: 30px;">
<center>
<i class="fa fa-play" id ="left1" style="color: white;margin-top: 5px;"></i><label class="tablinks" onclick="openCity(event, 'STEP 1')" >STEP 1</label>
<i class="fa fa-arrow-right" id ="left1" style="color: white;margin-top: 5px;"></i><label class="tablinks" onclick="openCity(event, 'STEP 2')">STEP 2</label>
<i class="fa fa-arrow-right" id ="left1" style="color: white;margin-top: 5px;"></i><label class="tablinks" onclick="openCity(event, 'STEP 3')">STEP 3</label>
<i class="fa fa-floppy-o" id ="left1" style="color: white;margin-top: 5px;"></i><label class="tablinks" onclick="openCity(event, 'END')" style="border: none;">END</label>
</center>
</div>
<br>
<CENTER style="height: 100%;">
<table>
  <th colspan="3" style="color: white;">NEW PATIENT</th>
      <br>
      <tr>
        <td colspan="3"><hr style="width: 500px;border: 1px solid red;"></td>
      </tr>
	  <tr>
    <td style="text-align: center;color: white;"></td>
    <td style="text-align: center;color: white;">Allergies</td>
    <td style="text-align: center;color: white;"></td>
  </tr>
  <tr>
		<td colspan="3"><center>
		<select name="DESCRIPTION" style="width: 300px; text-align: center;border-radius: 20px 20px 20px 20px;border: 1px solid white;background: black;color: white;text-align: center;" >
		<option value=" " selected>Select Your Allergy</option>
		<?php
		$Searching1 = "SELECT * FROM allergies ";
       $SearchingResults1=mysqli_query($con,$Searching1);
       if($SearchingResults1->num_rows > 0){
  while ($rows=mysqli_fetch_array($SearchingResults1)) {
    $DESCRIPTION = $rows['DESCRIPTION'];
	echo'<option value="'.$DESCRIPTION.'">'.$DESCRIPTION.'</option>';

}
} 
		?>
		    </select></center>
		</td>
  </tr>
  <tr>
    <td style="text-align: center;color: white;"></td>
    <td style="text-align: center;color: white;"><br></td>
    <td style="text-align: center;color: white;"></td>
  </tr>
  <tr>
    <th colspan="3" style="color: white;">POSTAL ADDRESS</th>
  </tr>
  <tr>
        <td colspan="3"><hr style="width: 500px;border: 1px solid red;"></td>
      </tr>
	  <tr>
    <td style="text-align: center;color: white;"colspan="3">Address 1</td>
  </tr>
  <tr>
    <td style="text-align: center;color: white;"colspan="3"><input type="text" name="ADDRESS1" id="ADDRESS1" placeholder="xxxxxxxxxxxxx" value="<?php echo $ADDRESS1;?>" style="width: 570px;border-radius: 20px 20px 20px 20px;padding-left: 20px;padding-right: 20px;border: 1px solid white;background: black;color: white;text-align: center;"></center></td>
    </tr>
	<tr>
    <td style="text-align: center;color: white;"colspan="3">Address 2</td>
  </tr>
  <tr>
	<tr>
    <td style="text-align: center;color: white;"colspan="3"><input type="text" name="ADDRESS3" id="ADDRESS3" placeholder="xxxxxxxxxxxxx" value="<?php echo $ADDRESS3;?>" style="width: 570px;border-radius: 20px 20px 20px 20px;padding-left: 20px;padding-right: 20px;border: 1px solid white;background: black;color: white;text-align: center;"></center></td>
  </tr>
  <tr>
    <td style="text-align: center;color: white;">City</td>
    <td style="text-align: center;color: white;">Town/Suburb</td>
    <td style="text-align: center;color: white;">Postal Code</td>
  </tr>
  <tr>
        <td><center>
		<select id="CITY" name="CITY" style="width: 200px; text-align: center;border-radius: 20px 20px 20px 20px;border: 1px solid white;background: black;color: white;text-align: center;">
		<option value=" " selected>Select City</option>
		<?php
		$Searching1 = "SELECT DISTINCT NAME FROM postal_codes ORDER BY NAME ASC ";
       $SearchingResults1=mysqli_query($con,$Searching1);
       if($SearchingResults1->num_rows > 0){
  while ($rows=mysqli_fetch_array($SearchingResults1)) {
    $NAME = $rows['NAME'];
	echo'<option value="'.$NAME.'" style="text-align:center;">'.$NAME.'</option>';
}
} 
		?>
		    </select>';</center>
		</td>
		<td>
		<select id="TS" name="TS" style="width: 200px; text-align: center;border-radius: 20px 20px 20px 20px;border: 1px solid white;background: black;color: white;text-align: center;">
		<option value=" " selected>Select Your Town/Suburb</option>
		<?php
		$Searching1 = "SELECT DISTINCT SUBURB FROM postal_codes ORDER BY SUBURB ASC ";
       $SearchingResults1=mysqli_query($con,$Searching1);
       if($SearchingResults1->num_rows > 0){
  while ($rows=mysqli_fetch_array($SearchingResults1)) {
	$SUBURB1 = $rows['SUBURB'];
	echo'<option value="'.$SUBURB1.'" style="text-align:center;">'.$SUBURB1.'</option>';
}
} 
		?>
		    </select>';
			</td>
		<td><center>
		<select id="PC" name="PC" style="width: 200px; text-align: center;border-radius: 20px 20px 20px 20px;border: 1px solid white;background: black;color: white;text-align: center;" >
		<option value=" " selected>Select Postal Code</option>
		<?php
		$Searching1 = "SELECT DISTINCT POSTAL_CODE FROM postal_codes ORDER BY POSTAL_CODE ASC ";
       $SearchingResults1=mysqli_query($con,$Searching1);
       if($SearchingResults1->num_rows > 0){
  while ($rows=mysqli_fetch_array($SearchingResults1)) {
	$POSTALCODE1 = $rows['POSTAL_CODE'];
	echo'<option value="'.$POSTALCODE1.'" style="text-align:center;">'.$POSTALCODE1.'</option>';
}
} 
		?>
		    </select>';</center>
		</td>
  </tr>
  <tr>
    <td style="text-align: center;color: white;"></td>
    <td style="text-align: center;color: white;"><br></td>
    <td style="text-align: center;color: white;"></td>
  </tr>
  <tr>
    <th colspan="3" style="color: white;">OCCUPATION</th>
  </tr>
  <tr>
        <td colspan="3"><hr style="width: 500px;border: 1px solid red;"></td>
      </tr>
  <tr>
    <td style="text-align: center;color: white;">Occupation</td>
    <td style="text-align: center;color: white;">Company Name</td>
    <td style="text-align: center;color: white;">Contact Number</td>
  </tr>
  <tr>
        <td><center><input type="text" name="OCCUPATION" placeholder="xxxxxxxxxxxxx" value="<?php echo $OCCUPATION;?>" style="width: 142px;border-radius: 20px 20px 20px 20px;padding-left: 20px;padding-right: 20px;border: 1px solid white;background: black;color: white;text-align: center;"></center></td>
		<td><input type="tel" placeholder="xxxxxxxxxx"  name="COMPANYNAME" value="<?php echo $COMPANYNAME;?>" style="width: 160px;border-radius: 20px 20px 20px 20px;padding-left: 20px;padding-right: 20px;border: 1px solid white;background: black;color: white;text-align: center;"></td>
		<td><center><input type="text" placeholder="xxxxxxxxxx" name="COMPANYNO" value="<?php echo $COMPANYNO;?>" style="width: 142px;border-radius: 20px 20px 20px 20px;padding-left: 20px;padding-right: 20px;border: 1px solid white;background: black;color: white;text-align: center;"></center></td>
  </tr>
  <tr>
    <td style="text-align: center;color: white;"colspan="3">Employment Number</td>
  </tr>
  <tr>
        <td></td>
		<td><center><input type="text" placeholder="xxxxxxxxxx" name="EMPLOYMENTNUMBER" value="<?php echo $EMPLOYMENTNUMBER;?>" style="width: 142px;border-radius: 20px 20px 20px 20px;padding-left: 20px;padding-right: 20px;border: 1px solid white;background: black;color: white;text-align: center;"></center></td>
  <td></td>
  </tr>
  <tr>
  <td style="color: white;text-align: center;"colspan="3">Address 1</td>
  </tr>
  <tr>
  <td colspan="3"><center><input type="text" name="OCCUPATIONADDRESS" placeholder="xxxxxxxxxxxxx" value="<?php echo $OCCUPATIONADDRESS;?>" style="width: 570px;border-radius: 20px 20px 20px 20px;padding-left: 20px;padding-right: 20px;border: 1px solid white;background: black;color: white;text-align: center;"></center></td>
  </tr>
  <td style="color: white;text-align: center;"colspan="3">Address 2</td>
  </tr>
  <tr>
  <td colspan="3"><center><input type="text" name="OCCUPATIONADDRESS2" placeholder="xxxxxxxxxxxxx" value="<?php echo $OCCUPATIONADDRESS2;?>" style="width: 570px;border-radius: 20px 20px 20px 20px;padding-left: 20px;padding-right: 20px;border: 1px solid white;background: black;color: white;text-align: center;"></center></td>
  </tr>
  <tr>
    <td style="text-align: center;color: white;">City</td>
    <td style="text-align: center;color: white;">Town/Suburb</td>
    <td style="text-align: center;color: white;">Postal Code</td>
  </tr>
  <tr>
        <td><center>
		<select id="CITY3" name="CITY3" style="width: 200px; text-align: center;border-radius: 20px 20px 20px 20px;border: 1px solid white;background: black;color: white;text-align: center;">
		<option value=" " selected>Select City</option>
		<?php
		$Searching1 = "SELECT DISTINCT NAME FROM postal_codes ORDER BY NAME ASC ";
       $SearchingResults1=mysqli_query($con,$Searching1);
       if($SearchingResults1->num_rows > 0){
  while ($rows=mysqli_fetch_array($SearchingResults1)) {
    $NAME3 = $rows['NAME'];
	echo'<option value="'.$NAME3.'" style="text-align:center;">'.$NAME3.'</option>';
}
} 
		?>
		    </select>';</center>
		</td>
		<td>
		<select id="TS3" name="TS3" style="width: 200px; text-align: center;border-radius: 20px 20px 20px 20px;border: 1px solid white;background: black;color: white;text-align: center;">
		<option value=" " selected>Select Your Town/Suburb</option>
		<?php
		$Searching1 = "SELECT DISTINCT SUBURB FROM postal_codes ORDER BY SUBURB ASC ";
       $SearchingResults1=mysqli_query($con,$Searching1);
       if($SearchingResults1->num_rows > 0){
  while ($rows=mysqli_fetch_array($SearchingResults1)) {
	$SUBURB3 = $rows['SUBURB'];
	echo'<option value="'.$SUBURB3.'" style="text-align:center;">'.$SUBURB3.'</option>';
}
} 
		?>
		    </select>';
			</td>
		<td><center>
		<select id="PC3" name="PC3" style="width: 200px; text-align: center;border-radius: 20px 20px 20px 20px;border: 1px solid white;background: black;color: white;text-align: center;" >
		<option value=" " selected>Select Postal Code</option>
		<?php
		$Searching1 = "SELECT DISTINCT POSTAL_CODE FROM postal_codes ORDER BY POSTAL_CODE ASC ";
       $SearchingResults1=mysqli_query($con,$Searching1);
       if($SearchingResults1->num_rows > 0){
  while ($rows=mysqli_fetch_array($SearchingResults1)) {
	$POSTALCODE3 = $rows['POSTAL_CODE'];
	echo'<option value="'.$POSTALCODE3.'" style="text-align:center;">'.$POSTALCODE3.'</option>';
}
} 
		?>
		    </select>';</center>
		</td>
  </tr>
</table>
<br>
<table>
  <tr>
    <td><div class="hover">
 <label class="input-group-text" onclick="openCity(event, 'STEP 1')" style="color: white;"><i class="fa fa-arrow-left"></i> BACK</label>
</div></td>
    <td><div class="hover">
 <label class="input-group-text" onclick="openCity(event, 'STEP 3')" style="color: white;"><i class="fa fa-arrow-right"></i> NEXT</label>
</div></td>
  </tr>
</table>
</CENTER>
</div>

<div id="STEP 3" class="tabcontent" style="border: 2px solid black;">
<div class="tab" style="opacity: 0.8;background: black;border: 2px solid black;border-bottom: 2px solid red;height: 30px;">
<center>
<i class="fa fa-play" id ="left1" style="color: white;margin-top: 5px;"></i><label class="tablinks" onclick="openCity(event, 'STEP 1')" >STEP 1</label>
<i class="fa fa-arrow-right" id ="left1" style="color: white;margin-top: 5px;"></i><label class="tablinks" onclick="openCity(event, 'STEP 2')">STEP 2</label>
<i class="fa fa-arrow-right" id ="left1" style="color: white;margin-top: 5px;"></i><label class="tablinks" onclick="openCity(event, 'STEP 3')">STEP 3</label>
<i class="fa fa-floppy-o" id ="left1" style="color: white;margin-top: 5px;"></i><label class="tablinks" onclick="openCity(event, 'END')" style="border: none;">END</label>
</center>
</div>
<br>
<CENTER style="height: 100%;">
<table>
  <th colspan="3" style="color: white;">MEMBER DETAILS</th>
      <br>
      <tr>
        <td colspan="3"><hr style="width: 500px;border: 1px solid red;"></td>
      </tr>
	  <tr>
	  <td style="text-align: center;color: white;">Rel To Member</td>
    <td style="text-align: center;color: white;">Name</td>
    <td style="text-align: center;color: white;">Surname</td>
  </tr>
  <tr>
  <td><center>
		<select name="RTM" id="RTM" onchange="OnSelectionChange()" style="width: 180px; text-align: center;border-radius: 20px 20px 20px 20px;border: 1px solid white;background: black;color: white;text-align: center;" >
		<option value="" selected>Select Relation</option>
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
		</center></td>
        <td><center><input type="text" id="NAME2" name="NAME2" placeholder="xxxxxxxxxx" value="<?php echo $NAME2;?>" style="width: 142px;border-radius: 20px 20px 20px 20px;padding-left: 20px;padding-right: 20px;border: 1px solid white;background: black;color: white;text-align: center;"></center></td>
		<td><center><input type="text" id="SURNAME2" name="SURNAME2" placeholder="xxxxxxxxxx" value="<?php echo $SURNAME2;?>" style="width: 160px;border-radius: 20px 20px 20px 20px;padding-left: 20px;padding-right: 20px;border: 1px solid white;background: black;color: white;text-align: center;"></center></td>
  </tr>
  <tr>
    <td style="text-align: center;color: white;">ID Number</td>
    <td style="text-align: center;color: white;">Dependent Code</td>
    <td style="text-align: center;color: white;">Phone Number</td>
  </tr>
  <tr>
        <td><center><input type="text" id="IDNUMBER2" name="IDNUMBER2" placeholder="xxxxxxxxxx" value="<?php echo $IDNUMBER2;?>" style="width: 160px;border-radius: 20px 20px 20px 20px;padding-left: 20px;padding-right: 20px;border: 1px solid white;background: black;color: white;text-align: center;"></center></td>
		<td><center><input type="text" name="NOD" placeholder="x" value="<?php echo $NOD;?>" style="width: 160px;border-radius: 20px 20px 20px 20px;padding-left: 20px;padding-right: 20px;border: 1px solid white;background: black;color: white;text-align: center;"></center></td>
        <td><center><input type="text" id="PHONENUMBER2" name="PHONENUMBER2" placeholder="xxxxxxxxxx" value="<?php echo $PHONENUMBER2;?>" style="width: 160px;border-radius: 20px 20px 20px 20px;padding-left: 20px;padding-right: 20px;border: 1px solid white;background: black;color: white;text-align: center;"></center></td>
  </tr>
  <tr>
  <td style="text-align: center;color: white;">Medical Aid</td>
    <td style="text-align: center;color: white;">Medical Aid No.</td>
    <td style="text-align: center;color: white;">Plan No.</td>
  </tr>
  <tr>
  <td><center><select name="MEDICALAIDNAME" style="width: 250px; text-align: center;border-radius: 20px 20px 20px 20px;padding-left: 20px;padding-right: 20px;border: 1px solid white;background: black;color: white;text-align: center;" >
		<option value=" ">Select Medical Scheme</option>
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
		    </select></center></td>
        <td><center><input type="text" name="MAN" placeholder="xxxxxxxxxxxxx" value="<?php echo $MAN;?>" style="width: 142px;border-radius: 20px 20px 20px 20px;padding-left: 20px;padding-right: 20px;border: 1px solid white;background: black;color: white;text-align: center;"></center></td>
		<td><center><input type="text" placeholder="xxxxxxxxxxxxx" name="VN" value="<?php echo $VN;?>" style="width: 142px;border-radius: 20px 20px 20px 20px;padding-left: 20px;padding-right: 20px;border: 1px solid white;background: black;color: white;text-align: center;"></center></td>
  </tr>
  <tr>
    <th colspan="3" style="color: white;">POSTAL ADDRESS</th>
  </tr>
  <tr>
        <td colspan="3"><hr style="width: 500px;border: 1px solid red;"></td>
      </tr>
	  <tr><td><script>    
function copyTextValue() {
    var text1 = document.getElementById("CITY").value;
	var text2 = document.getElementById("TS").value;
	var text3 = document.getElementById("PC").value;
	var text4 = document.getElementById("ADDRESS1").value;
	var text5 = document.getElementById("ADDRESS3").value;
    document.getElementById("CITY2").value = text1;
	document.getElementById("TS2").value = text2;
    document.getElementById("PC2").value=text3;
	document.getElementById("ADDRESS2").value=text4;
	document.getElementById("ADDRESS4").value=text5;
}
</script><input type="checkbox" name="check1" onclick="copyTextValue();"/><label style="color:white;"> Copy Resident</label></td></tr>
    <tr>
    <td style="text-align: center;color: white;"colspan="3">Address 1</td>
  </tr>
  <tr>
    <td style="text-align: center;color: white;"colspan="3"><input type="text" name="ADDRESS2" id="ADDRESS2" placeholder="xxxxxxxxxxxxx" value="<?php echo $ADDRESS2;?>" style="width: 570px;border-radius: 20px 20px 20px 20px;padding-left: 20px;padding-right: 20px;border: 1px solid white;background: black;color: white;text-align: center;"></center></td>
    <tr>
    <td style="text-align: center;color: white;"colspan="3">Address 2</td>
  </tr>
    <td style="text-align: center;color: white;"colspan="3"><input type="text" name="ADDRESS4" id="ADDRESS4" placeholder="xxxxxxxxxxxxx" value="<?php echo $ADDRESS4;?>" style="width: 570px;border-radius: 20px 20px 20px 20px;padding-left: 20px;padding-right: 20px;border: 1px solid white;background: black;color: white;text-align: center;"></center></td>
  </tr>
  <tr>
    <td style="text-align: center;color: white;">City</td>
    <td style="text-align: center;color: white;">Town/Suburb</td>
    <td style="text-align: center;color: white;">Postal Code</td>
  </tr>
  <tr>
        <td><center>
		<select id="CITY2" name="CITY2" style="width: 200px; text-align: center;border-radius: 20px 20px 20px 20px;border: 1px solid white;background: black;color: white;text-align: center;">
		<option value=" " selected>Select City</option>
		<?php
		$Searching1 = "SELECT DISTINCT NAME FROM postal_codes ORDER BY NAME ASC ";
       $SearchingResults1=mysqli_query($con,$Searching1);
       if($SearchingResults1->num_rows > 0){
  while ($rows=mysqli_fetch_array($SearchingResults1)) {
    $NAME = $rows['NAME'];
	echo'<option value="'.$NAME.'" style="text-align:center;">'.$NAME.'</option>';
}
} 
		?>
		    </select>';</center>
		</td>
		<td><center>
		<select id="TS2" name="TS2" style="width: 200px; text-align: center;border-radius: 20px 20px 20px 20px;border: 1px solid white;background: black;color: white;text-align: center;">
		<option value=" " selected>Select Town/Suburb</option>
		<?php
		$Searching1 = "SELECT DISTINCT SUBURB FROM postal_codes ORDER BY SUBURB ASC ";
       $SearchingResults1=mysqli_query($con,$Searching1);
       if($SearchingResults1->num_rows > 0){
  while ($rows=mysqli_fetch_array($SearchingResults1)) {
	$SUBURB1 = $rows['SUBURB'];
	echo'<option value="'.$SUBURB1.'" style="text-align:center;">'.$SUBURB1.'</option>';
}
} 
		?>
		    </select>';</center>
			</td>
		<td><center>
		<select id="PC2" name="PC2" style="width: 200px; text-align: center;border-radius: 20px 20px 20px 20px;border: 1px solid white;background: black;color: white;text-align: center;">
		<option value=" " selected>Select Postal Code</option>
		<?php
		$Searching1 = "SELECT DISTINCT POSTAL_CODE FROM postal_codes ORDER BY POSTAL_CODE ASC ";
       $SearchingResults1=mysqli_query($con,$Searching1);
       if($SearchingResults1->num_rows > 0){
  while ($rows=mysqli_fetch_array($SearchingResults1)) {
	$POSTALCODE1 = $rows['POSTAL_CODE'];
	echo'<option value="'.$POSTALCODE1.'" style="text-align:center;">'.$POSTALCODE1.'</option>';
}
} 
		?>
		    </select>';</center>
		</td>
  </tr>
  <tr>
    <td style="text-align: center;color: white;"></td>
    <td style="text-align: center;color: white;"><br></td>
    <td style="text-align: center;color: white;"></td>
  </tr>
</table>
<br>
<table>
  <tr>
    <td><div class="hover">
 <label class="input-group-text" onclick="openCity(event, 'STEP 2')" style="color: white;"><i class="fa fa-arrow-left"></i> BACK</label>
</div></td>
    <td><div class="hover">
 <label class="input-group-text" onclick="openCity(event, 'END')" style="color: white;"><i class="fa fa-arrow-right"></i> NEXT</label>
</div></td>
  </tr>
</table>
</CENTER>
</div>

<div id="END" class="tabcontent" style="border: 2px solid black;">
<div class="tab" style="opacity: 0.8;background: black;border: 2px solid black;border-bottom: 2px solid red;height: 30px;">
<center>
<i class="fa fa-play" id ="left1" style="color: white;margin-top: 5px;"></i><label class="tablinks" onclick="openCity(event, 'STEP 1')" >STEP 1</label>
<i class="fa fa-arrow-right" id ="left1" style="color: white;margin-top: 5px;"></i><label class="tablinks" onclick="openCity(event, 'STEP 2')">STEP 2</label>
<i class="fa fa-arrow-right" id ="left1" style="color: white;margin-top: 5px;"></i><label class="tablinks" onclick="openCity(event, 'STEP 3')">STEP 3</label>
<i class="fa fa-floppy-o" id ="left1" style="color: white;margin-top: 5px;"></i><label class="tablinks" onclick="openCity(event, 'END')" style="border: none;">END</label>
</center>
</div>
<br>
<CENTER style="height: 100%;">
<table>
  <th colspan="3" style="color: white;">SAVE</th>
      <br>
      <tr>
        <td colspan="3"><hr style="width: 500px;border: 1px solid red;"></td>
      </tr>
  
</table>
<table>
  <tr>
    <td><div class="hover" style="margin-top: 17px;">
 <label class="input-group-text" onclick="openCity(event, 'STEP 3')" style="color: white;"><i class="fa fa-arrow-left"></i> BACK</label>
</div> <br></td>
<td><div class="hover">
 <input class="input-group-text" type="submit" name="Save" style="color: white;"><i class="fa fa-floppy-o"></i> SAVE</input>
</div></td>
<td><div class="hover">
 <input class="input-group-text" style="color: white;" type="file" name="Img1">
</div></td>
<td><div class="hover">
 <input class="input-group-text" style="color: white;" type="file" name="Img2">
</div></td>
<td><div class="hover">
 <input class="input-group-text" style="color: white;" type="file" name="Img3">
</div></td>
  </tr>
  </table>
  
  <label><input  type="text" id="label" name="label" style="color:red;background: transparent;border: none;text-align:center;"></label>
</CENTER>
</div>

</form>


<div id="HELP" class="tabcontent">

</div>

<div id="PACS" class="tabcontent">

</div>
</div>
<script>
function OnSelectionChange()
{
	if(document.getElementById('RTM').value == "Self") {
    var text1 = document.getElementById("NAME").value;
	var text2 = document.getElementById("SURNAME").value;
	var text3 = document.getElementById("IDNUMBER").value;
	var text4 = document.getElementById("PHONENUMBER1").value;
    document.getElementById("NAME2").value = text1;
	document.getElementById("SURNAME2").value = text2;
    document.getElementById("IDNUMBER2").value=text3;
	document.getElementById("PHONENUMBER2").value=text4;
}
}

</script>
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
function validateForm() {
  var a = document.forms["myForm"]["TITLE"].value;
  var b = document.forms["myForm"]["INITIALS"].value;

   
  
  if (a != "") {
	document.getElementById("LTitle").style.display = "none"; 
	}
	 if (b != "") {
	  document.getElementById("LInitial").style.display = "none";
  }	
  if (a == ""){ 
	  document.getElementById("LTitle").style.display = "inline";
	document.getElementById("label").value = "Title Field Empty";
	return false;
  }
  if (b == ""){
	  document.getElementById("LInitial").style.display = "inline";
	document.getElementById("label").value = "Initials Field Empty";
    return false;
  }
}
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