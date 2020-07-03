
<?php session_start(); ?>
<!DOCTYPE html>
<head>

  <script type="text/javascript" src="../jquery-3.4.1.min.js"></script>


    <link rel="stylesheet" href="css/aos.css">

    <link rel="stylesheet" href="css/style.css">
  <script>


  function delete_comment(post_id){
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
    xmlhttp.open("POST", "delete_comment.php", true);
    xmlhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    xmlhttp.send("post_id="+post_id);
}

function like_article(post_id){
    var xmlhttp = new XMLHttpRequest();
    xmlhttp.onreadystatechange = function() {
        if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
            //go to another page after paying
            if(this.responseText=="error"){
                document.getElementById("error_message").innerHTML="Error please ocntact the support team."
            }else{
                document.getElementById("like_button_"+post_id).classList.toggle("liked");
                console.log(this.responseText);
                update_number_of_likes(post_id);
            }
        }
    };
    xmlhttp.open("POST", "like_post.php", true);
    xmlhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    if(document.getElementById("like_button_"+post_id).classList.contains("liked")){
        action=0;//unlike
    }
    else{
        action=1;//like
    }
    console.log(action);
    xmlhttp.send("post_id="+post_id+"&action="+action);
}

function update_number_of_likes(post_id){
    var xmlhttp = new XMLHttpRequest();
    xmlhttp.onreadystatechange = function() {
        if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
            //go to another page after paying
            if(this.responseText=="error"){
                document.getElementById("error_message").innerHTML="Error please contact the support team."
            }else{
                document.getElementById("likes_"+post_id).innerHTML=this.responseText;
            }
        }
    };
    xmlhttp.open("POST", "update_number_of_likes.php", true);
    xmlhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    xmlhttp.send("post_id="+post_id);
}
  </script>
  <link rel="stylesheet" href="FaceMocion-gh-pages/css/bootstrap.min.css"/> <!-- Optional -->
    <script src="FaceMocion-gh-pages/jquery.min.js"> </script>
    <!-- Plugin -->
    <link href="FaceMocion-gh-pages/faceMocion.css" rel="stylesheet" type="text/css" />
    <!--<script src="FaceMocion-gh-pages/faceMocion.js"></script>-->

    <script type="text/javascript">

    (function($) {
    	$.fn.extend({
    		faceMocion: function(opciones) {

    			var faceMocion = this;
    			var NombreSelector = "Selector";
    			var DescripcionFace = "--";
    			defaults = {
    				emociones: [{
    					"emocion": "amo",
    					"TextoEmocion": "Lo amo"
    				}, {
    					"emocion": "molesto",
    					"TextoEmocion": "Me molesta"
    				}, {
    					"emocion": "asusta",
    					"TextoEmocion": "Me asusta"
    				}, {
    					"emocion": "divierte",
    					"TextoEmocion": "Me divierte"
    				}, {
    					"emocion": "gusta",
    					"TextoEmocion": "Me gusta"
    				}, {
    					"emocion": "triste",
    					"TextoEmocion": "Me entristece"
    				}, {
    					"emocion": "asombro",
    					"TextoEmocion": "Me asombra"
    				}, {
    					"emocion": "alegre",
    					"TextoEmocion": "Me alegra"
    				}],
    				callback: function() {
    					//callbackhere
    				}
    			};
    			var opciones = $.extend({}, defaults, opciones);

    			$(faceMocion).each(function(index) {
    				var UnicoID = Date.now();
    				$(this).attr("class", $(faceMocion).attr("class") + " " + UnicoID);
    				var EstadoInicial = "alegre";
    				if ($(this).val() != "") {
    					EstadoInicial = $(this).val();
    				} else {
    					$(this).val('alegre');
    				}
    				DescripcionFace = EstadoInicial;
    				ElementoIniciar = '';
    				ElementoIniciar = ElementoIniciar + '<div dato-descripcion="' + DescripcionFace + '" ';
    				ElementoIniciar = ElementoIniciar + 'id-referencia="' + UnicoID;
    				ElementoIniciar = ElementoIniciar + '"  class="' + NombreSelector;
    				ElementoIniciar = ElementoIniciar + ' selectorFace ' + EstadoInicial + '"></div>';
    				$(this).before(ElementoIniciar);
    			});


    			$(document).ready(function() {
    				BarraEmociones = '<div class="faceMocion">';
    				$.each(opciones.emociones, function(index, emo) {
    					BarraEmociones = BarraEmociones + '<div dato-descripcion="' + emo.TextoEmocion;
    					BarraEmociones = BarraEmociones + '" class="' + emo.emocion + '"></div>';
    				});
    				BarraEmociones = BarraEmociones + '</div>';
    				$(document.body).append(BarraEmociones);
    				$('.faceMocion div').hover(function() {
    					var title = $(this).attr('dato-descripcion');
    					$(this).data('tipText', title).removeAttr('dato-descripcion');
    					$('<p class="MensajeTexto"></p>').text(title).appendTo('body').fadeIn('slow');
    				}, function() {
    					$(this).attr('dato-descripcion', $(this).data('tipText'));
    					$('.MensajeTexto').remove();
    				}).mousemove(function(e) {
    					var RatonX = e.pageX - 20;
    					var RatonY = e.pageY - 60;
    					$('.MensajeTexto').css({
    						top: RatonY,
    						left: RatonX
    					})
    				});
    			});
    			$('.' + NombreSelector).hover(function(e) {
    				SelectorEmocion = $(this);
    				var RatonX = e.pageX - 20;
    				var RatonY = e.pageY - 60;
    				$(".faceMocion").css({
    					top: RatonY,
    					left: RatonX
    				});
    				$(".faceMocion").show();
    			});
    			$(document).on("click", ".faceMocion div", function() {

    				SelectorEmocion.attr("class", NombreSelector + " selectorFace  " + $(this).attr('class'));

    				ElInputSeleccionado = SelectorEmocion.attr("id-referencia");
    				$("." + ElInputSeleccionado).val($(this).attr('class'));

    				if (typeof opciones.callback == "function") {
    					opciones.callback(this);
    				}


    			});
    			$(document).mouseup(function(e) {
    				$(".faceMocion").hide();
    			});
    			$(faceMocion).hide();

    		}
    	});
    })(jQuery);


   </script>



  <link href="https://fonts.googleapis.com/css?family=Josefin+Sans&display=swap" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css?family=PT+Sans+Narrow&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.3/css/all.css" integrity="sha384-UHRtZLI+pbxtHCWp1t77Bi1L4ZtiqrqD80Kn4Z8NTSRyMA2Fd33n5dQ8lWUE00s/" crossorigin="anonymous">
  <link href="https://fonts.googleapis.com/css?family=Lato&display=swap" rel="stylesheet">
  <script async src="https://cdn.ampproject.org/v0.js"></script>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>

<meta name="viewport" content="width=device-width, initial-scale=1.0, minimum-scale=1">
   <link rel="stylesheet" type="text/css" href="../style/style.css"/>
</head>
<body style="background-color:white;">

  <nav class="topnav navbar navbar-inverse" style="border-color: #E86100;">
        <div class="container-fluid">
          <div class="navbar-header">
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
              <span class="icon-bar"></span>
              <span class="icon-bar"></span>
              <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" style="color:black;" href="index.php"><img  src="../images/logo.png" alt="" width="125" height="25"/></a>
          </div>
          <div class="collapse navbar-collapse" id="myNavbar">
            <ul class="nav navbar-nav">

          <li><a  href="../index.php"><span class="glyphicon glyphicon-home"></span> Home</a></li>
          <?php
              if(isset($_SESSION['user_id']))
              echo '<li><a href="../main/news.php"><i class="glyphicon glyphicon-bullhorn"></i> Feed</a></li>';
           ?>
          <li><a  href="articles/articles.php"><i class="far fa-newspaper"></i> Articles</a></li>
          <li><a class="active" href="mealplans.php"><span class="glyphicon glyphicon-cutlery"></span> Meal Plans</a></li>
          <li><a href="../workoutplans/workoutplans.php"><i class="fas fa-dumbbell"></i> Workout Plans</a></li>
          <li><a href="#"><i class="glyphicon glyphicon-map-marker"></i> Gyms Around Me </a></li>
          <!--
             if(isset($_SESSION["user_id"]) && isset($_SESSION["profile_type"]) && $_SESSION["profile_type"]==0)
                 echo '<li><a href="memberships/memberships.php"><i class="fas fa-tags"></i> Memberships</a></li>';
         -->
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


      <?php
      include("../database/db_connection.php");
      //session_start();
      $post_id=$_GET["id"];

      $query= 'SELECT * from post as p INNER JOIN post_meal as pt on p.id=pt.id where pt.id='.$post_id;
      $result=$conn->query($query);
      $row = $result->fetch_assoc();
      /*foreach ($row as $col => $val) {
          echo $col." = ".$val."<br>";
      }*/
      echo '<h1 class="articles">'.$row["title_meal"].'</h1>';
      echo '<div class="container">';
      echo  '<p class="date">'.'<i class="far fa-clock">'.'</i>'.' Date uploaded:'."<br>".$row["date"].'</p>'.'</div>';
      //echo  '<div class="date">'.'<br>'.'</div>';
      //echo '<p class="date">'.$row["date"].'</p>';
      echo '<br>';
      echo '<br>';
      echo '<h2>'.$row["subheader"].'</h2>';
      echo '<br>';
      echo '<br>';
      echo '<p>'.nl2br($row["meal_text"]).'</p>';
      ?>


    <div id="reactions">
      <input type="hidden" value="amo" class="facemocion" />
      <input type="hidden" value="asombro" class="facemocion"/>
      <input type="hidden" value="molesto" class="facemocion"/>



    </div>
    <br><br>



    <form action="add_comment.php" method="post">
    <div class="comment-container">
    <div class="comments">
      <input hidden name="id" value="<?php echo $_GET["id"];?>">
      <textarea name="comment" rows="8" cols="80" placeholder="Post a comment..."></textarea>
      <input type="submit" name="" value="comment" class="comments"></input>

        <!--<i onclick="myFunction(x)" class="fa fa-thumbs-up"></i>-->
        <script>
        function myFunction(this) {
        this.classList.toggle("fa-thumbs-down");
      }

        </script>
    </div>
    </div>
    </form>
    <?php
     if(isset($_SESSION["user_id"])){
      $sql2="SELECT * FROM post_like WHERE user_id=".$_SESSION["user_id"]." and post_id=".$_GET["id"];
    }
    $sql3="SELECT * FROM post_like WHERE post_id=".$_GET["id"];
    $result3=$conn->query($sql3);
    $likes=$result3->num_rows;
    $liked="";
    if(isset($_SESSION["user_id"])){
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

                         </div>';
    ?>
      <br><br>
    <div name="comments" id="recent_articles" style="text-align: center;margin: 0 auto;max-width: 700px;word-wrap: break-word;text-align: justify;opacity: 1;">
      <?php
      $query="SELECT * FROM post as p INNER JOIN user_profile as u on p.user_id=u.id INNER JOIN comment_text as ct on p.id=ct.id WHERE p.reply_to_id=".$_GET['id']." ORDER BY p.date DESC";
      $result=$conn->query($query) ;
        if ($result !== FALSE) {
            if ($result->num_rows > 0) {
                while($row = $result->fetch_assoc()) {
                  if($_SESSION["user_id"]==$row["user_id"])
                    $delete_button='<button onclick="delete_comment('.$row["id"].')">Delete Comment</button>';
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
                            <div><!--<span class="fl-bigmug-line-big104"></span>--> <span>'.$row["text"].'</span></div>
                            '.$delete_button.'
                          </div>
                         </div>
                      </div>
                    </div>
                   </div><br>';
                }}}

      ?>
    </div>
      <style>
.fa-thumbs-up, .fa-thumbs-down {
  font-size: 50px;
  cursor: pointer;
  user-select: none;
}

.fa-thumbs-up:hover, .fa-thumbs-down:hover {
  color: darkblue;
}
</style>
    </div>
  </div>
</body>
</html>
<style media="screen">
input.comments{background: #E68100;
border-style: outset;
border-color: inherit;
}
textarea{width:100%;}
.comment-container{text-align: center;}
.comments{display:inline-block;}
  .articles { font-family: 'Josefin Sans', sans-serif; text-align: center;}
  h2,p{
    margin: 0 auto;
    max-width: 700px;
    font-family: 'PT sans narrow', sans-serif;
  }
  h2{font-style: italic;}
  p{font-size: 16px;
  line-height: 25.88854px;}
  .container{margin: 0 auto;
  max-width: 700px;}
    .date{ margin:0;

      display:inline-block;
      background-color: #E86100;
      border-radius: 9px;
      color: white;
    opacity: 75%;
  justify-content: center; }

    	.navbar-inverse .navbar-nav>li>a {
        color: white;




    }
    p.date{opacity: 0.75;}
    body{margin:0 auto;
    padding:10px;}

</style>
