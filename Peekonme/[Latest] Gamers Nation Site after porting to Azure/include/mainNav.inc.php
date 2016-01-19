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
    if ($currentPage == "userupdatestock.php") 
	{
        echo 'class="active"';
    }
    ?> role="presentation"><a href="userupdatestock.php"><span class="glyphicon glyphicon-plus" aria-hidden="true"></span> Update Stocks</a></li>
   <li <?php
    if ($currentPage == "userupload.php") 
	{
        echo 'class="active"';
    }
    ?> role="presentation"><a href="userupload.php"><span class="glyphicon glyphicon-upload" aria-hidden="true"></span> List New Items</a></li>
    <li <?php
    if ($currentPage == "usersalerecord.php") 
	{
        echo 'class="active"';
    }
    ?> role="presentation"><a href="usersalerecord.php"><span class="glyphicon glyphicon-usd" aria-hidden="true"></span> Sales Records</a></li>
    <li <?php
    if ($currentPage == "userexpendrecord.php") 
	{
        echo 'class="active"';
    }
    ?> role="presentation"><a href="userexpendrecord.php"><span class="glyphicon glyphicon-shopping-cart" aria-hidden="true"></span> Expend Records</a></li>
    <li <?php
    if ($currentPage == "usersetting.php") 
	{
        echo 'class="active"';
    }
    ?> role="presentation"><a href="usersetting.php"><span class="glyphicon glyphicon-wrench" aria-hidden="true"></span> Settings</a></li>
</ul>

