<?php
session_start();

if ((!isset($_SESSION['username']))) {
    header('Location: login.php');
}
?>
<html>
    <head>
        <meta charset="UTF-8">
        <title>ICT 1004 - Web Systems & Technologies</title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">

        <link href="css/bootstrap.min.css" rel="stylesheet">
        <link href="css/main.css" rel="stylesheet"/>

    </head>
    <?php include 'header.inc.php'; ?>
    <body>

        <?php
        $imgid = $_GET['id'];

        $imgname = $imgdesc = $imgtype = "";
        $sql = "SELECT * FROM userimages WHERE image_ID = " . $imgid;
        if ($result = mysqli_query($connection, $sql)) {
            while ($row = mysqli_fetch_assoc($result)) {
                $imgname = $row['imageName'];
                $imgdesc = $row['imageDesc'];
                $imgtype = $row['type_ID'];
            }
        }

        $imgnameErr = "";

        $imgnamevalid = $imgdescvalid = $imgtypevalid = true;

        if ($_SERVER["REQUEST_METHOD"] == "POST") {

            $imgname = test_input($_POST["imgname"]);
            $imgdesc = test_input($_POST["imgdesc"]);
            $imgtype = test_input($_POST["imgtype"]);

            if (empty($imgname)) {
                $imgnameErr = "Please do not leave your Image Name empty.";
                $imgnamevalid = false;
            }

            if ($imgnamevalid && $imgdescvalid && $imgtypevalid) {
                $sql = "UPDATE userimages SET imageName = ?, imageDesc = ?, type_ID = ? WHERE image_ID = " . $imgid;
                if ($statement = mysqli_prepare($connection, $sql)) {
                    mysqli_stmt_bind_param($statement, 'ssi', $imgname, $imgdesc, $imgtype);
                    mysqli_stmt_execute($statement);
                }
                header('Location: userimgedit.php');
            }
        }

        function test_input($data) {
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
            <h1>Edit your Picture
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

                <div class="form-group">
                    <label for="imgtype" class="col-sm-2 control-label">Image Type</label>
                    <div class="col-sm-8">
                        <select name="imgtype" form="Updateimage" style="color: #606060">
                            <option value="0" <?php
                            if ($imgtype == 0) {
                                echo 'selected="selected"';
                            }
                            ?>>Private</option>
                            <option value="1" <?php
                            if ($imgtype == 1) {
                                echo 'selected="selected"';
                            }
                            ?>>Public</option>
                        </select>
                    </div>
                </div>


                <div class="form-group">
                    <label for="imgdesc" class="col-sm-2 control-label">Image Description</label>
                    <div class="col-sm-8">
                        <textarea rows="3" cols="50" id="imgdesc" name="imgdesc" form="Updateimage" maxlength="100" style="color: #606060"><?php
                            if ($imgdescvalid) {
                                echo htmlspecialchars($imgdesc);
                            }
                            ?>
                        </textarea>       
                    </div>
                </div>

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