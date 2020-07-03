<?php
session_start();
include('../database/db_connection.php');
$id=$_GET['id'];


 ?>
 <!DOCTYPE html>
 <html lang="en" dir="ltr">
   <head>
     <meta charset="utf-8">
     <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0">
     <link rel="icon" type="../images/image/png" href="../images/icon logo.png"/>
     <script src="../logout/logout.js"></script>
     <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.3/css/all.css" integrity="sha384-UHRtZLI+pbxtHCWp1t77Bi1L4ZtiqrqD80Kn4Z8NTSRyMA2Fd33n5dQ8lWUE00s/" crossorigin="anonymous">

     <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>

     <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

     <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>

     <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
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

     <title>Posts</title>
     <script type="text/javascript">
     $(document).ready(function(){
   $('#button-addon2').attr('disabled',true);
   $('#text-message').keyup(function(){
       if($(this).val().length !=0)
           $('#button-addon2').attr('disabled', false);
       else
           $('#button-addon2').attr('disabled',true);
   })
 });
     </script>
   </head>
   <body>
     <div class="fixed-top" style="border:solid 1px; border-color:#ddd; background:white; height:50px;"><a href="../index.php" style="text-decoration:none; color:black;"><i class="fas fa-arrow-left" style="margin-left:5px;"></i></a>



       <h3 style="display:inline-block;">
        Comments



      </h3>



     </div>
     <div class="posts" align="center" style="margin-top:10px;">
     <?php
     $query= 'SELECT * FROM post as p INNER JOIN user_profile as u on p.user_id=u.id INNER JOIN post_newsfeed as pn on p.id=pn.id  where pn.id='.$id;
     $result=$conn->query($query);
     $row = $result->fetch_assoc();
     if($_SESSION["user_id"]==$row["user_id"])
       $delete_button='<button class="btn btn-secondary" onclick="delete_post('.$row["id"].')">Delete Post</button><br>';
       else
       $delete_button="";
     echo '<div class="container" align="center">
     <div class="row" data-aos="fade" style="opacity: 1;">

                     <div class="col-md-12">
                       <div class="job-post-item bg-white p-4 d-block d-md-flex align-items-center">

                          <div class="mb-4 mb-md-0 mr-5">

                           <br>
                           <div class="job-post-item-body d-block d-md-flex">
                             <div class="mr-3"><a title="View Profile" href=../profile/viewprofile.php?id='.$row['user_id'].'>'.$row["username"]. ' <img style="border-radius:50%;" class="profilepic" src=../profile/'.$row["image_path"].' style="height:35px;width:35px;"></a><!--<span class="fl-bigmug-line-portfolio23"></span>--> <a href="#"> </a></div>
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
                    </div></div><br>'
     ?>

<?php
$sqlNumComments = $conn->query("SELECT comment_id FROM comment_posts");
$numComments = $sqlNumComments->num_rows;
$query= 'SELECT username, commentText, createdOn FROM comment_posts INNER JOIN user_profile on comment_posts.userID=user_profile.id  WHERE comment_posts.postID='.$id  ;
$result=$conn->query($query) ;
  if ($result !== FALSE) {
      if ($result->num_rows > 0) {
          while($row = $result->fetch_assoc()) {

            echo '<div class="">'.$row['username'].' <small class="text-muted" id="text-muted">posted on '.$row['createdOn'].'</small></div><br>
            <div>'.$row['commentText'].'</div><hr><br>







            ';



          }
}else {
  echo "<h1>There are no comment!</h1>";
}}
 ?>

<div class="comments">

</div>

   </div>

   <form class="" action="comment_post.php" id="commentForm" method="post">

   <div class="fixed-bottom"><div class="input-group mb-3">
     <input type="hidden" name="postID" value="<?php echo $id; ?>">


  <input type="text" id="mainComment" class="form-control" name="comment" placeholder="Post a Comment..." aria-label="Post a Comment" aria-describedby="button-addon2">
  <div class="input-group-append">
    <button class="btn btn-outline-secondary" type="submit" name="addComment" id="button-addon2 addComment">Comment</button>

  </div>
</div></div>
</form>

<script type="text/javascript">

  //AJAX
  $(function () {

    $('form').on('submit', function (e) {

      e.preventDefault();


      $.ajax({
        type: 'post',
        url: 'comment_post.php',
        data: $('form').serialize(),
        success: function () {
            $("#commentForm")[0].reset();

            ;
            
        }
      });

    });

  });


</script>


   </body>
   <style media="screen">
     img.profilepic{width:35px!important;height:35px!important;}
     .d-md-flex{display:inline-block!important;}
   </style>
 </html>
