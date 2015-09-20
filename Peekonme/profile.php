<?php
	session_start();
?>
<!DOCTYPE html>

<html>
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        
        <title>Gamers Nation</title>
        
        <link rel="shortcut icon" href="../favicon.ico"> 
        <link href="css/bootstrap.min.css" rel="stylesheet">
        <link rel="stylesheet" type="text/css" href="css/main.css" />
        <link rel="stylesheet" type="text/css" href="css/style.css" />
        <link rel="stylesheet" type="text/css" href="css/elastislide.css" />


        <script id="img-wrapper-tmpl" type="text/x-jquery-tmpl">	
            <div class="rg-image-wrapper">
            {{if itemsCount > 1}}
            <div class="rg-image-nav">
            <a href="#" class="rg-image-nav-prev">Previous Image</a>
            <a href="#" class="rg-image-nav-next">Next Image</a>
            </div>
            {{/if}}
            <div class="rg-image"></div>
            <div class="rg-loading"></div>
            <div class="rg-caption-wrapper">
            <div class="rg-caption" style="display:none;">
            <p></p>
            </div>
            </div>
            </div>
        </script>
    </head>
    <?php include 'header.inc.php'; ?>
    <body>

        <?php
        $uservalid = "";

        if (isset($_GET['user'])) {
            $user = $_GET['user'];
        } else {
            header('Location: explore.php');
        }
        $sql = "SELECT * FROM users WHERE userName = \"" . $user . "\"";
        if ($result = mysqli_query($connection, $sql)) {
            while ($row = mysqli_fetch_assoc($result)) {
                $uservalid = 1;
            }
        }

        if (empty($uservalid)) {
            header('Location: explore.php');
        }
        ?>
        <div class="container-fluid">
            <?php
            $name = $email = $dob = $about = $webpage = "";
            $sql = "SELECT * FROM users WHERE userName=\"" . $user . "\"";
            if ($result = mysqli_query($connection, $sql)) {
                while ($row = mysqli_fetch_assoc($result)) {
                    $name = $row['name'];
                    $email = $row['email'];
                    $dob = $row['dob'];
                    $about = $row['about'];
                    $webpage = $row['webpage'];
                }
            }
            ?>
            <div class="page-header" style="margin-top: 4em;">
                <h1 style="color: #ffcc33"> <?php echo $user ?>'s Profile Page</h1>
            </div>

            <div class="page-header">

                <?php
                if ((!empty($name)) || (!empty($email)) || (!empty($webpage)) || (!empty($about))) {
                    ?>
                    <div class="panel panel-transparent">
                        <div class="panel-body">
                            <ul class="list-unstyled">
                                <?php
                                if (!empty($name)) {
                                    ?>
                                    <li >
                                        <label class="col-xs-6 col-md-5">Name : <strong style="color: #ff3366;"><?php echo $name ?></strong></label>
                                    </li>
                                    <?php
                                }
                                if (!empty($dob)) {
                                    ?>
                                    <li>
                                        <label class="col-xs-6 col-md-5">Date of Birth : <strong style="color: #ff3366;"><?php echo $dob ?></strong></label>

                                    </li>
                                    <?php
                                }
                                ?>
                            </ul>
                            <ul class = "list-unstyled">
                                <?php
                                if (!empty($about)) {
                                    ?>
                                    <li>
                                        <label class="col-xs-6 col-md-5">About Me : <strong style="color: #ff3366;"><?php echo $about ?></strong></label>
                                    </li>
                                    <?php
                                }

                                if (!empty($email)) {
                                    ?>
                                    <li>
                                        <label class="col-xs-6 col-md-5">E-mail : <strong style="color: #ff3366;"><?php echo $email ?></strong></label>                                                
                                    </li>
                                    <?php
                                }
                                ?>
                            </ul>

                            <ul class = "list-unstyled">
                                <?php
                                if (!empty($webpage)) {
                                    ?>
                                    <li>
                                        <label class="col-xs-6 col-md-5">Website : <strong style="color: #ff3366;"><?php echo $webpage ?></strong></label>

                                    </li>
                                    <?php
                                }
                                ?>
                            </ul>
                        </div>
                    </div>
                    <?php
                }
                ?>
            </div>

            <div class="container">
                <div class="content">
                    <h1>Image Gallery<span>View User's Image Gallery</span></h1>
                    <?php
                    $count = 0;
                    $sql = "SELECT * FROM userimages WHERE user_name = \"" . $user . "\" AND type_ID = 1";
                    if ($result = mysqli_query($connection, $sql)) {
                        while ($row = mysqli_fetch_assoc($result)) {
                            $count++;
                        }
                    }

                    if ($count != 0) {
                        ?>
                        <div id="rg-gallery" class="rg-gallery">
                            <div class="rg-thumbs">
                                <!-- Elastislide Carousel Thumbnail Viewer -->
                                <div class="es-carousel-wrapper">
                                    <div class="es-nav">
                                        <span class="es-nav-prev">Previous</span>
                                        <span class="es-nav-next">Next</span>
                                    </div>
                                    <div class="es-carousel">
                                        <ul>
                                            <!-- DESC cannot be empty if not will take from previous value-->

                                            <?php
                                            $sql = "SELECT * FROM userimages WHERE user_name = \"" . $user . "\" AND type_ID = 1";
                                            if ($result = mysqli_query($connection, $sql)) {
                                                while ($row = mysqli_fetch_assoc($result)) {
                                                    echo '<li>';
                                                    echo '<a href="#">';
                                                    echo '<img src="' . $row['imagePath'] . '" data-large="' . $row['imagePath'] . '" alt="' . $row['imageName'] . '" data-title="' . $row['imageName'] . '" />';
                                                    echo '</a>';
                                                    echo '</li>';
                                                }
                                            }
                                            ?>
                                        </ul>
                                    </div>
                                </div>
                                <!-- End Elastislide Carousel Thumbnail Viewer -->
                            </div><!-- rg-thumbs -->
                        </div><!-- rg-gallery -->
                        <?php
                    }
                    ?>
                </div><!-- content -->
            </div><!-- container -->

        </div>


    </body>

    <?php include 'footer.inc.php'; ?>
</html>

