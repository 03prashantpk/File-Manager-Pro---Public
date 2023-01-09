<?php
$Requested_by_name = $_POST["Requested_by_name"];
$Requested_from_email = $_POST["Requested_from_email"];
$Requested_for_subject = $_POST["Requested_for_subject"];
$message = $_POST["message"];
$theme = $_POST["theme"];

//echo $theme;

if ($theme == "1") {
    $posttheme = "https://1.bp.blogspot.com/-VCBYd3LeufY/XUA7Yk5qObI/AAAAAAAAC2U/6otAAc0ZBlgropjLAY-meknWOPhmARjlQCLcBGAs/s1600/IMG_6402.JPG";
} else if ($theme == "2") {
    $posttheme = "https://images.wallpapersden.com/image/download/grand-hotel-misurina-misurina-lake_bWVrbWuUmZqaraWkpJRmbmdlrWZlbWU.jpg";
} else if ($theme == "3") {
    $posttheme = "https://images.wallpapersden.com/image/download/orange-evening-hd-minimalist_bWZoaWeUmZqaraWkpJRrZm1nrWdsbGk.jpg";
} else if ($theme == "4") {
    $posttheme = "https://images.wallpapersden.com/image/download/4k-fantasy-pyramid_bWVtbmWUmZqaraWkpJRobWllrWdma2U.jpg";
} else if ($theme == "5") {
    $posttheme = "https://images.wallpapersden.com/image/download/alien-minimalism_amxqbmiUmZqaraWkpJRmbmdlrWZlbWU.jpg";
} else if ($theme == "6") {
    $posttheme = "https://png.pngtree.com/thumb_back/fw800/back_pic/02/64/75/575785daf29ad0d.jpg";
}
//echo "<br>". $posttheme;



include('smtp/PHPMailerAutoload.php');
include('important_conn_congif.php');

$mail = new PHPMailer;

// Username and Password !
// define('SMTP_EMAIL', 'admin@enally.in'); 
// define('SMTP_PASSWORD', 'enally@admin$$12');

define('SMTP_EMAIL', $email_add);
define('SMTP_PASSWORD', $email_password);


// $mail->IsMail();
// $mail->IsSendmail();

$mail->isSMTP();
// $mail->Host = 'smtpout.secureserver.net';       // Set mailer to use SMTP 
// $mail->Host = 'smtp.gmail.com';      
$mail->Host = $smtp_address;                   // Specify main and backup SMTP servers 
$mail->SMTPAuth = true;                         // Enable SMTP authentication 
$mail->Username = SMTP_EMAIL;                   // SMTP username 
$mail->Password = SMTP_PASSWORD;                // SMTP password 
$mail->SMTPSecure = 'tls';                      // Enable TLS encryption, `ssl` also accepted 
$mail->Port = $smtp_port;   //587                           // TCP port to connect to 
//$mail->SMTPDebug = 1;

// Sender info 
$mail->setFrom($email_add, 'File Manager - Enally');
$mail->addReplyTo($email_add, 'File Manager - Enally');
// $mail->SetFrom('donotreply@mydomain.com', 'Admin');

// Add a recipient 
$mail->addAddress($admin_add,$email_add);

// CC or BBC handler
//$mail->addCC('cc@example.com'); 
//$mail->addBCC('bcc@example.com'); 

// Set email format to HTML 
$mail->isHTML(true);

// Email Priority
$mail->Priority = 'High';

// Mail subject 
$mail->Subject =  $Requested_for_subject . ' File - Manager';

//$bodyContent = 'Hello';

// Mail body content 
$bodyContent = '
<html lang="en">
<head>
	<link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
  
  <style>
html,body {
    padding: 8px 80px;
    background-color: #F7F7FF;
}
.thankyou-page ._header {
    background: #fee028; 
    padding: 90px 30px;
    text-align: center;
    background: #fee028 url(' . @$posttheme . ') center/cover no-repeat;
}
.thankyou-page ._header .logo {
    max-width: 200px;
    margin: 0 auto 10px;
}
.thankyou-page ._header .logo img {
    width: 80%;
    box-shadow: 0 0 55px rgba(9, 9, 10,0.12);
    -moz-box-shadow: 0 0 55px rgba(9, 9, 10,0.12);
    -webkit-box-shadow: 0 0 35px rgba(9, 9, 10,0.12);
}
.thankyou-page ._header h1 {
    font-size: 75px;
    font-weight: 800;
    color: white;
    margin: 0;
}
.thankyou-page ._body {
    margin: -70px 0 30px;
}
.thankyou-page ._body ._box {
    margin: auto;
    max-width: 80%;
    padding: 50px;
    background: white;
    border-radius: 3px;
    box-shadow: 0 0 35px rgba(10, 10, 10,0.12);
    -moz-box-shadow: 0 0 35px rgba(10, 10, 10,0.12);
    -webkit-box-shadow: 0 0 35px rgba(10, 10, 10,0.12);
  border-bottom: 60px #88D4C1 solid;
}
.thankyou-page ._body ._box h2 {
    font-size: 32px;
    font-weight: 600;
    color: #4ab74a;
}
.thankyou-page ._footer {
    text-align: center;
    padding: 50px 30px;
}

.thankyou-page ._footer .btn {
    background: #4ab74a;
    color: white;
    border: 0;
    font-size: 14px;
    font-weight: 600;
    border-radius: 0;
    letter-spacing: 0.8px;
    padding: 20px 33px;
    text-transform: uppercase;
}
    </style>
  </head>

  <body style="padding: 4% 6%;
  background-color: #F7F7FF;">
  <div style="padding: 90px; style="border: 1px solid #ccc;  border-radius: 8px;
  box-shadow: 0 0 35px rgba(10, 10, 10,0.12);
  -moz-box-shadow: 0 0 35px rgba(10, 10, 10,0.12);
  -webkit-box-shadow: 0 0 35px rgba(10, 10, 10,0.12);">
<div class="thankyou-page">
    <div class="_header" style="background: #fee028; 
    padding: 90px 60px;
    border-radius: 12px;
    text-align: center;
    background: #fee028 url(' . @$posttheme . ') center/cover no-repeat;">
        <div class="logo">
            <img style="width: 60%;
            box-shadow: 0 0 55px rgba(1, 9, 10,0.72);
            -moz-box-shadow: 0 0 55px rgba(1, 9, 10,0.72);
            -webkit-box-shadow: 0 0 35px rgba(1, 9, 10,0.72);" src="https://www.enally.in/images/loaderrr.png" alt="">
        </div>
        <h1 style=" font-size: 75px;
        font-weight: 800;
        color: white;
        margin: 0;">New Message !</h1>
    </div>
    <div class="_body" style="margin: -70px 0 30px;">
        <div class="_box" 
        style=" margin: auto;
        max-width: 80%;
        padding: 50px;
        background: white;
        border-radius: 3px;
        box-shadow: 0 0 35px rgba(10, 10, 10,0.12);
        -moz-box-shadow: 0 0 35px rgba(10, 10, 10,0.12);
        -webkit-box-shadow: 0 0 35px rgba(10, 10, 10,0.12);
      border-bottom: 60px #88D4C1 solid;">
            <h3>
                <strong>' . $Requested_by_name . '</strong> Wants to connect with you for ' . $Requested_for_subject . '
            </h3>
            <p>
              <b>'. $Requested_by_name . ' Info: </b>  <br> Email: ' . $Requested_from_email . ' <br> Message: <br>
              ' . $message . '<br><br>
              <center>
           <a style=" padding: 10px;
                     background-color: #fff5be; color: #424242;  box-shadow: 0 0 35px rgba(10, 10, 10,0.12);
    -moz-box-shadow: 0 0 35px rgba(10, 10, 10,0.12);
    -webkit-box-shadow: 0 0 35px rgba(10, 10, 10,0.12); border-bottom: 2px #88D4C1 solid; text-decoration: none;" href="mailto:'.$Requested_from_email.'">Compose New Email </a><br><br><p></p></center>
              <hr>
          <b>Special Thanks</b> <br>
                It will be a huge help if you help someone study. If you have the requested notes. Please Share it by clicking SEND NOTES button. 
            </p>
        </div>
    </div>
    <div class="_footer">
        <p>Developed by <a href="https://github.com/03prashantpk">Prashant Kumar</a> </p>

        <p style="font-size: 12px; color: #A0A0A0;"> Please do not reply to this message via e-mail. This address is automated, unattended, and cannot help with questions or requests. </p>
    </div>
</div>
</div>
</body>
</html>
';
$mail->Body    = $bodyContent;

// Send email 
if (!$mail->send()) {
    echo 'Message could not be sent. Mailer Error: ' . $mail->ErrorInfo;
} else {
    echo "<p style='color: green;'>Message has been sent!</p>";
}
