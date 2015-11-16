<?php
	session_start();
        $success_message = $_SESSION['purchasesuccess'];

       
?>

<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        
        <title>Gamers Nation</title>
        
        <link href="css/bootstrap.min.css" rel="stylesheet">
        <link href="css/bootstrap-theme.min.css" rel="stylesheet">
        <link rel="stylesheet" href="css/main.css" />
        <script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
        <script src="js/star-rating.min.js" type="text/javascript"></script>        
              
    </head>
    
    <?php include 'header.inc.php'; ?>
   
    
    <body>
        <div class="container-fluid" style="margin-top: 4em;">
            <?php
            $count = 0;
            $sql2 = "SELECT * FROM game ORDER BY GameID DESC";
            if ($result2 = mysqli_query($connection, $sql2)) 
			{
                while ($row2 = mysqli_fetch_assoc($result2)) 
				{
                    if ($count == 5) 
					{
                        break;
                    }
                    $count++;
                }
            }
            
            if($count != 0)
			{
            ?>
            <div id="myCarousel" class="carousel slide" data-interval="3000" data-ride="carousel">

                <!-- Carousel indicators -->
                <ol class="carousel-indicators">
                    <?php
                    for ($i = 0; $i < $count; $i++) 
					{
                        echo '<li data-target="#myCarousel" data-slide-to="' . $i . '"';
                        if ($i == 0)
                            echo ' class="active"';
                        echo '></li>';
                    }
                    ?>
                </ol>   
                
                <!-- Carousel items -->
                <div class="carousel-inner">
                    <?php
                    $count2 = 0;
                    $sql3 = "SELECT * FROM game ORDER BY GameID DESC";
                    if ($result3 = mysqli_query($connection, $sql3)) 
					{
                        while ($row3 = mysqli_fetch_assoc($result3)) 
						{
                            if ($count2 == 5) 
							{
                                break;
                            }
                            if ($count2 == 0) 
							{
                                echo '<div class="active item">';
                            } else 
							{
                                echo '<div class="item">';
                            }
/*							
							Default was at 50%. Temp Fix for the larger than normal image size							
							echo '<img class="center-block" style="width: 50%" src="' . $row3['imagePath'] . '"/>';
*/                            
							echo '<img class="center-block" style="width: 25%" src="' . $row3['ImagePath'] . '"/>';
                            echo '</div>';
                            $count2++;
                        }
                    }
                    ?>
                </div>
                
                <!-- Carousel nav -->
                <a class="carousel-control left" href="#myCarousel" data-slide="prev">
                    <span class="glyphicon glyphicon-chevron-left"></span>
                </a>
                <a class="carousel-control right" href="#myCarousel" data-slide="next">
                    <span class="glyphicon glyphicon-chevron-right"></span>
                </a>
            </div>
            <?php } ?>


            <!--Display all picture-->

            <?php
            $sql3 = "SELECT * FROM game";
            if ($result3 = mysqli_query($connection, $sql3)) 
			{
                while ($row3 = mysqli_fetch_assoc($result3)) 
				{
                    echo '<div class="col-xs-6 col-md-3">';
                    echo '<a class="thumbnail" href="imagedetail.php?id=' . $row3['GameID'] . '">';
                    echo '<img src="' . $row3['ImagePath'] . '" />';
                    echo '</a>';
                    echo '</div>';
                }
            }
            ?>
            
            
           
           <?php
           
         if(isset($_SESSION['purchasesuccess'])) {  
           if (isset($_SESSION['purchasesuccess'])) {
//               echo $test;
               echo '<script language="javascript">';
               echo 'alert("'.$success_message.'")';
               echo '</script>';
           }
           
           else {
               echo '<script language="javascript">';
               echo 'alert("Purchase failed. Please try again")';
               echo '</script>';
           }
         }
           session_unset();
           ?>
            
            
        
        </div>
        <?php include 'footer.inc.php'; ?>
    </body>
</html>