<?php
session_start();
include('../database/db_connection.php');
date_default_timezone_set("Asia/Nicosia");
$date = date("Y-m-d H:i:s", time());
$message='';
if (isset($_POST['chat'])) {
  $message=htmlspecialchars($_POST['chat'],ENT_QUOTES, 'UTF-8');
}

$sent_to=$_POST['sent_to'];
$sent_from=$_SESSION['user_id'];

$sql="INSERT INTO messages(sent_from,sent_to,messageText,time) VALUES ('$sent_from','$sent_to','$message','$date')";
if ( $conn->query($sql) !== FALSE) {

  //header('location:chatroom.php?trainerid='.$_POST['trainerid'].'&userid='.$_POST['userid'].'');
  }


 ?>
