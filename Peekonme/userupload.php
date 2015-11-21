<?php
require_once('protected/config1.php');
session_start();

if ((!isset($_SESSION['username']))) {
    header('Location: login.php');
}
?>
<!DOCTYPE html>

<html>
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">

        <title>Gamers Nation</title>

        <link href="css/bootstrap.min.css" rel="stylesheet">
        <link href="css/main.css" rel="stylesheet"/>
    </head>

    <?php include 'header.inc.php'; ?>
    <body>

        <div class="container-fluid">

            <?php include '/include/userdetail.inc.php'; ?>
            <?php include '/include/mainNav.inc.php'; ?>

        </div>
        <div class="content">
            <h1>Sell your Games <span>Share with the rest of the world your amazing game!<br>
                </span></h1>

            <form class="form-horizontal" id="imageDesc" method="POST" action="userupload.php" enctype="multipart/form-data">
                <div class="form-group">
                    <label  class="col-sm-4 control-label"></label>
                    <div class="col-sm-4">

                        <?php

                        function test_input($data) {
                            $data = trim($data);
                            $data = stripslashes($data);
                            $data = htmlspecialchars($data);
                            return $data;
                        }

                        if ($_SERVER["REQUEST_METHOD"] == "POST") {
                            $gameTitle = test_input($_POST["gameTitle"]);
                            $gameStock = test_input($_POST["gameStock"]);
                            $gamePrice = test_input($_POST["gamePrice"]);
                            

                            $gametitlevalid = $gamestockvalid = "";

                            if (empty($gameTitle)) {
                                $gametitlevalid = false;
                            } else {
                                $gametitlevalid = true;
                            }

                            if (empty($gameStock)) {
                                $gamestockvalid = false;
                            } else {
                                if (is_numeric($gameStock)) {
                                    $gamestockvalid = true;
                                } else {
                                    $gamestockvalid = false;
                                }
                            }

                            if ($gametitlevalid && $gamestockvalid) {
                                //get gameid using game title
                                $gameID = "";
                                $sql = "SELECT G.GameID FROM game G WHERE Title = '" . $gameTitle . "'";
                                if ($result = mysqli_query($connection, $sql)) {
                                    while ($row = mysqli_fetch_assoc($result)) {
                                        $gameID = $row['GameID'];
                                    }
                                }
                                
                                $sql2 = "SELECT Stock, COUNT(*)AS num_rows FROM supplier_own_game WHERE GameID = '" . $gameID . "' AND Supplier_UserID = '".$_SESSION['username']."'";
                                if ($result2 = mysqli_query($connection, $sql2)) {
                                    $row2 = mysqli_fetch_assoc($result2);
                                    if($row2['num_rows'] == 0){                                        
                                        $sql2 = "INSERT INTO supplier_own_game (Supplier_UserID,GameID,Stock,price) VALUES (?,?,?,?)";
                                        if ($statement = mysqli_prepare($connection, $sql2)) {
                                            mysqli_stmt_bind_param($statement, 'ssss', $_SESSION['username'], $gameID, $gameStock, $gamePrice);
                                            $result = mysqli_stmt_execute($statement);
                                            if ($result) {
                                                echo '<p style="color: #38d29a;">Item had been successfully listed! </p>';
                                            } 
                                        }
                                    }else{
                                        $updateStock = (int)$gameStock + (int)$row2['Stock'];
                                        $sql3 = "UPDATE supplier_own_game SET Stock = ? WHERE GameID = '" . $gameID . "' AND Supplier_UserID = '".$_SESSION['username']."'";
                                        if ($statement = mysqli_prepare($connection, $sql3)) {
                                            mysqli_stmt_bind_param($statement, 's', $updateStock);
                                            $result2 = mysqli_stmt_execute($statement);
                                            if ($result2) {
                                                echo '<p style="color: #38d29a;">Item had been successfully listed! </p>';
                                            }
                                        }
                                    }  
                                }
                            }
                        }
                        ?>
                    </div>
                </div>

                <div class="form-group">

                    <label class="col-sm-4 control-label">Game Title:</label>
                    <div class="col-sm-4">
                        <input type="text" class="form-control typeahead tt-query auto" placeholder="Game Title" name="gameTitle" id="gameTitle">
                    </div>
                </div>

                <div class="form-group">
                    <label class="col-sm-4 control-label">Game Stock:</label>
                    <div class="col-sm-4">                        
                        <input type="text" class="form-control" name="gameStock" id="gameStock" placeholder="Game Stock">
                    </div>
                </div>
                
                <div class="form-group">
                    <label class="col-sm-4 control-label">Game Price:</label>
                    <div class="col-sm-4">                        
                        <input type="text" class="form-control" name="gamePrice" id="gamePrice" placeholder="Game Price">
                    </div>
                </div>


                <div class="form-group">
                    <label class="col-sm-4 control-label"></label>
                    <div class="col-sm-4">
                        <input style="width: 100%;" class="btn btn-primary" type="submit" value="Sell Game" name="submit">    
                    </div>
                </div>

            </form>

        </div>

    </div>
<?php include 'footer.inc.php'; ?>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script> 
    <script src="js/bootstrap.min.js"></script>
</body>
</html>