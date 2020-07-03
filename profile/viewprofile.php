<?php session_start();
include("../database/db_connection.php");
$post_id=$_GET["id"];
if (!is_numeric($post_id)) {
  exit('ERROR!');
}

$query= 'SELECT * from user as p INNER JOIN user_profile as pt on p.id=pt.id where pt.id='.$post_id;
$result=$conn->query($query);
$row = $result->fetch_assoc();
$usersn=$row['first_name'];
$firstname=$row['username'];
$profiletype=$row['profile_type'];
// Ratings
if (isset($_POST['save'])) {
  $uID= $conn->real_escape_string($_POST['uID'])  ;
  if (!is_numeric($uID)) {
    exit('error');
  }
  $ratedIndex =$conn->real_escape_string($_POST['ratedIndex']) ;
  $ratedIndex++;

  if (!$uID) {
    $conn->query("INSERT INTO ratings (ratedIndex,ratedUser) VALUES ('$ratedIndex')");
    $sql=$conn->query("SELECT id FROM ratings ORDER BY id DESC LIMIT 1");
    $uData=$sql->fetch_assoc();
    $uID=$uData['id'];

  }else {
    $conn->query("UPDATE ratings SET ratedIndex='$ratedIndex' WHERE id='$uID'");

  }
exit(json_encode(array('id'=>$uID)));


}
$sql = $conn-> query("SELECT id FROM ratings");
$numR=$sql->num_rows;

$sql=$conn-> query("SELECT SUM(ratedIndex) AS total FROM ratings");
$rData = $sql-> fetch_array();
$total= $rData['total'];
$avg = $total / $numR;
// End
 ?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <script type="text/javascript" src="../jquery-3.4.1.min.js"></script>


      <link rel="stylesheet" href="css/aos.css">

      <link rel="stylesheet" href="css/style.css">
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, minimum-scale=1.0">
    <link href="https://fonts.googleapis.com/css?family=Josefin+Sans&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=PT+Sans+Narrow&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.3/css/all.css" integrity="sha384-UHRtZLI+pbxtHCWp1t77Bi1L4ZtiqrqD80Kn4Z8NTSRyMA2Fd33n5dQ8lWUE00s/" crossorigin="anonymous">
    <link href="https://fonts.googleapis.com/css?family=Lato&display=swap" rel="stylesheet">
    <script async src="https://cdn.ampproject.org/v0.js"></script>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>

    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>

     <link rel="stylesheet" type="text/css" href="../style/style.css"/>
    <title> <?php echo $row['username'];?></title>
    <script>
    function delete_images(id){
      var xmlhttp = new XMLHttpRequest();
      xmlhttp.onreadystatechange = function() {
          if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
              //go to another page after paying
              if(this.responseText=="error"){
                  document.getElementById("error_message").innerHTML="Error please ocntact the support team."
              }else{
                location.reload();
              }
          }
      };
      xmlhttp.open("POST", "delete_image.php", true);
      xmlhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
      xmlhttp.send("id="+id);
    }
    </script>
  </head>
  <body>
    <nav class="topnav navbar navbar-inverse" style="border-color: #E86100;">
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
                echo '<li><a href="../main/news.php"><i class="glyphicon glyphicon-bullhorn"></i> Feed</a></li>';
             ?>
            <li><a class="" href="../articles/articles.php"><i class="far fa-newspaper"></i> Articles</a></li>
            <li><a href="../mealplans/mealplans.php"><span class="glyphicon glyphicon-cutlery"></span> Meal Plans</a></li>
            <li><a href="../workoutplans/workoutplans.php"><i class="fas fa-dumbbell"></i> Workout Plans</a></li>
            <li><a href="#"><i class="glyphicon glyphicon-map-marker"></i> Gyms Around Me </a></li>
            <!-- php
                if(isset($_SESSION["user_id"]) && isset($_SESSION["profile_type"]) && $_SESSION["profile_type"]==0)
                    echo '<li><a href="memberships/memberships.php"><i class="fas fa-tags"></i> Memberships</a></li>'; -->

            <li><a href="contact_us/contact_us.php"><span class="glyphicon glyphicon-earphone"></span> Contact Us</a></li>
            <li><a href="about_us/about_us.php"><i class="far fa-address-card"></i> About Us</a></li>
              </ul>
              <ul class="nav navbar-nav navbar-right">
                <li><?php
            if(isset($_SESSION["user_id"])) {
              echo '<a  href="../profile/profile.php"><i class="fa fa-fw fa-user"></i> My Profile</a>';}
              else echo '<a href="#starthere"><span  class="fa fa-fw fa-user"></span> Sign Up</a>' ?></li>
                <li><?php
            if(!isset($_SESSION["user_id"])) {
              echo '<a href="../login/login_form.html"><i class="fas fa-sign-in-alt"></i>Login</a>';}
              else echo '<a id="id01" href="../logout/logout.php"><span class="glyphicon glyphicon-off"></span> Logout</a>';
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


<div class="container">
  <div class="col-md-3">
    <div class="text-center profile-avatar-wrap">
      <img data-toggle="modal" data-target="#myModal" src="<?php echo $row["image_path"];?>" style="height:200px;width:200px;" class="avatar img-circle" alt="avatar" id="profile-avatar">
    </div>
  </div>
        <div class="col-md-9 personal-info" >
          <h3><?php echo $row['username']; ?></h3>
          <div class="booksession" align="right">
            <?php if(isset($_SESSION['user_id']) && $row['profile_type']==0){
              echo '<a href=# style="color:inherit;"><button class="booksession" id="ContactProcedure"  style="display:inline-block; align:left;"><i class="glyphicon glyphicon-star-empty"></i> Book Session</button></a>';


            } else if(!isset($_SESSION['user_id'])) {echo '<h4><a href="../login/login_form.html">Login/Create an account to contact '.$row['first_name'].'</a></h4>';}?>
            <div class="messagepro" align="right">
              <?php if(isset($_SESSION['user_id']) && $row['profile_type']==0){
                echo '<a href="chatroom.php?trainerid='.$_GET['id'].'&userid='.$_SESSION['user_id'].'" style="color:inherit;"><button class="messagepro"  id="ContactProcedure" style="display:inline-block; align:left;"><i class="glyphicon glyphicon-send"></i> Message '.$row['first_name'].'</button></a>';


              }  ?>

            </div>
          </div>
          <br>
          <div class="" align="right" style="">
            <p style="display:block;" class="text-muted">Rate <?php echo $row['first_name']; ?></p>
            <i class="fa fa-star fa-2x" data-index="0"></i>
            <i class="fa fa-star fa-2x" data-index="1"></i>
            <i class="fa fa-star fa-2x" data-index="2"></i>
            <i class="fa fa-star fa-2x" data-index="3"></i>
            <i class="fa fa-star fa-2x" data-index="4"></i>
            <br>
            <p>Rating: <?php echo round($avg,2); ?>/5</p>
            <p class="text-muted">Total: <?php echo $numR; ?> ratings</p>

          </div>
          <br>
            <form class="form-horizontal" role="form">
          <!--  <div class="form-group" align="left">
              <label class="col-lg-3 control-label">First name:</label>
              <div class="col-lg-8">
                <p class="" name='name' type="text" value='<?php echo $row["first_name"];?>'><?php echo $row["first_name"];?></p>
              </div>
            </div>
            <div class="form-group">
              <label class="col-lg-3 control-label">Last name:</label>
              <div class="col-lg-8">
                <p class="" type="text" value="<?php echo $row["last_name"];?>"><?php echo $row["last_name"];?></p>
              </div>
            </div>-->
            <div class="form-group">
              <label class="col-lg-3 control-label">Introduction: </label>
              <div class="col-lg-8">
            <p  class="" name="description" type="text" value="<?php echo $row["description"];?>"><?php echo $row["description"];?></p> <br>
          </div>
          </div>
            <div class="form-group">
              <label class="col-lg-3 control-label">Experience (in years):</label>
              <div class="col-lg-8">
                <p class="" type="text" value="<?php echo $row["experience"];?>"><?php echo $row["experience"];?></p>
              </div>
            </div>
          <?php
            if ($row['profile_type']==0) {
              echo '<div class="form-group">
                <label class="col-lg-3 control-label">Discipline:</label>
                <div class="col-lg-8">
                  <p class="" type="text" value="'.$row["discipline"].'">'.$row["discipline"].'</p>
                </div>
              </div>';
            }else {
              echo'';
            }
           ?>


          <br><br>
            <!-- Countries     Collapsed-->
            <div class="buttoncollapse" align="center">

            <a href="#demo" class="btn btn-info" style="background:#E86100;"  data-toggle="collapse">More about <?php echo $row['username']; ?></a>
          </div>
            <div id="demo" class="collapse">
            <div class="form-group">
              <label class="col-lg-3 control-label"><span class="glyphicon glyphicon-flag"></span> Choose country:</label>
              <div class="col-lg-8">
              <?php echo $row["country"];?>
              </div>
            </div>
            <!--countries-->
            <div class="form-group">
              <label class="col-lg-3 control-label"><span class="glyphicon glyphicon-envelope"></span> Email:</label>
              <div class="col-lg-8">
                <p class="" name="email" type="text" value=' <?php echo $row["email"];  ?>' ><?php echo $row["email"];  ?></p>
              </div>
            </div>
            <div class="form-group">
              <label class="col-lg-3 control-label">Time Zone:</label>
              <div class="col-lg-8">
              <?php echo $row["timezone"];?>
              </div>
            </div>
            <div class="form-group">
              <label class="col-md-3 control-label">Username:</label>
              <div class="col-md-8">
                <p class="" type="text" value="<?php echo $row["username"];?>"><?php echo $row["username"];?></p>
              </div>
            </div>
          </div>
          <!-- End collapse -->

          </form>
        </div>
    </div>
  </div>
  <hr>


  </div>
  <div class="modal fade" id="myModal" role="dialog" style="width:97%; max-height:812; margin-top:100px;">
      <div class="modal-dialog" >

        <!-- Modal content-->
        <div class="modal-content">
          <div class="modal-header" style="background:#e86100;">

            <button type="button" class="close" data-dismiss="modal">&times;</button>

          </div>
          <div class="modal-body" align="center">
            <?php
            include_once('../database/db_connection.php');

            $post_id=$_GET["id"];

            $query= 'SELECT * from user as p INNER JOIN user_profile as pt on p.id=pt.id where pt.id='.$post_id;
            $result=$conn->query($query);
            $row = $result->fetch_assoc();?>


            <img src="<?php echo $row["image_path"];?>" class="card-img-top" id="blah"  alt="your image" style="height:100%;width:100%; display:inline-block; border-radius:50%;"/><br><br>
          </div>

        </div>

      </div>
    </div>

<div class="usersposts">
  <?php
  $post_id=$_GET['id'];
  $user_id='';
  if(isset($_SESSION['user_id'])) {$user_id=$_SESSION['user_id']; }

  $query= 'SELECT * from post as p INNER JOIN comment_text as pt on p.id=pt.id where pt.id='.$post_id;
  $result=$conn->query($query);
  while($row = mysqli_fetch_assoc($result)) {

   if(isset($_SESSION["user_id"])){
    $sql2="SELECT * FROM post_like WHERE user_id=".$_GET["id"]." and post_id=".$_GET["id"];
  }
  $sql3="SELECT * FROM post_like WHERE post_id=".$_GET["id"];
  $result3=$conn->query($sql3);
  $likes=$result3->num_rows;}
  /*  if(isset($_SESSION["user_id"])){
      $result2=$conn->query($sql2);
      if ($result2->num_rows > 0)
          $liked="liked";
      else
          $liked="";
  }
  $button_like=' <br><br><button id="like_button_'.$row["id"].'" onclick="like_article('.$row["id"].');" class="button button-like '.$liked.'"><i class="fa fa-heart"></i><span>Like</span></button>
                      <span id="likes_'.$row["id"].'">'.$likes.'</span>';
  echo '<div class="ml-auto" style="text-align: center;">
                        '.$button_like.'

                       </div>';*/
  ?>
    <br><br>
    <div class="container" align="center">
<h2>Browse <?php echo $firstname; ?>'s Content</h2>

  <ul class="nav nav-tabs" style="display:inline-block;">
    <li ><a title="Posts" class="tabs" data-toggle="tab" href="#posts"style="background:#E86100; color:white;"><i class="fas fa-pen-fancy"></i></a></li>
    <li><a title="Photos" class="tabs" data-toggle="tab" href="#Photos"><i class="fas fa-camera"></i></a></li>
    <?php if (isset($profiletype) && $profiletype==0) {
      echo '<li><a title="Meal Plans" class="tabs" data-toggle="tab" href="#mealplans"><span class="glyphicon glyphicon-cutlery"></span></a></li>
      <li><a title="Workout Plans" class="tabs" data-toggle="tab" href="#workoutplans"><i class="fas fa-dumbbell"></i></a></li>
      <li><a title="Articles" class="tabs" data-toggle="tab" href="#articles"><i class="far fa-newspaper"></i></a></li>';
    }else {

    } ?>


  </ul>
  <hr>

  <div class="tab-content">
    <div id="posts" class="tab-pane fade in active" style="background:none!important;">
      <div class="intro1">
        <h3><?php echo $firstname; ?>'s Posts</h3>
      </div><br>
    <div name="comments" id="recent_articles" style="text-align: center;margin: 0 auto;max-width: 700px;word-wrap: break-word;text-align: justify;opacity: 1;">
      <?php
      $query="SELECT * FROM post as p INNER JOIN user_profile as u on p.user_id=u.id INNER JOIN post_newsfeed as ct on p.id=ct.id  WHERE p.reply_to_id=".$_GET['id']."  ORDER BY p.date DESC";

      $result=$conn->query($query) ;

        if ($result !== FALSE) {
            if ($result->num_rows > 0) {
                while($row = $result->fetch_assoc()) {
                  if($user_id==$row["user_id"])
                    $delete_button='<button onclick="delete_post('.$row["id"].')">Delete Post</button>';
                    else
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
                            <div class="mr-3">'.$row["username"].'<!--<span class="fl-bigmug-line-portfolio23"></span>--> <a href="#"> </a></div>
                            <div><!--<span class="fl-bigmug-line-big104"></span>--> <span>'.$row["text_share"].'</span></div>
                            '.$delete_button.'
                          </div>
                         </div>
                      </div>
                    </div>
                   </div><br>';
                }}else {
                  echo '<h2> No posts yet</h2>';
                }}
                ?></div>
    </div>

    <div id="Photos" class="tab-pane fade"style="background:none!important;">
      <div class="intro1">
        <h3><?php echo $firstname; ?>'s Photos</h3>

      </div><br>
    <div name="comments" id="recent_articles" style="text-align: center;margin: 0 auto;max-width: 700px;word-wrap: break-word;text-align: justify;opacity: 1;">
      <?php
      $getid=$_GET['id'];
      $query="SELECT * FROM post_newsfeed_images as p INNER JOIN user_profile as u on p.user_id=u.id WHERE u.id=$getid";

      $result=$conn->query($query) ;

        if ($result !== FALSE) {
            if ($result->num_rows > 0) {
                while($row = $result->fetch_assoc()) {
                  if($user_id==$row["user_id"])
                  $delete_button2='<button class="btn" onclick="delete_images('.$row["id"].')">Delete Image</button>';
                  else
                  $delete_button2="";
                  echo
      '<div class="row" data-aos="fade" style="opacity: 1;">
      <div class="col-md-12">
        <div class="job-post-item bg-white p-4 d-block d-md-flex align-items-center">

           <div class="mb-4 mb-md-0 mr-5">

            <br>
            <div class="job-post-item-body d-block d-md-flex">
              <div class="mr-3"><a title="View Profile" href=../profile/viewprofile.php?id='.$row['user_id'].'>'.$row["username"]. ' <img style="border-radius:50%;" class="profilepic" src=../profile/'.$row["image_path"].'></a><!--<span class="fl-bigmug-line-portfolio23"></span>--> <a href="#"> </a></div>
              <div><!--<span class="fl-bigmug-line-big104"></span>--><br><img style="width:76%;height:95%;" src="../main/'.$row["imagepath"].'"></div><br><div class="job-post-item-header d-flex align-items-center">
                <div class="badge-wrap">
                <div class="mr-3"><span style="font-size:20px;">'.nl2br($row["caption"]).'</span></div>
                 <span class="bg-warning text-white badge py-2 px-4">Posted on '.date('d-m-Y', strtotime($row["TIME"])).' at '.explode(" ",$row["TIME"])[1].'</span>
                </div>
              </div><br>
              '.$delete_button2.'
            </div>
           </div>
        </div>
      </div>
     </div><br>';
                }}else {
                  echo '<h2> No posts yet</h2>';
                }}
                ?></div>
    </div>

    <div id="mealplans" class="tab-pane fade"style="background:none!important;">
      <div class="intro1">
        <h3><?php echo $firstname; ?>'s Meal Plans</h3>
      </div><br>
      <?php
$query2="SELECT * FROM post as p INNER JOIN user_profile as u on p.user_id=u.id INNER JOIN post_meal as pm on p.id=pm.id  WHERE p.user_id=".$_GET['id']."  ORDER BY p.date DESC";
$result=$conn->query($query2) ;
  if ($result !== FALSE) {

      if ($result->num_rows > 0) {
          while($row = $result->fetch_assoc()) {
            if($user_id==$row["user_id"])
              $delete_button='<button title="delete" onclick="delete_meal('.$row["id"].')">Delete Meal Plan</button>';
              else
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
                      <div class="mr-3">'.'<a title="Preview" href="../mealplans/viewmeal.php?id='.$row["id"].'"">'.$row["title_meal"].'</a>'.'  <span class="fl-bigmug-line-portfolio23" align="right" style="background-color:#E86100; opacity:0.85;">' .$row['price_meal'].'</span> <a href="#"> </a></div>
                      <div><!--<span class="fl-bigmug-line-big104"></span>--> <span>'.$row["subheader"].'</span></div>
                      '.$delete_button.'<span><a title="View Profile" href=../profile/viewprofile.php?id='.$row['user_id'].'>'.$row["username"]. ' <img class="profilepic" src=../profile/'.$row["image_path"].'></a></span>
                    </div>
                   </div>
                </div>
              </div>
             </div><br>';
          }}else {
            echo '<h2>'.$firstname.' has not posted meal plans yet</h2>';
          }}
          ?>
        </div>

    <div id="workoutplans" class="tab-pane fade"style="background:none!important;">
      <div class="intro1">
        <h3><?php echo $firstname; ?>'s Workout Plans</h3>
      </div><br>

                        <?php

                  $query2="SELECT * FROM post as p INNER JOIN user_profile as u on p.user_id=u.id INNER JOIN post_workout as pm on p.id=pm.id  WHERE p.user_id=".$_GET['id']."  ORDER BY p.date DESC";
                  $result=$conn->query($query2) ;
                    if ($result !== FALSE) {
                        if ($result->num_rows > 0) {
                            while($row = $result->fetch_assoc()) {
                              if($user_id==$row["user_id"])
                                $delete_button='<button title="delete" onclick="delete_meal('.$row["id"].')">Delete Meal Plan</button>';
                                else
                                $delete_button="";
                              echo

                  '<h2>Workout Plans</h2><br><div class="row" data-aos="fade" style="opacity: 1;">
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
                                        <div class="mr-3">'.'<a title="Preview" href="../mealplans/viewworkout.php?id='.$row["id"].'"">'.$row["title_workout"].'</a>'.'  <span class="fl-bigmug-line-portfolio23" align="right" style="background-color:#E86100; opacity:0.85;">' .$row['price_workout'].'</span> <a href="#"> </a></div>
                                        <div><!--<span class="fl-bigmug-line-big104"></span>--> <span>'.$row["subheader"].'</span></div>
                                        '.$delete_button.'<span><a title="View Profile" href=../profile/viewprofile.php?id='.$row['user_id'].'>'.$row["username"]. ' <img class="profilepic" src=../profile/'.$row["image_path"].'></a></span>
                                      </div>
                                     </div>
                                  </div>
                                </div>
                               </div><br>';
                            }}else {
                                echo '<h2>'.$firstname.' has not posted workout plans yet</h2>';
                            }}
                            ?>
                          </div>


    <div id="articles" class="tab-pane fade"style="background:none!important;">
      <div class="intro1">
        <h3><?php echo $firstname; ?>'s Articles</h3>
      </div><br>


      <?php
$query3="SELECT * FROM post as p INNER JOIN user_profile as u on p.user_id=u.id INNER JOIN post_text as pt on p.id=pt.id  WHERE p.user_id=".$_GET['id']."  ORDER BY p.date DESC";
$result=$conn->query($query3) ;
if ($result !== FALSE) {
if ($result->num_rows > 0) {
while($row = $result->fetch_assoc()) {
  if($user_id==$row["user_id"])
    $delete_button='<button title="delete" onclick="delete_meal('.$row["id"].')">Delete Meal Plan</button>';
    else
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
            <div class="mr-3">'.'<a title="Preview" href="../articles/viewarticle.php?id='.$row["id"].'"">'.$row["title"].'</a>'.'  <span class="fl-bigmug-line-portfolio23" align="right" style="background-color:#E86100; opacity:0.85;"></span> <a href="#"> </a></div>
            <div><!--<span class="fl-bigmug-line-big104"></span>--> <span>'.$row["description"].'</span></div>
            '.$delete_button.'<span><a title="View Profile" href=../profile/viewprofile.php?id='.$row['user_id'].'>'.$row["username"]. ' <img class="profilepic" src=../profile/'.$row["image_path"].'></a></span>
          </div>
         </div>
      </div>
    </div>
   </div><br>';
}}else {
    echo '<h2>'.$firstname.' has not posted articles yet</h2>';
}}
?></div></div>


  </div>
</div>
</div>
</div>
</div>




<script src="https://code.jquery.com/jquery-3.4.1.min.js" integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo=" crossorigin="anonymous"></script>
<script type="text/javascript">
let url =window.location.href;
let ratedIndex= -1, uID = 0, ratedUser= parseInt(/id=(\d+)/.exec(url)[1]);
  $(document).ready(function(){
    resetStarColors();

    if (localStorage.getItem('ratedIndex') != null) {
      setStars(parseInt(localStorage.getItem('ratedIndex')));
      uID = localStorage.getItem('uID');
    }

    $('.fa-star').on('click', function (){
      ratedIndex = parseInt($(this).data('index'));
      localStorage.setItem('ratedIndex',ratedIndex);
      saveToTheDB();

    });
    $('.fa-star').mouseover(function(){
      resetStarColors();
      let currentIndex = parseInt($(this).data('index'));
      setStars(currentIndex);
    });
    $('.fa-star').mouseleave(function(){
      resetStarColors();
      if (ratedIndex!= -1) {
        setStars(ratedIndex);
      }

    });
  });

  function saveToTheDB(){
    $.ajax({
      url: "viewprofile.php?id=<?php echo $_GET['id']; ?>",
      method: "POST",
      dataType: 'json',
      data: {
        save: 1,
        uID: uID,
        ratedIndex: ratedIndex
      }, success: function (r){
          uID = r.id;
          localStorage.setItem('uID',uID);
      }

    });
  }

  function setStars(max){
    for (var i = 0; i <= max; i++) {
      $('.fa-star:eq('+i+')').css('color','#e86100')
    }
  }

  function resetStarColors(){
    $('.fa-star').css('color', 'black');


  };
</script>

  </body>
  <style media="screen">
    .profilepic{width:35px; height:35px;}
    a{color:blue;}
  #ContactProcedure{border-style: solid;
    color:white;
  background-color:#E86100;
}
a.tabs{background:#E86100!important;
color:white;}
a.tabs:hover{background:#E68100!important;}
a.active{background:#E68100;}
.fa-star:hover{cursor:pointer;}



  </style>
</html>
