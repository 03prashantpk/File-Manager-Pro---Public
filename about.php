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

$page_code = "contact";


?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>Classroom Bucket - About</title>
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
            background-image: url("https://images.pexels.com/photos/3975590/pexels-photo-3975590.jpeg?cs=srgb&dl=pexels-tatiana-syrikova-3975590.jpg");
            /* background-attachment: fixed; */
            background-size: cover;
            background-position: center;
            margin: 0;

        }

        h5 {
            font-weight: 600;
        }

        blockquote {
            border-left: #fff5be 6px solid;
            padding-left: 10px;
            background-color: #F7F7FF;
            font-size: 18px;
            text-align: center;
        }

        blockquote:hover {
            border-left: #E9F8E7 6px solid;
            background-color: #F7F7FF;
            text-align: center;
        }

        .meta-image {
            width: 100%;
            border-radius: 8px;
        }

        @media only screen and (max-width: 768px) {

            /* For mobile phones: */
            .meta-image {
                visibility: hidden;
                height: 0px;
                width: 0px;
            }

        }
    </style>
</head>

<body>

    <?php include("navbar.php") ?>
    <section>

        <section class="main-section">
            <div class="container">
                <div class="row">
                    <?php include("sidebar.php"); ?>

                    <div class="col-12 col-lg-9">
                        <div class="header-image"> </div>
                        <div class="card" style="border-bottom: 60px #fff5be solid;  background-image: url('https://assets.oneclass.com/oc-static/static/assets/images/pages/home/card-1@2x.webp'); background-size:contain; background-repeat: no-repeat; background-position: bottom;">
                            <div>
                                <h3 style=" text-align: center; font-weight: 600; padding:20px 0px;">Classroom Bucket</h3>
                                <h5 style=" text-align: center; font-weight: 600; font-size: 18px;"> <span class="blockquote-footer">Everything in one Bucket </span> </h5>
                            </div>


                            <div class="card-body center">
                                <div class="col-12 col-lg-12">
                                    <!-- main content here --->
                                    <br>
                                    <h5>Brief Introduction</h5>
                                    <p>Classroom Bucket it an online platform where Collage, Schools and University can share Study Materials for their students. Student's can also upload their hand-written notes, Projects and other study materials related to course to share or help another students.</p>

                                    <br>
                                    <h5>Why This Project?</h5>
                                    <p>Where everything is online example: Classroom, Video Tutorials, Live Chats, Music Platform, Experiment's Platform and more. We thought why not every collage should have its online study materials platform. Where not only teacher's but student's can also organise their study materials at one single platform. And with this we came with the idea of "Classroom Bucket".</p>

                                    <br>
                                    <br>
                                    <blockquote>
                                        <p class="mb-0">Everything in one Bucket "Classroom Bucket"</p>
                                        <footer class="blockquote-footer">Prashant Kumar <cite title="Source Title">Enally.in</cite></footer>
                                    </blockquote>
                                    <br>
                                </div>

                                <br>
                                <h5>Language and Development</h5>
                                <p>Currently this Project is developed using HTML, CSS, JS, Ajax, JQuery and PHP (Filesystem). <br>
                                    Anyone having basic knowledge of mentioned language can handle this project.</p>
                                <p> <i>More will be updated soon</i> </p>

                                <br>
                                <h5>Admin and Developer</h5>
                                <p> - Prashant Kumar <a target="_blank" href="https://www.linkedin.com/in/03prashantpk/"><span class="iconify" data-icon="ic:baseline-open-in-new"></span></a></p>

                                <br>
                                <h5>How to contact us?</h5>
                                <p> - Contact Us <a target="_blank" href="contact"><span class="iconify" data-icon="ic:baseline-open-in-new"></span></a></p>

                                <div class="alert alert-info alert-dismissible fade show shadow-sm" role="alert" style="opacity: 0.8;">
                                    <strong>New Message!</strong> Classroom Bucket Mobile App has new update available.
                                </div>


                                <!----- Google Adsense ------------>
                                <script async src="https://pagead2.googlesyndication.com/pagead/js/adsbygoogle.js?client=ca-pub-4554043228187575" crossorigin="anonymous"></script>
                                <!-- File Manager - About Page -->
                                <!-- <ins class="adsbygoogle" style="display:block" data-ad-client="ca-pub-4554043228187575" data-ad-slot="1454820382" data-ad-format="auto" data-full-width-responsive="true"></ins>
                                <script>
                                    (adsbygoogle = window.adsbygoogle || []).push({});
                                </script> -->
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
        </script>

        <?php include("footercredit.php") ?>
        <?php include("../footer.php") ?>