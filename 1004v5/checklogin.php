<?php

	if (session_status() == PHP_SESSION_NONE) 
	{
		session_start();
	}

	require_once('../../../protected/team11/config_grp.php');

	$connection = mysqli_connect(DBHOST, DBUSER, DBPASS, DBNAME);

	$error = mysqli_connect_error();

	if ($error != null) 
	{
		$output = "<p>Unable to connect to database<p>" . $error;
		exit($output);
	}

	// Username and password sent from form 
	$myusername=$_POST['username']; 
	$mypassword=$_POST['password']; 
	
	echo $myusername;
	
	$_SESSION["username"] = $_POST["username"];
	
	echo $_SESSION["username"];

	if(isset($_POST['Submit2']))
	{		
		session_destroy();
		header("location:index.php");
	}
	
	// To protect MySQL injection (more detail about MySQL injection)
	$myusername = stripslashes($myusername);
	$mypassword = stripslashes($mypassword);
	$myusername = mysql_real_escape_string($myusername);
	$mypassword = mysql_real_escape_string($mypassword);
	
	$sql = "SELECT * FROM `user` WHERE mID='".$myusername."'";
	echo $sql;
	
	if($result = mysqli_query($connection, $sql))
	{
		while($row = mysqli_fetch_assoc($result))
		{
			echo $myusername;
			echo $row['pw'];
			$pwdFromDB = $row['pw'];
		}
	}

	$pwdFromPost = $mypassword;
	echo $pwdFromDB;
	
	if(password_verify($pwdFromPost, $pwdFromDB))
	{
		echo '<p> valid';
		$_SESSION["login"] = 1;
		unset($_SESSION['noLogin']);
		unset($_SESSION['error']);
		header("location:index.php");
	}
	else
	{
		echo '<p> wrong pwd';
		$_SESSION['error'] = 1;
		header("location:index.php");
	}   
?>
