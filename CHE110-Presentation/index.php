<?php
error_reporting(0);
session_start(); /* Starts the session */
if (!isset($_SESSION['UserData']['Username'])) {
    //header("location:https://enally.in/files-manager/login.php");
    //exit;
}

include "../files_counter.php";
// function removed
if (isset($_POST['delete'])) {
    $filename = $_POST['filenamedelete'];
    unlink($filename);
    header('Location: ./');
}

// Total page Visit
$Page_visit_counter_file = "../PV_counter.txt";
$total_page_visit = @file_get_contents($Page_visit_counter_file, );
$total_page_visit++;
file_put_contents($Page_visit_counter_file, $total_page_visit);

// total file counts
$filecounts = "Images (" . $count_total_images . ") | Presentation (" . $count_total_ppt . ") | Documents (" . $count_total_docs . ") | Videos (" . $count_total_videos . ") | Pdf (" . $count_total_pdf . ") | Musics (" . $count_total_musics . ")" . "| Archives (" . $count_total_archive . ")";
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>Classroom Bucket - Enally</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.0/dist/js/bootstrap.bundle.min.js"></script>
    <!-- CSS only -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.2/dist/css/bootstrap.min.css">
    <!-- JavaScript Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.2/dist/js/bootstrap.bundle.min.js"></script>


    <link href="https://cdn.lineicons.com/3.0/lineicons.css" rel="stylesheet">
    <script src="https://code.iconify.design/2/2.0.4/iconify.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link href="https://cdn.lineicons.com/3.0/lineicons.css" rel="stylesheet">
    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" />
    <link href="https://cdn.jsdelivr.net/npm/boxicons@2.0.7/css/boxicons.min.css" rel="stylesheet" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.0/dist/js/bootstrap.bundle.min.js"></script>
    <link href="../assets/main.css" rel="stylesheet">
    <link rel="icon" href="assets/Fevicon.png" type="image/x-icon">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://unpkg.com/boxicons@2.0.9/dist/boxicons.js"></script>
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
            background-image: url("https://enally.in/cdn/globalImages/env.jpg");
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
        .DownloadFile{
            background-color: #E33E5C;
            color: #fff;
            padding: 8px 20px;
            text-decoration: none;
            border-radius: 6px;
            box-shadow: rgba(100, 100, 111, 0.2) 0px 7px 29px 0px;
        }
        .DownloadFile:hover{
            text-decoration: none;
            color: #fff;
        }
    </style>
</head>

<body>

    <?php include "../navbar.php";?>
    <section>

        <section class="main-section">
            <div class="container">
                <div class="row">
                    <?php include "../sidebar.php"?>

                    <div class="col-12 col-lg-9">
                    <div class="header-image"> </div>
                        <div class="card" style="border-bottom: 60px #88D4C1 solid;">
                            <h3 style="text-align: center; font-weight: 600; padding:20px;">ENVIRONMENTAL STUDIES - PRESENTATION
                                <hr style="width: 30%;">
                            </h3>

                            <div class="insta-default">
                                    <a target="_blank" href="https://www.instagram.com/classroombucket/" class="insta-default">Follow Us On Instagram <i class="fab fa-instagram"></i></a>
                                </div>

                            <div class="card-body center">

                                <div class="col-12 col-lg-12">
                                    <form id="upload_form" class="was-validated shadow-sm" style=" border-radius: 12px;" enctype="multipart/form-data" method="post">

                                        <div class="upload-file">
                                            <div class="top-bottom-padding">
                                                <p style="text-align: left; font-weight: 600px;">Select Your Project PPT, PPTX or PDF File</p>
                                                <input type="file" name="file1" id="file1" class="filename" required>
                                            </div>

                                            <div class="top-bottom-padding" style="text-align: center;">
                                                <p style="text-align: left; font-weight: 600px;">Select Project Domain</p>

                                                <select id="mySelect" class="form-control top-bottom-padding" onchange="Uploadfiless()">

                                                    <option value="">Select Domain</option>
                                                    <option value="environmental">Environmental</option>
                                                </select>


                                                <p id="uploadbuttonn"></p>
                                                <p id="uploadsub"></p>

                                                <script>
                                                    function Uploadfiless() {
                                                        var x = document.getElementById("mySelect").value;

                                                        if (x == "") {
                                                            x = "nothing..."
                                                        } else {
                                                            x = document.getElementById("mySelect").value;
                                                        }

                                                        document.getElementById("uploadbuttonn").innerHTML = "<button type='button' value='Upload File' onclick='" + x + "()' class='uploadbutton'><i class='lni lni-cloud-upload'></i> Upload </button>";
                                                        document.getElementById("uploadsub").innerHTML = "You have Selected " + x;
                                                        //document.getElementById("progressBar").innerHTML = '<progress style="width: 100%;" id="progressBar" value="0" max="100" class="progress"></progress>';
                                                    }
                                                </script>
                                            </div>

                                            <div class="top-bottom-padding">
                                                <progress style="width: 100%;" id="progressBar" value="0" max="100" class="progress"></progress>

                                                <h6 id="status"></h6>
                                                <p id="loaded_n_total"></p>
                                                <p style="color: red; text-align: center;">*Note: Naming should be same as mentioned below otherwise we may delete your upload.</p>
                                                    <br>
                                                    <center>
                                                    <a class="DownloadFile" target="_blank"  href="https://enally.in/files-manager/pgallery/che110pp/"> Download Your File From Here </a>
                                                    </center>
                                            </div>
                                        </div>
                                    </form>

                                        

                                    <hr>
                                    <h5><b>Instruction</b></h5>
                                    <div class="row mt-3">
                                        <div class="col-12 col-lg-12">
                                            <ol>
                                                <li>Give A Proper File Name to Your File (Mentioned Below)</li>
                                                <li>Selcet File Required file</li>
                                                <li>File Size Should be less then 10mb (9.3mb)</li>
                                                <li>Choose Domain and Click on Upload</li>
                                                <li>Allowed File formate: PPT, PPTX or PDF</li>
                                                <li style="color: red;">*Note: Unwanted File Will be deleted immediately.</li>
                                            </ol>

                                            
                                        </div>
                                        <div>
                                        </div>
                                    </div>
                                    <br><br>
                                </div>
                            </div>
                        </div>
                    </div>
        </section>


        <!---- Footers End ---->
        <script language="javascript" type="text/javascript">
            var timeout = setInterval(reloadChat, 900);

            function reloadChat() {

                $('#totalpg').load('../totalpageview.php');
            }
        </script>

        <script>
            $(document).ready(function() {
                $("#form").submit(function(event) {
                    var formData = {
                        name: $("#name").val(),
                        email: $("#email").val(),
                        superheroAlias: $("#superheroAlias").val(),
                    };

                    $.ajax({
                        type: "POST",
                        url: "../file_uploaded.php",
                        data: formData,
                        dataType: "json",
                        encode: true,
                    }).done(function(data) {
                        console.log(data);
                    });

                    event.preventDefault();
                });
            });

            function sendmail() {
                $.ajax({
                    url: '../file_uploaded.php',
                    type: 'post',
                    data: {
                        name: name,
                        email: email,
                    },
                    success: function(response) {

                    }
                });
            }
        </script>



        <script type="text/javascript">
            function _(el) {
                return document.getElementById(el);
            }

            function uploadFile() {
                var file = _("file1").files[0];
                var folder = _("folder");

                //alert(file.name + " | " + file.size + " | " + file.type);
                var formdata = new FormData();
                formdata.append("file1", file);
                var ajax = new XMLHttpRequest();
                ajax.upload.addEventListener("progress", progressHandler, false);
                ajax.addEventListener("load", completeHandler, false);
                ajax.addEventListener("error", errorHandler, false);
                ajax.addEventListener("abort", abortHandler, false);
                ajax.open("POST", "file_upload_parser.php");
                ajax.send(formdata);
            }

            function progressHandler(event) {
                _("loaded_n_total").innerHTML = "Uploaded " + (event.loaded / 1048576).toFixed(2) + " MB"; + " bytes of " + (event.total / 1048576).toFixed(2) + " MB";;
                var percent = (event.loaded / event.total) * 100;
                _("progressBar").value = Math.round(percent);
                _("status").innerHTML = Math.round(percent) + "% Uploaded... Please wait";
            }

            function completeHandler(event) {
                _("status").innerHTML = " " + event.target.responseText;
                _("progressBar").value = 0;
            }

            function errorHandler(event) {
                _("status").innerHTML = "Upload Failed";
            }

            function abortHandler(event) {
                _("status").innerHTML = "Upload Aborted";
            }
        </script>

        <script type="text/javascript">
            function _(el) {
                return document.getElementById(el);
            }

            function environmental() {
                var file = _("file1").files[0];
                var folder = _("folder");

                //alert(file.name + " | " + file.size + " | " + file.type);
                var formdata = new FormData();
                formdata.append("file1", file);
                var ajax = new XMLHttpRequest();
                ajax.upload.addEventListener("progress", progressHandler, false);
                ajax.addEventListener("load", completeHandler, false);
                ajax.addEventListener("error", errorHandler, false);
                ajax.addEventListener("abort", abortHandler, false);
                ajax.open("POST", "environmentalPP.php");
                ajax.send(formdata);
            }

            function progressHandler(event) {
                _("loaded_n_total").innerHTML = "Uploaded " + (event.loaded / 1048576).toFixed(2) + " MB"; + " bytes of " + (event.total / 1048576).toFixed(2) + " MB";;
                var percent = (event.loaded / event.total) * 100;
                _("progressBar").value = Math.round(percent);
                _("status").innerHTML = Math.round(percent) + "% Uploaded... Please wait";
            }

            function completeHandler(event) {
                _("status").innerHTML = " " + event.target.responseText;
                _("progressBar").value = 0;
            }

            function errorHandler(event) {
                _("status").innerHTML = "Upload Failed";
            }

            function abortHandler(event) {
                _("status").innerHTML = "Upload Aborted";
            }
        </script>


        <script>
            //function CSE205() {

            //}
        </script>
        <?php include "../footercredit.php"?>
        <?php include "../footer.php"?>