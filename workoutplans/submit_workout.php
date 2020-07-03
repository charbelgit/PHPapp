<?php
session_start();
include("../database/db_connection.php");
  date_default_timezone_set("Asia/Nicosia");
// normal variables
$title_workout=$_POST['title_workout'];
$subheader=$_POST['subheader'];
$duration_workout=$_POST['duration_workout'];
// =============================================
$price_workout=$_POST['price_workout'];
$workout_text=$_POST['workout_text'];
// arrays
//$workout_day=$_POST['workout_day'];
//$workout_number=$_POST['workout_number'];
//$workout_description=$_POST['workout_description'];
//$workout_calories=$_POST['workout_calories'];
// =============================================


$user_id=$_SESSION["user_id"];
$date = date("Y-m-d H:i:s", time());
$sql = "INSERT INTO post (user_id,reply_to_id,date,type) VALUES ('$user_id',0,'$date',0)";
if ( $conn->query($sql) !== FALSE) {
    $sql = "Select id from post where user_id='$user_id' and date='$date'";
    $result = $conn->query($sql);
    $row = $result->fetch_assoc();
    $id=$row["id"];
  $sql="INSERT INTO post_workout (id,title_workout,subheader,duration_workout,price_workout,workout_text) VALUES ('$id','$title_workout','$subheader','$duration_workout','$price_workout','$workout_text')";
  if($conn->query($sql)!=FALSE){
      header('Location: workoutplans.php');
  }else{
      echo "fail";
  } }
  else {
      echo "Error: " . $sql . "<br>" . $conn->error;
  }

//else {
//  echo "Error: " . $sql . "<br>" . $conn->error;
//}
 ?>
