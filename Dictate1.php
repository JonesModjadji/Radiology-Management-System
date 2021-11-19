<?php
session_start();
ob_start();

echo $_SESSION['suserbranch'];
$var2 = ob_get_clean();
include("Connection.php");

            $ID = $_GET['ID'];
			$ACC = $_GET['ACC'];
            $Rec1 = "";
            $Rec2 = "";
            $Rec3 = "";
            $Rec4 = "";
            $Rec5 = "";
            $Rec6 = "";
            $Rec7 = "";
            $Rec8 = "";
            $Rec9 = "";
            $Rec10 = "";

            if (isset($_POST['Save'])) {
              $NOTE1 = $_POST['NOTE1'];
			  $NOTE2 = $_POST['NOTE2'];
			  $PHYSICIAN = $_POST['PHYSICIAN'];
            $target_dir = "Recordings/";
            $target_file1 = $target_dir . basename($_FILES["Rec1"]["name"]);
            $target_file2 = $target_dir . basename($_FILES["Rec2"]["name"]);
            $target_file3 = $target_dir . basename($_FILES["Rec3"]["name"]);
            $target_file4 = $target_dir . basename($_FILES["Rec4"]["name"]);
            $target_file5 = $target_dir . basename($_FILES["Rec5"]["name"]);
            $target_file6 = $target_dir . basename($_FILES["Rec6"]["name"]);
            $target_file7 = $target_dir . basename($_FILES["Rec7"]["name"]);
            $target_file8 = $target_dir . basename($_FILES["Rec8"]["name"]);
            $target_file9 = $target_dir . basename($_FILES["Rec9"]["name"]);
            $target_file10 = $target_dir . basename($_FILES["Rec10"]["name"]);

            $tmpFile1 = $_FILES['Rec1']['tmp_name'];
            $tmpFile2 = $_FILES['Rec2']['tmp_name'];
            $tmpFile3 = $_FILES['Rec3']['tmp_name'];
            $tmpFile4 = $_FILES['Rec4']['tmp_name'];
            $tmpFile5 = $_FILES['Rec5']['tmp_name'];
            $tmpFile6 = $_FILES['Rec6']['tmp_name'];
            $tmpFile7 = $_FILES['Rec7']['tmp_name'];
            $tmpFile8 = $_FILES['Rec8']['tmp_name'];
            $tmpFile9 = $_FILES['Rec9']['tmp_name'];
            $tmpFile10 = $_FILES['Rec10']['tmp_name'];

            $result1 = move_uploaded_file($tmpFile1, $target_file1);
            $result2 = move_uploaded_file($tmpFile2, $target_file2);
            $result3 = move_uploaded_file($tmpFile3, $target_file3);
            $result4 = move_uploaded_file($tmpFile4, $target_file4);
            $result5 = move_uploaded_file($tmpFile5, $target_file5);
            $result6 = move_uploaded_file($tmpFile6, $target_file6);
            $result7 = move_uploaded_file($tmpFile7, $target_file7);
            $result8 = move_uploaded_file($tmpFile8, $target_file8);
            $result9 = move_uploaded_file($tmpFile9, $target_file9);
            $result10 = move_uploaded_file($tmpFile10, $target_file10);

            $file1 = basename($_FILES["Rec1"]["name"]);
            $file2 = basename($_FILES["Rec2"]["name"]);
            $file3 = basename($_FILES["Rec3"]["name"]);
            $file4 = basename($_FILES["Rec4"]["name"]);
            $file5 = basename($_FILES["Rec5"]["name"]);
            $file6 = basename($_FILES["Rec6"]["name"]);
            $file7 = basename($_FILES["Rec7"]["name"]);
            $file8 = basename($_FILES["Rec8"]["name"]);
            $file9 = basename($_FILES["Rec9"]["name"]);
            $file10 = basename($_FILES["Rec10"]["name"]);

             $qry=mysqli_query($con,"UPDATE study SET Recording1='$file1',Recording2='$file2',Recording3='$file3',Recording4='$file4',Recording5='$file5',Recording6='$file6',Recording7='$file7',Recording8='$file8',Recording9='$file9',Recording10='$file10',Note = '$NOTE1',Note2 = '$NOTE2',AssignedRadiologist = '$PHYSICIAN' WHERE Accession = '$ACC'");

    header("location: Update1.php?ID=$ID&NOTE=$NOTE1&PHYSICIAN=$PHYSICIAN&SCHEDULE=$SCHEDULE&PRI=$PRIORITY&RAD=$RAD&ACC=$ACC");
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

}
}
if (isset($_POST['Cancel'])) {
	 $Dictate = "Dictate";
	 $Searching1 = "SELECT * FROM study WHERE PatientsID = '$ID' AND Status ='Dictating' AND Accession= '$ACC' ";
	$SearchingResults1=mysqli_query($con,$Searching1);
	$rows1=mysqli_num_rows($SearchingResults1);
	 if($rows1>0){
    $qry=mysqli_query($con,"UPDATE study SET Status='$Dictate'  WHERE Accession = '$ACC'");
  header("location: Radiologist.php");
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
<title>Dictate1</title>
<link href="Css/style.css" rel="stylesheet" type="text/css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<link rel="stylesheet" href="https://fonts.google.com/specimen/Montserrat"type='text/css'>
<link href='http://fonts.googleapis.com/css?family=Montserrat' rel='stylesheet' type='text/css'>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script src="https://cdn.ckeditor.com/4.13.1/standard/ckeditor.js"></script>
</head>
<body >
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
    <td style="width: 300px;">
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
    <table border="1px" style="width: 270px;padding:4px;position: absolute;margin-top: -35px;border: 2px solid white;border-radius: 7px;font-size: 13px;color: white;">
      <tr>
        <th style="text-align: center;border: none;"><b>PATIENT</b></th>
        <th style="text-align: center;border: none;"><b>PROCEDURE</b></th>
      </tr>
      <tr>
        <br>
      </tr>
           <?php
            $Searching1 = "SELECT * FROM study WHERE Status ='Dictate' OR Status ='Authorize' LIMIT 5 ";
       $SearchingResults1=mysqli_query($con,$Searching1);
       if($SearchingResults1->num_rows > 0)
  while ($rows=mysqli_fetch_array($SearchingResults1)) {
	  $PATIENTSID = $rows['PatientsID'];
	   $PATIENTSPROCEDURE= $rows['PatientsProcedure'];
     $Searching2 = "SELECT * FROM $var2 WHERE MRN ='$PATIENTSID' ";
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
            $Searching1 = "SELECT * FROM study WHERE  Status ='Done' LIMIT 5 ";
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
		  <label>Radiographer &nbsp:</label> <label><br> <?php echo ucfirst($ASSIGNEDRADIOGRAPHER1) ;?></label><br>
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
          <a href="#" style="color: red;" onclick="window.open('http://192.168.50.160/?accnum=<?php echo$ACC?>');" >ORDER INFORMATION</a><br>
          <a href="#" style="color: red;" onclick="window.open('http://192.168.50.160/login.html');">OPEN PACS</a><br>
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
        <td style="width: 300px;"></td>
    <td  style="width: 500px;text-align: left;color: white;">
      <center>
        <div>
    <h2>Audio record and playback</h2>
    <p>
       <div id="controls">
     <button id="recordButton">Record</button>
     <button type="button" id="pauseButton" disabled>Pause</button>
     <button id="stopButton" disabled>Stop</button>
    </div>
    <br>
    <div id="formats">Format: start recording to see sample rate</div>
    <p><strong>Recordings:</strong></p>
    <ol id="recordingsList"></ol>
    <br>
    <!-- inserting these scripts at the end to be able to use all the elements in the DOM -->
    </p>
    <p>
      <audio id=recordedAudio></audio>
    </p>
    <p>
      <a id=audioDownload></a>
    </p>
</div>
      </center>
      <br>
      <form action="" method="post"  enctype="multipart/form-data">
	  <textarea style="width: 200px;height: 200px;margin-left:-250px;padding-right:20px;" name="NOTE1"><?php echo $NOTE1; ?>
      </textarea>
      <textarea style="width: 500px;height: 200px;margin-left:20px;" name="NOTE2"><?php echo $NOTE2; ?>
      </textarea>
    </td>
    <td style="width: 200px;">
      <div style="padding-left: 60px;margin-top: -180px;">

          <input type="file" name="Rec1" value="<?php echo $Rec1 ?>" style="color: white;"><br>
          <input type="file" name="Rec2" value="<?php echo $Rec2 ?>" style="color: white;"><br>
          <input type="file" name="Rec3" value="<?php echo $Rec3 ?>" style="color: white;"><br>
          <input type="file" name="Rec4" value="<?php echo $Rec4 ?>" style="color: white;"><br>
          <input type="file" name="Rec5" value="<?php echo $Rec5 ?>" style="color: white;"><br>
          <input type="file" name="Rec6" value="<?php echo $Rec6 ?>" style="color: white;"><br>
          <input type="file" name="Rec7" value="<?php echo $Rec7 ?>" style="color: white;"><br>
          <input type="file" name="Rec8" value="<?php echo $Rec8 ?>" style="color: white;"><br>
          <input type="file" name="Rec9" value="<?php echo $Rec9 ?>" style="color: white;"><br>
          <input type="file" name="Rec10" value="<?php echo $Rec10 ?>" style="color: white;"><br>
        </form>
        </div>
    </td>
      </tr>
      <tr>
        <td></td>
        <td></td>
        <td></td>
      </tr>
</table>
<table>
  <tr>
    <td><div class="hover">
 <button class="input-group-text" type="submit" name="Save" style="color: white;"><i class="fa fa-floppy-o"></i> Save</button>
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
<script src="https://cdn.rawgit.com/mattdiamond/Recorderjs/08e7abd9/dist/recorder.js"></script>
<script type="text/javascript">
 CKEDITOR.replace( 'NOTE2' );
 URL = window.URL || window.webkitURL;

var gumStream;            //stream from getUserMedia()
var rec;              //Recorder.js object
var input;              //MediaStreamAudioSourceNode we'll be recording

// shim for AudioContext when it's not avb.
var AudioContext = window.AudioContext || window.webkitAudioContext;
var audioContext //audio context to help us record

var recordButton = document.getElementById("recordButton");
var stopButton = document.getElementById("stopButton");
var pauseButton = document.getElementById("pauseButton");

//add events to those 2 buttons
recordButton.addEventListener("click", startRecording);
stopButton.addEventListener("click", stopRecording);
pauseButton.addEventListener("click", pauseRecording);

function startRecording() {
  console.log("recordButton clicked");

  /*
    Simple constraints object, for more advanced audio features see
    https://addpipe.com/blog/audio-constraints-getusermedia/
  */

    var constraints = { audio: true, video:false }

  /*
      Disable the record button until we get a success or fail from getUserMedia()
  */

  recordButton.disabled = true;
  stopButton.disabled = false;
  pauseButton.disabled = false

  /*
      We're using the standard promise based getUserMedia()
      https://developer.mozilla.org/en-US/docs/Web/API/MediaDevices/getUserMedia
  */

  navigator.mediaDevices.getUserMedia(constraints).then(function(stream) {
    console.log("getUserMedia() success, stream created, initializing Recorder.js ...");

    /*
      create an audio context after getUserMedia is called
      sampleRate might change after getUserMedia is called, like it does on macOS when recording through AirPods
      the sampleRate defaults to the one set in your OS for your playback device
    */
    audioContext = new AudioContext();

    //update the format
    document.getElementById("formats").innerHTML="Format: 1 channel pcm @ "+audioContext.sampleRate/1000+"kHz"

    /*  assign to gumStream for later use  */
    gumStream = stream;

    /* use the stream */
    input = audioContext.createMediaStreamSource(stream);

    /*
      Create the Recorder object and configure to record mono sound (1 channel)
      Recording 2 channels  will double the file size
    */
    rec = new Recorder(input,{numChannels:1})

    //start the recording process
    rec.record()

    console.log("Recording started");

  }).catch(function(err) {
      //enable the record button if getUserMedia() fails
      recordButton.disabled = false;
      stopButton.disabled = true;
      pauseButton.disabled = true
  });
}

function pauseRecording(){
  console.log("pauseButton clicked rec.recording=",rec.recording );
  if (rec.recording){
    //pause
    rec.stop();
    pauseButton.innerHTML="Resume";
  }else{
    //resume
    rec.record()
    pauseButton.innerHTML="Pause";

  }
}

function stopRecording() {
  console.log("stopButton clicked");

  //disable the stop button, enable the record too allow for new recordings
  stopButton.disabled = true;
  recordButton.disabled = false;
  pauseButton.disabled = true;

  //reset button just in case the recording is stopped while paused
  pauseButton.innerHTML="Pause";

  //tell the recorder to stop the recording
  rec.stop();

  //stop microphone access
  gumStream.getAudioTracks()[0].stop();

  //create the wav blob and pass it on to createDownloadLink
  rec.exportWAV(createDownloadLink);
}

function createDownloadLink(blob) {

  var url = URL.createObjectURL(blob);
  var au = document.createElement('audio');
  var li = document.createElement('li');
  var br = document.createElement('br');
  var link = document.createElement('a');
  var doc = "<?php echo $ASSIGN; ?>";


  //name of .wav file to use during upload and download (without extendion)
  var filename = new Date().toISOString();

  //add controls to the <audio> element
  au.controls = true;
  au.src = url;

  //save to disk link
  link.href = url;
  link.download = doc+filename+".mp3"; //download forces the browser to donwload the file using the  filename
  link.innerHTML = "<br> Save to disk <br>";

  //add the new audio element to li
  li.appendChild(au);

 //add the new audio element to li
  li.appendChild(br);

  //add the filename to the li
  li.appendChild(document.createTextNode(filename+".mp3 "));

  //add the save to disk link to li
  li.appendChild(link);

  //upload link
  var upload = document.createElement('a');
  upload.href="#";
  upload.innerHTML = "Upload";
  upload.addEventListener("click", function(event){
      var xhr=new XMLHttpRequest();
      xhr.onload=function(e) {
          if(this.readyState === 4) {
              console.log("Server returned: ",e.target.responseText);
          }
      };
      var fd=new FormData();
      fd.append("audio_data",blob, filename);
      xhr.open("POST","Upload.php",true);
      xhr.send(fd);
  })
  li.appendChild(document.createTextNode (" "))//add a space in between
  li.appendChild(upload)//add the upload link to li

  //add the li element to the ol
  recordingsList.appendChild(li);
}
</script>
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

</script>
</body>
<script src="Javascript/jquery-1.11.0.js"></script>
<script src="Javascript/effects.js"></script>
</html>
