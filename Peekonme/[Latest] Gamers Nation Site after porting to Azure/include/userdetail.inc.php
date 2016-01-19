<?php
$username = $_SESSION['username'];
$email = "";

$sql = "SELECT * FROM users U, supplier S, buyer B 
			WHERE U.UserID = S.UserID
			AND U.UserID = B.UserID 
			AND U.UserID='" . $username . "'";

if ($result = sqlsrv_query($conn, $sql)) 
{
    while ($row = sqlsrv_fetch_array($result, SQLSRV_FETCH_ASSOC)) 
	{
        $email = $row['Email'];
        $totalSales = $row['Total_Sales'];
	$totalExpenditure = $row['Total_Expenditure'];
    }
}
?>


<div class="page-header" style="margin-top: 4em;">
    <h1 style="color: #ffcc33;"><?php echo $username ?>'s Profile Page</h1>
</div>


    <div class = "panel-transparent">
        <div class = "panel-body">
            <ul class = "list-unstyled">
                <?php

                if (!empty($email)) 
				{
                    ?>
                    <li>
                        <label class="col-xs-6 col-md-5">Total Expenditure : <strong style="color: #ff3366;"><?php echo " \$  ".$totalExpenditure ?></strong></label>                                                
                    </li>
                    <?php
					
					?>
                    <li>
                        <label class="col-xs-6 col-md-5">E-mail : <strong style="color: #ff3366;"><?php echo $email ?></strong></label>                                                
                    </li>
                    <?php
					
					?>
                    <li>
                        <label class="col-xs-6 col-md-5">Total Sales : <strong style="color: #ff3366;"><?php echo " \$  ".$totalSales ?></strong></label>                                                
                    </li>
                    <?php
                }
                ?>
            </ul>

            <br>
        </div>
    </div>