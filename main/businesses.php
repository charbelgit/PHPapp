
<?php
session_start();
require '../business/business_account/dbh.inc.php';
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
    <title>Businesses</title>
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
              <a class="navbar-brand" style="color:black;" href="../index.php"><img  src="../images/logo.png" alt="" width="125" height="25"/></a>
            </div>
            <div class="collapse navbar-collapse" id="myNavbar">
              <ul class="nav navbar-nav">

            <li><a  href="../index.php"><span class="glyphicon glyphicon-home"></span> Home</a></li>
            <?php
                if(isset($_SESSION['user_id']))
                echo '<li><a class="active" href="../main/news.php"><i class="glyphicon glyphicon-bullhorn"></i> Feed</a></li>';
             ?>
            <li><a  href="../articles/articles.php"><i class="far fa-newspaper"></i> Articles</a></li>
            <li><a  href="mealplans/mealplans.html"><span class="glyphicon glyphicon-cutlery"></span> Meal Plans</a></li>
            <li><a href="../workoutplans/workoutplans.php"><i class="fas fa-dumbbell"></i> Workout Plans</a></li>
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
        <div class="fixed-top">
          <form class="" action="search_business.php" method="post">
            <textarea id="text-message" style="height:40px; resize:none;" name="search_business" type="text" class="form-control" placeholder="Search Professionals, Disciplines and others" aria-label="Search" aria-describedby="button-addon2"></textarea>
            <div class="input-group-append">
              <button class="btn btn-outline-secondary" name="submit-business" type="submit" id="button-addon2" style="background:#E86100; color:white;"><i class="fas fa-search"></i></button>
            </div>
          </form>
        </div>
        <div class="header" align="center">
            <h3>Search through Businesses</h3>
        </div>
    <?php

    $query="SELECT * FROM business_account";

    $result=$conn->query($query) ;
      if ($result !== FALSE) {
          if ($result->num_rows > 0) {
              while($row = $result->fetch_assoc()) {

                echo

    '<div class="container" align="center">
    <div class="row intro-child" data-aos="fade" style="opacity: 1;">
                  <div class="col-md-12">
                    <div class="job-post-item bg-white p-4 d-block d-md-flex align-items-center">

                       <div class="mb-4 mb-md-0 mr-5">
                        <div class="job-post-item-header d-flex align-items-center">
                          <div class="badge-wrap">
                           <span><a title="View Profile" href="../business/business_account/viewbusinessprofile.php?id='.$row['business_id'].'" >'.$row["business_name"]. ' <img style="border-radius:50%; width:35px; height:35px;" class="profilepic" src="../business/business_account/business_logos/'.$row["logo_path"].'"  ></a></span><br><br>

                          </div>
                        </div>
                        <br>
                        <div class="job-post-item-body d-block d-md-flex">
                          <div class="mr-3">Experience: '.$row["years"].'years'.'</a>'.'  <br><span class="fl-bigmug-line-portfolio23" align="right">About:' .$row['about'].'</span><br><span class="fl-bigmug-line-portfolio23" align="right">Main Services:' .$row['main_services'].'</span><br><span class="fl-bigmug-line-portfolio23" align="right">Website: <a href="'.$row['business_website'].'">' .$row['business_website'].'</span><div><a title="Send a request" href="mailto:'.$row['business_email'].'">'.$row['business_email'].'</a></div> <a href="#"> </a></div>
                          <div><!--<span class="fl-bigmug-line-big104"></span>--> <span>Country:'.$row["business_country"].'<br> Location: '.$row['business_address'].'</span></div>

                        </div>
                       </div>
                    </div>
                  </div>
                 </div></div><br><br><br><hr>'

                 ;}


              }}
?>
<style media="screen">
  .navbar-inverse .navbar-nav>li>a{color:white;}
</style>
<style media="screen">
  .intro-child{display:inline-block;}
  form {
    /* This bit sets up the horizontal layout */
    display:flex;
    flex-direction:row;

    /* This bit draws the box around it */

    /* I've used padding so you can see the edges of the elements. */
    padding:2px;
  }

  input {
    /* Tell the input to use all the available space */
    flex-grow:2;
    /* And hide the input's outline, so the form looks like the outline */
    border:none;
  }

  input:focus {
    /* removing the input focus blue box. Put this on the form if you like. */
    outline: none;
  }

  button {
    /* Just a little styling to make it pretty */
    border:1px solid blue;


    color:white;
  }
</style>
  </body>
</html>
