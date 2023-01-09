<?php

session_start();
$Requested_by_name = "New Project Upload";
$Requested_from_email = "prashantmanwan@gmail.com";
$Requested_for_subject = "Language";
$message = "A new Project has been uploaded today!";
$theme = "6";

//echo $theme;

if ($theme == "1") {
    $posttheme = "https://1.bp.blogspot.com/-VCBYd3LeufY/XUA7Yk5qObI/AAAAAAAAC2U/6otAAc0ZBlgropjLAY-meknWOPhmARjlQCLcBGAs/s1600/IMG_6402.JPG";
} else if ($theme == "2") {
    $posttheme = "http://www.idearch.in/wp-content/uploads/2017/10/4.jpg";
} else if ($theme == "3") {
    $posttheme = "http://www.idearch.in/wp-content/uploads/2017/10/1.jpg";
} else if ($theme == "4") {
    $posttheme = "http://www.idearch.in/wp-content/uploads/2017/10/2.jpg";
} else if ($theme == "5") {
    $posttheme = "http://www.idearch.in/wp-content/uploads/2017/05/15871792_10154774370651590_8576998921160064809_n.jpg";
} else if ($theme == "6") {
    $posttheme = "https://thoughtcatalog.com/wp-content/uploads/2014/09/8393370_edfe46f368_b.jpg";
}
//echo "<br>". $posttheme;


include('smtp/PHPMailerAutoload.php');
include('important_conn_congif.php');

$mail = new PHPMailer;

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
$mail->Port = $smtp_port;   //587                // TCP port to connect to 
//$mail->SMTPDebug = 1;

// Sender info 
$mail->setFrom($email_add, 'Enally');
$mail->addReplyTo($email_add, 'Enally');
// $mail->SetFrom('donotreply@mydomain.com', 'Admin');

// Add a recipient 
$mail->addAddress($Requested_from_email);

// CC or BBC handler
//$mail->addCC('cc@example.com'); 
//$mail->addBCC('bcc@example.com'); 

// Set email format to HTML 
$mail->isHTML(true);

// Email Priority
$mail->Priority = 'High';

// Mail subject 
$mail->Subject = $Requested_by_name;

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
        margin: 0;">New Project Submission !</h1>
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
            <h2>
                <strong>' . $Requested_by_name . '</strong> has been uploaded today.
            </h2>
            <p>
              <b>Automated Message</b> <br>
              ' . $message . '<br><br>
              <center>
           <a style=" padding: 10px;
                     background-color: #fff5be; color: #424242;  box-shadow: 0 0 35px rgba(10, 10, 10,0.12);
    -moz-box-shadow: 0 0 35px rgba(10, 10, 10,0.12);
    -webkit-box-shadow: 0 0 35px rgba(10, 10, 10,0.12); border-bottom: 2px #88D4C1 solid; text-decoration: none;" href="https://enally.in/files-manager/upload/">Send Notes </a><br><br></center>
              <hr>
          <b>Automated Message for Verification</b> <br>
                A new project has been uploaded please check verify it. 
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
    echo '<div class="alert alert-success alert-dismissible fade show" role="alert">
    <strong>Email Confirmation!</strong> Email has been sent to the Admin!
    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
      <span aria-hidden="true">&times;</span>
    </button>
  </div>';


    function download_file()
    {
        $original_name = "Unit 1 Proposition - Proof Strategy 7.pdf";
        //$random_name = uniqid();
        $new_name = "your_file_enally.pdf";

        rename($original_name, $new_name);

        $file_url = $new_name;
        header('Content-Type: application/octet-stream');
        header("Content-Transfer-Encoding: utf-8");
        header("Content-disposition: attachment; filename=\"" . basename($file_url) . "\"");
        readfile($file_url);

        sleep(5);
        rename($new_name, $original_name);
    }

}
