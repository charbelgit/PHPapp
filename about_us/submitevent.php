<?php

if (isset($_POST['submit-event'])) {
    if (!empty($_POST['category'])) {
      $businessName=htmlentities($_POST['businessName']);
      $businessEmail=htmlentities($_POST['businessEmail']);
      $businessPhone=htmlentities($_POST['businessPhone']);
      $category=htmlentities($_POST['category']);
      $country=htmlentities($_POST['country']);
      $area=htmlentities($_POST['Area']);
      $date=htmlentities($_POST['date']);
      $eventName=htmlentities($_POST['eventName']);
      $eventDesc=htmlentities($_POST['eventDesc']);
      $eventTarget=htmlentities($_POST['eventTarget']);
      $eventPricing=htmlentities($_POST['eventPricing']);
      $sql="INSERT INTO events (business_name,business_phone,business_email,event_category,event_country,event_area,event_time,event_name,event_desc,event_target,event_pricing) VALUES ('$businessName','$businessPhone','$businessEmail','$category','$country','$area','$date','$eventName','$eventDesc','$eventTarget','$eventPricing')";
      include ('business/business_account/dbh.inc.php');
      if ( $conn->query($sql) !== FALSE) {
        header('location:listyourevent.php?submitted');

      ;}else {
        echo 'Something went wrong';
      }


    }else {
      header('location:listyourevent.php?emptycategory');
    }
  }else {
    exit('ERROR!');
  }
