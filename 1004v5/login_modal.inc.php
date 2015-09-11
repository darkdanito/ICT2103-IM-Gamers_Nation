 <!-- Dialog Modal for login-->

<div class="modal fade" id="loginModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel1" aria-hidden="true">
	<div class="modal-dialog">
    	<div class="modal-content">
      		<div class="modal-header">
        		<button type="button" class="close" data-dismiss="modal">
                	<span aria-hidden="true">&times;</span>
                    <span class="sr-only">Close</span>
                </button>
        		
                <h4 class="modal-title" id="myModalLabel1">
					<?php 
                        if(isset($_SESSION['error']))
                        {
                            echo"login_modal.inc.php - Invalid Login. Please Login again.";
                        }
                    ?>
                    Login to order your food.
                </h4>
      		</div>
      		
            <div class="modal-body">
         		<form role="form" method="post" action="checklogin.php">
          			<div class="input-group input-group-lg">
          				<span class="input-group-addon">
            				<span class="glyphicon glyphicon-user"></span>
          				</span>
          			<input class="form-control" id="login" name="username" type="text" placeholder="Login ID" required>
        	</div>
        
        	<div class="input-group input-group-lg">
          		<span class="input-group-addon">
            		<span class="glyphicon glyphicon-lock"></span>
          		</span>
            	<input class="form-control" id="password" name="password" type="password" placeholder="Password" required>
        	</div>  
                
      		<div class="modal-footer">
				<button type="Submit" name = "Submit" class="btn btn-danger" >Login</button>
              	<button type="button" name = "Submit5" class="btn btn-default" data-toggle="modal" data-target="#ForgetPwModal" >Forgot Your Password?</button>
      		</div>
             	</form>
			</div>
		</div>
	</div>
</div>
 