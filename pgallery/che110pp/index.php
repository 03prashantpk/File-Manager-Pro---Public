<?php

include("../../files_counter.php");
include("head.php");
// function removed
if (isset($_POST['delete'])) {
    $filename = $_POST['filenamedelete'];
    unlink($filename);
    header('Location: ./');
}


// Total page Visit
$Page_visit_counter_file = "PV_counter.txt";
$total_page_visit = @file_get_contents($Page_visit_counter_file,);
$total_page_visit++;
file_put_contents($Page_visit_counter_file, $total_page_visit);

// total file counts
$filecounts =  "Images (" . $count_total_images . ") | Presentation (" . $count_total_ppt . ") | Documents (" . $count_total_docs . ") | Videos (" . $count_total_videos . ") | Pdf (" . $count_total_pdf . ") | Musics (" . $count_total_musics . ")" . "| Archives (" . $count_total_archive . ")";



?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>Classroom Bucket - CHE110 - Presentation</title>
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
    <link href="https://enally.in/files-manager/assets/main.css" rel="stylesheet">

    <style>
        .upload-file {
            width: 100%;
            padding: 30px;
        }

        .filename {
            border: none;
            background-color: #F7F7FF;
            width: 100%;
        }

        input[type=file]::file-selector-button {
            border: none;
            padding: 20px;
            padding: 7px 18px;
            border-radius: 4px;
            background-color: #a29bfe;
            transition: 1s;
            font-size: 18px;
        }

        input[type=file]::file-selector-button:hover {
            background-color: #81ecec;
            border: none;
        }

        .uploadbutton {
            background-color: #a29bfe;
            border: none;
            padding: 2px 10px;
            border-radius: 4px;
            width: 180px;
        }

        .uploadbutton:hover {
            background-color: #1ecece;
            border: none;
            padding: 2px 10px;
            border-radius: 4px;
            width: 180px;
        }

        .top-bottom-padding {
            padding: 8px 16px;
            width: 100%;
        }

        .center {
            display: flex;
            justify-content: center;
        }

        .progress {
            border: none;
            width: 100%;
        }

        .progress[value] {
            /*Reset the default appearance */
            -webkit-appearance: none;
            appearance: none;
            width: 420px;
            height: 15px;
        }

        .progress[value]::-webkit-progress-bar {
            background-color: rgb(0, 0, 0);
            border-radius: 14px;
        }

        .progress[value]::-webkit-progress-value::before {
            content: '80%';
            position: absolute;
            right: 0;
            top: -125%;
        }

        .status {
            color: #a29bfe;
        }

        .loaded_n_total {
            color: #a29bfe;
        }

        select {
            appearance: none;
            background-color: #F7F7FF;
            border: none;
            padding: 0 1em 0 0;
            margin: 0;
            width: 100%;
            font-family: inherit;
            font-size: inherit;
            cursor: inherit;
            line-height: inherit;
        }

        .select {
            width: 100%;
            border: 1px solid var(--select-border);
            border-radius: 0.25em;
            padding: 0.25em 0.5em;
            font-size: 1.25rem;
            cursor: pointer;
            line-height: 1.1;
            background-color: #fff;
            background-image: linear-gradient(to top, #f9f9f9, #fff 33%);
            width: 100%;
        }

        .btn-close {
            color: red;
        }

        .demofileimage {
            width: 80%;
            border: 1px solid #ccc;
            border-radius: 12px;
        }

        .centered {
            text-align: center;
            line-height: 8px;
        }

        .centered p {
            text-align: left;
            margin-left: 40px;
        }

        option {
            padding: 8px;
        }

        #uploadbuttonn {
            padding: 20px;
        }

        select,
        option {
            background-color: #F7F7FF;
        }

        .filenameFN {
            font-weight: 600;
            color: red;
            text-decoration: underline;
            padding: 2px 4px;
        }

        .filenameLN {
            font-weight: 600;
            color: lightgreen;
            text-decoration: underline;
            padding: 2px 4px;
        }

        .filenameAN {
            font-weight: 600;
            color: darkgoldenrod;
            text-decoration: underline;
            padding: 2px 4px;
        }

        .filenameFN1 {

            color: red;
            text-decoration: underline;
            padding: 2px 10px;
        }

        .filenameLN1 {

            color: lightgreen;
            text-decoration: underline;
            padding: 2px 10px;
        }

        .filenameAN1 {

            color: darkgoldenrod;
            text-decoration: underline;
            padding: 2px 10px;
        }

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
            background-image: url("https://images.unsplash.com/photo-1447767819330-4adf93b62dfe?ixlib=rb-4.0.3&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=1632&q=80");
            /* background-attachment: fixed; */
            background-size: cover;
            background-position: center;
            margin: 0;

        }

        .contact-us {
            padding: 8px;
            border-radius: 22px;
        }

        form {
            padding: 8px;
        }
        .insta-default {
            margin: auto;
            width: 66%;
            text-align: center;
        }
  
        .insta-default a {
            padding: 15px 30px;
            display: block;
            background-color: #E33E5C;
            box-shadow: 0 2px 3px 0 rgba(0,0,0,0.1);
            color: #FFF;
            border-radius: 4px;
            text-transform: uppercase;
            font-weight: bold;
            text-decoration: none;
            transition: all .3s;
        }
   
        .insta-default:hover {
            
            transition: all .3s;
        }
     
        .insta-default i {
            color: #FFF;
            font-size: 18px;
        }
     
        </style>
</head>

<body>
   
<?php  include("../../navbar.php"); ?>
    <section>

        <section class="main-section">
            <div class="container">
                <div class="row">
                   <?php include("../../sidebar.php"); ?>
                     <div class="col-12 col-lg-9">
                    <div class="header-image"> </div>
                        <div class="card" style="border-bottom: 60px #88D4C1 solid;">
                            <div class="card-body">
                            <h3 style="text-align: center; font-weight: 600; padding-bottom:8px;">ENVIRONMENTAL STUDIES - PRESENTATIONS</h3>
                                <hr>

                                <div class="insta-default">
                                    <a target="_blank" href="https://www.instagram.com/classroombucket/" class="insta-default">Follow Us On Instagram <i class="fab fa-instagram"></i></a>
                                </div>
                                <br><br>



                                <!--end row-->
                                <div class="d-flex align-items-center">
                                    <div>
                                        <h5 class="mb-0">Recent Files</h5>
                                    </div>
                                    <div class="ms-auto"><a href="javascript:;" class="btn btn-sm btn-outline-secondary">View
                                            all</a>
                                    </div>
                                </div>

                                <span id="content">
                                    <div class="content-centered">
                                        <br><br>
                                        <center>
                                            <div class="loader shadow"></div>
                                            <p>Loading Please Wait...<br>
                                                <script>
                                                    var timeleft = 10;
                                                    var downloadTimer = setInterval(function() {
                                                        if (timeleft <= 0) {
                                                            clearInterval(downloadTimer);
                                                        }
                                                        document.getElementById("progressBar").value = 10 - timeleft;
                                                        timeleft -= 1;
                                                    }, 1000);
                                                </script>
                                                <progress value="0" max="10" id="progressBar"></progress></p>
                                        </center>
                                    </div>

                                </span>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <?php include("../../footercredit.php") ?>
        <!---- Footers End ---->

        <?php include("footer.php") ?>