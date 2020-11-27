<!DOCTYPE HTML>
<?php
session_start();
?>

<html>
	<head>
		<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.3/css/all.css" integrity="sha384-UHRtZLI+pbxtHCWp1t77Bi1L4ZtiqrqD80Kn4Z8NTSRyMA2Fd33n5dQ8lWUE00s/" crossorigin="anonymous">
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
		  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
		  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
		<title>About us ... and You</title>
		<meta charset="utf-8" />
		<link rel="icon" type="images/image/png" href="../images/icon logo.png"/>
		<link rel="stylesheet" type="text/css" href="../style/style.css"/>
		<meta name="viewport" content="width=device-width, initial-scale=1" />
		<link rel="stylesheet" href="assets/css/main.css" />
		<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
	</head>
	<style>
		.navbar-inverse .navbar-nav>li>a {
			color: white;
	}
	</style>
	<body style="font-family: verdana,georgia;" class="subpage">

	<!--	<header class="main-header">
			<img  src="../images/logo.png" alt="HEYKEL" width="250" height="55"/>

	</header>-->

		<!--<div class="topnav">
		<a href="../index.php">Home</a>

		<a href="articles page.php">Articles</a>
		<a href="#MEalplans">Meal Plans</a>
		<a href="#workoutplans">Workout Plans</a>
		<?php
      	if(isset($_SESSION["user_id"]) && isset($_SESSION["profile_type"]) && $_SESSION["profile_type"]==0)
        	echo '<a href="../memberships/memberships.php">Memberships</a>';
      	?>
		<a href="../contact_us/contact_us.php">Contact Us</a>
		<a class="active" href="about_us.php">About Us</a>
		<div class="topnav-right" id="login">
		<?php
		  	if(isset($_SESSION["user_id"])) {
				echo '<a href="../profile/profile.php"><i class="fa fa-fw fa-user"></i> My Profile</a>';}
			if(!isset($_SESSION["user_id"])) {
			echo '<a href="../login/login_form.html">Login</a>';}
			else echo '<a href="../logout/logout.php">Logout</a>';
		?>

	</div>

</div>-->

<nav class="topnav navbar navbar-inverse" style="border-color: #E86100;">
      <div class="container-fluid">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="navbar-brand" style="color:black;" href="../index.php"><img  src="../images/logo.png" alt="HEYKEL" width="125" height="25"/></a>
        </div>
        <div class="collapse navbar-collapse" id="myNavbar">
          <ul class="nav navbar-nav">

        <li><a href="../index.php"><span class="glyphicon glyphicon-home"></span> Home</a></li>
				<?php
						if(isset($_SESSION['user_id']))
						echo '<li><a href="../main/news.php"><i class="glyphicon glyphicon-bullhorn"></i> Feed</a></li>';
				 ?>
        <li><a  href="../articles/articles.php"><i class="far fa-newspaper"></i> Articles</a></li>
        <li><a href="../mealplans/mealplans.php"><span class="glyphicon glyphicon-cutlery"></span> Meal Plans</a></li>
        <li><a href="../workoutplans/workoutplans.php"><i class="fas fa-dumbbell"></i> Workout Plans</a></li>
				<!--
					 if(isset($_SESSION["user_id"]) && isset($_SESSION["profile_type"]) && $_SESSION["profile_type"]==0)
							 echo '<li><a href="memberships/memberships.php"><i class="fas fa-tags"></i> Memberships</a></li>';
			 -->  
        <li><a href="../contact_us/contact_us.php"><span class="glyphicon glyphicon-earphone"></span> Contact Us</a></li>
        <li><a class="active" href="about_us.php"><i class="far fa-address-card"></i> About Us</a></li>
          </ul>
          <ul class="nav navbar-nav navbar-right">
            <li><?php
        if(isset($_SESSION["user_id"])) {
          echo '<a href="../profile/profile.php"><i class="fa fa-fw fa-user"></i> My Profile</a>';}?></li>
            <li><?php
        if(!isset($_SESSION["user_id"])) {
          echo '<a href="../login/login_form.html"><i class="fas fa-sign-in-alt"></i>Login</a>';}
          else echo '<a href="../logout/logout.php"><span class="glyphicon glyphicon-off"></span> Logout</a>';
        ?></li>
          </ul>
        </div>
      </div>
    </nav>

		<!-- Main -->
			<section id="main" class="wrapper">
				<div class="inner">
					<header class="align-center">
						<h1>About us ... and You</h1>
						<p>Your challenges are our challenges. </p>
					</header>
					<div class="image fit">
						<img src="aboutus.png"  />
					</div>
					<p>Health and fitness pursuit is very challenging to stick to in our transformative and accelerating world.</p>
					<p> Many times your goals can seem impossible to reach and you may lose motivation to pursue them.</p>
					<p></p>
				</div>
			</section>

		<!-- Footer -->
			<footer id="footer">
				<div class="inner">
					<h2>Get In Touch</h2>
					<ul class="actions">
						<li><span class="icon fa-phone"></span> <a href="#"></a></li>
						<li><span class="icon fa-envelope"></span> <a href="#">info@website.com</a></li>
						<li><span class="icon fa-map-marker"></span> WorldWideWeb</li>
					</ul>
				</div>
				<div class="copyright">
				Copyright (c) 2019 Copyright Holder All Rights Reserved..
				</div>
			</footer>

		<!-- Scripts -->
			<script src="assets/js/jquery.min.js"></script>
			<script src="assets/js/jquery.scrolly.min.js"></script>
			<script src="assets/js/skel.min.js"></script>
			<script src="assets/js/util.js"></script>
			<script src="assets/js/main.js"></script>

	</body>
</html>
