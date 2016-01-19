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
                <h1>Expends Records
                    <span>Keep track of your spending!</span></h1>
                <div>
                    <table align="center">
                        <thead>
                            <tr>
                                <td style="padding: 5;">TimeStamp</td>
                                <td style="padding: 5;">Order ID</td>
                                <td style="padding: 5;" class="text-center">Supplier</td>
                                <td style="padding: 5;">Price</td>
                                <td style="padding: 5;">Quantity</td>
                                <td style="padding: 5;">Total</td>
                            </tr>
                            <tr><td colspan="6"><hr></td></tr>
                        </thead>
                        <tbody>
                        <?php
							$sql = "SELECT * FROM order_make OM, ordered_product OP WHERE OM.OrderID = OP.OrderID AND OM.Buyer_UserID = '".$_SESSION['username']."'";
							
							if ($result = sqlsrv_query($conn, $sql)) 
							{
								while ($row = sqlsrv_fetch_array($result, SQLSRV_FETCH_ASSOC)) 
								{
									echo '<tr class="text-right">';
									$timestamp = date_format( $row['Purchare_Time'], 'Y-m-d H:i:s' );
									echo '<td style="padding: 10;">'.$timestamp.'</td>';
									echo '<td style="padding: 10;">'.$row['OrderID'].'</td>';
									echo '<td style="padding: 10;">'.$row['Supplier_UserID'].'</td>';
									echo '<td style="padding: 10;">$'.$row['Price'].'</td>';
									echo '<td style="padding: 10;">'.$row['Quantity'].'</td>';
									echo '<td style="padding: 10; color:#38d29a;">$'.$row['Price']*$row['Quantity'].'</td>';
									echo '</tr>';
								}
							}
                        ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

	<?php include 'footer.inc.php'; ?>
    </body>
</html>