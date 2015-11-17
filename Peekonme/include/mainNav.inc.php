<ul class="nav nav-tabs" role="tablist">
    <?php $currentPage = basename($_SERVER['SCRIPT_FILENAME']); ?>
    <li <?php
    if ($currentPage == "usergallery.php") 
	{
		echo 'class="active"';
    }
    ?> role="presentation"><a href="usergallery.php"><span class="glyphicon glyphicon-picture" aria-hidden="true"></span> My Listed Items</a>
    </li>
    <li <?php
    if ($currentPage == "userimgedit.php" || $currentPage == "imgedit.php") 
	{
        echo 'class="active"';
    }
    ?> role="presentation"><a href="userimgedit.php"><span class="glyphicon glyphicon-edit" aria-hidden="true"></span> Edit</a></li>
    <li <?php
    if ($currentPage == "userupload.php") 
	{
        echo 'class="active"';
    }
    ?> role="presentation"><a href="userupload.php"><span class="glyphicon glyphicon-save" aria-hidden="true"></span> Sell Games</a></li>
    <li <?php
    if ($currentPage == "usersetting.php") 
	{
        echo 'class="active"';
    }
    ?> role="presentation"><a href="usersetting.php"><span class="glyphicon glyphicon-wrench" aria-hidden="true"></span> Settings</a></li>
</ul>

