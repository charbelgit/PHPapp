<?php
    session_start();
    include("../database/db_connection.php");
    $imagepath=$_POST['file'];
    $userid=$_SESSION['user_id'];

    $sql = "DELETE  FROM post_newsfeed_images WHERE post_newsfeed_images.imagepath='$imagepath' AND post_newsfeed_images.user_id=$userid";
    if ( $conn->query($sql) !== FALSE) {
        unlink($imagepath);
        $result = $conn->query($sql);
        ;
    }
    else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
?>
