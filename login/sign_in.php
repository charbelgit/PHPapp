<?php
session_start();
include("../database/db_connection.php");
$email=$_POST['login_username'];
$password=$_POST['login_password'];
$sql = "SELECT * FROM user where email='$email'";
$result = $conn->query($sql);
if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        if (!empty($_POST['remember'])) {
          setcookie('email',$email, time()+ 36000 );
        }
        if (password_verify($password,$row["password"])){
            $id=$row["id"];
            date_default_timezone_set("Asia/Nicosia");
            $date = date("Y-m-d H:i:s", time());
            $sql = "Update user set last_login='$date' where email='$email' ";
            $result = $conn->query($sql);
            session_start();
            $_SESSION["username"]= $email;
            $_SESSION["user_id"]= $id;
            $_SESSION["profile_type"]=$row["profile_type"];
        if($row["profile_type"]==0)//trainer
            header('Location: ../memberships/memberships.php');
        else// normal user
            header('Location: ../main/news.php');
            //header('Location: /home.php');
        }
        else{
            invalid();
        }
    }
    else{
       invalid();
    }
    function invalid(){
        echo"<div class=\"center\"><h1>Invalid Login</h1>
        <a href=\"../index.php\">Go Back to the main page</a>";
    }
$conn->close();
?>
