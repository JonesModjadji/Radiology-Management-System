<?php 
include("Connection.php");
            $Searched = $_GET['Searched'];

if (isset($_POST['Submit'])) {
            $Search = $_POST['Search'];
      $Searched = $Search;
       $Searching = "SELECT * FROM patients WHERE PatientID = '$Search' ";
       $SearchingResults=mysqli_query($con,$Searching);
       if($SearchingResults->num_rows > 0){
        header("location: Searched.php?Searched=$Search");
       }
       else
{
 header("location: Add.php");
}
}
       $Searching1 = "SELECT * FROM patients WHERE PatientsID = '$Searched'";
       $SearchingResults1=mysqli_query($con,$Searching1);
       if($SearchingResults1->num_rows > 0){
  while ($rows=mysqli_fetch_array($SearchingResults1)) {
    $PatientID = $rows['PatientID'];
    $SESSIONID = $rows['SESSIONID'];
            $MRN = $rows['MRN'];
            $XN = $rows['XN'];
            $FIRSTNAME= $rows['Name'];
            $LASTNAME= $rows['Surname'];
            $IDENTITYNUMBER = $rows['IDNumber'];
            $PHONE = $rows['PHONE'];
            $FAX = $rows['FAX'];
            $EMAIL = $rows['EMAIL'];
            $NOTE = $rows['NOTE'];
            $ADDRESS = $rows['ADDRESS'];
            $CITY = $rows['CITY'];
            $PROVINCE = $rows['PROVINCE'];
            $POSTALCODE = $rows['POSTALCODE'];
            $COUNTRY = $rows['COUNTRY'];
            $CREATETIME = $rows['CREATETIME'];
            $LABDATE =$rows['LABDATE'];
            $ALLERGY =$rows['ALLERGY'];
            $HEIGHT = $rows['HEIGHT'];;
            $WEIGHT = $rows['WEIGHT'];
            $PATIENTTYPE = $rows['PATIENTTYPE'];
            $MEDICALALERT = $rows['MEDICALALERT'];
            $TYPE = $rows['TYPE'];
            $MEDICALSCHEME = $rows['MEDICALSCHEME'];
            $MEDICALAIDNUMBER = $rows['MEDICALAIDNUMBER'];
            $MEMBERFIRSTNAME = $rows['MEMBERFIRSTNAME'];
            $MEMBERLASTNAME = $rows['MEMBERLASTNAME'];
            $IDNUMBERPASSPORT = $rows['IDNUMBERPASSPORT'];
            $DATEOFBIRTH = $rows['DATEOFBIRTH'];
            $RELATIONTOMEMBER = $rows['RELATIONTOMEMBER'];
            $NUMBEROFDEPENDANTS = $rows['DEPENDENTSNUMBER'];
            $NEXTOFKIN = $rows['NEXTOFKIN'];
            $ADDRESS2 = $rows['ADDRESS2'];
            $CITY2 = $rows['CITY2'];
            $PROVINCE2 = $rows['PROVINCE2'];
            $POSTALCODE2 = $rows['POSTALCODE2'];
            $COUNTRY2 = $rows['COUNTRY2'];
            $POBOX = $rows['POBOX'];
            $ADDRESS3 = $rows['ADDRESS3'];
            $CITY3 = $rows['CITY3'];
            $PROVINCE3 = $rows['PROVINCE3'];
            $POSTALCODE3 = $rows['POSTALCODE3'];
            $COUNTRY3 = $rows['COUNTRY3'];
            $EMPLOYER = $rows['EMPLOYER'];
            $PHONE2 = $rows['EMPLOYERPHONE'];
            $EMAILADDRESS2 = $rows['EMPLOYEREMAIL'];
            $ADDRESS4 = $rows['EMPLOYERROAD'];
            $CITY4 = $rows['EMPLOYERCITY'];
            $PROVINCE4 = $rows['EMPLOYERPROVINCE'];
            $POSTALCODE4 = $rows['EMPLOYERPOSTALCODE'];
            $COUNTRY4 = $rows['EMPLOYERCOUNTRY'];
            $DESIGNATION = $rows['DESIGNATION'];
            $RECEPTIONISTNAME = $rows['RECEPTIONNAME'];
            $REFDOCTORNAME = $rows['REFDOCTORNAME'];
            $REFDOCTOREMAIL = $rows['REFDOCTOREMAIL'];;
            $REFDOCTORPHONE = $rows['REFDOCTORPHONENUMBER'];
            $BRANCH = $rows['BRANCH'];
            $PAYMENTTYPE = $rows['REFDOCTORPAYMENTTYPE'];
            $WARD = $rows['WARD'];
            $EXAMDATE = $rows['EXAMDATE'];
            $ASSIGNRADIOGRAPHER = $rows['ASSIGNRADIOGRAPHER'];
            $ASSIGNDOCTOR = $rows['ASSIGNDOCTOR'];
            $EMAILADDRESS2 = $rows['REFDOCTOREMAIL'];
            $DESIGNATION = $rows['DESIGNATION'];
            $EXAM = $rows['EXAM'];
            $PROCEDURE = $rows['MEDICALPROCEDURE'];
            $MEDICALREFERRALLETTER = $rows['MedicalReferralLetter'];
            $MEDICALAIDNUMBER = $rows['MedicalAidCardID'];

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
<title>Searched</title>
<link href="Css/style.css" rel="stylesheet" type="text/css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<link rel="stylesheet" href="https://fonts.google.com/specimen/Montserrat"type='text/css'>
<link href='http://fonts.googleapis.com/css?family=Montserrat' rel='stylesheet' type='text/css'>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
</head> 
<body>
<div class="Content1">
<div class="tab" style="background: black;border: 2px solid black;border-bottom: 2px solid red;">
<button class="tablinks" onclick="openCity(event, 'RIS')">RIS</button>
<button style="width: 30%;"></button>
<i class="fa fa-search" id ="left" style="color: white;"></i><button class="tablinks" onclick="openCity(event, 'SEARCHS')"> SEARCH</button>
<i class="fa fa-briefcase" id ="left" style="color: white;"></i><button class="tablinks" onclick="openCity(event, 'SEARCHED')" >SEARCHED</button>
<i class="fa fa-envelope" id ="left" style="color: white;"></i><button class="tablinks" onclick="openCity(event, 'REPORTS')">REPORT</button>
<i class="fa fa-question-circle" id ="left" style="color: white;"></i><button class="tablinks" onclick="openCity(event, 'HELP')">HELP</button>
<button class="tablinks" onclick="openCity(event, 'PACS')" style="border: none;">PACS</button>
</div>

<!-- Tab content -->
<div id="RIS" class="tabcontent" >
<center>
<Section id="Search">
  
</Section>
</center>
</div>

<div id="SEARCHED" class="tabcontent" style="display:block;border: 1px solid black;">
  <div class="tab" style="opacity: 0.8;background: black;border: 2px solid black;border-bottom: 2px solid red;">
<center style="margin-top: 15px;">
<label class="tablinks" onclick="openCity(event, 'SEARCHED')" >PATIENT INFO</label>
<label class="tablinks" onclick="openCity(event, 'SCHEME DETAILS')">SCHEME DETAILS</label>
<label class="tablinks" onclick="openCity(event, 'EMPLOYER DETAILS')">EMPLOYER DETAILS</label>
<label class="tablinks" onclick="openCity(event, 'EXAMINATION DETAILS')">EXAMINATION DETAILS</label>
<label class="tablinks" onclick="openCity(event, 'DOCUMENTS')">DOCUMENTS</label>
</center>
</div>
 <section class="display">
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
    <td style="text-align: center;color: white;">XN</td>
  </tr>
  <tr>
        <td><input type="text" name="SESSIONID" value="<?php echo $SESSIONID;?>" style="width: 142px;border-radius: 20px 20px 20px 20px;padding-left: 20px;padding-right: 20px;border: 1px solid white;background: black;color: white;text-align: center;" readonly></td>
        <td></td>
        <td><input type="text" name="MRN" id="MRN" value="<?php echo $MRN;?>" style="width: 142px;border-radius: 20px 20px 20px 20px;padding-left: 20px;padding-right: 20px;border: 1px solid white;background: black;color: white;text-align: center;" readonly></td>
        <td></td>
        <td><input type="text" name="XN" id="XN" value="<?php echo $XN;?>" style="width: 142px;border-radius: 20px 20px 20px 20px;padding-left: 20px;padding-right: 20px;border: 1px solid white;background: black;color: white;text-align: center;" readonly></td>
  </tr>
  <tr>
        <td style="font-size: 10px;text-align: center;color: white;"></td>
        <td style="font-size: 10px;text-align: center;color: white;"></td>
        <td style="font-size: 10px;text-align: center;color: white;"><button class="edit" id="MRN1" type="button" >EDIT</button> | <label>SAVE</label></td>
        <td style="font-size: 10px;text-align: center;color: white;"></td>
        <td style="font-size: 10px;text-align: center;color: white;"><button class="edit" id="XN1" type="button" >EDIT</button> | <label>SAVE</label></td>   
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
    <td style="text-align: center;color: white;">First Name</td>
    <td style="text-align: center;color: white;"></td>
    <td style="text-align: center;color: white;">Last Name</td>
    <td style="text-align: center;color: white;"></td>
    <td style="text-align: center;color: white;">Identity Number</td>
  </tr>
  <tr>
        <td><input type="text" name="FirstName" id="FN" value="<?php echo $FIRSTNAME;?>" placeholder="John" style="width: 142px;border-radius: 20px 20px 20px 20px;padding-left: 20px;padding-right: 20px;border: 1px solid white;background: black;color: white;text-align: center;" readonly></td>
        <td></td>
        <td><input type="text" name="LastName" id="LN" value="<?php echo $LASTNAME;?>" placeholder="Doe" style="width: 142px;border-radius: 20px 20px 20px 20px;padding-left: 20px;padding-right: 20px;border: 1px solid white;background: black;color: white;text-align: center;" readonly></td>
        <td></td>
        <td><input type="text" name="IdentityNumber" id="IDN" value="<?php echo $IDENTITYNUMBER;?>" placeholder="xxxxxxxxxxxxx" style="width: 142px;border-radius: 20px 20px 20px 20px;padding-left: 20px;padding-right: 20px;border: 1px solid white;background: black;color: white;text-align: center;" readonly></td>
  </tr>
  <tr>
        <td style="font-size: 10px;text-align: center;color: white;"><button class="edit" id="FN1" type="button" >EDIT</button> | <label>SAVE</label></td>
        <td style="font-size: 10px;text-align: center;color: white;"></td>
        <td style="font-size: 10px;text-align: center;color: white;"><button class="edit" id="LN1" type="button" >EDIT</button> | <label>SAVE</label></td>
        <td style="font-size: 10px;text-align: center;color: white;"></td>
        <td style="font-size: 10px;text-align: center;color: white;"><button class="edit" id="IDN1" type="button" >EDIT</button> | <label>SAVE</label></td>  
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
    <td style="text-align: center;color: white;">Fax Number</td>
    <td style="text-align: center;color: white;"></td>
    <td style="text-align: center;color: white;">Email Address</td>
  </tr>
  <tr>
        <td><input type="text" name="PhoneNumber" id="PN" value="<?php echo $PHONE;?>" placeholder="000 000 0000" style="width: 142px;border-radius: 20px 20px 20px 20px;padding-left: 20px;padding-right: 20px;border: 1px solid white;background: black;color: white;text-align: center;" readonly></td>
        <td></td>
        <td><input type="text" name="FaxNumber" id="Fax"  value="<?php echo $FAX;?>" placeholder="000 000 0000" style="width: 142px;border-radius: 20px 20px 20px 20px;padding-left: 20px;padding-right: 20px;border: 1px solid white;background: black;color: white;text-align: center;" readonly></td>
        <td></td>
        <td><input type="text" name="EmailAddress" id="EA" value="<?php echo $EMAIL;?>" placeholder="JohnDoe@Gmail.com" style="width: 142px;border-radius: 20px 20px 20px 20px;padding-left: 20px;padding-right: 20px;border: 1px solid white;background: black;color: white;text-align: center;" readonly></td>
  </tr>
  <tr>
        <td style="font-size: 10px;text-align: center;color: white;"><button class="edit" id="PN1" type="button" >EDIT</button> | <label>SAVE</label></td>
        <td style="font-size: 10px;text-align: center;color: white;"></td>
        <td style="font-size: 10px;text-align: center;color: white;"><button class="edit" id="Fax1" type="button" >EDIT</button> | <label>SAVE</label></td>
        <td style="font-size: 10px;text-align: center;color: white;"></td>
        <td style="font-size: 10px;text-align: center;color: white;"><button class="edit" id="EA1" type="button" >EDIT</button> | <label>SAVE</label></td>  
  </tr>
  <tr>
        <td></td>
        <td></td>
        <td></td>
        <td></td>
        <td></td>  
  </tr>
  <tr>
    <td colspan="5" style="text-align: center;color: white;">Note</td>
  </tr>
  <tr>
    <td colspan="5">
      <textarea rows = "3" id="Note" style="width: 100%;text-align: center;border-radius: 20px 20px 20px 20px;border: 1px solid white;background: black;color: white;text-align: center; " name = "NOTE" readonly>
        <?php echo $NOTE;?>
      </textarea>
    </td>
  </tr>
  <tr>
        <td></td>
        <td></td>
        <td style="font-size: 10px;text-align: center;color: white;"><button class="edit" id="Note1" type="button" >EDIT</button> | <label>SAVE</label></td>
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
  <tr>
    <td style="text-align: center;color: white;">Address</td>
    <td style="text-align: center;color: white;">City</td>
    <td style="text-align: center;color: white;">Province</td>
    <td style="text-align: center;color: white;">Postal Code</td>
    <td style="text-align: center;color: white;">Country</td>
  </tr>
  <tr>
        <td><input type="text" name="Address" id="Add" value="<?php echo $ADDRESS;?>" placeholder="14 Bert Booysen" style="width: 142px;border-radius: 20px 20px 20px 20px;padding-left: 20px;padding-right: 20px;border: 1px solid white;background: black;color: white;text-align: center;" readonly></td>
        <td><input type="text" name="City" id="Cty" value="<?php echo $CITY;?>" placeholder="Tzaneen" style="width: 142px;border-radius: 20px 20px 20px 20px;padding-left: 20px;padding-right: 20px;border: 1px solid white;background: black;color: white;text-align: center;" readonly></td>
        <td><input type="text" name="Province" id="Prv" value="<?php echo $PROVINCE;?>" placeholder="Limpopo" style="width: 142px;border-radius: 20px 20px 20px 20px;padding-left: 20px;padding-right: 20px;border: 1px solid white;background: black;color: white;text-align: center;" readonly></td>
        <td><input type="text" name="PostalCode" id="PC" value="<?php echo $POSTALCODE;?>"  placeholder="0000" style="width: 142px;border-radius: 20px 20px 20px 20px;padding-left: 20px;padding-right: 20px;border: 1px solid white;background: black;color: white;text-align: center;" readonly></td>
        <td><input type="text" name="Country" id="Ctry" value="<?php echo $COUNTRY;?>"  placeholder="South Africa" style="width: 142px;border-radius: 20px 20px 20px 20px;padding-left: 20px;padding-right: 20px;border: 1px solid white;background: black;color: white;text-align: center;" readonly></td>
  </tr>
   <tr>
        <td style="font-size: 10px;text-align: center;color: white;"><button class="edit" id="Add1" type="button" >EDIT</button> | <label>SAVE</label></td>
        <td style="font-size: 10px;text-align: center;color: white;"><button class="edit" id="Cty1" type="button" >EDIT</button> | <label>SAVE</label></td>
        <td style="font-size: 10px;text-align: center;color: white;"><button class="edit" id="Prv1" type="button" >EDIT</button> | <label>SAVE</label></td>
        <td style="font-size: 10px;text-align: center;color: white;"><button class="edit" id="PC1" type="button" >EDIT</button> | <label>SAVE</label></td>
        <td style="font-size: 10px;text-align: center;color: white;"><button class="edit" id="Ctry1" type="button" >EDIT</button> | <label>SAVE</label></td>  
  </tr>
  <tr>
        <td></td>
        <td></td>
        <td></td>
        <td></td>
        <td></td>  
  </tr>
  <tr>
    <td style="text-align: center;color: white;">Allergy</td>
    <td style="text-align: center;color: white;">Height</td>
    <td style="text-align: center;color: white;">Weight</td>
    <td style="text-align: center;color: white;">Patient Type</td>
    <td style="text-align: center;color: white;">Medical Alert</td>
  </tr>
  <tr>
        <td><input type="text" name="ALLERGY" id="Alg" value="<?php echo $ALLERGY;?>"  style="width: 142px;border-radius: 20px 20px 20px 20px;padding-left: 20px;padding-right: 20px;border: 1px solid white;background: black;color: white;text-align: center;" readonly></td>
        <td><input type="Number" name="HEIGHT" id="Hgt" value="<?php echo $HEIGHT;?>" placeholder="CM" style="width: 142px;border-radius: 20px 20px 20px 20px;padding-left: 20px;padding-right: 20px;border: 1px solid white;background: black;color: white;text-align: center;" readonly></td>
        <td><input type="Number" name="WEIGHT" id="Wgt" value="<?php echo $WEIGHT;?>" placeholder="KG" style="width: 142px;border-radius: 20px 20px 20px 20px;padding-left: 20px;padding-right: 20px;border: 1px solid white;background: black;color: white;text-align: center;" readonly></td>
        <td>
    <select name="PATIENTTYPE" id=""PT style="width: 142px; text-align: center;border-radius: 20px 20px 20px 20px;padding-left: 20px;padding-right: 20px;border: 1px solid white;background: black;color: white;text-align: center;" disabled="disabled">
    <option value="<?php echo $PATIENTTYPE;?>" selected="selected"><?php echo $PATIENTTYPE;?></option>
    <option value="WALK">WALK</option>
    <option value="SLIDE">SLIDE</option>
    <option value="WHEELCHAIR">WHEEL CHAIR</option>
    <option value="BED">BED</option>
    <option value="PORTABLE">PORTABLE</option>
    </select>
        </td>
        <td>
    <select name="MEDICALALERT" id="MA" style="width: 142px; text-align: center;border-radius: 20px 20px 20px 20px;padding-left: 20px;padding-right: 20px;border: 1px solid white;background: black;color: white;text-align: center;" disabled="disabled">
    <option value="<?php echo $MEDICALALERT;?>" selected="selected"><?php echo $MEDICALALERT;?></option>
    <option value="PREGNANCY">PREGNANCY</option>
    <option value="ALLERGY">ALLERGY</option>
    </select>
    </td>
     <tr>
        <td style="font-size: 10px;text-align: center;color: white;"><button class="edit" id="Alg1" type="button" >EDIT</button> | <label>SAVE</label></td>
        <td style="font-size: 10px;text-align: center;color: white;"><button class="edit" id="Hgt1" type="button" >EDIT</button> | <label>SAVE</label></td>
        <td style="font-size: 10px;text-align: center;color: white;"><button class="edit" id="Wgt1" type="button" >EDIT</button> | <label>SAVE</label></td>
        <td style="font-size: 10px;text-align: center;color: white;"><button class="edit" id="PT1" type="button" >EDIT</button> | <label>SAVE</label></td>
        <td style="font-size: 10px;text-align: center;color: white;"><button class="edit" id="MA1" type="button" >EDIT</button> | <label>SAVE</label></td>  
  </tr>
  <tr>
        <td></td>
        <td></td>
        <td></td>
        <td></td>
        <td></td>  
  </tr>
  </tr>
    <td style="text-align: center;"></td>
    <td style="text-align: center;"></td>
    <td style="text-align: center;color: white;">Type</td>
    <td style="text-align: center;"></td>
    <td style="text-align: center;"></td>
  </tr>
  <tr>
        <td>
        </td>
        <td>
    </td>
        <td>
    <select name="TYPE" id="Typ" style="width: 182px; text-align: center;border-radius: 20px 20px 20px 20px;padding-left: 20px;padding-right: 20px;border: 1px solid white;background: black;color: white;text-align: center;" disabled="disabled">
    <option value="<?php echo $TYPE;?>" selected="selected"><?php echo $TYPE;?></option>
    <option value="IOD">IOD</option>
    <option value="MVC">MVC</option>
    <option value="EMERGENCY">EMERGENCY</option>
    </select>
        </td>
         <td>
        </td>
        <td>
    </td>
      </tr>
       <tr>
        <td style="font-size: 10px;text-align: center;"></td>
        <td style="font-size: 10px;text-align: center;"></td>
        <td style="font-size: 10px;text-align: center;color: white;"><button class="edit" id="Typ1" type="button" >EDIT</button> | <label>SAVE</label></td>
        <td style="font-size: 10px;text-align: center;"></td>
        <td style="font-size: 10px;text-align: center;"></td>  
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
<label class="tablinks" onclick="openCity(event, 'SEARCHED')" >PATIENT INFO</label>
<label class="tablinks" onclick="openCity(event, 'SCHEME DETAILS')">SCHEME DETAILS</label>
<label class="tablinks" onclick="openCity(event, 'EMPLOYER DETAILS')">EMPLOYER DETAILS</label>
<label class="tablinks" onclick="openCity(event, 'EXAMINATION DETAILS')">EXAMINATION DETAILS</label>
<label class="tablinks" onclick="openCity(event, 'DOCUMENTS')">DOCUMENTS</label>
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
        <td><input type="text" name="MEDICALSCHEME" id="MS" value="<?php echo $MEDICALSCHEME;?>" placeholder="GEMS" style="width: 142px;border-radius: 20px 20px 20px 20px;padding-left: 20px;padding-right: 20px;border: 1px solid white;background: black;color: white;text-align: center;" readonly></td>
        <td><input type="text" name="MEDICALAIDNUMBER" id="MAIDN" value="<?php echo $MEDICALAIDNUMBER;?>" placeholder="000 000 0000" style="width: 142px;border-radius: 20px 20px 20px 20px;padding-left: 20px;padding-right: 20px;border: 1px solid white;background: black;color: white;text-align: center;" readonly></td>
        <td><input type="text" name="MEMBERFIRSTNAME" id="MFN" value="<?php echo $MEMBERFIRSTNAME;?>" placeholder="John" style="width: 142px;border-radius: 20px 20px 20px 20px;padding-left: 20px;padding-right: 20px;border: 1px solid white;background: black;color: white;text-align: center;" readonly></td>
        <td><input type="text" name="MEMBERLASTNAME" id="MLN" value="<?php echo $MEMBERLASTNAME;?>" placeholder="Doe" style="width: 142px;border-radius: 20px 20px 20px 20px;padding-left: 20px;padding-right: 20px;border: 1px solid white;background: black;color: white;text-align: center;" readonly></td>
        <td><input type="text" name="IDNUMBERPASSPORT" id="IDNP" value="<?php echo $IDNUMBERPASSPORT;?>" placeholder="000000000000" style="width: 142px;border-radius: 20px 20px 20px 20px;padding-left: 20px;padding-right: 20px;border: 1px solid white;background: black;color: white;text-align: center;" readonly></td>
  </tr>
  <tr>
        <td style="font-size: 10px;text-align: center;color: white;"><button class="edit" id="MS1" type="button" >EDIT</button> | <label>SAVE</label></td>
        <td style="font-size: 10px;text-align: center;color: white;"><button class="edit" id="MAIDN1" type="button" >EDIT</button> | <label>SAVE</label></td>
        <td style="font-size: 10px;text-align: center;color: white;"><button class="edit" id="MFN1" type="button" >EDIT</button> | <label>SAVE</label></td>
        <td style="font-size: 10px;text-align: center;color: white;"><button class="edit" id="MLN1" type="button" >EDIT</button> | <label>SAVE</label></td>
        <td style="font-size: 10px;text-align: center;color: white;"><button class="edit" id="IDNP1" type="button" >EDIT</button> | <label>SAVE</label></td>   
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
    <td style="text-align: center;color: white;">Date Of Birth</td>
    <td style="text-align: center;color: white;">Relation To Member</td>
    <td></td>
    <td style="text-align: center;color: white;">No. Of Dependants</td>
    <td style="text-align: center;color: white;">Next Of Kin</td>
  </tr>
  <tr>
        <td><input type="DATE" name="DATEOFBIRTH" id="DOB" value="<?php echo $DATEOFBIRTH;?>" style="width: 142px;border-radius: 20px 20px 20px 20px;padding-left: 20px;padding-right: 20px;border: 1px solid white;background: black;color: white;text-align: center;" readonly></td>
        <td>
          <select name="RELATIONTOMEMBER" id="RTM" style="width: 182px; text-align: center;border-radius: 20px 20px 20px 20px;padding-left: 20px;padding-right: 20px;border: 1px solid white;background: black;color: white;text-align: center;" disabled="disabled">
    <option value="<?php echo $RELATIONTOMEMBER;?>"><?php echo $RELATIONTOMEMBER;?></option>
    <option value="SELF">SELF</option>
    <option value="PARENT">PARENT</option>
    <option value="SISTER">SISTER</option>
    <option value="BROTHER">BROTHER</option>
    <option value="OTHER">OTHER</option>
    </select>
        </td>
        <td></td>
        <td><input type="number" name="NUMBEROFDEPENDANTS" id="NOD" value="<?php echo $NUMBEROFDEPENDANTS;?>" style="width: 142px;border-radius: 20px 20px 20px 20px;padding-left: 20px;padding-right: 20px;border: 1px solid white;background: black;color: white;text-align: center;" readonly></td>
        <td><input type="text" name="NEXTOFKIN" id="NOK" value="<?php echo $NEXTOFKIN;?>"  placeholder="Brother" style="width: 142px;border-radius: 20px 20px 20px 20px;padding-left: 20px;padding-right: 20px;border: 1px solid white;background: black;color: white;text-align: center;" readonly></td>
        </tr>
  <tr>
        <td style="font-size: 10px;text-align: center;color: white;"><button class="edit" id="DOB1" type="button" >EDIT</button> | <label>SAVE</label></td>
        <td style="font-size: 10px;text-align: center;color: white;"><button class="edit" id="RTM1" type="button" >EDIT</button> | <label>SAVE</label></td>
        <td style="font-size: 10px;text-align: center;color: white;"><label></label></td>
        <td style="font-size: 10px;text-align: center;color: white;"><button class="edit" id="NOD1" type="button" >EDIT</button> | <label>SAVE</label></td>
        <td style="font-size: 10px;text-align: center;color: white;"><button class="edit" id="NOK1" type="button" >EDIT</button> | <label>SAVE</label></td>  
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
    <td style="text-align: center;color: white;">Address</td>
    <td style="text-align: center;color: white;">City</td>
    <td style="text-align: center;color: white;">Province</td>
    <td style="text-align: center;color: white;">Postal Code</td>
    <td style="text-align: center;color: white;">Country</td>
  </tr>
  <tr>
        <td><input type="text" name="ADDRESS2" id="Add2" value="<?php echo $ADDRESS2;?>" placeholder="14 Bert Booysen"style="width: 142px;border-radius: 20px 20px 20px 20px;padding-left: 20px;padding-right: 20px;border: 1px solid white;background: black;color: white;text-align: center;" readonly></td>
        <td><input type="text" name="CITY2" id="Cty2"  value="<?php echo $CITY2;?>" placeholder="Tzaneen" style="width: 142px;border-radius: 20px 20px 20px 20px;padding-left: 20px;padding-right: 20px;border: 1px solid white;background: black;color: white;text-align: center;" readonly></td>
        <td><input type="text" name="PROVINCE2" id="Prv2" value="<?php echo $PROVINCE2;?>" placeholder="Limpopo" style="width: 142px;border-radius: 20px 20px 20px 20px;padding-left: 20px;padding-right: 20px;border: 1px solid white;background: black;color: white;text-align: center;" readonly></td>
        <td><input type="text" name="PostalCode2" id="PC2" value="<?php echo $POSTALCODE2;?>" placeholder="0850" style="width: 142px;border-radius: 20px 20px 20px 20px;padding-left: 20px;padding-right: 20px;border: 1px solid white;background: black;color: white;text-align: center;" readonly></td>
        <td><input type="text" name="Country2" id="Ctry2" value="<?php echo $COUNTRY2;?>" placeholder="South Africa" style="width: 142px;border-radius: 20px 20px 20px 20px;padding-left: 20px;padding-right: 20px;border: 1px solid white;background: black;color: white;text-align: center;"readonly></td>
  </tr>
  <tr>
        <td style="font-size: 10px;text-align: center;color: white;"><button class="edit" id="Add21" type="button" >EDIT</button> | <label>SAVE</label></td>
        <td style="font-size: 10px;text-align: center;color: white;"><button class="edit" id="Cty21" type="button" >EDIT</button> | <label>SAVE</label></td>
        <td style="font-size: 10px;text-align: center;color: white;"><button class="edit" id="Prv21" type="button" >EDIT</button> | <label>SAVE</label></td>
        <td style="font-size: 10px;text-align: center;color: white;"><button class="edit" id="PC21" type="button" >EDIT</button> | <label>SAVE</label></td>
        <td style="font-size: 10px;text-align: center;color: white;"><button class="edit" id="Ctry21" type="button" >EDIT</button> | <label>SAVE</label></td>   
  </tr>
  <tr>
        <td></td>
        <td></td>
        <td></td>
        <td></td>
        <td></td>  
  </tr>
  <th colspan="5" style="color: white;">POSTAL ADDRESS</th>
      <br>
      <tr>
        <td colspan="5"><hr style="border: 1px solid red;"></td>
      </tr>
  <tr>
    <td style="text-align: center;color: white;">Address</td>
    <td style="text-align: center;color: white;">City</td>
    <td style="text-align: center;color: white;">Province</td>
    <td style="text-align: center;color: white;">Postal Code</td>
    <td style="text-align: center;color: white;">Country</td>
  </tr>
  <tr>
        <td><input type="text" name="Address3" id="Add3" value="<?php echo $ADDRESS3;?>" placeholder="14 Bert Booysen" style="width: 142px;border-radius: 20px 20px 20px 20px;padding-left: 20px;padding-right: 20px;border: 1px solid white;background: black;color: white;text-align: center;" readonly></td>
        <td><input type="text" name="City3" id="Cty3"  value="<?php echo $CITY3;?>" placeholder="Tzaneen" style="width: 142px;border-radius: 20px 20px 20px 20px;padding-left: 20px;padding-right: 20px;border: 1px solid white;background: black;color: white;text-align: center;" readonly></td>
        <td><input type="text" name="Province3" id="Prv3" value="<?php echo $PROVINCE3;?>" placeholder="Limpopo" style="width: 142px;border-radius: 20px 20px 20px 20px;padding-left: 20px;padding-right: 20px;border: 1px solid white;background: black;color: white;text-align: center;" readonly></td>
        <td><input type="text" name="PostalCode3" id="PC3" value="<?php echo $POSTALCODE3;?>"  placeholder="0000" style="width: 142px;border-radius: 20px 20px 20px 20px;padding-left: 20px;padding-right: 20px;border: 1px solid white;background: black;color: white;text-align: center;" readonly></td>
        <td><input type="text" name="Country3" id="Ctry3" value="<?php echo $COUNTRY3;?>"  placeholder="South Africa" style="width: 142px;border-radius: 20px 20px 20px 20px;padding-left: 20px;padding-right: 20px;border: 1px solid white;background: black;color: white;text-align: center;" readonly></td>
  </tr>
   <tr>
        <td style="font-size: 10px;text-align: center;color: white;"><button class="edit" id="Add31" type="button" >EDIT</button> | <label>SAVE</label></td>
        <td style="font-size: 10px;text-align: center;color: white;"><button class="edit" id="Cty31" type="button" >EDIT</button> | <label>SAVE</label></td>
        <td style="font-size: 10px;text-align: center;color: white;"><button class="edit" id="Prv31" type="button" >EDIT</button> | <label>SAVE</label></td>
        <td style="font-size: 10px;text-align: center;color: white;"><button class="edit" id="PC31" type="button" >EDIT</button> | <label>SAVE</label></td>
        <td style="font-size: 10px;text-align: center;color: white;"><button class="edit" id="Ctry31" type="button" >EDIT</button> | <label>SAVE</label></td>
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
 <label class="input-group-text" onclick="openCity(event, 'SEARCHED')" style="color: white;"><i class="fa fa-arrow-left"></i> BACK</label>
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
<label class="tablinks" onclick="openCity(event, 'SEARCHED')" >PATIENT INFO</label>
<label class="tablinks" onclick="openCity(event, 'SCHEME DETAILS')">SCHEME DETAILS</label>
<label class="tablinks" onclick="openCity(event, 'EMPLOYER DETAILS')">EMPLOYER DETAILS</label>
<label class="tablinks" onclick="openCity(event, 'EXAMINATION DETAILS')">EXAMINATION DETAILS</label>
<label class="tablinks" onclick="openCity(event, 'DOCUMENTS')">DOCUMENTS</label>
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
    <td style="text-align: center;color: white;">Employer</td>
    <td style="text-align: center;color: white;">Phone</td>
    <td></td>
    <td style="text-align: center;color: white;">Email Address</td>
    <td style="text-align: center;color: white;">Designation</td>
  </tr>
  <tr>
        <td><input type="text" name="EMPLOYER" id="Emp" value="<?php echo $EMPLOYER;?>" placeholder="Gautrain" style="width: 142px;border-radius: 20px 20px 20px 20px;padding-left: 20px;padding-right: 20px;border: 1px solid white;background: black;color: white;text-align: center;" readonly></td>
        <td><input type="text" name="PHONE2" id="P2" value="<?php echo $PHONE2?>" placeholder="000 000 0000" style="width: 142px;border-radius: 20px 20px 20px 20px;padding-left: 20px;padding-right: 20px;border: 1px solid white;background: black;color: white;text-align: center;" readonly></td>
        <td></td>
        <td><input type="Email" name="EMAILADDRESS2" id="EA2" value="<?php echo $EMAILADDRESS2;?>" placeholder="JohnDoe@Gmail.com" style="width: 142px;border-radius: 20px 20px 20px 20px;padding-left: 20px;padding-right: 20px;border: 1px solid white;background: black;color: white;text-align: center;" readonly></td>
        <td><input type="text" name="DESIGNATION" id="Dsg" value="<?php echo $DESIGNATION;?>" placeholder="I Dont Know" style="width: 142px;border-radius: 20px 20px 20px 20px;padding-left: 20px;padding-right: 20px;border: 1px solid white;background: black;color: white;text-align: center;" readonly></td>
  </tr>
  <tr>
        <td style="font-size: 10px;text-align: center;color: white;"><button class="edit" id="Emp1" type="button" >EDIT</button> | <label>SAVE</label></td>
        <td style="font-size: 10px;text-align: center;color: white;"><button class="edit" id="p21" type="button" >EDIT</button> | <label>SAVE</label></td>
        <td style="font-size: 10px;text-align: center;"><label></label></td>
        <td style="font-size: 10px;text-align: center;color: white;"><button class="edit" id="EA21" type="button" >EDIT</button> | <label>SAVE</label></td>
        <td style="font-size: 10px;text-align: center;color: white;"><button class="edit" id="Dsg1" type="button" >EDIT</button> | <label>SAVE</label></td>   
  </tr>
  <tr>
     <tr>
        <td></td>
        <td></td>
        <td></td>
        <td></td>
        <td></td>  
  </tr>
  <th colspan="5" style="color: white;">EMPLOYER DETAILS</th>
      <br>
      <tr>
        <td colspan="5"><hr style="border: 1px solid red;"></td>
      </tr>
  <tr>
    <td style="text-align: center;color: white;">Address</td>
    <td style="text-align: center;color: white;">City</td>
    <td style="text-align: center;color: white;">Province</td>
    <td style="text-align: center;color: white;">Postal Code</td>
    <td style="text-align: center;color: white;">Country</td>
  </tr>
  <tr>
        <td><input type="text" name="ADDRESS4" id="Add4" value="<?php echo $ADDRESS4;?>" placeholder="14 Bert Booysen" style="width: 142px;border-radius: 20px 20px 20px 20px;padding-left: 20px;padding-right: 20px;border: 1px solid white;background: black;color: white;text-align: center;"readonly></td>
        <td><input type="text" name="CITY4" id="Cty4" value="<?php echo $CITY4;?>" placeholder="Tzaneen" style="width: 142px;border-radius: 20px 20px 20px 20px;padding-left: 20px;padding-right: 20px;border: 1px solid white;background: black;color: white;text-align: center;"readonly></td>
        <td><input type="text" name="PROVINCE4" id="Prv4" value="<?php echo $PROVINCE4;?>" placeholder="Limpopo" style="width: 142px;border-radius: 20px 20px 20px 20px;padding-left: 20px;padding-right: 20px;border: 1px solid white;background: black;color: white;text-align: center;"readonly></td>
        <td><input type="text" name="POSTALCODE4" id="PC4" value="<?php echo $POSTALCODE4;?>" placeholder="0850" style="width: 142px;border-radius: 20px 20px 20px 20px;padding-left: 20px;padding-right: 20px;border: 1px solid white;background: black;color: white;text-align: center;"readonly></td>
        <td><input type="text" name="COUNTRY4" id="Ctry4" value="<?php echo $COUNTRY4;?>" placeholder="South Africa" style="width: 142px;border-radius: 20px 20px 20px 20px;padding-left: 20px;padding-right: 20px;border: 1px solid white;background: black;color: white;text-align: center;"readonly></td>
  </tr>
  <tr>
        <td style="font-size: 10px;text-align: center;color: white;"><button class="edit" id="Add41" type="button" >EDIT</button> | <label>SAVE</label></td>
        <td style="font-size: 10px;text-align: center;color: white;"><button class="edit" id="Cty41" type="button" >EDIT</button> | <label>SAVE</label></td>
        <td style="font-size: 10px;text-align: center;color: white;"><button class="edit" id="Prv41" type="button" >EDIT</button> | <label>SAVE</label></td>
        <td style="font-size: 10px;text-align: center;color: white;"><button class="edit" id="PC41" type="button" >EDIT</button> | <label>SAVE</label></td>
        <td style="font-size: 10px;text-align: center;color: white;"><button class="edit" id="Ctry41" type="button" >EDIT</button> | <label>SAVE</label></td>  
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
 <label class="input-group-text" onclick="openCity(event, 'SCHEME DETAILS')" style="color: white;"><i class="fa fa-arrow-left"></i> BACK</label>
</div></td>
    <td><div class="hover">
 <label class="input-group-text" onclick="openCity(event, 'EXAMINATION DETAILS')" style="color: white;"><i class="fa fa-arrow-right"></i> NEXT</label>
</div></td>
  </tr>
</table>
</CENTER>
  </section>
</div>

<div id="EXAMINATION DETAILS" class="tabcontent" style="border: 1px solid black;">
  <div class="tab" style="opacity: 0.8;background: black;border: 2px solid black;border-bottom: 2px solid red;">
<center style="margin-top: 15px;">
<label class="tablinks" onclick="openCity(event, 'SEARCHED')" >PATIENT INFO</label>
<label class="tablinks" onclick="openCity(event, 'SCHEME DETAILS')">SCHEME DETAILS</label>
<label class="tablinks" onclick="openCity(event, 'EMPLOYER DETAILS')">EMPLOYER DETAILS</label>
<label class="tablinks" onclick="openCity(event, 'EXAMINATION DETAILS')">EXAMINATION DETAILS</label>
<label class="tablinks" onclick="openCity(event, 'DOCUMENTS')">DOCUMENTS</label>
</center>
</div>
 <section class="display">
  <CENTER style="height: 650px;">
<table>
  <th colspan="5" style="color: white;">EXAMINATION DETAILS</th>
      <br>
      <tr>
        <td colspan="5"><hr style="border: 1px solid red;"></td>
      </tr>
  <tr>
   <td style="text-align: center;color: white;">Receptionist Name</td>
    <td style="text-align: center;color: white;">Ref. Doctor Name</td>
    <td style="text-align: center;color: white;">Ref. Doctor Email</td>
    <td style="text-align: center;color: white;">Ref Doctor Phone No.</td>
    <td style="text-align: center;color: white;">Branch</td>
  </tr>
  <tr>
         <td>
    <select name="RECEPTIONISTNAME" id="RN" style="width: 182px; text-align: center;border-radius: 20px 20px 20px 20px;padding-left: 20px;padding-right: 20px;border: 1px solid white;background: black;color: white;text-align: center;" disabled="disabled">
    <option value="<?php echo $RECEPTIONISTNAME;?>" selected="selected"><?php echo $RECEPTIONISTNAME;?></option>
    <option value="JonesModjadji">Jones Modjadji</option>
    <option value="MathewNaidoo">Mathew Naido</option>
    <option value="JoshNdlovu">Josh Ndlovu</option>
    </select>
        </td>
        <td><input type="text" name="REFDOCTORNAME" id="RDN" value="<?php echo $REFDOCTORNAME;?>" placeholder="John" style="width: 142px;border-radius: 20px 20px 20px 20px;padding-left: 20px;padding-right: 20px;border: 1px solid white;background: black;color: white;text-align: center;" readonly></td>
        <td><input type="text" name="REFDOCTOREMAIL" id="RDE" value="<?php echo $REFDOCTOREMAIL;?>" placeholder="Doe" style="width: 142px;border-radius: 20px 20px 20px 20px;padding-left: 20px;padding-right: 20px;border: 1px solid white;background: black;color: white;text-align: center;" readonly></td>
        <td><input type="text" name="REFDOCTORPHONE" id="RDP" value="<?php echo $REFDOCTORPHONE;?>" placeholder="000 000 0000" style="width: 142px;border-radius: 20px 20px 20px 20px;padding-left: 20px;padding-right: 20px;border: 1px solid white;background: black;color: white;text-align: center;" readonly></td>
        <td>
    <select name="BRANCH" id="Brn" style="width: 182px; text-align: center;border-radius: 20px 20px 20px 20px;padding-left: 20px;padding-right: 20px;border: 1px solid white;background: black;color: white;text-align: center;" disabled="disabled">
    <option value="<?php echo $BRANCH;?>" selected="selected"><?php echo $BRANCH;?></option>
    <option value="PRETORIA">Pretoria</option>
    <option value="CAPETOWN">Cape Town</option>
    <option value="LIMPOPO">Limpopo</option>
    </select>
        </td>
  </tr>
  <tr>
        <td style="font-size: 10px;text-align: center;color: white;"><button class="edit" id="RN1" type="button" >EDIT</button> | <label>SAVE</label></td>
        <td style="font-size: 10px;text-align: center;color: white;"><button class="edit" id="RDN1" type="button" >EDIT</button> | <label>SAVE</label></td>
        <td style="font-size: 10px;text-align: center;color: white;"><button class="edit" id="RDE1" type="button" >EDIT</button> | <label>SAVE</label></td>
        <td style="font-size: 10px;text-align: center;color: white;"><button class="edit" id="RDP1" type="button" >EDIT</button> | <label>SAVE</label></td>
        <td style="font-size: 10px;text-align: center;color: white;"><button class="edit" id="Brn1" type="button" >EDIT</button> | <label>SAVE</label></td> 
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
   <td style="text-align: center;color: white;">Paymant Type</td>
    <td style="text-align: center;color: white;"></td>
    <td style="text-align: center;color: white;"></td>
    <td style="text-align: center;color: white;"></td>
    <td style="text-align: center;color: white;">Ward</td>
  </tr>
  <tr>
        <td>
    <select name="PAYMENTTYPE" id="PT2" style="width: 182px; text-align: center;border-radius: 20px 20px 20px 20px;padding-left: 20px;padding-right: 20px;border: 1px solid white;background: black;color: white;text-align: center;" disabled="disabled">
    <option value="<?php echo $PAYMENTTYPE;?>" selected="selected"><?php echo $PAYMENTTYPE;?></option>
    <option value="CASH">Cash</option>
    <option value="CREDITCARD">Credit Card</option>
    <option value="MEDICALAID">Medical Aid</option>
    <option value="PRODEO">Prodeo</option>
    <option value="OTHER">Other</option>
    </select>
        </td>
        <td></td>
        <td></td>
        <td></td>
        <td>
    <select name="WARD" id="Wrd" style="width: 182px; text-align: center;border-radius: 20px 20px 20px 20px;padding-left: 20px;padding-right: 20px;border: 1px solid white;background: black;color: white;text-align: center;" disabled="disabled">
    <option value="<?php echo $WARD;?>" selected="selected"><?php echo $WARD;?></option>
    <option value="WARD1">WARD1</option>
    <option value="WARD2">WARD2</option>
    <option value="WARD3">WARD3</option>
    </select>
        </td>
  </tr>
  <tr>
        <td style="font-size: 10px;text-align: center;color: white;"><button class="edit" id="PT21" type="button" >EDIT</button> | <label>SAVE</label></td>
        <td style="font-size: 10px;text-align: center;color: white;"><label></label></td>
        <td style="font-size: 10px;text-align: center;color: white;"><label></label></td>
        <td style="font-size: 10px;text-align: center;color: white;"><label></label></td>
        <td style="font-size: 10px;text-align: center;color: white;"><button class="edit" id="Wrd1" type="button" >EDIT</button> | <label>SAVE</label></td>   
  </tr>
  <tr>
     <tr>
        <td></td>
        <td></td>
        <td></td>
        <td></td>
        <td></td>  
  </tr>
  <th colspan="5" style="color: white;">SCHEDULE</th>
      <br>
      <tr>
        <td colspan="5"><hr style="border: 1px solid red;"></td>
      </tr>
  <tr>
    <td style="text-align: center;color: white;">Exam Date</td>
    <td></td>
    <td style="text-align: center;color: white;">Assign Radiographer</td>
    <td></td>
    <td style="text-align: center;color: white;">Assign Doctor</td>
  </tr>
  <tr>
        <td><input type="DATE" id="ED" name="EXAMDATE" value="<?php echo $EXAMDATE;?>" style="width: 142px;border-radius: 20px 20px 20px 20px;padding-left: 20px;padding-right: 20px;border: 1px solid white;background: black;color: white;text-align: center;" readonly></td>
        <td></td>
        <td>
    <select name="ASSIGNRADIOGRAPHER" id="AR" style="width: 182px; text-align: center;border-radius: 20px 20px 20px 20px;padding-left: 20px;padding-right: 20px;border: 1px solid white;background: black;color: white;text-align: center;" disabled="disabled">
    <option value="<?php echo $ASSIGNRADIOGRAPHER;?>" selected="selected"><?php echo $ASSIGNRADIOGRAPHER;?></option>
    <option value="JonesModjadji">Jones Modjadji</option>
    <option value="MathewNaidoo">Mathew Naido</option>
    <option value="JoshNdlovu">Josh Ndlovu</option>
    </select>
        </td>
        <td></td>
        <td>
    <select name="ASSIGNDOCTOR" id="AD" style="width: 182px; text-align: center;border-radius: 20px 20px 20px 20px;padding-left: 20px;padding-right: 20px;border: 1px solid white;background: black;color: white;text-align: center;" disabled="disabled">
    <option value="<?php echo $ASSIGNDOCTOR;?>" selected="selected"><?php echo $ASSIGNDOCTOR;?></option>
    <option value="JonesModjadji">Jones Modjadji</option>
    <option value="MathewNaidoo">Mathew Naido</option>
    <option value="JoshNdlovu">Josh Ndlovu</option>
    </select>
        </td>
  </tr>
  <tr>
        <td style="font-size: 10px;text-align: center;color: white;"><button class="edit" id="ED1" type="button" >EDIT</button> | <label>SAVE</label></td>
        <td style="font-size: 10px;text-align: center;color: white;"><label></label></td>
        <td style="font-size: 10px;text-align: center;color: white;"><button class="edit" id="AR1" type="button" >EDIT</button> | <label>SAVE</label></td>
        <td style="font-size: 10px;text-align: center;color: white;"><label></label></td>
        <td style="font-size: 10px;text-align: center;color: white;"><button class="edit" id="AD1" type="button" >EDIT</button> | <label>SAVE</label></td>  
  </tr>
  <tr>
        <td></td>
        <td></td>
        <td></td>
        <td></td>
        <td></td>  
  </tr>
   <th colspan="5" style="color: white;">EXAM</th>
      <br>
      <tr>
        <td colspan="5"><hr style="border: 1px solid red;"></td>
      </tr>
  <tr>
    <td style="text-align: center;color: white;">Exam</td>
    <td></td>
    <td style="text-align: center;color: white;" colspan="2">Procedure</td>
    <td style="text-align: center;color: white;"></td>
  </tr>
  <tr>
        <td><input type="DATE" name="DATE" id="Dte" value="<?php echo $EXAMDATE;?>" style="width: 142px;border-radius: 20px 20px 20px 20px;padding-left: 20px;padding-right: 20px;border: 1px solid white;background: black;color: white;text-align: center;" readonly></td>
        <td colspan="4">
      <textarea rows = "3" style="width: 100%;text-align: center; border-radius: 20px 20px 20px 20px;padding-left: 20px;padding-right: 20px;border: 1px solid white;background: black;color: white;text-align: center;" name = "SELECTION" id="SELECTION" readonly >
       <?php echo $PROCEDURE;?>
      </textarea>
        </td>
  </tr>
  <tr>
        <td style="font-size: 10px;text-align: center;color: white;"><button class="edit" id="Dte1" type="button" >EDIT</button> | <label>SAVE</label></td>
        <td style="font-size: 10px;text-align: center;color: white;"><label></label></td>
        <td style="font-size: 10px;text-align: center;color: white;" colspan="2"><button class="edit" id="Sltn1" type="button" >EDIT</button> | <label>SAVE</label></td>
        <td style="font-size: 10px;text-align: center;color: white;"><label></label></td>  
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
 <label class="input-group-text" onclick="openCity(event, 'EMPLOYER DETAILS')" style="color: white;"><i class="fa fa-arrow-left"></i> BACK</label>
</div></td>
    <td><div class="hover">
 <label class="input-group-text" onclick="openCity(event, 'DOCUMENTS')" style="color: white;"><i class="fa fa-arrow-right"></i> NEXT</label>
</div></td>
  </tr>
</table>
</CENTER>
  </section>
</div>

<div id="DOCUMENTS" class="tabcontent" style="border: 1px solid black;">
  <div class="tab" style="opacity: 0.8;background: black;border: 2px solid black;border-bottom: 2px solid red;">
<center style="margin-top: 15px;">
<label class="tablinks" onclick="openCity(event, 'SEARCHED')" >PATIENT INFO</label>
<label class="tablinks" onclick="openCity(event, 'SCHEME DETAILS')">SCHEME DETAILS</label>
<label class="tablinks" onclick="openCity(event, 'EMPLOYER DETAILS')">EMPLOYER DETAILS</label>
<label class="tablinks" onclick="openCity(event, 'EXAMINATION DETAILS')">EXAMINATION DETAILS</label>
<label class="tablinks" onclick="openCity(event, 'DOCUMENTS')">DOCUMENTS</label>
</center>
</div>
 <section class="display">
  <CENTER style="height: 650px;">
<table>
  <th colspan="5" style="color: white;">DOCUMENTS</th>
      <br>
      <tr>
        <td colspan="5"><hr style="border: 1px solid red;"></td>
      </tr>
  <tr>
    <td style="text-align: center;color: white;">Medical Referral Letter</td>
    <td style="text-align: center;color: white;"></td>
    <td></td>
    <td style="text-align: center;color: white;"></td>
    <td style="text-align: center;color: white;">Medical Aid Card/ID</td>
  </tr>
  <tr>
        <td><input type="File" value="<?php echo $MEDICALREFERRALLETTER?>" name="Img1" style="width: 242px;border-radius: 20px 20px 20px 20px;padding-left: 20px;padding-right: 20px;border: 1px solid white;background: black;color: white;text-align: center;" readonly></td>
        <td></td>
        <td></td>
        <td></td>
        <td><input type="File" value="<?php echo $MEDICALAIDNUMBER?>" name="Img2" style="width: 242px;border-radius: 20px 20px 20px 20px;padding-left: 20px;padding-right: 20px;border: 1px solid white;background: black;color: white;text-align: center;" readonly></td>
  </tr>
  <tr>
        <td style="font-size: 10px;text-align: center;color: white;"><label>EDIT</label> | <label>SAVE</label></td>
        <td style="font-size: 10px;text-align: center;color: white;"><label></label></td>
        <td style="font-size: 10px;text-align: center;color: white;"><label></label></td>
        <td style="font-size: 10px;text-align: center;color: white;"><label></label></td>
        <td style="font-size: 10px;text-align: center;color: white;"><label>EDIT</label> | <label>SAVE</label></td>   
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
 <label class="input-group-text" onclick="openCity(event, 'EXAMINATION DETAILS')"  style="color: white;"><i class="fa fa-arrow-left"></i> BACK</label>
</div></td>
  </tr>
</table>
</CENTER>
  </section>
</div>

<div id="SEARCHS" class="tabcontent" style="border: 1px solid black;">
  <center>
  <form action="" method="post" enctype="multipart/form-data" >
<Section id="Search">
  <input type="text" class="form-control" placeholder="Enter Patient ID" name="Search" required="" style="color: white;">
  <br>
  <br>
  <label style="color: red;">
    Search existing patients before entering new patients
  </label>
  <br>
  <br>
  <div class="hover">
 <button class="input-group-text" type="submit" for="Search" style="color: white;"><i class="fa fa-search"></i> SEARCH</button>
 <input type="hidden" name="Submit" class="input-group-text" id="Search">
 </div>
</div>
</Section>
</form>
</center>
</div>

<div id="REPORTS" class="tabcontent">

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
        $('#MRN1').click(function(){
            $("input[name='MRN']").attr("readonly", false); 
            document.getElementById("MRN").focus();  
        });
        $('#XN1').click(function(){
            $("input[name='XN']").attr("readonly", false); 
            document.getElementById("XN").focus();  
        });
        $('#FN1').click(function(){
            $("input[name='FirstName']").attr("readonly", false); 
            document.getElementById("FN").focus();  
        });
        $('#LN1').click(function(){
            $("input[name='LastName']").attr("readonly", false); 
            document.getElementById("LN").focus();  
        });
        $('#IDN1').click(function(){
            $("input[name='IdentityNumber']").attr("readonly", false); 
            document.getElementById("IDN").focus();  
        });
        $('#PN1').click(function(){
            $("input[name='PhoneNumber']").attr("readonly", false); 
            document.getElementById("PN").focus();  
        });
        $('#Fax1').click(function(){
            $("input[name='FaxNumber']").attr("readonly", false); 
            document.getElementById("Fax").focus();  
        });
        $('#EA1').click(function(){
            $("input[name='EmailAddress']").attr("readonly", false); 
            document.getElementById("EA").focus();  
        });
        $('#Note1').click(function(){
            $("textarea[name='NOTE']").attr("readonly", false); 
            document.getElementById("Note").focus();  
        });
        $('#Add1').click(function(){
            $("input[name='Address']").attr("readonly", false); 
            document.getElementById("Add").focus();  
        });
        $('#Cty1').click(function(){
            $("input[name='City']").attr("readonly", false); 
            document.getElementById("Cty").focus();  
        });
        $('#Prv1').click(function(){
            $("input[name='Province']").attr("readonly", false); 
            document.getElementById("Prv").focus();  
        });
        $('#PC1').click(function(){
            $("input[name='PostalCode']").attr("readonly", false); 
            document.getElementById("PC").focus();  
        });
        $('#Ctry1').click(function(){
            $("input[name='Country']").attr("readonly", false); 
            document.getElementById("Ctry").focus();  
        });
        $('#Alg1').click(function(){
            $("input[name='ALLERGY']").attr("readonly", false); 
            document.getElementById("Alg").focus();  
        });
        $('#Hgt1').click(function(){
            $("input[name='HEIGHT']").attr("readonly", false); 
            document.getElementById("Hgt").focus();  
        });
        $('#Wgt1').click(function(){
            $("input[name='WEIGHT']").attr("readonly", false); 
            document.getElementById("Wgt").focus();  
        });
        $('#PT1').click(function(){
            $("select[name='PATIENTTYPE']").attr("disabled", false); 
            document.getElementById("PT").focus();  
        });
        $('#MA1').click(function(){
            $("Select[name='MEDICALALERT']").attr("disabled", false); 
            document.getElementById("MA").focus();  
        });
        $('#Typ1').click(function(){
            $("Select[name='TYPE']").attr("disabled", false); 
            document.getElementById("Typ").focus();  
        });
        $('#MS1').click(function(){
            $("input[name='MEDICALSCHEME']").attr("readonly", false); 
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
        $('#DOB1').click(function(){
            $("input[name='DATEOFBIRTH']").attr("readonly", false); 
            document.getElementById("DOB").focus();  
        });
        $('#RTM1').click(function(){
            $("Select[name='RELATIONTOMEMBER']").attr("disabled", false); 
            document.getElementById("RTM").focus();  
        });
        $('#NOD1').click(function(){
            $("input[name='NUMBEROFDEPENDANTS']").attr("readonly", false); 
            document.getElementById("NOD").focus();  
        });
        $('#NOK1').click(function(){
            $("input[name='NEXTOFKIN']").attr("readonly", false); 
            document.getElementById("NOK").focus();  
        });
        $('#Add21').click(function(){
            $("input[name='ADDRESS2']").attr("readonly", false); 
            document.getElementById("Add2").focus();  
        });
        $('#Cty21').click(function(){
            $("input[name='CITY2']").attr("readonly", false); 
            document.getElementById("Cty2").focus();  
        });
        $('#Prv21').click(function(){
            $("input[name='PROVINCE2']").attr("readonly", false); 
            document.getElementById("Prv2").focus();  
        });
        $('#PC21').click(function(){
            $("input[name='PostalCode2']").attr("readonly", false); 
            document.getElementById("PC2").focus();  
        });
        $('#Ctry21').click(function(){
            $("input[name='Country2']").attr("readonly", false); 
            document.getElementById("Ctry2").focus();  
        });
        $('#Add31').click(function(){
            $("input[name='Address3']").attr("readonly", false); 
            document.getElementById("Add3").focus();  
        });
        $('#Cty31').click(function(){
            $("input[name='City3']").attr("readonly", false); 
            document.getElementById("Cty3").focus();  
        });
        $('#Prv31').click(function(){
            $("input[name='Province3']").attr("readonly", false); 
            document.getElementById("Prv3").focus();  
        });
        $('#PC31').click(function(){
            $("input[name='PostalCode3']").attr("readonly", false); 
            document.getElementById("PC3").focus();  
        });
        $('#Ctry31').click(function(){
            $("input[name='Country3']").attr("readonly", false); 
            document.getElementById("Ctry3").focus();  
        });
        $('#Emp1').click(function(){
            $("input[name='EMPLOYER']").attr("readonly", false); 
            document.getElementById("Emp").focus();  
        });
        $('#P21').click(function(){
            $("input[name='PHONE2']").attr("readonly", false); 
            document.getElementById("P2").focus();  
        });
        $('#EA21').click(function(){
            $("input[name='EMAILADDRESS2']").attr("readonly", false); 
            document.getElementById("EA2").focus();  
        });
        $('#Dsg1').click(function(){
            $("input[name='DESIGNATION']").attr("readonly", false); 
            document.getElementById("Dsg").focus();  
        });
        $('#Add41').click(function(){
            $("input[name='ADDRESS4']").attr("readonly", false); 
            document.getElementById("Add4").focus();  
        });
        $('#Cty41').click(function(){
            $("input[name='CITY4']").attr("readonly", false); 
            document.getElementById("Cty4").focus();  
        });
        $('#Prv41').click(function(){
            $("input[name='PROVINCE4']").attr("readonly", false); 
            document.getElementById("Prv4").focus();  
        });
        $('#PC41').click(function(){
            $("input[name='POSTALCODE4']").attr("readonly", false); 
            document.getElementById("PC4").focus();  
        });
        $('#Ctry41').click(function(){
            $("input[name='COUNTRY4']").attr("readonly", false); 
            document.getElementById("Ctry4").focus();  
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