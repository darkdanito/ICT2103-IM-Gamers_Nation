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
        <link rel="stylesheet" type="text/css" href="css/main.css" />
        <!--<link rel="stylesheet" type="text/css" href="css/style.css" />-->

    </head>
    <?php include 'header.inc.php'; ?>
    <body>
        <div class="container-fluid">
            <?php include '/include/userdetail.inc.php'; ?>

            <?php include '/include/mainNav.inc.php'; ?>
        </div>
        <div class="container">
            <div class="content">
                <h1>Your listed items for sale<span>A Place For you to sell your games</span></h1>
                <!--Display all picture-->
                <?php
                    $sql3 = "SELECT * FROM supplier_own_game S, game G WHERE S.GameID = G.GameID AND S.Supplier_UserID = '" . $username . "'";
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
                ?>
            </div><!-- content -->
        </div><!-- container -->   
        <?php include 'footer.inc.php'; ?>        

    </body>   

</html>

