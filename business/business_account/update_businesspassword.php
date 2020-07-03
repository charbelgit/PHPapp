<?php
session_start();
if(!isset($_SESSION['business_id'])){
  exit("FORBIDDEN ACCESS!");
}
 ?>
 <!DOCTYPE html>
 <html lang="en" dir="ltr">
   <head>
     <meta charset="utf-8">
     <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=no">
     <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

     <title>Update Your Password</title>
   </head>
   <body>
     <form class="" method="post">

     <div class="container" style="margin-top:100px;">
       <div class="row justify-content-center" >
         <div class="col-md-6 col-md-offset-3" align="center">

         <img src="../../images/logo.png" style="width:300px; height:85px;"> <br><br>
         <input type="password" class="form-control"  name="oldPass" placeholder="Enter Old Password"><br>
         <input type="password" class="form-control" id="psw" name="newPass"  placeholder="Enter New Password"><br>
         <input type="password" class="form-control" id="psw-repeat" onkeyup="check();" name="confirmPass" placeholder="Confirm New Password"><br>
         <span id="message"></span>
         <input type="submit" class="btn btn-primary" id="confirm-btn" name="submit" value="Change Password">
         <br><br>
         <p id="response"></p>
       </div>
       </div>
     </div>
   </form>
   <?php
   include("dbh.inc.php");
     if (isset($_POST['submit'])) {
   $oldPass=$_POST['oldPass'];
   $newPass=$_POST['newPass'];
   $confirmPass=$_POST['confirmPass'];

   $id=$_SESSION["business_id"];
   if (!is_numeric($id)) {
     exit('error');
   }
    $query="SELECT * FROM business_account WHERE business_id=".$id;
   $result = $conn->query($query);
   if ($result->num_rows > 0) {
     $row = $result->fetch_assoc();
 if (password_verify($oldPass,$row['business_password'])) {
   if ($newPass=$confirmPass) {
     $newPassHash=password_hash($newPass,PASSWORD_DEFAULT);
     $conn->query("UPDATE business_account SET  business_password='$newPassHash' WHERE business_id='$id'");
     header('location: login.php');
   }echo '<h3> Passwords Do Not Match<h3>';
 }else {
   echo '<h2> Wrong Password!</h2>';
 }

   }
 }








    ?>
     <script>
   	var check = function() {
     if (document.getElementById('psw').value ==
       document.getElementById('psw-repeat').value)   {
       document.getElementById('message').style.color = 'green';
       document.getElementById('message').innerHTML = '&#x2705 Matching';
   		document.getElementById('psw-repeat').style.border='3px solid #90EE90';
   		document.getElementById('confirm-btn').disabled=false;





     } else {
       document.getElementById('message').style.color = 'red';
       document.getElementById('message').innerHTML = '&#10060 Passwords Not Matching, Check Your Inputs.';
   		document.getElementById('psw-repeat').style.border='3px solid red';
   		document.getElementById('confirm-btn').disabled=true;
     }
   }
   </script>
   </body>
 </html>
