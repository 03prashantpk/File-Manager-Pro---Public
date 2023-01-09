<?php
error_reporting(0);
session_start(); /* Starts the session */
if (!isset($_SESSION['UserData']['Username'])) {
    header("location:login.php");
    exit;
}

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



?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>Classroom Bucket - Enally</title>
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
</head>

<body>

    <?php include("navbar.php") ?>
    <section>

        <section class="main-section">
            <div class="container">
                <div class="row">
                    <?php include("sidebar.php"); ?>

                    <div class="col-12 col-lg-9">
                        <div class="card" style="border-bottom: 60px #fff5be solid;">
                            <h3 style="text-align: center; font-weight: 600; padding:20px;">Request Notes</h3>
                            <div class="card-body center">

                                <div class="col-12 col-lg-12">
                                    <form method="POST">
                                        <div class="upload-file">
                                            <div id="name-group" class="form-group">
                                                <label for="name">Your Name</label>
                                                <input required type="text" class="form-control" id="Requested_by_name" name="Requested_by_name" placeholder="Full Name" />
                                            </div>

                                            <div id="email-group" class="form-group">
                                                <label for="email">Request Notes From</label>
                                                <input required type="text" class="form-control" id="Requested_from_email" name="Requested_from_email" placeholder="yourfriend@email.com" />
                                            </div>

                                            <div id="superhero-group" class="form-group">
                                                <label for="superheroAlias">Subject Name</label>
                                                <input required type="text" class="form-control" id="Requested_for_subject" name="Requested_for_subject" placeholder="Subject name with subject code." />
                                            </div>

                                            <div id="superhero-group" class="form-group">
                                                <label for="superheroAlias">Short Message</label>
                                                <input required type="text" list="prefilled" class="form-control" id="message" name="message" placeholder="Sir, I need unit 6 topic name 'or' Hey can you please send topic..." />
                                                <datalist id="prefilled">
                                                    <option value="I need CSE211 Unit 2 ppt">I need CSE211 Unit 2 ppt</option>
                                                    <option value="Unit 3 It handwritten it would be better. Thanks in Advance">Unit 3 It handwritten it would be better. Thanks in Advance</option>
                                                    <option value="Unit 4 - PPT">Unit 4 - PPT</option>
                                                </datalist>
                                            </div>
                                            <div id="superhero-group" class="form-group">
                                                <label for="superheroAlias">Choose Theme</label>

                                                <select required class="form-control" name="theme" id="theme">
                                                    <option value="">Choose Theme</option>
                                                    <option value="1">LPU Theme 1</option>
                                                    <option value="2">LPU Theme 2</option>
                                                    <option value="3">LPU Theme 3</option>
                                                    <option value="4">LPU Theme 4</option>
                                                    <option value="5">LPU Theme 5</option>
                                                    <option value="6">Study Table Theme</option>
                                                </select>
                                            </div>

                                            <a type="button" onclick="myFunction()" id="btn_submit2" class="shadow-lg btn btn-primary btn23 border border-light">Send Request <span class="iconify" data-icon="bx:bx-mail-send"></span></a>
                                        </div>

                                        <?php

                                        // $Requested_by_name = $_POST["Requested_by_name"];
                                        // $Requested_from_email = $_POST["Requested_from_email"];
                                        // $Requested_for_subject = $_POST["Requested_for_subject"];

                                        ?>

                                    </form>
                                    <br>
                                    <!-- <p id="demo" style="color: #fff;">Email Sent Successfully!</p> -->
                                    <span class="field_error" id="requested_success"></span>
                                    <p id="btn_submit2"></p>
                                </div>

                                <div class="card">
                                    <div class="card-body" style="text-align:center; background-color: #FEDC8B; border-radius: 4px;">
                                        <img src="https://image.freepik.com/free-photo/light-bulb-with-great-idea-text-yellow-background_23-2147865547.jpg" width="320px" style="float: left;" alt="announcement">
                                        <br>
                                        <h5 style="font-weight: 600; font-size: 36px; font-family: 'Gochi Hand', cursive;">Launching New Platform "LPU - Assignments & Doubts Helper"</h5>
                                        <hr>
                                        <p class="req">Join Me. If you're interested! <br>Requirements: HTML, CSS, JS, PHP, MSQL, POD, JQuery and Ajax</p>
                                        <div class="mt-3"></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <script>
            function myFunction() {
                jQuery('#requested_success').html('');
                var Requested_by_name = jQuery('#Requested_by_name').val();
                var Requested_from_email = jQuery('#Requested_from_email').val();
                var Requested_for_subject = jQuery('#Requested_for_subject').val();
                var message = jQuery('#message').val();
                var theme = jQuery('#theme').val();

                if (Requested_by_name == '') {
                    jQuery('#requested_success').html('Please Enter a Name');
                } else if (Requested_from_email == '') {
                    jQuery('#requested_success').html('Please Enter an Email');
                } else if (Requested_for_subject == '') {
                    jQuery('#requested_success').html('Please Enter a Subject');
                } else if (message == '') {
                    jQuery('#requested_success').html('Please Enter your message');
                } else if (theme == '') {
                    jQuery('#requested_success').html('Please Choose a Theme');

                } else {
                    jQuery('#btn_submit2').html('Please wait...');
                    jQuery('#btn_submit2').attr('disabled', true);
                    jQuery.ajax({
                        url: 'file_uploaded.php',
                        type: 'POST',
                        data: 'Requested_by_name=' + Requested_by_name + '&Requested_from_email=' + Requested_from_email + '&Requested_for_subject=' + Requested_for_subject + '&message=' + message + '&theme=' + theme,
                        success: function(result) {
                            jQuery('#Requested_by_name').val('');
                            jQuery('#Requested_from_email').val('');
                            jQuery('#Requested_for_subject').val('');
                            jQuery('#message').val('');
                            jQuery('#theme').val('');
                            jQuery('#requested_success').html(result);
                            jQuery('#btn_submit2').html('Submit');
                            jQuery('#btn_submit2').attr('disabled', false);
                        }
                    })
                }
            }
        </script>


        <!---- Footers End ---->
        <script language="javascript" type="text/javascript">
            var timeout = setInterval(reloadChat, 900);

            function reloadChat() {

                $('#totalpg').load('totalpageview.php');
            }
        </script>



        <!-- <button onclick="myFunction()">Try it</button> -->

        <!-- <script>
            function myFunction() {
                var x = document.getElementById("demo");
                x.style.color = "red";
            }
        </script> -->

        <!-- <script>
            $("#requestnotes").submit(function(e) {
                e.preventDefault();

                var name = $("#Requested_by_name").val();
                var email = $("#Requested_from_email").val();
                var subject = $("#Requested_for_subject").val();
                var message = $("#message").val();
                var theme = $("#theme").val();

                if (name == "" || comment == "") {
                    $("#error_message").show().html("All Fields are Required");
                } else {
                    $("#error_message").html("").hide();
                    $.ajax({
                        type: "POST",
                        url: "file_uploaded.php",
                        data: "Requested_by_name=" + name + "&Requested_from_email=" + email + "&Requested_for_subject=" + subject,
                        success: function(data) {
                            $('#success_message').fadeIn().html(data);
                            setTimeout(function() {
                                $('#success_message').fadeOut("slow");
                            }, 2000);

                        }
                    });
                }
            })
        </script> -->



        <!-- <script>
            $(document).ready(function() {
                $("form").submit(function(event) {

                    var formData = {
                        name: $("#Requested_by_name").val(),
                        email: $("#Requested_from_email").val(),
                        subject: $("#Requested_for_subject").val(),
                        message: $("#message").val(),
                        theme: $("#theme").val(),
                    };


                    $.ajax({
                            type: "POST",
                            url: "file_uploaded.php",
                            data: formData,
                            dataType: "json",
                            encode: true,
                        })
                        .done(function(data) {
                            console.log(data);
                            if (console.log(data) == " ") {
                                document.getElementById("success").innerHTML = "Success!";
                            }


                        });
                    event.preventDefault();

                });
            });
        </script> -->

        <script>
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

        <script>
            //function CSE205() {

            //}
        </script>
        <?php include("footercredit.php") ?>
        <?php include("../footer.php") ?>