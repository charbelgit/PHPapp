<?php
session_start();
if(!isset($_SESSION['business_id'])){
  header('location:login.php');
}
require 'dbh.inc.php';
$id=$_SESSION["business_id"];
 $query="SELECT * FROM business_account WHERE business_account.business_id=".$id;
 $result = $conn->query($query);
 if ($result->num_rows > 0) {
   $row = $result->fetch_assoc();

 }


 ?>
 <!DOCTYPE html>
 <html lang="en" dir="ltr">
   <head>
     <meta charset="utf-8">
     <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
     <link rel="icon" type="images/image/png" href="../../images/icon logo.png">
     <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
     <script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
     <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
     <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
     <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>

     <style media="screen">
     body{
  background: -webkit-linear-gradient(left, #e86100, #e68100);
}
.emp-profile{
  padding: 3%;
  margin-top: 3%;
  margin-bottom: 3%;
  border-radius: 0.5rem;
  background: #fff;
}
.profile-img{
  text-align: center;
}
.profile-img img{
  width: 70%;
  height: 100%;
}
.profile-img .file {
  position: relative;
  overflow: hidden;
  margin-top: -20%;
  width: 70%;
  border: none;
  border-radius: 0;
  font-size: 15px;
  background: #212529b8;
}
.profile-img .file input {
  position: absolute;
  opacity: 0;
  right: 0;
  top: 0;
}
.profile-head h5{
  color: #333;
}
.profile-head h6{
  color: #0062cc;
}
.profile-edit-btn{
  border: none;
  border-radius: 1.5rem;
  width: 70%;
  padding: 2%;
  font-weight: 600;
  color: #6c757d;
  cursor: pointer;
}
.proile-rating{
  font-size: 12px;
  color: #818182;
  margin-top: 5%;
}
.proile-rating span{
  color: #495057;
  font-size: 15px;
  font-weight: 600;
}
.profile-head .nav-tabs{
  margin-bottom:5%;
}
.profile-head .nav-tabs .nav-link{
  font-weight:600;
  border: none;
}
.profile-head .nav-tabs .nav-link.active{
  border: none;
  border-bottom:2px solid #0062cc;
}
.profile-work{
  padding: 14%;
  margin-top: -15%;
}
.profile-work p{
  font-size: 12px;
  color: #818182;
  font-weight: 600;
  margin-top: 10%;
}
.profile-work a{
  text-decoration: none;
  color: #495057;
  font-weight: 600;
  font-size: 14px;
}
.profile-work ul{
  list-style: none;
}
.profile-tab label{
  font-weight: 600;
}
.profile-tab p{
  font-weight: 600;
  color: #0062cc;
}
     </style>
     <title></title>
   </head>
   <body>
     <nav class="navbar navbar-expand-md bg-dark navbar-dark">
  <a class="navbar-brand" href="../index.php"><img src="../../images/logo.png" height="30px"  ></a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#collapsibleNavbar">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse" id="collapsibleNavbar">
    <ul class="navbar-nav">
      <li class="nav-item">
        <?php if (isset($_SESSION['business_id'])):
          echo'<a class="nav-link" href="business_account.php">Home</a>';
          else :
            echo '<a class="nav-link" href="../index.php">Home</a>'; ?>

        <?php endif; ?>

      </li>
      <li class="nav-item">
        <a class="nav-link" href="../pricing/index.php">Pricing</a>
      </li>
      <li><?php if (isset($_SESSION['business_id'])):
        echo '<a class="nav-link" href="mybusinessprofile.php">My Profile</a>';
        ?>

      <?php endif; ?></li>
      <li class="nav-item">
        <?php if (isset($_SESSION['business_id'])):
          echo '<a class="nav-link" href="logout.inc.php">Logout</a>';
          else : echo '<a class="nav-link" href="login.php">Login</a>';

           ?>

        <?php endif; ?>

      </li>

    </ul>
  </div>
 </nav>
 <main>
     <div class="container emp-profile">
       <div class="" align="center" style="margin-bottom:10px;">

       <h6 style="display:inline-block; color:#E86100;">This is how your profile appears to the public</h6>
     </div>
                <div class="row">
                    <div class="col-md-4">
                        <div class="profile-img">
                            <img src="business_logos/<?php echo $row['logo_path']; ?>" alt=""/>

                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="profile-head">
                                    <h5 id="business_name">
                                        <?php echo $row['business_name']; ?>
                                    </h5>
                                    <h6>
                                        <?php echo $row['about']; ?>
                                    </h6>
                                    <p class="proile-rating">RANKINGS : <span>8/10</span></p>
                            <ul class="nav nav-tabs" id="myTab" role="tablist">
                                <li class="nav-item">
                                    <a class="nav-link active" id="home-tab" data-toggle="tab" href="#home" role="tab" aria-controls="home" aria-selected="true">About</a>
                                </li>

                            </ul>
                        </div>
                    </div>

                      <a href="business_editprofile.php" > Edit Profile</a>


                </div>
                <div class="">
                  <a href="#services"> <button type="button" class="btn" name="button">View Services</button></a>

                </div>
              <!--  <div class="row">
                    <div class="col-md-4">
                        <div class="profile-work">
                            <p>WORK LINK</p>
                            <a href="">Website Link</a><br/>
                            <a href="">Bootsnipp Profile</a><br/>
                            <a href="">Bootply Profile</a>
                            <p>SKILLS</p>
                            <a href="">Web Designer</a><br/>
                            <a href="">Web Developer</a><br/>
                            <a href="">WordPress</a><br/>
                            <a href="">WooCommerce</a><br/>
                            <a href="">PHP, .Net</a><br/>
                        </div>
                    </div>-->
                    <div class="col-md-8">
                        <div class="tab-content profile-tab" id="myTabContent">

                                        <div class="row">
                                            <div class="col-md-6">
                                                <label>Business Username</label>
                                            </div>
                                            <div class="col-md-6">
                                                <p><?php echo $row['business_username']; ?></p>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <label>Website</label>
                                            </div>
                                            <div class="col-md-6">
                                                <p> <a href="<?php echo $row['business_website']; ?>"> <?php echo $row['business_website']; ?></a></p>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <label>Email</label>
                                            </div>
                                            <div class="col-md-6">
                                                <p> <a href="mailto:<?php echo $row['business_email']; ?>"> <?php echo $row['business_email']; ?></a></p>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <label>Phone</label>
                                            </div>
                                            <div class="col-md-6">
                                                <p>123 456 7890</p>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <label>Main Services</label>
                                            </div>
                                            <div class="col-md-6">
                                                <p><?php echo $row['main_services']; ?></p>
                                            </div>
                                        </div>
                            </div>

                                        <div class="row">
                                            <div class="col-md-6">
                                                <label>Address</label>
                                            </div>
                                            <div class="col-md-6">
                                                <p><?php echo $row['business_address']; ?></p>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <label>Country</label>
                                            </div>
                                            <div class="col-md-6">
                                                <p><?php echo $row['business_country']; ?></p>
                                            </div>
                                            <div class="col-md-6">
                                                <label>Phone Number</label>
                                            </div>
                                            <div class="col-md-6">
                                                <p><?php echo $row['business_phonenumber']; ?></p>
                                            </div>
                                        </div>




                    </div>
                </div>

        </div>

</main>
<style media="screen">

</style>
   </body>
 </html>
