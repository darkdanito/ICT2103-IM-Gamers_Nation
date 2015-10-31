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
<<<<<<< HEAD
    
    <?php include 'header.inc.php'; ?>
    
    <body>
        
=======
    <?php include 'header.inc.php'; ?>
    <body>
>>>>>>> origin/master
        <?php


        if (isset($_GET['id'])) {
            $shopid = $_GET['id'];
        } else {
            header('Location: imagedetail.php');
        }
        
<<<<<<< HEAD
//        $sql = "SELECT * FROM supplier_own_game WHERE Supplier_UserID = " . $shopid;
//        if ($result = mysqli_query($connection, $sql)) {
//            while ($row = mysqli_fetch_assoc($result)) {
//                $gameID = $row['GameID'];
//                $gameStock = $row['Stock'];
//            }
//        }
// need implement count         
=======
        $sql = "SELECT * FROM supplier_own_game WHERE Supplier_UserID = " . $shopid;
        if ($result = mysqli_query($connection, $sql)) {
            while ($row = mysqli_fetch_assoc($result)) {
                $gameID = $row['GameID'];
                $gameStock = $row['Stock'];
            }
        }
        
>>>>>>> origin/master
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

<<<<<<< HEAD
                $sql = "SELECT * FROM supplier_own_game WHERE Supplier_UserID = ' " . $shopid   .  " ' ";
                        if ($result = mysqli_query($connection, $sql)) {
                            echo $shopid;
                            while($row = mysqli_fetch_assoc($result))
                {
                            echo $shopid;
                            echo $row['Stock'];
                           
                }
                }

=======
                $sql = "SELECT * FROM supplier_own_game WHERE Supplier_UserID = " . $shopid;
                if ($result = mysqli_query($connection, $sql)) {
                    while ($row = mysqli_fetch_assoc($result)) {
                        echo '<tr>';
                        echo '<td style="width: 125px"> ';
                        echo $row1['Supplier_UserID'];
                        echo '</td>';
                        echo '<td style="width: 100px"> ';
                        echo $row1['Stock'];
                        echo '</td>';
                        echo '</tr>';
                    }
                }
>>>>>>> origin/master
                ?>
            </table>
        </div>
  
    <?php include 'footer.inc.php'; ?>
    </body>
<<<<<<< HEAD
</html>
=======
</html>
>>>>>>> origin/master
