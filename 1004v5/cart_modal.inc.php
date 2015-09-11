<?php  include 'db.php';?>
<?php 
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}
?>
<!-- Dialog Modal for Cart-->
        <div class="modal fade" id="CartModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel2" aria-hidden="true">
          <div class="modal-dialog">
            <div class="modal-content">
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                <h4 class="modal-title" id="myModalLabel2">Shopping Cart</h4>
              </div>
              <div class="modal-body">
                  <form name="form1" method="post" action="checkout_modal.inc.php">
                      <input type="hidden" name="pid" />
                    <input type="hidden" name="command" />

                 <?php 
                 if (ISSET($_SESSION['cart'])){
                 $i = 0;
                 $subtotal = 0.00;
                 $total = 0.00;
                     
                            echo'<div class="table-responsive">';
                            echo '<table width="100%">';
                            echo '<tr><td></td><td>Name</td><td>Quantity</td><td>Price</td><td>Subtotal</td></tr>';
                  for($i = 0 ; $i < count($_SESSION['cart']) ; $i++) {
 
                       // $comma_separated = implode(",", $_SESSION['cart'][$i]);
                       // $mID = $comma_separated[0].$mID = $comma_separated[1];
                       // $qty =  $comma_separated[2];
                     $mID=  $_SESSION['cart'][$i]['productid'];
                     $qty = $_SESSION['cart'][$i]['qty'];
                         // $qty1 = int($qty);
                         $sql = "SELECT * FROM `menu` WHERE menuID = '{$mID}'";
                           if($result = mysqli_query($connection, $sql)){
                            while($row = mysqli_fetch_assoc($result)){
                           echo '<tr>';
                           echo '<td>';
                           echo '<img src= "';
                           echo $row['imgDir'];
                           echo '" height="200" width="200">'; 
                           echo '</td><td>';
                           
                           echo $row['menuDesc'];
                           echo '</td><td align="center">';
                           echo ' <input type="text" maxlength="2" style="width:35px;"  value="';
                            echo $qty;
                            echo '" name="product';
                            echo $mID ;
                            echo '">';
                            echo '</td><td>';
                           echo ' $'.$row['menuCost']; 
                        $subtotal = ($row['menuCost'] * $qty) ;
                        $total += $subtotal;
                        
                         echo '</td><td>$';   
                        echo '<label name="cost"> $'.$subtotal.'</label>';;
                        echo '<input type="hidden" name="subtotal" value="';
                        echo $subtotal.'"    />';
                        echo '<input type="hidden" name="total" value="';
                        echo $total.'"    />';
                        
                        echo '   <td><a href="javascript:del(';
                        echo $mID;
                        echo ')">Remove</a></td></tr>';

                            }}
                            
                  } 
                   echo '<tr><input type="button" value="Update Cart" onclick="update_cart()"></tr>';
                  echo'</table>';
                  echo '</div>';
                 }
                 else{
                     echo'<p> Empty cart </p>';                     
                 }
                  ?>
                   
                 
                    
                   
              </div>
              <div class="modal-footer">
                   <textarea class="pull-left" name="remark" rows="4" cols="40"  placeholder="Remark if any"></textarea>
             
                  <div class="pull-right">Total: $<?php if(ISSET($total)) echo $total ?></div>
                   <br>
                   <br>
                   <?php if (isset($_SESSION['cart'])){
                   echo '<input type="button" class="btn btn-danger pull-right" value="Check Out" onclick="insert_order()">';
                   
                   } ?>
                    </form>
              </div>
            </div>
          </div>
        </div>

<script language="javascript">
	function del(pid){
		if(confirm('Do you really mean to delete this item')){
			document.form1.pid.value=pid;
			document.form1.command.value='delete';
			document.form1.submit();
		}
	}

function update_cart(){
		document.form1.command.value='update';
		document.form1.submit();
	}

function insert_order(){
    		document.form1.command.value='insert';
		document.form1.submit();

}



</script>

