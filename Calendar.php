<!DOCTYPE html>
<?php 
date_default_timezone_set('Africa/Johannesburg');
session_start();
$ID=$_GET['ID'];
include("db.php");
include("Connection.php");
ob_start();
echo $_SESSION['suserbranch'];
$var2 = ob_get_clean();
            $Name="";
			$Surname="";
			$Contact="";
			$ID="";
			$RefDoc1="";
			$RefDoc2="";
			 $datetime = new DateTime();
			 $datetime2 = new DateTime();
$minutes_to_add = 30;			 
			 $datetime2->add(new DateInterval('PT' . $minutes_to_add . 'M'));
if (isset($_POST['Save'])) {
            $NAME = $_POST['Name'];
			$SURNAME = $_POST['Surname'];
			$FROMFILTER = $_POST['FromFilter'];
			$TOFILTER = $_POST['ToFilter'];
			$title=$NAME." ".$SURNAME;
			$start=$FROMFILTER;
			$end=$TOFILTER;
			$CONTACT = $_POST['Contact'];
			$IDNUMBER = $_POST['ID'];
			$REFDOC1 = $_POST['RefDoc1'];
			$REFDOC2 = $_POST['RefDoc2'];
			$PROCEDURE1 = $_POST['Procedure1'];
			$PROCEDURE2 = $_POST['Procedure2'];
			$PROCEDURE3 = $_POST['Procedure3'];
			$PROCEDURE4 = $_POST['Procedure4'];
			$PROCEDURE5 = $_POST['Procedure5'];
			$PROCEDURE6 = $_POST['Procedure6'];
           $ID=$_GET['ID'];
              $sql = "INSERT INTO event_calendar (title,start,end,Name,Surname,Contact,IDNumber,RefDoctor,RefDoctor2,Branch,PROCEDURE1,PROCEDURE2,PROCEDURE3,PROCEDURE4,PROCEDURE5,PROCEDURE6) 
			  VALUES ('".$title."','".$start."','".$end."','".$NAME."','".$SURNAME."','".$CONTACT."','".$IDNUMBER."','".$REFDOC1."','".$REFDOC2."',
			  '".$ID."','".$PROCEDURE1."','".$PROCEDURE2."','".$PROCEDURE3."','".$PROCEDURE4."','".$PROCEDURE5."','".$PROCEDURE6."')";
 $results = mysqli_query($conn,$sql);

 if ($results) {
 }
 else
 {
   echo "<script>alert('Nowhere')</script>";
   
}}
$ID=$_GET['ID'];
$sql = "SELECT * FROM branch WHERE PREFIX ='$ID' LIMIT 1";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
  // output data of each row
  while($rows = $result->fetch_assoc()) {
    $BRANCHNAME = $rows['DESCRIPTION'];
	$BRANCHPREFIX = $rows['PREFIX'];
  }
} 
?>
<html>

<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta http-equiv="X-UA-Compatible" content="IE=Edge">
<meta name="keywords" content="">
<meta name="description" content="">
<title>Calendar</title>
<link href="Css/style.css" rel="stylesheet" type="text/css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<link rel="stylesheet" href="https://fonts.google.com/specimen/Montserrat"type='text/css'>
<link href='http://fonts.googleapis.com/css?family=Montserrat' rel='stylesheet' type='text/css'>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<link rel="stylesheet" href="fullcalendar/fullcalendar.min.css" />
<script src="fullcalendar/lib/jquery.min.js"></script>
<script src="fullcalendar/lib/moment.min.js"></script>
<script src="fullcalendar/fullcalendar.min.js"></script>

<script>

$(document).ready(function () {
    var calendar = $('#calendar').fullCalendar({
        editable: true,
        events: "fetch-event.php?ID=<?php echo $ID=$_GET['ID']; ?>",
        displayEventTime:true,
        eventRender: function (event, element, view) {
            if (event.allDay === 'true') {
                event.allDay = true;
            } else {
                event.allDay = false;
            }
        },
        
        editable: true,
        eventDrop: function (event, delta) {
			var updateMsg = confirm("Do you want to change time?");
            if (updateMsg) {
				var today = new Date();
				var day = $.fullCalendar.formatDate(event.start, "Y-MM-DD HH:mm:ss");
				var person = prompt("Please enter new start time",day);
				var dateTime2 = person;
				 d2 = new Date ( dateTime2 );
				 d2.setMinutes ( d2.getMinutes() + 30 );
				 var d3 = d2.getFullYear().toString()+"-"+((d2.getMonth()+1).toString().length==2?(d2.getMonth()+1).toString():"0"+(d2.getMonth()+1).toString())+"-"+(d2.getDate().toString().length==2?d2.getDate().toString():"0"+d2.getDate().toString())+" "+(d2.getHours().toString().length==2?d2.getHours().toString():"0"+d2.getHours().toString())+":"+((parseInt(d2.getMinutes()/5)*5).toString().length==2?(parseInt(d2.getMinutes()/5)*5).toString():"0"+(parseInt(d2.getMinutes()/5)*5).toString())+":00";

				 
				var person2 = prompt("Please enter new end time",d3);

                    var start = person;
                    var end = person2;
                    $.ajax({
                        url: 'edit-event.php',
                        data: 'title=' + event.title + '&start=' + start + '&end=' + end + '&id=' + event.id,
                        type: "POST",
                        success: function (response) {
                            displayMessage("Updated Successfully");
                        }
                    });
                }
				else{
					var start = $.fullCalendar.formatDate(event.start, "Y-MM-DD HH:mm:ss");
                    var end = $.fullCalendar.formatDate(event.end, "Y-MM-DD HH:mm:ss");
                    $.ajax({
                        url: 'edit-event.php',
                        data: 'title=' + event.title + '&start=' + start + '&end=' + end + '&id=' + event.id,
                        type: "POST",
                        success: function (response) {
                            displayMessage("Updated Successfully");
                        }
                    });
                }
		},
        eventClick: function (event) {
            var deleteMsg = confirm("Do you really want to delete?");
            if (deleteMsg) {
                $.ajax({
                    type: "POST",
                    url: "delete-event.php",
                    data: "&id=" + event.id,
                    success: function (response) {
                        if(parseInt(response) > 0) {
                            $('#calendar').fullCalendar('removeEvents', event.id);
                            displayMessage("Deleted Successfully");
                        }
                    }
                });
            }
        }

    });
});

function displayMessage(message) {
	    $(".response").html("<div class='success'>"+message+"</div>");
    setInterval(function() { $(".success").fadeOut(); }, 1000);
}
function sync()
{
  var n1 = document.getElementById('FromFilter');
  var n2 = document.getElementById('ToFilter');
  n2.value = n1.value;
}

</script>

<style>
::-webkit-calendar-picker-indicator {
    filter: invert(1);
}
.fc-today {
    background: #2784d3 !important;
    border: none !important;
    border-top: 1px solid #ddd !important;
    font-weight: bold;
} 
body {
    margin-top: 10px;
    text-align: center;
    font-size: 12px;
    font-family: "Lucida Grande", Helvetica, Arial, Verdana, sans-serif;
	background:black;
}

#calendar {
    width: 1000px;
    margin: 0 auto;
	color:white;
}

.response {
    height: 20px;
}

.success {
    background: red;
	margin-top:-25px;
    padding: 10px 60px;
    border: red 1px solid;
    display: inline-block;
}
</style>
</head>
<body>
    <h2 style="color:white;"><?php echo $BRANCHNAME?> CALENDAR</h2>

    <div class="response"></div>
	<div id="myDIV3">
	<button onclick="myFunction()">Add Patient</button>
	</div>
<div id="myDIV" style="display:none;">
	<br><br>
  <form action="" method="post"  enctype="multipart/form-data">
	<input type="text" placeholder="Name" name="Name" id="Name" style="width: 120px;border-radius: 20px 20px 20px 20px;padding-left: 10px;padding-right: 10px;border: 1px solid white;background: black;color: white;"></input>
	<input type="text" placeholder="Surname" name="Surname" id="Surname"style="width: 120px;border-radius: 20px 20px 20px 20px;padding-left: 10px;padding-right: 10px;border: 1px solid white;background: black;color: white;"></input>
	<br><br>
	<input type="text" placeholder="SA Contact Number" name="Contact" id="Contact"style="width: 120px;border-radius: 20px 20px 20px 20px;padding-left: 10px;padding-right: 10px;border: 1px solid white;background: black;color: white;"></input>
	<input type="text" placeholder="Identity Number" name="ID" id="ID"style="width: 120px;border-radius: 20px 20px 20px 20px;padding-left: 10px;padding-right: 10px;border: 1px solid white;background: black;color: white;"></input>
	<br><br>
	<input type="text" placeholder="Refference Doctor 1" name="RefDoc1" id="RefDoc1"style="width: 120px;border-radius: 20px 20px 20px 20px;padding-left: 10px;padding-right: 10px;border: 1px solid white;background: black;color: white;"></input>
	<input type="text" placeholder="Refference Doctor 2" name="RefDoc2" id="RefDoc2"style="width: 120px;border-radius: 20px 20px 20px 20px;padding-left: 10px;padding-right: 10px;border: 1px solid white;background: black;color: white;"></input>
	<br><br>
	<select name="Procedure1" id="Procedure1" style="width: 400px; text-align: center;border-radius: 20px 20px 20px 20px;padding-left: 35px;border: 1px solid white;background: black;color: white;text-align: center;" required>
		<option value=" ">Select Patients Procedure 1</option>
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
	<select name="Procedure2" id="Procedure2" style="width: 400px; text-align: center;border-radius: 20px 20px 20px 20px;padding-left: 35px;border: 1px solid white;background: black;color: white;text-align: center;" required>
		<option value=" ">Select Patients Procedure 2</option>
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
			<br><br>
			<select name="Procedure3" id="Procedure3" style="width: 400px; text-align: center;border-radius: 20px 20px 20px 20px;padding-left: 35px;border: 1px solid white;background: black;color: white;text-align: center;" required>
		<option value=" ">Select Patients Procedure 3</option>
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
			<select name="Procedure4" id="Procedure4" style="width: 400px; text-align: center;border-radius: 20px 20px 20px 20px;padding-left: 35px;border: 1px solid white;background: black;color: white;text-align: center;" required>
		<option value=" ">Select Patients Procedure 4</option>
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
			<br><br>
			<select name="Procedure5" id="Procedure5" style="width: 400px; text-align: center;border-radius: 20px 20px 20px 20px;padding-left: 35px;border: 1px solid white;background: black;color: white;text-align: center;" required>
		<option value=" ">Select Patients Procedure 5</option>
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
			<select name="Procedure6" id="Procedure6" style="width: 400px; text-align: center;border-radius: 20px 20px 20px 20px;padding-left: 35px;border: 1px solid white;background: black;color: white;text-align: center;" required>
		<option value=" ">Select Patients Procedure 6</option>
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
		    </select><center>
	<table>
	<tr>
	<td style="text-align:center;"><label>Exam Start</label></td>
	<td style="text-align:center;"><label>Exam End</label></td>
	</tr>
	<tr>
	<td></td>
	<td></td>
	</tr>
	<tr>
	<td><input type="datetime-local"  name="FromFilter" id="FromFilter" value="<?php echo $datetime->format('Y-m-d\TH:i:s'); ?>" onkeyup="sync()"style="border-radius: 20px 20px 20px 20px;padding-left: 20px;padding-right: 20px;border: 1px solid white;background: black;color: white;"></input></td>
	<td><input type="datetime-local"  name="ToFilter" id="ToFilter" value="<?php echo $datetime2->format('Y-m-d\TH:i:s'); ?>" style="border-radius: 20px 20px 20px 20px;padding-left: 20px;padding-right: 20px;border: 1px solid white;background: black;color: white;"></input></td>
	</tr>
	</table></center>
	<br><br>
	<center><table>
	<tr>
	<td><div class="hover" style="border-color: black;">
 <button class="input-group-text" type="submit" name="Save" style="color: white;" onclick="myFunction()"><i class="fa fa-floppy-o"></i> Save</button>
 </div></td>
 <td><div class="hover" style="border-color: black;">
 <button class="input-group-text" style="color: white;" onclick="myFunction()"><i class="fa fa-times"></i> Cancel</button>
</div></td>
</tr>
</table></center>
	</form>
</div>
<div id="myDIV2">
<br>
<center>
<div style="width:80%;">
<?php
$ID=$_GET['ID'];
$sql = "SELECT * FROM branch";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
  // output data of each row
  while($rows = $result->fetch_assoc()) {
    $BRANCHNAME = $rows['DESCRIPTION'];
	$BRANCHPREFIX = $rows['PREFIX'];
	echo'<a href=Calendar.php?ID='.$BRANCHPREFIX.'><button >'.$BRANCHNAME.'</button></a>';
	echo'  ';
  }
}
?>
</div>
</center>
<br>
    <div id='calendar'></div>
	</div>
	<script>
function myFunction() {
  var x = document.getElementById("myDIV");
  if (x.style.display === "none") {
    x.style.display = "block";
  } else {
    x.style.display = "none";
  }
  var x = document.getElementById("myDIV2");
  if (x.style.display === "none") {
    x.style.display = "block";
  } else {
    x.style.display = "none";
  }
  var x = document.getElementById("myDIV3");
  if (x.style.display === "none") {
    x.style.display = "block";
  } else {
    x.style.display = "none";
  }
}
</script>
</body>


</html>