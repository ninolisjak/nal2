<?php
$ul ='<li class="nav-item "><a class="nav-link"  data-toggle="modal" data-target="#modelId">Register</a></li><li class="nav-item "><a class="nav-link" data-toggle="modal" data-target="#modelIdL">Login</a></li>';


include("conn.php");
$con=new connec();

if(!isset($_SESSION)){
  session_start();
}

if(isset($_POST["btn_login"]))
{
  $email_id=$_POST["emaillog"];
  $password_login=$_POST["pswlog"];

  $result=$con->select_login("uporabniki", $email_id);
  if($result->num_rows>0){
    $row=$result->fetch_assoc();
    if($row["Email"]==$email_id && $row["Password"]==$password_login){
      $_SESSION["username"] = $email_id;
      $ul =' <li class="nav-item"> <a class="nav-link" >'. $_SESSION["username"].'</a></li><li class="nav-item"> <a class="nav-link" href="index.php?action=logout">Logout</a></li>';
    
    }
    else{
      echo '<script> alert("Invalid password ");</script>';
    }
  }
  else{
    echo '<script> alert("Invalid email ");</script>';
  }

 
}
if(isset($_GET["action"])){
  if(($_GET["action"]== "logout")){
    $_SESSION["username"]=null;
  }
}
if(isset($_POST["btn_reg"]))
{
  $Email = $_POST["Remail"];
  $Password = $_POST["Rpsw"];
  $cnfr_password = $_POST["Rpsw-repeat"];
  if($Password == $cnfr_password)
  {
    $sql = "INSERT INTO uporabniki values(0, '$Email','$Password')";
    
    $con->insert($sql,"Registriran, lahko se prijavite");
  }
  else
  {
    ?>
    <script>alert("Gesli se ne ujemata");</script>
    <?php
  }
}
?>




<!doctype html>
<html lang="en">
  <head>
    <title>Title</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.3/jquery.slim.js"></script>
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
    <nav class="navbar navbar-expand-sm navbar-dark" style="background-color:blue">
      <a class="navbar-brand" href="#"><img src="images/logo.webp" style="width:80px"></a>
      <button class="navbar-toggler d-lg-none" type="button" data-toggle="collapse" data-target="#collapsibleNavId" aria-controls="collapsibleNavId"
          aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="collapsibleNavId">
        <ul class="navbar-nav mr-auto mt-2 mt-lg-0">
          <li class="nav-item active">
            <a class="nav-link" href="index.php">Home </a>
          </li>
          <li class="nav-item ">
            <a class="nav-link" href="contact.php">Contact</a>
          </li>
          <li class="nav-item ">
            <a class="nav-link" href="ticket.php">Book a ticket</a>
          </li>
         
          
            </div>
          </li>
        </ul>
        <ul class="navbar-nav mr-auto mt-2 mt-lg-0">
          <?php echo $ul;  ?>
         <!-- <li class="nav-item ">

            <a class="nav-link"  data-toggle="modal" data-target="#modelId">Register</a>
          </li>
          <li class="nav-item ">
            <a class="nav-link" data-toggle="modal" data-target="#modelIdL">Login</a>
          </li>-->
        </ul> 
      </div>
    </nav>
    
   
    
    <!--register Modal -->
    <div class="modal fade" id="modelId" tabindex="-1" role="dialog" aria-labelledby="modelTitleId" aria-hidden="true">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
           
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
          </div>
          <div class="modal-body">
            <form method="post">
              <div class="container" style="color:blue">
              <center>
              <h1>Register</h1>
            <p>Please fill the form to create an account</p>
            </center>
            <hr>
            <label for="email"><b>Email</b></label>
           <input type="text" placeholder="Enter Email" name="Remail" id="email" required>

          <label for="psw"><b>Password</b></label>
          <input type="password" placeholder="Enter Password" name="Rpsw" id="psw" required>

          <label for="psw-repeat"><b>Repeat Password</b></label>
          <input type="password" placeholder="Repeat Password" name="Rpsw-repeat" id="psw-repeat" required>
           <hr>
          <center>
           
          <button type="submit" class="registerbtn" name="btn_reg">Register</button>
          </center>
          </div>

        <div class="container signin">
        <p>Already have an account? <a data-toggle="modal" data-target="#modelIdL">Sign in</a>.</p>
       </div>
            
            </div>
            </form>
          </div>
          <div class="modal-footer">
          
          </div>
        </div>
      </div>
    </div>

    <div class="modal fade" id="modelIdL" tabindex="-1" role="dialog" aria-labelledby="modelTitleId" aria-hidden="true">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title">Login</h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
          </div>
          <div class="modal-body">
          <form method="post">
              <div class="container" style="color:blue">
              <center>
              <h1>Login</h1>
            
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

        <div class="container signin">
        <p>Don't have an account? <a  data-toggle="modal" data-target="#modelId">Register</a>.</p>
       </div>
            
            </div>
            </form>
          </div>
          <div class="modal-footer">
           
          </div>
        </div>
      </div>
    </div>
      
  