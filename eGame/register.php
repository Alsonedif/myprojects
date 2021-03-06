<!doctype html>
<html>
  <head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <link href="https://fonts.googleapis.com/css?family=Krub" rel="stylesheet">
    <script src="scripts/jquery-3.3.1.min.js"></script>
    <script src="scripts/register.js"></script>
    <title>eGame Register</title>
      
  </head>
  <body style="background-color:#f3f3f3;">
    <?php
    error_reporting(E_ALL ^ E_NOTICE);
    error_reporting(E_ERROR | E_PARSE);
    require(htmlspecialchars('reqfun/dbconnect.php'));
      $error = null; 
      if($_SERVER['REQUEST_METHOD'] == "POST"){
        if(empty($_POST['username'])){
        $error = $error . " " . "Username is empty!";
        }else {
        if(preg_match('/^[a-zA-Z0-9]{5,}$/', test_input($_POST['username'])) && test_input($_POST['username']) != ''){
        $usernameq=test_input($_POST['username']);
        $fusername=test_input($_POST['username']);
        
        }else {
            $fusername=test_input($_POST['username']);
            $error = $error . "Username is not vaild";
            
        }
        }
        if(empty($_POST['password'])){
        $error = $error . " " . "Password is empty!";
        }else {
        $fpassword = $_POST['password'];
        }
        if(empty($_POST['email'])){
        $error = $error . " " . "Email is empy!";
        
        }else {
        if (!filter_var(test_input($_POST['email']), FILTER_VALIDATE_EMAIL)) {
            $error = $error .  " Invalid email format";
            $femail=test_input($_POST['email']);
           
            
            }else {
                
             $femail = test_input($_POST['email']);
             $emailq=test_input($_POST['email']);
            }
        }
        if(empty($_POST['first_name'])){
        $error = $error . " " . "First name is empty!";
        }else {
        $ffirstname = test_input($_POST['first_name']);
        }
        if(empty($_POST['Middle_name'])){
        $error = $error . " " . "middle name is empty!";
        }else {
        $fmiddlename = test_input($_POST['Middle_name']);
        }
        if(empty($_POST['Last_name'])){
        $error = $error . " " . "last name is empty!";
        }else {
        $flastname = test_input($_POST['Last_name']);
        }
        if(empty($_POST['zip_code'])){
        $error = $error . " " . "Zip code is empty!";
        }else {
        $fzipcode = test_input($_POST['zip_code']);
        }
        if(empty($_POST['city_name'])){
        $error = $error . " " . "City name is empty!";
        }else {
        $fcityname = test_input($_POST['city_name']);
        }
        if(empty($_POST['country'])){
        $error = $error . " " . "country is empty!";
        }else {
        $fcountry = test_input($_POST['country']);
        }
        if(empty($_POST['location'])){
        $error = $error . " " . "Location is empty!";
        }else {
        $flocation = test_input($_POST['location']);
        }
      }
      
      if($error == null && $usernameq != ''){
        $usernamecheck = mysqli_query($conn,"select username from users where username='".$usernameq."';");
        $emailcheck = mysqli_query($conn,"select email from users where email='".$emailq."';");
        if(mysqli_num_rows($usernamecheck)>0){
            $error = $error." Username is already taken.";
        }else {
        }
        if(mysqli_num_rows($emailcheck)>0){
            $error = $error." Email is registered to another account.";
        }else { 
        }
      }
      if($_POST['check'] == "good" && $usernameq != ''){
        $sql = "insert into users(username,password,permission,n_first,n_middle,n_last,city_name,zip_code,email,location,country) values('".$usernameq."','".$fpassword."',0,'".$ffirstname."','".$fmiddlename."','".$flastname."','".$fcityname."','".$fzipcode."','".$emailq."','".$flocation."','".$fcountry."');";
        if($result= mysqli_query($conn,$sql)){
            $error = "Register Sucessful! Click "."<a href='login.php'>here</a>"." to Login!";
        }else {
            $error = "Register Failed : ".$error;
        }
      }
      
      
      ?>
      
     <div class="container">
      
      <form action="<?php htmlspecialchars($_SERVER['PHP_SELF']); ?>" method="post">
      <div class="register-form">
      <img src="imgs/logo.png" style="width:200">
      <span class="error"><?php echo $error; ?></span>
      <span class ="ind">Username : </span>     
      <input type="text" required placeholder="username" name="username" value="<?php if(!empty($fusername)){echo $fusername;}?>">   
      <span class ="ind">Email :</span>
      <input type="email" required placeholder="email" name="email" value="<?php if(!empty($femail)){echo $femail;} ?>">
      <span class ="ind">Password :</span>
      <input type="password" required placeholder="Password" name="password" value="<?php if(!empty($fpassword)){echo $fpassword;} ?>">
      <span class ="ind">First name :</span>
      <input type="text" required placeholder="First name" name="first_name" value="<?php if(!empty($ffirstname)){echo $ffirstname;} ?>">
      <span class ="ind">Middle name :</span>
      <input type="text" required placeholder="Middle name" name="Middle_name" value="<?php if(!empty($fmiddlename)){echo $fmiddlename;} ?>">
      <span class ="ind">Last name :</span>
      <input type="text" required placeholder="Last name" name="Last_name" value="<?php if(!empty($flastname)){echo $flastname;} ?>">
     <span class ="ind">Zip Code</span>
      <input type="text" required placeholder="Zip_code" name="zip_code" value="<?php if(!empty($fzipcode)){echo $fzipcode;} ?>">
     <span class ="ind">City name</span>
     <input type="text" required placeholder="City name" name="city_name" value="<?php if(!empty($fcityname)){echo $fcityname;} ?>">
      <span class ="ind">Country :</span>
      <select id="country" name="country">
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

                <option value="Greece">Greece</option>

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
            <span class="ind">Your location :</span>
            <textarea rows="4" cols="50" name="location" placeholder="Please type your location Address so we cand send you your items."><?php echo $flocation; ?></textarea>
            <input type="submit" value="Register" style="width:100px">
            <span>Already have an account ? Click <a href='login.php'>here</a> to Login</span>
            <input type="hidden" value="good" name="check">
          </div>
      </form>
         
      
      </div>
      
      
      
    
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
    <link href="styles/register.css" rel="stylesheet">
  </body>
</html>