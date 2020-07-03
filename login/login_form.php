<?php
if (isset($_COOKIE['email'])) {
  $cookieEmail=$_COOKIE['email'];
}else {
  $cookieEmail='';
}
 ?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <link rel="stylesheet" type="text/css" href="login_form.css">
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
    <link rel="icon" type="images/image/png" href="../images/icon logo.png"/>
    <title>Login</title>
  </head>
  <body>
    <main style="margin-top:25px;">


    <form action="sign_in.php" class="center center_form" method="post">
      <div class="login_container" >
  <div class="imgcontainer center">
    <img src="../images/logo.png" alt="" width="100%" height="24%" >
  </div>

  <div class="container center">
    <label for="login_username"><b>Username</b></label>
    <input  class="form-control"   type="text" placeholder="Enter Username" name="login_username" value="<?php echo $_COOKIE['email'] ?>" required >
<br>
    <label for="login_password"><b>Password</b></label>
    <input class="form-control"    type="password" placeholder="Enter Password" name="login_password" id="input" required>
    <br>
    <input type="checkbox" onclick="myFunction()" >Show Password <br>

    <button type="submit" class="login_ btn" style="background:#e86100;">Login</button>
    <label>
      <input type="checkbox" checked="checked" name="remember" > Remember me
    </label>
  </div>

</form>
<div class="container center">
  <form style="padding-bottom: 35px; "action="../index.php">
    <button type="button submit" class="cancelbtn">Cancel</button>
    <span class="psw"><a href="#reset password">Forgot password?</a></span>
  </form>
</div>
</div>
<div class="signup" align="center">
  <h2 style="display:inline-block;">Don't have an account? <br> <a href="../index.php">Sign up</a></h2>

</div>
<script type="text/javascript">
function myFunction() {
var x = document.getElementById("input");
if (x.type === "password") {
  x.type = "text";
} else {
  x.type = "password";
}
}
</script>
</main>
  </body>
</html>
