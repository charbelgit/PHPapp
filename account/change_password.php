<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

if(isset($_POST['email'])){
include('../database/db_connection.php');
    $email=$conn->real_escape_string($_POST['email']);
    $sql=$conn->query("SELECT id FROM user WHERE email='$email'");

    if($sql->num_rows > 0){
      $token='jbwufhdnzsxfeer3nmkytqwertyui49r483491dfWEasdfghjkldqasdfghjklxcvbnm0987654320';
      $token=str_shuffle($token);
      $token=substr($token,0,10);

      $conn->query("UPDATE user SET token='$token', tokenExpire=DATE_ADD(NOW(),INTERVAL 5 MINUTE) WHERE email='$email'");

      require_once "PHPMailer/PHPMailer.php";
      require_once "PHPMailer/Exception.php";
      require_once "PHPMailer/SMTP.php";

      $mail= new PHPMailer();
      $mail->SMTPAuth  = true;
      $mail->addAddress($email);
      $mail->setFrom ("email@domain.com", "SocialNetworkExample support team");
      $mail->Subject = "Reset Password";
      $mail->isHTML(true);
      $mail->Body= "
        Hello, <br><br>

        We have received your inquiry, in order to reset your password, please click on the link below in the next 5 minutes.
        <a href='
        https://resetPassword.php?email=$email&token=$token
        '>resetPassword.php?email=$email&token=$token</a><br>

        Best Regards,<br><br>
        SocialNetworkExample Support Team.


      ";

      if($mail->send())
        exit(json_encode(array("status"=> 1, "msg"=> 'Please check your inbox!')));
      else
          exit(json_encode(array("status"=> 1, "msg"=> 'Oops, something went wrong, please try again.')));
    }else
      exit(json_encode(array("status"=> 0, "msg"=> 'Email incorrect, please check your inputs!')));
    }
 ?>
 <!DOCTYPE html>
 <html lang="en" dir="ltr">
   <head>
     <meta charset="utf-8">
     <meta name="viewport" content="width=device-width, initial-scale=1.0">

     <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

     <title>Restore Password</title>
   </head>
   <body>
     <div class="container" style="margin-top:100px;">
       <div class="row justify-content-center" >
         <div class="col-md-6 col-md-offset-3" align="center">

         <img src="../images/logo.png" style="width:72%; height:32%;"> <br><br>
         <input type="email" class="form-control" id="email" name="email" placeholder="Enter your Email"><br>
         <input type="button" class="btn btn-primary" name="" value="Reset Password">
         <br><br>
         <p id="response"></p>
       </div>
       </div>
     </div>
     <script
  src="https://code.jquery.com/jquery-3.4.1.min.js"
  integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo="
  crossorigin="anonymous"></script>
  <script type="text/javascript">
  var email = $("#email");

    $(document).ready(function(){
      $('.btn').on('click',function(){
        if(email.val() !=""){
          email.css('border','1px solid green');

            $.ajax({
              url:'change_password.php',
              method: 'POST',
              dataType: 'json',
              data: {
                  email: email.val()
              }, success: function(response){
                    if (!response.success)
                    $("#response").html(response.msg).css('color',"red");
                  else if(response.success){
                    $("#response").html(response.msg).css('color',"green");}

              }



            });

        } else {
          email.css('border','1px solid red');

        }



      });









    }
  );
  </script>
   </body>
 </html>
