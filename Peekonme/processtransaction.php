<?php
session_start();
include 'header.inc.php';
$totalcost = $_SESSION['totalcost'];
$chosenQuantity = $_SESSION['chosenquantity'];
$gametitle = $_SESSION['gametitle'];
$supplier_userid = $_SESSION['supplier_userid'];
$gameid = $_SESSION['gameid'];

//echo $totalcost;
//echo '<br>';
//echo $chosenQuantity;
//echo '<br>';
//echo $gametitle;
//echo '<br>';
//echo $supplier_userid;
//echo '<br>';
//echo $gameid;
$sql = "UPDATE SUPPLIER_OWN_GAME SET STOCK = STOCK - ".$chosenQuantity." WHERE SUPPLIER_USERID = '".$supplier_userid."' AND GAMEID = " .$gameid ;
if ($result = mysqli_query($connection, $sql)) {
    $row = mysql_num_rows($result);
    
    if ($row = 1) {
         $sql = "UPDATE SUPPLIER SET TOTAL_SALES = TOTAL_SALES + ".$totalcost." WHERE USERID = '".$supplier_userid."'";
         if($result2 = mysqli_query($connection,$sql)) {
             $row2 = mysql_num_rows($result2);
             if ($row2 = 1) {
                 $_SESSION["purchasesuccess"] = "Purchase Successful !";
            
             }
         }
         
    }
    else {
        $_SESSION["purchasefailed"] = "Purchase failed ! Please try again !";
    }
    header('Location: explore.php');
    
    
    
    
}

include 'footer.inc.php';
?>

  