<?php session_start();
include("../database/db_connection.php");
$id=$_SESSION["user_id"];

$query="SELECT * FROM user_profile as u INNER JOIN user as us on u.id=us.id WHERE u.id=".$id;
$result = $conn->query($query);
if ($result->num_rows > 0) {
  $row = $result->fetch_assoc();
}

if (isset($row['phone_number'])) {
  $phone_number=$row['phone_number'];
}else {
  $phone_number='';
}
?>

<!DOCTYPE html>

<html lang="en" dir="ltr">
  <head>
    <link rel="stylesheet" href="../flag-icon-css-master/css/flag-icon.min.css">
    <link rel="stylesheet" href="../flag-icon-css-master/css/flag-icon.css">
    <link rel="stylesheet" href="https://github.com/lipis/flag-icon-css/blob/master/less/flag-icon-list.less">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/flag-icon-css/3.3.0/css/flag-icon.min.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.3/css/all.css" integrity="sha384-UHRtZLI+pbxtHCWp1t77Bi1L4ZtiqrqD80Kn4Z8NTSRyMA2Fd33n5dQ8lWUE00s/" crossorigin="anonymous">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.0.5/css/font-awesome.min.css">
    <script src="js/jquery/jquery-1.8.2.min.js"></script>
    <link href="./css/jquery.filer.css" type="text/css" rel="stylesheet" />
    <link href="./css/themes/jquery.filer-dragdropbox-theme.css" type="text/css" rel="stylesheet" />
    <script src="http://code.jquery.com/jquery-3.1.0.min.js"></script>
    <script src="./js/jquery.filer.min.js"></script>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="../style/style.css">
    <link rel="icon" type="images/image/png" href="../images/icon logo.png"/>
    <meta charset="utf-8">
     <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>My Profile</title>
  </head>
  <body>

      <style> .navbar-inverse .navbar-nav>li>a {color:white;}</style>
    <nav class="topnav navbar navbar-inverse" style="border-color: #E86100;">
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

        <li><a href="../index.php"><span class="glyphicon glyphicon-home"></span> Home</a></li>
        <?php
            if(isset($_SESSION['user_id']))
            echo '<li><a href="../main/news.php"><i class="glyphicon glyphicon-bullhorn"></i> Feed</a></li>';
         ?>
        <li><a  href="articles.php"><i class="far fa-newspaper"></i> Articles</a></li>
        <li><a href="#MEalplans"><span class="glyphicon glyphicon-cutlery"></span> Meal Plans</a></li>
        <li><a href="#workoutplans"><i class="fas fa-dumbbell"></i> Workout Plans</a></li>
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
          echo '<a class="active" href="profile.php"><i class="fa fa-fw fa-user"></i> My Profile</a>';}?></li>
            <li><?php
        if(!isset($_SESSION["user_id"])) {
          echo '<a href="../login/login_form.html"><i class="fas fa-sign-in-alt"></i> Login</a>';}
          else echo '<a href="../logout/logout.php"><span class="glyphicon glyphicon-off"></span> Logout</a>';
        ?></li>
          </ul>
        </div>
      </div>
    </nav>


    <div class="container">
    <h1><span class="fa fa-paint-brush" style="color:#A13D2D;"></span> Edit Profile</h1>
  	<hr>
	<div class="row">
      <!-- left column -->

      <div class="col-md-3">
        <div class="text-center profile-avatar-wrap">
        <form action="upload_image.php" method="post" enctype="multipart/form-data">
          <img src="<?php echo $row["image_path"];?>" style="height:200px;width:200px;" class="avatar img-circle" alt="avatar" id="profile-avatar">
          <h5><span class= "glyphicon glyphicon-download-alt" aria-hidden="true"></span>  <b>Drag and Drop</b> your profile picture here <br><br> OR </h5>
        <!--  <form class="box" method="post" action="" enctype="multipart/form-data">
            <div class="box__input">
              <input class="box__file" type="file" name="files[]" id="file" data-multiple-caption="{count} files selected" multiple />
              <label for="file"><strong>Choose a file</strong><span class="box__dragndrop"> or drag it here</span>.</label>
              <button class="box__button" type="submit">Upload</button>
            </div>
            <div class="box__uploading">Uploading&hellip;</div>
            <div class="box__success">Done!</div>
            <div class="box__error">Error! <span></span>.</div>
          </form>-->
          <input type="file" class="form-control userProfile" name="uploader" id="uploader">
          <button type="submit">Save image</button>
          </form>
        </div>
      </div>

      <!-- edit form column -->
      <div class="col-md-9 personal-info">
        <div class="alert alert-info alert-dismissable">
          <a class="panel-close close" data-dismiss="alert">×</a>
          <i class="fa fa-coffee"></i>
          This is an <strong>.alert</strong>.Used to show profile completion percentage
        </div>
        <h3>Personal info</h3>

        <form class="form-horizontal" role="form">
          <div class="form-group">
            <label class="col-lg-3 control-label">First name:</label>
            <div class="col-lg-8">
              <input class="form-control" id="first_name" name='name' type="text" value='<?php if(strtolower($row["first_name"])!="unset" && $row["first_name"]!="")echo $row["first_name"];?>'>
            </div>
          </div>
          <div class="form-group">
            <label class="col-lg-3 control-label">Last name:</label>
            <div class="col-lg-8">
              <input class="form-control" id="last_name" type="text" value="<?php if(strtolower($row["last_name"])!="unset" && $row["last_name"]!="")echo $row["last_name"];?>">
            </div>
          </div>
          <div class="form-group">
            <label class="col-lg-3 control-label">Phone Number:</label>
            <div class="col-lg-8">
              <input class="form-control" id="phone_number" name="phone_number" type="text" value="<?php echo $phone_number;?>">
              <small class="text-muted">Your phone number will be shared with potential clients.</small>
            </div>
          </div>
          <div class="form-group">
            <label class="col-lg-3 control-label">Experience (in years):</label>
            <div class="col-lg-8">
              <input class="form-control" id="experience" type="text" value="<?php echo $row["experience"];?>">
            </div>
          </div>
          <?php if (isset($_SESSION['user_id']) && $_SESSION['profile_type']==0) {
            echo'';
          } ?>

          <?php
          if ($_SESSION['profile_type']==0) {

            if(strtolower($row["discipline"])!="unset" && strtolower($row["discipline"])!=""){
              $option = '<option selected value ='.$row["discipline"].'>'.$row["discipline"].'</option>';
            }

            echo '<div class="form-group">
              <label class="col-lg-3 control-label">Main Discipline:</label>

              <div class="col-lg-8">
                <div class="ui-select">
                  <select id="discipline" name="discipline" class="form-control">
                  '.$option.'
                  <option value="Aerobics">Aerobics</option>
                  <option value="Bodybuilding">Bodybuilding</option>
                  <option value="Yoga">Yoga</option>
                  <option value="Nutrition">Nutrition</option>
                  <option value="Diet">Diet</option>
                  <option value="Physiotherapy">Physiotherapy</option>
                  <option value="Team Sports">Team Sports</option>
                  <option value="Martial Arts">Martial Arts</option>
                  <option value="Powerlifting">Powerlifting</option>
                  <option value="Life Coach/Motivation">Life Coach/Motivation</option>
                  <option value="Ski/ Winter Sports">Ski/Winter Sports</option>
                  <option value="Aquatic Sports">Aquatic Sports</option>
                  <option value="Wrestling">Wrestling</option>
                  <option value="Motor Sports">Motor Sports</option>
                  <option value="Golf">Golf</option>
                  <option value="Calisthenics">Calisthenics</option>
                  <option value="Parkour">Parkour</option>
                  <option value="Gymnastics">Gymnastics</option>
                  <option value="Dance">Dance</option>
                  <option value="Hiking">Hiking</option>
                  <option value="Running/Sprinting">Running/Sprinting</option>
                  <option value="Tennis">Tennis</option>
                  <option value="Horse Riding">Horse Riding</option>
                  <option value="Zumba">Zumba</option>
                  <option value="Pilates">Pilates</option>
                  <option value="Sports Medicine">Sports Medicine</option>
                  <option value="Sports Injury Physician">Sports Injury Physician</option>
                  <option value="Billiards">Billiards</option>
                  <option value="Diving">Diving</option>
                  <option value="Stake Board">Skate Board</option>
                  <option value="Ice Skating">Ice Skating</option>
                  <option value="Chess">Chess</option>
                  <option value="Massage">Massage</option>
                  </select>
    <small class="text-muted">What is your main focus on?</small>
                </div>
              </div>
            </div>';
          }

           ?>

          <div class="form-group">
            <label class="col-lg-3 control-label">Introduce yourself:</label>
            <div class="col-lg-8">
          <textarea  class="form-control" id="description" name="description"  <?php if(strtolower($row["description"])=="unset" && strtolower($row["description"]==""))echo 'placeholder="Tell us about yourself..."'; ?>><?php if(strtolower($row["description"])!="unset")echo $row["description"];?></textarea> <br>
        </div>
        </div>
        <br><br>
          <!-- Countries-->
          <div class="form-group">
            <label class="col-lg-3 control-label"><span class="glyphicon glyphicon-flag"></span> Choose country:</label>
            <div class="col-lg-8">
              <div class="ui-select">
                <select id="country" name="country" class="form-control">
                <?php
                if(strtolower($row["country"])!="unset" && strtolower($row["country"])!=""){
                  echo '<option selected value ='.$row["country"].'>'.$row["country"].'</option>';
                }
                ?>
                <option value="Afghanistan">Afghanistan</option>
                <option value="Åland Islands">Åland Islands</option>
                <option value="Albania">Albania</option>
                <option value="Algeria">Algeria</option>
                <option value="American Samoa">American Samoa</option>
                <option value='ad' data-image="country-dropdown/images/msdropdown/icons/blank.gif" data-imagecss="flag ad" data-title="Andorra" value="Andorra">Andorra</option>
                <option value="Angola">Angola</option>
                <option value="Anguilla">Anguilla</option>
                <option value="Antarctica">Antarctica</option>
                <option value="Antigua and Barbuda">Antigua and Barbuda</option>
                <option value="Argentina">Argentina</option>
                <option value="Armenia">Armenia</option>
                <option value="Aruba">Aruba</option>
                <option value="Australia">Australia</option>
                <option value="Austria">Austria</option>
                <option value="Azerbaijan">Azerbaijan</option>
                <option value="Bahamas">Bahamas</option>
                <option value="Bahrain">Bahrain</option>
                <option value="Bangladesh">Bangladesh</option>
                <option value="Barbados">Barbados</option>
                <option value="Belarus">Belarus</option>
                <option value="Belgium">Belgium</option>
                <option value="Belize">Belize</option>
                <option value="Benin">Benin</option>
                <option value="Bermuda">Bermuda</option>
                <option value="Bhutan">Bhutan</option>
                <option value="Bolivia">Bolivia</option>
                <option value="Bosnia and Herzegovina">Bosnia and Herzegovina</option>
                <option value="Botswana">Botswana</option>
                <option value="Bouvet Island">Bouvet Island</option>
                <option value="Brazil">Brazil</option>
                <option value="British Indian Ocean Territory">British Indian Ocean Territory</option>
                <option value="Brunei Darussalam">Brunei Darussalam</option>
                <option value="Bulgaria">Bulgaria</option>
                <option value="Burkina Faso">Burkina Faso</option>
                <option value="Burundi">Burundi</option>
                <option value="Cambodia">Cambodia</option>
                <option value="Cameroon">Cameroon</option>
                <option value="Canada">Canada</option>
                <option value="Cape Verde">Cape Verde</option>
                <option value="Cayman Islands">Cayman Islands</option>
                <option value="Central African Republic">Central African Republic</option>
                <option value="Chad">Chad</option>
                <option value="Chile">Chile</option>
                <option value="China">China</option>
                <option value="Christmas Island">Christmas Island</option>
                <option value="Cocos (Keeling) Islands">Cocos (Keeling) Islands</option>
                <option value="Colombia">Colombia</option>
                <option value="Comoros">Comoros</option>
                <option value="Congo">Congo</option>
                <option value="Congo, The Democratic Republic of The">Congo, The Democratic Republic of The</option>
                <option value="Cook Islands">Cook Islands</option>
                <option value="Costa Rica">Costa Rica</option>
                <option value="Cote D'ivoire">Cote D'ivoire</option>
                <option value="Croatia">Croatia</option>
                <option value="Cuba">Cuba</option>
                <option value="Cyprus">Cyprus</option>
                <option value="Czech Republic">Czech Republic</option>
                <option value="Denmark">Denmark</option>
                <option value="Djibouti">Djibouti</option>
                <option value="Dominica">Dominica</option>
                <option value="Dominican Republic">Dominican Republic</option>
                <option value="Ecuador">Ecuador</option>
                <option value="Egypt">Egypt</option>
                <option value="El Salvador">El Salvador</option>
                <option value="Equatorial Guinea">Equatorial Guinea</option>
                <option value="Eritrea">Eritrea</option>
                <option value="Estonia">Estonia</option>
                <option value="Ethiopia">Ethiopia</option>
                <option value="Falkland Islands (Malvinas)">Falkland Islands (Malvinas)</option>
                <option value="Faroe Islands">Faroe Islands</option>
                <option value="Fiji">Fiji</option>
                <option value="Finland">Finland</option>
                <option value="France">France</option>
                <option value="French Guiana">French Guiana</option>
                <option value="French Polynesia">French Polynesia</option>
                <option value="French Southern Territories">French Southern Territories</option>
                <option value="Gabon">Gabon</option>
                <option value="Gambia">Gambia</option>
                <option value="Georgia">Georgia</option>
                <option value="Germany">Germany</option>
                <option value="Ghana">Ghana</option>
                <option value="Gibraltar">Gibraltar</option>
                <option value="Greece"><span class="flag-icon flag-icon-gr"></span> Greece</option>
                <option value="Greenland">Greenland</option>
                <option value="Grenada">Grenada</option>
                <option value="Guadeloupe">Guadeloupe</option>
                <option value="Guam">Guam</option>
                <option value="Guatemala">Guatemala</option>
                <option value="Guernsey">Guernsey</option>
                <option value="Guinea">Guinea</option>
                <option value="Guinea-bissau">Guinea-bissau</option>
                <option value="Guyana">Guyana</option>
                <option value="Haiti">Haiti</option>
                <option value="Heard Island and Mcdonald Islands">Heard Island and Mcdonald Islands</option>
                <option value="Holy See (Vatican City State)">Holy See (Vatican City State)</option>
                <option value="Honduras">Honduras</option>
                <option value="Hong Kong">Hong Kong</option>
                <option value="Hungary">Hungary</option>
                <option value="Iceland">Iceland</option>
                <option value="India">India</option>
                <option value="Indonesia">Indonesia</option>
                <option value="Iran, Islamic Republic of">Iran, Islamic Republic of</option>
                <option value="Iraq">Iraq</option>
                <option value="Ireland">Ireland</option>
                <option value="Isle of Man">Isle of Man</option>
                <option value="Israel">Israel</option>
                <option value="Italy">Italy</option>
                <option value="Jamaica">Jamaica</option>
                <option value="Japan">Japan</option>
                <option value="Jersey">Jersey</option>
                <option value="Jordan">Jordan</option>
                <option value="Kazakhstan">Kazakhstan</option>
                <option value="Kenya">Kenya</option>
                <option value="Kiribati">Kiribati</option>
                <option value="Korea, Democratic People's Republic of">Korea, Democratic People's Republic of</option>
                <option value="Korea, Republic of">Korea, Republic of</option>
                <option value="Kuwait">Kuwait</option>
                <option value="Kyrgyzstan">Kyrgyzstan</option>
                <option value="Lao People's Democratic Republic">Lao People's Democratic Republic</option>
                <option value="Latvia">Latvia</option>
                <option value="Lebanon">Lebanon</option>
                <option value="Lesotho">Lesotho</option>
                <option value="Liberia">Liberia</option>
                <option value="Libyan Arab Jamahiriya">Libyan Arab Jamahiriya</option>
                <option value="Liechtenstein">Liechtenstein</option>
                <option value="Lithuania">Lithuania</option>
                <option value="Luxembourg">Luxembourg</option>
                <option value="Macao">Macao</option>
                <option value="Macedonia, The Former Yugoslav Republic of">Macedonia, The Former Yugoslav Republic of</option>
                <option value="Madagascar">Madagascar</option>
                <option value="Malawi">Malawi</option>
                <option value="Malaysia">Malaysia</option>
                <option value="Maldives">Maldives</option>
                <option value="Mali">Mali</option>
                <option value="Malta">Malta</option>
                <option value="Marshall Islands">Marshall Islands</option>
                <option value="Martinique">Martinique</option>
                <option value="Mauritania">Mauritania</option>
                <option value="Mauritius">Mauritius</option>
                <option value="Mayotte">Mayotte</option>
                <option value="Mexico">Mexico</option>
                <option value="Micronesia, Federated States of">Micronesia, Federated States of</option>
                <option value="Moldova, Republic of">Moldova, Republic of</option>
                <option value="Monaco">Monaco</option>
                <option value="Mongolia">Mongolia</option>
                <option value="Montenegro">Montenegro</option>
                <option value="Montserrat">Montserrat</option>
                <option value="Morocco">Morocco</option>
                <option value="Mozambique">Mozambique</option>
                <option value="Myanmar">Myanmar</option>
                <option value="Namibia">Namibia</option>
                <option value="Nauru">Nauru</option>
                <option value="Nepal">Nepal</option>
                <option value="Netherlands">Netherlands</option>
                <option value="Netherlands Antilles">Netherlands Antilles</option>
                <option value="New Caledonia">New Caledonia</option>
                <option value="New Zealand">New Zealand</option>
                <option value="Nicaragua">Nicaragua</option>
                <option value="Niger">Niger</option>
                <option value="Nigeria">Nigeria</option>
                <option value="Niue">Niue</option>
                <option value="Norfolk Island">Norfolk Island</option>
                <option value="Northern Mariana Islands">Northern Mariana Islands</option>
                <option value="Norway">Norway</option>
                <option value="Oman">Oman</option>
                <option value="Pakistan">Pakistan</option>
                <option value="Palau">Palau</option>
                <option value="Palestinian Territory, Occupied">Palestinian Territory, Occupied</option>
                <option value="Panama">Panama</option>
                <option value="Papua New Guinea">Papua New Guinea</option>
                <option value="Paraguay">Paraguay</option>
                <option value="Peru">Peru</option>
                <option value="Philippines">Philippines</option>
                <option value="Pitcairn">Pitcairn</option>
                <option value="Poland">Poland</option>
                <option value="Portugal">Portugal</option>
                <option value="Puerto Rico">Puerto Rico</option>
                <option value="Qatar">Qatar</option>
                <option value="Reunion">Reunion</option>
                <option value="Romania">Romania</option>
                <option value="Russian Federation">Russian Federation</option>
                <option value="Rwanda">Rwanda</option>
                <option value="Saint Helena">Saint Helena</option>
                <option value="Saint Kitts and Nevis">Saint Kitts and Nevis</option>
                <option value="Saint Lucia">Saint Lucia</option>
                <option value="Saint Pierre and Miquelon">Saint Pierre and Miquelon</option>
                <option value="Saint Vincent and The Grenadines">Saint Vincent and The Grenadines</option>
                <option value="Samoa">Samoa</option>
                <option value="San Marino">San Marino</option>
                <option value="Sao Tome and Principe">Sao Tome and Principe</option>
                <option value="Saudi Arabia">Saudi Arabia</option>
                <option value="Senegal">Senegal</option>
                <option value="Serbia">Serbia</option>
                <option value="Seychelles">Seychelles</option>
                <option value="Sierra Leone">Sierra Leone</option>
                <option value="Singapore">Singapore</option>
                <option value="Slovakia">Slovakia</option>
                <option value="Slovenia">Slovenia</option>
                <option value="Solomon Islands">Solomon Islands</option>
                <option value="Somalia">Somalia</option>
                <option value="South Africa">South Africa</option>
                <option value="South Georgia and The South Sandwich Islands">South Georgia and The South Sandwich Islands</option>
                <option value="Spain">Spain</option>
                <option value="Sri Lanka">Sri Lanka</option>
                <option value="Sudan">Sudan</option>
                <option value="Suriname">Suriname</option>
                <option value="Svalbard and Jan Mayen">Svalbard and Jan Mayen</option>
                <option value="Swaziland">Swaziland</option>
                <option value="Sweden">Sweden</option>
                <option value="Switzerland">Switzerland</option>
                <option value="Syrian Arab Republic">Syrian Arab Republic</option>
                <option value="Taiwan, Province of China">Taiwan, Province of China</option>
                <option value="Tajikistan">Tajikistan</option>
                <option value="Tanzania, United Republic of">Tanzania, United Republic of</option>
                <option value="Thailand">Thailand</option>
                <option value="Timor-leste">Timor-leste</option>
                <option value="Togo">Togo</option>
                <option value="Tokelau">Tokelau</option>
                <option value="Tonga">Tonga</option>
                <option value="Trinidad and Tobago">Trinidad and Tobago</option>
                <option value="Tunisia">Tunisia</option>
                <option value="Turkey">Turkey</option>
                <option value="Turkmenistan">Turkmenistan</option>
                <option value="Turks and Caicos Islands">Turks and Caicos Islands</option>
                <option value="Tuvalu">Tuvalu</option>
                <option value="Uganda">Uganda</option>
                <option value="Ukraine">Ukraine</option>
                <option value="United Arab Emirates">United Arab Emirates</option>
                <option value="United Kingdom">United Kingdom</option>
                <option value="United States">United States</option>
                <option value="United States Minor Outlying Islands">United States Minor Outlying Islands</option>
                <option value="Uruguay">Uruguay</option>
                <option value="Uzbekistan">Uzbekistan</option>
                <option value="Vanuatu">Vanuatu</option>
                <option value="Venezuela">Venezuela</option>
                <option value="Viet Nam">Viet Nam</option>
                <option value="Virgin Islands, British">Virgin Islands, British</option>
                <option value="Virgin Islands, U.S.">Virgin Islands, U.S.</option>
                <option value="Wallis and Futuna">Wallis and Futuna</option>
                <option value="Western Sahara">Western Sahara</option>
                <option value="Yemen">Yemen</option>
                <option value="Zambia">Zambia</option>
                <option value="Zimbabwe">Zimbabwe</option>
            </select>
              </div>
            </div>
          </div>
          <!--countries-->
          <div class="form-group">
            <label class="col-lg-3 control-label"><span class="glyphicon glyphicon-envelope"></span> Email:</label>
            <div class="col-lg-8">
              <p class="" name="email" type="text" value=' <?php echo $row["email"];  ?>' ><?php echo $row["email"];?></p>
            </div>
          </div>
          <div class="form-group">
            <label class="col-lg-3 control-label">Time Zone:</label>
            <div class="col-lg-8">
              <div class="ui-select">
                <select id="user_time_zone" class="form-control">
                <?php
                  if(strtolower($row["timezone"])!="unset"){
                    echo '<option selected value ='.$row["timezone"].'>'.$row["timezone"].'</option>';
                  }
                ?>
                  <option value="(GMT -12:00) Eniwetok, Kwajalein">(GMT -12:00) Eniwetok, Kwajalein</option>
                	<option value="(GMT -11:00) Midway Island, Samoa">(GMT -11:00) Midway Island, Samoa</option>
                	<option value="(GMT -10:00) Hawaii">(GMT -10:00) Hawaii</option>
                	<option value="-09:30(GMT -9:30) Taiohae">-09:30(GMT -9:30) Taiohae</option>
                	<option value="-09:00(GMT -9:00) Alaska">-09:00(GMT -9:00) Alaska</option>
                	<option value="-08:00(GMT -8:00) Pacific Time (US &amp; Canada)">-08:00(GMT -8:00) Pacific Time (US &amp; Canada)</option>
                	<option value="-07:00(GMT -7:00) Mountain Time (US &amp; Canada)">-07:00(GMT -7:00) Mountain Time (US &amp; Canada)</option>
                	<option value="-06:00(GMT -6:00) Central Time (US &amp; Canada), Mexico City">-06:00(GMT -6:00) Central Time (US &amp; Canada), Mexico City</option>
                	<option value="-05:00(GMT -5:00) Eastern Time (US &amp; Canada), Bogota, Lima">-05:00(GMT -5:00) Eastern Time (US &amp; Canada), Bogota, Lima</option>
                	<option value="-04:30(GMT -4:30) Caracas">(GMT -4:30) Caracas</option>
                	<option value="-04:00(GMT -4:00) Atlantic Time (Canada), Caracas, La Paz">(GMT -4:00) Atlantic Time (Canada), Caracas, La Paz</option>
                	<option value="-03:30(GMT -3:30) Newfoundland">(GMT -3:30) Newfoundland</option>
                	<option value="-03:00(GMT -3:00) Brazil, Buenos Aires, Georgetown">(GMT -3:00) Brazil, Buenos Aires, Georgetown</option>
                	<option value="-02:00">(GMT -2:00) Mid-Atlantic</option>
                	<option value="-01:00(GMT -1:00) Azores, Cape Verde Islands">(GMT -1:00) Azores, Cape Verde Islands</option>
                	<option value="+00:00" <?php if(strtolower($row["timezone"])=="unset" && strtolower($row["timezone"])=="") echo 'selected="selected"';?>>(GMT) Western Europe Time, London, Lisbon, Casablanca</option>
                	<option value="+01:00 (GMT +1:00) Brussels, Copenhagen, Madrid, Paris">(GMT +1:00) Brussels, Copenhagen, Madrid, Paris</option>
                	<option value="+02:00 (GMT +2:00) Kaliningrad, South Africa">(GMT +2:00) Kaliningrad, South Africa</option>
                	<option value="+03:00">(GMT +3:00) Baghdad, Riyadh, Moscow, St. Petersburg</option>
                	<option value="+03:50">(GMT +3:30) Tehran</option>
                	<option value="+04:00">(GMT +4:00) Abu Dhabi, Muscat, Baku, Tbilisi</option>
                	<option value="+04:30">(GMT +4:30) Kabul</option>
                	<option value="+05:00">(GMT +5:00) Ekaterinburg, Islamabad, Karachi, Tashkent</option>
                	<option value="+05:30">(GMT +5:30) Bombay, Calcutta, Madras, New Delhi</option>
                	<option value="+05:45">(GMT +5:45) Kathmandu, Pokhara</option>
                	<option value="+06:00">(GMT +6:00) Almaty, Dhaka, Colombo</option>
                	<option value="+06:30">(GMT +6:30) Yangon, Mandalay</option>
                	<option value="+07:00">(GMT +7:00) Bangkok, Hanoi, Jakarta</option>
                	<option value="+08:00">(GMT +8:00) Beijing, Perth, Singapore, Hong Kong</option>
                	<option value="+08:45">(GMT +8:45) Eucla</option>
                	<option value="+09:00">(GMT +9:00) Tokyo, Seoul, Osaka, Sapporo, Yakutsk</option>
                	<option value="+09:30">(GMT +9:30) Adelaide, Darwin</option>
                	<option value="+10:00">(GMT +10:00) Eastern Australia, Guam, Vladivostok</option>
                	<option value="+10:30">(GMT +10:30) Lord Howe Island</option>
                	<option value="+11:00">(GMT +11:00) Magadan, Solomon Islands, New Caledonia</option>
                	<option value="+11:30">(GMT +11:30) Norfolk Island</option>
                	<option value="+12:00">(GMT +12:00) Auckland, Wellington, Fiji, Kamchatka</option>
                	<option value="+12:45">(GMT +12:45) Chatham Islands</option>
                	<option value="+13:00">(GMT +13:00) Apia, Nukualofa</option>
                	<option value="+14:00">(GMT +14:00) Line Islands, Tokelau</option>
                </select>
              </div>
            </div>
          </div>
          <div class="form-group">
            <label class="col-md-3 control-label">Username:</label>
            <div class="col-md-8">
              <input class="form-control" id="username" type="text" value="<?php echo $row["username"];?>">
            </div>
          </div>
          <div class="form-group">
            <label class="col-md-3 control-label"></label>
            <div class="col-md-8">
              <input type="submit" onclick="save_edit_profile();" class="btn btn-primary" value="Save Changes">
              <span></span>
              <input type="reset" onclick="cancel_edit_profile();" class="btn btn-default" value="Cancel">
            </div>
          </div>
        </form>
      </div>
  </div>
</div>
<hr>
<script type="text/javascript">
    function cancel_edit_profile(){
      location.href = "./profile.php";
    }
    function save_edit_profile(){
      var xmlhttp = new XMLHttpRequest();
      xmlhttp.onreadystatechange = function() {
        if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
            //go to another page after paying
            if(this.responseText.trim()=="success"){
              location.href = "./profile.php";
                //document.getElementById("error_message").innerHTML="Error please ocntact the support team.";
            }else{
                alert(this.response);
                alert("An error occured. PLease contact the customer service.");
            }
        }
    };
    xmlhttp.open("POST", "save_edit_profile.php", true);
    xmlhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    var first_name=document.getElementById("first_name").value;
    var last_name=document.getElementById("last_name").value;
    var phone_number=document.getElementById("phone_number").value;
    var experience=document.getElementById("experience").value;
    var discipline=document.getElementById("discipline").value;
    var description=document.getElementById("description").value;
    var country=document.getElementById("country").value;
    var user_time_zone=document.getElementById("user_time_zone").value;
    var username=document.getElementById("username").value;
    var uploader=document.getElementById("uploader").value;
    //alert(uploader);
    //alert("first_name="+first_name+"&last_name="+last_name+"&experience="+experience+"&description="+description+"&country="+country+"&timezone="+user_time_zone+"&username="+username);
    xmlhttp.send("first_name="+first_name+"&last_name="+last_name+"&phone_number="+phone_number+"&experience="+experience+"&discipline="+discipline+"&description="+description+"&country="+country+"&timezone="+user_time_zone+"&username="+username);
    }
</script>
<!-- Upload image script -->

<!--<script>
   function previewFile(){
       var preview = document.getElementsByClassName('userProfile'); //selects class name for user profile photo
       var file    = document.querySelector('input[type=file]').files[0]; //sames as here
       var reader  = new FileReader();

       reader.onloadend = function () {
           preview.src = reader.result;
       }

       if (file) {
           reader.readAsDataURL(file); //reads the data as a URL
       } else {
           preview.src = "";
       }
  }

  previewFile();  //calls the function named previewFile()
  </script>
-->






<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.8.3/jquery.min.js"></script>
<script src="DragAvatar-master/resample.js"></script>
<script src="DragAvatar-master/avatar.js"></script>







  </body>
</html>
