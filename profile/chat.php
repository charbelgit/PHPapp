<?php
session_start();

include('../database/db_connection.php');
$trainerid=$_GET['trainerid'];
$userid=$_GET['userid'];

if ($_SESSION['user_id']==$trainerid) {
  $sent_to=$userid;
}else if ($_SESSION['user_id']==$userid) {
$sent_to=$trainerid;
}

  $sent_from=$_SESSION['user_id'];
  $sql="SELECT * FROM messages WHERE sent_from=$sent_from AND sent_to=$sent_to OR sent_from=$sent_to AND sent_to=$sent_from ORDER BY messages.message_id ASC";
  $result=mysqli_query($conn,$sql);
  if (mysqli_num_rows($result)>0) {

    while ($row= $result->fetch_assoc()) {

      if ($_SESSION['user_id']==$sent_from) {
        $align="right";
      }else if ($_SESSION['user_id']==$sent_to) {
        $align="left";
      }

      echo '<br>';
      echo $row['time'];
      echo '<br>';
      echo "<div >";
      echo "<div class='sender' id='textmessage'  style='background:#E86100;border-radius:10px; text-align:$align;'>";
      echo '<p style="display:inline-block;">'.$row['messageText'].'</p>';
      echo "</div>";
      echo "</div>";

    }
  }


 ?>
