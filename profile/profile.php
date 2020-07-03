<?php session_start();
include("../database/db_connection.php");

$id=$_SESSION["user_id"];
 $query="SELECT * FROM user_profile as u INNER JOIN user as us on u.id=us.id WHERE u.id=".$id;
$result = $conn->query($query);
if ($result->num_rows > 0) {
  $row = $result->fetch_assoc();
  $first_name=$row['first_name'];

}

?>

<!DOCTYPE html>

<html lang="en" dir="ltr">
  <head>

      <link rel="stylesheet" href="../emojionearea.css">
    <link rel="stylesheet" href="../flag-icon-css-master/css/flag-icon.min.css">
    <link rel="stylesheet" href="../flag-icon-css-master/css/flag-icon.css">
    <link rel="stylesheet" href="https://github.com/lipis/flag-icon-css/blob/master/less/flag-icon-list.less">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/flag-icon-css/3.3.0/css/flag-icon.min.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.3/css/all.css" integrity="sha384-UHRtZLI+pbxtHCWp1t77Bi1L4ZtiqrqD80Kn4Z8NTSRyMA2Fd33n5dQ8lWUE00s/" crossorigin="anonymous">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.0.5/css/font-awesome.min.css">
    <script src="js/jquery/jquery-1.8.2.min.js"></script>
    <link href="./css/jquery.filer.css" type="text/css" rel="stylesheet" />
    <link href="./css/themes/jquery.filer-dragdropbox-theme.css" type="text/css" rel="stylesheet" />
    <script src="http://code.jquery.com/jquery-3.1.0.min.js"></script>
    <script src="./js/jquery.filer.min.js"></script>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="../style/style.css">
    <link rel="icon" type="images/image/png" href="../images/icon logo.png"/>
    <meta charset="utf-8">
     <meta name="viewport" content="width=device-width, initial-scale=1">
     <script>
     function delete_post(post_id){
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
       xmlhttp.open("POST", "../main/delete_post.php", true);
       xmlhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
       xmlhttp.send("post_id="+post_id);
     }
     </script>
    <title>My Profile</title>
  </head>
  <body>

      <style> .navbar-inverse .navbar-nav>li>a {color:white;}</style>
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

        <li><a href="../index.php"><span class="glyphicon glyphicon-home"></span> Home</a></li>
        <?php
            if(isset($_SESSION['user_id']))
            echo '<li><a href="../main/news.php"><i class="glyphicon glyphicon-bullhorn"></i> Feed</a></li>';
         ?>
        <li><a  href="../articles/articles.php"><i class="far fa-newspaper"></i> Articles</a></li>
        <li><a href="../mealplans/mealplans.php"><span class="glyphicon glyphicon-cutlery"></span> Meal Plans</a></li>
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
          echo '<a class="active" href="profile.php"><i class="fa fa-fw fa-user"></i> My Profile</a>';}?></li>
            <li><?php
        if(!isset($_SESSION["user_id"])) {
          echo '<a href="../login/login_form.html"><i class="fas fa-sign-in-alt"></i> Login</a>';}
          else echo '<a href="../logout/logout.php"><span class="glyphicon glyphicon-off"></span> Logout</a>';
        ?></li>
          </ul>
        </div>
      </div>
    </nav>


    <div class="container">
    <h1><span class="fa fa-paint-brush" style="color:#A13D2D;"></span> Profile</h1>
  	<hr>
	<div class="row">
      <!-- left column -->
      <div class="col-md-3">
        <div class="text-center profile-avatar-wrap">
          <img src="<?php echo $row["image_path"];?>" style="height:200px;width:200px;" class="avatar img-circle" alt="avatar" id="profile-avatar">
         <!--<h5><span class= "glyphicon glyphicon-download-alt" aria-hidden="true"></span>  <b>Drag and Drop</b> your profile picture here <br><br> OR </h5>
          <form class="box" method="post" action="" enctype="multipart/form-data">
            <div class="box__input">
              <input class="box__file" type="file" name="files[]" id="file" data-multiple-caption="{count} files selected" multiple />
              <label for="file"><strong>Choose a file</strong><span class="box__dragndrop"> or drag it here</span>.</label>
              <button class="box__button" type="submit">Upload</button>
            </div>
            <div class="box__uploading">Uploading&hellip;</div>
            <div class="box__success">Done!</div>
            <div class="box__error">Error! <span></span>.</div>
          </form>
          <input type="file" class="form-control userProfile" id="uploader">-->
        </div>
      </div>

      <!-- edit form column -->





      <div class="col-md-9 personal-info">
        <div class="alert alert-info alert-dismissable">
          <a class="panel-close close" data-dismiss="alert">×</a>
          <i class="far fa-smile-beam"></i>
        <strong>  Customize your profile for a better experience! </strong>
        </div>
        <h3>Personal info</h3>
        <div class="container" align="right">
          <a href="../account/update_password.php"> <button type="button" name="button" class="btn btn-primary" style="background:#e86100; border-color:white;">Change Password</button></a>
        </div>

        <form class="form-horizontal" role="form">
          <div class="form-group">
            <label class="col-lg-3 control-label">First name:</label>
            <div class="col-lg-8">
              <p class="" name='name' type="text" value='<?php echo $first_name;?>'><?php echo $first_name;?></p>
            </div>
          </div>
          <div class="form-group">
            <label class="col-lg-3 control-label">Last name:</label>
            <div class="col-lg-8">
              <p class="" type="text" value="<?php echo $row["last_name"];?>"><?php echo $row["last_name"];?></p>
            </div>
          </div>
          <div class="form-group">
            <label class="col-lg-3 control-label">Phone Number:</label>
            <div class="col-lg-8">
              <p class="" type="text" value="<?php echo $row["phone_number"];?>"><?php echo $row["phone_number"];?></p>
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
              <label class="col-lg-3 control-label"><span class="glyphicon glyphicon-flag"></span> Discipline:</label>
              <div class="col-lg-8">
              '.$row["discipline"].'
              </div>
            </div>';
          }else {
            echo '';
          }
           ?>

          <div class="form-group">
            <label class="col-lg-3 control-label">Introduce yourself:</label>
            <div class="col-lg-8">
          <p  class="" name="description" type="text" value="<?php echo $row["description"];?>"><?php echo $row["description"];?></p> <br>
        </div>
        </div>
        <br><br>
        <!--<div class="form-group">
          <label class="col-lg-3 control-label">Enter your fitness goals:</label>
          <div class="col-lg-8">
        <p  class="" name="goals" type="text" value="<?php echo $row["goals"];?>"><?php echo $row["goals"];?></p> <br>
      </div>
    </div>-->
      <br><br>
          <!-- Countries-->
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
          <div class="form-group">
            <label class="col-md-3 control-label"></label>
            <div class="col-md-8">
              <input title="Edit Profile" type="button" onclick="edit_profile();" class="btn btn-primary" value="Edit">
              <span></span>
            </div>
          </div>
        </form>
      </div>
  </div>
</div>
<hr>
<script type="text/javascript">
    function edit_profile(){
      location.href = "./edit_profile.php";
    }
</script>
<!-- Upload image script -->

<!--<script>
   function previewFile(){
       var preview = document.getElementsByClassName('userProfile'); //selects class name for user profile photo
       var file    = document.querySelector('input[type=file]').files[0]; //sames as here
       var reader  = new FileReader();

       reader.onloadend = function () {
           preview.src = reader.result;
       }

       if (file) {
           reader.readAsDataURL(file); //reads the data as a URL
       } else {
           preview.src = "";
       }
  }

  previewFile();  //calls the function named previewFile()
  </script>
-->






<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.8.3/jquery.min.js"></script>
<script src="DragAvatar-master/resample.js"></script>
<script src="DragAvatar-master/avatar.js"></script>


<div class="Posts">





  <?php
    include("../database/db_connection.php");
    $post_id=$_SESSION["user_id"];
    $id='';
    if( isset($_GET["id"])){
    $id=$_GET["id"];}

  $query= 'SELECT * from post as p INNER JOIN comment_text as pt on p.id=pt.id where pt.id='.$post_id;
  $result=$conn->query($query);
  while($row = mysqli_fetch_assoc($result)) {

   if(isset($_SESSION["user_id"])){
    $sql2="SELECT * FROM post_like WHERE user_id=".$_SESSION["user_id"]." and post_id=".$id;
  }
  $sql3="SELECT * FROM post_like WHERE post_id=".$id;
  $result3=$conn->query($sql3);
  if($result3 && $result3->num_rows){
  $likes=$result3->num_rows;}}
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
  <div class="container">


    <ul class="nav nav-tabs">

      <li><a data-toggle="tab" href="#menu1" style="color:#E86100!important;">My Posts</a></li>

      <li><a data-toggle="tab" href="#menu3" style="color:#E86100!important;">My Photos</a></li>
    </ul>

    <div class="tab-content">

      <div id="menu1" class="tab-pane fade in active">
        <h3>My Posts</h3>
        <div name="comments" id="recent_articles" style="text-align: center;margin: 0 auto;max-width: 700px;word-wrap: break-word;text-align: justify;opacity: 1;">
          <?php
          $query="SELECT * FROM post as p INNER JOIN user_profile as u on p.user_id=u.id INNER JOIN post_newsfeed as ct on p.id=ct.id WHERE u.id=$post_id ORDER BY p.date DESC";
          $result=$conn->query($query) ;
            if ($result !== FALSE) {
                if ($result->num_rows > 0) {
                    while($row = $result->fetch_assoc()) {
                      if($_SESSION["user_id"]==$row["user_id"])
                        $delete_button='<button onclick="delete_post('.$row["id"].')">Delete Post</button>';
                        else
                        $delete_button="";
                        $content1=  '<div class="row" data-aos="fade" style="opacity: 1;">
                                        <div class="col-md-12">
                                          <div class="job-post-item bg-white p-4 d-block d-md-flex align-items-center">

                                             <div class="mb-4 mb-md-0 mr-5">

                                              <br>
                                              <div class="job-post-item-body d-block d-md-flex">
                                                <div class="mr-3"><a title="View Profile" href=../profile/viewprofile.php?id='.$row['user_id'].'>'.$row["username"]. ' <img style="border-radius:50%; weight:35px; height:35px;" class="profilepic" src=../profile/'.$row["image_path"].'></a><!--<span class="fl-bigmug-line-portfolio23"></span>--> <a href="#"> </a></div>
                                                <div><!--<span class="fl-bigmug-line-big104"></span>--> <span style="font-size:20px;">'.nl2br($row["text_share"]).'</span></div><br><div class="job-post-item-header d-flex align-items-center">
                                                  <div class="badge-wrap">
                                                   <span class="bg-warning text-white badge py-2 px-4">Posted on '.date('d-m-Y', strtotime($row["date"])).' at '.explode(" ",$row["date"])[1].'</span>
                                                  </div>
                                                </div><br>
                                                '.$delete_button.'
                                              </div>
                                             </div>
                                          </div>
                                        </div>
                                       </div><br>';
                       echo $content1;
        ;
      }}else {
        echo '<h2> You have not posted yet </h2>';
      }}?>
    </div></div>

      <div id="menu3" class="tab-pane fade">
        <h3>My Photos</h3>
        <?php
        //images POSTs ORDERED BY DATE
                     $query="SELECT * FROM post_newsfeed_images as p INNER JOIN user_profile as u on p.user_id=u.id WHERE u.id=$post_id ORDER BY p.TIME DESC";
                      //$query="SELECT * FROM post as p INNER JOIN user_profile as u on p.user_id=u.id INNER JOIN post_newsfeed_images as pn on p.id=pn.id PRDER BY p.date DESC";
                      $result=$conn->query($query) ;
                        if ($result !== FALSE) {
                            if ($result->num_rows > 0) {
                                while($row = $result->fetch_assoc()) {
                                  if($_SESSION["user_id"]==$row["user_id"])
                                    $delete_button2='<button class="btn" onclick="delete_images('.$row["id"].')">Delete Image</button>';
                                    else
                                    $delete_button2="";
                                    $content2=  '<div class="row" data-aos="fade" style="opacity: 1;">
                                                    <div class="col-md-12">
                                                      <div class="job-post-item bg-white p-4 d-block d-md-flex align-items-center">

                                                         <div class="mb-4 mb-md-0 mr-5">

                                                          <br>
                                                          <div class="job-post-item-body d-block d-md-flex">
                                                            <div class="mr-3"><a title="View Profile" href=../profile/viewprofile.php?id='.$row['user_id'].'>'.$row["username"]. ' <img style="border-radius:50%; width:35px; height:35px;" class="profilepic" src=../profile/'.$row["image_path"].'></a><!--<span class="fl-bigmug-line-portfolio23"></span>--> <a href="#"> </a></div>
                                                            <div><!--<span class="fl-bigmug-line-big104"></span>--><img style="width:76%;height:95%;" src="../main/'.$row["imagepath"].'"></div><br><div class="job-post-item-header d-flex align-items-center">
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
                                   echo $content2;



                                }}else {
                                  echo '<h2> You have not posted yet </h2>';
                                }}


            ?>
      </div></div>
    </div>
  </div>
    <br><br>



</div>

<style media="screen">
  a{color:blue;}
</style>


  </body>
</html>
