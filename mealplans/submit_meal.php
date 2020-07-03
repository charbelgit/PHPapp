<?php
session_start();
//include("../database/db_connection.php");
// include didn't work on live host
$conn = new mysqli("localhost" , "root", "" , "databasename"); 
	if ($conn->connect_error) {
		die("Connection failed: " . $conn->connect_error);
	}else{
		//echo "succeed";
	}
  date_default_timezone_set("Asia/Nicosia");
// normal variables
$title_meal=$_POST['title_meal'];
$subheader=$_POST['subheader'];
$duration_meal=$_POST['duration_meal'];
// =============================================
$price_meal=$_POST['price_meal'];
$meal_text=htmlspecialchars($_POST['meal_text'],ENT_QUOTES, 'UTF-8');

// arrays
//$Meal_day=$_POST['Meal_day'];
//$meal_number=$_POST['Meal_number'];
//$meal_description=$_POST['meal_description'];
//$meal_calories=$_POST['meal_calories'];
// =============================================


$user_id=$_SESSION["user_id"];
$date = date("Y-m-d H:i:s", time());
$sql = "INSERT INTO post (user_id,reply_to_id,date,type) VALUES ('$user_id',0,'$date',0)";
if ( $conn->query($sql) !== FALSE) {
    $sql = "Select id from post where user_id='$user_id' and date='$date'";
    $result = $conn->query($sql);
    $row = $result->fetch_assoc();
    $id=$row["id"];
  $sql="INSERT INTO post_meal (id,title_meal,subheader,duration_meal,price_meal,meal_text) VALUES ('$id','$title_meal','$subheader','$duration_meal','$price_meal','$meal_text')";
  if($conn->query($sql)!=FALSE){
      header('Location: mealplans.php');
    }else {
      echo "<h2>Something went wrong!</h2>";
  } }
  else {
      echo "Error: " . $sql . "<br>" . $conn->error;
  }

//else {
//  echo "Error: " . $sql . "<br>" . $conn->error;
//}
 ?>
