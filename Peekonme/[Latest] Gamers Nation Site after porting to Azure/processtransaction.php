<?php
	try 
	{
		$serverName = "tcp:elsatjf9tu.database.windows.net,1433";
	   
		$connectionOptions = array(
			"Database" => "gamernationdb",
			"Uid" => "gamernationadmin", 
			"PWD" => "Password123");
		
		$conn = sqlsrv_connect($serverName, $connectionOptions);
		
		if ($conn == false)
			die(FormatErrors(sqlsrv_errors()));
	} 
	catch (Exception $e) 
	{
		echo("Error!");
	}
	
	session_start();
	
	$gameid = $shopid = $gametitle = $gameprice = $gamequantity = $orderid = "";
	
	if ($_SERVER["REQUEST_METHOD"] == "POST") 
	{
		function test_input($data) 
		{
			$data = trim($data);
			$data = stripslashes($data);
			$data = htmlspecialchars($data);
			
			return $data;
		}
	
		$uname = $_SESSION['username'];
		$gameid = test_input($_POST["gameid"]);
		$shopid = test_input($_POST["shopid"]);
		$gametitle = test_input($_POST["title"]);
		$gameprice = test_input($_POST["price"]);
		$gamequantity = test_input($_POST["quantity"]);
	
		//Insert to Order make
		$currentdt = date('Y-m-d H:i:s');
		$sql = "INSERT INTO order_make (Buyer_UserID,Purchare_Time) VALUES ('".$uname."','".$currentdt."')";
		$stmt = sqlsrv_query($conn, $sql);
		if ($stmt == FALSE)
			die(FormatErrors(sqlsrv_errors()));
		
		//Remove the stock from supplier
		$sql = "UPDATE supplier_own_game SET Stock = Stock - ".$gamequantity." WHERE Supplier_UserID = '".$shopid."' AND GameID = '".$gameid."'";
		$stmt = sqlsrv_query($conn, $sql);
		if ($stmt == FALSE)
			die(FormatErrors(sqlsrv_errors()));
		
		//increase Sale
		$totalcost = $gameprice * $gamequantity;
		$sql = "UPDATE supplier SET Total_Sales = Total_Sales + ".$totalcost." WHERE UserID = '".$shopid."'";
		$stmt = sqlsrv_query($conn, $sql);
		if ($stmt == FALSE)
			die(FormatErrors(sqlsrv_errors()));
		
		//increase Expenditure
		$sql = "UPDATE buyer SET Total_Expenditure = Total_Expenditure + ".$totalcost." WHERE UserID = '".$uname."'";
		$stmt = sqlsrv_query($conn, $sql);
		if ($stmt == FALSE)
			die(FormatErrors(sqlsrv_errors()));
		
		//Get latest orderID
		$sql = "SELECT OrderID FROM order_make ORDER BY OrderID DESC;";
	
		if ($stmt = sqlsrv_query($conn, $sql)) 
		{
			while ($row = sqlsrv_fetch_array($stmt, SQLSRV_FETCH_ASSOC)) 
			{
				// grab latest one (if need more just do for loop)
				$orderid = $row['OrderID'];
				echo $orderid;
				break;
			}
		}
	
		//Insert to Order Product
		$sql = "INSERT INTO ordered_product (Supplier_UserID,GameID,OrderID,Quantity,Price) VALUES ('".$shopid."','".$gameid."','".$orderid."','".$gamequantity."','".$gameprice."')";
		$stmt = sqlsrv_query($conn, $sql);
		if ($stmt == FALSE)
		{
			die(FormatErrors(sqlsrv_errors()));
		}else
		{
			$_SESSION['purchasesuccess'] = "true";
			header('Location: explore.php');
		}
	}
?>