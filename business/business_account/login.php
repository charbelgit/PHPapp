<?php
session_start();
 ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">


    <link rel="icon" type="images/image/png" href="../../images/icon logo.png">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
    <title>Business Login </title>



    <!-- Bootstrap core CSS -->



    <style>
      .bd-placeholder-img {
        font-size: 1.125rem;
        text-anchor: middle;
        -webkit-user-select: none;
        -moz-user-select: none;
        -ms-user-select: none;
        user-select: none;
      }

      @media (min-width: 768px) {
        .bd-placeholder-img-lg {
          font-size: 3.5rem;
        }
      }
    </style>
    <!-- Custom styles for this template -->

  </head>
  <body class="text-center">
    <nav class="navbar navbar-expand-md bg-dark navbar-dark">
 <a class="navbar-brand" href="../index.php"><img src="../../images/logo.png" height="30px"  ></a>
 <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#collapsibleNavbar">
   <span class="navbar-toggler-icon"></span>
 </button>
 <div class="collapse navbar-collapse" id="collapsibleNavbar">
   <ul class="navbar-nav">
     <li class="nav-item">
       <a class="nav-link" href="../index.php">Home</a>
     </li>
     <li class="nav-item">
       <a class="nav-link" href="index.php">Pricing</a>
     </li>
     <li class="nav-item">
       <a class="nav-link" href="login.php">Login</a>
     </li>
   </ul>
 </div>
</nav>
<div class="container" style="margin-top:50px; max-width:850px;">

    <form class="form-signin " action="login.inc.php" method="post">
  <img class="mb-4" src="../../images/logo.png" alt="" width="260" height="70">
  <h1 class="h3 mb-3 font-weight-normal">Please sign in</h1>
  <label for="inputEmail" class="sr-only">Email address</label>
  <input type="email" id="inputEmail" class="form-control" name="email" placeholder="Email address" required="" autofocus=""> <br>
  <label for="inputPassword" class="sr-only">Password</label>
  <input type="password" id="inputPassword" class="form-control" name="password" placeholder="Password" required="">
  <div class="checkbox mb-3">
    <label>
      <input type="checkbox" id="showPassword" onclick="myFunction()" >Show Password <br>
    </label><br>
    <label>
      <input type="checkbox" value="remember-me" id="rememberMe"> Remember me
  </label>
  </div>
  <input name="submit" class="btn btn-lg btn-primary btn-block" type="submit" onclick="lsRememberMe()">Sign in</button>

</form>
</div>
<style media="screen">
  .bg-dark{background-color:#E86100!important;}
</style>
<script type="text/javascript">
function myFunction() {
var x = document.getElementById("inputPassword");
if (x.type === "password") {
  x.type = "text";
} else {
  x.type = "password";
}
}
</script>

<script type="text/javascript">
var rmCheck = document.getElementById("rememberMe"),
emailInput = document.getElementById("inputEmail");
var passwordInput= document.getElementById("inputPassword");

if (localStorage.businesscheckbox && localStorage.businesscheckbox != "") {
rmCheck.setAttribute("checked", "checked");
emailInput.value = localStorage.businessusername;
passwordInput.value = localStorage.businesspassword;
} else {
rmCheck.removeAttribute("checked");
emailInput.value = "";
passwordInput.value="";
}

function lsRememberMe() {
if (rmCheck.checked && emailInput.value != "") {
  localStorage.businessusername = emailInput.value;
  localStorage.businesspassword = passwordInput.value;
  localStorage.businesscheckbox = rmCheck.value;
} else {
  localStorage.businessusername = "";
  localStorage.businesspassword="";
  localStorage.businesscheckbox = "";
}
}
</script>
</body>
</html>
