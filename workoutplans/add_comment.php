<?php
    session_start();
    include("../database/db_connection.php");
    date_default_timezone_set("Asia/Nicosia");
    //$title=$_POST["title"];
    $comment=$_POST["comment"];
    $reply_to=$_POST["id"];
    $user_id=$_SESSION["user_id"];
    $type=0;
    $date = date("Y-m-d H:i:s", time());
    $sql = "INSERT INTO post (user_id,reply_to_id,date,type) VALUES ($user_id,$reply_to,'$date','$type')";
    if ( $conn->query($sql) !== FALSE) {
        $sql = "Select id from post where user_id='$user_id' and date='$date' and type='$type'";
        $result = $conn->query($sql);
        $row = $result->fetch_assoc();
        $id=$row["id"];
        $sql="insert into comment_text (id,text) values ('$id','$comment')";
        if($conn->query($sql)!=FALSE){
            header('Location: viewworkout.php?id='.$reply_to );
        }else{
            echo "fail";
        }
    }
    else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }  ?>
