<?php
	session_start();
	
	if ((!isset($_SESSION['username']))) 
	{
		header('Location: login.php');
	}
	
	$recipeid = $_GET['id'];
?>
<!DOCTYPE html>

<html>
    <head>
        <meta charset="UTF-8">
        <title>Gamers Nation</title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
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
            <h1>Sell your Games 
            	<span>Share with the rest of the world your amazing game!</span>
            </h1>

            <form class="form-horizontal" id="imageDetail" method="POST" action="userupload.php" enctype="multipart/form-data">
                <div class="form-group">
                    <label  class="col-sm-4 control-label">Game image</label>
                    <div class="col-sm-4">
                        <?php
                        if ($_SERVER["REQUEST_METHOD"] == "POST") 
						{
                            //validation
                            $imageuploadvalid = $gameTitlevalid = $gamePublishervalid = $gameYearReleasedvalid = $gamePlatformvalid = $gameRegionvalid = $gamePricevalid ="";
                            // Check if a file has been uploaded
                            if (isset($_FILES['fileToUpload'])) 
							{
                                if ($_FILES['fileToUpload']['name'] == "") 
								{
                                    $imageuploadvalid = false;
                                } 
								else 
								{
                                    $imageuploadvalid = true;
                                }
                            }

                            $gameTitle = test_input($_POST['gameTitle']);
                            $gamePublisher = test_input($_POST['Publisher']);
                            $gameYearReleased = test_input($_POST['YearReleased']);
                            $gamePlatform = test_input($_POST['Platform']);
                            $gameRegion = test_input($_POST['Region']);
                            $gamePrice = test_input($_POST['Price']);

                            if (empty($gameTitle)) 
							{
                                $gameTitlevalid = false;
                            } 
							else 
							{
                                $sql = "if exists(select * from game where title= '".$gameTitle."') select 1 as returnValue else select 0 as returnValue";
                                if ($result = sqlsrv_query($conn, $sql))
                                {
                                    while ($row = sqlsrv_fetch_array($result, SQLSRV_FETCH_ASSOC))  
                                    {
                                        if ($row['returnValue'] == 0)
                                        {
                                            $gameTitlevalid = true;
                                        }
										else
										{
                                            $gameTitlevalid = false;
                                        }
                                    }
                                }
                            }
                            
                            if (empty($gamePublisher)) 
							{
                                $gamePublishervalid = false;
                            } 
							else 
							{
                                $gamePublishervalid = true;
                            }
                            
                            if (empty($gameYearReleased)) 
							{
                                $gameYearReleasedvalid = false;
                            } 
							else 
							{
                                $gameYearReleasedvalid = true;
                            }
                            
                            if (empty($gamePlatform)) 
							{
                                $gamePlatformvalid = false;
                            } 
							else 
							{
                                $gamePlatformvalid = true;
                            }
                            
                            if (empty($gameRegion)) 
							{
                                $gameRegionvalid = false;
                            } 
							else 
							{
                                $gameRegionvalid = true;
                            }
                            
                            if (empty($gamePrice)) 
							{
                                $gamePricevalid = false;
                            } 
							else 
							{
                                $gamePricevalid = true;
                            }
                            
                            if(!$gameTitlevalid)
							{
                                echo "Game already exists";
                            }
							else if ($imageuploadvalid && $gameTitlevalid && $gamePublishervalid && $gameYearReleasedvalid && $gamePlatformvalid && $gameRegionvalid && $gamePricevalid) 
							{
                                // FTP access parameters
                                $ftp_username = 'gamernation\$gamernation';
                                $ftp_userpass = 'flXTgM9hiBpoWKuGmbwZgbPqg0drXT94tlxRco4A97vGDsDfwKSy3RyBLlnv';
                                
                                // connect and login to FTP server
                                $ftp_server = 'waws-prod-sg1-009.ftp.azurewebsites.windows.net';
                                $conn_id  = ftp_connect($ftp_server) or die("Could not connect to $ftp_server");
                                $login = ftp_login($conn_id , $ftp_username, $ftp_userpass);
                                // upload file
                                ftp_pasv($conn_id, true);
                                $file = basename($_FILES["fileToUpload"]["name"]);
                                $remote_file_path = "/site/wwwroot/Picture/".$file;
                                if (ftp_put($conn_id, $remote_file_path, $_FILES["fileToUpload"]["tmp_name"],FTP_BINARY))
                                {
                                    echo "Successfully uploaded";
                                }
                                else
                                {
                                    echo "Error uploading";
                                }
                                
                                // // close connection
                                ftp_close($conn_id);
                                
                                //sql
                                $imagePath = "Picture/".$file;
                                $sql = "INSERT INTO game (Title,Publisher,Year_Released,Platform,Region,Price,ImagePath) 
										VALUES ('".$gameTitle."','".$gamePublisher."','".$gameYearReleased."','".$gamePlatform."','".$gameRegion."','".$gamePrice."','".$imagePath."')";
                                $stmt = sqlsrv_query($conn, $sql);
                                if ($stmt == FALSE)
                                    die(FormatErrors(sqlsrv_errors()));    
                            }else
							{
                                echo "Invalid field";
                            }                            
                        }
                        
                        function test_input($data) 
						{
							$data = trim($data);
							$data = stripslashes($data);
							$data = htmlspecialchars($data);
							
							return $data;
                        }   
                        ?>
                        <input class="col-lg-12" type="file" name="fileToUpload" id="fileToUpload">
                    </div>
                </div>                
                <div class="form-group">
                    <label class="col-sm-4 control-label">Game Title</label>
                    <div class="col-sm-4">
                        <div class="col-lg-13">
                            <input style="width:100% "type="text" name="gameTitle" id="gameTitle" placeholder=""/>
                        </div> 
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-4 control-label">Publisher</label>
                    <div class="col-sm-4">
                        <div class="col-lg-13">
                            <input style="width:100% "type="text" name="Publisher" id="Publisher" placeholder=""/>
                        </div> 
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-4 control-label">Year Released</label>
                    <div class="col-sm-4">
                        <div class="col-lg-13">
                            <input style="width:100% "type="text" name="YearReleased" id="YearReleased" placeholder=""/>
                        </div> 
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-4 control-label">Platform</label>
                    <div class="col-sm-4">
                        <div class="col-lg-13">
                            <input style="width:100% "type="text" name="Platform" id="Platform" placeholder=""/>
                        </div> 
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-4 control-label">Region</label>
                    <div class="col-sm-4">
                        <div class="col-lg-13">
                            <input style="width:100% "type="text" name="Region" id="Region" placeholder=""/>
                        </div> 
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-4 control-label">Price</label>
                    <div class="col-sm-4">
                        <div class="col-lg-13">
                            <input style="width:100% "type="text" name="Price" id="Price" placeholder=""/>
                        </div> 
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-4 control-label"></label>
                    <div class="col-sm-4">
                        <input class="btn btn-primary btn-md col-lg-5" type="submit" value="Upload" name="submit">
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