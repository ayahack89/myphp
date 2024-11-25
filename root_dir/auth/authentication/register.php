<?php
include "db_connection.php";
ini_set('display_errors', 1);

//PHPMailer
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

// require 'public_html/phpmailer/vendor/phpmailer/phpmailer/src/PHPMailer.php';
// require 'public_html/phpmailer/vendor/phpmailer/phpmailer/src/Exception.php';
// require 'public_html/phpmailer/vendor/phpmailer/phpmailer/src/SMTP.php';

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta name="description"
        content="Agguora: share knowledge, connect. Register now for a unique, secure, and private experience. Register now and be an active user...">
    <?php include "bootstrapcss-and-icons.php" ?>

    <link rel="icon" type="image/x-icon" href="img/background/agguoralogo.jpg">
    <title>Create Your User Account | Agguora</title>
    <!-- Google tag (gtag.js) -->
    <script async src="https://www.googletagmanager.com/gtag/js?id=G-YXXL0NCGLE"></script>
    <script>
        window.dataLayer = window.dataLayer || [];
        function gtag() { dataLayer.push(arguments); }
        gtag('js', new Date());

        gtag('config', 'G-YXXL0NCGLE');
    </script>
</head>
<?php include "fonts.php"; ?>
<style>
    .from-box {
        width: 50vw;
        margin: auto;
    }

    .form-container {
        max-width: 800px;
        margin: auto;
        padding: 20px;
        background-color: #f8f9fa;
        border-radius: 8px;
    }

    .form-heading {
        font-size: 1.5rem;
        text-align: center;
        margin-bottom: 1rem;
    }

    .form-heading i {
        font-size: 1.8rem;
    }

    .form-label i {
        margin-right: 0.5rem;
    }

    .form-control,
    .form-select {
        border-radius: 0.375rem;
    }

    .btn-custom {
        background-color: #343a40;
        color: white;
        border: none;
    }

    .btn-custom:hover {
        background-color: #23272b;
    }
</style>

<body>
    <?php include "header.php"; ?>
    <?php
    //PHPMailer.Vendor
    require 'phpmailer/vendor/autoload.php';
    //From submission script -Start 
    if (isset($_POST["submit"])) {
        if (!$conn) {
            die("Connection failed: " . mysqli_connect_error());
        }

        // Mandatory fields
        $userName = htmlspecialchars(mysqli_real_escape_string($conn, $_POST["uname"]));
        $userEmail = htmlspecialchars(mysqli_real_escape_string($conn, $_POST["email"]));
        $userpassword = htmlspecialchars(mysqli_real_escape_string($conn, $_POST["password"]));
        $userrepass = htmlspecialchars(mysqli_real_escape_string($conn, $_POST["repassword"]));

        // Encrypt password
        $userpass_hash = password_hash($userpassword, PASSWORD_DEFAULT);
        $repass_hash = password_hash($userrepass, PASSWORD_DEFAULT);

        if (!empty($userName) && !empty($userEmail) && !empty($userpassword) && !empty($userrepass)) {
            $user_check = "SELECT * FROM `user` WHERE username = '$userName'";
            $check = mysqli_query($conn, $user_check);
            $user_exist_verification = mysqli_num_rows($check);

            if ($user_exist_verification > 0) {
                echo ' <div class="alert alert-danger rounded-0" role="alert" style="font-size:15px;">User already exists. Please choose a different username.</div>';
            } else {
                if ($userpassword !== $userrepass) {
                    echo ' <div class="alert alert-danger rounded-0" role="alert" style="font-size:15px;">Password not matched!</div>';
                } else {
                    // User details fields
                    $about = htmlspecialchars(mysqli_real_escape_string($conn, $_POST['about']));
                    $bday = htmlspecialchars(mysqli_real_escape_string($conn, $_POST['bday']));
                    $gender = htmlspecialchars(mysqli_real_escape_string($conn, $_POST['gender']));
                    $country = htmlspecialchars(mysqli_real_escape_string($conn, $_POST['country']));
                    $school = htmlspecialchars(mysqli_real_escape_string($conn, $_POST['school']));
                    $clg_university = htmlspecialchars(mysqli_real_escape_string($conn, $_POST['clg_uni']));
                    $status = htmlspecialchars(mysqli_real_escape_string($conn, $_POST['status']));
                    $looking_for = htmlspecialchars(mysqli_real_escape_string($conn, $_POST['lookingFor']));
                    $interest_in = htmlspecialchars(mysqli_real_escape_string($conn, $_POST['interestIn']));



                    // User profile pic 
                    $newImgName = '';
                    if ($_FILES['profile_pic']['error'] === 0) {
                        $imgName = $_FILES['profile_pic']['name'];
                        $tempImgName = $_FILES['profile_pic']['tmp_name'];
                        $imgEx = pathinfo($imgName, PATHINFO_EXTENSION);
                        $imgExLowerStr = strtolower($imgEx);
                        $allowedImageTypes = array('jpeg', 'png', 'jpg');
                        if (in_array($imgExLowerStr, $allowedImageTypes)) {
                            $newImgName = uniqid($userName, true) . '.' . $imgExLowerStr;
                            $imageUpload = 'img/images/' . $newImgName;
                            if (move_uploaded_file($tempImgName, $imageUpload)) {
                                // Image uploaded successfully
                            } else {
                                echo ' <div class="alert alert-danger rounded-0" role="alert" style="font-size:15px;">Failed to upload your profile image :(</div>';
                            }
                        } else {
                            echo ' <div class="alert alert-danger rounded-0" role="alert" style="font-size:15px;">Please choose only jpeg, png, jpg types of images</div>';
                        }
                    }
                    $sql = "INSERT INTO `user` (`username`, `password`, `repassword`, `profile_pic`, `about`, `gender`, `country`, `cake_day`, `email`, `school`, `clg_university`, `status`, `looking_for`, `interest_in`) VALUES ('{$userName}', '{$userpass_hash}', '{$repass_hash}', '{$newImgName}', '{$about}', '{$gender}', '{$country}', '{$bday}', '{$userEmail}', '{$school}', '{$clg_university}', '{$status}', '{$looking_for}', '{$interest_in}');";
                    $result = mysqli_query($conn, $sql);

                    if ($result) {
                        $mail = new PHPMailer(true);

                        try {
                            // Server settings
                            $mail->SMTPDebug = 0;                     // Disable verbose debug output
                            $mail->isSMTP();                          // Set mailer to use SMTP
                            $mail->Host = 'localhost';                // Set the MailHog server address
                            $mail->SMTPAuth = false;                  // No SMTP authentication is needed
                            $mail->Port = 1025;                       // TCP port MailHog listens on
    

                            // Recipients
                            $mail->setFrom('alpha001@agguora.site', 'Alpha');
                            $str_to_user_email = strval($userEmail);
                            $str_to_user_name = strval($userName);
                            $mail->addAddress($str_to_user_email, $str_to_user_name);  // Add a recipient
    
                            // Content
                            $mail->isHTML(true);                      // Set email format to HTML
                            $mail->Subject = 'Welcome ' . $str_to_user_name;
                            $mail->Body = '<body style="font-family: Arial, sans-serif; color: #333; line-height: 1.6;">
    <table width="100%" cellspacing="0" cellpadding="0">
        <tr>
            <td>
                <table width="600" cellpadding="20" cellspacing="0" align="center" style="background-color: #f4f4f4; border-radius: 8px; box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);">
                    <tr>
                        <td style="text-align: center;">
                            <h2 style="color: #333;">Welcome to Agguora!</h2>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <p>Dear ' . $str_to_user_name . ',</p>
                            <p>Welcome to <strong>Agguora</strong>, where your voice matters, your privacy is protected, and you are part of a vibrant, growing community. We are thrilled to have you join us!</p>
                            <p>At Agguora, we believe in fostering open conversations while keeping your data safe from prying eyes. Whether you want to start a new thread, engage in discussions, or just explore, you are free to roam without the fear of being tracked. Your anonymity is our priority, and we’ve built the platform with that in mind.</p>
                            <h3 style="color: #333;">Here’s a quick rundown of what awaits you:</h3>
                            <ul>
                                <li><strong>Freedom to speak your mind</strong>: Join discussions, share your ideas, and let your voice be heard.</li>
                                <li><strong>Privacy</strong>: You’re safe here. Feel free to use a VPN, browse privately, and always stay in control of your data.</li>
                                <li><strong>Community-driven content</strong>: Your participation is what makes Agguora thrive. Jump into the conversation, build your karma, and make your mark.</li>
                            </ul>
                            <p>If you have any questions, feedback, or just want to say hello, don’t hesitate to reach out. We are here to listen and improve.</p>
                            <p>Thank you for choosing Agguora—your new digital home!</p>
                            <p>See you inside,<br>
                            <strong>Alpha</strong><br>
                            Administrator, Agguora</p>
                        </td>
                    </tr>
                </table>
            </td>
        </tr>
    </table>
</body>';
                            // $mail->AltBody = 'This is the plain text version of the email content';
    
                            $mail->send();
                            echo 'alert("Message sent successfully")';
                            ?>
                            <script>window.location.href = "http://127.0.0.1/php/public_html/login.php";</script>
                            <?php
                        } catch (Exception $e) {
                            echo 'alert("Message could not be sent. Mailer Error: {$mail->ErrorInfo}")';
                        }
                        exit();
                    } else {
                        echo ' <div class="alert alert-danger rounded-0" role="alert" style="font-size:15px;">Oops! Something went wrong : (</div>';
                    }
                }
            }
        } else {
            echo ' <div class="alert alert-danger rounded-0" role="alert" style="font-size:15px;">Please fill in the required details carefully!</div>';
        }
        mysqli_close($conn);
    }
    //From submission script -End 
    ?>

    <!-- form-start -->
    <div class="container mt-5">
        <form class="form-container" action="<?php echo htmlentities($_SERVER['PHP_SELF']); ?>" method="post"
            enctype="multipart/form-data">
            <h1 class="form-heading">Create your account <i class="fas fa-user-circle"></i></h1>
            <span class="d-block text-center mb-3" style="font-size: 0.875rem;">Please select a unique username</span>

            <!-- Required fields -->
            <div class="mb-3">
                <label for="username" class="form-label"><i class="fas fa-user"></i> Username</label>
                <div class="input-group">
                    <span class="input-group-text">@</span>
                    <input type="text" class="form-control" id="username" name="uname" placeholder="Username" required>
                </div>
            </div>
            <div class="mb-3">
                <label for="email" class="form-label"><i class="fas fa-envelope"></i> Email</label>
                <input type="email" class="form-control" id="email" name="email" placeholder="Enter a valid email ID"
                    required>
            </div>
            <div class="mb-3">
                <label for="password" class="form-label"><i class="fas fa-lock"></i> Password</label>
                <input type="password" class="form-control" id="password" name="password" placeholder="Password"
                    required>
            </div>
            <div class="mb-3">
                <label for="repassword" class="form-label"><i class="fas fa-lock"></i> Retype Password</label>
                <input type="password" class="form-control" id="repassword" name="repassword"
                    placeholder="Retype Password" required>
            </div>

            <!-- User details fields -->
            <div class="mb-3">
                <label for="bday" class="form-label"><i class="fas fa-birthday-cake"></i> Cake Day</label>
                <input type="date" class="form-control" id="bday" name="bday" required>
            </div>
            <div class="mb-3">
                <label for="gender" class="form-label"><i class="fas fa-venus-mars"></i> Gender</label>
                <select id="gender" name="gender" class="form-select" required>
                    <option selected>Select your Gender</option>
                    <option value="female">Female</option>
                    <option value="male">Male</option>
                    <option value="non-binary">Non-Binary</option>
                    <option value="other">Other</option>
                    <option value="prefer-not-to-answer">Prefer not to Answer</option>
                </select>
            </div>
            <div class="mb-3">
                <label for="country" class="form-label"><i class="fas fa-flag"></i> Country</label>
                <select id="country" name="country" class="form-select" required>
                    <option selected>Select your country</option>
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

            </div>
            <div class="mb-3">
                <label for="about" class="form-label"><i class="fas fa-info-circle"></i> About</label>
                <textarea id="about" name="about" class="form-control" placeholder="About yourself" rows="3"
                    required></textarea>
            </div>
            <div class="input-group mb-3">
                <input type="file" class="form-control" name="profile_pic" id="inputGroupFile02" required>
                <label class="input-group-text" for="inputGroupFile02">Upload</label>
            </div>
            <div class="mb-3">
                <label for="clg_uni" class="form-label"><i class="fas fa-university"></i> College / University</label>
                <input type="text" class="form-control" id="clg_uni" name="clg_uni"
                    placeholder="Your college / University name?" required>
            </div>
            <div class="mb-3">
                <label for="status" class="form-label"><i class="fas fa-user-tag"></i> Status</label>
                <select id="status" name="status" class="form-select" required>
                    <option selected>Select your status</option>
                    <option value="student">Student</option>
                    <option value="employ">Employed</option>
                    <option value="housewife">Housewife</option>
                    <option value="robot">Robot</option>
                    <option value="dead inside">Prefer not to Answer</option>
                </select>
            </div>
            <div class="mb-3">
                <label for="lookingFor" class="form-label"><i class="fas fa-search"></i> Looking For</label>
                <select id="lookingFor" name="lookingFor" class="form-select" required>
                    <option selected>Looking for?</option>
                    <option value="friends">Friends</option>
                    <option value="teacher">Teacher</option>
                    <option value="husband">Husband</option>
                    <option value="wife">Wife</option>
                    <option value="girlfriend">Girlfriend</option>
                    <option value="boyfriend">Boyfriend</option>
                    <option value="nothing">Prefer not to Answer</option>
                </select>
            </div>
            <div class="mb-3">
                <label for="interestIn" class="form-label"><i class="fas fa-heart"></i> Interest In</label>
                <select id="interestIn" name="interestIn" class="form-select" required>
                    <option selected>Select your Interest</option>
                    <option value="woman">Woman</option>
                    <option value="man">Man</option>
                    <option value="gay">Gay</option>
                    <option value="lesbian">Lesbian</option>
                    <option value="chappri">Chappri</option>
                    <option value="nobody">Prefer not to Answer</option>
                </select>
            </div>
            <button type="submit" name="submit" class="btn btn-custom w-100">Create Account</button>
        </form>
    </div>
    <!-- form-end -->
    <p style="font-size:15px; text-align:center;" class="py-4">Already a member! Go to <a href="login.php">LogIn</a>
    </p>

    <?php include "footer.php"; ?>
    <?php include "bootstrapjs.php"; ?>

</body>

</html>