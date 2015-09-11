<link href="css/newcss.css" rel="stylesheet" >

<div class="modal fade" id="profileModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel1" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
        <h4 class="modal-title" id="myModalLabel1">Profile ID : <?php echo $_SESSION["username"] ?> </h4>
      </div>
        
        <?php
       $sql = "SELECT paymentDUE from user where mID='".$_SESSION["username"]."'";
        if($result = mysqli_query($connection,$sql))
        {
            while($row = mysqli_fetch_assoc($result))
            {
                echo "<p> Do remember to eat well! </p>";
                echo "<p> 1 Day more to Black Friday! </p>";
                ?>
        
        <?php
                echo "<p>You have spent $";
                echo $row['paymentDUE'];
                echo "/- on food</p>";
                echo "<p> This amount will be credited to your school fees.</p>";
                
                
            }
        }
        ?>
      <div class="modal-body"> 
          <form role="form" method="post" action="checklogin.php">
      <div class="modal-footer">
          <button type="Submit" name = "Submit2" class="btn btn-default" >Logout</button>  
      <button type="button" name = "changepasswordbutton" class="btn btn-danger" data-toggle="modal" data-target="#ResetPwModal" >Change Password</button>
      </div>
          </form>
      </div>
    </div>
  </div>
</div>