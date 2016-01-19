
<?php
	session_start();

	if ((!isset($_SESSION['username']))) 
	{
		header('Location: login.php');
	}
?>

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

        <?php
		
			$imgid = $_GET['id'];
			$imgname = $imgdesc = $imgtype = "";
			$sql = "SELECT * FROM game WHERE GameID = " .$imgid;
			
			if ($result = sqlsrv_query($conn, $sql)) 
			{
				while ($row = sqlsrv_fetch_array($result, SQLSRV_FETCH_ASSOC)) 
				{
					$imgname = $row['Title'];
					$imgPublisher = $row['Publisher'];
					$imgYearReleased = $row['Year_Released'];
					$imgPlatform = $row['Platform'];
					$imgRegion = $row['Region'];
					$imgPrice = $row['Price'];
				}
			}

			$imgnameErr = "";
			$imgnamevalid = $imgdescvalid = $imgtypevalid = true;

			if ($_SERVER["REQUEST_METHOD"] == "POST") 
			{
				$imgPublisher = test_input($_POST["Publisher"]);
				$imgYearReleased = test_input($_POST["YearReleased"]);
				$imgPlatform = test_input($_POST["Platform"]);
				$imgRegion = test_input($_POST["Region"]);
				$imgPrice = test_input($_POST["Price"]);
	
				if (empty($imgname)) 
				{
					$imgnameErr = "Please do not leave your Image Name empty.";
					$imgnamevalid = false;
				}
	
				if ($imgnamevalid && $imgdescvalid && $imgtypevalid) 
				{
					$sql = "UPDATE game SET Publisher = '".$imgPublisher."', Year_Released = '".$imgYearReleased."', Platform = '".$imgPlatform."', Region = '".$imgRegion."', Price = '".$imgPrice."' WHERE GameID = " . $imgid;
                    $stmt = sqlsrv_query($conn, $sql);
                    if ($stmt == FALSE)
                        die(FormatErrors(sqlsrv_errors()));
					header('Location: userimgedit.php');
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
        
        <div class="container-fluid">
            <?php include '/include/userdetail.inc.php'; ?>

            <?php include '/include/mainNav.inc.php'; ?>
        </div>
        
        
        <div class="container">
        	<div class="content">
            	<h1>Edit Game Information
                	<span>Here, We have the flexibility to edit your Image Properties.</span>
                </h1>
            
                <form class="form-horizontal" id="Updateimage" role="form" method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]) . "?id=" . $imgid; ?>">
    
                    <div class="form-group">
                        
                        <label class="col-sm-2 control-label" for="imgname">Game Name</label>
                        <div class="col-sm-8">
                            <?php echo htmlspecialchars($imgname); ?>
                        </div>
                    </div>
    
                    <div class="form-group">
                        <label for="Publisher" class="col-sm-2 control-label">Publisher</label>
                        <div class="col-sm-8">
                            <input type="text" name="Publisher" id="Publisher" form="Updateimage" value="<?php echo ($imgPublisher );?>">      
                        </div>
                    </div>
    
                    <div class="form-group">
                        <label for="YearReleased" class="col-sm-2 control-label">Year Released</label>
                        <div class="col-sm-8">
                            <input type="text" name="YearReleased" id="YearReleased" form="Updateimage" value="<?php echo ($imgYearReleased );?>">      
                        </div>
                    </div>
                    
                    <div class="form-group">
                        <label for="Platform" class="col-sm-2 control-label">Platform</label>
                        <div class="col-sm-8">
                            <input type="text" name="Platform" id="Platform" form="Updateimage" value="<?php echo ($imgPlatform );?>">      
                        </div>
                    </div>
                    
                    <div class="form-group">
                        <label for="Region" class="col-sm-2 control-label">Region</label>
                        <div class="col-sm-8">
                            <input type="text" name="Region" id="Region" form="Updateimage" value="<?php echo ($imgRegion );?>">      
                        </div>
                    </div>
                                 
                    <div class="form-group">
                        <label for="Price" class="col-sm-2 control-label">Price</label>
                        <div class="col-sm-8">
                            <input type="text" name="Price" id="Price" form="Updateimage" value="<?php echo ($imgPrice );?>">      
                        </div>
                    </div>

                    <div class="form-group">
                        <div class="col-sm-offset-2 col-sm-8">
                            <input type="submit" value="Update" class="btn btn-primary"/>
                        </div>
                    </div>
                </form>
			</div> 
		</div>

    </body>
    
    <?php include 'footer.inc.php'; ?>
    
</html>