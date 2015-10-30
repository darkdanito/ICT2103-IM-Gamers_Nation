<?php
$username = $_SESSION['username'];
$email = "";

$sql = "SELECT * FROM user WHERE UserID=\"" . $username . "\"";
if ($result = mysqli_query($connection, $sql)) 
{
    while ($row = mysqli_fetch_assoc($result)) 
	{
        $email = $row['Email'];
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

                if (!empty($email)) 
				{
                    ?>
                    <li>
                        <label class="col-xs-6 col-md-5">E-mail : <strong style="color: #ff3366;"><?php echo $email ?></strong></label>                                                
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