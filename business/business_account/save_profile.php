<?php
$servername ="localhost";
$dBUsername="root";
$dBPassword="";
$dBName=""; //insert database name

$conn= mysqli_connect($servername,$dBUsername,$dBPassword,$dBName);
if (!$conn) {
  die("Connection failed:".mysqli_connect_error());
  }

session_start();

$website=$_POST['website'];
$about=$_POST['about'];
$main_services=$_POST['main_services'];
$years=$_POST['years'];
$mission=$_POST['mission'];
$business_email=$_POST['email'];
$username=$_POST['username'];
$business_address=$_POST['address'];
$phone_number=$_POST['phone_number'];
$b_id=$_SESSION['business_id'];
$query='UPDATE business_account SET business_website="'.$website.'" , about="'.$about.'" , main_services="'.$main_services.'" , years="'.$years.'" , mission="'.$mission.'",business_phonenumber="'.$phone_number.'" WHERE business_id='.$b_id;
//echo $query;
$result = $conn->query($query);
if((gettype($result) == "object" && $result->num_rows == 0) || !$result){
    echo "error".$query;
}else{
    $_SESSION['business_website']=$website;
    echo "success";
    header('Location: business_editprofile.php?saved');
}
