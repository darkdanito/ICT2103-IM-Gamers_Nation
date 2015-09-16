<?php
	session_start();
	
	require_once('../../../protected/config1.php');
	
	$connection = mysqli_connect(DBHOST, DBUSER, DBPASS, DBNAME);
	
	if (mysqli_connect_errno()) 						// mysqli_connect_errno returns the last error code
	{
		die(mysqli_connect_error()); 					// die() is equivalent to exit()	
	}

	$myusername = $_POST['username'];
	$myemail = $_POST['email'];
	
	$sql = "SELECT COUNT(*) FROM `user` WHERE mID='".$myusername."' AND email='".$myemail."'";
	
	echo $sql;
	
	if ($result = mysqli_query($connection, $sql)) 
	{
		while ($row = mysqli_fetch_assoc($result)) 
		{
			echo $myusername;
			$count = $row['COUNT(*)'];    
			break;
		}
	}

	// unqiue set of username and email found
	if ($count === '1') 
	{
		// gen password for user
		$alpha = "abcdefghijklmnopqrstuvwxyz";
		$alpha_upper = strtoupper($alpha);
		$numeric = "0123456789";
		$special = ".-+=_,!@$#*%<>[]{}";
		$chars = $alpha . $alpha_upper . $numeric;
		$length = 16;
		$pw = '';
		$len = strlen($chars);
	
		for ($i = 0; $i < $length; $i++)
			$pw .= substr($chars, rand(0, $len - 1), 1);
			echo '1';
	
		// the finished password
		$pw = str_shuffle($pw);
		
		$_SESSION['newpw'] = $pw; 						// store new pw in session
		$_SESSION['email'] = $myemail;
		
		$hash = password_hash($pw, PASSWORD_BCRYPT);	// hash password
		
		// update user account with new pw
		$sql = "UPDATE user SET pw='".$hash."' WHERE mID='".$myusername."' AND email='".$myemail."'";
		mysqli_query($connection, $sql);
		
		$_SESSION['recovery'] =  1;
		// process to recovery-process to send recovery email
		header("location:recovery-process.php");
	}
	else
	{
		header("location:index.php");
		$_SESSION['forgetPWErr'] = 1; 					// recovery error	
	}	
?>
