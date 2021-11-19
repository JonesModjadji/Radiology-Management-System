<?php
$uploads_dir = 'Recordings/';
$size = $_FILES['audio_data']['size']; //the size in bytes
$input = $_FILES['audio_data']['tmp_name']; //temporary name that PHP gave to the uploaded file
$output =$uploads_dir.$_FILES['audio_data']['name'].".wav"; //letting the client control the filename is a rather bad idea
//move the file from temp name to local folder using $output name
move_uploaded_file($input,$output);
?>