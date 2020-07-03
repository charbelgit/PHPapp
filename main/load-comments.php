<?php
session_start();
include("../database/db_connection.php");
$id=$_GET['id'];
$query= 'SELECT username, commentText, createdOn FROM comment_posts INNER JOIN user_profile on comment_posts.userID=user_profile.id   WHERE comment_posts.postID='.$id ;
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
