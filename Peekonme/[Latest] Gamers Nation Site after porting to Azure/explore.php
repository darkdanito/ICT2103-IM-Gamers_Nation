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
        <link href="css/bootstrap-theme.min.css" rel="stylesheet">
        <link rel="stylesheet" href="css/main.css" />
        <script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>    
              
    </head>
    
    <?php include 'header.inc.php'; ?>
   
    
    <body>
        <div class="container-fluid" style="margin-top: 4em;">
            <!--Display all picture-->
            <?php
            $sql3 = "SELECT * FROM game";
			
            if ($result3 = sqlsrv_query($conn, $sql3)) 
			{
                while ($row3 = sqlsrv_fetch_array($result3, SQLSRV_FETCH_ASSOC)) 
				{
                    echo '<div class="col-xs-6 col-md-2">';
                    echo '<a class="thumbnail" href="imagedetail.php?id=' . $row3['GameID'] . '">';
                    echo '<img src="' . $row3['ImagePath'] . '" />';
                    echo '</a>';
                    echo '<p class="caption text-center">'. $row3['Title'] .'</p>';
                    echo '</br>';
                    echo '</div>';
                }
            }

            if(isset($_SESSION['purchasesuccess'])) 
            {  
				if ($_SESSION['purchasesuccess'] == "true") 
				{
					echo '<script language="javascript">';
					echo 'alert("Purchase Successful !")';
					echo '</script>';
					
					$_SESSION['purchasesuccess'] = "";
				}
            }
            ?>
        </div>
        
        <?php include 'footer.inc.php'; ?>
        
    </body>
</html>