<?php
session_start();
include 'header.inc.php';

$arraysize =  $_SESSION['arraysize'];
$supplier_userid = $_SESSION['supplier_userid'];
$totalCost = $_SESSION['totalcost'];

for ($i=0; $i < $arraysize; $i++) {
    $chosenQuantity[$i] = $_SESSION['chosenquantity'][$i];
    $gameID[$i] = $_SESSION['gameid'][$i];
    $gameTitle[$i] = $_SESSION['gametitle'][$i];


//echo '<br>';
//echo 'Chosen Quantity: ' ;
//echo $chosenQuantity[$i];
//echo '<br>';
//echo 'Chosen gametitle: ' ;
//echo $gameTitle[$i];
////echo '<br>';
////echo 'Supplier ID: ' ;
////cho $supplier_userid;
//echo '<br>';
//echo 'Game ID: ';
//echo $gameID[$i];
//echo '<br>';


//echo 'Total cost: '; 
//echo $totalCost;
$sql = "UPDATE SUPPLIER_OWN_GAME SET STOCK = STOCK - ".$chosenQuantity[$i]." WHERE SUPPLIER_USERID = '".$supplier_userid."' AND GAMEID = " .$gameID[$i];


if ($result = mysqli_query($connection, $sql)) {
    $row = mysql_num_rows($result);
}
}

    if ($row = 1) {
    ?>
<?php
 
         $sql = "UPDATE SUPPLIER SET TOTAL_SALES = TOTAL_SALES + ".$totalCost." WHERE USERID = '".$supplier_userid."'";
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
    

include 'footer.inc.php';
?>

  