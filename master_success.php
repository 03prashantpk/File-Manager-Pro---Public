<?php
$status = $_POST["status"];
$firstname = $_POST["firstname"];
$amount = $_POST["amount"];
$txnid = $_POST["txnid"];
$posted_hash = $_POST["hash"];
$key = $_POST["key"];
$productinfo = $_POST["productinfo"];
$email = $_POST["email"];
$salt = "ZPRKInjyyv";
if (isset($_POST["additionalCharges"])) {
    $additionalCharges = $_POST["additionalCharges"];
    $retHashSeq = $additionalCharges . '|' . $salt . '|' . $status . '|||||||||||' . $email . '|' . $firstname . '|' . $productinfo . '|' . $amount . '|' . $txnid . '|' . $key;
} else {
    $retHashSeq = $salt . '|' . $status . '|||||||||||' . $email . '|' . $firstname . '|' . $productinfo . '|' . $amount . '|' . $txnid . '|' . $key;
}
$hash = hash("sha512", $retHashSeq);
if ($hash != $posted_hash) {
    //echo "Invalid Transaction. Please try again";
    $error2 = "Invalid Transaction. Please try again";
} else {

    // File handling

    $_POST['email'] = $productinfo;
    $username = $productinfo;
    $password = " ";
    if (empty($username)) {
        // echo "Please enter a username<br>";
    } else $username = $username;

    if (empty($password)) {
        //echo "Please enter a password<br>";
    } else $password = $password;
    $text = $username . " " . $password . "\
";
    $fp = fopen('registered_for_bot.txt', 'a+');
    $path = 'registered_for_bot.txt';
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
            //echo "<br>Username already exist!";
        } else if (!empty($username) && fwrite($fp, $text) && !isset($users[$_POST['email']])) {
        }
    }

    fclose($fp);
    $path = 'registered_for_bot.txt';
    // File handling ends

    $_POST['email'] = $email;
    $username = $email;
    $password = " ";
    if (empty($username)) {
        // echo "Please enter a username<br>";
    } else $username = $username;

    if (empty($password)) {
        //echo "Please enter a password<br>";
    } else $password = $password;
    $text = $username . " " . $password . "\
";
    $fp = fopen('registered_for_bot_email.txt', 'a+');
    $path = 'registered_for_bot_email.txt';
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
            //echo "<br>Username already exist!";
        } else if (!empty($username) && fwrite($fp, $text) && !isset($users[$_POST['email']])) {
        }
    }

    fclose($fp);
    $path = 'registered_for_bot_email.txt';
    // File handling ends

    //echo "<br>" . $productinfo . "";
}

?>
<html>

<head>
    <link href="https://fonts.googleapis.com/css?family=Nunito+Sans:400,400i,700,900&display=swap" rel="stylesheet">
</head>
<style>
    body {
        text-align: center;
        padding: 40px 0;
        background: #EBF0F5;
    }

    h1 {
        color: #88B04B;
        font-family: "Nunito Sans", "Helvetica Neue", sans-serif;
        font-weight: 900;
        font-size: 40px;
        margin-bottom: 10px;
    }

    p {
        color: #404F5E;
        font-family: "Nunito Sans", "Helvetica Neue", sans-serif;
        font-size: 20px;
        margin: 0;
    }

    i {
        color: #9ABC66;
        font-size: 100px;
        line-height: 200px;
        margin-left: -15px;
    }

    .card {
        background: white;
        padding: 60px;
        border-radius: 4px;
        box-shadow: 0 2px 3px #C8D0D8;
        display: inline-block;
        margin: 0 auto;
    }
</style>

<body>
    <div class="card">
        <div style="border-radius:200px; height:200px; width:200px; background: #F8FAF5; margin:0 auto;">
            <i class="checkmark">✓</i>
        </div>
        <h1>Success</h1>
        <p>We've received your payment request;<br /> Please restart the bot You will be able to run!</p>
        <br>
        <p>Username: <span style="color: red;"><?php echo $productinfo?></span></p> 
        <p>TID: <span style="color: red;"><?php echo $txnid?></span></p><br>
        <p>Name: <span style="color: red;"><?php echo $firstname?></span></p><br>
        <p>Email: <span style="color: red;"><?php echo $email?></span></p><br>
        <p>Please Copy the TID or Take Screenshot</p> <br>
        <p> <a href="https://enally.in/files-manager/"><span style="color: green;">Home</span></a></p> <br>
        <p><?php echo @$error2 ?></p>
    </div>
</body>

</html>