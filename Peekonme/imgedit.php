
<?php
	session_start();

	if ((!isset($_SESSION['username']))) 
	{
		header('Location: login.php');
	}
?>

<html>
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
		
        <title>Gamers Nation</title>

        <link href="css/bootstrap.min.css" rel="stylesheet">
        <link href="css/main.css" rel="stylesheet"/>

    </head>
    <?php include 'header.inc.php'; ?>
    <body>

        <?php
        $imgid = $_GET['id'];

        $imgname = $imgdesc = $imgtype = "";
        $sql = "SELECT * FROM game WHERE GameID = " . $imgid;
        if ($result = mysqli_query($connection, $sql)) 
		{
            while ($row = mysqli_fetch_assoc($result)) 
			{
                $imgname = $row['Title'];
//                $imgdesc = $row['imageDesc'];
				
				$imgPublisher = $row['Publisher'];
				$imgYearReleased = $row['Year_Released'];
				$imgPlatform = $row['Platform'];
				$imgRegion = $row['Region'];
//				$imgStock = $row['Stock'];
				$imgPrice = $row['Price'];
            }
        }

        $imgnameErr = "";

        $imgnamevalid = $imgdescvalid = $imgtypevalid = true;

        if ($_SERVER["REQUEST_METHOD"] == "POST") {

            $imgname = test_input($_POST["imgname"]);
//            $imgdesc = test_input($_POST["imgdesc"]);
//            $imgtype = test_input($_POST["imgtype"]);

			$imgPublisher = test_input($_POST["Publisher"]);
			$imgYearReleased = test_input($_POST["YearReleased"]);
			$imgPlatform = test_input($_POST["Platform"]);
			$imgRegion = test_input($_POST["Region"]);
			$imgStock = test_input($_POST["Stock"]);
			$imgPrice = test_input($_POST["Price"]);

            if (empty($imgname)) 
			{
                $imgnameErr = "Please do not leave your Image Name empty.";
                $imgnamevalid = false;
            }

            if ($imgnamevalid && $imgdescvalid && $imgtypevalid) 
			{
                $sql = "UPDATE game SET TItle = ?, Publisher = ?, Year_Released = ?, Platform = ?, Region = ?, Price = ? WHERE GameID = " . $imgid;
/*				
                $sql = "UPDATE game SET imageName = ?, imageDesc = ?, Publisher = ?, YearReleased = ?, Platform = ?, Region = ?, Stock = ?, Price = ?,type_ID = ? WHERE image_ID = " . $imgid;				
*/				
                if ($statement = mysqli_prepare($connection, $sql)) 
				{
                    mysqli_stmt_bind_param($statement, 'ssssss', $imgname, $imgPublisher, $imgYearReleased, $imgPlatform, $imgRegion, $imgPrice);
/*					
					mysqli_stmt_bind_param($statement, 'ssssssss', $imgname, $imgdesc, $imgPublisher,$imgYearReleased, $imgPlatform, $imgRegion, $imgStock, $imgPrice);
*/					
                    mysqli_stmt_execute($statement);
                }
                header('Location: userimgedit.php');
            }
        }

        function test_input($data) 
		{
            $data = trim($data);
            $data = stripslashes($data);
            $data = htmlspecialchars($data);
            return $data;
        }
        ?>
        <div class="container-fluid">
            <?php include '/include/userdetail.inc.php'; ?>

            <?php include '/include/mainNav.inc.php'; ?>
        </div>
        
        
        <div class="container">
        <div class="content">
            <h1>Edit your Games
                <span>Here, We have the flexibility to edit your Image Properties.</span></h1>
            
            <form class="form-horizontal" id="Updateimage" role="form" method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]) . "?id=" . $imgid; ?>">

                <div class="form-group">
                    <label class="col-sm-2 control-label" for="imgname">Image Name</label>
                    <div class="col-sm-8">
                        <input class="form-control" type="text" id="imgname" name="imgname" 
                               placeholder="<?php
                               if ($imgnameErr != "") {
                                   echo $imgnameErr;
                               }
                               ?>"
                               value="<?php
                               if ($imgnamevalid) {
                                   echo htmlspecialchars($imgname);
                               }
                               ?>">
                    </div>
                </div>


<!--
                <div class="form-group">
                    <label for="imgdesc" class="col-sm-2 control-label">Image Description</label>
                    <div class="col-sm-8">
                        <textarea rows="3" cols="50" id="imgdesc" name="imgdesc" form="Updateimage" maxlength="100" style="color: #606060"><php
                            if ($imgdescvalid) {
                                echo htmlspecialchars($imgdesc);
                            }
                            ?>
                        </textarea>       
                    </div>
                </div>


Start of Code
-->
                <div class="form-group">
                    <label for="Publisher" class="col-sm-2 control-label">Publisher</label>
                    <div class="col-sm-8">
                        <input type="text" name="Publisher" id="Publisher" form="Updateimage" value="<?php echo ($imgPublisher );?>">      
                    </div>
                </div>

				<div class="form-group">
                    <label for="YearReleased" class="col-sm-2 control-label">Year Released</label>
                    <div class="col-sm-8">
                        <input type="text" name="YearReleased" id="YearReleased" form="Updateimage" value="<?php echo ($imgYearReleased );?>">      
                    </div>
                </div>
                
                <div class="form-group">
                    <label for="Platform" class="col-sm-2 control-label">Platform</label>
                    <div class="col-sm-8">
                        <input type="text" name="Platform" id="Platform" form="Updateimage" value="<?php echo ($imgPlatform );?>">      
                    </div>
                </div>
                
				<div class="form-group">
                    <label for="Region" class="col-sm-2 control-label">Region</label>
                    <div class="col-sm-8">
                        <input type="text" name="Region" id="Region" form="Updateimage" value="<?php echo ($imgRegion );?>">      
                    </div>
                </div>
 <!--               
                <div class="form-group">
                    <label for="Stock" class="col-sm-2 control-label">Stock</label>
                    <div class="col-sm-8">
                        <input type="text" name="Stock" id="Stock" form="Updateimage" value="<php echo ($imgStock );?>">      
                    </div>
                </div>
   -->             
 				<div class="form-group">
                    <label for="Price" class="col-sm-2 control-label">Price</label>
                    <div class="col-sm-8">
                        <input type="text" name="Price" id="Price" form="Updateimage" value="<?php echo ($imgPrice );?>">      
                    </div>
                </div>

<!--
End of Code
-->
                <div class="form-group">
                    <div class="col-sm-offset-2 col-sm-8">
                        <input type="submit" value="Update" class="btn btn-primary"/>
                    </div>
                </div>
            </form>
        </div> 
            </div>


    </body>
    <?php include 'footer.inc.php'; ?>
</html>