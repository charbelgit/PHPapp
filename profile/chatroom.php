<?php
session_start();
include('../database/db_connection.php');

$trainerid=$_GET['trainerid'];
$userid=$_GET['userid'];

if (!isset($_SESSION['user_id'])) {
  header('location:../index.php');}

if ($_SESSION['user_id']!==$trainerid && $_SESSION['user_id']!==$userid ) {
  echo '<html><head><meta name="viewport" content="width=device-width, initial-scale=1.0, minimum-scale=1.0"><body><h2>You cannot participate in this chat!</h2></body></head></html>';
  exit();
}



if ($_SESSION['user_id']==$trainerid) {
  $sent_to=$userid;
}else if ($_SESSION['user_id']==$userid) {
$sent_to=$trainerid;
}



  $query= 'SELECT * from user as p INNER JOIN user_profile as pt on p.id=pt.id where pt.id='.$sent_to;
  $result=$conn->query($query);
  $row = $result->fetch_assoc();
  $usersn=$row['first_name'];
  $email=$row['email'];



 ?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
      <meta name="viewport" content="width=device-width, initial-scale=1.0, minimum-scale=1.0">
      <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
      <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.3/css/all.css" integrity="sha384-UHRtZLI+pbxtHCWp1t77Bi1L4ZtiqrqD80Kn4Z8NTSRyMA2Fd33n5dQ8lWUE00s/" crossorigin="anonymous">
      <script src="http://code.jquery.com/jquery-3.4.1.min.js" integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo=" crossorigin="anonymous"></script>
      <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
    <title>Chat</title>
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
    <script type="text/javascript">
      //AJAX
      $(function () {

        $('form').on('submit', function (e) {

          e.preventDefault();


          $.ajax({
            type: 'post',
            url: 'sendchat.php',
            data: $('form').serialize(),
            success: function () {
                $("#form-text")[0].reset();
                ;

            }
          });

        });

      });
    </script>
    <script type="text/javascript">
      $(document).ready(function(){
        setInterval(function(){
            $('.chat-messages').load('chat.php?trainerid=<?php echo $_GET['trainerid']; ?>&userid=<?php echo $_GET['userid']; ?>')

        }, 1000);



      });
    </script>
    
  </head>
  <body style="background:#EDE6D6;"  >
    <div class="fixed-top" style="border:solid 1px; border-color:#ddd; background:#E86100; height:50px;"><a href="../index.php" style="text-decoration:none; color:white;"><i class="fas fa-arrow-left" style="margin-left:5px;"></i></a>  <img src="<?php echo $row['image_path'];?>" style="height:45px;width:45px;border-radius:50%;" >



      <h5 style="display:inline-block;">
        <?php  echo $row["username"];?>



      </h5>

      <div class="btn-group" align="right">


  <button type="button" class="btn btn-secondary " data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" style="background:#E86100; border-style:none;display:inline-block;">
    <i class="fas fa-ellipsis-v"></i>
  </button>
  <div class="dropdown-menu dropdown-menu-right">
    <a href="viewprofile.php?id=<?php echo $sent_to; ?>"><button class="dropdown-item" type="button">View Profile</button></a><hr>
    <a href=""><button class="dropdown-item" type="button">Media</button></a><hr>
    <a href="" ><button class="dropdown-item" type="button">Block</button></a>


  </div>
</div>

    </div>
    <div class="messages" align="center">
    <!--  <div class="iframe" align="center">


    <iframe src="messages.php" width="100%" height="800px"  align="center" style="width:100%; border:none; margin-bottom:56px;"></iframe>
  </div>-->

<div class="chat-messages" style="margin-bottom:110px; margin-top:60px;">
<!-- messages will appear here -->
  <?php/*
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
          $align='right';
        }else if ($_SESSION['user_id']==$sent_to) {
          $align='left';
        }


        echo "<div class='sender' align='$align'>";
        echo '<p style="display:inline-block;">'.$row['messageText'].'</p>';
        echo $row['time'];
        echo "</div>";

      }
    }
   */?>
</div>
  <div class="container">

  <form  action="sendchat.php" id="form-text" method="post">

<!-- ============== Append Content ================ -->
<div class="fixed-bottom">
    <div class="input-group mb-3">
      <input type="hidden" name="trainerid" value="<?php $trainerid ?>">
      <input type="hidden" name="userid" value="<?php echo $userid; ?>">
      <input type="hidden" name="sent_to" value="<?php echo $sent_to; ?>">
      <input type="hidden" name="sent_from" value="<?php echo $_SESSION['user_id']; ?>">
    <textarea id="text-message" style="height:40px; resize:none;" name="chat" type="text" class="form-control" placeholder="Send message" aria-label="Send messagae" aria-describedby="button-addon2"></textarea>
    <div class="input-group-append">
      <button class="btn btn-outline-secondary" type="submit" id="button-addon2" style="background:#E86100; color:white;"><i class="fas fa-paper-plane"></i></button>
    </div>
  </div>
<!-- ========================== End Append ========================= -- >

</form>
</div>
</div>
  </div>
    <script>
    if ( window.history.replaceState ) {
        window.history.replaceState( null, null, window.location.href );
    }
    </script>
  </body>
  <style media="screen">


    .mb-3{width:100%;}
    body{margin:50px; max-width:800px;}

button {

    top: 3px;
    right:3px;
    width: 10px;
}
input[type=text] {
    position:relative;
    border:solid 1px;
    border-color: #ddd;
    border-radius: 20px;
    width:232px;
    height: 95px;
    resize: none
    outline: none; /* add this to stop highlight on focus */
}

  </style>
</html>
