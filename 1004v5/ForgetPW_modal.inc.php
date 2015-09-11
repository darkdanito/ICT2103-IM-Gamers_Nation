 <!-- Dialog Modal for login-->


<div class="modal fade" id="ForgetPwModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel1" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
        <h4 class="modal-title" id="myModalLabel1"> <?php if(isset($_SESSION['recovery'])) echo'Check your email for new password!' ?><?php if(isset($_SESSION['forgetPWErr'])) echo "Matriculation Number and the Email Address is not valid!"; else { echo "Forgot Your Password";}?></h4>
      </div>
      <div class="modal-body">
          <?php
          if(isset($_SESSION['forgetPWErr' === 1])){
          echo "<p>Matriculation Number and the Email Address does not match!</p>";
          }
          else{
              echo "<p> To reset your password, enter your Matriculation Number and the Email Address that you used when you applied in SIT.</p>";
          }
          ?>
         <form role="form" method="post" action="recovery.php">
          <div class="input-group input-group-lg">
          <span class="input-group-addon">
            <span class="glyphicon glyphicon-lock"></span>
          </span>
          <input class="form-control" id="login" name="username" type="text" placeholder="Matriculation ID" required>
        </div>
        <div class="input-group input-group-lg">
          <span class="input-group-addon">
            <span class="glyphicon glyphicon-lock"></span>
          </span>
            <input class="form-control" id="password" name="email" type="email" placeholder="Email" required>
        </div>
            
      <div class="modal-footer">
              <button type="Submit" name = "Submit3" class="btn btn-default" >Submit</button>
      </div>
            
             </form>
      </div>
        <div class="modal-footer">
            <p>If you need further assistance, please email our 
                <a href="mailto:webgroup11@yahoo.com?subject=Forgot Password">
                    IT Helpdesk</a> </p>
      </div>
    </div>
  </div>
</div>
 