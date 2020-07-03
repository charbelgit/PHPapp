
<?php
session_start();
require 'business/business_account/dbh.inc.php';
if (isset($_SESSION['business_name'])) {
  $businessName=$_SESSION['business_name'];
}else {
  $businessName='';
}

 ?>

<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
    <link rel="icon" href="images/icon logo.png">
    <title>Events | SocialNetworkExample</title>

  </head>
  <body>
    <nav class="navbar navbar-expand-md bg-dark navbar-dark">
 <a class="navbar-brand" href="business"><img src="images/logo.png" height="30px"  ></a>
 <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#collapsibleNavbar">
   <span class="navbar-toggler-icon"></span>
 </button>
 <div class="collapse navbar-collapse" id="collapsibleNavbar">
   <ul class="navbar-nav">
     <li class="nav-item">
       <a class="nav-link" href="index.php">Home</a>
     </li>
     <li class="nav-item">
       <a class="nav-link" href="pricing">Pricing</a>
     </li>
     <li class="nav-item">
       <a class="nav-link" href="business_account/login.php">Login</a>
     </li>
   </ul>
 </div>
</nav>
<main>

<?php if (isset($_GET['submitted'])) {
  echo '<br><div class="alert alert-primary" role="alert">
  We successfully received your request! We will review it and send you a comfirmation!
</div>';
} ?>

    <div class="get-listed" align="center">

    <h3>Get listed on SocialNetworkExample</h3>
    <span class="text-muted">You are seconds away from partnering with us for a better exposure!</span>
  </div><br><br>
    <div class="categories" align="center">

      <form action="submitevent.php" method="post">
  <div class="form-group">
    <label for="exampleInputEmail1">Business Name</label>
    <input type="text"  name="businessName" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter Business Name" value="<?php echo $businessName; ?>">
    <small id="emailHelp" class="form-text text-muted"></small>
  </div>
  <div class="form-group">
    <label for="exampleInputEmail2">Business Phone Number</label>
    <input name="businessPhone" type="number" class="form-control" id="exampleInputEmail2" aria-describedby="emailHelp" placeholder="Enter Business Number" value="">
    <small id="emailHelp" class="form-text text-muted"></small>
  </div>
  <div class="form-group">
    <label for="exampleInputEmail3">Business Email</label>
    <input name="businessEmail" type="text" class="form-control" id="exampleInputEmail3" aria-describedby="emailHelp" placeholder="Enter Business Email" value="">
    <small id="emailHelp" class="form-text text-muted"></small>
  </div>

<hr>
<h4 id="categories">Event categories</h4>
<?php
if (isset($_GET['emptycategory'])) {
  echo '<span class="text-muted" style="color:red;">Pick a category</span>';
} else {
  echo '<span></span>';
}

 ?>

<span class="text-muted">Pick the category that best describes your event. Your event will be sorted under this category</span>


  <!--  <div class="custom-control custom-radio custom-control-inline form-control">
  <input  name="category[]"  type="checkbox" id="customRadioInline1" value="Hiking & Open-Air"  class="custom-control-input">
  <label class="custom-control-label" for="customRadioInline1">Hiking & Open-Air</label>
</div>
<div class="custom-control custom-radio custom-control-inline  form-control">
  <input name="category[]"  type="checkbox" id="customRadioInline2" value="Extreme Sports"  class="custom-control-input">
  <label class="custom-control-label" for="customRadioInline2">Extreme Sports</label>
</div>
<div class="custom-control custom-radio custom-control-inline form-control">
  <input name="category[]"  type="checkbox" id="customRadioInline3" value="Winter Sports"  class="custom-control-input ">
  <label class="custom-control-label" for="customRadioInline3">Winter Sports</label>
</div>
<div class="custom-control custom-radio custom-control-inline form-control">
  <input name="category[]"  type="checkbox" id="customRadioInline4" value="Aquatic Sports"  class="custom-control-input ">
  <label class="custom-control-label" for="customRadioInline4">Aquatic Sports</label>
</div>
<div class="custom-control custom-radio custom-control-inline form-control">
  <input  name="category[]" type="checkbox" id="customRadioInline5" value="Motorized Sports"  class="custom-control-input ">
  <label class="custom-control-label" for="customRadioInline5">Motorized Sports</label>
</div>
<div class="custom-control custom-radio custom-control-inline form-control">
  <input  name="category[]" type="checkbox" id="customRadioInline6"value="Team Sports"   class="custom-control-input ">
  <label class="custom-control-label" for="customRadioInline6">Team Sports</label>
</div>
<div class="custom-control custom-radio custom-control-inline form-control">
  <input  name="category[]" type="checkbox" id="customRadioInline7" value="Travel"  class="custom-control-input ">
  <label class="custom-control-label" for="customRadioInline7">Travel</label>
</div>
<div class="custom-control custom-radio custom-control-inline form-control">
  <input name="category[]"  type="checkbox" id="customRadioInline8" value="Marathons"  class="custom-control-input ">
  <label class="custom-control-label" for="customRadioInline8">Marathons</label>
</div>
<div class="custom-control custom-radio custom-control-inline form-control">
  <input name="category[]"  type="checkbox" id="customRadioInline9" value="Conferences"  class="custom-control-input ">
  <label class="custom-control-label" for="customRadioInline9">Conferences</label>
</div>
<div class="custom-control custom-radio custom-control-inline form-control">
  <input name="category[]"  type="checkbox" id="customRadioInline10" value="Podcasts"  class="custom-control-input ">
  <label class="custom-control-label" for="customRadioInline10">Podcasts</label>
</div>
<div class="custom-control custom-radio custom-control-inline form-control">
  <input name="category[]"  type="checkbox" id="customRadioInline11" value="Classes"  class="custom-control-input ">
  <label class="custom-control-label" for="customRadioInline11">Classes</label>
</div>
<div class="custom-control custom-radio custom-control-inline form-control">
  <input  name="category[]"  type="checkbox" id="customRadioInline12" value="Others" class="custom-control-input ">
  <label class="custom-control-label" for="customRadioInline12">Others</label>
</div>-->
  </div>
  <div class="container">
    <div class=" form-group">
      <label for="country">Category</label>
      <select name="category" class="custom-select d-block w-100" id="country" required="">
           <option value="">Choose...</option>
           <option value="Hiking">Hiking</option>
           <option value="Extreme sports">Extreme sports</option>
           <option value="Travel">Travel</option>
           <option value="Marathons">Marathons</option>
           <option value="Conferences">Conferences</option>
           <option value="Podcasts">Podcasts</option>
           <option value="Classes">Classes</option>
           <option value="Cycling">Cycling</option>
           <option value="Winter Sports">Winter Sports</option>
           <option value="Aquatic Sports">Aquatic Sports</option>
           <option value="Motorized Sports">Motorized Sports</option>
           <option value="Others">Others</option>

    </select>

    </div>
    <hr>
    <div class=" form-group">
      <label for="country">Country</label>
      <select name="country" class="custom-select d-block w-100" id="country" required="">
           <option value="">Choose...</option>
           <option value="AF">Afghanistan</option>
           <option value="AX">Åland Islands</option>
           <option value="AL">Albania</option>
           <option value="DZ">Algeria</option>
           <option value="AS">American Samoa</option>
           <option value="AD">Andorra</option>
           <option value="AO">Angola</option>
           <option value="AI">Anguilla</option>
           <option value="AQ">Antarctica</option>
           <option value="AG">Antigua and Barbuda</option>
           <option value="AR">Argentina</option>
           <option value="AM">Armenia</option>
           <option value="AW">Aruba</option>
           <option value="AU">Australia</option>
           <option value="AT">Austria</option>
           <option value="AZ">Azerbaijan</option>
           <option value="BS">Bahamas</option>
           <option value="BH">Bahrain</option>
           <option value="BD">Bangladesh</option>
           <option value="BB">Barbados</option>
           <option value="BY">Belarus</option>
           <option value="BE">Belgium</option>
           <option value="BZ">Belize</option>
           <option value="BJ">Benin</option>
           <option value="BM">Bermuda</option>
           <option value="BT">Bhutan</option>
           <option value="BO">Bolivia, Plurinational State of</option>
           <option value="BQ">Bonaire, Sint Eustatius and Saba</option>
           <option value="BA">Bosnia and Herzegovina</option>
           <option value="BW">Botswana</option>
           <option value="BV">Bouvet Island</option>
           <option value="BR">Brazil</option>
           <option value="IO">British Indian Ocean Territory</option>
           <option value="BN">Brunei Darussalam</option>
           <option value="BG">Bulgaria</option>
           <option value="BF">Burkina Faso</option>
           <option value="BI">Burundi</option>
           <option value="KH">Cambodia</option>
           <option value="CM">Cameroon</option>
           <option value="CA">Canada</option>
           <option value="CV">Cape Verde</option>
           <option value="KY">Cayman Islands</option>
           <option value="CF">Central African Republic</option>
           <option value="TD">Chad</option>
           <option value="CL">Chile</option>
           <option value="CN">China</option>
           <option value="CX">Christmas Island</option>
           <option value="CC">Cocos (Keeling) Islands</option>
           <option value="CO">Colombia</option>
           <option value="KM">Comoros</option>
           <option value="CG">Congo</option>
           <option value="CD">Congo, the Democratic Republic of the</option>
           <option value="CK">Cook Islands</option>
           <option value="CR">Costa Rica</option>
           <option value="CI">Côte d'Ivoire</option>
           <option value="HR">Croatia</option>
           <option value="CU">Cuba</option>
           <option value="CW">Curaçao</option>
           <option value="CY">Cyprus</option>
           <option value="CZ">Czech Republic</option>
           <option value="DK">Denmark</option>
           <option value="DJ">Djibouti</option>
           <option value="DM">Dominica</option>
           <option value="DO">Dominican Republic</option>
           <option value="EC">Ecuador</option>
           <option value="EG">Egypt</option>
           <option value="SV">El Salvador</option>
           <option value="GQ">Equatorial Guinea</option>
           <option value="ER">Eritrea</option>
           <option value="EE">Estonia</option>
           <option value="ET">Ethiopia</option>
           <option value="FK">Falkland Islands (Malvinas)</option>
           <option value="FO">Faroe Islands</option>
           <option value="FJ">Fiji</option>
           <option value="FI">Finland</option>
           <option value="FR">France</option>
           <option value="GF">French Guiana</option>
           <option value="PF">French Polynesia</option>
           <option value="TF">French Southern Territories</option>
           <option value="GA">Gabon</option>
           <option value="GM">Gambia</option>
           <option value="GE">Georgia</option>
           <option value="DE">Germany</option>
           <option value="GH">Ghana</option>
           <option value="GI">Gibraltar</option>
           <option value="GR">Greece</option>
           <option value="GL">Greenland</option>
           <option value="GD">Grenada</option>
           <option value="GP">Guadeloupe</option>
           <option value="GU">Guam</option>
           <option value="GT">Guatemala</option>
           <option value="GG">Guernsey</option>
           <option value="GN">Guinea</option>
           <option value="GW">Guinea-Bissau</option>
           <option value="GY">Guyana</option>
           <option value="HT">Haiti</option>
           <option value="HM">Heard Island and McDonald Islands</option>
           <option value="VA">Holy See (Vatican City State)</option>
           <option value="HN">Honduras</option>
           <option value="HK">Hong Kong</option>
           <option value="HU">Hungary</option>
           <option value="IS">Iceland</option>
           <option value="IN">India</option>
           <option value="ID">Indonesia</option>
           <option value="IR">Iran, Islamic Republic of</option>
           <option value="IQ">Iraq</option>
           <option value="IE">Ireland</option>
           <option value="IM">Isle of Man</option>
           <option value="IL">Israel</option>
           <option value="IT">Italy</option>
           <option value="JM">Jamaica</option>
           <option value="JP">Japan</option>
           <option value="JE">Jersey</option>
           <option value="JO">Jordan</option>
           <option value="KZ">Kazakhstan</option>
           <option value="KE">Kenya</option>
           <option value="KI">Kiribati</option>
           <option value="KP">Korea, Democratic People's Republic of</option>
           <option value="KR">Korea, Republic of</option>
           <option value="KW">Kuwait</option>
           <option value="KG">Kyrgyzstan</option>
           <option value="LA">Lao People's Democratic Republic</option>
           <option value="LV">Latvia</option>
           <option value="LB">Lebanon</option>
           <option value="LS">Lesotho</option>
           <option value="LR">Liberia</option>
           <option value="LY">Libya</option>
           <option value="LI">Liechtenstein</option>
           <option value="LT">Lithuania</option>
           <option value="LU">Luxembourg</option>
           <option value="MO">Macao</option>
           <option value="MK">Macedonia, the former Yugoslav Republic of</option>
           <option value="MG">Madagascar</option>
           <option value="MW">Malawi</option>
           <option value="MY">Malaysia</option>
           <option value="MV">Maldives</option>
           <option value="ML">Mali</option>
           <option value="MT">Malta</option>
           <option value="MH">Marshall Islands</option>
           <option value="MQ">Martinique</option>
           <option value="MR">Mauritania</option>
           <option value="MU">Mauritius</option>
           <option value="YT">Mayotte</option>
           <option value="MX">Mexico</option>
           <option value="FM">Micronesia, Federated States of</option>
           <option value="MD">Moldova, Republic of</option>
           <option value="MC">Monaco</option>
           <option value="MN">Mongolia</option>
           <option value="ME">Montenegro</option>
           <option value="MS">Montserrat</option>
           <option value="MA">Morocco</option>
           <option value="MZ">Mozambique</option>
           <option value="MM">Myanmar</option>
           <option value="NA">Namibia</option>
           <option value="NR">Nauru</option>
           <option value="NP">Nepal</option>
           <option value="NL">Netherlands</option>
           <option value="NC">New Caledonia</option>
           <option value="NZ">New Zealand</option>
           <option value="NI">Nicaragua</option>
           <option value="NE">Niger</option>
           <option value="NG">Nigeria</option>
           <option value="NU">Niue</option>
           <option value="NF">Norfolk Island</option>
           <option value="MP">Northern Mariana Islands</option>
           <option value="NO">Norway</option>
           <option value="OM">Oman</option>
           <option value="PK">Pakistan</option>
           <option value="PW">Palau</option>
           <option value="PS">Palestinian Territory, Occupied</option>
           <option value="PA">Panama</option>
           <option value="PG">Papua New Guinea</option>
           <option value="PY">Paraguay</option>
           <option value="PE">Peru</option>
           <option value="PH">Philippines</option>
           <option value="PN">Pitcairn</option>
           <option value="PL">Poland</option>
           <option value="PT">Portugal</option>
           <option value="PR">Puerto Rico</option>
           <option value="QA">Qatar</option>
           <option value="RE">Réunion</option>
           <option value="RO">Romania</option>
           <option value="RU">Russian Federation</option>
           <option value="RW">Rwanda</option>
           <option value="BL">Saint Barthélemy</option>
           <option value="SH">Saint Helena, Ascension and Tristan da Cunha</option>
           <option value="KN">Saint Kitts and Nevis</option>
           <option value="LC">Saint Lucia</option>
           <option value="MF">Saint Martin (French part)</option>
           <option value="PM">Saint Pierre and Miquelon</option>
           <option value="VC">Saint Vincent and the Grenadines</option>
           <option value="WS">Samoa</option>
           <option value="SM">San Marino</option>
           <option value="ST">Sao Tome and Principe</option>
           <option value="SA">Saudi Arabia</option>
           <option value="SN">Senegal</option>
           <option value="RS">Serbia</option>
           <option value="SC">Seychelles</option>
           <option value="SL">Sierra Leone</option>
           <option value="SG">Singapore</option>
           <option value="SX">Sint Maarten (Dutch part)</option>
           <option value="SK">Slovakia</option>
           <option value="SI">Slovenia</option>
           <option value="SB">Solomon Islands</option>
           <option value="SO">Somalia</option>
           <option value="ZA">South Africa</option>
           <option value="GS">South Georgia and the South Sandwich Islands</option>
           <option value="SS">South Sudan</option>
           <option value="ES">Spain</option>
           <option value="LK">Sri Lanka</option>
           <option value="SD">Sudan</option>
           <option value="SR">Suriname</option>
           <option value="SJ">Svalbard and Jan Mayen</option>
           <option value="SZ">Swaziland</option>
           <option value="SE">Sweden</option>
           <option value="CH">Switzerland</option>
           <option value="SY">Syrian Arab Republic</option>
           <option value="TW">Taiwan, Province of China</option>
           <option value="TJ">Tajikistan</option>
           <option value="TZ">Tanzania, United Republic of</option>
           <option value="TH">Thailand</option>
           <option value="TL">Timor-Leste</option>
           <option value="TG">Togo</option>
           <option value="TK">Tokelau</option>
           <option value="TO">Tonga</option>
           <option value="TT">Trinidad and Tobago</option>
           <option value="TN">Tunisia</option>
           <option value="TR">Turkey</option>
           <option value="TM">Turkmenistan</option>
           <option value="TC">Turks and Caicos Islands</option>
           <option value="TV">Tuvalu</option>
           <option value="UG">Uganda</option>
           <option value="UA">Ukraine</option>
           <option value="AE">United Arab Emirates</option>
           <option value="GB">United Kingdom</option>
           <option value="US">United States</option>
           <option value="UM">United States Minor Outlying Islands</option>
           <option value="UY">Uruguay</option>
           <option value="UZ">Uzbekistan</option>
           <option value="VU">Vanuatu</option>
           <option value="VE">Venezuela, Bolivarian Republic of</option>
           <option value="VN">Viet Nam</option>
           <option value="VG">Virgin Islands, British</option>
           <option value="VI">Virgin Islands, U.S.</option>
           <option value="WF">Wallis and Futuna</option>
           <option value="EH">Western Sahara</option>
           <option value="YE">Yemen</option>
           <option value="ZM">Zambia</option>
           <option value="ZW">Zimbabwe</option>
      </select>

    </div>

    <div class="form-group">
      <label for="exampleInputEmail4">Area</label>
      <input  name="Area" type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter Business Name" value="">
      <small  class="form-text text-muted">Tell us where the event will take place</small>
    </div>
    <div class="form-group">
      <label for="exampleInputEmail5">Date & Time</label>
      <input name="date" type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter Business Name" value="">
      <small  class="form-text text-muted">Tell us the date when the event will take place</small>
    </div>
    <div class="form-group">
      <label for="exampleInputEmail6">Event Name</label>
      <input name="eventName" type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter Business Name" value="">
      <small id="emailHelp" class="form-text text-muted">What is the event called?</small>
    </div>
    <div class="form-group">
   <label for="exampleFormControlTextarea1">Event Description</label>
   <textarea  name="eventDesc" class="form-control" id="exampleFormControlTextarea1" rows="3"></textarea>
   <small class="form-text text-muted">Describe the event and its purpose</small>
 </div>
 <div class="form-group">
<label for="exampleFormControlTextarea2">Event Target Market</label>
<textarea name="eventTarget" class="form-control" id="exampleFormControlTextarea2" rows="3"></textarea>
<small class="form-text text-muted">Who is this event for? What is the minimum age?(if any)</small>
</div>
 <div class="form-group">
<label for="exampleFormControlTextarea3">Event Pricing</label>
<textarea name="eventPricing" class="form-control" id="exampleFormControlTextarea3" rows="3"></textarea>
<small class="form-text text-muted">Describe the pricing</small>
</div>
<button type="submit" name="submit-event" class="btn btn-primary submit-event">Submit Event</button>
<span class="form-text text-muted">We will review your input and publish it</span><br>
  </form>
  <style media="screen">
    .custom-control-inline{
      width:300px;
      background: #e86100 ;
    }
    .bg-dark{background-color:#E86100!important;}
    .get-listed{
      margin-top:20px;
    }
    main{
      max-width:850px;
      margin:  auto;
    }
    label{
      display:flex;
    }
    .custom-control-label{
      color: white;
    }
    .submit-event{
      background:#e86100!important;
    }
  </style>
  </main>
  </body>
</html>
