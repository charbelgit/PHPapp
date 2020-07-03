<?php
session_start();
include("../database/db_connection.php");
$id=$_SESSION["user_id"];
$query="SELECT * FROM user_profile as u INNER JOIN user as us on u.id=us.id WHERE u.id=".$id;
$result = $conn->query($query);
if ($result->num_rows > 0) {
  $row = $result->fetch_assoc();
}
 ?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">


    	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.3/css/all.css" integrity="sha384-UHRtZLI+pbxtHCWp1t77Bi1L4ZtiqrqD80Kn4Z8NTSRyMA2Fd33n5dQ8lWUE00s/" crossorigin="anonymous">

      <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>


    <link href="https://fonts.googleapis.com/css?family=Lato&display=swap" rel="stylesheet">
    <title>Create a workout plan</title>
  </head>
  <header>
    <a href="../main/news.php"><i class="fas fa-arrow-left"></i> Go Back to Homepage</a>
  </header>
  <body>
    <div class="welcome_message">
    <h1 class="first_message"> Welcome <?php echo  $row["first_name"];?> </h1>
    <p> Let's create a workout plan!</p>
    <br>
    <br>
    <div class="important_message">
    <p>  Please note that the information you fill below will benefit someone who needs it, give it your best!</p> <br> <br>
  </div></div>
    <div class="workout_content">
      <form class="horizontal-form" action="submit_workout.php" method="post">
        <div class="form-grp">
          <label for="title_workout" class="labels">Title:</label>
          <div class="input_form">
            <input class="form-control" class="fill_in" type="text" name="title_workout" value="" id="title_workout" placeholder="i.e. The Warrior Plan..." required>
          </div></div> <br> <br>
          <div class="form-grp">


            <label class="labels">Sub: </label>
          <div class="input_form">
          <input class="form-control" type="text" name="subheader" value="" class="fill_in" placeholder="Insert a few motivating words" required>
        </div> </div> <br> <br>
        <div class="form-grp">
          <label class="labels">Duration: </label>
          <div class="input_form">
            <input class="form-control" type="text" name="duration_workout" value="" class="fill_in" placeholder="Insert ideal duration in weeks">
          </div>
        </div><br><br>
        <div class="form-grp">
          <label class="labels">Fix Your Price: </label>
          <div class="input_form">
            <input  class="form-control" type="text" name="price_workout" value="" class="fill_in" placeholder="Insert your price">
          </div>
        </div><br><br>
        <h3 align="center">The Workout Plan </h3>
        <div class="workout-plan-day" align="center">
          <textarea class="form-control" name="workout_text" rows="8" cols="80" placeholder="Enter your workout plan here. Remember, put yourself in the other person's shoes!
          Let it be very detailed and be motivating!"></textarea><br><br>
          <div class="submit-plan" align="right">

<input class="submit-plan-btn btn btn-primary" type="submit" name="submit" value="Done!" title="Post when done">
</form>
    </div>
  </body>
  <script type="text/javascript" src="save.js">

  </script>
  <style media="screen">
    .workout_content, .welcome_message{text-align:center;}
    .first_message{display: inline-block; color:#E86100;}
    body{font-family: 'Lato', sans-serif;}
    .form-grp{width:75%; display: inline-block; text-align: right;}
    body{margin: 0 auto;
    max-width: 800px;
  padding:5px;}
    .input_form{display:inline-block; width:75%;}
    .labels{width:75%; text-align: right; font-size: 15px;}
    .fill_in{width:100%;}
    .number{width:100%;}
    .workout_options{ display: inline-block;}
    .container{text-align: left;}
  
    .workout-plan-day{text-align: center; height:800px; width:95%;}
    textarea{height:90%; width:80%; display:inline-block;}
    header{text-align: left;}
    button{border-style: none;}
    .submit-plan-btn{display:inline-block; border-style: none;}
    .workout-plan-btn{display:inline-block;}
    textarea{height:90%!important; width:80%; display:inline-block;}
    label{display:inline-flex!important;}
    .form-grp{display:block!important;}
    .btn-primary{background:#E86100;}
    .btn-primary:hover{background:#E68100;}
  </style>
</html>
