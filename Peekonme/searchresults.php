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
							<div class="dropdown">
								<button class="btn btn-default dropdown-toggle" type="button" id="commentFilter" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">
    Review comment filter criteria:
									<span class="caret"/>
								</button>
								<ul class="dropdown-menu" aria-labelledby="commentFilter">
									<li>
										<a href="#">Show most recent review comment</a>
									</li>
									<li>
										<a href="#">Show earliest review comment</a>
									</li>
									<li>
										<a href="#">Show highest rated comment</a>
									</li>
									<li>
										<a href="#">Show lowest rated comment</a>
									</li>
								</ul>
								<p>place holder for selected dropdown value</p>
							</div>
							<div class="dropdown">
								<button class="btn btn-default dropdown-toggle" type="button" id="ratingFilter" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">
    Review rating filter criteria:
									<span class="caret"/>
								</button>
								<ul class="dropdown-menu" aria-labelledby="commentFilter">
									<li>
										<a href="#">Show average rating based on rating made in the last 3 months</a>
									</li>
									<li>
										<a href="#">Show average rating based on rating made in the last 6 months</a>
									</li>
									<li>
										<a href="#">Show average rating based on rating made in the last 12 months</a>
									</li>
									<li>
										<a href="#">Show average rating based on rating made from all time</a>
									</li>
								</ul>
								<p>place holder for selected dropdown value</p>
							</div>
							<div class="row">

								<?php
            //	Display Search Results Below Here
        
            //	Build our query based on what they entered in the form
            $con = mysql_connect("localhost","root","");
            $db=mysql_select_db("gamernationdb",$con);
            $sql = "select g.*, avg(r1.rating) as Avg_Rating, max(r2.timestamp) as Most_Recent, r1.comment as Recent_Comment from review_have r1
            right outer join game g on g.gameid = r1.gameid
            left outer join review_have r2 on r1.gameid = r2.gameid
            ";
        
            if (isset($_POST['typeahead']))
            $sql .= " where g.title like '" . "%" . mysql_real_escape_string($_POST['typeahead']). "%" . "'";
            $sql .= "group by g.gameid";
    
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
<strong>Most Recent Comment</strong>
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