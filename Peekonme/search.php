<?php
    $key=$_GET['term'];
    $array = array();
    $con=mysql_connect("localhost","root","");
    $db=mysql_select_db("gamernationdb",$con);
    $query=mysql_query("select * from game where * LIKE '%{$key}%'");
    while($row=mysql_fetch_assoc($query))
    {
      $array[] = $row['Title'];
    }
    echo json_encode($array);
?>
