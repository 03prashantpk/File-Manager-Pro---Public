<?php
error_reporting(0);
session_start(); /* Starts the session */

include("../files_counter.php");
include("master_payment.php");

$price = 128;

// function removed
if (isset($_POST['delete'])) {
    $filename = $_POST['filenamedelete'];
    unlink($filename);
    header('Location: ./');
}

// Total page Visit
$Page_visit_counter_file = "../PV_counter.txt";
$total_page_visit = @file_get_contents($Page_visit_counter_file,);
$total_page_visit++;
file_put_contents($Page_visit_counter_file, $total_page_visit);

// total file counts
$filecounts =  "Images (" . $count_total_images . ") | Presentation (" . $count_total_ppt . ") | Documents (" . $count_total_docs . ") | Videos (" . $count_total_videos . ") | Pdf (" . $count_total_pdf . ") | Musics (" . $count_total_musics . ")" . "| Archives (" . $count_total_archive . ")";

$page_code2 = "contact" || "subscribe";

$file = "subscriber.txt";
$no_of_lines = count(file($file));
$total_subscriber = $no_of_lines;

?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>Classroom Bucket - MyClass Bot</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.0/dist/js/bootstrap.bundle.min.js"></script>
    <link href="https://cdn.lineicons.com/3.0/lineicons.css" rel="stylesheet">
    <script src="https://code.iconify.design/2/2.0.4/iconify.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link href="https://cdn.lineicons.com/3.0/lineicons.css" rel="stylesheet">
    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" />
    <link href="https://cdn.jsdelivr.net/npm/boxicons@2.0.7/css/boxicons.min.css" rel="stylesheet" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.0/dist/js/bootstrap.bundle.min.js"></script>
    <link href="assets/main.css" rel="stylesheet">
    <link rel="icon" href="assets/Fevicon.png" type="image/x-icon">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://unpkg.com/boxicons@2.0.9/dist/boxicons.js"></script>

    <!-- Meta tags ----->
    <meta charset='UTF-8'>
    <meta name="author" content="" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name='keywords' content='K20BN, Notes, File-manager, enally.in, enally, Prashant Kumar Enally, Prashant enally,Classroom Bucket,Everything in one Bucket '>
    <meta name="description" content="MyClass Bot - Leave everything on bot and do what you love!" />
    <meta name="author" content="Prashant Kumar">
    <meta name="copyright" content="Enally.in">
    <meta property="og:image" content="https://enally.in/files-manager/assets/myclasbot.webp">
    <meta property="og:image" content="https://enally.in/files-manager/assets/myclasbot.webp">
    <meta name="twitter:image" content="https://enally.in/files-manager/assets/myclasbot.webp">

    <!---- Google Analytics Tag ----------------->
    <!-- Global site tag (gtag.js) - Google Analytics -->
    <script async src="https://www.googletagmanager.com/gtag/js?id=G-VHNKBKKBSD"></script>
    <script>
        window.dataLayer = window.dataLayer || [];

        function gtag() {
            dataLayer.push(arguments);
        }
        gtag('js', new Date());

        gtag('config', 'G-VHNKBKKBSD');
    </script>

    <!--- Google Adsense ----------->
    <script async src="https://pagead2.googlesyndication.com/pagead/js/adsbygoogle.js?client=ca-pub-4554043228187575" crossorigin="anonymous"></script>


    <style>
        .message {
            padding: 10px 10px;
            font-family: Arial, Helvetica, sans-serif;
        }

        strong {
            color: brown;
        }

        .requested_success {
            color: green;
        }

        .header-image {
            height: 360px;
            background-image: url("https://images.unsplash.com/photo-1612117189122-6b065b74f4bd?ixlib=rb-1.2.1&q=80&fm=jpg&crop=entropy&cs=tinysrgb&dl=ralston-smith-sEgodrJdMGw-unsplash.jpg");
            /* background-attachment: fixed; */
            background-size: cover;
            background-position: center;
            margin: 0;

        }

        .subscribefor h4 {
            font-weight: 600;
            text-align: center;
            padding-top: 8px;
        }

        .subscribefor li {
            font-size: 18px;
        }

        .first {
            color: green;
        }

        .subscribefor {
            border-radius: 22px;
            background-image: url('https://i.gifer.com/QHTn.gif');
            background-size: contain;
            background-position: right;
            background-repeat: no-repeat;
            background-color: #fff;
        }

        .subscribefor hr {
            width: 40%;
        }

        .borderrad {
            border-radius: 22px;
        }

        #email_error {
            color: red;
        }

        .totalsubscribers {
            text-align: center;
            font-weight: 600;
            color: #30B9F6;
        }

        .slider .slider-item {
            display: none;
            animation: reveal .5s ease-in-out;
            border-radius: 22px;
        }

        .slider .slider-item.active {
            display: block;
            border-radius: 22px;
        }

        .images_slider {
            border-radius: 22px;
            width: 100%;
        }

        .slider .dots {
            text-align: center;
            padding: 10px;
        }

        .slider .dots li {
            cursor: pointer;
            display: inline-block;
            background: #FFA500;
            color: #fff;
            padding: 7px 11px;
            line-height: .5;
            border-radius: 50%;
            text-indent: -9999px;
            opacity: .5;
            -webkit-transition: opacity .2s;
            -o-transition: opacity .2s;
            transition: opacity .2s;
        }

        .slider .dots li.active {
            opacity: 1;
        }

        @keyframes reveal {
            from {
                opacity: 0;
            }

            to {
                opacity: 1;
            }
        }

        .bot-details {
            padding: 20px;
        }

        .features {
            font-weight: 600;
        }

        .panel {
            padding: 0 18px;
            display: none;
            /* background-color: rgba(252, 203, 231, 0.616); */
            background: linear-gradient(rgba(59, 59, 59, 0.616), rgba(24, 24, 24, 0.616)), url('https://images.unsplash.com/photo-1612111394447-998fc2d16527?ixlib=rb-1.2.1&q=80&fm=jpg&crop=entropy&cs=tinysrgb&dl=nubelson-fernandes-8l30Cc1IcT8-unsplash.jpg');
            background-repeat: no-repeat;
            background-attachment: scroll;
            border-radius: 0px 0px 22px 22px;
            overflow: hidden;
            border-bottom: 8px #fff solid;
            transition: all .1s ease-in-out;
            background-size: cover;
            color: #fff;
            font-size: 18px;
            padding: 4px 50px;
        }

        .accordion {
            background: linear-gradient(rgba(59, 59, 59, 0.616), rgba(24, 24, 24, 0.616)), url('https://images.unsplash.com/photo-1612111394447-998fc2d16527?ixlib=rb-1.2.1&q=80&fm=jpg&crop=entropy&cs=tinysrgb&dl=nubelson-fernandes-8l30Cc1IcT8-unsplash.jpg');
            background-position-x: 120px;
            background-attachment: fixed;
            color: #fff;
            font-size: 19px;
        }

        /* Chrome, Safari, Edge, Opera */
        input::-webkit-outer-spin-button,
        input::-webkit-inner-spin-button {
            -webkit-appearance: none;
            margin: 0;
        }

        /* Firefox */
        input[type=number] {
            -moz-appearance: textfield;
        }

        input[Type=text],
        input[type=number],
        input[type=tel] {
            padding: 6px 10px;
            width: 100%;
            border: #ccc 1px solid;
            border-radius: 8px;
            box-shadow: 0 6px 6px #32C75F11, 0 2px 2px #32C75F12;
        }

        .payment_form {
            padding: 30px;
            border-radius: 22px;
        }

        .input_field {
            padding: 10px
        }

        input[type=submit] {
            width: 140px;
            background-color: #32c75f;
            padding: 6px 12px;
            border: none;
            box-shadow: 0 10px 20px #e2eef7f5, 0 6px 6px #e0e0f7ef;
            color: #fff;
            transition-duration: 0.4s;
            border-radius: 8px;
        }

        input[type=submit]:hover {
            box-shadow: none;
            transition-duration: 0.4s;
        }

        .downloader_f {
            background-color: #32c75f;
            color: #fff;
            padding: 10px;
            border-radius: 8px;
            text-decoration: none;
            box-shadow: 0 10px 20px #e2eef7f5, 0 6px 6px #e0e0f7ef;
        }

        .downloader_f:hover {
            box-shadow: none;
            transition-duration: 0.4s;
            text-decoration: none;
        }

        input[Type=checkbox] {
            width: 1.3em;
            height: 1.3em;
            background-color: white;
            border-radius: 50%;
            vertical-align: middle;
            border: 1px solid #ddd;
            appearance: none;
            -webkit-appearance: none;
            outline: none;
            cursor: pointer;
            box-shadow: 0 2px 2px #32C75F11, 0 4px 4px #32C75F32;
        }

        input[Type=checkbox]:checked {
            background-color: #32C75F;
            border: 1px solid #ccc;
        }

        .play_video {
            text-align: center;
            padding: 16px;
        }

        .watch_video {
            text-align: center;
            transition-duration: 0.6s;
        }

        .instructions {
            color: #EA4335;
            font-weight: 600;
            padding: 8px;
        }

        .play_btnn {
            border: none;
            box-shadow: 0 9px 9px #DB6C4323, 0 19px 19px #DB6C4362;
            border-radius: 12px;
            padding: 8px 14px;
            background-color: #EA4335;
            color: #fff;
            transition-duration: 0.6s;
        }

        .play_btnn:hover {
            box-shadow: none;
            transition-duration: 0.6s;
        }
    </style>

    <script>
        var hash = '<?php echo $hash ?>';

        function submitForm() {
            if (hash == '') {
                return;
            }
            var payuForm = document.forms.payuForm;
            payuForm.submit();
        }
    </script>


</head>

<body onLoad="submitForm()">

    <?php include("navbar.php") ?>
    <section>

        <section class="main-section">
            <div class="container">
                <div class="row">
                    <?php include("sidebar.php"); ?>

                    <div class="col-12 col-lg-9">
                        <div class="header-image"> </div>
                        <div class="card" style="border-bottom: 60px #fff5be solid;">
                            <h3 style="text-align: center; font-weight: 600; padding:20px;">MyClass Bot</h3>
                            <h5 style="text-align: center; font-weight: 600;">Leave everything on <span style="color: #EA4335;">bot</span> and do what you <span style="color: #EA4335;">love!</span></h5>
                            <hr>
                            <div class="card-body center">

                                <div class="bot-details">
                                    <p>MyClass Bot, A python bot made for student to simplify their effors. This bot after launch can attend all your
                                        classes even after teacher kick you temporarily it will rejoin via selected mode.
                                        <br><br>We're just highlighting our features. The software is for educational purposes only, the developer do not
                                        endorse or promote any activities discussed herein.
                                        <br>
                                        <span style="color: #EA4335; text-align:center;">Use it on your own risks.</span>
                                    </p>
                                    <h4 class="features"></h4>
                                </div>


                                <div style="padding: 10px;">
                                    <div id="slider" class="slider">
                                        <h3 style="font-size: 18px; font-weight:600">Bot Screenshot</h3>
                                        <div class="slider-item active"><img class="images_slider" src="assets/images/botimg1.JPG" alt="bot image" class="img-fluid"></div>
                                        <div class="slider-item"><img class="images_slider" src="assets/images/botimg2.JPG" alt="bot image" class="img-fluid"></div>
                                        <div class="slider-item"><img class="images_slider" src="assets/images/botimg3.JPG" alt="bot image" class="img-fluid"></div>
                                        <div class="slider-item"><img class="images_slider" src="assets/images/botimg4.JPG" alt="bot image" class="img-fluid"></div>
                                        <div class="slider-item"><img class="images_slider" src="assets/images/botimg5.JPG" alt="bot image" class="img-fluid"></div>
                                        <div class="slider-item"><img class="images_slider" src="assets/images/botimg8.JPG" alt="bot image" class="img-fluid"></div>
                                        <div class="slider-item"><img class="images_slider" src="assets/images/botimg7.JPG" alt="bot image" class="img-fluid"></div>
                                        <div class="slider-item"><img class="images_slider" src="assets/images/botimg9.JPG" alt="bot image" class="img-fluid"></div>
                                        <div class="slider-item"><img class="images_slider" src="assets/images/botimg10.JPG" alt="bot image" class="img-fluid"></div>
                                        <ul id="dots" class="list-inline dots"></ul>

                                    </div>
                                </div>

                                <div class="play_video">
                                    <button class="play_btnn" onclick="video1()">Watch Video 1 <span class="iconify" data-icon="bi:play-btn"></span> </button> <span style="width: 8px; color: #fcf7d900;"> | </span> <button class="play_btnn" onclick="video2()">Watch Video 2 <span class="iconify" data-icon="bi:play-btn"></span></button>
                                </div>
                                <div class="watch_video" id="video1">
                                    <iframe style="box-shadow: 0 6px 6px #32C75F11, 0 18px 18px #32C75F12; border-radius: 12px;" width="100%" height="500" src="https://www.youtube.com/embed/V8Q8O-HooJI" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe> <br>
                                    <p class="instructions"> Video 1: Basic Software Requirements (Follow Carefully!) </p>
                                </div>
                                <div class="watch_video" id="video2">
                                    <iframe style="box-shadow: 0 6px 6px #32C75F11, 0 18px 18px #32C75F12; border-radius: 12px;" width="100%" height="500" src="https://www.youtube.com/embed/nCiRPV4wMkA" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe> <br>
                                    <p class="instructions"> Video 2: Installation, Download Update and Run </p>
                                </div>


                                <div class="bot-details">
                                    <h4 class="features">Features</h4>
                                    <ul>
                                        <li>Join Without Mic or</li>
                                        <li>Join Via Mic.</li>
                                        <li>Answer Polls, So that you don't get kicked!</li>
                                        <li>Rejoin if teachers kicked you temporarily.</li>
                                        <li>Siren alert if you get kicked. (On Update)</li>
                                        <li>Siren alert if teachers call your name.</li>
                                    </ul>

                                    <br>

                                    <h4 class="features">Requirements</h4>
                                    <ol>
                                        <li>Python 3.0 or above</li>
                                        <li>Github Account for downloads and Updates (download GitBash <a href="https://git-scm.com/downloads">here</a> )</li>
                                        <li>Few Libraries (You can Install Manually or Program will install it itself)</li>
                                        <li>Google Chrome installed</li>
                                    </ol>

                                    <h4 class="features">When I will get access or my account will get activated!</h4>
                                    <p>After Successful payment we will receive your Github email and UMS Username. Within 1-2 hrs we Will add you on Github and You will be able to Use the software entering your username</p>

                                </div>

                                <button class="accordion">Python Libraries List <span class="spiin" style="float: right;"><span class="iconify" data-icon="ant-design:plus-outlined"></span></span></button>
                                <div class="panel">
                                    <div class="row mt-3">

                                        pip install os-sys <br>
                                        pip install pygame <br>
                                        pip install pyscreenshot <br>
                                        pip install pillow <br>
                                        pip install pywin32 <br>
                                        pip install selenium <br>
                                        pip install winshell - Install it Manually It takes little extra time <2mins <br> <br>

                                    </div>
                                </div>


                                <br><br><br>

                                <div class="col-12 col-lg-12 shadow-sm borderrad">
                                    <div class="card-body center" style="text-align: center; color:red; font-size: 17px; font-weight: 600; background-image:url('https://enally.in/files-manager/assets/download_bg.png');">
                                        <span onclick="expand()"><p id="downloa_btn" class="downloader_f" style="text-align: center; color:#FFF; cursor:pointer; font-weight: 600;" class="fa fa-download"> MyClass Bot - Downloader  Click here <span class="iconify" data-icon="fa6-solid:download"></span></p></span>
                                        <span id="download_options"></span>
                                    </div>
                                </div>
                                <br><br>


                                <form id="contact" action="<?php echo $action; ?>" method="post" name="payuForm">
                                    <input type="hidden" name="key" value="<?php echo $MERCHANT_KEY ?>" />
                                    <input type="hidden" name="hash" value="<?php echo $hash ?>" />
                                    <input type="hidden" name="txnid" value="<?php echo $txnid ?>" />

                                    <input type="text" placeholder="Amount" name="amount" value="<?php echo $price ?>" hidden />
                                    <input type="text" placeholder="Success URI" name="surl" value="https://enally.in/files-manager/master_success" size="64" hidden />
                                    <input type="text" placeholder="Failed URI" name="furl" value="https://enally.in/files-manager/master_failed" size="64" hidden />
                                    <input type="hidden" name="service_provider" value="payu_paisa" size="64" />

                                    <div id="payment_options">
                                        <div class="payment_form shadow-sm">
                                            <marquee style="border-right: #EA4335 12px solid; border-left: #EA4335 12px solid; color: #EA4335; padding: 0px 8px; text-align:center;" behavior="" direction="">Bot will be Activated on 17 Feb 2022 - 03:00AM. Register now to get early access. Meanwhile Go through video 1</marquee>
                                            
                                            <h4 style="font-weight: 600;">Registration Details</h4>
                                            <p>All fields are mandatory and Username Should be correct!</p>
                                            <div class="input_field">
                                                <input required type="text" name="firstname" placeholder="Full Name" id="firstname" value="<?php echo (empty($posted['firstname'])) ? '' : $posted['firstname']; ?>" />
                                            </div>
                                            <div class="input_field">
                                                <input required type="text" placeholder="Github Email" name="email" id="email" value="<?php echo (empty($posted['email'])) ? '' : $posted['email']; ?>" />
                                            </div>
                                            <div class="input_field">
                                                <input required type="tel" placeholder="WhatsApp Mobile" name="phone" value="<?php echo (empty($posted['phone'])) ? '' : $posted['phone']; ?>" />
                                            </div>
                                            <div class="input_field">
                                                <input required type="number" placeholder="UMS Username" name="productinfo" value="<?php echo (empty($posted['productinfo'])) ? '' : $posted['productinfo'] ?>">
                                            </div>
                                            <div class="input_field">
                                                <input type="checkbox" required name="" id=""> Make Sure Your UMS Username and Github Email is Correct.
                                            </div>
                                            <div class="input_field">
                                                <?php if (!$hash) { ?><input type="submit" value="Pay Now" /><br><br>
                                                    <a style="color:green; text-decoration: none;" href="#">Proceed For Payment ₹88 /- only <?php //echo date("Y-m-d") 
                                                                                                                                            ?> <br> After 20-Feb-2020 Price will be changed to ₹128 /- </a><br>
                                                    <sapn style="color: red; font-size: 14px;">I know here many of you will back off but we are only charging for server maintenance. And, It took us 5 days to code whole Software and test it on different System.</span><?php } ?><?php if ($formError) { ?><span style="color:red">Please fill all mandatory fields.</span><?php } ?>
                                            </div>
                                        </div>
                                    </div>

                                </form>


                                <br>
                                <div class="alert alert-info alert-dismissible fade show shadow-sm" role="alert">
                                    <strong>New Message!</strong> Classroom Bucket Mobile App has new update available.
                                </div>

                            </div>
                        </div>
                    </div>
                </div>
        </section>



        <!---- Footers End ---->
        <script>
            var superSlide = function(slider) {

                this.sliderItems = slider.getElementsByTagName('div');
                this.dots = slider.querySelector('.dots');

                this.init = function() {
                    for (i = 0; i < this.sliderItems.length; i++) {
                        var dot = document.createElement('li');
                        dot.classList.add('list-inline-item');
                        dot.setAttribute("data-slide-num", i);
                        dot.innerHTML = i;
                        dot.classList.add(i === 0 ? 'active' : 'inactive');
                        dot.addEventListener("click", this.runSlider.bind(this));
                        this.dots.appendChild(dot);
                    }
                }

                this.runSlider = function(evt) {
                    var activeDot = evt.currentTarget;
                    var dnum = activeDot.dataset.slideNum;
                    for (i = 0; i < this.sliderItems.length; i++) {
                        var cssIdx = i + 1;
                        var inactiveDot = slider.querySelector('.list-inline-item:nth-child(' + cssIdx + ')');
                        this.sliderItems[i].classList.remove('active');
                        this.sliderItems[dnum].classList.add('active');
                        inactiveDot.classList.remove('active');
                        activeDot.classList.add('active');
                    }
                }

                this.init()

            }

            var slider1 = new superSlide(document.getElementById('slider'))
            var slider2 = new superSlide(document.getElementById('slider2'))
        </script>
        <script language="javascript" type="text/javascript">
            var timeout = setInterval(reloadChat, 900);

            function reloadChat() {

                $('#totalpg').load('totalpageview.php');
            }
        </script>
        <script>
            var acc = document.getElementsByClassName("accordion");
            var i;

            for (i = 0; i < acc.length; i++) {
                acc[i].addEventListener("click", function() {
                    this.classList.toggle("active");
                    var panel = this.nextElementSibling;
                    if (panel.style.display === "block") {
                        panel.style.display = "none";
                    } else {
                        panel.style.display = "block";
                    }
                });
            }
        </script>

        <script>
            function bot_registration() {
                jQuery('#email_error').html('');
                var email = jQuery('#email').val();
                if (email == '') {
                    jQuery('#email_error').html('Please Enter a valid Email. ');

                } else {
                    jQuery('#btn_submit').html('Please wait...');
                    jQuery('#btn_submit').attr('disabled', true);
                    jQuery.ajax({
                        url: 'registration_for_bot.php',
                        type: 'POST',
                        data: 'email=' + email,
                        success: function(result) {
                            jQuery('#email').val('');
                            jQuery('#email_error').html(result);
                            jQuery('#btn_submit').html('Subscribe <span class="iconify" data-icon="logos:google-gmail"></span>');
                            jQuery('#btn_submit').attr('disabled', false);
                        }
                    })
                }
            }

            function expand() {
                document.getElementById("download_options").innerHTML = '<br><a href="https://enally.in/files-manager/gallery/Mics/gallery/MyClass%20Bot%20v2.2.exe" class="downloader_f" download> Download v2.0+ EXE File 400kb </a>  <br><br> <a class="downloader_f"  href="https://enally.in/files-manager/gallery/Mics/gallery/MyClass%20Bot%20-%20All%20Required%20Files.rar" download> Download All Required File 75.5mb </a><br><br>';
                $('#downloa_btn').hide();
            }

            // function video1() {
            //     document.getElementById("video1").innerHTML = '<iframe style="border-radius: 12px;" width="100%" height="500" src="https://www.youtube.com/embed/V8Q8O-HooJI" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe> <br> <p class="instructions"> Video 1: Basic Software Requirements (Follow Carefully!) </p>';
            // }

            // function video2() {
            //     document.getElementById("video2").innerHTML = '<iframe style="border-radius: 12px;" width="100%" height="500" src="https://www.youtube.com/embed/nCiRPV4wMkA" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe> <br> <p class="instructions"> Video 2: Installation, Download Update and Run </p>';
            // }


            function video1() {
                var video1 = document.getElementById("video1");
                if (video1.style.display === "none") {
                    video1.style.display = "block";
                    $('#video2').hide();
                } else {
                    video1.style.display = "none";
                }
            }

            function video2() {
                var video2 = document.getElementById("video2");
                if (video2.style.display === "none") {
                    video2.style.display = "block";
                    $('#video1').hide();
                } else {
                    video2.style.display = "none";
                }
            }

            // function hideMe(){
            //     var video1 = document.getElementById("video1");
            //     video1.style.display == "none";
            // }
        </script>

        <script type="text/javascript">
            $('#video1').hide();
        </script>
        <script type="text/javascript">
            $('#video2').hide();
        </script>

        <?php include("footercredit.php") ?>
        <?php include("../footer.php") ?>