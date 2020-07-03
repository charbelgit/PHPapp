<?php
session_start();


date_default_timezone_set("Asia/Nicosia");
$date = date("Y-m-d H:i:s", time());

$name=$_POST['name'];
$age=$_POST['age'];
$height=$_POST['Height'];
$weight=$_POST['Weight'];
$price=$_POST['price'];
$goal=$_POST['goals'];
$expectations=$_POST['expectations'];



$sql="INSERT INTO `plan request` (name,age,height,weight,price,goal,expectations,Date) VALUES ('$name','$age','$height','$weight','$price','$goal','$expectations','$date')";
include('../database/db_connection.php');
if ( $conn->query($sql) !== FALSE) {


;}else {
  echo 'Something went wrong';
}


 ?>
