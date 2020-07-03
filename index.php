
<!DOCTYPE html>
<?php
session_start();
if(isset($_SESSION['user_id'])){
	header('Location: main/news.php');

}
?>
<html ⚡ lang="en">
	<head>
		<meta charset="utf-8">
		<script async custom-element="amp-carousel" src="https://cdn.ampproject.org/v0/amp-carousel-0.1.js"></script>
		<script async custom-element="amp-youtube" src="https://cdn.ampproject.org/v0/amp-youtube-0.1.js"></script>
		<script async custom-element="amp-social-share" src="https://cdn.ampproject.org/v0/amp-social-share-0.1.js"></script>

		<script async custom-template="amp-mustache" src="https://cdn.ampproject.org/v0/amp-mustache-0.2.js"></script>
		<script async custom-element="amp-selector" src="https://cdn.ampproject.org/v0/amp-selector-0.1.js"></script>
		<script async custom-element="amp-lightbox-gallery" src="https://cdn.ampproject.org/v0/amp-lightbox-gallery-0.1.js"></script>
	<!--	<script async custom-element="amp-sidebar" src="https://cdn.ampproject.org/v0/amp-sidebar-0.1.js"></script>-->


		<style amp-custom media="screen">

		amp-selector amp-img[option] {
			opacity: 0.4;
		}

		/* normal opacity for the selected thumbnail */
		amp-selector amp-img[option][selected] {
			opacity: 1;
		}

		.thumbnail-carousel {
			margin-top: .5rem;}

		amp-youtube {
			margin-top: 40px;
		}

		.headerbar {
	align-items: center;
	background-color: #fff;
	box-shadow: 0 0 5px 2px rgba(0,0,0,.1);
	display: flex;
	left: 0;
	padding-left: 1rem;
	position: fixed;
	right: 0;
	top: 0;
	z-index: 999;
}

.btn-subscribe {
	background-color: #000;
	border: 1px solid #fff;
	color: #fff;
	cursor: pointer;
	font-family: inherit;
	font-size: 1rem;
	font-weight: inherit;
	left: calc(50% - (150px / 2));
	letter-spacing: .2em;
	line-height: 1.125rem;
	padding: .7em .8em;
	position: relative;
	text-decoration: none;
	text-transform: uppercase;
	vertical-align: middle;
	white-space: nowrap;
	width: 150px;
	word-wrap: normal;
}


.headerbar+:not(amp-sidebar),.headerbar+amp-sidebar+* {
	margin-top: 3.5rem;
}
.subscribe-card-container {
	display: flex;
	justify-content: center;
	margin-top: 20px;
}

.subscribe-card {
	box-shadow: 0 3px 6px rgba(0,0,0,0.16), 0 3px 6px rgba(0,0,0,0.23);
	width: 300px;
}
.main-form {
	-ms-flex-direction: column;
	-webkit-box-direction: normal;
	-webkit-box-orient: vertical;
	flex-direction: column;
	margin-top: 10px;
	padding: 1rem;
}

.form-input-container {
	-ms-flex-pack: center;
	-webkit-box-pack: center;
	display: -ms-flexbox;
	display: -webkit-box;
	display: flex;
	justify-content: center;
}

input {
	font-family: sans-serif;
	font-size: 100%;
}
.subscribe-card{
	background-color: white;
}
.input {
	left: calc(50% - (230px / 2));
	margin-bottom: 1.5rem;
	max-width: 100%;
	position: relative;
	width: 230px;
}

.input>input {
	background: none;
	border: 0;
	border-bottom: 1px solid #4a4a4a;
	border-radius: 0;
	color: #4a4a4a;
	line-height: 1.5rem;
	margin-top: 1rem;
	outline: 0;
	width: 100%;
}

.input>label {
	bottom: 0;
	left: 0;
	line-height: 1rem;
	position: absolute;
	right: 0;
	text-align: left;
	top: 0;
}

.label {
	font-size: .875rem;
	letter-spacing: .06rem;
	line-height: 1.125rem;
	list-style: none;
	padding: 0;
	text-transform: uppercase;
}


.form-submit-response {
	margin-bottom: 1rem;
	margin-top: 1rem;
}

		</style>
		<link rel="canonical" href="index.php">
	<style amp-boilerplate>body{-webkit-animation:-amp-start 8s steps(1,end) 0s 1 normal both;-moz-animation:-amp-start 8s steps(1,end) 0s 1 normal both;-ms-animation:-amp-start 8s steps(1,end) 0s 1 normal both;animation:-amp-start 8s steps(1,end) 0s 1 normal both}@-webkit-keyframes -amp-start{from{visibility:hidden}to{visibility:visible}}@-moz-keyframes -amp-start{from{visibility:hidden}to{visibility:visible}}@-ms-keyframes -amp-start{from{visibility:hidden}to{visibility:visible}}@-o-keyframes -amp-start{from{visibility:hidden}to{visibility:visible}}@keyframes -amp-start{from{visibility:hidden}to{visibility:visible}}</style> <noscript> <style amp-boilerplate>body{-webkit-animation:none;-moz-animation:none;-ms-animation:none;animation:none} </style> </noscript>
		<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.3/css/all.css" integrity="sha384-UHRtZLI+pbxtHCWp1t77Bi1L4ZtiqrqD80Kn4Z8NTSRyMA2Fd33n5dQ8lWUE00s/" crossorigin="anonymous">
		<link href="https://fonts.googleapis.com/css?family=Lato&display=swap" rel="stylesheet">
		<script async src="https://cdn.ampproject.org/v0.js"></script>
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>

		<style media="screen">
			.subheader {
        font-size: 1.6rem;
        font-weight: 400;
        letter-spacing: .06rem;
        line-height: 2.5rem;
        margin-top: 2.7rem;
        outline: none;
        padding-top: 1rem;
      }
		</style>
    	<style media="screen">
		/* Pre Loader */
		.loader{
			position:fixed;
			z-index:99;
			top: 0;
			left: 0;
			width: 100%;
			height:100%;
			background:#e86100;
			display:flex;
			justify-content:center;
			align-items:center;



		}
		.loader>img {
			width: 300px;

		}
		.loader.hidden{
			-webkit-animation: fadeOut 2s;
			animation-fill-mode: forwards;
		}
		@keyframes fadeOut {
			opacity: 0;
			visibility: hidden;

		}
/* Pre loader End*/
		</style>

		<meta name="viewport" content="width=device-width, initial-scale=1.0, minimum-scale=1 user-scalable=no">
		 <link rel="stylesheet" type="text/css" href="style/style.css"/>
		 <link rel="stylesheet" type="text/css" href="login/login_form.css"/>
		 <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
		 <script type="text/javascript" src="index.js"></script>
		 <script src="logout/logout.js"></script>
		<title>SocialNetworkExample</title>
		<meta name="description" content="Join our fitness community! Whether you are a professional, a business or looking for help in sports and fitness, SocialNetworkExample is the place for you!">

		<link rel="icon" type="images/image/png" href="images/icon logo.png"/>

	</head>

	<body>
        	<div class="loader">
			<img src="images/logo.png" alt="Loading...">
		</div>
			<!--	<img  src="images/logo.png" alt="SocialNetworkExample" width="250" height="55"/>-->



			<nav class="topnav navbar navbar-inverse" style="border-color: #E86100;">
			      <div class="container-fluid">
			        <div class="navbar-header">
			          <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar" style="width:45px;">
			            <span class="icon-bar"></span>
			            <span class="icon-bar"></span>
			            <span class="icon-bar"></span>
			          </button>
			          <a class="navbar-brand" style="color:black;" href="index.php"><img  src="images/logo.png" alt="SocialNetworkExample" width="125" height="25"/></a>
			        </div>
			        <div class="collapse navbar-collapse" id="myNavbar">
			          <ul class="nav navbar-nav">

			        <li><a class="active" href="index.php"><span class="glyphicon glyphicon-home"></span> Home</a></li>
							<?php
									if(isset($_SESSION['user_id']))
									echo '<li><a href="main/news.php"><i class="glyphicon glyphicon-bullhorn"></i> Feed</a></li>';
							 ?>
			        <li><a  href="articles/articles.php"><i class="far fa-newspaper"></i> Articles</a></li>
			        <li><a href="mealplans/mealplans.php"><span class="glyphicon glyphicon-cutlery"></span> Meal Plans</a></li>
			        <li><a href="workoutplans/workoutplans.php"><i class="fas fa-dumbbell"></i> Workout Plans</a></li>
							 <li><a href="#"><i class="glyphicon glyphicon-map-marker"></i> Gyms Around Me </a></li>
			        <!-- /* php
			            if(isset($_SESSION["user_id"]) && isset($_SESSION["profile_type"]) && $_SESSION["profile_type"]==0)
			                echo '<li><a href="memberships/memberships.php"><i class="fas fa-tags"></i> Memberships</a></li>';
			         */ -->
			        <li><a href="contact_us/contact_us.php"><span class="glyphicon glyphicon-earphone"></span> Contact Us</a></li>
			        <li><a href="about_us/about_us.php"><i class="far fa-address-card"></i> About Us</a></li>
			          </ul>
			          <ul class="nav navbar-nav navbar-right">
			            <li><?php
			        if(isset($_SESSION["user_id"])) {
			          echo '<a  href="profile/profile.php"><i class="fa fa-fw fa-user"></i> My Profile</a>';}
								else echo '<a  href="#starthere" ><span  class="fa fa-fw fa-user"></span> Sign Up</a>' ?></li>
			            <li><?php
			        if(!isset($_SESSION["user_id"])) {
			          echo '<a href="login/login_form.html"><i class="fas fa-sign-in-alt"></i>Login</a>';}
			          else echo '<a href="logout/logout.php"><span class="glyphicon glyphicon-off"></span> Logout</a>';
			        ?></li>
			          </ul>
			        </div>
			      </div>
			    </nav>


<style>
	.navbar-inverse .navbar-nav>li>a {
    color: white;




}

main {
margin: 5px auto;
max-width: 700px;
}
</style>
</header>





		<!--<div class="topnav">
	  <a class="active" href="index.php">Home</a>

    <a href="articles/articles.php">Articles</a>
		<a href="#MEalplans">Meal Plans</a>
		<a href="#workoutplans">Workout Plans</a>
	/*	<?php
    		if(isset($_SESSION["user_id"]) && isset($_SESSION["profile_type"]) && $_SESSION["profile_type"]==0)
      			echo '<a href="memberships/memberships.php">Memberships</a>';
  		?>
	  <a href="contact_us/contact_us.php">Contact Us</a>
	  <a href="about_us/about_us.php">About Us</a>
		<div class="topnav-right" id="login">
		<?php
		if(isset($_SESSION["user_id"])) {
			echo '<a href="profile/profile.php"><i class="fa fa-fw fa-user"></i> My Profile</a>';}
		if(!isset($_SESSION["user_id"])) {
			echo '<a href="login/login_form.html">Login</a>';}
			else echo '<a href="logout/logout.php">Logout</a>';
		?>*/

  </div>

	  </div>

	</div>-->
<main>


<div id="main-content">
	<div class="column">
	</div>
	<div class="column">

<h1 align="left" size="5" color="blue" style="text-align:center;"> Welcome to SocialNetworkExample, your favorite online fitness platform!  </h1>

<br> <br>
<div class="btn-groups" align="center">

<button class="starthere btn" id="starthere" style="height: 50px" onclick="document.getElementById('id01').style.display='block'"><b>SIGN UP FOR FREE!</b></button>

</div><br><br>
<div class="btn-groups" align="center">

<a href="events.php"> <button class="starthere btn" id="starthere" style="height: 50px"><b>Events near you</b></button></a>

</div><br><br>
<div class="btn-groups" align="center">  <h3>Are you a business?</h3>

<a href="business"> <button class="starthere btn" style="height: 75px"><b> Business Portal!</b></button></a>

</div><br><br>
<div class="btn-groups" align="center"><h3>You already have an account?</h3>

<a href="login/login_form.html"><button class="starthere btn"  style="height: 50px" ><b>Login</b></button></a>

</div><br><br>
	<!--<h3 id="greetings"></h3>-->
<div class="subheader" align="center">
<h3 style="display:inline-block;" >SocialNetworkExample is an online platform, connecting people to fitness, sports & wellness professionals and businesses globally! </h3> <br><br>
<!--<section> <p> <img src="images/sculpt_your_body.png" id="left image" align="left"></img></p></Section>-->

</div>

	<div class="main-content">
		<iframe width="100%" height="315" src="https://www.youtube.com/embed/g9tzNp5qhT4" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe> <br>

<!--<amp-youtube data-videoid="rFIfziIzBWg" layout="responsive" width="240" height="135"></amp-youtube>-->
		<!--	<div class="spread-video">
		<video class="center" width="50%" height="12.5%" autoplay controls>
  <source src="videos/SocialNetworkExample.mp4" type="video/mp4">

Your browser does not support the video tag.
</video>

</div>
-->

	   <p id="main">SocialNetworkExample makes it easy for you to connect the dots, and get what is needed to start your wellness journey. Whether you are a professional,
		 a business, or looking for advice, <strong> SocialNetworkExample</strong> is the best place to start!
		 <br> <br>
	   	 As a professional, you will increase your exposure, create content and make new income!
			 <br><br>
			 And if you are looking for advice, the whole community is for you! Here, we are all on the same page, we improve, thrive and shine together!

		 </p>


	<h2 style="blue"><b>Why us?</b></h2>
	 <p id="main">Fitness & sports  community is one of the healthiest and strongest communities in the world, SocialNetworkExample connects you to it by providing you with tools to keep your productivity and opportunities high!
		 <br><br>
Join <strong> SocialNetworkExample</strong> and let's make a change!</p>

	 <amp-carousel on="slideChange:ampSelector.toggle(index=event.index)" layout="responsive" type="slides" width="498.52" height="373.89" controls autoplay loop id="carousel" lightbox>
		 <amp-img src="images/image1.png" width="498.52" height="373.89" tabindex="0"></amp-img>
			 <amp-img src="images/image2.png" width="498.52" height="373.89" tabindex="1"></amp-img>
			 <amp-img src="images/image3.png" width="498.52" height="373.89" tabindex="2"></amp-img>
		 </amp-carousel>
		 	<amp-selector layout="container" name="single_image_select" id="ampSelector">
			 <amp-carousel class="thumbnail-carousel" layout="fixed-height" width="auto" height="78">
<amp-img src="images/image1.png"
on="tap:carousel.goToSlide(index=0)" width="96" height="72" layout="fixed" role="button" tabindex="0" option="0"></amp-img>
<amp-img src="images/image2.png"
on="tap:carousel.goToSlide(index=1)" width="96" height="72" layout="fixed" role="button" tabindex="1"option="1"></amp-img>
<amp-img src="images/image3.png"
on="tap:carousel.goToSlide(index=2)" width="96" height="72" layout="fixed" role="button" tabindex="2" option="2"></amp-img>
</amp-carousel>
</amp-selector>
		 <br>
		<!-- <h2 class="main-heading">Stay updated, subscribe to our Newsletter!</h2>
 		<div class="subscribe-card-container">
		<div class="subscribe-card">
		<form method="post" action-xhr="index/newsletter_submit.php" target="_top" class="main-form">
 		<div class="input">
 				<input type="texts" name="name" id="form-name" required>
 				<label for="form-name">Name:</label><br>
 		</div>
 		<div class="input">
 				<input type="email" name="email" id="form-email" required>
 				<label for="form-email">Email:</label> <br>
 		</div>
 		<input type="submit" value="Subscribe" class="btn-subscribe">
			<div submit-success>
                <template type="amp-mustache">
                    <p class="form-submit-response">
                        Success! Thanks {{name}} for subscribing!
                    </p>
                </template>
            </div>
            <div submit-error>
                <template type="amp-mustache">
                    <p class="form-submit-response">
                        Error occured. You may be registered. Please contact our customer service.
                    </p>
                </template>
            </div>
 </form>
 </div>
 </div>-->
	<br><br>
	<h3> YOU WANT TO JOIN?</h3>

	<style>
.error {color: #FF0000;}
</style>
	<?php include("validation/userValidation.php") ?>
	<div class="container2">
	<div class="btn-groups">

  <button class="starthere btn" id="starthere" style="height: 50px" onclick="document.getElementById('id01').style.display='block'"><b>SIGN UP FOR FREE!</b></button>

  </div>
</div>
<!--<div class="ORelse" style="text-align:center;">
	<p style="justify-content:inline-block;"> -OR- </p>
</div>
<div style="text-align:center;"><div class="fb-login-button" data-width="" data-size="large" data-button-type="login_with" data-auto-logout-link="false" data-use-continue-as="true" style="display:inline-block;"></div>
</div>-->





<!-- Social Share-->
<div class="social-bar" style="
		-ms-flex-pack: center;
		-webkit-box-pack: center;
		display: -ms-flexbox;
		display: -webkit-box;
		display: flex;
		justify-content: center;
		margin-bottom: 1rem;
		margin-top: 3.5rem;
	">
<amp-social-share type="email" width="44" height="44"></amp-social-share>
<amp-social-share type="linkedin" width="44" height="44"></amp-social-share>
<amp-social-share type="tumblr" width="44" height="44"></amp-social-share>
<amp-social-share type="twitter" width="44" height="44"></amp-social-share>
<amp-social-share type="facebook" width="44" height="44"></amp-social-share>
<amp-social-share type="whatsapp" width="44" height="44"></amp-social-share>
</div>

	<!-- The Modal (contains the Sign Up form) -->

	<div id="id01" class="modals">
	  <span onclick="document.getElementById('id01').style.display='none'" class="close" title="Close Modal">&times;</span>
	<!--	<div id="img-signup">
			<img src="images/sign-up.jpg" id="img-signup"  class="img-responsive" alt="SocialNetworkExample" align="left" height="1000px" style="vertical-align:middle; padding-left:333px; padding-top:130px;"</img></div>-->

	  <form class="modal-contents" action="sign_up/sign_up.php" method="post" name="signupform">
	    <div class="container1">
	      <h1>Sign Up</h1>
	      <h5>Already have an account? <a href="login/login_form.html" style="color:blue;">Login here</a></h5>
	      <p>Please fill in this form to create an account.</p>
				<p><span class="error">* required field</span></p>
				<hr>
				<span class="error">*<?php echo $nameErr;?></span
				<label for="name"><b>Name</b></label>
	      <input type="text" placeholder="Enter Name" name="name" value="<?php echo $name;?>" required >

				<span class="error">* <?php echo $emailErr;?></span>
	      <label for="email"><b>Email</b></label>
	      <input type="email" placeholder="Enter Email" name="email" value="<?php echo $email;?>"  required >
				<span id='messageEmail'></span>


				<tr>
					<span class="error">* <?php echo $genderErr;?></span>
			<td><b>Gender</b></td>

			<td><input type="radio" name="gender" <?php if (isset($gender) && $gender=="male") echo "checked";?> value="male"> Male
			<input type="radio" name="gender"  <?php if (isset($gender) && $gender=="female") echo "checked";?> value="female">  Female
			<input type="radio" name="gender"<?php if (isset($gender) && $gender=="other") echo "checked";?> value="other"> Other

			</td>
		</tr>
<br><br>
<tr>
	<span class="error">* <?php echo $genderErr;?></span>
<td><b>You are : </b></td>

<td><br><br><input type="radio" name="profile_type"  value="0"> Trainer/Nutritionist<br>
<input type="radio" name="profile_type"   value="1">  Looking for advice


</td>
</tr>
<br><br>


				<span class="error">* </span>
				<label for="psw"><b>Password</b></label>
	      <input type="password" placeholder="Enter Password" name="psw" id="psw" required>


	      <label for="psw-repeat"><b>Repeat Password</b></label>


	      <input type="password" placeholder="Repeat Password" name="psw-repeat"  onkeyup='check();' id="psw-repeat" required>

				<span id="message"></span>

	      <label>
	        <input type="checkbox" checked="checked" name="remember" style="margin-bottom:15px"> Remember me
	      </label><br>

	      <label><input type="checkbox" checked="checked" name="I accept" style="margin-bottom:15px" required>I accept <a href="#" style="color:dodgerblue">Terms & Privacy</a>.</label>

	      <div class="clearfix">
	        <button type="button" onclick="document.getElementById('id01').style.display='none'" class="cancelbtn">Cancel</button>
	        <button type="submit" class="sign_up" id="sign-up" style="" >Sign Up</button>
	      </div>
	    </div>
	  </form>
	</div>
	<!-- the modal that contains the sign up form for people that needs trainers -->
	<!-- The Modal (contains the Sign Up form) -->
	<!--<div id="id02" class="modal">
	  <span onclick="document.getElementById('id02').style.display='none'" class="close" title="Close Modal">&times;</span>
		<div id="img-signup">
			<img src="images/sign-up.jpg" id="img-signup"  class="img-responsive" alt="SocialNetworkExample" align="left" height="1000px" style="vertical-align:middle; padding-left:333px; padding-top:130px;"</img></div>
	  <form class="modal-content" action="sign_up/sign_up.php" method="post">
	    <div class="container">
	      <h1>Sign Up</h1>
	      <p>Please fill in this form to create an account.</p>
	      <hr>
	      <label for="email"><b>Email</b></label>
	      <input type="text" placeholder="Enter Email" name="email" required>

	      <label for="psw"><b>Password</b></label>
	      <input type="password" placeholder="Enter Password" name="psw" required>

	      <label for="psw-repeat"><b>Repeat Password</b></label>
	      <input type="password" placeholder="Repeat Password" name="psw-repeat" required>

	      <label>
	        <input type="checkbox" checked="checked" name="remember" style="margin-bottom:15px"> Remember me
	      </label><br>

	      <label><input type="checkbox" checked="checked" name="I accept" style="margin-bottom:15px" required>I accept <a href="#" style="color:dodgerblue">Terms & Privacy</a>.</label>



	      <div class="clearfix">
	        <button type="button" onclick="document.getElementById('id01').style.display='none'" class="cancelbtn">Cancel</button>
	        <button type="submit" class="signup">Sign Up</button>
	      </div>
	    </div>
	  </form>
	</div>-->



</div>
</div>
</div>
</section>
<div id="footer">

<p>
Copyright (c) 2019 Copyright Holder All Rights Reserved.</p>
</div>
</main>

<script type="text/javascript">
	window.addEventListener("load", function(){
		const loader = document.querySelector(".loader");
		loader.className+= "  hidden"; // hide loader
	})
</script>
	</body>
	<script>
	var check = function() {
  if (document.getElementById('psw').value ==
    document.getElementById('psw-repeat').value) {
    document.getElementById('message').style.color = 'green';
    document.getElementById('message').innerHTML = '&#x2705 Matching';
		document.getElementById('psw-repeat').style.border='3px solid #90EE90';
		document.getElementById('sign-up').disabled=false;





  } else {
    document.getElementById('message').style.color = 'red';
    document.getElementById('message').innerHTML = '&#10060 Passwords Not Matching';
		document.getElementById('psw-repeat').style.border='3px solid red';
		document.getElementById('sign-up').disabled=true;
  }
}
</script>

<style media="screen">
	button:disabled{cursor:not-allowed;}
</style>
</html>
