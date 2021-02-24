<?php

session_start();
if (isset($_SESSION['name']) or isset($_COOKIE['user'])) {
  header("location: account.php");
}

$errmsg = "<span class='forgetpass'>Forgot Your Password?</span>";
$ferrmsg = "";

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "mailbox";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

if (isset($_POST['login'])) {

  if (!empty($_POST['username']) and !empty($_POST['password'])){
 
  $sql = "SELECT * FROM users where username = '$_POST[username]'";
  $result = $conn->query($sql);
  $row = $result->fetch_assoc();

  if ($_POST['username'] == $row['username'] and $_POST['password'] == $row['password']) {
    if ($_POST['remember'] == 'on') {
      $fname = $row["name"];
      $user = "user";
      setcookie("user", $fname, time()+60);
      echo "<script>window.location.assign('account.php')</script>";
    } else {
      $_SESSION['name'] = $row['name'];
      echo "<script>window.location.assign('account.php')</script>";
    }
    
  } else {
    $errmsg = "Username or password is wrong. <span class='forgetpass'>Forgot Your Password?</span>";
  }
      
  } else{
    $errmsg = "Please Enter Your Credentials";
  }
}

$conn->close();
?>


<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Mailbox</title>
  <link rel="icon" href="./images/mail.png">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.0/css/all.min.css">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous" />
  <link rel="stylesheet" href="css/style.css" />
</head>

<body>
  <nav class="navbar container1">
    <a class="navbar-brand" href="index.php">
      <img src="images/mailboxes_com.jpg" height="95" alt="" />
    </a>
  </nav>

  <div class="container1" style="display: flex; flex-direction: row-reverse">
    <button class="accbtn" id="accbtn" onclick="showregister()">Create an Account</button>
    <button class="regbtn" id="regbtn" onclick="showlogin()">Already an User</button>
    <p class="mt-2 mr-3" id="newm">New to Mailbox?</p>
    <p class="mt-2 mr-3" id="entd" style="display: none;">Enter Your Details Below.</p>
  </div>

  <div class="container">
    <div class="row">
      <div class="col-md-8">
        <div style="display: flex">
          <img src="images/outlook-mailbox.jpg" height="80px" alt="" />
          <h4 class="mt-3 ml-3">Email by Mailbox</h4>
        </div>
        <div class="container mt-5" style="display: flex">
          <div>
            <img src="images/images.png" height="45px" alt="" />
          </div>

          <div class="ml-5 fast">
            <h5>Fast and Easy</h5>
            <p>An eficient and usefull email service by Rohit</p>
            <p>Faster and easy</p>
          </div>
        </div>
        <div class="container mt-4" style="display: flex">
          <div>
            <img src="images/secure-email.jpg" height="60px" width="113px" alt="" />
          </div>

          <div class="ml-5 fast">
            <h5>Secured and Enthusiastic</h5>
            <p>An eficient and usefull email service by Rohit</p>
            <p>Faster and easy</p>
          </div>
        </div>
      </div>

      <div class="col-md-4">
        <!-- signup form -->
        <div class="signupform" id="signupform">
          <div class="row">
            <h5>Sign In</h5>
            <p style="margin-left: auto; color: rgb(168, 168, 168)">
              mailBOX
            </p>
          </div>
          <hr />
          <form class="mt-3" method="POST" action="index.php">
            <table>
              <tr>
                <td><label for="name">Name</label></td>
                <td><input class="signinput" type="name" name="username" /></td>
              </tr>
              <tr>
                <td><label class="mt-3" for="password"> Password </label></td>
                <td>
                  <input class="signinputp mt-3" id="signinputpass" type="password" name="password" />
                </td>
                <td><i class="far fa-eye" id="eyetogglePassword"></i></td>
              </tr>
              <tr>
                
              </tr>
            </table>

            <p id="forgetpass" class="errmsg text-center"> <?php echo $errmsg; ?> </p>

            <div>

              <label class="rememberl mt-4" for="remember">Remember me
                <input class="checkbox" name="remember" type="checkbox" />
              </label>

              <button class="signbtn mt-2 mb-3" name="login" type="submit">Login</button>
            </div>
          </form>

          <a class="acca" onclick="showregister()">Don't have an account?</a>
        </div>

        


        <!-- register form -->

        <div class="registerform" id="registerform">
          <div class="row">
            <h5>Registration</h5>
            <p style="margin-left: auto; color: rgb(168, 168, 168)">
              mailBOX
            </p>
          </div>
          <hr />
          <form class="mt-3" method="POST" action="register.php">
            <table>
              <tr>
                <td><label for="name">Name</label></td>
                <td><input class="signinput" type="name" name="name" /></td>
              </tr>
              <tr>
                <td><label for="name">Username</label></td>
                <td>
                  <input class="signinput" type="name" name="username" />
                </td>
              </tr>
              <tr>
                <td><label class="m" for="password"> Password </label></td>
                <td>
                  <input class="signinput" type="password" name="password" />
                </td>
              </tr>
              <tr>
                <td><label class="m" for="password"> Re-Pass </label></td>
                <td>
                  <input class="signinput" type="password" name="re-password" />
                </td>
              </tr>
              <tr>
                <td><label class="m" for="phone"> Phone </label></td>
                <td>
                  <input class="signinput" type="tel" name="phone" />
                </td>
              </tr>
              <tr>
                <td><label class="m" for="dob"> D.O.B. </label></td>
                <td>
                  <input class="signinput" type="date" name="dob" />
                </td>
              </tr>
              <tr>
                <td><label class="m" for="gender">Gender</label></td>
                <td>
                  <label for="male" class="genderm">Male</label>
                  <input type="radio" name="gender" value="Male" id="gender1" />
                  <label class="ml-2" for="female">Female</label>
                  <input type="radio" name="gender" value="Female" id="gender" />
                </td>
              </tr>
              <tr>
                <td><label for="country">Country</label></td>
                <td>
                  <select class="signinput" name="country" id="country">
                    <option value="" selected>Select</option>
                    <option value="Afghanistan">Afghanistan</option>
                    <option value="Albania">Albania</option>
                    <option value="Algeria">Algeria</option>
                    <option value="American Samoa">American Samoa</option>
                    <option value="Andorra">Andorra</option>
                    <option value="Angola">Angola</option>
                    <option value="Anguilla">Anguilla</option>
                    <option value="Antartica">Antarctica</option>
                    <option value="Antigua and Barbuda">
                      Antigua and Barbuda
                    </option>
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
                    <option value="Bosnia and Herzegowina">
                      Bosnia and Herzegowina
                    </option>
                    <option value="Botswana">Botswana</option>
                    <option value="Bouvet Island">Bouvet Island</option>
                    <option value="Brazil">Brazil</option>
                    <option value="British Indian Ocean Territory">
                      British Indian Ocean Territory
                    </option>
                    <option value="Brunei Darussalam">
                      Brunei Darussalam
                    </option>
                    <option value="Bulgaria">Bulgaria</option>
                    <option value="Burkina Faso">Burkina Faso</option>
                    <option value="Burundi">Burundi</option>
                    <option value="Cambodia">Cambodia</option>
                    <option value="Cameroon">Cameroon</option>
                    <option value="Canada">Canada</option>
                    <option value="Cape Verde">Cape Verde</option>
                    <option value="Cayman Islands">Cayman Islands</option>
                    <option value="Central African Republic">
                      Central African Republic
                    </option>
                    <option value="Chad">Chad</option>
                    <option value="Chile">Chile</option>
                    <option value="China">China</option>
                    <option value="Christmas Island">Christmas Island</option>
                    <option value="Cocos Islands">
                      Cocos (Keeling) Islands
                    </option>
                    <option value="Colombia">Colombia</option>
                    <option value="Comoros">Comoros</option>
                    <option value="Congo">Congo</option>
                    <option value="Congo">
                      Congo, the Democratic Republic of the
                    </option>
                    <option value="Cook Islands">Cook Islands</option>
                    <option value="Costa Rica">Costa Rica</option>
                    <option value="Cota D'Ivoire">Cote d'Ivoire</option>
                    <option value="Croatia">Croatia (Hrvatska)</option>
                    <option value="Cuba">Cuba</option>
                    <option value="Cyprus">Cyprus</option>
                    <option value="Czech Republic">Czech Republic</option>
                    <option value="Denmark">Denmark</option>
                    <option value="Djibouti">Djibouti</option>
                    <option value="Dominica">Dominica</option>
                    <option value="Dominican Republic">
                      Dominican Republic
                    </option>
                    <option value="East Timor">East Timor</option>
                    <option value="Ecuador">Ecuador</option>
                    <option value="Egypt">Egypt</option>
                    <option value="El Salvador">El Salvador</option>
                    <option value="Equatorial Guinea">
                      Equatorial Guinea
                    </option>
                    <option value="Eritrea">Eritrea</option>
                    <option value="Estonia">Estonia</option>
                    <option value="Ethiopia">Ethiopia</option>
                    <option value="Falkland Islands">
                      Falkland Islands (Malvinas)
                    </option>
                    <option value="Faroe Islands">Faroe Islands</option>
                    <option value="Fiji">Fiji</option>
                    <option value="Finland">Finland</option>
                    <option value="France">France</option>
                    <option value="France Metropolitan">
                      France, Metropolitan
                    </option>
                    <option value="French Guiana">French Guiana</option>
                    <option value="French Polynesia">French Polynesia</option>
                    <option value="French Southern Territories">
                      French Southern Territories
                    </option>
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
                    <option value="Guinea">Guinea</option>
                    <option value="Guinea-Bissau">Guinea-Bissau</option>
                    <option value="Guyana">Guyana</option>
                    <option value="Haiti">Haiti</option>
                    <option value="Heard and McDonald Islands">
                      Heard and Mc Donald Islands
                    </option>
                    <option value="Holy See">
                      Holy See (Vatican City State)
                    </option>
                    <option value="Honduras">Honduras</option>
                    <option value="Hong Kong">Hong Kong</option>
                    <option value="Hungary">Hungary</option>
                    <option value="Iceland">Iceland</option>
                    <option value="India">India</option>
                    <option value="Indonesia">Indonesia</option>
                    <option value="Iran">Iran (Islamic Republic of)</option>
                    <option value="Iraq">Iraq</option>
                    <option value="Ireland">Ireland</option>
                    <option value="Israel">Israel</option>
                    <option value="Italy">Italy</option>
                    <option value="Jamaica">Jamaica</option>
                    <option value="Japan">Japan</option>
                    <option value="Jordan">Jordan</option>
                    <option value="Kazakhstan">Kazakhstan</option>
                    <option value="Kenya">Kenya</option>
                    <option value="Kiribati">Kiribati</option>
                    <option value="Democratic People's Republic of Korea">
                      Korea, Democratic People's Republic of
                    </option>
                    <option value="Korea">Korea, Republic of</option>
                    <option value="Kuwait">Kuwait</option>
                    <option value="Kyrgyzstan">Kyrgyzstan</option>
                    <option value="Lao">
                      Lao People's Democratic Republic
                    </option>
                    <option value="Latvia">Latvia</option>
                    <option value="Lebanon">Lebanon</option>
                    <option value="Lesotho">Lesotho</option>
                    <option value="Liberia">Liberia</option>
                    <option value="Libyan Arab Jamahiriya">
                      Libyan Arab Jamahiriya
                    </option>
                    <option value="Liechtenstein">Liechtenstein</option>
                    <option value="Lithuania">Lithuania</option>
                    <option value="Luxembourg">Luxembourg</option>
                    <option value="Macau">Macau</option>
                    <option value="Macedonia">
                      Macedonia, The Former Yugoslav Republic of
                    </option>
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
                    <option value="Micronesia">
                      Micronesia, Federated States of
                    </option>
                    <option value="Moldova">Moldova, Republic of</option>
                    <option value="Monaco">Monaco</option>
                    <option value="Mongolia">Mongolia</option>
                    <option value="Montserrat">Montserrat</option>
                    <option value="Morocco">Morocco</option>
                    <option value="Mozambique">Mozambique</option>
                    <option value="Myanmar">Myanmar</option>
                    <option value="Namibia">Namibia</option>
                    <option value="Nauru">Nauru</option>
                    <option value="Nepal">Nepal</option>
                    <option value="Netherlands">Netherlands</option>
                    <option value="Netherlands Antilles">
                      Netherlands Antilles
                    </option>
                    <option value="New Caledonia">New Caledonia</option>
                    <option value="New Zealand">New Zealand</option>
                    <option value="Nicaragua">Nicaragua</option>
                    <option value="Niger">Niger</option>
                    <option value="Nigeria">Nigeria</option>
                    <option value="Niue">Niue</option>
                    <option value="Norfolk Island">Norfolk Island</option>
                    <option value="Northern Mariana Islands">
                      Northern Mariana Islands
                    </option>
                    <option value="Norway">Norway</option>
                    <option value="Oman">Oman</option>
                    <option value="Pakistan">Pakistan</option>
                    <option value="Palau">Palau</option>
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
                    <option value="Russia">Russian Federation</option>
                    <option value="Rwanda">Rwanda</option>
                    <option value="Saint Kitts and Nevis">
                      Saint Kitts and Nevis
                    </option>
                    <option value="Saint LUCIA">Saint LUCIA</option>
                    <option value="Saint Vincent">
                      Saint Vincent and the Grenadines
                    </option>
                    <option value="Samoa">Samoa</option>
                    <option value="San Marino">San Marino</option>
                    <option value="Sao Tome and Principe">
                      Sao Tome and Principe
                    </option>
                    <option value="Saudi Arabia">Saudi Arabia</option>
                    <option value="Senegal">Senegal</option>
                    <option value="Seychelles">Seychelles</option>
                    <option value="Sierra">Sierra Leone</option>
                    <option value="Singapore">Singapore</option>
                    <option value="Slovakia">
                      Slovakia (Slovak Republic)
                    </option>
                    <option value="Slovenia">Slovenia</option>
                    <option value="Solomon Islands">Solomon Islands</option>
                    <option value="Somalia">Somalia</option>
                    <option value="South Africa">South Africa</option>
                    <option value="South Georgia">
                      South Georgia and the South Sandwich Islands
                    </option>
                    <option value="Span">Spain</option>
                    <option value="SriLanka">Sri Lanka</option>
                    <option value="St. Helena">St. Helena</option>
                    <option value="St. Pierre and Miguelon">
                      St. Pierre and Miquelon
                    </option>
                    <option value="Sudan">Sudan</option>
                    <option value="Suriname">Suriname</option>
                    <option value="Svalbard">
                      Svalbard and Jan Mayen Islands
                    </option>
                    <option value="Swaziland">Swaziland</option>
                    <option value="Sweden">Sweden</option>
                    <option value="Switzerland">Switzerland</option>
                    <option value="Syria">Syrian Arab Republic</option>
                    <option value="Taiwan">Taiwan, Province of China</option>
                    <option value="Tajikistan">Tajikistan</option>
                    <option value="Tanzania">
                      Tanzania, United Republic of
                    </option>
                    <option value="Thailand">Thailand</option>
                    <option value="Togo">Togo</option>
                    <option value="Tokelau">Tokelau</option>
                    <option value="Tonga">Tonga</option>
                    <option value="Trinidad and Tobago">
                      Trinidad and Tobago
                    </option>
                    <option value="Tunisia">Tunisia</option>
                    <option value="Turkey">Turkey</option>
                    <option value="Turkmenistan">Turkmenistan</option>
                    <option value="Turks and Caicos">
                      Turks and Caicos Islands
                    </option>
                    <option value="Tuvalu">Tuvalu</option>
                    <option value="Uganda">Uganda</option>
                    <option value="Ukraine">Ukraine</option>
                    <option value="United Arab Emirates">
                      United Arab Emirates
                    </option>
                    <option value="United Kingdom">United Kingdom</option>
                    <option value="United States">United States</option>
                    <option value="United States Minor Outlying Islands">
                      United States Minor Outlying Islands
                    </option>
                    <option value="Uruguay">Uruguay</option>
                    <option value="Uzbekistan">Uzbekistan</option>
                    <option value="Vanuatu">Vanuatu</option>
                    <option value="Venezuela">Venezuela</option>
                    <option value="Vietnam">Viet Nam</option>
                    <option value="Virgin Islands (British)">
                      Virgin Islands (British)
                    </option>
                    <option value="Virgin Islands (U.S)">
                      Virgin Islands (U.S.)
                    </option>
                    <option value="Wallis and Futana Islands">
                      Wallis and Futuna Islands
                    </option>
                    <option value="Western Sahara">Western Sahara</option>
                    <option value="Yemen">Yemen</option>
                    <option value="Serbia">Serbia</option>
                    <option value="Zambia">Zambia</option>
                    <option value="Zimbabwe">Zimbabwe</option>
                  </select>
                </td>
              </tr>
            </table>

            <div>
              <button class="signbtn mt-3 mb-3" name="register" type="submit">
                Register
              </button>
            </div>
          </form>

          <a class="acca" onclick="showlogin()">Already have an account?</a>
        </div>
      </div>
    </div>
  </div>

  <div class="container mt-5">
    <hr>
  </div>

  <div class="container pb-4" style="display: flex; justify-content: center">
    <p style="font-weight: 600">© All rights are reserved by mailbox.com</p>
  </div>
  <script src="https://code.jquery.com/jquery-3.5.1.min.js" integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0=" crossorigin="anonymous"></script>
  <script src="./js/script.js"></script>
</body>

</html>