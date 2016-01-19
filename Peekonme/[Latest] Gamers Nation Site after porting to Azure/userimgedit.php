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
        <div class="container-fluid">
            <?php include '/include/userdetail.inc.php'; ?>
            <?php include '/include/mainNav.inc.php'; ?>
        </div>

        <div class="container">
            
            <div class="content">
                <h1>Edit Games Information
                    <span>Correction? No problem!</span></h1>
                <div>
                    <table align="center">
                        <?php
							$sql = "SELECT * FROM supplier_own_game S, game G 
								WHERE S.GameID = G.GameID
								AND Supplier_UserID = '".$username."'";
							
                            if ($result = sqlsrv_query($conn, $sql)) 
							{
                                while ($row = sqlsrv_fetch_array($result, SQLSRV_FETCH_ASSOC)) 
								{
                                    echo '<tr>';
                                    echo '<td style="padding: 5;"><img src="' . $row['ImagePath'] . '" height="50px"/></td>';
									echo '<td style="padding: 5;">'.$row['Title'].'</td>';
                                    echo '<td style="padding: 5;">Game ID: '.$row['GameID'].'</td>';
									echo '<td style="padding: 5;">Stock: '.$row['Stock'].' </td>';
                                    echo '<td style="padding: 5;"> '
                                    . '     <a class="btn btn-primary" type="button" href="imgedit.php?id='. $row['GameID'].'">
                                                Edit <span class="glyphicon glyphicon-edit"></span>
                                            </a>
                                          </td>';
                                    echo '</tr>';
                                }
                            }
                            ?>
                    </table>
                </div>
            </div>
        </div>


        <?php include 'footer.inc.php'; ?>
    </body>
</html>