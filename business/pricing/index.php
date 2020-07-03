<?php


 ?>

 <!DOCTYPE html>
 <html lang="en" dir="ltr">
   <head>
     <meta charset="utf-8">
     <meta name="viewport" content="width=device-width, initial-scale=1.0, minimum-scale=1.0, maximum-scale=1.0 user-scalable=no">
     <link rel="icon" type="images/image/png" href="../../images/icon logo.png">
     <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
     <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
     <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
     <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
     <title> Business</title>
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
        <a class="nav-link" href="../index.php">Home</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="index.php">Pricing</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="#">Login</a>
      </li>
    </ul>
  </div>
</nav>


<div class="pricing-header px-3 py-3 pt-md-5 pb-md-4 mx-auto text-center">
  <h1 class="display-4">Pricing</h1>
  <p class="lead">Make more impact with <strong>SocialNetworkExample!</strong> Our Pricing system is designed to meet your business needs.</p>
</div>

<div class="container">
  <div class="card-deck mb-3 text-center">
    <div class="card mb-4 shadow-sm">
      <div class="card-header">
        <h4 class="my-0 font-weight-normal">Free Trial</h4>
      </div>
      <div class="card-body">
        <h1 class="card-title pricing-card-title">1 <small class="text-muted"> month</small></h1>
        <ul class="list-unstyled mt-3 mb-4">
          <li>Free for a month</li>
          <li>Same features as the premium</li>
          <li>Cancel anytime</li>
          <li>Profile lost if not upgraded</li>
        </ul>
      <a href="../business_account/register.php">  <button type="button" class="btn btn-lg btn-block btn-outline-primary">Sign up for free</button></a>
      </div>
    </div>
    <div class="card mb-4 shadow-sm">
      <div class="card-header">
        <h4 class="my-0 font-weight-normal">Premium</h4>
      </div>
      <div class="card-body">
        <h1 class="card-title pricing-card-title">$50 <small class="text-muted">/ mo</small></h1>
        <ul class="list-unstyled mt-3 mb-4">
          <li>Grow your business</li>
          <li>Share your membership offers & activities</li>
          <li>Receive online payments through SocialNetworkExample</li>
          <li>Become part of the community!</li>
        </ul>
        <button type="button" class="btn btn-lg btn-block btn-primary">Get started</button>
      </div>
    </div>
    <div class="card mb-4 shadow-sm">
      <div class="card-header">
        <h4 class="my-0 font-weight-normal">Contact Us</h4>
      </div>
      <div class="card-body">
        <h1 class="card-title pricing-card-title">24 <small class="text-muted">/ 7</small></h1>
        <ul class="list-unstyled mt-3 mb-4">
          <li>For further assistance contact us!</li>
          <li style="color:white;">business@domain.com</li>
          <li style="color:white;">+961 71 xxx xxx</li>
          <li style="color:white;">For further assistance contact us!</li>
        </ul>
        <button type="button" class="btn btn-lg btn-block btn-primary">Contact us</button>
      </div>
    </div>
  </div>
   </body>
   <style media="screen">
     .bg-dark{background-color:#E86100!important;}
     .btn-outline-primary{color:#E86100; border-color:#E86100;}
     .btn-outline-primary:hover{background:#E86100!important; border-color:white;}
     .btn-primary{background-color:#E86100!important; border-color:white;}
     a:hover{text-decoration:none;}
   </style>
 </html>
