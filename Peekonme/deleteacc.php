<?php
	require_once('protected/config1.php');
	
	$connection = mysqli_connect(DBHOST, DBUSER, DBPASS, DBNAME);
	
	if(mysqli_connect_errno())	 			// mysqli_connect_errno returns the last error code
	{
		die(mysqli_connect_error()); 		// die() is equivalent to exit()	
	}
	
	session_start();
	
	$username = $_SESSION['username'];

	//Delete from users table
	$sql1 = "DELETE FROM user WHERE UserID = \"".$username."\"";
	mysqli_query($connection, $sql1);
	
	header('Location: logout.php');
?>