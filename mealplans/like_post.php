<?php
    session_start();
    include("../database/db_connection.php"); 
    if($_POST["action"]==1){
        $query="INSERT INTO post_like VALUES(".$_SESSION["user_id"].",".$_POST["post_id"].")";
    }else{
        $query="DELETE FROM post_like WHERE user_id=".$_SESSION["user_id"]." and post_id=".$_POST["post_id"];
    }
    if ($conn->query($query) === TRUE) {
        echo "worked";
    }else{
        echo "not worked";
    }
?>
    