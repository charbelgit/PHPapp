<?php
    session_start();
    include("../database/db_connection.php"); 
    $query="SELECT * FROM post_like WHERE post_id=".$_POST["post_id"];
    $result=$conn->query($query);
        echo $result->num_rows;

?>
    