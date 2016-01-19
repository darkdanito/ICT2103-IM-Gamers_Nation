<?php
	session_start();
	
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
	
	$gameid = $_GET['game'];
	$userid = $_GET['user'];
	
	$sql = "DELETE FROM review_have WHERE GameID = '".$gameid."' AND UserID = '".$userid."'";
	
	sqlsrv_query($conn, $sql);
	
	header('Location: ' . $_SERVER['HTTP_REFERER']);
?>