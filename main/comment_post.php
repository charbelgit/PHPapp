<?php
session_start();
include("../database/db_connection.php");
date_default_timezone_set("Asia/Nicosia");


$comment= htmlspecialchars($_POST['comment']);
$postID=$_POST['postID'];

$sql="INSERT INTO comment_posts(postID,userID,  commentText, createdOn) VALUES ('$postID','".$_SESSION['user_id']."','$comment',NOW())";
if($conn->query($sql)!=FALSE){


}else{
echo "fail";}


 ?>
