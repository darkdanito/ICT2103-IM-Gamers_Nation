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
    </head>
    
    <?php include 'header.inc.php'; ?>
    
    <body>
        <?php
			$imagename = "";
	
			if (isset($_GET['id'])) 
			{
				$imageid = $_GET['id'];
			} else 
			{
				header('Location: explore.php');
			}
			
			$sql = "SELECT * FROM game WHERE GameID = " . $imageid;
			if ($result = mysqli_query($connection, $sql)) 
			{
				while ($row = mysqli_fetch_assoc($result)) 
				{
					$imagename = $row['Title'];
					$imagesrc = $row['imagePath'];
					$imagePublisher = $row['Publisher'];
					$imageYearReleased = $row['Year_Released'];
					$imagePlatform = $row['Platform'];
					$imageRegion = $row['Region'];
//					$imageStock = $row['Stock'];
					$imagePrice = $row['Price'];
				}
			}
	
			if (empty($imagename)) 
			{
				header('Location: explore.php');
			}
        ?>
        
        <div class="container" style="margin: 4em auto;">
            <div class="col-md-8">
                
                <!---
                Possible bug fix for the larger than normal image size
                <img src="<php echo $imagesrc ?>" width="100%"/>
                -->               
                <img src="<?php echo $imagesrc ?>" width="50%"/>
            </div>
            
                <div class="panel panel-transparent col-md-4">
                    <div class="panel-body">
                        <ul class="list-unstyled">
                            <li>Game Title: <strong><?php echo $imagename ?></strong></li>

							<?php if(!empty($imagedesc)) { ?>
                            <li>Description: <strong><?php echo $imagedesc ?></strong></li>
                            <?php } ?>
							
                            </br>
                            
                            <li>Publisher: <strong> <?php echo $imagePublisher ?></strong></li>
                            <li>Year Released: <strong> <?php echo $imageYearReleased ?></strong></li>
                            <li>Platform: <strong> <?php echo $imagePlatform ?></strong></li>
                            <li>Region: <strong> <?php echo $imageRegion ?></strong></li>
                                                        
                            </br>

                            <li>Price: <strong> <?php echo $imagePrice ?></strong></li>
                        </ul>
                    </div>
                </div>
            
        </div>

        <?php include 'footer.inc.php'; ?>

    </body>
</html>