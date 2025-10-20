<?php
include("../conn.php");
session_start();

if(isset($_POST["btn_insert"]))
{
    $name = $_POST["name"];
    $rel_date = $_POST["rel_date"];

    $con=new connec();
    $sql="insert into filmiz values(0,'$name', '' ,'$rel_date',2)";
    $con->insert($sql,"added");
    header("Location:dashboard.php");
   





}
if(empty($_SESSION["admin_username"])){
    header("Location:index.php");

}
else{
   
?>
<section>
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-10">
                <h5 class="text-center mt-2 "style="color:blue;">Add Movie</h5>
                <form method="post">
                    <div class="container" style="color:blue;">
                        
                        <hr>
                        <label for="email"><b>Movie Name</b></label>
           <input type="text" placeholder="Enter Name" name="name" id="name" required>

          <label for="psw"><b>Release date </b></label>
          <input type="date" placeholder="datec" name="rel_date" id="rel_date"  required>
        <!--<label><b>Select image</b></label>
        <input type="file" name="fileToUpload" id="fileToUpload" style="border-radius:30px;" required>
        <br><br>-->
        


         
        
           <hr>
          <button type="submit" name="btn_insert" class="btn">Add</button>
    
                    </div>
                </form>
            </div>
            </div>
        </div>
    </div>
</section>
<?php
}



?>









