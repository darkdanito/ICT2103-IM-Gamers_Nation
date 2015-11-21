<?php
	session_start();
?>
<!DOCTYPE html>

<html>
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        
        <title>Gamers Nation</title>
        
        <link href="css/bootstrap.min.css" rel="stylesheet">
        <link rel="stylesheet" href="css/main.css"/>
        <link href="css/star-rating.min.css" media="all" rel="stylesheet" type="text/css" />
        <script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
        <script src="js/star-rating.min.js" type="text/javascript"></script>        
    </head>
    
    <?php include 'header.inc.php'; ?>
    
    <body>
        
        <?php
        $chosenQuantity = "";
        
        if (isset($_GET['id']) && isset($_GET['game'])) 
        {
            $shopid = $_GET['id'];
            $gameid = $_GET['game'];
        } 
        
        $quantityvalid = "";
        $quantitymsg = "Quantity";
        
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            if(isset($_POST['quantity'])){
                $chosenQuantity = $_POST['quantity'];
                $currentStock = $_POST['stock'];
                $gameTitle = $_POST['title'];
                $gamePrice = $_POST['price'];
                
                //validate quantity                               
                if(empty($chosenQuantity)){
                    $quantitymsg = "Empty";
                    $quantityvalid = false;
                }else{
                    if(((int)$chosenQuantity <= (int)$currentStock) && ((int)$chosenQuantity > 0)){
                        $quantityvalid = true;
                    }else{
                        $chosenQuantity = "";
                        $quantitymsg = "Invalid";
                        $quantityvalid = false;
                    }
                }
                
            }
        }
        
        ?>
        <div class="container" style="margin: 4em auto;">
            <div class="panel panel-transparent col-md-5">
                <h1> <strong><?php echo "Seller: ".$shopid ?></strong></h1>
                <!--Select Quantity area-->
                <form class="form-horizontal" role="form" method="post" action="sellershop.php?id=<?php echo $shopid."&game=".$gameid; ?>">
                <table>
                    <thead>
                        <tr>
                            <th colspan="2"><strong>Game Name</strong></th>
                            <th colspan="2"><strong>Price</strong></th>
                            <th colspan="2"><strong>Stock Left</strong></th>
                        </tr>
                        <tr><th colspan="7"><hr></th></tr>
                    </thead>
                    <tbody>
                    <?php
//                    $_SESSION['supplier_userid'] = $shopid;
                    $sql = "SELECT SOG.GameID,SOG.Stock,G.Title,G.Price FROM supplier_own_game SOG,game G WHERE SOG.GameID = G.GameID AND SOG.Supplier_UserID ='" .$shopid . "' AND G.GameID='". $gameid . "'";
                    if ($result = mysqli_query($connection, $sql)) {
                        while ($row = mysqli_fetch_assoc($result)) {
                            echo '<tr>';
                            echo '<td style="width: 100px"> ';
                            echo $row['Title'];
                            echo '</td>';
                            echo '<td><input type="hidden" name="title" value="'.$row['Title'].'"></td>';
                            echo '<td style="width: 100px"> ';
                            echo $row['Price'];                            
                            echo '</td>';
                            echo '<td><input type="hidden" name="price" value="'.$row['Price'].'"></td>';
                            echo '<td style="width: 100px"> ';
                            echo $row['Stock'];
                            echo '</td>';
                            echo '<td><input type="hidden" name="stock" value="'.$row['Stock'].'"></td>';
                            echo '<td style="width: 200px"> ';
                            echo '<input type="text" class="form-control" placeholder="'.$quantitymsg.'" id="quantity" name="quantity" value="'.$chosenQuantity.'">';
                            echo '</td>';                            
                            echo '</tr>';
                        }
                    }
                    ?>
                    <tr><td colspan="7">&nbsp;</td></tr>
                    <tr><td colspan="7"><input style="width:100% ;" type="submit" value="Update Cart" class="btn btn-primary"/></td></tr>
                    </tbody>
                </table>
            </form>
            </div>
            <div style="float:right" class="panel panel-transparent col-md-5">
                <h1><strong>Shopping Cart</strong></h1>
                <div>
                    <table>
                        <thead>
                            <tr>
                                <td style="width: 125px">Game Name</td>
                                <td style="width: 100px">Price/Unit</td>
                                <td style="width: 100px">Amount</td>
                                <td style="width: 100px">Total Cost</td>
                            </tr>
                            <tr><td colspan="4"><hr></td></tr>
                        </thead>
                        <tbody>
                        <?php
                        if ($_SERVER["REQUEST_METHOD"] == "POST") {
                            if ($quantityvalid) {
                                if ($chosenQuantity > 0) {
                                    echo '<form action="processtransaction.php" method="post">';
                                    echo '<tr>';
                                    echo '<td style="width: 100px"> ';
                                    echo $gameTitle;
                                    echo '</td>';
                                    echo '<td style="width: 100px"> ';
                                    echo $gamePrice;
                                    echo '</td>';
                                    echo '<td>';
                                    echo $chosenQuantity;
                                    echo '</td>';
                                    echo '<td></td>';
                                    echo '</tr>';
                                    echo '<tr><td colspan="4"><hr></td></tr>';
                                    $totalcost = $gamePrice * $chosenQuantity;
                                    echo '<tr><td colspan="3"></td><td>'. $totalcost .'</td></tr>';
                                    echo '<tr><td colspan="4"><hr></td></tr>';
                                    echo '<tr><td colspan="4"> </td></tr>';
                                    echo '<tr><td colspan="4"><input style="width:100%;" type="submit" value="Pay now" class="btn btn-primary"/></td></tr>';
                                    echo '<input type="hidden" name="gameid" value="'.$gameid.'">';
                                    echo '<input type="hidden" name="shopid" value="'.$shopid.'">';
                                    echo '<input type="hidden" name="title" value="'.$gameTitle.'">';
                                    echo '<input type="hidden" name="price" value="'.$gamePrice.'">';
                                    echo '<input type="hidden" name="quantity" value="'.$chosenQuantity.'">';
                                    echo '</form>';

//                                    $gameTitlearr[] = $gameTitle;
//                                    $chosenQuantityarr[] = $chosenQuantity;
//                                    $gameIdarr[] = $gameid;
//
//                                    $_SESSION['gametitle'] = $gameTitlearr;
//                                    $_SESSION['totalcost'] = $totalcost;
//                                    $_SESSION['chosenquantity'] = $chosenQuantityarr;
//                                    $_SESSION['gameid'] = $gameIdarr;
//
////                                    print_r(sizeof($gameTitlearr));
//                                    $_SESSION['arraysize'] = sizeof($gameTitlearr);
                                }
                            }
                        }
                        ?> 
                        </tbody>
                    </table>
                </div>
            </div>
        </div> 
    <?php include 'footer.inc.php'; ?>
    </body>
</html>
