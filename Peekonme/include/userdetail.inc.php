<?php
$username = $_SESSION['username'];
$name = $email = $dob = $about = $webpage = "";
$sql = "SELECT * FROM users WHERE userName=\"" . $username . "\"";
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
    <h1 style="color: #ffcc33;"><?php echo $username ?>'s Profile Page</h1>
</div>

<?php
if ((!empty($name)) || (!empty($email)) || (!empty($webpage)) || (!empty($about))) {
    ?>  

    <div class = "panel-transparent">
        <div class = "panel-body">
            <ul class = "list-unstyled">
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
            <br>
        </div>
    </div>
    <?php
}
?>