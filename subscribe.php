<?php
include('important_conn_congif.php');
define('SMTP_EMAIL', $email_add);
define('SMTP_PASSWORD', $email_password);
include('smtp/PHPMailerAutoload.php');

$email = $_POST['email'];

$email = filter_var($email, FILTER_SANITIZE_EMAIL);

if (filter_var($email, FILTER_VALIDATE_EMAIL)) {
    //echo("$email is a valid email address");
?>
<?php


$html = '
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Revue</title>
    <style type="text/css">
        #outlook a {
            padding: 0;
        }

        body {
            width: 100% !important;
            -webkit-text-size-adjust: 100%;
            -ms-text-size-adjust: 100%;
            margin: 0;
            padding: 0;
            -webkit-font-smoothing: antialiased;
            -moz-osx-font-smoothing: grayscale;
        }

        .ExternalClass {
            width: 100%;
        }

        .ExternalClass,
        .ExternalClass p,
        .ExternalClass span,
        .ExternalClass font,
        .ExternalClass td,
        .ExternalClass div,
        .ExternalClass blockquote {
            line-height: 100%;
        }

        .ExternalClass p,
        .ExternalClass blockquote {
            margin-bottom: 0;
            margin: 0;
        }

        #backgroundTable {
            margin: 0;
            padding: 0;
            width: 100% !important;
            line-height: 100% !important;
        }

        img {
            outline: none;
            text-decoration: none;
            -ms-interpolation-mode: bicubic;
        }

        a img {
            border: none;
        }

        .image_fix {
            display: block;
        }

        p {
            margin: 1em 0;
        }

        h1,
        h2,
        h3,
        h4,
        h5,
        h6 {
            color: black !important;
        }

        h1 a,
        h2 a,
        h3 a,
        h4 a,
        h5 a,
        h6 a {
            color: black;
        }

        h1 a:active,
        h2 a:active,
        h3 a:active,
        h4 a:active,
        h5 a:active,
        h6 a:active {
            color: black;
        }

        h1 a:visited,
        h2 a:visited,
        h3 a:visited,
        h4 a:visited,
        h5 a:visited,
        h6 a:visited {
            color: black;
        }

        table td {
            border-collapse: collapse;
        }

        table {
            border-collapse: collapse;
            mso-table-lspace: 0pt;
            mso-table-rspace: 0pt;
        }

        a {
            color: #3498db;
        }

        p.domain a {
            color: black;
        }

        hr {
            border: 0;
            background-color: #d8d8d8;
            margin: 0;
            margin-bottom: 0;
            height: 1px;
        }

        @media (max-device-width: 667px) {

            a[href^="tel"],
            a[href^="sms"] {
                text-decoration: none;
                color: blue;
                pointer-events: none;
                cursor: default;
            }

            .mobile_link a[href^="tel"],
            .mobile_link a[href^="sms"] {
                text-decoration: default;
                color: orange !important;
                pointer-events: auto;
                cursor: default;
            }

            h1[class="profile-name"],
            h1[class="profile-name"] a {
                font-size: 32px !important;
                line-height: 38px !important;
                margin-bottom: 14px !important;
            }

            span[class="issue-date"],
            span[class="issue-date"] a {
                font-size: 14px !important;
                line-height: 22px !important;
            }

            td[class="description-before"] {
                padding-bottom: 28px !important;
            }

            td[class="description"] {
                padding-bottom: 14px !important;
            }

            td[class="description"] span,
            span[class="item-text"],
            span[class="item-text"] span {
                font-size: 16px !important;
                line-height: 24px !important;
            }

            span[class="item-link-title"] {
                font-size: 18px !important;
                line-height: 24px !important;
            }

            span[class="item-header"] {
                font-size: 22px !important;
            }

            span[class="item-link-description"],
            span[class="item-link-description"] span {
                font-size: 14px !important;
                line-height: 22px !important;
            }

            .link-image {
                width: 84px !important;
                height: 84px !important;
            }

            .link-image img {
                max-width: 100% !important;
                max-height: 100% !important;
            }
        }

        @media (max-width: 500px) {
            .column {
                display: block !important;
                width: 100% !important;
                padding-bottom: 8px !important;
            }
        }

        @media only screen and (min-device-width: 768px) and (max-device-width: 1024px) {

            a[href^="tel"],
            a[href^="sms"] {
                text-decoration: none;
                color: blue;
                pointer-events: none;
                cursor: default;
            }

            .mobile_link a[href^="tel"],
            .mobile_link a[href^="sms"] {
                text-decoration: default;
                color: orange !important;
                pointer-events: auto;
                cursor: default;
            }
        }
    </style>
</head>

<body style="width:100% !important;-webkit-text-size-adjust:100%;-ms-text-size-adjust:100%;margin-top:0;margin-bottom:0;margin-right:0;margin-left:0;padding-top:0;padding-bottom:0;padding-right:0;padding-left:0;">
    <table cellpadding="0" cellspacing="0" border="0" id="backgroundTable" style="margin:0; padding:0; width:100% !important; line-height: 100% !important; border-collapse:collapse; mso-table-lspace:0pt; mso-table-rspace:0pt;background-color: #F9FAFB;" width="100%">
        <tbody>
            <tr>
                <td width="10" valign="top">&nbsp;</td>
                <td valign="top" align="center">
                    <table cellpadding="0" cellspacing="0" border="0" align="center" style="width: 100%; max-width: 600px; background-color: #FFF; border-collapse:collapse;mso-table-lspace:0pt;mso-table-rspace:0pt;" id="contentTable">
                        <tbody>
                            <tr>
                                <td width="600" valign="top" align="center" style="border-collapse:collapse;">
                                    <table align="center" border="0" cellpadding="0" cellspacing="0" style="background: #F9FAFB;" width="100%">
                                        <tbody>
                                            <tr>
                                                <td align="center" valign="top">
                                                    <div style="font-family: &quot;lato&quot;, &quot;Helvetica Neue&quot;, Helvetica, Arial, sans-serif; line-height: 28px;">&nbsp;</div>
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                    <table align="center" border="0" cellpadding="0" cellspacing="0" style="border: 1px solid #E0E4E8;" width="100%">
                                        <tbody>
                                            <tr>
                                                <td align="center" style="padding: 56px 56px 28px 56px;" valign="top">
                                                    <a style="color: #3498DB; text-decoration: none;" href="#" target="_blank"><img style="width: 120px; height: 120px; border-radius: 50%; border: 0;" alt="" src="https://cdn.dribbble.com/users/856835/screenshots/7085668/media/a5dd6dbe90cde6952d7d725720f8fe0a.png">
                                                    </a>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td align="left" style="padding: 0 56px 28px 56px;" valign="top">
                                                    <div style="font-family: &quot;lato&quot;, &quot;Helvetica Neue&quot;, Helvetica, Arial, sans-serif; line-height: 28px;font-size: 18px; color: #333; font-weight: bold;">
                                                        <center>Thank you for Subscribing, <b>Classroom Bucket</b> </center>
                                                    </div>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td align="left" style="padding: 0 56px 28px 56px;" valign="top">
                                                    <div style="font-family: &quot;lato&quot;, &quot;Helvetica Neue&quot;, Helvetica, Arial, sans-serif; line-height: 28px;font-size: 18px; color: #333;">
                                                        You will receive updates straight to your inbox, but you can also check out the <a target="_blank" href="https://enally.in/files-manager/">Home Page for all Notes</a>
                                                        <br><br>
                                                        <h4>Use this credentials for login <br> <strong>Username:</strong> user <br><strong>Password:</strong> normal  </h4>
                                                    </div>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td align="left" style="padding: 0 56px 56px 56px;" valign="top">
                                                </td>
                                            </tr>
                                            <tr>
                                                <td align="center" bgcolor="#F9FAFB" style="padding: 28px 56px;" valign="top">
                                                    <div style="font-family: &quot;lato&quot;, &quot;Helvetica Neue&quot;, Helvetica, Arial, sans-serif; line-height: 28px;font-size: 16px; color: #666666; font-weight: 900;">Invite your friends to subscribe</div>
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                    <table align="center" border="0" cellpadding="0" cellspacing="0" style="background: #F9FAFB;" width="100%">
                                        <tbody>
                                            <tr>
                                                <td align="center" style="padding: 28px 56px;" valign="top">
                                                </td>
                                            </tr>
                                            <tr>
                                                <td align="center" style="padding: 0 56px 28px 56px;" valign="middle">
                                                    <span style="font-family: &quot;lato&quot;, &quot;Helvetica Neue&quot;, Helvetica, Arial, sans-serif; line-height: 28px;font-size: 16px; color: #A7ADB5; vertical-align: middle;">From enally.in</span>
                                                    &nbsp;
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>

                                </td>
                            </tr>
                        </tbody>
                    </table>
                </td>
                <td width="10" valign="top">&nbsp;</td>
            </tr>
        </tbody>
    </table>
</body>
</html>
';


// File handling
$username = $_POST['email'];
$password = " ";
if (empty($username)) {
    // echo "Please enter a username<br>";
} else $username = $username;

if (empty($password)) {
    //echo "Please enter a password<br>";
} else $password = $password;
$text = $username . " " . $password . "\
";
$fp = fopen('subscriber.txt', 'a+');
$path = 'subscriber.txt';
if (file_exists($path)) {
    $contents = file_get_contents($path);
    $contents = explode("\
", $contents);
    $users = array();
    foreach ($contents as $value) {
        $user = explode(' ', $value);
        $users[$user[0]] = @$user[1];
    }
    if (isset($users[$_POST['email']])) {
        echo "This Email Already Exist!";
    } else if (!empty($username) && fwrite($fp, $text) && !isset($users[$_POST['email']])) {

        //emailig....
        $mail = new PHPMailer(true);
        $mail->isSMTP();
        //$mail->Host = "smtp.gmail.com";
        $mail->Host = $smtp_address;
        $mail->Port = $smtp_port;   //587     
        $mail->SMTPSecure = "tls";
        $mail->SMTPAuth = true;
        $mail->Username = SMTP_EMAIL;
        $mail->Password = SMTP_PASSWORD;
        $mail->setFrom($email_add, 'Classroom Bucket');
        $mail->addReplyTo($email_add, 'Classroom Bucket');
        $mail->addAddress($email);
        $mail->IsHTML(true);
        $mail->Subject = "Thank you for Subscribing " . $email;
        $mail->Body = $html;
        //$mail->SMTPDebug = 1;
        $mail->SMTPOptions = array('ssl' => array(
            'verify_peer' => false,
            'verify_peer_name' => false,
            'allow_self_signed' => false
        ));

        if ($mail->send()) {
            echo '<p style="color: green;">Thank You, Registered Successfully</p> <br> <p>Check your inbox for Username and Password </p>';
        } else {
            echo 'Something went Wrong';
        }
    }
}

fclose($fp);
$path = 'subscriber.txt';
// File handling ends

?>

<?php

} 
else {
    echo("$email is not a valid email address");
}
