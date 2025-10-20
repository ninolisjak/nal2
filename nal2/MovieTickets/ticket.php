<?php
session_start();


if(empty($_SESSION["username"])){
    header("location:index.php");
}
else{
    include("header.php");
}
$checked_value=0;
if(isset($_POST["btn_tic"])){
    $name=$_POST["temail"];
    $moviename=$_POST["film_id"];
    $st_kart=$_POST["st_kart"];
    $seat_dt=$_POST["seat_dt"];
    $sql="insert into vstopnice values(0,'$name','$moviename','$st_kart','$seat_dt')";
    $con->insert($sql,"Your ticket is booked");
}
?>
<script>
$(document).ready(function(){
    for(i=1;i<=4;i++){
        $('#seat_chart').append('<tr>')
        for(j=1;j<=10;j++){
            $('#seat_chart').append('<div class="col-md-2 mt-2 mb-2 ml-2 mr-2 text-center" style="background-color:grey;color:white"><input type="checkbox" id="seat" value="V'+(i+'S'+j)+'" name="seat_chart[]" class="mr-2 col-md2 mb-2" onclick="checkboxtotal()"/>V'+(i+'S'+ j)+'</div>')
        }
    }

});

function checkboxtotal(){
    var seat=[];
    $('input[name="seat_chart[]"]:checked').each(function(){
        seat.push($(this).val());
    });
    var st=seat.length;
    document.getElementById('stkart').value=st;
    $('#seat_details').text(seat.join(", "));
    $('#seat_details').val(seat.join(", "));
   
}

</script>

<section style="min-height:450px;">
<div class="container">
    <div class="row">
        <div class="col-md-7">
            <div id="seat-map" id="seatCharts">
                <h3 class="text-center mt-5" style="color:blue;">Select Seat</h3>
                <hr>
                <label style="width:100%;background-color:blue;color:white;padding:2%" class="tex-center">Screen</label>
            </div>
            <div class="row" id="seat_chart">
                
            </div>

        </div>
        <div class="col-md-5">
        <form method="post">
              <div class="container" style="color:blue">
              <center>
              <h1>Book your ticket</h1>
            <p>Please fill the form to book a ticket</p>
            </center>
            <hr>
            <label for="email"><b>Email</b></label>
           <input type="text" style="border-radius:30px;"  name="temail" id="email" required value=<?php echo $_SESSION["username"];?>>

          <label for="psw"><b>Film</b></label>
          <input type="text" style="border-radius:30px;" name="film_id"  required>

          <label for="psw-repeat"><b>št kart</b></label>
          <input type="number"  style="border-radius:30px;"  name="st_kart" id="stkart" required>
<hr>
          <label for="psw-repeat"><b>sedeži</b></label>
          <input type="text"  style="border-radius:30px;"  name="seat_dt"  id="seat_details" required>

           <hr>
          <center>
           
          <button type="submit" class="btn" style="background-color:blue;color:white;" name="btn_tic">Confirm Ticket</button>
          </center>
          </div>
</form>
        </div>
    </div>
</div>
</section>




<?php
include("footer.php");
?>