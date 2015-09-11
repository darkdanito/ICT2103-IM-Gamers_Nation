 <!-- Dialog Modal for login-->


<div class="modal fade" id="eModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel1" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
        <h4 class="modal-title" id="myModalLabel1">Error Message / Notification</h4>
      </div>
      <div class="modal-body">
    
     <?php 
     if (isset($_SESSION['noLogin'])){
         echo' Please Login!';
  
    
} 
if (isset($_SESSION['invoice'])){
         echo'Order success. You can collect your food 30 min later. An order summary has been send to your email.';
    unset($_SESSION['invoice']);
    
}
     ?>
        </div>      
      <div class="modal-footer">
            <?php  if (isset($_SESSION['noLogin'])){
            echo '  <button type="Submit" name = "Submit" class="btn btn-danger" data-toggle="modal" data-target="#loginModal">Login</button>';
              unset($_SESSION['noLogin']);
            }?>
              
      </div>
             </form>
      </div>
    </div>
  </div>
</div>
 