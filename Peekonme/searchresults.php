<?php
	session_start();
?>

<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Gamers Nation</title>
<link href="css/bootstrap.min.css" rel="stylesheet">
<link href="css/bootstrap-theme.min.css" rel="stylesheet">
<link rel="stylesheet" href="css/main.css" />
</head>
<?php include 'header.inc.php'; ?>

<body>
<div class="container" style="margin-top: 4em ">
<div class="row">
  <?php
  
  /**
* Display Search Results Below Here
**/
//build our query based on what they entered in the form
$con=mysql_connect("localhost","root","");
$db=mysql_select_db("gamernationdb",$con);
$sql = "select g.*, avg(r1.rating) as Avg_Rating 
from review_have r1
right outer join game g on g.gameid = r1.gameid
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
        <th><strong>Title</strong></th>
        <th><strong>Platform</strong></th>
        <th><strong>Price</strong></th>
		<th><strong>Average Rating</strong></th>
      </tr>
    </thead>
    <tbody>";
while ($record = mysql_fetch_assoc($loop)){
   //echo "<br/>{$record['id']}) " . stripslashes($record['username']) . " - {$record['email']}";
   echo 
   "<tr>
   <td>{$record['Title']}</td>
   <td>{$record['Platform']}</td>
   <td>\${$record['Price']}</td>
   <td>{$record['Avg_Rating']}</td>
   </tr>";
   //echo "<br/>{$record['Title']} ";
   
   
}
echo "
</tbody>
  </table>";
//this gets the total number of records returned by our query
$total_records = mysql_num_rows(mysql_query($sql));

echo "<center>" . number_format($total_records) . " search results found</center>";
  

/****
* Purpose: paginate a result set
* Precondition: current page, total records, extra variables to pass in the page string
* Postcondition: pagination is displayed
****/
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
<?php include 'footer.inc.php'; ?>
</body>
</html>