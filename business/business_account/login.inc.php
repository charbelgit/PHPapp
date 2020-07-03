<?php
if (isset($_POST['submit'])) {
  require 'dbh.inc.php';

  $email= $_POST['email'];
  $password=$_POST['password'];

  if (empty($email) || empty($password)) {
    header("Location: login.php?error=emptyfields");
    exit();
  }else {
    $sql="SELECT * FROM business_account WHERE business_username=? OR business_email=?;";
    $stmt = mysqli_stmt_init($conn);
    if (!mysqli_stmt_prepare($stmt,$sql)) {
      header("Location: login.php?error=connectionerror");
      exit();

  }else {
    mysqli_stmt_bind_param($stmt, "ss", $email, $email);
    mysqli_stmt_execute($stmt);
    $result = mysqli_stmt_get_result($stmt);
    if ($row = mysqli_fetch_assoc($result)) {
      $pwdCheck=password_verify($password, $row['business_password']);
      if ($pwdCheck==false) {
        header("Location: login.php?error=wrongPassword");
        exit();
      }else if ($pwdCheck==true) {

        session_start();

        $_SESSION['business_id']=$row['business_id'];
        $_SESSION['business_name']=$row['business_name'];
        $_SESSION['business_username']=$row['business_username'];
        $_SESSION['business_email']=$row['business_email'];
        $_SESSION['business_website']=$row['business_website'];
        $_SESSION['business_country']=$row['business_country'];
        $_SESSION['business_address']=$row['business_address'];
      
        header("Location: business_account.php?success");
        exit();
      }else {
        header("Location: login.php?error=wrongPassword");
        exit();
      }
    }else {
      header("Location: login.php?error=nouser");
      exit();
    }
  }
}

}else {
  header("Location:../index.php");
  exit();
}
