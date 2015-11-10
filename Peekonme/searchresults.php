<?php
	session_start();
?>

<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<link href="css/bootstrap.min.css" rel="stylesheet">
<link href="css/bootstrap-theme.min.css" rel="stylesheet">
<link rel="stylesheet" href="css/main.css" />
<title>Gamers Nation</title>
</head>
<?php include 'header.inc.php'; ?>

<body>
<div class="container" style="margin-top: 4em ">
<table class='table'>
<thead>
<tr>
<th>Filter platform by:</th>
<th>Filter review rating by:</th>
<th>Filter review comment by:</th>
</tr>
</thead>
<tbody>
<tr>
<td>
<form id="form" action"" method="post">
<select class="dropDownFilter"  name="pFilter" onchange="form.submit()">
        <option selected="selected" disabled hidden value=''></option>
        <?php
        // A sample product array
        $platformCriteria = array(
		"XBOX" => "Show only XBOX games",
		"PC" => "Show only PC games",
		"All" => "Show all platform games" 
		);
        // Iterating through the product array
        foreach($platformCriteria as $key => $item){
        ?>
        <option value="<?php echo ($key); ?>" 
		<?php
		//set post to default value
		if(!isset($_POST['pFilter'])){$_POST['pFilter'] = "All";}
		//update newly selected value		
		if(((isset($_POST['pFilter'])) && (strcasecmp($key, $_POST['pFilter']) == 0))) echo "selected"; ?>>
        <?php echo $item; ?></option>
        <?php
        }
        ?>
    </select>
    <?php if(isset($_POST['pFilter']))echo ($_POST['pFilter']) ?>
</td>
<td>

<select class="dropDownFilter" name="rFilter" onchange="form.submit()">
        <option selected="selected" disabled hidden value=''></option>
        <?php
        // A sample product array
        $ratingCriteria = array(
		"3" =>"Show average rating based on rating made in the last 3 months",
		"6" => "Show average rating based on rating made in the last 6 months", 
		"12" => "Show average rating based on rating made in the last 12 months", 
		"All" => "Show average rating based on rating made from all time");
        
        // Iterating through the product array
        foreach($ratingCriteria as $key => $item){
        ?>
        <option value="<?php echo ($key); ?>" 
		<?php
		//set post to default value
		if(!isset($_POST['rFilter'])){$_POST['rFilter'] = "All";}
		//update newly selected value		
		if(((isset($_POST['rFilter'])) && (strcasecmp($key, $_POST['rFilter']) == 0))) echo "selected"; ?>>
        <?php echo $item; ?></option>
        <?php
        }
        ?>
    </select>

    <?php if(isset($_POST['rFilter']))echo $_POST['rFilter'] ?>
</td>
<td>

<select class="dropDownFilter" name="cFilter" onchange="form.submit()">
        <option selected="selected" disabled hidden value=''></option>
        <?php
        // A sample product array
        $commentCriteria = array(
		"Lowest" => "Show lowest rated comment",
		"Highest" => "Show highest rated comment", 
		"Earliest" => "Show earliest review comment", 
		"Recent" => "Show most recent review comment"
		);
   
        // Iterating through the product array
        foreach($commentCriteria as $key => $item){
        ?>
        <option value="<?php echo ($key); ?>" 
		<?php
		//set post to default value
		if(!isset($_POST['cFilter'])){$_POST['cFilter'] = "Recent";}
		//update newly selected value		
		if(((isset($_POST['cFilter'])) && (strcasecmp($key, $_POST['cFilter']) == 0))) echo "selected"; ?>>
		<?php echo $item; ?></option>
        <?php
        }
        ?>
    </select>
    </form>
    <?php if(isset($_POST['cFilter']))echo $_POST['cFilter'] ?>

</td>
</tr>
</tbody>
</table>

 

 
   
  
    
<div class="row">
  <?php
            //	Display Search Results Below Here
        
            //	Build our query based on what they entered in the form
			$platform = ($_POST['pFilter']);
            $con = mysql_connect("localhost","root","");
            $db=mysql_select_db("gamernationdb",$con);
            $sql = "select g.*, avg(r1.rating) as Avg_Rating, max(r2.timestamp) as Most_Recent, r1.comment as Recent_Comment from review_have r1
            right outer join game g on g.gameid = r1.gameid
            left outer join review_have r2 on r1.gameid = r2.gameid
            ";
            if (isset($_POST['typeahead'])){
            $sql .= " where g.title like '" . "%" . mysql_real_escape_string($_POST['typeahead']). "%" . "'";}
			if ($_POST['pFilter'] != 'All'){
			$sql .= " where g.platform ='". $_POST['pFilter']."'";}

            $sql .= " group by g.gameid";
    
            $loop = mysql_query($sql)
            or die ('cannot run the query because: ' . mysql_error());
        	
            echo "
            <table class='table'>
                <thead>
                    <tr>
                        <th>
<strong>Title</strong>
</th>
						<th>
<strong>Image</strong>
</th>
                        <th>
<strong>Platform</strong>
</th>
                        <th>
<strong>Price</strong>
</th>
                        <th>
<strong>Average Rating</strong>
</th>
                        <th>
<strong>Comment</strong>
</th>
                    </tr>
                </thead>
                
                <tbody>";
                    while ($record = mysql_fetch_assoc($loop))
                    {
//						echo "<br/>{$record['id']}) " . stripslashes($record['username']) . " - {$record['email']}";

				            echo '<tr>';
							echo '<td>';
							echo '<a href="imagedetail.php?id=' . $record['GameID'] . '">';
//							echo '<a class="thumbnail" href="imagedetail.php?id=' . $row3['GameID'] . '">';
                    		echo $record['Title'];
							echo '</a>';
							echo '</td>';
							echo '<td>';
							echo '<img src="' . $record['ImagePath'] . '" width="20%"/>';
							echo '</td>';
							echo '<td>';
							echo $record['Platform'];
							echo '</td>';
							echo '<td>$';
							echo $record['Price'];
							echo '</td>';
							echo '<td>';
							echo $record['Avg_Rating'];
							echo '</td>';
							echo '<td>';
							echo $record['Recent_Comment'];
							echo '</td>';
							echo '</tr>';
                    }
                echo "
                </tbody>
            </table>";
        
//			This gets the total number of records returned by our query
            $total_records = mysql_num_rows(mysql_query($sql));
        
            echo "<center>" . number_format($total_records) . " search results found</center>";
          
//		Purpose: paginate a result set
//		Precondition: current page, total records, extra variables to pass in the page string
//		Postcondition: pagination is displayed
    
        function pagination($current_page_number, $total_records_found, $query_string = null)
        {
            $page = 1;
        
            echo "Page: ";
        
            for ($total_pages = ($total_records_found/NUMBER_PER_PAGE); $total_pages > 0; $total_pages--)
            {
                if ($page != $current_page_number)
                    echo "<a href=\"?page=$page" . (($query_string) ? "&$query_string" : "") . "\">";
        
                echo "$page ";
        
                if ($page != $current_page_number)
                    echo "</a>";
        
                $page++;
            }
        }
          
        ?>
</div>
</div>
<?php include 'footer.inc.php'; ?>
</body>
</html>