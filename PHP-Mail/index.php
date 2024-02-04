<?php
//Send mail using php
$to = "ar12agnik@gmail.com";
$subject = "This massage is sent by PHP";
$message = "Hi my name is Ayanabha Chatterjee and I like to code in PHP.";
$header = "From: andrewdanet66@gmail.com";


if (mail($to, $subject, $message, $header)) {
     echo '<h3 style="color:green; text-align:center; font-family: arial;">Email successfully sent to ' . $to . '</h3>';
} else {
     echo '<h3 style="color:red; text-align:center; font-family: arial;">Opps! somthing went wrong : (</h3>';

}

?>