<?php
function redirect(){
  header('Location: ../login/login_form.html');
  exit();

}
  if(isset($_GET['email']) && isset($_GET['token'])){
    include('../database/db_connection.php');

    $email=$conn->real_escape_string($_GET['email']);
    $token=$conn->real_escape_string($_GET['token']);

    $sql=$conn->query("SELECT id FROM user WHERE email='$email' AND token='$token' AND token<>'' AND tokenExpire > NOW()");
    if($sql->num_rows > 0){
      $newPassword='jbwufhdnzsxfeer3nmkytqwertyui49r483491dfWEasdfghjkldqasdfghjklxcvbnm0987654320';
      $newPassword=str_shuffle($token);
      $newPassword=substr($token,0,10);
      $newPassHash= password_hash($newPassword,PASSWORD_DEFAULT);
      $conn->query("UPDATE user SET token='', password='$newPassHash' WHERE email='$email'");

      echo "<!DOCTYPE html>
      <html lang='en' dir='ltr'>
        <head>
          <meta charset='utf-8'>
          <meta name='viewport' content='width=device-width, initial-scale=1.0'>
          <title>Password Activation</title>
        </head>
        <body>
          <div align='center'><h2 style='display:inline-block;'>Your New Password is $newPassword<br> <a href='../login/login_form.html'>  Click here to Login! </a> </h2></div>
        </body>
      </html>";



    } else {
      redirect();
    }






  }else {
    redirect();
  }




 ?>
