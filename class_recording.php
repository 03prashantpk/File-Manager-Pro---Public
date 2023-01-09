<?php
error_reporting(0);
session_start(); /* Starts the session */

include("../files_counter.php");

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
    <title>Classroom Bucket - Subscribe Us</title>
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
    <meta name="description" content="Classroom Bucket it an online platform where Collage, Schools and University can share Study Materials for their students. Student's can also upload their hand-written notes, Projects and other study materials related to course to share or help another students." />
    <meta name="author" content="Prashant Kumar">
    <meta name="copyright" content="Enally.in">
    <meta property="og:image" content="https://enally.in/files-manager/assets/about_img.webp">
    <meta property="og:image" content="https://enally.in/files-manager/assets/about_img.webp">
    <meta name="twitter:image" content="https://enally.in/files-manager/assets/about_img.webp">

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
            background-image: url("https://images.unsplash.com/photo-1563986768609-322da13575f3?ixlib=rb-1.2.1&q=80&fm=jpg&crop=entropy&cs=tinysrgb&dl=austin-distel-gUIJ0YszPig-unsplash.jpg");
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
            padding: 10px;
        }

        #email_error {
            color: red;
        }

        .totalsubscribers {
            text-align: center;
            font-weight: 600;
            color: #30B9F6;
        }

        .play_btnn {
            border: none;
            box-shadow: 0 9px 9px #DB6C4323, 0 19px 19px #DB6C4362;
            border-radius: 12px;
            padding: 8px 12px;
            background-color: #EA4335;
            color: #fff;
            transition-duration: 0.6s;
        }

        .play_btnn:hover {
            box-shadow: none;
            transition-duration: 0.6s;
        }
        .instructions {
            color: #EA4335;
            font-weight: 600;
            padding: 8px;
            text-align: center;
        }
    </style>
</head>

<body onclick="hide_default()">

    <?php include("navbar.php") ?>
    <section>

        <section class="main-section">
            <div class="container">
                <div class="row">
                    <?php include("sidebar.php"); ?>

                    <div class="col-12 col-lg-9">
                        <div class="header-image"> </div>
                        <div class="card" style="border-bottom: 60px #fff5be solid;">
                            <h3 style="text-align: center; font-weight: 600; padding:20px;">Class Recording</h3>
                            <h5 style="text-align: center; font-weight: 600;">This Might be helpful for you!</h5>
                            <hr>
                            <div class="card-body center">

                                <div class="container"></div>


                                <div class="container shadow-sm borderrad">

                                    <div class="play_video">
                                        <button class="play_btnn" onclick="video1()">CSE316 - OS <span class="iconify" data-icon="bi:play-btn"></span> </button>
                                        <span style="width: 8px; color: #fcf7d900;"> | </span>
                                        <button class="play_btnn" onclick="video2()">Other <span class="iconify" data-icon="bi:play-btn"></span></button>
                                    </div>

                                </div>
                                <br>
                                <div class="container shadow-sm borderrad" id="showvdo">
                                    <div class="watch_video" id="video1">
                                        <iframe style="box-shadow: 0 6px 6px #32C75F11, 0 18px 18px #32C75F12; border-radius: 12px;" width="100%" height="500" src="https://www.youtube.com/embed/V8Q8O-HooJI" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe> <br>
                                        <p class="instructions"> Video 1: Basic Software Requirements (Follow Carefully!) </p>
                                    </div>
                                    <div class="watch_video" id="video2">
                                        <iframe style="box-shadow: 0 6px 6px #32C75F11, 0 18px 18px #32C75F12; border-radius: 12px;" width="100%" height="500" src="https://www.youtube.com/embed/nCiRPV4wMkA" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe> <br>
                                        <p class="instructions"> Video 2: Installation, Download Update and Run </p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>



        <!---- Footers End ---->

        <script language="javascript" type="text/javascript">
            var timeout = setInterval(reloadChat, 900);

            function reloadChat() {

                $('#totalpg').load('totalpageview.php');
            }


            function video1() {
                var video1 = document.getElementById("video1");
                if (video1.style.display === "none") {
                    video1.style.display = "block";
                    $('#video2').hide();
                    $('#showvdo').show();
                } else {
                    video1.style.display = "none";
                }
            }

            function video2() {
                var video2 = document.getElementById("video2");
                if (video2.style.display === "none") {
                    video2.style.display = "block";
                    $('#video1').hide();
                    $('#showvdo').show();
                } else {
                    video2.style.display = "none";
                }
            }

            $('#video1').hide();
            $('#video2').hide();
            $('#showvdo').hide();

        </script>



        <?php include("footercredit.php") ?>
        <?php include("../footer.php") ?>