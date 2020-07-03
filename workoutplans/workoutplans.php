<?php
session_start();
include("../database/db_connection.php");


 ?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" type="images/image/png" href="../images/icon logo.png"/>
    <!-- ================================ STYLE ====================================== -->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.3/css/all.css" integrity="sha384-UHRtZLI+pbxtHCWp1t77Bi1L4ZtiqrqD80Kn4Z8NTSRyMA2Fd33n5dQ8lWUE00s/" crossorigin="anonymous">
		<link href="https://fonts.googleapis.com/css?family=Lato&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
  	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
    <style media="screen">
      /* for Slideshow



/////////////////////////////////////////////////////////////////////////SLIDESHOW STYLE////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
      */



      * {box-sizing:border-box}

/* Slideshow container */
.slideshow-container {
  max-width: 1000px;
  position: relative;
  margin: auto;
}

/* Hide the images by default */
.mySlides {
  display: none;
}

/* Next & previous buttons */
.prev, .next {
  cursor: pointer;
  position: absolute;
  top: 50%;
  width: auto;
  margin-top: -22px;
  padding: 16px;
  color: white;
  font-weight: bold;
  font-size: 18px;
  transition: 0.6s ease;
  border-radius: 0 3px 3px 0;
  user-select: none;
}

/* Position the "next button" to the right */
.next {
  right: 0;
  border-radius: 3px 0 0 3px;
}

/* On hover, add a black background color with a little bit see-through */
.prev:hover, .next:hover {
  background-color: rgba(0,0,0,0.8);
}

/* Caption text */
.text {
  color: #f2f2f2;
  font-size: 15px;
  padding: 8px 12px;
  position: absolute;
  bottom: 8px;
  width: 100%;
  text-align: center;
}

/* Number text (1/3 etc) */
.numbertext {
  color: #f2f2f2;
  font-size: 12px;
  padding: 8px 12px;
  position: absolute;
  top: 0;
}

/* The dots/bullets/indicators */
.dot {
  cursor: pointer;
  height: 15px;
  width: 15px;
  margin: 0 2px;
  background-color: #bbb;
  border-radius: 50%;
  display: inline-block;
  transition: background-color 0.6s ease;
}

.active, .dot:hover {
  background-color: #717171;
}

/* Fading animation */
.fade {
  -webkit-animation-name: fade;
  -webkit-animation-duration: 5.5s;
  animation-name: fade;
  animation-duration: 5.5s;
}

@-webkit-keyframes fade {
  from {opacity: .4}
  to {opacity: 1}
}

@keyframes fade {
  from {opacity: .4}
  to {opacity: 1}
}


/* ///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////// */
    </style>
    <script>
    <script>
    function search_articles(info){
     var xmlhttp = new XMLHttpRequest();
        xmlhttp.onreadystatechange = function() {
            if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
                //go to another page after paying
                if(this.responseText=="error"){
                    document.getElementById("error_message").innerHTML="Error please ocntact the support team."
                }else{
                    console.log(this.responseText);
                    document.getElementById("recentmeals").innerHTML=this.responseText;
                    //window.location.href = "../normal/main.php";
                }
            }
        };
        var type=document.getElementById("type").value;
        console.log("Type "+type);
        var author=document.getElementById("author").value;
        console.log("Author "+author);
        var keywords=document.getElementById("keywords").value;
        console.log("Keys "+keywords);
        xmlhttp.open("POST", "../articles/search_articles.php", true);
        xmlhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
        if(typeof info =="string"){
            if(info="recent")
                xmlhttp.send("type="+0+"&author="+author+"&keywords="+keywords);
        }
        else{
            xmlhttp.send("type="+type+"&author="+author+"&keywords="+keywords);
        }

    }

    function delete_workout(post_id){
      var xmlhttp = new XMLHttpRequest();
      xmlhttp.onreadystatechange = function() {
          if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
              //go to another page after paying
              if(this.responseText=="error"){
                  document.getElementById("error_message").innerHTML="Error please contact the support team."
              }else{
                location.reload();
              }
          }
      };
      xmlhttp.open("POST", "deleteworkout.php", true);
      xmlhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
      xmlhttp.send("post_id="+post_id);
    }

    </script>
    </script>
    <title>Workout plans</title>
  </head>
  <body>
    <!-- ================================================ INSERT NAVBAR =================================================================== -->
    <nav class="topnav navbar navbar-inverse" style="border-color: #E86100; background-color:#E86100;">
          <div class="container-fluid">
            <div class="navbar-header">
              <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
              </button>
              <a class="navbar-brand" style="color:black;" href="../index.php"><img  src="../images/logo.png" alt="   " width="125" height="25"/></a>
            </div>
            <div class="collapse navbar-collapse" id="myNavbar">
              <ul class="nav navbar-nav">

            <li><a  href="../index.php"><span class="glyphicon glyphicon-home"></span> Home</a></li>
            <?php
                if(isset($_SESSION['user_id']))
                echo '<li><a href="../main/news.php"><i class="glyphicon glyphicon-bullhorn"></i> Feed</a></li>';
             ?>
            <li><a  href="../articles/articles.php"><i class="far fa-newspaper"></i> Articles</a></li>
            <li><a   href="../mealplans/mealplans.php"><span class="glyphicon glyphicon-cutlery"></span> Meal Plans</a></li>
            <li><a class="active" href="workoutplans.php"><i class="fas fa-dumbbell"></i> Workout Plans</a></li>
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
             <div class="main-content-meal">
             <!-- ====================================================================    ~   SLIDESHOW   ~   ==================================================================================================================== -->
                          <!-- Slideshow container -->
             <div class="slideshow-container">

               <!-- Full-width images with number and caption text -->
               <div class="mySlides fade">
                 <div class="numbertext">1 / 3</div>
                 <img src="../images/workout1.png" style="width:100%">
                 <div class="text">Transform your lifestyle!</div>
               </div>

               <div class="mySlides fade">
                 <div class="numbertext">2 / 3</div>
                 <img src="../images/workout2.png" style="width:100%">
                 <div class="text">Customize your workouts with    !</div>
               </div>

               <div class="mySlides fade">
                 <div class="numbertext">3 / 3</div>
                 <img src="../images/workout3.png" style="width:100%">
                 <div class="text">What are you waiting for?!</div>
               </div>

               <!-- Next and previous buttons -->
               <a class="prev" onclick="plusSlides(-1)">&#10094;</a>
               <a class="next" onclick="plusSlides(1)">&#10095;</a>
             </div>
             <br>

             <!-- The dots/circles -->
             <div style="text-align:center">
               <span class="dot" onclick="currentSlide(1)"></span>
               <span class="dot" onclick="currentSlide(2)"></span>
               <span class="dot" onclick="currentSlide(3)"></span>
             </div>



             <!-- ====================================================================   ~ END SLIDESHOW ~   =================================================================================================== -->
             <script>
             // SLIDESHOW SCRIPT ~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~
             var slideIndex = 0;
             showSlides();
             //function plusSlides(n) {
             //  showSlides(slideIndex += n);
             //}

             //function currentSlide(n) {
             //  showSlides(slideIndex = n);
             //}

             function showSlides() {
               var i;
               var slides = document.getElementsByClassName("mySlides");
               var dots = document.getElementsByClassName("dot");
               for (i = 0; i < slides.length; i++) {
                 slides[i].style.display = "none";
               }
               slideIndex++;
               if (slideIndex > slides.length) {slideIndex = 1}
               for (i = 0; i < dots.length; i++) {
                 dots[i].className = dots[i].className.replace(" active", "");
               }
               slides[slideIndex-1].style.display = "block";
               dots[slideIndex-1].className += " active";
               setTimeout(showSlides, 6000); // Change image every 6 seconds
             }
             // END ~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~
             </script>

             <br><br>
             <div class="meal-plan-search">



             <div class="search-box-meals">



               <div class="input-group" align="left">
                <input type="text" class="form-control" placeholder="Search for workout plans...">
                <div class="input-group-append">
                  <button class="search-button" type="submit">
                    <i class="fa fa-search"></i>
                  </button>
                </div>
              </div>

             </div>
             <div class="personalized-meal" align="right">
               <?php
                   if(isset($_SESSION["user_id"]) && isset($_SESSION["profile_type"]) && $_SESSION["profile_type"]==0)
                   echo '<button type="button" name="button" class="personalized-button"><i class="fas fa-plus"></i> <a href="create_workout.php" style="text-decoration:none; color:white;">Create a workout plan</a></button> </div>';
                   else echo '<button type="button" name="button" class="personalized-button"><a href="personalized.php" style="color:white;"> Personalized Plan</a></button> </div>'; ?>


             </div>
             <br>
             <br>
             <div class="Mealresults" align="center">
               <h3 class="recentmeals">Recent Workout Plans:</h3>
               <?php
               $query="SELECT * FROM post as p INNER JOIN user_profile as u on p.user_id=u.id INNER JOIN post_workout as pm on p.id=pm.id ORDER BY p.date DESC";
               $userid="";
               if(isset($_SESION['user_id'])){$_SESSION['user_id']==$userid;}
               $result=$conn->query($query) ;
                 if ($result !== FALSE) {
                     if ($result->num_rows > 0) {
                         while($row = $result->fetch_assoc()) {
                           if($userid==$row["user_id"])
                             $delete_button='<button title="delete" onclick="delete_workout('.$row["id"].')">Delete Workout Plan</button>';
                             else if ($userid!==$row['user_id'])
                             $delete_button="";
                           echo
               '<div class="row" data-aos="fade" style="opacity: 1;">
                             <div class="col-md-12">
                               <div class="job-post-item bg-white p-4 d-block d-md-flex align-items-center">

                                  <div class="mb-4 mb-md-0 mr-5">
                                   <div class="job-post-item-header d-flex align-items-center">
                                     <div class="badge-wrap">
                                      <span class="bg-warning text-white badge py-2 px-4">Posted on '.date('d-m-Y', strtotime($row["date"])).' at '.explode(" ",$row["date"])[1].'</span>
                                     </div>
                                   </div>
                                   <br>
                                   <div class="job-post-item-body d-block d-md-flex">
                                     <div class="mr-3">'.'<a title="Preview" href="viewworkout.php?id='.$row["id"].'"">'.$row["title_workout"].'</a>'.'  <span class="fl-bigmug-line-portfolio23" align="right" style="background-color:#E86100; opacity:0.85;">' .$row['price_workout'].'</span> <a href="#"> </a></div>
                                     <div><!--<span class="fl-bigmug-line-big104"></span>--> <span>'.$row["subheader"].'</span></div>
                                     <div>'.$delete_button.'</div><span><a title="View Profile" href=../profile/viewprofile.php?id='.$row['user_id'].'>'.$row["username"]. ' <img style="border-radius:50%;" class="profilepic" src=../profile/'.$row["image_path"].'></a></span>
                                   </div>
                                  </div>
                               </div>
                             </div>
                            </div><br>';
                         }}}

               ?>
             </div>
             <style media="screen">
             .search-box-meals {text-align:left;
               width: 45%;

             }
             .input-group{width:100%; }
             .input-group-append{display:inline;
             }
             .search-button{position: absolute;
             display:inline-block;
             height:100%;
             border:none;
             background-color: #E86100; color:white; }
             .search-button:hover{border-color: currentColor;
             background-color: #E68100;}
             /* Bootstrap 4 text input with search icon */

             .main-content-meal{
             margin: 0 auto;
             max-width: 900px;}
             .meal-plan-search{display: flex;
             justify-content: space-between;}
             .personalized-button{height:100%; border:none; background-color: #E86100; color:white;}
             .personalized-button:hover{
               border-color: currentColor;
               background-color: #E68100;}
               .recentmeals{display:inline-block;}
               .profilepic{width:35px; height:35px;}

             </style>

             </div>

  </body>
</html>
