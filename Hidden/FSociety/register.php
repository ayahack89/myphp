<?php
include "db_connection.php";
error_reporting(E_ALL);
ini_set('display_errors', 1);

?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Welcome to fSociety - "your hidden society" - register</title>
  <link rel="stylesheet" href="css/style.css">
</head>

<body style="background-color:#cbd5e1;">
  <div style="width: 80vw; margin:auto; background-color:white; border:1px solid #64748b;">
    <div class="nav">
      <div class="header">
        <div class="logo">
          <img src="img/f-society-original.png" width="100px" height="100px" alt="fsocietylogo" />
        </div>
        <div class="logoText">
          <span><b class="bigtext">fsociety</b><br></span>
          <span class="smalltext"><i>"Your Hidden Society"</i></span>
        </div>
      </div>
    </div>


    <div class="mainContainer">
      <div class="formContainer" style="width:450px">
        <?php
        if (isset($_POST["submit"])) {

          if (!$conn) {
            die("Connection failed: " . mysqli_connect_error());
          }

          // User details
          // Required
          $userName = mysqli_real_escape_string($conn, $_POST["uname"]);
          $userpassword = mysqli_real_escape_string($conn, $_POST["password"]);
          $userrepass = mysqli_real_escape_string($conn, $_POST["repassword"]);
          // Optional
          $about = mysqli_real_escape_string($conn, $_POST['about']);
          $gender = mysqli_real_escape_string($conn, $_POST['gender']);
          $country = mysqli_real_escape_string($conn, $_POST['country']);
          $pContact = mysqli_real_escape_string($conn, $_POST['pcontact']);
          // User profile pic
          $imgName = $_FILES['profile_pic']['name'];
          $tempImgName = $_FILES['profile_pic']['tmp_name'];
          $imgSize = $_FILES['profile_pic']['size'];
          $imgError = $_FILES['profile_pic']['error'];

          // Encrypt password
          $userpass_hash = password_hash($userpassword, PASSWORD_DEFAULT);
          $repass_hash = password_hash($userrepass, PASSWORD_DEFAULT);

          if (!empty($userName) && !empty($userpassword) && !empty($userrepass)) {
            $user_check = "SELECT * FROM `user` WHERE username = '$userName'";
            $check = mysqli_query($conn, $user_check);
            $user_exist_verification = mysqli_num_rows($check);

            if ($user_exist_verification > 0) {
              echo "<h3>User already exists. Please choose a different username.</h3>";
            } else {
              if ($userpassword !== $userrepass) {
                echo "<h5 style='font-family: Arial;'>Password not matched!</h5>";
              } else {
                if ($imgError === 0) {
                  $imgEx = pathinfo($imgName, PATHINFO_EXTENSION);
                  $imgExLowerStr = strtolower($imgEx);
                  // Allowed only image types
                  $allowedImageTypes = array('jpeg', 'png', 'jpg');

                  if (in_array($imgExLowerStr, $allowedImageTypes)) {
                    $newImgName = uniqid($userName, true) . '.' . $imgExLowerStr;
                    $imageUpload = 'img/images/' . $newImgName;


                    if (move_uploaded_file($tempImgName, $imageUpload)) {
                      $sql = "INSERT INTO `user` (`username`, `password`, `repassword`, `about`, `gender`, `country`, `personalcontact`, `profile_pic`) VALUES ('$userName', '$userpass_hash', '$repass_hash',  '$about', '$gender', '$country', '$pContact', '$newImgName')";
                      $result = mysqli_query($conn, $sql);

                      if ($result) {
                        header("Location: index.php");
                        exit(); // Exit to prevent further execution
                      } else {
                        echo "Error: " . mysqli_error($conn);
                      }
                    } else {
                      echo "Failed to upload your profile image :(";
                    }
                  } else {
                    echo "Please choose only jpeg, png, jpg types of images";
                  }
                } else {
                  echo "File upload error: " . $imgError;
                }
              }
            }
          } else {
            echo "Please fill in the required details carefully!";
          }

          // Close the database connection
          mysqli_close($conn);
        }
        ?>




        <form action="register.php" method="post" enctype="multipart/form-data">
          <span style=" font-size:1.2rem;">Create your account</span>
          <label for="UserName">
            <input type="text" name="uname" placeholder="@Username (required)" style="width:94%;" required />
          </label><br />
          <label for="password">
            <input type="password" name="password" placeholder="#password (required)" style="width:94%;" required />
          </label><br />
          <label for="retypepassword">
            <input type="password" name="repassword" placeholder="#retypepassword (required)" style="width:94%;"
              required />
          </label><br />
          <br />
          <hr>
          <label for="gender">
            <select name="gender" style="border:2px solid gainsboro; padding:8px; margin:5px; width:94%;">
              <option value="">Please select one…(Oprional)</option>
              <option value="female">Female</option>
              <option value="male">Male</option>
              <option value="non-binary">Non-Binary</option>
              <option value="other">Other</option>
              <option value="Prefer not to answer">Perfer not to Answer</option>
            </select>
          </label>
          <label for=" country">
            <select name="country" style="border:2px solid gainsboro; padding:8px; margin:5px; width:94%;">
              <option value="#">--Select your country--(Optional)</option>
              <option value="Not mentioned">Not mentioned</option>
              <option value="Afghanistan">Afghanistan</option>
              <option value="Albania">Albania</option>
              <option value="Algeria">Algeria</option>
              <option value="American Samoa">American Samoa</option>
              <option value="Andorra">Andorra</option>
              <option value="Angola">Angola</option>
              <option value="Anguilla">Anguilla</option>
              <option value="Antartica">Antarctica</option>
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
              <option value="Bosnia and Herzegowina">Bosnia and Herzegowina</option>
              <option value="Botswana">Botswana</option>
              <option value="Bouvet Island">Bouvet Island</option>
              <option value="Brazil">Brazil</option>
              <option value="British Indian Ocean Territory">British Indian Ocean
                Territory
              </option>
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
              <option value="Cocos Islands">Cocos (Keeling) Islands</option>
              <option value="Colombia">Colombia</option>
              <option value="Comoros">Comoros</option>
              <option value="Congo">Congo</option>
              <option value="Congo">Congo, the Democratic Republic of the</option>
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
              <option value="Dominican Republic">Dominican Republic</option>
              <option value="East Timor">East Timor</option>
              <option value="Ecuador">Ecuador</option>
              <option value="Egypt">Egypt</option>
              <option value="El Salvador">El Salvador</option>
              <option value="Equatorial Guinea">Equatorial Guinea</option>
              <option value="Eritrea">Eritrea</option>
              <option value="Estonia">Estonia</option>
              <option value="Ethiopia">Ethiopia</option>
              <option value="Falkland Islands">Falkland Islands (Malvinas)</option>
              <option value="Faroe Islands">Faroe Islands</option>
              <option value="Fiji">Fiji</option>
              <option value="Finland">Finland</option>
              <option value="France">France</option>
              <option value="France Metropolitan">France, Metropolitan</option>
              <option value="French Guiana">French Guiana</option>
              <option value="French Polynesia">French Polynesia</option>
              <option value="French Southern Territories">French Southern Territories
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
              <option value="Heard and McDonald Islands">Heard and Mc Donald Islands
              </option>
              <option value="Holy See">Holy See (Vatican City State)</option>
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
              <option value="Democratic People's Republic of Korea">Korea, Democratic
                People's
                Republic of</option>
              <option value="Korea">Korea, Republic of</option>
              <option value="Kuwait">Kuwait</option>
              <option value="Kyrgyzstan">Kyrgyzstan</option>
              <option value="Lao">Lao People's Democratic Republic</option>
              <option value="Latvia">Latvia</option>
              <option value="Lebanon">Lebanon</option>
              <option value="Lesotho">Lesotho</option>
              <option value="Liberia">Liberia</option>
              <option value="Libyan Arab Jamahiriya">Libyan Arab Jamahiriya</option>
              <option value="Liechtenstein">Liechtenstein</option>
              <option value="Lithuania">Lithuania</option>
              <option value="Luxembourg">Luxembourg</option>
              <option value="Macau">Macau</option>
              <option value="Macedonia">Macedonia, The Former Yugoslav Republic of
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
              <option value="Micronesia">Micronesia, Federated States of</option>
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
              <option value="Saint Kitts and Nevis">Saint Kitts and Nevis</option>
              <option value="Saint LUCIA">Saint LUCIA</option>
              <option value="Saint Vincent">Saint Vincent and the Grenadines</option>
              <option value="Samoa">Samoa</option>
              <option value="San Marino">San Marino</option>
              <option value="Sao Tome and Principe">Sao Tome and Principe</option>
              <option value="Saudi Arabia">Saudi Arabia</option>
              <option value="Senegal">Senegal</option>
              <option value="Seychelles">Seychelles</option>
              <option value="Sierra">Sierra Leone</option>
              <option value="Singapore">Singapore</option>
              <option value="Slovakia">Slovakia (Slovak Republic)</option>
              <option value="Slovenia">Slovenia</option>
              <option value="Solomon Islands">Solomon Islands</option>
              <option value="Somalia">Somalia</option>
              <option value="South Africa">South Africa</option>
              <option value="South Georgia">South Georgia and the South Sandwich Islands
              </option>
              <option value="Span">Spain</option>
              <option value="SriLanka">Sri Lanka</option>
              <option value="St. Helena">St. Helena</option>
              <option value="St. Pierre and Miguelon">St. Pierre and Miquelon</option>
              <option value="Sudan">Sudan</option>
              <option value="Suriname">Suriname</option>
              <option value="Svalbard">Svalbard and Jan Mayen Islands</option>
              <option value="Swaziland">Swaziland</option>
              <option value="Sweden">Sweden</option>
              <option value="Switzerland">Switzerland</option>
              <option value="Syria">Syrian Arab Republic</option>
              <option value="Taiwan">Taiwan, Province of China</option>
              <option value="Tajikistan">Tajikistan</option>
              <option value="Tanzania">Tanzania, United Republic of</option>
              <option value="Thailand">Thailand</option>
              <option value="Togo">Togo</option>
              <option value="Tokelau">Tokelau</option>
              <option value="Tonga">Tonga</option>
              <option value="Trinidad and Tobago">Trinidad and Tobago</option>
              <option value="Tunisia">Tunisia</option>
              <option value="Turkey">Turkey</option>
              <option value="Turkmenistan">Turkmenistan</option>
              <option value="Turks and Caicos">Turks and Caicos Islands</option>
              <option value="Tuvalu">Tuvalu</option>
              <option value="Uganda">Uganda</option>
              <option value="Ukraine">Ukraine</option>
              <option value="United Arab Emirates">United Arab Emirates</option>
              <option value="United Kingdom">United Kingdom</option>
              <option value="United States">United States</option>
              <option value="United States Minor Outlying Islands">United States Minor
                Outlying
                Islands</option>
              <option value="Uruguay">Uruguay</option>
              <option value="Uzbekistan">Uzbekistan</option>
              <option value="Vanuatu">Vanuatu</option>
              <option value="Venezuela">Venezuela</option>
              <option value="Vietnam">Viet Nam</option>
              <option value="Virgin Islands (British)">Virgin Islands (British)</option>
              <option value="Virgin Islands (U.S)">Virgin Islands (U.S.)</option>
              <option value="Wallis and Futana Islands">Wallis and Futuna Islands
              </option>
              <option value="Western Sahara">Western Sahara</option>
              <option value="Yemen">Yemen</option>
              <option value="Serbia">Serbia</option>
              <option value="Zambia">Zambia</option>
              <option value="Zimbabwe">Zimbabwe</option>

            </select>
          </label><br><br>
          <label for="about">
            <textarea name="about" cols="70" rows="5" placeholder="About your self... (Optional)"
              style="font-family:sans-serif; margin-left:8px;"></textarea>
          </label><br>


          <label for="pContact">
            <input type="text" name="pcontact" placeholder="Personal Contact (Optional)"
              style="border:2px solid gainsboro; padding:8px; margin:5px; width:94%;">
          </label><br>
          <label for="proPic">
            <input type="file" name="profile_pic"
              style="border:2px solid gainsboro; padding:8px; margin:5px; width:50%;">
          </label><br><br>
          <input type="submit" name="submit" value="Register" />
        </form>

      </div>
      <p style="font-size:15px; text-align:center;">Already a member! Go to <a href="index.php">LogIn</a> </p>
      <div class="desc">



        <p>fSociety - a anonymus marketplace & a community like you can buy our services and discuss your product
          quality with others, talk with real hackers, go to our chatroom and chat with others.
          In the chatting section there are no restriction. It is very easy just go click on the 'Chatroom' & chose a
          random name or you can chose your own user name and that's it now lets chats with others.</p>


        <p>It's a socity, a community and your anonymus marketplace where you can buy some crazy stuff using cryptos
          like Bitcoin, Monaro etc.</p>


        <p>fSociety where you can find your own heven. In this community everyone has their own privacy, anonymity and
          power like a darkside of Superman.
          In this community everyone are Homelander - <i>"I can do what ever I want!"</i> . Yes! this is it. </p>


        <p>It's very easy. Just you need to login (Register if you are new in this community! But if you are already a
          member just click the 'LogIn' and go to the login form and login your account) and create a anonymus account
          and that's it.
          Dont worry about the hole loging process, you just put a random user name like whaterver you want and a unique
          password, it's totaly your choice and after login your all data will be deleted in 24 hours. We provide a
          anonymus place of our users, total privacy no restriction.
          Hope you like it & and don't forget to give your feedback of our review section : )</p>

      </div>

    </div>
    <div class="footer">000fSociety</div>
  </div>
</body>

</html>