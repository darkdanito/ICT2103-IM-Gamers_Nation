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
        $chosenQuantity= "";
        
        if (isset($_GET['id'])) 
        {
            $shopid = $_GET['id'];
        } 
        
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            
 //           $chosenQuantity = $_POST['row1'];
        }
        
        
//        $sql = "SELECT * FROM supplier_own_game WHERE Supplier_UserID = " . $shopid;
//        if ($result = mysqli_query($connection, $sql)) {
//            while ($row = mysqli_fetch_assoc($result)) {
//                $gameID = $row['GameID'];
//                $gameStock = $row['Stock'];
//            }
//        }
// need implement count         

//        $sql2 = "SELECT * FROM game WHERE GameID = " . $gameID;
//        if ($result2 = mysqli_query($connection, $sql2)) {
//            while ($row2 = mysqli_fetch_assoc($result2)) {
//                $gameName = $row['Title'];
//                $gamePrice = $row['Price'];
//
//            }
//        }
//$chosenQuantity =0;
//        if ($_SERVER["REQUEST_METHOD"] == "GET") 
//			{
////                $chosenName = $_GET["Name"];
////                $chosenPrice = $_GET["Price"]; 
////                $chosenQuantity = $_GET["row2"];
//            for ($x = 0; $x < $rowCounter; $x++){
//                $chosenQuantity = $_GET["row' .$x. '"];
//            }
//                        }
        ?>
        <div class="container" style="margin: 4em auto;">

            <div class="panel panel-transparent col-md-4">
                <br><br><br>
                <form class="form-horizontal" role="form" method="post" action="sellershop.php?id=<?php echo $shopid ?>">
                <table>
                    <thead>
                        <tr>
                            <th><strong>Game Name <?php echo $shopid; ?></strong></th>
                            <th><strong>Price</strong></th>
                            <th><strong>Stock Left</strong></th>
                        </tr>
                    </thead>

                    <?php
                    $sql = "SELECT * FROM supplier_own_game WHERE Supplier_UserID = '" . $shopid . "'";
                    $_SESSION['supplier_userid'] = $shopid;
                    if ($result = mysqli_query($connection, $sql)) 
					{
                        $rowCounter = 0;
                        while ($row = mysqli_fetch_assoc($result)) 
						{
                            $sql2 = "SELECT * FROM game WHERE GameID = " . $row['GameID'];
                            if ($result2 = mysqli_query($connection, $sql2)) 
							{
                                $row4 = mysqli_fetch_assoc($result2);
                            }
							
							if($row['Stock'] != 0)
							{
								$rowCounter++;
								echo '<tr>';
								echo '<td style="width: 100px"> ';
								echo $row4['Title'];
								echo '</td>';
								echo '<td style="width: 100px"> ';
								echo $row4['Price'];
								echo '</td>';
								echo '<td style="width: 100px"> ';
								echo $row['Stock'];
								echo '</td>';
								echo '<td style="width: 190px"> ';
								echo '<input type="text" class="form-control" placeholder="Quantity" id="row' .$rowCounter. '" name="row' .$rowCounter. '">';
								echo '</td>';
								echo '</tr>';
							}
							
                            
                        }
                    }
                    ?>
                    <td><input type="submit" value="Update Cart" class="btn btn-primary" data-toggle="modal" data-target="#viewcart"/></td>
                </table>
            </form>
            </div>

            <div class="panel panel-transparent col-md-6">
                <h1> <strong><?php echo $shopid; ?> </strong></h1>

            </div>
            <div style="float:right" class="panel panel-transparent col-md-4">
                <h1> <strong>Shopping Cart</strong></h1>
               <div class="table-hover">
<!--            the below div change to form and run sql to edit database-->
                   <div>
                       <table class="modal-title" id="myModalLabel">
                                <tr class="modal-header">
                                    <td style="width: 125px">Game Name</td>
                                    <td style="width: 100px">Price/Unit</td>
                                    <td style="width: 100px">Amount</td>
                                    <td style="width: 100px">Total Cost</td>
                                </tr>
                            <?php 
                            
                            if ($_SERVER["REQUEST_METHOD"] == "POST") 
							{
                            	if ($result = mysqli_query($connection, $sql)) 
								{
                                	$x = 0;
                                    $i = 0;
                                    $totalcost = 0;
									
                                    while ($row = mysqli_fetch_assoc($result)) 
									{
                                        $sql2 = "SELECT * FROM game WHERE GameID = " . $row['GameID'];
                                        if ($result2 = mysqli_query($connection, $sql2)) 
										{
                                            $row4 = mysqli_fetch_assoc($result2);
                                        }
                                        
                                        $x++;
                                        $chosenQuantity = $_POST['row'.$x.''];
                                        if ($chosenQuantity > 0 )
										{
											echo '<form action="processtransaction.php" method="post">'; 
											echo '<tr>';
											echo '<td style="width: 100px"> ';
											echo $row4['Title'];
										 // echo $row4['Supplier_userid'];
											echo '</td>';
											echo '<td style="width: 100px"> ';
											echo $row4['Price'];
											echo '</td>';
											echo '<td>';
											echo $chosenQuantity;
											echo '</td>';
											echo '</tr>';
                                        $totalcost =  $row4['Price'] * $chosenQuantity + $totalcost;
//                                        $_SESSION['gametitle'] = $row4['Title'];
//                                        $_SESSION['totalcost'] = $totalcost;
//                                        $_SESSION['chosenquantity'] = $chosenQuantity;
//                                        $_SESSION['gameid'] = $row4['GameID'];
                                        
                                        
                                        $gameTitlearr[] = $row4['Title'];
//                                        $totalCostarr[] = $totalcost;
                                        $chosenQuantityarr[] = $chosenQuantity;
                                        $gameIdarr[] = $row4['GameID'];
                                        
                                        $_SESSION['gametitle'] = $gameTitlearr;
                                        $_SESSION['totalcost'] = $totalcost;
                                        $_SESSION['chosenquantity'] = $chosenQuantityarr;
                                        $_SESSION['gameid'] = $gameIdarr;
                                        
//                                        $_SESSION['gameData'][$i]['gametitle'] = $row4['Title'];
//                                        $_SESSION['gameData'][$i]['totalcost'] = $totalcost;
//                                        $_SESSION['gameData'][$i]['chosenquantity'] = $chosenQuantity;
//                                        $_SESSION['gameData'][$i]['gameid'] = $row4['GameID'];
                                        $i++;
                                       // $_SESSION['gameData'][$i]['supplier_userid'] = $supplier_userid;
                                        
                                        }
                                        
                                    }
                                    
//                                    print_r(sizeof($gameTitlearr));
                                    $_SESSION['arraysize'] = sizeof($gameTitlearr);
                                    
                                    echo '<tr><td></td><td></td><td></td><td>';
                                    if ($totalcost > 0){
                                        echo $totalcost ;                                
                                    }
                                    echo '</td></tr>';
                                }
                            }
                            ?>   
                        </table>
                   </div>
                    <div class="modal-footer">
                        
                        <input type="submit" value="Pay now" class="btn btn-primary"/>
                        <?php echo '</form>' ?>        
                    
                

                    </div>
                    </div>
            </div>
                </div> 
            
	
  
    <?php include 'footer.inc.php'; ?>
        
        
    </body>
</html>
