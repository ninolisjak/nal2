<?php
session_start();
$_SESSION["admin_username"] = "";
if(isset($_POST["btn_login"]))
{
  $email_id=$_POST["emaillog"];
  $password_login=$_POST["pswlog"];

    if("admin@gmail.com"==$email_id && "12345678"==$password_login){
      $_SESSION["admin_username"] = $email_id;
      header("Location:dashboard.php");

    
    }
    else{
      echo '<script> alert("Invalid password ");</script>';
    }
}
?>










<!doctype html>
<html lang="en">
  <head>
    <title>
        Admin Panel
    </title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <style>
      * {box-sizing: border-box}

/* Add padding to containers */
.container {
  padding: 16px;
}

/* Full-width input fields */
textarea,input[type=text], input[type=password] {
  width: 100%;
  padding: 15px;
  margin: 5px 0 22px 0;
  display: inline-block;
  border: none;
  background: #f1f1f1;
}

input[type=text]:focus, input[type=password]:focus {
  background-color: #ddd;
  outline: none;
}

/* Overwrite default styles of hr */
hr {
  border: 1px solid #f1f1f1;
  margin-bottom: 25px;
}

/* Set a style for the submit/register button */
.registerbtn {
  background-color: #04AA6D;
  color: white;
  padding: 16px 20px;
  margin: 8px 0;
  border: none;
  cursor: pointer;
  width: 100%;
  opacity: 0.9;
}

.registerbtn:hover {
  opacity:1;
}

/* Add a blue text color to links */
a {
  color: dodgerblue;
}

/* Set a grey background color and center the text of the "sign in" section */
.signin {
  background-color: #f1f1f1;
  text-align: center;
}

</style>
</head>
  <body>

  <div class="container">
    <div class="row">
        <div class="col-md-6" style="margin:auto;">
        <form method="post">
              <div class="container" style="color:blue">
              <center>
              <h1>Admin Login</h1>
            
            </center>
            <hr>
            <label for="email"><b>Email</b></label>
           <input type="text" placeholder="Enter Email" name="emaillog" id="email" required>

          <label for="psw"><b>Password</b></label>
          <input type="password" placeholder="Enter Password" name="pswlog" id="psw" required>

          
           <hr>
          <center>
           
          <button type="submit" name="btn_login" class="Loginbtn">Login</button>
          </center>
        </div>
    </div>
  </div>
      
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
  </body>
</html>