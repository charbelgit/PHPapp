<?php
if (isset($_POST['submit'])) {
  require 'dbh.inc.php';

  $fname=$_POST['fname'];
  $lname=$_POST['lname'];
  $business_rep=$fname." ".$lname;
  $business_name=$_POST['business_name'];
  $business_username=$_POST['business_username'];
  $business_email=$_POST['business_email'];
  $business_website=$_POST['business_website'];
  $password=$_POST['password'];
  $passwordRepeat=$_POST['passwordRep'];
  $address=$_POST['address'];
  $country=$_POST['country'];

  if (empty($fname) || empty($lname) || empty($business_name) || empty($business_email) || empty($password) ||empty($passwordRepeat) ||empty($address) || empty($country) ) {
    header("Location:register.php?error=emptyfields&fname=".$fname."&lname=".$lname."&business_name=".$business_name."&business_username=".$business_username);
    exit();
  }else if (!filter_var($business_email,FILTER_VALIDATE_EMAIL) && !preg_match("/^[a-zA-Z0-9]*$/",$business_username) ) {
    header("Location:register.php?error=invalidmail&invalidUsername&fname=".$fname."&lname=".$lname."&business_name=".$business_name);
    exit();

  }else if(!filter_var($business_email,FILTER_VALIDATE_EMAIL)) {
    header("Location:register.php?error=invalidmail&fname=".$fname."&lname=".$lname."&business_name=".$business_name."&business_username=".$business_username);
    exit();
  }else if (!preg_match("/^[a-zA-Z0-9]*$/",$business_username)) {
    header("Location:register.php?error=invalidmail&fname=".$fname."&lname=".$lname."&business_name=".$business_name."&business_email=".$business_email);
    exit();
  }else if ($password!==$passwordRepeat) {
    header("Location:register.php?error=invalidpasswords&fname=".$fname."&lname=".$lname."&business_name=".$business_name."&business_email=".$business_email);
    exit();
  }else {
    $sql="SELECT business_name,business_username,business_email FROM business_account WHERE business_name=? AND business_username=? AND business_email=?";
    $stmt=mysqli_stmt_init($conn);
    if (!mysqli_stmt_prepare($stmt,$sql)) {
      header("Location:register.php?error=sqlerror");
      exit();
    }else {
      mysqli_stmt_bind_param($stmt,"sss",$business_name,$business_username,$business_email);
      mysqli_stmt_execute($stmt);
      mysqli_stmt_store_result($stmt);
      $resultCheck=mysqli_stmt_num_rows($stmt);
      if ($resultCheck >0) {
        header("Location:register.php?error=userTaken");
        exit();
      }else {
        $sql = "INSERT INTO business_account (business_rep,business_name,business_username,business_email,business_website,business_password,business_address,business_country) VALUES (?,?,?,?,?,?,?,?)";
        $stmt=mysqli_stmt_init($conn);
        if (!mysqli_stmt_prepare($stmt,$sql)) {
          header("Location:register.php?error=sqlerror");
          exit();
        }else {
          $passwordHash=password_hash($password, PASSWORD_DEFAULT);
          mysqli_stmt_bind_param($stmt,"ssssssss",$business_rep,$business_name,$business_username,$business_email,$business_website,$passwordHash,$address,$country);
          mysqli_stmt_execute($stmt);
          header("Location:business_account.php?signup=success");
          exit();
        }

      }
    }
    mysqli_stmt_close($stmt);
    mysqli_close($conn);

  }



}else {
  header("Location:register.php");
  exit();

}
