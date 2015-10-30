<?php
//	require_once('protected/config1.php');
	
//	$connection = mysqli_connect(DBHOST, DBUSER, DBPASS, DBNAME);
						
//	if (mysqli_connect_errno()) 				// mysqli_connect_errno returns the last error code
//	{
//		die(mysqli_connect_error()); 			// die() is equivalent to exit()	
//	}
	
/*
    try
    {
        $serverName = "tcp:necrodiver.database.windows.net,1433";
        $connectionOptions = array("Database"=>"necroDatabase",
            "Uid"=>"darkdanito", "PWD"=>"asdf1234!");
        $conn = sqlsrv_connect($serverName, $connectionOptions);
        if($conn == false)
            die(FormatErrors(sqlsrv_errors()));
    }
    catch(Exception $e)
    {
        echo("Error!");
    }
*/

?>

<link href='http://fonts.googleapis.com/css?family=PT+Sans+Narrow&v1' rel='stylesheet' type='text/css' />
<link href='http://fonts.googleapis.com/css?family=Pacifico' rel='stylesheet' type='text/css' />

<div class="container-fluid">
    <div class="nav navbar-inverse navbar-fixed-top">
        <div class="navbar-header"><a href="index.php" class="navbar-brand">Gamers Nation</a>
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
        </div>
        <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
            <ul class="nav navbar-nav">
                <li><a href="explore.php"><span class="glyphicon glyphicon-globe"></span> Explore</a></li>
            </ul>
            <ul class="nav navbar-nav navbar-right">
                <?php
                if ((!isset($_SESSION['username']))) 
				{
                    ?>
                    <li><a href="signup.php"><span class="glyphicon glyphicon-user"></span> Sign Up</a></li>
                    <li><a href="login.php"><span class="glyphicon glyphicon-log-in"></span> Login</a></li>
                    <?php
                } else 
				{
                    ?>
                    <li class="dropdown">
                        <a href="usergallery.php" class="dropdown-toggle" data-toggle="dropdown"><span class="glyphicon glyphicon-user"></span> <?php echo $_SESSION['username'] ?> <span class="caret"></span></a>
                        <ul class="dropdown-menu">
                            <li><a href="usergallery.php"><span class="glyphicon glyphicon-picture"></span> My Image</a></li>
                            <li><a href="userimgedit.php"><span class="glyphicon glyphicon-edit"></span> Edit</a></li>
                            <li><a href="userupload.php"><span class="glyphicon glyphicon-save"></span> Upload</a></li>
                            <li><a href="usersetting.php"><span class="glyphicon glyphicon-wrench"></span> Settings</a></li>
                            <li class="divider"><li>
                            <li><a href="logout.php"><span class="glyphicon glyphicon-log-out"></span> Logout</a></li>
                        </ul>
                    </li>
                    <?php
                }
                ?>
            </ul>
        </div>
    </div>
</div>