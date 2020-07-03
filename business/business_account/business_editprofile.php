<?php
session_start();
require 'dbh.inc.php';
if (!isset($_SESSION['business_id'])) {
  header('Location: login.php');
}

$query="SELECT * FROM business_account  WHERE business_account.business_id=".$_SESSION['business_id'];
$result = $conn->query($query);
if (!empty($result) && $result->num_rows > 0) {
  $row = $result->fetch_assoc();
}else {
  echo 'no rsult';
}
 ?>

 <!DOCTYPE html>
 <html lang="en" dir="ltr">
   <head>
     <meta charset="utf-8">
     <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
     <meta name="description" content="">
     <link rel="icon" type="images/image/png" href="../../images/icon logo.png">
     <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
     <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
     <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
     <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>


     <title>Business Profile | <?php echo $_SESSION['business_name']; ?></title>
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
<?php if (isset($_GET['saved']) && isset($_SESSION['business_id'])): echo '<div align="center"><h4 style="color:red; display:inline-block;">You successfully updated your profile!</h4></div>' ?>

<?php endif; ?>

 <div class="col">
    <div class="row">
      <div class="col mb-3">
        <div class="card">
          <div class="card-body">
            <div class="e-profile">
              <div class="row">
                <div class="col-12 col-sm-auto mb-3">
                  <div class="mx-auto" style="width: 140px;">
                    <div class="d-flex justify-content-center align-items-center rounded" style="height: 140px; ">
                     <br> <img src="business_logos/<?php echo $row['logo_path']; ?>" style="height:140px;width:140px;" alt="Business Logo">
                    </div>
                  </div>
                </div>
                <div class="col d-flex flex-column flex-sm-row justify-content-between mb-3">
                  <div class="text-center text-sm-left mb-2 mb-sm-0">
                    <h4 class="pt-sm-2 pb-1 mb-0 text-nowrap"><?php echo $_SESSION['business_name']; ?></h4>
                    <p class="mb-0">@<?php echo $_SESSION['business_username']; ?></p>

                    <div class="mt-2">
                    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#myModal" style="background:#E86100; border-style:none; " id="btn-photo">Change Photo</button>
                    </div>

                    <!-- MODAL -->
                    <div class="modal fade" id="myModal" role="dialog" style="width:97%; max-height:812; margin-top:100px;">
                        <div class="modal-dialog" >

                          <!-- ====================================================== Modal content ============================================================================================= -->
                          <div class="modal-content">
                            <div class="modal-header">
                              <button type="button" class="close" data-dismiss="modal">&times;</button>
                              <h4 class="modal-title">Post Image</h4>
                            </div>
                            <div class="modal-body">
                              <form id="photo-form" class="form-group" action="business_logo.php" method="POST" enctype="multipart/form-data">


                                <input hidden name="id" value="<?php echo $_SESSION['business_id'];?>">
                                <input type="file"  onchange="readURL(this);" name="file" class="" id="customFile" value="upload image" ><br> <br>




                                <button type="submit" class="btn btn-primary" name="submit-file">Done
                                  <span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span>
                                  <span class="sr-only">Loading...</span>
                                </button>
                              </form>
                              <img  class="card-img-top" id="blah" src="" alt="your image" style="height:140px;width:140px;"/><br><br>
                            </div>
                            <div class="modal-footer">
                              <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                            </div>
                          </div>

                        </div>
                      </div>
                    <!-- ====================================================================== End Modal======================================================================================================== -->

                  </div>

                </div>
              </div>
              <ul class="nav nav-tabs">
                <li class="nav-item"><a href="" class="active nav-link">Settings</a></li>
              </ul>
              <br>
              <a href="update_businesspassword.php">Change Password</a>

              <form class="" action="save_profile.php" method="post">


              <div class="tab-content pt-3">
                <div class="tab-pane active">
                  <form class="form" novalidate="">
                    <div class="row">
                      <div class="col">
                        <div class="row">
                          <div class="col">
                            <div class="form-group">
                              <label>Business Name</label>
                              <input class="form-control" type="text" name="name" placeholder="John Smith" value="<?php echo $_SESSION['business_name']; ?>">
                            </div>
                          </div>
                          <div class="col">
                            <div class="form-group">
                              <label>Username</label>
                              <input class="form-control" name="username" type="text" name="username" placeholder="johnny.s" value="<?php echo $_SESSION['business_username']; ?>">
                            </div>
                          </div>
                        </div>
                        <div class="row">
                          <div class="col">
                            <div class="form-group">
                              <label>Email</label>
                              <input name="email" class="form-control" type="text" placeholder="user@example.com" value="<?php echo $_SESSION['business_email']; ?>">
                            </div>
                            <div class="form-group">
                              <label><?php echo $_SESSION['business_name'] ?>'s Website</label>
                              <input name="website" class="form-control" type="url" placeholder="https://yourdomain.com" value="<?php echo $_SESSION['business_website']; ?>">
                              <small class="text-muted">Enter your website (if applicable)</small>
                            </div>
                          </div>
                        </div>
                        <div class="row">
                          <div class="col mb-3">
                            <div class="form-group">
                              <label>About</label>
                              <textarea name="about" class="form-control" rows="5" placeholder="Describe your business and the value you will offer to the users"><?php  echo $row['about']; ?></textarea>
                            </div>
                          </div>
                        </div>
                        <div class="row">
                          <div class="col mb-3">
                            <div class="form-group">
                              <label>Main services</label>
                              <textarea name="main_services" class="form-control" rows="5" placeholder="Tell us what are your main services and what is the price range"><?php echo $row['main_services']; ?></textarea>
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
                    <div class="row">
                      <div class="col-12 col-sm-6 mb-3">
                        <div class="mb-2"><b>Some Details</b></div>
                        <div class="row">
                          <div class="col">
                            <div class="form-group">
                              <label>Years in Business</label>
                              <input name="years" class="form-control" type="text" placeholder="How many years have your been operating" value="<?php echo $row['years']; ?>">
                              <small class="text-muted">This metric helps people know you better</small>
                            </div>
                          </div>
                        </div>
                        <div class="row">
                          <div class="col">
                            <div class="form-group">
                              <label>Your Mission</label>
                              <input name="mission" class="form-control" type="text" placeholder="e.g. Best fitness environment" value="<?php echo $row['mission']; ?>">
                              <small class="text-muted">Describe <?php echo $_SESSION['business_name']; ?>'s mission</small>
                            </div>
                          </div>
                        </div>
                        <div class="row">
                          <div class="col">
                            <div class="form-group">
                              <label>Location</label>
                              <input name="address" class="form-control" type="text" placeholder="" value= " <?php echo $row['business_address'];?>"></div>

                          </div>
                          <div class="col">
                            <div class="form-group">
                              <label>Phone Number</label>
                              <input name="phone_number" class="form-control" type="number" placeholder="" value= " <?php echo $row['business_phonenumber'];?>"></div>

                          </div>
                        </div>
                      </div>
                    <!--  <div class="col-12 col-sm-5 offset-sm-1 mb-3">
                        <div class="mb-2"><b>Keeping in Touch</b></div>
                        <div class="row">
                          <div class="col">
                            <label>Email Notifications</label>
                            <div class="custom-controls-stacked px-2">
                              <div class="custom-control custom-checkbox">
                                <input type="checkbox" class="custom-control-input" id="notifications-blog" checked="">
                                <label class="custom-control-label" for="notifications-blog">Blog posts</label>
                              </div>
                              <div class="custom-control custom-checkbox">
                                <input type="checkbox" class="custom-control-input" id="notifications-news" checked="">
                                <label class="custom-control-label" for="notifications-news">Newsletter</label>
                              </div>
                              <div class="custom-control custom-checkbox">
                                <input type="checkbox" class="custom-control-input" id="notifications-offers" checked="">
                                <label class="custom-control-label" for="notifications-offers">Personal Offers</label>
                              </div>
                            </div>
                          </div>
                        </div>
                      </div>-->
                    </div>
                    <div class="row">
                      <div class="col d-flex justify-content-end">
                        <button class="btn btn-primary" type="submit">Save Changes</button>
                      </div>
                    </div>
                  </form>

                </div>
              </div>
            </form>
            </div>
          </div>
        </div>
      </div>

      <div class="col-12 col-md-3 mb-3">
        <div class="card mb-3">
          <div class="card-body">
            <div class="px-xl-3">
              <button class="btn btn-block btn-secondary">
                <i class="fa fa-sign-out"></i>
                <a href="logout.inc.php" style="text-decoration:none; color:white;"><span>Logout</span></a>
              </button>
            </div>
          </div>
        </div>
        <div class="card">
          <div class="card-body">
            <h6 class="card-title font-weight-bold">Support</h6>
            <p class="card-text">Get fast, free help from our friendly assistants.</p>
            <button type="button" class="btn btn-primary">Contact Us</button>
          </div>
        </div>
        <br>
        <div class="card">

          <div class="card-body">
            <h6 class="card-title font-weight-bold">Add services</h6>
            <p class="card-text">Add your business services to your page so users can subscribe to them!</p>
            <button type="button" class="btn btn-primary">Add Service</button>
            <div class="tex-muted"> <small class="text-muted">Add Prices and other configurations here</small> </div>



          </div>
        </div>
      </div>
    </div>

  </div>
</div>
</div>
</main>
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
   </body>
   <style media="screen">
     .bg-dark{background-color:#E86100!important;}
     main{margin-top:10px;}
   </style>
 </html>
