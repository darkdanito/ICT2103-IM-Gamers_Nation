<?php
    $term=$_GET['term'];
    $array = array();
	
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
	
    $sql = "select * from game where Title LIKE '%{$term}%'";
	
    if ($result = sqlsrv_query($conn, $sql)) 
	{
		while ($row = sqlsrv_fetch_array($result, SQLSRV_FETCH_ASSOC)) 
		{
			$array[] = $row['Title'];
		}
    }

	echo json_encode($array);
?>