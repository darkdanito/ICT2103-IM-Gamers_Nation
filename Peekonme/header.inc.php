<?php
	require_once('protected/config1.php');
	
	$connection = mysqli_connect(DBHOST, DBUSER, DBPASS, DBNAME);
						
	if (mysqli_connect_errno()) 				// mysqli_connect_errno returns the last error code
	{
		die(mysqli_connect_error()); 			// die() is equivalent to exit()	
	}
?>
<html>
<link href='http://fonts.googleapis.com/css?family=PT+Sans+Narrow&v1' rel='stylesheet' type='text/css' />
<link href='http://fonts.googleapis.com/css?family=Pacifico' rel='stylesheet' type='text/css' />
<link rel="stylesheet" href="http://ajax.googleapis.com/ajax/libs/jqueryui/1.10.1/themes/base/minified/jquery-ui.min.css" type="text/css" /> 

<script type="text/javascript" src="http://code.jquery.com/jquery-1.9.1.min.js"></script>
<script type="text/javascript" src="http://code.jquery.com/ui/1.10.1/jquery-ui.min.js"></script>    
<script type="text/javascript">
var $j = $.noConflict();
$j(document).ready(function() {
    
    //autocomplete
    $j(".auto").autocomplete({
        source: "search.php",
        minLength: 1
    });                

});
</script>

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
					<li>
					<div>
            <form class="navbar-form" role="search" action='searchresults.php' method='get'>
              <div class="input-group">
                <input type="text" class="form-control typeahead tt-query auto" placeholder="Search for game titles" name="typeahead" id="search-term">
                <div class="input-group-btn">
                  <button class="btn btn-default" type="submit"><i class="glyphicon glyphicon-search"></i></button>
                </div>
              </div>
            </form>
          </div></li>
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
                            <li><a href="usergallery.php"><span class="glyphicon glyphicon-picture"></span> My Listed Items</a></li>
                            <li><a href="userimgedit.php"><span class="glyphicon glyphicon-edit"></span> Edit</a></li>
                            <li><a href="userupload.php"><span class="glyphicon glyphicon-save"></span> List New Items</a></li>
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


</html>