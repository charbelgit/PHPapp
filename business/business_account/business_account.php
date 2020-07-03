<?php
session_start();
require 'dbh.inc.php';

 ?>

<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">


    <link rel="icon" type="images/image/png" href="../../images/icon logo.png">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
    <title> Business | Welcome</title>
  </head>
  <body>
    <nav class="navbar navbar-expand-md bg-dark navbar-dark">
 <a class="navbar-brand" href="../index.php"><img src="../../images/logo.png" height="30px"  ></a>
 <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#collapsibleNavbar">
   <span class="navbar-toggler-icon"></span>
 </button>
 <div class="collapse navbar-collapse" id="collapsibleNavbar">
   <ul class="navbar-nav">
     <li class="nav-item">
       <?php if (isset($_SESSION['business_id'])):
         echo'<a class="nav-link" href="business_account.php">Home</a>';
         else :
           echo '<a class="nav-link" href="../index.php">Home</a>'; ?>

       <?php endif; ?>

     </li>
     <li class="nav-item">
       <a class="nav-link" href="../pricing/index.php">Pricing</a>
     </li>
     <li><?php if (isset($_SESSION['business_id'])):
       echo '<a class="nav-link" href="mybusinessprofile.php">My Profile</a>';
       ?>

     <?php endif; ?></li>
     <li class="nav-item">
       <?php if (isset($_SESSION['business_id'])):
         echo '<a class="nav-link" href="logout.inc.php">Logout</a>';
         else : echo '<a class="nav-link" href="login.php">Login</a>';

          ?>

       <?php endif; ?>

     </li>

   </ul>
 </div>
</nav>
    <?php if (!isset($_SESSION['business_id'])):echo "<h2>You are not logged in! <a href='login.php'>Login here</a> Or <a href='../index.php'> Go to the main page</a></h2>";
    else :
      echo "You are logged in as ".$_SESSION['business_name'];

    ?>

    <?php endif; ?>
    <div class="customize-profile" align="center">
      <?php if (isset($_SESSION['business_id'])):
        echo '<a href="business_editprofile.php"> <button class="customize-profile-btn btn" type="button" name="button">Customize your business profile</button>  </a>'; ?>

      <?php endif; ?>

    </div>
    <style media="screen">
    .customize-profile-btn{background:#E86100; color:white;}

      .bg-dark{background-color:#E86100!important;}

    </style>
  </body>
</html>
