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

        if (isset($_GET['id'])) 
		{
            $shopid = $_GET['id'];
        } else 
		{
            header('Location: imagedetail.php');
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

        ?>
        <div class="container" style="margin: 4em auto;">
            <table>
                <?php
					$sql = "SELECT * FROM supplier_own_game WHERE Supplier_UserID = '" . $shopid   .  "'";
					
					if ($result = mysqli_query($connection, $sql)) 
					{
                    	echo $shopid;
                        while($row = mysqli_fetch_assoc($result))
                		{
                            echo $shopid;
                            echo $row['Stock'];
                           
               	 		}
                	}

                ?>
            </table>
        </div>

        <div class="panel panel-transparent col-md-4">
            <br><br><br>
            
            <table>
                <thead>
                    <tr>
                        <th><strong>Game Name</strong></th>
                        <th><strong>Price</strong></th>
                        <th><strong>Stock Left</strong></th>
                    </tr>
                </thead>
                
                <?php
                $sql = "SELECT * FROM supplier_own_game WHERE Supplier_UserID = '" . $shopid . "'";

                if ($result = mysqli_query($connection, $sql)) {
                    while ($row = mysqli_fetch_assoc($result)) {
                        $sql2 = "SELECT * FROM game WHERE GameID = " . $row['GameID'];
                        if ($result2 = mysqli_query($connection, $sql2)) {
                            $row4 = mysqli_fetch_assoc($result2);
                        }
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
                        echo '<td style="width: 100px"> ';
                        echo '<input type="text" class="form-control" placeholder="amount">';
                        echo '</td>';
                        echo '</tr>';
                    }
                }
                ?>
                <td><button class="btn btn-info">Pay Now</button></td>
            </table>
        </div>

        <div class="panel panel-transparent col-md-6">
            <h1> <strong><?php echo $shopid; ?> </strong></h1>
           
        </div>
	</div>
  
    <?php include 'footer.inc.php'; ?>
    </body>
</html>
