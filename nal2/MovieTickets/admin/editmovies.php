<?php
include("../conn.php");
session_start();
$n="";
$r="";


if(isset($_POST["btn_update"]))
{
    
    $name = $_POST["name"];
    $rel_date = $_POST["rel_date"];
    $con=new connec();

    
    $id=$_GET["id"];
    $sql="update filmiz set name='$name', rel_date='$rel_date' WHERE id='$id'";
    
    $con->insert($sql,"Updated");
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
                <h5 class="text-center mt-2 "style="color:blue;">Edit Movies</h5>
                <form method="post">
                    <div class="container" style="color:blue;">
                        
                        <hr>
                        <label for="email"><b>Name</b></label>
           <input type="text" placeholder="Enter Name" name="name" id="name"value="<?php  echo $n?>" required>

          <label for="psw"><b>Release Date</b></label>
          <input type="date" placeholder="datec" name="rel_date" id="rel_date" value="<?php  echo $r?>" required>
         >
        
           <hr>
          <button type="submit" name="btn_update" class="btn">Update</button>
    
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









