<?php
error_reporting(0);
session_start(); /* Starts the session */
if (!isset($_SESSION['UserData']['Username'])) {
    header("location:https://enally.in/files-manager/login.php");
    exit;
}

if ($_SESSION['UserData']['Username'] == 'prashant' || $_SESSION['UserData']['Username'] == 'superuser' || $_SESSION['UserData']['Username'] == 'superuser') {
} else {
    header("location:https://enally.in/files-manager/login.php");
    exit;
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
                        <div class="card" style="border-bottom: 60px #88D4C1 solid;">
                            <h3 style="text-align: center; font-weight: 600; padding:20px;">Upload Files
                                <hr style="width: 30%;">
                            </h3>

                            <div class="card-body center">

                                <div class="col-12 col-lg-12">
                                    <form id="upload_form" class="was-validated shadow-sm" style=" border-radius: 12px;" enctype="multipart/form-data" method="post">

                                        <div class="upload-file">
                                            <div class="top-bottom-padding">
                                                <p style="text-align: left; font-weight: 600px;">Select a valid File</p>
                                                <input type="file" name="file1" id="file1" class="filename" required>
                                            </div>

                                            <div class="top-bottom-padding" style="text-align: center;">
                                                <p style="text-align: left; font-weight: 600px;">Select Subject</p>

                                                <select id="mySelect" class="form-control top-bottom-padding" onchange="Uploadfiless()">

                                                    <option value="">Select Subject</option>
                                                    <!-- Sem 3 --->
                                                    <option style="background-color: #DBE2EF;" value="CSE205">CSE205 - Data structure and Algorithm</option>
                                                    <option style="background-color: #DBE2EF;" value="CSE211">CSE211 - Computer Structure and Design</option>
                                                    <option style="background-color: #DBE2EF;" value="CSE320">CSE320 - Software Engineering</option>
                                                    <option style="background-color: #DBE2EF;" value="INT213">INT213 - Python Programming</option>
                                                    <option style="background-color: #DBE2EF;" value="INT306">INT306 - Database Management System</option>
                                                    <option style="background-color: #DBE2EF;" value="MTH401">MTH401 - Discrete Mathamatics</option>
                                                    <option style="background-color: #DBE2EF;" value="PEL131">PEL131 - Communication Skill II</option>

                                                    <!-- Sem 4 -->
                                                    <option style="background-color: #B0E8F5;" value="CSE306">CSE306 - Computer Network</option>
                                                    <option style="background-color: #B0E8F5;" value="CSE307">CSE307 - InternetWorking Essentials</option>
                                                    <option style="background-color: #B0E8F5;" value="CSE310">CSE310 - Programming in JAVA</option>
                                                    <option style="background-color: #B0E8F5;" value="CSE408">CSE408 - Design and Analysis of Algorithms</option>
                                                    <option style="background-color: #B0E8F5;" value="MTH302">MTH302 - Probability and Statistics</option>
                                                    <option style="background-color: #B0E8F5;" value="CSE316">CSE316 - Operating System</option>
                                                    <option style="background-color: #B0E8F5;" value="INT404">INT404 - Artificial Intelligence</option>
                                                    <option style="background-color: #B0E8F5;" value="PEV106">PEV106 - Verval Ability 1</option>

                                                    <!-- Sem 5 -->
                                                    <option style="background-color: #92D12D;" value="CSE322">CSE322 - FORMAL LANGUAGE AND AUTOMATION THEORY</option>
                                                    <option style="background-color: #92D12D;" value="CSE332">CSE332 - INDUSTRY ETHICS AND LEGAL ISSUE</option>
                                                    <option style="background-color: #92D12D;" value="INT219">INT219 - FRONTEND WEB DEVELOPER</option>
                                                    <option style="background-color: #92D12D;" value="MKT309">MKT309 - DIGITAL MARKETING</option>
                                                    <option style="background-color: #92D12D;" value="PEA305">PEA305 - ANALYTICAL SKILL-I</option>
                                                    <option style="background-color: #92D12D;" value="PEV107">PEV107 - VERBAL ABILITY-II</option>
                                                    <option style="background-color: #92D12D;" value="PLNS52">PLNS52 - SKILL ORIENTATION PLANNING</option>


                                                </select>
                                                <br>
                                                <p id="uploadsub">Please valid select File and Subject</p>
                                                <p id="uploadbuttonn"></p>


                                                <script>
                                                    function Uploadfiless() {
                                                        var x = document.getElementById("mySelect").value;
                                                        document.getElementById("uploadbuttonn").innerHTML = "<button type='button' value='Upload File' onclick='" + x + "()' class='uploadbutton'><i class='lni lni-cloud-upload'></i> Upload </button>";
                                                        document.getElementById("uploadsub").innerHTML = "You have Selected " + x;
                                                    }
                                                </script>
                                            </div>

                                            <!-- <div class="top-bottom-padding" style="text-align: center;">
                                                <p>Select Subject</p>
                                                <button type="button" value="Upload File" onclick="CSE205()" class="uploadbutton"><i class="lni lni-cloud-upload"></i> CSE205 </button>
                                                <button type="button" value="Upload File" onclick="CSE211()" class="uploadbutton"><i class="lni lni-cloud-upload"></i> CSE211 </button>
                                                <button type="button" value="Upload File" onclick="CSE320()" class="uploadbutton"><i class="lni lni-cloud-upload"></i> CSE320 </button>
                                                <button type="button" value="Upload File" onclick="INT213()" class="uploadbutton"><i class="lni lni-cloud-upload"></i> INT213 </button>
                                                <button type="button" value="Upload File" onclick="INT306()" class="uploadbutton"><i class="lni lni-cloud-upload"></i> INT306 </button>
                                                <button type="button" value="Upload File" onclick="MTH401()" class="uploadbutton"><i class="lni lni-cloud-upload"></i> MTH401 </button>
                                            </div> -->

                                            <div class="top-bottom-padding">
                                                <progress style="width: 100%;" id="progressBar" value="0" max="100" class="progress"></progress>

                                                <h6 id="status"></h6>
                                                <p id="loaded_n_total"></p>

                                            </div>
                                        </div>
                                    </form>

                                    <hr>
                                    <h5><b>Instruction</b></h5>
                                    <div class="row mt-3">
                                        <div class="col-12 col-lg-12">
                                            <ol>
                                                <li>Give A Proper File Name to Your File</li>
                                                <li>Selcet File Required file</li>
                                                <li>File Size Should be less then 10mb (9.3mb)</li>
                                                <li>Choose Subject Code and Click on Upload</li>
                                                <li>Allowed File formate: JPG, JPEG, PNG, PDF, PPT, PPTX, DOC, and DOCX</li>
                                            </ol>
                                            <h5><b>File Name Demo</b></h5>
                                            <div class="centered">
                                                <p>Explained Image</p>
                                                <img class="demofileimage" src="../assets/filerenamingrule.JPG" alt="demofileimage">
                                                <br><br>
                                                <br>
                                                <p>File Name Should Be</p>
                                                <img class="demofileimage" src="../assets//filename.png" alt="File Name Should Be">
                                            </div>

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


        <!-- sem 3 ---------------------------------------------->
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

            function CSE205() {
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
                ajax.open("POST", "CSE205.php");
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

            function CSE211() {
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
                ajax.open("POST", "CSE211.php");
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

            function CSE320() {
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
                ajax.open("POST", "CSE320.php");
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

            function INT213() {
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
                ajax.open("POST", "INT213.php");
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

            function INT306() {
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
                ajax.open("POST", "INT306.php");
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

            function MTH401() {
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
                ajax.open("POST", "MTH401.php");
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

            function PEL131() {
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
                ajax.open("POST", "PEL131.php");
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

        <!--- sem 3 ends ------------------------->

        <!--- Sem 4 starts ------------------------------------------->

        <script type="text/javascript">
            function _(el) {
                return document.getElementById(el);
            }

            function CSE306() {
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
                ajax.open("POST", "CSE306.php");
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

            function CSE307() {
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
                ajax.open("POST", "CSE307.php");
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

            function CSE310() {
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
                ajax.open("POST", "CSE310.php");
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

            function CSE408() {
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
                ajax.open("POST", "CSE408.php");
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

            function MTH302() {
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
                ajax.open("POST", "MTH302.php");
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

            function CSE316() {
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
                ajax.open("POST", "CSE316.php");
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

            function INT404() {
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
                ajax.open("POST", "INT404.php");
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

            function PEV106() {
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
                ajax.open("POST", "PEV106.php");
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

        <!-- Sem 4 ends ---------------------------------------------->


        <!-- Sem 5 starts ---------------------------------------------->
        <script type="text/javascript">
            function _(el) {
                return document.getElementById(el);
            }

            function CSE322() {
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
                ajax.open("POST", "CSE322.php");
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

            function CSE332() {
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
                ajax.open("POST", "CSE332.php");
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

            function INT219() {
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
                ajax.open("POST", "INT219.php");
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

            function MKT309() {
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
                ajax.open("POST", "MKT309.php");
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

            function PEA305() {
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
                ajax.open("POST", "PEA305.php");
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

            function PEV107() {
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
                ajax.open("POST", "PEV107.php");
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

            function PLNS52() {
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
                ajax.open("POST", "PLNS52.php");
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

        <!-- Sem 5 ends ---------------------------------------------->

        <script>
            //function CSE205() {

            //}
        </script>
        <?php include "../footercredit.php"?>
        <?php include "../footer.php"?>