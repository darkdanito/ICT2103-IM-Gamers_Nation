<?php

	$menuid = trim($_POST['id']);
	
	if(ISSET($menuid))
	{
		require_once('../../../protected/team11/config_grp.php');
        
		$connection = mysqli_connect(DBHOST, DBUSER, DBPASS, DBNAME);;
        
		$error = mysqli_connect_error();
        
		if($error != null)
		{
			$output = "<p>do_menu.php - Unable to connect to database<p>".$error;
            exit($output);
        }
		
		$sql = "SELECT * FROM `menu` WHERE menuID = '{$menuid}'";
		    
		if($result = mysqli_query($connection, $sql))
		{
			while($row = mysqli_fetch_assoc($result))
			{
				echo '<h3><label name="mName">';
                echo $row['menuDesc'];
                echo '</label></h3>';
                echo '<img class="img-responsive full-img" src= "';
                echo $row['imgDir'];
                echo '" height="200" width="200">'; 
                echo '<input type="hidden" name="menuID" value="';
                echo $row['menuID'];
                echo '">';
                echo '<br><h4>';
                echo 'Cost: <label name="cost"> $'.$row['menuCost'];
                echo'</label>';
                echo '</h4>';
			}
		}
		else
		{ 
			echo '<li>No results found</li>';
		}
		
		mysqli_free_result($result);
	}
?>