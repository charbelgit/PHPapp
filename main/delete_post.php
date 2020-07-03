<?php
    session_start();
    include("../database/db_connection.php");
    $sql = "DELETE FROM post WHERE id=".$_POST["post_id"];
    if ( $conn->query($sql) !== FALSE) {
        $sql = "DELETE FROM post_newsfeed WHERE id=".$_POST["post_id"];
        $result = $conn->query($sql);
        if($conn->query($sql)!=FALSE){
            echo "success";
        }else{
            echo "fail";
        }
    }
    else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
?>
