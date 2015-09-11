<?php 

	require_once('../../../protected/team11/config_grp.php');
	
	$connection = mysqli_connect(DBHOST, DBUSER, DBPASS, DBNAME);
	$error = mysqli_connect_error();

	if($error != null)
	{
		$output = "<p>db.php - Unable to connect to database<p>".$error;
		exit($output);
	}
?>