<?php
	require_once('protected/config1.php');
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
                    <h1>Sell your Games <span>Share with the rest of the world your amazing game!<br>
                        </span></h1>

                    <form class="form-horizontal" id="imageDesc" method="POST" action="userupload.php" enctype="multipart/form-data">
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
                                
                                // Check if a file has been uploaded
                                if (isset($_POST['gameID'])) 
								{
												
									// Connect to the database
									$dbLink = new mysqli('127.0.0.1', 'root', '', 'gamernationdb');
						
									if (mysqli_connect_errno()) 
									{
										die("MySQL connection failed: " . mysqli_connect_error());
									}
									
									$userID = $_SESSION['username'];		
									$gameID = test_input($_POST['gameID']);
									$gameStock = test_input($_POST['gameStock']);
	
									// Create the SQL query
									$query = "
				
									INSERT INTO `supplier_own_game`
									(
										`Supplier_UserID`, `GameID`, `Stock`
									)
									VALUES 
									(
									'{$userID}', '{$gameID}', '{$gameStock}'
									)";
	
									// Execute the query
									$result = $dbLink->query($query);
									
									// Check if it was successfull
									if ($result) 
									{
										$msgSuccess = 'Success! Your game was successfully added!';
										echo '<div class="alert alert-success col-lg-12" role="alert">' . $msgSuccess . '</div>';
									} else 
									{
										$msgErrorInsert1 = 'Error! Failed to add the game' . "<pre>{$dbLink->error}</pre>";
										echo '<div class="alert alert-danger col-lg-12" role="alert">' . $msgErrorInsert1 . '</div>';
									}

                                    // Close the mysql connection
                                    $dbLink->close();
                                }
                                ?>
                            
                            </div>
                        </div>
                                 
						<div class="form-group">
                            
                            <label class="col-sm-4 control-label"></label>
                            <div class="col-sm-4">
 								 Game ID: <input type="text" name="gameID" id="gameID" placeholder="Game ID">
                            </div>
                        </div>
                        
						<div class="form-group">
                            <label class="col-sm-4 control-label"></label>
                            <div class="col-sm-4">
 								 Game Stock: <input type="text" name="gameStock" id="gameStock" placeholder="Game Stock">
                            </div>
                        </div>


                        <div class="form-group">
                            <label class="col-sm-4 control-label"></label>
                            <div class="col-sm-4">
                                <input class="col-lg-12" type="submit" value="Sell Game" name="submit">    
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