 <!-- Dialog Modal for login-->


<div class="modal fade" id="feedbackModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel1" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
        <h4 class="modal-title" id="myModalLabel1"> 
            <?php if(isset($_SESSION['changepwfail'])) echo'Unable to change password. Please try again'; ?>
            <?php if(isset($_SESSION['recovery'])) {echo'Check your email for new password!'; } ?>
            <?php if(isset($_SESSION['changepwsuccess'])) {echo'You have successfully change your password'; } ?>
            <?php if(isset($_SESSION['noLogin'])) echo'Please login before ordering.';  ?>
            <?php if(isset($_SESSION['invoice'])) echo'Please go to the student service center to collect your food in 30mins. A summary of your order has been send to your email.'; ?>

            
        </h4>
      </div>
      
        <div class="modal-footer">
            <p>If you need further assistance, please email our 
                <a href="mailto:webgroup11@yahoo.com?subject=Forgot Password">
                    IT Helpdesk</a> </p>
      </div>
    </div>
  </div>
</div>
 