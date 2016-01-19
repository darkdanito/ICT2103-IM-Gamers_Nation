<?php
	session_start();
	
	if ((!isset($_SESSION['username']))) 
	{
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
            <h1>Update Stock <span>Stock more earn more!<br>
                </span></h1>

            <form class="form-horizontal" id="imageDesc" method="POST" action="userupdatestock.php">
                <div class="form-group">
                    <label  class="col-sm-4 control-label"></label>
                    <div class="col-sm-4">

                        <?php

                        function test_input($data) 
						{
                            $data = trim($data);
                            $data = stripslashes($data);
                            $data = htmlspecialchars($data);
                            return $data;
                        }

                        if ($_SERVER["REQUEST_METHOD"] == "POST") 
						{
                            $gameTitle = test_input($_POST["gameTitle"]);
                            $gameStock = test_input($_POST["gameStock"]);
                            $gamePrice = test_input($_POST["gamePrice"]);
                            
                            $gametitlevalid = $gamestockvalid = "";

                            if (empty($gameTitle)) 
							{
                                $gametitlevalid = false;
                            } else 
							{
                                $gametitlevalid = true;
                            }

                            if (empty($gameStock)) 
							{
                                $gamestockvalid = false;
                            } 
							else 
							{
                                if (is_numeric($gameStock)) 
								{
                                    $gamestockvalid = true;
                                } 
								else 
								{
                                    $gamestockvalid = false;
                                }
                            }

                            if ($gametitlevalid && $gamestockvalid) 
							{
                                //get gameid using game title
                                $gameID = "";
                                $sql = "SELECT G.GameID FROM game G WHERE Title = '" . $gameTitle . "'";
                            
							    if ($result = sqlsrv_query($conn, $sql)) 
								{
                                    while ($row = sqlsrv_fetch_array($result, SQLSRV_FETCH_ASSOC)) 
									{
                                        $gameID = $row['GameID'];
                                    }
                                }
								
                                $sql2 = "SELECT Stock, COUNT(*)AS num_rows FROM supplier_own_game WHERE GameID = '".$gameID."' AND Supplier_UserID = '".$_SESSION['username']."' GROUP BY Stock";
                                
								if ($result2 = sqlsrv_query($conn, $sql2)) 
								{
                                    $row_count = 0;
                                    $existStock = "";
                                    while ($row2 = sqlsrv_fetch_array($result2, SQLSRV_FETCH_ASSOC)) 
									{  
                                        $row_count++;
                                        $existStock = $row2['Stock'];
                                    } 
									
                                    if($row_count == 0)
									{
                                        $sql2 = "INSERT INTO supplier_own_game (Supplier_UserID,GameID,Stock) VALUES ('".$_SESSION['username']."','".$gameID."','".$gameStock."')";
                                        $stmt = sqlsrv_query($conn, $sql2);
                                        if ($stmt)
                                            echo '<p style="color: #38d29a;">Item had been successfully listed! </p>';     
                                    }
									else
									{
                                        $updateStock = (int)$gameStock + (int)$existStock;
                                        $sql3 = "UPDATE supplier_own_game SET Stock = '".$updateStock."' WHERE GameID = '".$gameID."' AND Supplier_UserID = '".$_SESSION['username']."'";
                                        $stmt = sqlsrv_query($conn, $sql3);
                                        if ($stmt)
                                            echo '<p style="color: #38d29a;">Item had been successfully listed! </p>';     
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
                    <label class="col-sm-4 control-label"></label>
                    <div class="col-sm-4">
                        <input style="width: 100%;" class="btn btn-primary" type="submit" value="Update" name="submit">    
                    </div>
                </div>

            </form>

        </div>

    </div>
	<?php include 'footer.inc.php'; ?>
</body>
</html>