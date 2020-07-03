<?php session_start();
include("../database/db_connection.php");
$id=$_SESSION["user_id"];
if (!is_numeric($id)) {
  exit('ERROR');
}
$first_name=$_POST["first_name"];
$last_name=$_POST["last_name"];
$experience=$_POST["experience"];
$description=$_POST["description"];
$country=$_POST["country"];
$timezone=$_POST["timezone"];
$username=$_POST["username"];
$phone_number=$_POST['phone_number'];
$discipline=$_POST['discipline'];
$query='UPDATE user_profile SET first_name="'.$first_name.'", last_name="'.$last_name.'", phone_number="'.$phone_number.'", experience='.$experience.',discipline="'.$discipline.'", description="'.$description.'", country="'.$country.'", timezone="'.$timezone.'", username="'.$username.'" WHERE id='.$id;
//echo $query;
$result = $conn->query($query);
if((gettype($result) == "object" && $result->num_rows == 0) || !$result){
    echo "error".$query;
}else{
    echo "success";
}
?>
