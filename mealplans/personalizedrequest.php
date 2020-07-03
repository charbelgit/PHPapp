<?php
session_start();
include('../database/db_connection.php');
$query= 'SELECT * from user as p INNER JOIN user_profile as pt on p.id=pt.id where pt.id='.$_SESSION['user_id'];
$result=$conn->query($query);
$row = $result->fetch_assoc();



 ?>

 <!DOCTYPE html>
 <html lang="en" dir="ltr">
   <head>
     <meta charset="utf-8">
     <meta name="viewport" content="width=device-width, initial-scale=1.0 user-scalable=no">
     <link rel="icon" type="../images/image/png" href="../images/icon logo.png"/>
     <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
     <script src="http://code.jquery.com/jquery-3.4.1.min.js" integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo=" crossorigin="anonymous"></script>

     <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

     <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
     <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
     <title>Personalized Request</title>
   </head>
  <script type="text/javascript">
  $(document).ready(function(){
  $(function () {

    $('form').on('submit', function (e) {

      e.preventDefault();


      $.ajax({
        type: 'post',
        url: 'submitrequest.php',
        data: $('form').serialize(),
        success: function () {
          alert('You just submitted your request you will receive proposals soon!')

      ;  }
      });

    });

  });
});
  </script>
   <body >
     <nav class="navbar navbar-light bg-light" >
  <a class="navbar-brand" href="../index.php">
    <img src="../images/logo.png" width="170" height="40" class="d-inline-block align-top" alt="">

  </a>
</nav>
<main style="max-width:850px; ">

     <div class="welcome" align="center" style="margin-top:60px;">
       <h2 style="color:#E86100;">
          You are about to create a request! Fill in this form and let's get things done!


       </h2><br>
       <div class="alert alert-warning alert-dismissible fade show" role="alert">
  <strong>Hello <?php echo $row['username']; ?>!</strong> The information you will fill below will be sent to professionals that fit with your goals. Once submitted, you will start receiving suggestions, you pick what's best for you!
  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
    <span aria-hidden="true">&times;</span>
  </button>
</div>

     </div>
     <form action="submitrequest.php" method="post">
  <div class="form-group">
    <label for="exampleInputEmail1">Name</label>
    <input type="text" name="name" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter email" value="<?php echo $row['username']; ?>">

  </div>
  <div class="form-group">
    <label for="exampleInputEmail1">Age</label>
    <input type="number" name="age" class="form-control" id="" aria-describedby="emailHelp" placeholder="Enter age">
    <small id="emailHelp" class="form-text text-muted">We ask for this information to let you get the best proposal!</small>
  </div>
  <div class="form-group">
    <label for="exampleInputEmail1">Height</label>
    <input type="number" name="Height" class="form-control" id="Height" aria-describedby="emailHelp" placeholder="Enter height">
    <small id="emailHelp" class="form-text text-muted">We ask for this information to let you get the best proposal!</small>
  </div>
  <div class="form-group">
    <label for="exampleInputEmail1">Weight</label>
    <input type="number" name="Weight" class="form-control" id="Weight" aria-describedby="emailHelp" placeholder="Enter weight">
    <small id="emailHelp" class="form-text text-muted">We ask for this information to let you get the best proposal!</small>
  </div>
  <label for="">Price Range</label>
  <div class="input-group mb-3 form-group">

  <div class="input-group-prepend ">

    <span class="input-group-text">$</span>
    <span class="input-group-text">25.00 - </span>
  </div>

  <input type="text" name="price" class="form-control" aria-label="Dollar amount (with dot and two decimal places)" placeholder="e.g. $25.00-$50.00">

</div>
<small id="emailHelp" class="form-text text-muted">Plan requests start at 25.00 USD </small><br>

  <div class="form-group">
    <label for="exampleInputEmail1">Goals</label>
    <textarea name="goals" class="form-control" rows="8" cols="80"></textarea>
    <small  id="emailHelp" class="form-text text-muted">Describe what you would like to acheive</small>
  </div>
  <div class="form-group">
    <label for="exampleInputEmail1">Expectations</label>
    <textarea name="expectations" class="form-control" rows="8" cols="80"></textarea>
    <small id="emailHelp" class="form-text text-muted">Tell us what you are expecting</small>
  </div>
  <small id="submission"></small>
  <button type="submit" class="btn btn-primary">Submit</button><br><br>

</form>
</main>
<style media="screen">
.bg-light {
  background-color: #E86100!important;
}
.text-muted{color:#E86100!important;}
main{margin:0 auto;
padding:2.5px;}

</style>
   </body>
 </html>
