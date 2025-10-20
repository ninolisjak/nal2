<?php
include("header.php");



$con = new connec();
$tbl="filmiz";
//$result=$con->select_all($tbl);
$result=$con->select_movie($tbl," now()");
?>      
<section class="mt-5">
  
    <h5 class="text-center">Trenutni filmi</h5>
    <div class="container">
        <div class="row">
            <?php
            if($result->num_rows>0){
                while($row=$result->fetch_assoc()){
                    $gid=$con->select("genre",$row["genre_id"]);
                    $genrerow=$gid->fetch_assoc()
                    ?>
                    <div class="col-md-3">
                <img src="<?php echo $row["movie_banner"];?>" style="width:100%; height:350px;">
                <h6 class="text-center mt-2" style="height:40px;"><?php echo $row["name"];?></h6>
                <p><b>Release date: </b><?php echo $row["rel_date"];?></p>
                <p><b>Genre: </b><?php echo $genrerow["genre_name"];?></p>
                <a href="ticket.php" class="btn"style="background-color:blue;color:white;">Book a Ticket</a>
            </div>


                    <?php
                }
            }
            ?>
           
        </div>
    </div>
</section>


<section style="min-height:450px"></section>





<?php
include("footer.php")
?>