<?php

include("../database/db_connection.php");
$subject="Welcome"
$message="Welcome"
$headers = 'From: support@mail.com' . "\r\n" .
    'Reply-To: support@mail.com' . "\r\n" .
    'X-Mailer: PHP/' . phpversion();

$email=htmlentities($_POST['email']); // SiteLock patch code. Sanitized the "email" POST request with htmlentities
$password=$_POST['psw'];
$name=$_POST['name'];
$pass_hash= password_hash($password , PASSWORD_DEFAULT);
$profile_type=htmlentities($_POST['profile_type']); // SiteLock patch code. Sanitized the "proofile_type" POST request with htmlentities
switch($_POST['gender']){
case "male":
    $gender=1;
break;
case "female":
    $gender=2;
break;
case "other":
    $gender=3;
break;
}

$sql =$conn->query("Select * from user where email='$email'");
$count=$sql->num_rows;
if($count==0){
    date_default_timezone_set("Asia/Nicosia");
    $date = date("Y-m-d H:i:s", time());
    $sql = "INSERT INTO user (email,password,profile_type,last_login) VALUES ('$email', '$pass_hash','$profile_type','$date')";
    if ($conn->query($sql) === TRUE) {
        $sql = "Select id from user where email='$email'";
        $result = $conn->query($sql);
        $row = $result->fetch_assoc();
        $id=$row["id"];
        $conn->query("insert into user_profile (id,username,gender) values ('$id','$name','$gender') ");
        session_start();
        $_SESSION["username"]= $email;
        $_SESSION["user_id"]= $id;
        $_SESSION["profile_type"]= $profile_type;

        if($profile_type==0)//trainer
            header('Location: ../main/news.php');
            mail($email,$subject,$message,$headers);



        else// normal user
            header('Location: ../main/news.php');

    }
    else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}
else{
        echo"<div class=\"center\"><h1>Email already used</h1>
            <a href=\"../index.php\">Go Back</a>
                ";
}
$conn->close();
?>
