<?php
include("../conn.php");
session_start();
$n="";
$r="";


if(isset($_POST["btn_delete"]))
{
    
    
    $con=new connec();

    $table="filmiz";
    $id=$_GET["id"];
   
    
    $con->Delete($table,$id);
    header("Location:dashboard.php");



}
if(empty($_SESSION["admin_username"])){
    header("Location:index.php");

}
else{
    if(isset($_GET["id"])){
 $id=$_GET["id"];
$con=new connec();
$tbl="filmiz";
$result=$con->select($tbl,$id);
if($result->num_rows>0){
    $row=$result->fetch_assoc();
    $n=$row["name"];
    $r=$row["rel_date"];
    
}
    }
?>
<section>
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-10">
                <h5 class="text-center mt-2 "style="color:blue;">Delete Movies</h5>
                <form method="post">
                    <div class="container" style="color:blue;">
                        
                        <hr>
                        <label for="email"><b>Name</b></label>
           <input type="text" placeholder="Enter Name" name="name" id="name"value="<?php  echo $n?>" required>

          <label for="psw"><b>Release Date</b></label>
          <input type="date" placeholder="datec" name="rel_date" id="rel_date" value="<?php  echo $r?>" required>
         >
        
           <hr>
          <button type="submit" name="btn_delete" class="btn">Delete</button>
    
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









