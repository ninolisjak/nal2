<?php
include("../conn.php");
session_start();
if(empty($_SESSION["admin_username"]))
{
header("Location:index.php");
}
else{
    $con=new connec();
    $tbl="filmiz";
    $result=$con->select_all($tbl);
    ?>

    <!doctype html>
<html lang="en">
  <head>
    <title>Dashboard admin</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
  </head>
  <body>
  <nav class="navbar navbar-expand-sm navbar-dark" style="background-color:blue">
      <a class="navbar-brand" href="#"><img src="..//images/logo.webp" style="width:80px"></a>
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
          <li class="nav-item ">
            <a class="nav-link" href="../admin/index.php">Login</a>
          </li>
        </ul> 
      </div>
    </nav>
    

    <section>
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <a href="addmovie.php">Add Movie</a>
                <h5 class="text-center mt-2"style="color:blue;">Movie Details</h5>
                <table class="table mt-5" border="1">
                    <thead style="background-color:blue;color:white;">
                    <tr>
                        <th>Image</th>
                        <th>Name</th>
                        <th>Release date</th>
                        <th>Genre</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    
                    if($result->num_rows>0){
                        while($row=$result->fetch_assoc()){
                            $gid=$con->select("genre",$row["genre_id"]);
                            $genrerow=$gid->fetch_assoc()
                            ?>
                            <tr>
                        <td><img src="../<?php echo $row["movie_banner"];?>" style="height:100px;"></td>
                        <td><?php echo $row["name"];?></td>
                        <td><?php echo $row["rel_date"];?></td>
                        <td><?php echo $genrerow["genre_name"];?></td>
                        <td><a href="editmovies.php?id=<?php echo $row["id"];?>" class="btn btn-primary">Edit</a>
                        <a href="deletemovie.php?id=<?php echo $row["id"];?>" class="btn btn-danger">Delete</a></td>
                        
                    </tr>

                            <?php

                        }
                    }
                    ?>
                  
                </tbody>
                </table>
            </div>
                
            </div>
           

            </div>
        </div>
    </section>
   
    
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
  </body>
</html>
    
    <?php
}

?>