<?php 
session_start();
if(!isset($_SESSION['username'])){
echo 'Opps! atfirst you need to <a href="login.php">login</a> & proof that you are a true member.';
}else{ ?>
<?php 
include "db_connection.php";
ini_set('display_errors', 0);
?>
<!DOCTYPE html>
<html lang="en">
<head>
     <meta charset="UTF-8">
     <meta name="viewport" content="width=device-width, initial-scale=1.0">
     <?php include "bootstrapcss-and-icons.php"; ?>
     
     <link rel="icon" type="image/x-icon" href="img/background/agguoralogo.jpg">
     <title>Edit Your Profile | Agguora</title>
     <!-- Google tag (gtag.js) -->
<script async src="https://www.googletagmanager.com/gtag/js?id=G-YXXL0NCGLE"></script>
<script>
  window.dataLayer = window.dataLayer || [];
  function gtag(){dataLayer.push(arguments);}
  gtag('js', new Date());

  gtag('config', 'G-YXXL0NCGLE');
</script>
</head>
<?php include "fonts.php"; ?>

<body>
     <!-- Profile details edit -Start -->
     <?php
     $update = isset($_GET['update']) ? htmlspecialchars(mysqli_real_escape_string($conn, $_GET['update'])) : null;
     if (!$update) {
          echo "Invalid user ID";
          exit;
     }

     $sql_query = "SELECT * FROM `user` WHERE id = '{$update}'";
     if (mysqli_query($conn, $sql_query) && mysqli_num_rows(mysqli_query($conn, $sql_query)) > 0) {
          $u = mysqli_fetch_assoc(mysqli_query($conn, $sql_query));
          $update_id = $u['id'];

          if (isset($_POST['submit'])) {
               // User details
               // Required
               $username = htmlspecialchars(mysqli_real_escape_string($conn, $_POST["uname"]));
               // Optional
               $about = htmlspecialchars(mysqli_real_escape_string($conn, $_POST['about']));
               $bday = htmlspecialchars(mysqli_real_escape_string($conn, $_POST['bday']));
               $gender = htmlspecialchars(mysqli_real_escape_string($conn, $_POST['gender']));
               $country = htmlspecialchars(mysqli_real_escape_string($conn, $_POST['country']));
               $pContact = htmlspecialchars(mysqli_real_escape_string($conn, $_POST['pcontact']));
               $twitter = htmlspecialchars(mysqli_real_escape_string($conn, $_POST['twitter']));
               $facebook = htmlspecialchars(mysqli_real_escape_string($conn, $_POST['facebook']));
               $instagram = htmlspecialchars(mysqli_real_escape_string($conn, $_POST['instagram']));
               $github = htmlspecialchars(mysqli_real_escape_string($conn, $_POST['github']));

               if (!empty($username)) {
                    $sql = "UPDATE `user` SET 
                `username` = '$username',
                `about` = '$about',
                `cake_day` = '$bday',
                `gender` = '$gender',
                `country` = '$country',
                `personalcontact` = '$pContact',
                `twitter` = '$twitter',
                `facebook` = '$facebook',
                `instagram` = '$instagram',
                `github` = '$github'
                WHERE `id` = $update_id";

                    $result = mysqli_query($conn, $sql);

                    if ($result) {
                         ?>
                         <script>window.location.href = "https://www.agguora.site/profile.php?update=<?php echo $update_id ?>";</script>

                         <?php

                    } else {
                         echo' <div class="alert alert-danger rounded-0" role="alert" style="font-size:15px;">Opps! Somthing went wrong : (</div>';
                    }
               } else {
                    echo' <div class="alert alert-danger rounded-0" role="alert" style="font-size:15px;">Please fill in all the details.</div>';

               }
          }
     } else {
          echo' <div class="alert alert-danger rounded-0" role="alert" style="font-size:15px;">No user found with ID:'. $update.'</div>';

     }
     ?>
     <?php
     $retrieve = "SELECT * FROM `user` WHERE id = '$update'";
     $result = mysqli_query($conn, $retrieve);
     if ($result) {
          if (mysqli_num_rows($result) > 0) {
               while ($row = mysqli_fetch_assoc($result)) {
                    ?>
                    <form class="container py-3 px-4 bg-light border" action="" method="post">
                         <!-- Important section -Start  -->
                         <h4 style="text-align:center;" class="py-2">Edit your profile</h4>
                         <div class="input-group mb-3">
                              <input type="hidden" class="form-control" value="<?php echo $row['username']; ?>" name="uname"
                                   aria-label="Username" aria-describedby="basic-addon1" required>
                         </div>
                         
                         <!-- Importent section -End  -->

                         <!-- Optional section -Start  -->
                         <label for="exampleFormControlInput1" class="form-label"><i class="ri-cake-2-fill"></i> Cake Day</label>
                         <div id="date-picker-example" class="md-form md-outline input-with-post-icon datepicker" inline="true">
                              <input value="<?php echo $row['cake_day']; ?>" name="bday" type="text" id="example" class="form-control">
                         </div><br>
                         <label for="exampleFormControlInput1" class="form-label"><i class="ri-men-line"></i><i
                                   class="ri-women-line"></i>
                              Gendar</label>
                         <select name="gender" class="form-select" aria-label="Default select example">
                              <option value="<?php echo $row['gender']; ?>" selected>
                                   <?php echo $row['gender']; ?>
                              </option>
                              <option value="female">Female</option>
                              <option value="male">Male</option>
                              <option value="non-binary">Non-Binary</option>
                              <option value="other">Other</option>
                              <option value="Prefer not to answer">Perfer not to Answer</option>
                         </select>
                         <br>
                         <label for="exampleFormControlInput1" class="form-label"><i class="ri-flag-fill"></i> Country</label>
                         <select name="country" class="form-select" aria-label="Default select example">
                              <option value="<?php echo $row['country']; ?>" selected>
                                   <?php echo $row['country']; ?>
                              </option>
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
                         <br>

                         <div class="form-floating">
                              <textarea class="form-control" placeholder="About your self(Optional)" id="floatingTextarea2"
                                   name="about" style="height: 100px"><?php echo $row['about']; ?></textarea>
                              <label for="floatingTextarea2">About</label>
                         </div>
                         <br>
                         <!-- Social media account -Start  -->
                         <div class="mb-3">
                              <label for="exampleFormControlInput1" class="form-label"><i class="ri-phone-fill"></i> Contact</label>
                              <input type="number" class="form-control" id="exampleFormControlInput1"
                                   value="<?php echo $row['personalcontact']; ?>" name="pcontact">
                         </div>
                         <div class="mb-3">
                              <label for="basic-url" class="form-label"><i class="ri-twitter-fill"></i> account</label>
                              <div class="input-group">
                                   <input type="text" class="form-control" id="basic-url" name="twitter"
                                        value="<?php echo $row['twitter']; ?>" aria-describedby="basic-addon3 basic-addon4">
                              </div>
                         </div>
                         <div class="mb-3">
                              <label for="basic-url" class="form-label"><i class="ri-facebook-circle-fill"></i> profile</label>
                              <div class="input-group">
                                   <input type="text" class="form-control" id="basic-url" name="facebook"
                                        value="<?php echo $row['facebook']; ?>" aria-describedby="basic-addon3 basic-addon4">
                              </div>

                         </div>
                         <div class="mb-3">
                              <label for="basic-url" class="form-label"><i class="ri-instagram-fill"></i> profile</label>
                              <div class="input-group">
                                   <input type="text" class="form-control" id="basic-url" name="instagram"
                                        value="<?php echo $row['instagram']; ?>" aria-describedby="basic-addon3 basic-addon4">
                              </div>
                         </div>
                         <div class="mb-3">
                              <label for="basic-url" class="form-label"><i class="ri-github-fill"></i> account</label>
                              <div class="input-group">
                                   <input type="text" class="form-control" id="basic-url" name="github"
                                        value="<?php echo $row['github']; ?>" aria-describedby="basic-addon3 basic-addon4">
                              </div>
                         </div>
                         <!-- Social media account -End  -->

                         <!-- Optional section -End  -->
                         <button type="submit" name="submit" class="btn btn-dark w-100 rounded-0">Update profile details</button>
                    </form>

                    <!-- Profile details edit -End  -->
                    <?php
               }
          }
     }

     mysqli_close($conn);
     ?>
     <?php include "bootstrapjs.php"; ?>
</body>
</html>
<?php } ?>