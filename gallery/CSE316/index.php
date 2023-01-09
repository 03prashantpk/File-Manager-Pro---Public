<?php

include("../../files_counter.php");
include("head.php");
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
    <link href="../../assets/main.css" rel="stylesheet">
    <link rel="icon" href="assets/Fevicon.png" type="image/x-icon">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://unpkg.com/boxicons@2.0.9/dist/boxicons.js"></script>
</head>

<body>

    <?php  include("../../navbar.php"); ?>
    <section>

        <section class="main-section">
            <div class="container">
                <div class="row">
                    <?php include("../../sidebar.php"); ?>
                    <div class="col-12 col-lg-9">
                        <div class="card">
                            <div class="card-body">
                                <h3 style="text-align: center; font-weight: 600; padding-bottom:8px;">CSE216 - Operating System</h3>
                                <div class="fm-search">
                                    <div class="mb-0">
                                        <div class="input-group input-group-lg"> <span class="input-group-text bg-transparent"><i class="lni lni-keyword-research"></i></span>
                                            <input type="text" class="form-control" placeholder="Search the files">
                                        </div>
                                    </div>
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
                                            <p>Loading Please Wait...
                                            <br>
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
                                                <progress value="0" max="10" id="progressBar"></progress>
                                            </p>
                                        </center>
                                    </div>

                                </span>
                                <br><br>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <?php include("../../footercredit.php") ?>

        <?php include("footer.php") ?>