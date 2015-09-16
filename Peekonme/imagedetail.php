<?php
session_start();
?>
<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title>ICT 1004 - Web Systems & Technologies</title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link href="css/bootstrap.min.css" rel="stylesheet">
        <link rel="stylesheet" href="css/main.css"/>
    </head>
    <?php include 'header.inc.php'; ?>
    <body>
        <?php
        $imagename = "";

        if (isset($_GET['id'])) {
            $imageid = $_GET['id'];
        } else {
            header('Location: explore.php');
        }
        $sql = "SELECT * FROM userimages WHERE image_ID = " . $imageid;
        if ($result = mysqli_query($connection, $sql)) {
            while ($row = mysqli_fetch_assoc($result)) {
                $author = $row['user_name'];
                $imagename = $row['imageName'];
                $imagesrc = $row['imagePath'];
                $imagedesc = $row['imageDesc'];
                $imagelikes = $row['imageLikes'];
            }
        }

        if (empty($imagename)) {
            header('Location: explore.php');
        }
        ?>
        <div class="container" style="margin: 4em auto;">
            <div class="col-md-8">
                <img src="<?php echo $imagesrc ?>" width="100%"/>
            </div>
            
                <div class="panel panel-transparent col-md-4">
                    <div class="panel-body">
                        <ul class="list-unstyled">
                            <li>
                                Username: 
                                <a href="profile.php?user=<?php echo $author ?>">
                                    <strong><?php echo $author ?></strong>
                                </a>
                            </li>
                            <li>Image Name: <strong><?php echo $imagename ?></strong></li>
                            <?php if(!empty($imagedesc)) { ?>
                            <li>Description: <strong><?php echo $imagedesc ?></strong></li>
                            <?php } ?>
                            <li><br></li>
                            <?php
                            if ((isset($_SESSION['username']))) {
                                ?>
                                <li>
                                    <a class="btn btn-primary" type="button" href="increaselike.php?id=<?php echo $imageid ?>">
                                        Likes <span class="glyphicon glyphicon-thumbs-up"></span>   <span class="badge"><?php echo $imagelikes ?></span>
                                    </a>
                                </li>
                                <?php
                            }
                            ?>
                        </ul>
                    </div>
                </div>
            
        </div>

        <?php include 'footer.inc.php'; ?>

    </body>
</html>


