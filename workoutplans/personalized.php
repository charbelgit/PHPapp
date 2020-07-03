<?php
session_start();


 ?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" type="../images/image/png" href="../images/icon logo.png"/>

    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.3/css/all.css" integrity="sha384-UHRtZLI+pbxtHCWp1t77Bi1L4ZtiqrqD80Kn4Z8NTSRyMA2Fd33n5dQ8lWUE00s/" crossorigin="anonymous">
		<link href="https://fonts.googleapis.com/css?family=Lato&display=swap" rel="stylesheet">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
  	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
  <!--  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.3/css/bootstrap.min.css">-->
    <title>Personalized Meal Plans</title>
  </head>
  <body>
    <nav class="topnav navbar navbar-inverse" style="border-color: #E86100; background-color:#E86100;">
          <div class="container-fluid">
            <div class="navbar-header">
              <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
              </button>
              <a class="navbar-brand" style="color:black;" href="../index.php"><img  src="../images/logo.png" alt=" " width="125" height="25"/></a>
            </div>
            <div class="collapse navbar-collapse" id="myNavbar">
              <ul class="nav navbar-nav">

            <li><a  href="../index.php"><span class="glyphicon glyphicon-home"></span> Home</a></li>
            <?php
                if(isset($_SESSION['user_id']))
                echo '<li><a href="../main/news.php"><i class="glyphicon glyphicon-bullhorn"></i> Feed</a></li>';
             ?>
            <li><a  href="../articles/articles.php"><i class="far fa-newspaper"></i> Articles</a></li>
            <li><a   href="mealplans/mealplans.html"><span class="glyphicon glyphicon-cutlery"></span> Meal Plans</a></li>
            <li><a class="active" href="../workoutplans/workoutplans.php"><i class="fas fa-dumbbell"></i> Workout Plans</a></li>
            <li><a href="#"><i class="glyphicon glyphicon-map-marker"></i> Gyms Around Me </a></li>
            <!--
               if(isset($_SESSION["user_id"]) && isset($_SESSION["profile_type"]) && $_SESSION["profile_type"]==0)
                   echo '<li><a href="memberships/memberships.php"><i class="fas fa-tags"></i> Memberships</a></li>';
           -->
            <li><a href="../contact_us/contact_us.php"><span class="glyphicon glyphicon-earphone"></span> Contact Us</a></li>
            <li><a href="../about_us/about_us.php"><i class="far fa-address-card"></i> About Us</a></li>
              </ul>
              <ul class="nav navbar-nav navbar-right">
                <li><?php
            if(isset($_SESSION["user_id"])) {
              echo '<a  href="../profile/profile.php"><i class="fa fa-fw fa-user"></i> My Profile</a>';}
              else echo '<a  href="#starthere" ><span  class="fa fa-fw fa-user"></span> Sign Up</a>' ?></li>
                <li><?php
            if(!isset($_SESSION["user_id"])) {
              echo '<a href="../login/login_form.html"><i class="fas fa-sign-in-alt"></i>Login</a>';}
              else echo '<a href="../logout/logout.php"><span class="glyphicon glyphicon-off"></span> Logout</a>';
            ?></li>
              </ul>
            </div>
          </div>
        </nav>
        <style>
        	.navbar-inverse .navbar-nav>li>a {
            color: white;
            }
            .active{  background-color: #ff8247;}
            .topnav{  font-size: 17px;}
             </style>

<div class="intro" align="center">
  <?php $i=0; ?>
  <h2>Our Trainers & Nutritionists(<?php echo $i; ?>) </h2> <br><br><br>
<?php
include("../database/db_connection.php");
$useridrow='';
if(isset($row['user_id'])){$row['user_id']==$useridrow;}

$userid="";
if(isset($_SESSION['user_id'])){$_SESSION['user_id']==$userid;}
$query="SELECT * FROM user_profile INNER JOIN user on user_profile.id=user.id WHERE profile_type=0";

$result=$conn->query($query) ;
  if ($result !== FALSE) {
      if ($result->num_rows > 0) {
          while($row = $result->fetch_assoc()) {

            echo
'<div class="row intro-child" data-aos="fade" style="opacity: 1;">
              <div class="col-md-12">
                <div class="job-post-item bg-white p-4 d-block d-md-flex align-items-center">

                   <div class="mb-4 mb-md-0 mr-5">
                    <div class="job-post-item-header d-flex align-items-center">
                      <div class="badge-wrap">
                       <span><a title="View Profile" href=../profile/viewprofile.php?id='.$row['id'].'>'.$row["username"]. ' <img style="border-radius:50%; width:35px; height:35px;" class="profilepic" src=../profile/'.$row["image_path"].'  ></a></span>
                       <a href="sendmessage.php" title="Contact"> <span class="fas fa-inbox"> </span></a>
                      </div>
                    </div>
                    <br>
                    <div class="job-post-item-body d-block d-md-flex">
                      <div class="mr-3">'.$row["experience"].'years'.'</a>'.'  <span class="fl-bigmug-line-portfolio23" align="right" style="background-color:#E86100; opacity:0.85;">' .$row['description'].'</span><div><a title="Send a request" href="mailto:'.$row['email'].'?subject= %20Workout%20Plan%20Request&body=Hello%20'.$row['username'].',%0AThis%20is%20'.$_SESSION['username'].'%20from%20 ,%20I%20want%20a%20personalized%20workout%20plan.&cc=info@ world.com">'.$row['email'].'</a></div> <a href="#"> </a></div>
                      <div><!--<span class="fl-bigmug-line-big104"></span>--> <span>'.$row["country"].'</span></div>

                    </div>
                   </div>
                </div>
              </div>
             </div><br><br><br><hr>'

             ;}


          }}




 ?>



</div>
<style media="screen">
  .intro-child{display:inline-block;}

</style>
  </body>
</html>
