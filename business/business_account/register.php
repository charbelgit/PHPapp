<?php
require ('header.php');
session_start();
if (isset($_SESSION['business_id'])) {
  header('location:business_account.php');
}
 ?>




    <main>
      <div class="container" align="">
 <div class="py-5 text-center">
   <img class="d-block mx-auto mb-4" src="/docs/4.3/assets/brand/bootstrap-solid.svg" alt="" width="72" height="72">
   <h2>Register Your Business</h2>
   <p class="lead">Fill in the details below and let's get started!</p>
 </div>

 <div class="row" align-="center" >

   <div class="col-md-8 order-md-1" style="display:inline-block;">
     <h4 class="mb-3">Business info</h4>
     <form class="needs-validation" novalidate="" method="post" action="register.inc.php">
       <div class="row">
         <div class="col-md-6 mb-3">
           <label for="firstName">First name</label>
           <input name="fname" type="text" class="form-control" id="firstName" placeholder="" value="" required="">
           <small class="text-muted">Who is submitting this application</small>
           <div class="invalid-feedback">
             Valid first name is required.
           </div>
         </div>
         <div class="col-md-6 mb-3">
           <label for="lastName">Last name</label>
           <input name="lname" type="text" class="form-control" id="lastName" placeholder="" value="" required="">
           <div class="invalid-feedback">
             Valid last name is required.
           </div>
         </div>
       </div>

       <div class="mb-3">
         <label for="username">Business name</label>
         <div class="input-group">
           <div class="input-group-prepend">
             <span class="input-group-text">&#x1F4BC;</span>
           </div>
           <input type="text" name="business_name" class="form-control" id="username" placeholder="Business" required="">
           <div class="invalid-feedback" style="width: 100%;">
             Your business name is required.
           </div>
         </div>
       </div>

       <div class="mb-3">
         <label for="email">username </label>
         <input type="text" name="business_username" class="form-control" id="email" placeholder="businessexample123">
         <small class="text-muted">Username will be used for login</small>

       </div>

       <div class="mb-3">
         <label for="email">Email </label>
         <input type="email" name="business_email" class="form-control" id="email" placeholder="you@example.com">
         <div class="invalid-feedback">
           Please enter a valid email address.
         </div>
       </div>
       <div class="mb-3">
         <label for="website">Website <small class="text-muted">(if applicable)</small> </label>
         <input type="url" name="business_website" class="form-control" id="website" placeholder="https://yourdomain.com">
         <div class="invalid-feedback">
           Please enter a valid url.
         </div>
       </div>
       <div class="mb-3">
         <label for="password">Password </label>
         <input type="password" name="password" class="form-control" id="password" placeholder="Enter Password">

       </div>
       <div class="mb-3">
         <label for="password">Repeat Password </label>
         <input type="password" name="passwordRep" class="form-control" id="password" placeholder="Enter Password">
         <small class="text-muted">Repeat Password</small>
         <?php if(isset($_GET['error']) && $_GET['error']=="invalidpasswords"){
           echo '<small style="color:red;">Passwords Do Not Match!</small>';
         } ?>
       </div>

       <div class="mb-3">
         <label for="address">Main Address</label>
         <input type="text" name="address" class="form-control" id="address" placeholder="1234 Main St" required="">
         <div class="invalid-feedback">
           Please enter your business address.
         </div>
       </div>


       <div class="row">
         <div class="col-md-5 mb-3">
           <label for="country">Country</label>
           <select name="country" class="custom-select d-block w-100" id="country" required="">
                <option value="">Choose...</option>
                <option value="Afghanistan">Afghanistan</option>
	              <option value="Åland Islands">Åland Islands</option>
	              <option value="Albania">Albania</option>
	              <option value="Algeria">Algeria</option>
              	<option value="American Samoa">American Samoa</option>
              	<option value="Andorra">Andorra</option>
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
              	<option value="BJ">Benin</option>
              	<option value="BM">Bermuda</option>
              	<option value="BT">Bhutan</option>
              	<option value="BO">Bolivia, Plurinational State of</option>
              	<option value="BQ">Bonaire, Sint Eustatius and Saba</option>
              	<option value="BA">Bosnia and Herzegovina</option>
              	<option value="BW">Botswana</option>
              	<option value="BV">Bouvet Island</option>
              	<option value="Brazil">Brazil</option>
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
              	<option value="India">India</option>
              	<option value="Indonesia">Indonesia</option>
              	<option value="IR">Iran, Islamic Republic of</option>
              	<option value="IQ">Iraq</option>
              	<option value="IE">Ireland</option>
              	<option value="IM">Isle of Man</option>
              	<option value="Israel">Israel</option>
              	<option value="IT">Italy</option>
              	<option value="JM">Jamaica</option>
              	<option value="JP">Japan</option>
              	<option value="JE">Jersey</option>
              	<option value="JO">Jordan</option>
              	<option value="Kazakhstan">Kazakhstan</option>
              	<option value="Kenya">Kenya</option>
              	<option value="Kiribati">Kiribati</option>
              	<option value="KP">Korea, Democratic People's Republic of</option>
              	<option value="KR">Korea, Republic of</option>
              	<option value="Kuwait">Kuwait</option>
              	<option value="Kyrgyzstan">Kyrgyzstan</option>
              	<option value="LA">Lao People's Democratic Republic</option>
              	<option value="Latvia">Latvia</option>
              	<option value="Lebanon">Lebanon</option>
              	<option value="Lesotho">Lesotho</option>
              	<option value="Liberia">Liberia</option>
              	<option value="Libya">Libya</option>
              	<option value="Liechtenstein">Liechtenstein</option>
              	<option value="Lithuania">Lithuania</option>
              	<option value="Luxembourg">Luxembourg</option>
              	<option value="Macao">Macao</option>
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
              	<option value="Portugal">Portugal</option>
              	<option value="PR">Puerto Rico</option>
              	<option value="Qatar">Qatar</option>
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
              	<option value="KSA">Saudi Arabia</option>
              	<option value="SN">Senegal</option>
              	<option value="RS">Serbia</option>
              	<option value="Seychelles">Seychelles</option>
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
         <div class="col-md-4 mb-3">
           <label for="state">State</label>
           <select class="custom-select d-block w-100" id="state" required="">
             <option value="">Choose...</option>
             <option value="AL">Alabama</option>
	            <option value="AK">Alaska</option>
	             <option value="AZ">Arizona</option>
	              <option value="AR">Arkansas</option>
	               <option value="CA">California</option>
	                <option value="CO">Colorado</option>
                	<option value="CT">Connecticut</option>
                	<option value="DE">Delaware</option>
                	<option value="DC">District Of Columbia</option>
                	<option value="FL">Florida</option>
                	<option value="GA">Georgia</option>
                	<option value="HI">Hawaii</option>
                	<option value="ID">Idaho</option>
                	<option value="IL">Illinois</option>
                	<option value="IN">Indiana</option>
                	<option value="IA">Iowa</option>
                	<option value="KS">Kansas</option>
                	<option value="KY">Kentucky</option>
                	<option value="LA">Louisiana</option>
                	<option value="ME">Maine</option>
                	<option value="MD">Maryland</option>
                	<option value="MA">Massachusetts</option>
                	<option value="MI">Michigan</option>
                	<option value="MN">Minnesota</option>
                	<option value="MS">Mississippi</option>
                	<option value="MO">Missouri</option>
                	<option value="MT">Montana</option>
                	<option value="NE">Nebraska</option>
                	<option value="NV">Nevada</option>
                	<option value="NH">New Hampshire</option>
                	<option value="NJ">New Jersey</option>
                	<option value="NM">New Mexico</option>
                	<option value="NY">New York</option>
                	<option value="NC">North Carolina</option>
                	<option value="ND">North Dakota</option>
                	<option value="OH">Ohio</option>
                	<option value="OK">Oklahoma</option>
                	<option value="OR">Oregon</option>
                	<option value="PA">Pennsylvania</option>
                	<option value="RI">Rhode Island</option>
                	<option value="SC">South Carolina</option>
                	<option value="SD">South Dakota</option>
                	<option value="TN">Tennessee</option>
                	<option value="TX">Texas</option>
                	<option value="UT">Utah</option>
                	<option value="VT">Vermont</option>
                	<option value="VA">Virginia</option>
                	<option value="WA">Washington</option>
                	<option value="WV">West Virginia</option>
                	<option value="WI">Wisconsin</option>
                	<option value="WY">Wyoming</option>
           </select>

         </div>
         <div class="col-md-3 mb-3">
           <label for="zip">Zip</label>
           <input type="text" class="form-control" id="zip" placeholder="" required="">
           <div class="invalid-feedback">
             Zip code required.
           </div>
         </div>
       </div>


       <hr class="mb-4">

       <h4 class="mb-3">Payment</h4>

       <div class="d-block my-3">
         <div class="custom-control custom-radio">
           <input id="credit" name="paymentMethod" type="radio" class="custom-control-input" checked="" required="">
           <label class="custom-control-label" for="credit">Credit card</label>
         </div>
         <div class="custom-control custom-radio">
           <input id="debit" name="paymentMethod" type="radio" class="custom-control-input" required="">
           <label class="custom-control-label" for="debit">Debit card</label>
         </div>
         <div class="custom-control custom-radio">
           <input id="paypal" name="paymentMethod" type="radio" class="custom-control-input" required="">
           <label class="custom-control-label" for="paypal">PayPal</label>
         </div>
       </div>
       <div class="row">
         <div class="col-md-6 mb-3">
           <label for="cc-name">Name on card</label>
           <input type="text" class="form-control" id="cc-name" placeholder="" required="">
           <small class="text-muted">Full name as displayed on card</small>
           <div class="invalid-feedback">
             Name on card is required
           </div>
         </div>
         <div class="col-md-6 mb-3">
           <label for="cc-number">Credit card number</label>
           <input type="text" class="form-control" id="cc-number" placeholder="" required="">
           <div class="invalid-feedback">
             Credit card number is required
           </div>
         </div>
       </div>
       <div class="row">
         <div class="col-md-3 mb-3">
           <label for="cc-expiration">Expiration</label>
           <input type="text" class="form-control" id="cc-expiration" placeholder="" required="">
           <div class="invalid-feedback">
             Expiration date required
           </div>
         </div>
         <div class="col-md-3 mb-3">
           <label for="cc-cvv">CVV</label>
           <input type="text" class="form-control" id="cc-cvv" placeholder="" required="">
           <div class="invalid-feedback">
             Security code required
           </div>
         </div>
       </div>
       <hr class="mb-4">
       <button class="btn btn-primary btn-lg btn-block" name="submit" type="submit">Pay and continue</button>
     </form>
   </div>
 </div>
<br><br>




    </main>
    <script type="text/javascript">
      let x=document.getElementById('country');
      let y=document.getElementById('state');

      if (x.value!=='US') {y.disabled=true;

      }else if (x.value==='US') {y.removeAttribute("disabled");

      }
    </script>
   <?php
   require('footer.php');
    ?>
