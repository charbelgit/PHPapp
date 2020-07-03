<?php
    session_start();
    include("../database/db_connection.php");
    date_default_timezone_set("Asia/Nicosia");
    $title=$_POST["title"];
    $description=$_POST["description"];
    $text=$_POST["text"];
    $keywords=$_POST["keywords"];
    $user_id=$_SESSION["user_id"];
    $type=$_POST["type"];
    $date = date("Y-m-d H:i:s", time());
    $sql = "INSERT INTO post (user_id,reply_to_id,date,type) VALUES ('$user_id',0,'$date','$type')";
    if ( $conn->query($sql) !== FALSE) {
        $sql = "Select id from post where user_id='$user_id' and date='$date' and type='$type'";
        $result = $conn->query($sql);
        $row = $result->fetch_assoc();
        $id=$row["id"];
        $keywords_split = preg_split("/[^\w]*([\s]+[^\w]*|$)/", strtolower($keywords), -1, PREG_SPLIT_NO_EMPTY);
        for ($i = 0; $i < count($keywords_split); $i++) {
            $sql="insert into article_keywords (id,keyword) values ('$id','$keywords_split[$i]')";
            //echo "\n".$sql."\n";
            if($conn->query($sql)!==FALSE){
            }else{
                echo "fail";
            }
        }
        $sql="INSERT INTO post_text (id,title,description,text) values ('$id','$title','$description','$text')";
        if($conn->query($sql)!=FALSE){
            header('Location: articles.php');
        }else{
            echo "fail";
        }
    }
    else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
