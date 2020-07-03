<?php

session_start();
if(!$_SESSION['user_id']){
header('Location: ../login/login_form.html');

}

include("../database/db_connection.php");




//session_start();




 ?>

 <!DOCTYPE html>
 <html lang="en" dir="ltr">
   <head>
     <meta charset="utf-8">


     <script type="text/javascript" src="../jquery-3.4.1.min.js"></script>

     <meta name="viewport" content="width=device-width, initial-scale=1.0">
     <link rel="icon" type="../images/image/png" href="../images/icon logo.png"/>

     <link rel="stylesheet" type="text/css" href="../style/style.css"/>
     <link rel="stylesheet" href="aos.css">

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
  xmlhttp.open("POST", "delete_post.php", true);
  xmlhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
  xmlhttp.send("post_id="+post_id);
}
</script>

</script>
<script type="text/javascript">
  //AJAX
  $(function () {

    $('.imagedeleteform').on('submit', function (e) {

      e.preventDefault();


      $.ajax({
        type: 'post',
        url: 'delete_image.php',
        data: $('form').serialize(),
        success: function () {

          alert("You successfully deleted this image.")
            ;
            location.reload();


        }
      });

    });

  });
</script>





	<!--	 <link rel="stylesheet" type="text/css" href="../login/login_form.css"/>-->
		<!-- <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">-->
<script src="../logout/logout.js"></script>
<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.3/css/all.css" integrity="sha384-UHRtZLI+pbxtHCWp1t77Bi1L4ZtiqrqD80Kn4Z8NTSRyMA2Fd33n5dQ8lWUE00s/" crossorigin="anonymous">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>







    <!-- <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js">

    </script>-->
     <script type="text/javascript">
     $(function() {
       // Initializes and creates emoji set from sprite sheet
       window.emojiPicker = new EmojiPicker({
         emojiable_selector: '[data-emojiable=true]',
         assetsPath: 'https://onesignal.github.io/emoji-picker/lib/img/',
         popupButtonClasses: 'fa fa-smile-o'
       });
       // Finds all elements with `emojiable_selector` and converts them to rich emoji input fields
       // You may want to delay this step if you have dynamically created input fields that appear later in the loading process
       // It can be called as many times as necessary; previously converted input fields will not be converted again
       window.emojiPicker.discover();
     });

     </script>
     <script type="text/javascript" src="https://onesignal.github.io/emoji-picker/lib/js/config.js">

     </script>
     <script type="text/javascript" src="https://onesignal.github.io/emoji-picker/lib/js/util.js">

     </script>

     <script type="text/javascript" src="https://onesignal.github.io/emoji-picker/lib/js/jquery.emojiarea.js">


     </script>
     <script type="text/javascript" src="https://onesignal.github.io/emoji-picker/lib/js/emoji-picker.js">

     </script>
     <link rel="stylesheet" href="https://onesignal.github.io/emoji-picker/lib/css/emoji.css">
    <!--<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.6/css/bootstrap.min.css">-->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css">
    <style media="screen">


    .main-content-news{margin: 0 auto;
    max-width: 700px;}
    .full-width {
width: 100%;
height: 15vh;

text-align: center;}

.justify-content-center {
  display: inline-block;
  align-self: center;
  width: 100%;
}
.lead.emoji-picker-container {
  width: 100%;
  display: block;}
  input {
    width: 100%;
    height: 50px;
  }
}


}


    </style>


     <title>News Feed</title>
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
                 echo '<li><a class="active" href="news.php"><i class="glyphicon glyphicon-bullhorn"></i> Feed</a></li>';
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
              echo '<a  href="../profile/profile.php"><i class="fa fa-fw fa-user"></i> My Profile</a>';}

               else echo '<a  href="#starthere" ><span  class="fa fa-fw fa-user"></span> Sign Up</a>' ?></li>
                 <li><?php
             if(!isset($_SESSION["user_id"])) {
               echo '<a href="login/login_form.html"><i class="fas fa-sign-in-alt"></i>Login</a>';}
               else echo '<a href="../logout/logout.php"><span class="glyphicon glyphicon-off"></span> Logout</a>';
             ?></li>
               </ul>
             </div>
           </div>
         </nav>


<style>
 .navbar-inverse .navbar-nav>li>a {
    color: white;




}</style>

     <!--Emojis are unicodes, so it wont have much problem showing in the mobile or mails-->
     <div class="main-content-greetings" align="center">
       <?php
       $query="SELECT * FROM user_profile as u INNER JOIN user as us on u.id=us.id WHERE u.id=".$_SESSION['user_id'];
      $result = $conn->query($query);
      if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        $first_name=$row['username'];
      }
        ?>
       <h3> Welcome  <?php echo $first_name ?> </h3> <br><br>
      <div class="connect-btn" style="display:inline-block;">
        <h4 style="color:#E86100;">A click away from professionals!</h4><br><br>
        <a href="personalized.php" style="text-decoration:none; color:white;"><button type="button" name="button" class="btn" style=" border-style: none; background:#E86100; width:95%; height:40px;"> &#128279; Connect with Pros!</button></a> <br> <br>
        <a href="businesses.php" style="text-decoration:none; color:white;"><button type="button" name="button" class="btn" style=" border-style: none; background:#E86100; width:95%; height:40px;"> &#128279; Gyms, Spas, Catering & others</button></a> <br> <br>
        <a href="#events" style="text-decoration:none; color:white;"><button type="button" name="button" class="btn" style=" border-style: none; background:#E86100; width:95%; height:40px;"> Events near me!</button></a><br><br>
        <span>Customize your profile for a better experience! <i class="far fa-smile-beam"></i></span><br><br>
      <a href="../profile/edit_profile.php" style="text-decoration:none; color:white;"><button type="button" name="button" class="btn" style=" border-style: none; background:#E86100; width:95%; height:40px;"><i class="fas fa-user-cog"></i> Edit your profile to get started!</button></a><br><br>
          <?php if (isset($_SESSION['profile_type']) && $_SESSION['profile_type']==0) {
        echo '<a href="../mealplans/create_meal.php" style="text-decoration:none; color:white;"><button type="button" name="button" class="btn" style=" border-style: none; background:#E86100; width:95%; height:40px;"><i class="fas fa-plus"></i> Sell Meal Plan</button></a><br><br>'
      ;} else {
        echo '<a href="../mealplans/mealplans.php" style="text-decoration:none; color:white;"><button type="button" name="button" class="btn" style=" border-style: none; background:#E86100; width:95%; height:40px;"><i class="glyphicon glyphicon-cutlery"></i> View Meal Plans</button></a><br><br>'
      ;}?>
      <?php if (isset($_SESSION['profile_type']) && $_SESSION['profile_type']==0) {
        echo '<a href="../workoutplans/create_workout.php" style="text-decoration:none; color:white;"><button type="button" name="button" class="btn" style=" border-style: none; background:#E86100; width:95%; height:40px;"><i class="fas fa-plus"></i> Sell Workout Plan</button></a><br><br>'
      ;}else {
        echo '<a href="../workoutplans/workoutplans.php" style="text-decoration:none; color:white;"><button type="button" name="button" class="btn" style=" border-style: none; background:#E86100; width:95%; height:40px;"><i class="fas fa-dumbbell"></i> View Workout Plans</button></a><br><br>'
      ;}?>
      <?php if (isset($_SESSION['profile_type']) && $_SESSION['profile_type']==0) {
        echo '<a href="../articles/articles.php" style="text-decoration:none; color:white;"><button type="button" name="button" class="btn" style=" border-style: none; background:#E86100; width:95%; height:40px;"><i class="fas fa-plus"></i> Post an Article</button></a><br><br>'
      ;} else {
        echo '<a href="../articles/articles.php" style="text-decoration:none; color:white;"><button type="button" name="button" class="btn" style=" border-style: none; background:#E86100; width:95%; height:40px;"><i class="far fa-newspaper"></i> View Articles</button></a><br><br>'
      ;}?>
    </div>
     </div>
<div class="main-content-news">

<form class="" action="sharepost.php" method="post">


<div class="container full-width" >
      <div class="row justify-content-center">
            <p class="lead emoji-picker-container">
              <input hidden name="id" value="<?php echo $_SESSION['user_id'];?>">
              <textarea name="news_text" type="textbox" data-emoji-input="unicode" class="form-control" placeholder="Tell us something..." data-emojiable="true" style="height:300px;"></textarea>
              <div class="share-button">
              <button class="share-button btn" type="submit" name="button" style="background:#D3D3D3; border-style:none; width:20%; height:30px;">Share</button>
              <button type="button" class="btn" data-toggle="modal" data-target="#myModal" style="background:#E86100; border-style:none; height:30px;" id="btn-photo"><i class="fas fa-plus-square" style="color:white; font-size:10px;"></i> <i class="fas fa-camera-retro" style="color:white;"></i></button>
              </div>
            </p>
      </div>
</div>
</form>

</div>
<div class="modal fade" id="myModal" role="dialog" style="width:97%; max-height:812; margin-top:100px;">
    <div class="modal-dialog" >

      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Post Image</h4>
        </div>
        <div class="modal-body">
          <form class="form-group" action="upload_image.php" method="POST" enctype="multipart/form-data">


            <input hidden name="id" value="<?php echo $_SESSION['user_id'];?>">
            <input type="file"  onchange="readURL(this);" name="file" class="btn custom-file-input " id="customFile" value="" >


            <div class="card" style="width:100%; height:100%;" align="center">
            <div class="card-body">
              <input type="text" class="card-text form-control" placeholder="Enter Caption" name="caption"> <br><br><br>
            </div>
          </div>
          <!--  <input type="text" name="caption" class="form-control" value="" placeholder="Enter caption"> <br><br><br><br><br>-->
            <button type="submit" class="btn btn-primary" name="submit-file">Done
              <span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span>
              <span class="sr-only">Loading...</span>
            </button>
          </form>
          <img  class="card-img-top" id="blah" src="" alt="your image" style="height:100%;width:80%;"/><br><br>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        </div>
      </div>

    </div>
  </div>



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

      <li><a data-toggle="tab" href="#menu1" style="color:#E86100!important;">Posts</a></li>

      <li><a data-toggle="tab" href="#menu3" style="color:#E86100!important;">Photos</a></li>
    </ul>

    <div class="tab-content">

      <div id="menu1" class="tab-pane fade in active">
        <h3>Recent Posts</h3>
        <div name="comments" id="recent_articles" style="text-align: center;margin: 0 auto;max-width: 700px;word-wrap: break-word;text-align: justify;opacity: 1;">
          <?php
          $query="SELECT * FROM post as p INNER JOIN user_profile as u on p.user_id=u.id INNER JOIN post_newsfeed as ct on p.id=ct.id ORDER BY p.date DESC";
          $result=$conn->query($query) ;
            if ($result !== FALSE) {
                if ($result->num_rows > 0) {
                    while($row = $result->fetch_assoc()) {
                      if($_SESSION["user_id"]==$row["user_id"])
                        $delete_button='<button class="btn" onclick="delete_post('.$row["id"].')">Delete Post</button><br>';
                        else
                        $delete_button="";
                        $content1=  '<hr><div class="row" data-aos="fade" style="opacity: 1;">

                                        <div class="col-md-12">
                                          <div class="job-post-item bg-white p-4 d-block d-md-flex align-items-center">

                                             <div class="mb-4 mb-md-0 mr-5">

                                              <br>
                                              <div class="job-post-item-body d-block d-md-flex">
                                                <div class="mr-3"><a title="View Profile" href=../profile/viewprofile.php?id='.$row['user_id'].'>'.$row["username"]. ' <img style="border-radius:50%;" class="profilepic" src=../profile/'.$row["image_path"].'></a><!--<span class="fl-bigmug-line-portfolio23"></span>--> <a href="#"> </a></div>
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
                                       </div><br><a href="viewpost?id='.$row['id'].'&user='.$row['username'].'"><button class="btn btn-secondary">add comment</button></a>







                                      ';
                       echo $content1;

        ;
      }}}
      ?>
    </div></div>

      <div id="menu3" class="tab-pane fade">

        <h3>Recent Photos</h3>
        <?php
        //images POSTs ORDERED BY DATE
                     $query="SELECT * FROM post_newsfeed_images as p INNER JOIN user_profile as u on p.user_id=u.id ORDER BY p.TIME DESC";
                      //$query="SELECT * FROM post as p INNER JOIN user_profile as u on p.user_id=u.id INNER JOIN post_newsfeed_images as pn on p.id=pn.id PRDER BY p.date DESC";
                      $result=$conn->query($query) ;
                        if ($result !== FALSE) {
                            if ($result->num_rows > 0) {
                                while($row = $result->fetch_assoc()) {
                                  if($_SESSION["user_id"]==$row["user_id"])
                                    $delete_button2='<form class="imagedeleteform" action="delete_image.php" method="post">
                                    <input type="hidden" value="'.$row['imagepath'].'" name="file">



                                    <button type="submit" class="btn imagebtn" >Delete Image</button></form>';
                                    else
                                    $delete_button2="";
                                    $content2=  '<div class="row" data-aos="fade" style="opacity: 1;">



                                                    <div class="col-md-12">
                                                      <div class="job-post-item bg-white p-4 d-block d-md-flex align-items-center">

                                                         <div class="mb-4 mb-md-0 mr-5">

                                                          <br>
                                                          <div class="job-post-item-body d-block d-md-flex">
                                                            <div class="mr-3"><a title="View Profile" href=../profile/viewprofile.php?id='.$row['user_id'].'>'.$row["username"]. ' <img style="border-radius:50%;" class="profilepic" src=../profile/'.$row["image_path"].'></a><!--<span class="fl-bigmug-line-portfolio23"></span>--> <a href="#"> </a></div>
                                                            <div><!--<span class="fl-bigmug-line-big104"></span>--><img style="width:76%;height:95%;" src="'.$row["imagepath"].'"></div><br><div class="job-post-item-header d-flex align-items-center">
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
                                                   </div>











                                                  <br>';
                                   echo $content2;



                                }}}


            ?>
      </div></div>
    </div>
  </div>
    <br><br>



</div>
<hr>
<div class="connect-btn"  align="center">
  <div class="" style="display:inline-block;">


<a href="../logout/logout.php" style="text-decoration:none; color:white;"><button type="button" name="button" style=" border-style: none; background:#E86100; width:95%; height:40px;"> <span class="glyphicon glyphicon-off"></span> Logout</button></a> <br> <br>
</div>
</div>





<style media="screen">
  .share-button{position: relative;
  border-style: none;

}

.profilepic {width:35px; height:35px;}
}


</style>
<script type="text/javascript">
function readURL(input) {
         if (input.files && input.files[0]) {
             var reader = new FileReader();

             reader.onload = function (e) {
                 $('#blah')
                     .attr('src', e.target.result);
             };

             reader.readAsDataURL(input.files[0]);
         }
     }
</script>
<script type="text/javascript">
$(document).ready(function(){


  $('#addComment').on('click',function(){
    var comment = $('#mainComment').val();
    if (comment.length > 5) {
      $.ajax({
        url: 'comment_post.php',
        method: 'POST',
        dataType: 'text',
        data:{
            addComment: 1,
            comment: comment

        }, success: function(response){
            console.log(response);

        }





      });

    }else {
      alert('Check Your Inputs!')
    }



  });




});


</script>

   </body>
 </html>
