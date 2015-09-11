 <!-- Dialog Modal for login-->


<div class="modal fade" id="ResetPwModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel1" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
        <h4 class="modal-title" id="myModalLabel1">Change Your Password</h4>
      </div>
      <div class="modal-body">
          <p> To reset your password, enter your Password first followed by your new password.</p>
         <form role="form" method="post" action="updatePW.php">
          <div class="input-group input-group-lg">
          <span class="input-group-addon">
            <span class="glyphicon glyphicon-lock"></span>
          </span>
          <input class="form-control" id="login" name="oldpassword" type="password" placeholder="Current Password" required>
        </div>
        <div class="input-group input-group-lg">
          <span class="input-group-addon">
            <span class="glyphicon glyphicon-lock"></span>
          </span>
            <input class="form-control" id="password" name="newpassword" type="password" placeholder="New Password" required>
        </div>
      <div class="modal-footer">
              <button type="submit" name = "Submit4" class="btn btn-default" >Submit</button>
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
 