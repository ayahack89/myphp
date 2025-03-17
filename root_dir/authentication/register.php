<?php
//Database connection
require_once "../db/db_connection.php";

//Error handling 
ini_set('display_errors', 0);
error_reporting(0);

//PHPMailer
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;


require '../vendor/phpmailer/phpmailer/src/PHPMailer.php';
require '../vendor/phpmailer/phpmailer/src/SMTP.php';
require '../vendor/phpmailer/phpmailer/src/Exception.php';


?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta name="description" content="">
    <?php include "../include/bootstrapcss-and-icons.php" ?>

    <link rel="icon" type="image/x-icon" href="img/background/agguoralogo.jpg">
    <title>Create Your User Account | Agguora</title>

</head>
<?php include "../include/fonts.php"; ?>
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

    .password-container {
        position: relative;
    }

    #togglePassword1 {
        position: absolute;
        right: 15px;
        top: 50%;
        transform: translateY(-50%);
        cursor: pointer;
        font-size: 1rem;
        color: gray;
    }
    #togglePassword2 {
        position: absolute;
        right: 15px;
        top: 50%;
        transform: translateY(-50%);
        cursor: pointer;
        font-size: 1rem;
        color: gray;
    }
</style>

<body>
    <?php include "../include/header.php"; ?>
    <?php

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
            $user_check = "SELECT * FROM `user` WHERE email = '$userEmail'";
            $check = mysqli_query($conn, $user_check);
            $user_exist_verification = mysqli_num_rows($check);

            if ($user_exist_verification > 0) {
                echo ' <div class="alert alert-danger rounded" role="alert" style="font-size:15px;">User email already exists. Please try different email to create an account. </div>';
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
                            $imageUpload = '../media/images/' . $newImgName;
                            if (move_uploaded_file($tempImgName, $imageUpload)) {
                                // Image uploaded successfully
                            } else {
                                echo ' <div class="alert alert-danger rounded" role="alert" style="font-size:15px;">Failed to upload your profile photo :(</div>';
                            }
                        } else {
                            echo ' <div class="alert alert-danger rounded" role="alert" style="font-size:15px;">Please choose only jpeg, png, jpg types of images</div>';
                        }
                    }
                    $sql = "INSERT INTO `user` (`username`, `password`, `repassword`, `profile_pic`, `about`, `gender`, `country`, `cake_day`, `email`, `clg_university`,`school`, `status`, `looking_for`, `interest_in`) VALUES ('{$userName}', '{$userpass_hash}', '{$repass_hash}', '{$newImgName}', '{$about}', '{$gender}', '{$country}', '{$bday}', '{$userEmail}', '{$clg_university}','{$school}', '{$status}', '{$looking_for}', '{$interest_in}');";
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
                            $mail->setFrom('alphaoran9@gmail.com', 'Ayanabha');
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
                            echo '<script>console.log("Message sent successfully");</script>';
                            ?>
                            <script>window.location.href = "login.php";</script>
                            <?php
                        } catch (Exception $e) {
                            echo '<script>console.log("Message could not be sent. Mailer Error: {$mail->ErrorInfo}");</script>';
                        }
                        exit();
                    } else {
                        echo ' <div class="alert alert-danger rounded" role="alert" style="font-size:15px;">Oops! Something went wrong : (</div>';
                    }
                }
            }
        } else {
            echo ' <div class="alert alert-danger rounded" role="alert" style="font-size:15px;">Please fill in the required details carefully!</div>';
        }
        mysqli_close($conn);
    }
    //From submission script -End 
    ?>

    <!-- form-start -->
    <div class="container mt-5">
        <form class="form-container rounded border" action="<?php echo htmlentities($_SERVER['PHP_SELF']); ?>"
            method="post" enctype="multipart/form-data">
            <div class="my-3">
                <h1 class="form-heading">Create your account </h1>
            </div>

            <!-- User details fields -->
            <div class="mb-3">
                <label for="username" class="form-label"><i class="fas fa-user"></i> Username</label>
                <div class="input-group">
                    <input type="text" class="form-control" id="username" name="uname" placeholder="Username">
                </div>
            </div>
            <div class="mb-3">
                <label for="email" class="form-label"><i class="fas fa-envelope"></i> Email</label>
                <input type="email" class="form-control" id="email" name="email" placeholder="Enter a valid email ID">
            </div>

            <div class="mb-3">
                <label for="password" class="form-label">
                    <i class="fas fa-lock"></i> Password
                </label>
                <div class="password-container">
                    <input type="password" class="form-control" id="password" name="password" placeholder="Password">
                    <i class="fas fa-eye-slash" id="togglePassword1"></i>
                </div>
            </div>

            <div class="mb-3">
                <label for="repassword" class="form-label">
                    <i class="fas fa-lock"></i> Retype Password
                </label>
                <div class="password-container">
                    <input type="password" class="form-control" id="repassword" name="repassword"
                        placeholder="Retype Password">
                    <i class="fas fa-eye-slash" id="togglePassword2"></i>
                </div>
            </div>

            <script>
                const passwordInput = document.getElementById('password');
                const repasswordInput = document.getElementById('repassword');

                const togglePassword1 = document.getElementById('togglePassword1');
                const togglePassword2 = document.getElementById('togglePassword2');

                togglePassword1.addEventListener('click', () => {
                    const type = passwordInput.getAttribute('type') === 'password' ? 'text' : 'password';
                    passwordInput.setAttribute('type', type);
                    togglePassword1.classList.toggle('fa-eye');
                    togglePassword1.classList.toggle('fa-eye-slash');
                });

                togglePassword2.addEventListener('click', () => {
                    const type = repasswordInput.getAttribute('type') === 'password' ? 'text' : 'password';
                    repasswordInput.setAttribute('type', type);
                    togglePassword2.classList.toggle('fa-eye');
                    togglePassword2.classList.toggle('fa-eye-slash');
                });
            </script>

            <div class="mb-3">
                <label for="bday" class="form-label"><i class="fas fa-birthday-cake"></i> Cake Day</label>
                <input type="date" class="form-control" id="bday" name="bday" required>
            </div>

            <div class="mb-3">
                <label for="gender" class="form-label">
                    <i class="fas fa-venus-mars"></i> Gender
                </label>
                <select id="gender" name="gender" class="form-select" required></select>
            </div>

            <script>
                const genderOptions = [
                    { value: '', text: 'Select your Gender', disabled: true, selected: true },
                    { value: 'female', text: 'Female' },
                    { value: 'male', text: 'Male' },
                    { value: 'non-binary', text: 'Non-Binary' },
                    { value: 'transgender', text: 'Transgender' },
                    { value: 'genderfluid', text: 'Gender Fluid' },
                    { value: 'agender', text: 'Agender' },
                    { value: 'other', text: 'Other' },
                    { value: 'prefer-not-to-answer', text: 'Prefer not to Answer' }
                ];


                const genderSelect = document.getElementById('gender');

                genderOptions.forEach(optionData => {
                    const option = document.createElement('option');
                    option.value = optionData.value;
                    option.textContent = optionData.text;
                    if (optionData.disabled) option.disabled = true;
                    if (optionData.selected) option.selected = true;
                    genderSelect.appendChild(option);
                });
            </script>

            <div class="mb-3">
                <label for="country" class="form-label">
                    <i class="fas fa-flag"></i> Country
                </label>
                <select id="country" name="country" class="form-select" required></select>
            </div>

            <script>
                const countryOptions = [
                    { value: '', text: 'Select your Country', disabled: true, selected: true },
                    { value: 'afghanistan', text: 'Afghanistan' },
                    { value: 'albania', text: 'Albania' },
                    { value: 'algeria', text: 'Algeria' },
                    { value: 'andorra', text: 'Andorra' },
                    { value: 'angola', text: 'Angola' },
                    { value: 'argentina', text: 'Argentina' },
                    { value: 'armenia', text: 'Armenia' },
                    { value: 'australia', text: 'Australia' },
                    { value: 'austria', text: 'Austria' },
                    { value: 'azerbaijan', text: 'Azerbaijan' },
                    { value: 'bahamas', text: 'Bahamas' },
                    { value: 'bahrain', text: 'Bahrain' },
                    { value: 'bangladesh', text: 'Bangladesh' },
                    { value: 'belgium', text: 'Belgium' },
                    { value: 'brazil', text: 'Brazil' },
                    { value: 'bulgaria', text: 'Bulgaria' },
                    { value: 'canada', text: 'Canada' },
                    { value: 'china', text: 'China' },
                    { value: 'colombia', text: 'Colombia' },
                    { value: 'croatia', text: 'Croatia' },
                    { value: 'denmark', text: 'Denmark' },
                    { value: 'egypt', text: 'Egypt' },
                    { value: 'finland', text: 'Finland' },
                    { value: 'france', text: 'France' },
                    { value: 'germany', text: 'Germany' },
                    { value: 'greece', text: 'Greece' },
                    { value: 'hong-kong', text: 'Hong Kong' },
                    { value: 'hungary', text: 'Hungary' },
                    { value: 'iceland', text: 'Iceland' },
                    { value: 'india', text: 'India' },
                    { value: 'indonesia', text: 'Indonesia' },
                    { value: 'iran', text: 'Iran' },
                    { value: 'iraq', text: 'Iraq' },
                    { value: 'ireland', text: 'Ireland' },
                    { value: 'israel', text: 'Israel' },
                    { value: 'italy', text: 'Italy' },
                    { value: 'japan', text: 'Japan' },
                    { value: 'jordan', text: 'Jordan' },
                    { value: 'kazakhstan', text: 'Kazakhstan' },
                    { value: 'kenya', text: 'Kenya' },
                    { value: 'kuwait', text: 'Kuwait' },
                    { value: 'lebanon', text: 'Lebanon' },
                    { value: 'malaysia', text: 'Malaysia' },
                    { value: 'mexico', text: 'Mexico' },
                    { value: 'morocco', text: 'Morocco' },
                    { value: 'netherlands', text: 'Netherlands' },
                    { value: 'new-zealand', text: 'New Zealand' },
                    { value: 'nigeria', text: 'Nigeria' },
                    { value: 'north-korea', text: 'North Korea' },
                    { value: 'norway', text: 'Norway' },
                    { value: 'pakistan', text: 'Pakistan' },
                    { value: 'palestine', text: 'Palestine' },
                    { value: 'philippines', text: 'Philippines' },
                    { value: 'poland', text: 'Poland' },
                    { value: 'portugal', text: 'Portugal' },
                    { value: 'qatar', text: 'Qatar' },
                    { value: 'romania', text: 'Romania' },
                    { value: 'russia', text: 'Russia' },
                    { value: 'saudi-arabia', text: 'Saudi Arabia' },
                    { value: 'serbia', text: 'Serbia' },
                    { value: 'singapore', text: 'Singapore' },
                    { value: 'south-africa', text: 'South Africa' },
                    { value: 'south-korea', text: 'South Korea' },
                    { value: 'spain', text: 'Spain' },
                    { value: 'sri-lanka', text: 'Sri Lanka' },
                    { value: 'sudan', text: 'Sudan' },
                    { value: 'sweden', text: 'Sweden' },
                    { value: 'switzerland', text: 'Switzerland' },
                    { value: 'syria', text: 'Syria' },
                    { value: 'thailand', text: 'Thailand' },
                    { value: 'turkey', text: 'Turkey' },
                    { value: 'ukraine', text: 'Ukraine' },
                    { value: 'united-arab-emirates', text: 'United Arab Emirates' },
                    { value: 'united-kingdom', text: 'United Kingdom' },
                    { value: 'united-states', text: 'United States' },
                    { value: 'vietnam', text: 'Vietnam' },
                    { value: 'yemen', text: 'Yemen' },
                    { value: 'zimbabwe', text: 'Zimbabwe' }
                ];

                const countrySelect = document.getElementById('country');

                countryOptions.forEach(optionData => {
                    const option = document.createElement('option');
                    option.value = optionData.value;
                    option.textContent = optionData.text;
                    if (optionData.disabled) option.disabled = true;
                    if (optionData.selected) option.selected = true;
                    countrySelect.appendChild(option);
                });

            </script>

            <div class="mb-3">
                <label for="about" class="form-label"><i class="fas fa-info-circle"></i> About</label>
                <textarea id="about" name="about" class="form-control" placeholder="About yourself" rows="3"></textarea>
            </div>

            <label for="about" class="form-label"><i class="fas fa-user-circle"></i>Upload your profile photo</label>
            <div class="input-group mb-3">
                <input type="file" class="form-control" name="profile_pic" id="inputGroupFile02" required>
                <label class="input-group-text" for="inputGroupFile02">Upload</label>
            </div>

            <div class="mb-3">
                <label for="clg_uni" class="form-label"><i class="fas fa-university"></i> College / University</label>
                <input type="text" class="form-control" id="clg_uni" name="clg_uni"
                    placeholder="Your college / University name?">
            </div>

            <div class="mb-3">
                <label for="clg_uni" class="form-label"><i class="fas fa-school"></i>Schooling</label>
                <input type="text" class="form-control" id="school" name="school" placeholder="Schooling from?">
            </div>

            <div class="mb-3">
                <label for="status" class="form-label">
                    <i class="fas fa-user-tag"></i> Status
                </label>
                <select id="status" name="status" class="form-select" required></select>
            </div>

            <script>
                const statusOptions = [
                    { value: '', text: 'Select your status', disabled: true, selected: true },
                    { value: 'student', text: 'Student' },
                    { value: 'employ', text: 'Employed' },
                    { value: 'housewife', text: 'Housewife' },
                    { value: 'freelancer', text: 'Freelancer' },
                    { value: 'business-owner', text: 'Business Owner' },
                    { value: 'unemployed', text: 'Unemployed' },
                    { value: 'retired', text: 'Retired' },
                    { value: 'content-creator', text: 'Content Creator' },
                    { value: 'investor', text: 'Investor' },
                    { value: 'robot', text: 'Robot' },
                    { value: 'developer', text: 'Developer' },
                    { value: 'dead-inside', text: 'Prefer not to Answer' }
                ];


                const statusSelect = document.getElementById('status');

                statusOptions.forEach(optionData => {
                    const option = document.createElement('option');
                    option.value = optionData.value;
                    option.textContent = optionData.text;
                    if (optionData.disabled) option.disabled = true;
                    if (optionData.selected) option.selected = true;

                    statusSelect.appendChild(option);

                })



            </script>

            <div class="mb-3">
                <label for="lookingFor" class="form-label"><i class="fas fa-search"></i> Looking For</label>
                <select id="lookingFor" name="lookingFor" class="form-select" required></select>
            </div>

            <script>
                const lookingForOptions = [
                    { value: '', text: 'Looking for?', disabled: true, selected: true },
                    { value: 'friends', text: 'Friends' },
                    { value: 'teacher', text: 'Teacher' },
                    { value: 'husband', text: 'Husband' },
                    { value: 'wife', text: 'Wife' },
                    { value: 'girlfriend', text: 'Girlfriend' },
                    { value: 'boyfriend', text: 'Boyfriend' },
                    { value: 'relationship', text: 'Relationship' },
                    { value: 'business-partner', text: 'Business Partner' },
                    { value: 'gaming-partner', text: 'Gaming Partner' },
                    { value: 'collaborator', text: 'Collaborator' },
                    { value: 'nothing', text: 'Prefer not to Answer' }
                ];

                const lookingForSelect = document.getElementById('lookingFor');

                lookingForOptions.forEach(optionData => {
                    const option = document.createElement('option');
                    option.value = optionData.value;
                    option.textContent = optionData.text;
                    if (optionData.disabled) option.disabled = true;
                    if (optionData.selected) option.selected = true;

                    lookingForSelect.appendChild(option);
                })

            </script>

            <div class="mb-3">
                <label for="interestIn" class="form-label"><i class="fas fa-heart"></i> Interest In</label>
                <select id="interestIn" name="interestIn" class="form-select" required></select>
            </div>

            <script>
                const interestOptions = [
                    { value: '', text: 'Select your Interest', disabled: true, selected: true },
                    { value: 'woman', text: 'Woman' },
                    { value: 'man', text: 'Man' },
                    { value: 'gay', text: 'Gay' },
                    { value: 'lesbian', text: 'Lesbian' },
                    { value: 'bisexual', text: 'Bisexual' },
                    { value: 'asexual', text: 'Asexual' },
                    { value: 'pansexual', text: 'Pansexual' },
                    { value: 'transgender', text: 'Transgender' },
                    { value: 'nobody', text: 'Prefer not to Answer' }
                ];

                const interestSelect = document.getElementById('interestIn');

                interestOptions.forEach(optionData => {
                    const option = document.createElement('option');
                    option.value = optionData.value;
                    option.textContent = optionData.text;
                    if (optionData.disabled) option.disabled = true;
                    if (optionData.selected) option.selected = true;

                    interestSelect.appendChild(option);
                })

            </script>

            <button type="submit" name="submit" class="btn btn-dark w-100">Create Account</button>
        </form>
    </div>
    <!-- form-end -->
    <p style="font-size:15px; text-align:center;" class="py-4">Already have an account! Go to <a
            href="login.php">LogIn</a>
    </p>

    <?php include "../include/footer.php"; ?>
    <?php include "../include/bootstrapjs.php"; ?>

</body>

</html>