<?php
include('indexPHP.php');
?>
<!DOCTYPE html>
<html>
<head>
	<title>Login</title>
	<link rel="stylesheet" href="https://fonts.google.com/specimen/Montserrat"type='text/css'>
<link href='http://fonts.googleapis.com/css?family=Montserrat' rel='stylesheet' type='text/css'>
<script src="https://code.jquery.com/jquery-3.5.1.js" integrity="sha256-QWo7LDvxbWT2tbbQ97B53yJnYU3WhH/C8ycbRAkjPDc=" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js" integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8shuf57BaghqFfPlYxofvL8/KUEfYiJOMMV+rV" crossorigin="anonymous"></script>
    <script src="js/behaviour.js"></script>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">

</head>
<body>

	<style type="text/css">

         body{
             height: 100vh;
             background:rgb(0,0,10);
             color: #fff;
             text-align: center;
             font-family: sans-serif;
         }
         .form-control, input, select{
             border-radius: 2px;
         }
         .motherbox{
             display: flex;
             justify-content: center;
             align-items: center;
             height: 100%;
             width: 100%;
             /*background-color: green;*/

         }
         .formwrap{
              width: 350px;
              /*height: 350px;*/
             /*background-color: brown;*/
             padding: 5px;
             /*display: flex;*/
             flex-direction: column;
             align-items: center;
             /*text-align: center;*/
         }
         .formwrap p{
          text-align: center;
         }
         form{
            background:rgb(0,0,20);
            padding: 15px;
            border-radius: 2px;
         }
         .btn{
              background: red;
              color: #fff;
              border:.1px red solid;
              border-radius: 0;
              transition: background color border;
              transition-duration: .5s, .5s, .5s;
              width: 70px;
              margin: auto;
              margin-top: 0px;
          }
           .btn:hover{
               color:red;
               background:#fff;
               border:1px #fff solid;
               font-weight: 700;
          }
          label{
          color: #fff;
          font-weight: lighter;
          font-size: 17px;
          text-align: left;
          font-weight: bold;
         }
  </style>
	<center>
	<section class="login motherbox " >
<form action="" method="post"style="width: 30%;margin-top: 10%;">


	<div class="formwrap">

		<h1>Login</h1>
        <div class="form-group">

            <label>User Name</label>
            <input class="form-control" type="text" name="username">
         </div>

        <div class="form-group">
            <label>Password</label>
			<input class="form-control" type="Password" name="password">
        </div>
	</div>
	<input type="submit" id="btx" class="btn btn-danger btn2" name="Login" value="Login">
</form>
</section>
</center>
</body>
</html>
