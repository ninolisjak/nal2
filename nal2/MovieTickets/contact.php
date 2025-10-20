<?php
include("header.php");


if(isset($_POST["btn_subt"]))
{
    $name=$_POST["name"];
    $email=$_POST["email"];
    $messg=$_POST["message"];
    $sql="insert into contact value(0,'$name','$email','$messg',now())";
    $con =new connec();
    $con->insertmsg($sql);
   
}
?>

<section style="min-height:450px;">
<div class="container"  style="color:blue">
    <div class="col-md-12">
    <center>
              <h1>Contact us</h1>
            <p>If you've encountered some problems or if you want to ask any questions please fill out the form and we'll respond as soon as possible</p>
            </center>
    </div>
    <div class="row">
        <div class="col-6">
        <form method="post">
              <div class="container" style="color:blue">
            
            <label for="username"><b>Name</b></label>
           <input type="text" style="border-radius:30px;" placeholder="Enter Name" name="name" id="username" required>

          <label for="email"><b>Email</b></label>
          <input type="text" style="border-radius:30px;" placeholder="Enter mail" name="email" id="email" required>

          <label for="message"><b>Message</b></label>
          <textarea name="message" id="message"  rows="10"style="resize:none;width:100%;border-radius:30px;"></textarea>
           
          <center>
           
          <button type="submit" class="Submittic" name="btn_subt">Submit</button>
          </center>
          </div>

            
            </div>
            </form>
        </div>
        <div class="col-6"  style="border-radius:30px;background-color:blue">
       



        </div>

    </div>
</div>
</section>

<?php
include("footer.php");
?>