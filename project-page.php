<?php
include("files_counter.php");
include("head.php");

// Total page Visit
$Page_visit_counter_file = "PV_counter.txt";
$total_page_visit = @file_get_contents($Page_visit_counter_file,);
$total_page_visit++;
file_put_contents($Page_visit_counter_file, $total_page_visit);
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
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Gochi+Hand&display=swap" rel="stylesheet">

    <!-- Meta tags ----->
    <meta charset='UTF-8'>
    <meta name="author" content="" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name='keywords' content='K20BN, Notes, File-manager, enally.in, enally, Prashant Kumar Enally, Prashant enally, Project'>
    <meta name="description" content="Enally Files Sharing Platform developed by Prashant Kumar. Share Notes, Softwares, and much more. Why this project? During online classes, we don't use to write notes much because we get them as pdf, ppt or other forms.And students use to ask friends or teachers again and again for notes and other stuff." />
    <meta name="author" content="Prashant Kumar">
    <meta name="copyright" content="Enally.in">



</head>
<style>
    * {
        box-sizing: border-box;
        -moz-box-sizing: border-box;
    }

    #wrap {
        width: 90%;
        max-width: 1100px;
        margin: 50px auto;
    }

    .columns_2 figure {
        width: 49%;
        margin-right: 1%;
    }

    .columns_2 figure:nth-child(2) {
        margin-right: 0;
    }

    .columns_3 figure {
        width: 32%;
        margin-right: 1%;
    }

    .columns_3 figure:nth-child(3) {
        margin-right: 0;
    }

    .columns_4 figure {
        width: 24%;
        margin-right: 1%;
    }

    .columns_4 figure:nth-child(4) {
        margin-right: 0;
    }

    .columns_5 figure {
        width: 19%;
        margin-right: 1%;
    }

    .columns_5 figure:nth-child(5) {
        margin-right: 0;
    }

    #columns figure:hover {
        -webkit-transform: scale(1.1);
        -moz-transform: scale(1.1);
        transform: scale(1.1);
        box-shadow: 0px 19px 19px -3px rgba(0, 0, 0, 0.35);
        -webkit-box-shadow: 0px 19px 19px -3px rgba(0, 0, 0, 0.25);
        -moz-box-shadow: 0px 19px 19px -3px rgba(0, 0, 0, 0.15);
        transition: 0.4s;
    }

    #columns:hover figure:not(:hover) {
        opacity: 0.4;
    }

    div#columns figure {
        display: inline-block;
        background: #FEFEFE;
        border: 2px solid #FAFAFA;
        box-shadow: 0 1px 2px rgba(34, 25, 25, 0.4);
        margin: 0 0px 15px;
        -webkit-column-break-inside: avoid;
        -moz-column-break-inside: avoid;
        padding: 15px;
        padding-bottom: 5px;
        background: -webkit-linear-gradient(45deg, #FFF, #F9F9F9);
        opacity: 1;
        -webkit-transition: all .3s ease;
        -moz-transition: all .3s ease;
        -o-transition: all .3s ease;
        transition: all .3s ease;
    }

    div#columns figure img {
        width: 100%;
        border-bottom: 1px solid #ccc;
        padding-bottom: 15px;
        margin-bottom: 5px;
    }

    div#columns figure figcaption {
        font-size: .9rem;
        color: #444;
        line-height: 1.5;
        height: 60px;
        font-weight: 600;
        text-overflow: ellipsis;
    }

    a.button {
        padding: 10px;
        background: salmon;
        margin: 10px;
        display: block;
        text-align: center;
        color: #fff;
        transition: all 1s linear;
        text-decoration: none;
        text-shadow: 1px 1px 3px rgba(0, 0, 0, 0.3);
        border-radius: 2px;
        border-bottom: 3px solid #ff6536;
        box-shadow: 1px 1px 3px rgba(0, 0, 0, 0.3);
    }

    a.button:hover {
        background: #ff6536;
        border-bottom: 3px solid salmon;
        color: #f1f2f3;
    }

    @media screen and (max-width: 960px) {
        #columns figure {
            width: 24%;
        }
    }

    @media screen and (max-width: 767px) {
        #columns figure {
            width: 32%;
        }
    }

    @media screen and (max-width: 600px) {
        #columns figure {
            width: 49%;
        }
    }

    @media screen and (max-width: 500px) {
        #columns figure {
            width: 100%;
        }
    }

    .product_listing {
        text-align: center;
        text-transform: capitalize;
        font-weight: 600;
    }

    .product_image {
        width: 200px;
        height: 150px;
    }

    .demo {
        background-color: #ff6536;
        color: #fff;
        padding: 2px 6px;
        border-radius: 22px;
    }

    .demo {
        background-color: #ff6536;
        color: #fff;
        padding: 1px 6px;
        border-radius: 6px;
    }

    .italic_texts {
        text-decoration: italic;
        padding: 0 16px;
    }

    .header-image {
        height: 360px;
        background-image: url("https://images.unsplash.com/photo-1520155346-36773ab29479?ixlib=rb-1.2.1&q=80&fm=jpg&crop=entropy&cs=tinysrgb&dl=rafal-jedrzejek-ogrGCU5uSxc-unsplash.jpg");
        /* background-attachment: fixed; */
        background-size: cover;
        background-position: center;
        margin: 0;

    }
</style>

<body>

    <?php include("navbar.php"); ?>
    <section class="main-section">
        <div class="container">
            <div class="row">
                <?php include("sidebar.php"); ?>

                <div class="col-12 col-lg-9">
                    <div class="header-image"> </div>
                    <div class="card" style="border-bottom: 60px #fff5be solid;">
                        <div class="card-body">

                            <!--- Product listing ----->
                            <!-- Verified and upload by admins------------->
                            <h2 class="product_listing">Projects List</h2>
                            <hr style="width: 50%;">
                            <div id="wrap">
                                <h5 class="mb-0">Verified Projects</h5>
                                <br>
                                <div id="columns" class="columns_4">
                                    <figure>
                                        <img class="product_image" src="https://cdn.britannica.com/63/211663-050-A674D74C/Jonny-Bairstow-batting-semifinal-match-England-Australia-2019.jpg">
                                        <figcaption>Cricket Score Board - Python</figcaption>
                                        <span class="price">₹ 700</span>
                                        <a class="button" href="https://pmny.in/eIBdZnnQugTB">Buy Now</a>
                                    </figure>

                                    <figure>
                                        <img class="product_image" src="https://www.regalocasila.com/image/cache/data/wooden-multi-photo-9-picture-collage-frame-pro-img-600x600.jpg">
                                        <figcaption>Multi Image Downloader - Python</figcaption>
                                        <span class="price">₹ 990 <span><a class="demo" href="https://youtu.be/4ge-6IwzrQU"> Demo</a></span></span>
                                        <a class="button" href="https://pmny.in/tIPPyrsQ11ke">Buy Now</a>
                                    </figure>

                                    <figure>
                                        <img class="product_image" src="https://enally.in/files-manager/assets/images/botimg10.JPG">
                                        <figcaption>MyClass Bot - Python</figcaption>
                                        <span class="price">₹? <a class="demo" href="https://enally.in/files-manager/myclassbot">See</a></span>
                                        <a class="button" href="https://enally.in/files-manager/myclassbot">Download</a>
                                    </figure>

                                    <figure>
                                        <img class="product_image" src="https://img.freepik.com/free-vector/upcoming-events-poster-background-design-yellow-backdrop-with-bright-spotlight_7102-194.jpg?size=338&ext=jpg">
                                        <figcaption>Confidential</figcaption>
                                        <span class="price">₹0</span>
                                        <!-- <a class="button" href="#">Buy Now</a> -->
                                        <br><br>
                                        <p class="button"> Upcoming </p>
                                    </figure>
                                </div>
                            </div>
                            <!-- Verified and upload by admins /------------->

                            <h5>Folders</h5>

                            <?php
                            if (!isset($_SESSION['UserData']['Username'])) {
                                echo '
                                <div class="alert alert-warning alert-dismissible fade show shadow-sm" role="alert">
                                <strong>Tips!</strong> Login to enable download links and get access to all the free projects.
                            </div>
                                ';
                            }
                            ?>



                            <div class="row mt-3 buttons">
                                <div class="col-12 col-lg-4">
                                    <div id="play" class="card border radius-15 shadowhover" style="cursor: pointer;" onclick="window.location.href='pgallery/webdev/'">
                                        <div class="card-body">
                                            <div class="d-flex align-items-center">
                                                <div class="font-30 text-primary"><i class="lni lni-folder"></i>
                                                </div>
                                                <div class="user-groups ms-auto">
                                                    <img src="https://media-exp1.licdn.com/dms/image/C4E03AQGLKMs9FnYLbg/profile-displayphoto-shrink_400_400/0/1632072899529?e=1640217600&v=beta&t=hD92zXuEQ0IIDbTztkHLdbboDg7qoD1XrvfTobGN8x8" width="35" height="35" class="rounded-circle" alt="">
                                                    <img src="https://bootdey.com/img/Content/avatar/avatar2.png" width="35" height="35" class="rounded-circle" alt="">
                                                </div>
                                                <div class="user-plus">+</div>
                                            </div>
                                            <h6 class="mb-0 text-primary">Web Development</h6>
                                            <small># Projects</small>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-12 col-lg-4">
                                    <div class="card border radius-15 shadowhover" style="cursor: pointer;" onclick="window.location.href='pgallery/ccpp/'">
                                        <div class="card-body">
                                            <div class="d-flex align-items-center">
                                                <div class="font-30 text-primary"><i class="lni lni-folder"></i>
                                                </div>
                                                <div class="user-groups ms-auto">
                                                    <img src="https://i.ibb.co/2dgfQVT/circleprofile.png" width="35" height="35" class="rounded-circle" alt="">
                                                </div>
                                            </div>
                                            <h6 class="mb-0 text-primary">C & C++</h6>
                                            <small># Projects</small>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-12 col-lg-4">
                                    <div class="card border radius-15 shadowhover" style="cursor: pointer;" onclick="window.location.href='pgallery/python/'">
                                        <div class="card-body">
                                            <div class="d-flex align-items-center">
                                                <div class="font-30 text-primary"><i class="lni lni-folder"></i>
                                                </div>
                                                <div class="user-groups ms-auto">
                                                    <img src="https://bootdey.com/img/Content/avatar/avatar2.png" width="35" height="35" class="rounded-circle" alt="">
                                                    <img src="https://bootdey.com/img/Content/avatar/avatar3.png" width="35" height="35" class="rounded-circle" alt="">
                                                </div>
                                            </div>
                                            <h6 class="mb-0 text-primary">Python</h6>
                                            <small># Projects</small>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-12 col-lg-4">
                                    <div class="card border radius-15 shadowhover" style="cursor: pointer;" onclick="window.location.href='pgallery/dbms_sql/'">
                                        <div class="card-body">
                                            <div class="d-flex align-items-center">
                                                <div class="font-30 text-primary"><i class="lni lni-folder"></i>
                                                </div>
                                                <div class="user-groups ms-auto">
                                                    <img src="https://media-exp1.licdn.com/dms/image/C4E03AQGLKMs9FnYLbg/profile-displayphoto-shrink_400_400/0/1632072899529?e=1640217600&v=beta&t=hD92zXuEQ0IIDbTztkHLdbboDg7qoD1XrvfTobGN8x8" width="35" height="35" class="rounded-circle" alt="">
                                                    <img src="https://bootdey.com/img/Content/avatar/avatar2.png" width="35" height="35" class="rounded-circle" alt="">
                                                </div>
                                                <div class="user-plus">+</div>
                                            </div>
                                            <h6 class="mb-0 text-primary">DBMS & SQL</h6>
                                            <small># Projects</small>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-12 col-lg-4">
                                    <div class="card border radius-15 shadowhover" style="cursor: pointer;" onclick="window.location.href='pgallery/java/'">
                                        <div class="card-body">
                                            <div class="d-flex align-items-center">
                                                <div class="font-30 text-primary"><i class="lni lni-folder"></i>
                                                </div>
                                                <div class="user-groups ms-auto">
                                                    <img src="https://i.ibb.co/2dgfQVT/circleprofile.png" width="35" height="35" class="rounded-circle" alt="">
                                                </div>
                                            </div>
                                            <h6 class="mb-0 text-primary">Java</h6>
                                            <small># Projects</small>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-12 col-lg-4">
                                    <div class="card border radius-15 shadowhover" style="cursor: pointer;" onclick="window.location.href='pgallery/php/'">
                                        <div class="card-body">
                                            <div class="d-flex align-items-center">
                                                <div class="font-30 text-primary"><i class="lni lni-folder"></i>
                                                </div>
                                                <div class="user-groups ms-auto">
                                                    <img src="https://bootdey.com/img/Content/avatar/avatar2.png" width="35" height="35" class="rounded-circle" alt="">
                                                    <img src="https://bootdey.com/img/Content/avatar/avatar3.png" width="35" height="35" class="rounded-circle" alt="">
                                                </div>
                                            </div>
                                            <h6 class="mb-0 text-primary">PHP</h6>
                                            <small># Projects</small>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-12 col-lg-4">
                                    <div class="card border radius-15 shadowhover" style="cursor: pointer;" onclick="window.location.href='pgallery/others/'">
                                        <div class="card-body">
                                            <div class="d-flex align-items-center">
                                                <div class="font-30 text-primary"><i class="lni lni-folder"></i>
                                                </div>
                                                <div class="user-groups ms-auto">
                                                    <img src="https://bootdey.com/img/Content/avatar/avatar2.png" width="35" height="35" class="rounded-circle" alt="">
                                                    <img src="https://bootdey.com/img/Content/avatar/avatar3.png" width="35" height="35" class="rounded-circle" alt="">
                                                </div>
                                            </div>
                                            <h6 class="mb-0 text-primary" style="text-transform: uppercase;">Others</h6>
                                            <small># Misc Projects</small>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-12 col-lg-4">
                                    <div class="card border radius-15 shadowhover" style="cursor: pointer;" onclick="window.location.href='pgallery/che110pp/'">
                                        <div class="card-body">
                                            <div class="d-flex align-items-center">
                                                <div class="font-30 text-primary"><i class="lni lni-folder"></i>
                                                </div>
                                                <div class="user-groups ms-auto">
                                                    <img src="https://bootdey.com/img/Content/avatar/avatar2.png" width="35" height="35" class="rounded-circle" alt="">
                                                    <img src="https://bootdey.com/img/Content/avatar/avatar3.png" width="35" height="35" class="rounded-circle" alt="">
                                                </div>
                                            </div>
                                            <h6 class="mb-0 text-primary" style="text-transform: uppercase;">CHE110 - Presentations</h6>
                                            <small># Presentations </small>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <h5 style="padding: 0 8px;"># Important Notice</h5>
                            <p class="italic_texts">*Note: Enter Your Primary Email and Phone Number While Making Transection. We may use it for Varification.</p>


                            <br>
                            <h5>My Other Projects</h5>
                            <br>
                            <div class="card">

                                <?php

                                $project_number = rand(1, 5);

                                if ($project_number == 1) {
                                    echo "<p class='project_css'>Project: 1/5 - File Manager</p>";
                                    $purl = "https://www.youtube.com/embed/gXUOYqvKtm4";
                                } else if ($project_number == 2) {
                                    echo "<p class='project_css'>Project: 2/5 - Pair Game</p>";
                                    $purl = "https://www.youtube.com/embed/GI_spfP4Z1E";
                                } else if ($project_number == 3) {
                                    echo "<p class='project_css'>Project: 3/5 - Bulk Image Downloader</p>";
                                    $purl = "https://www.youtube.com/embed/4ge-6IwzrQU";
                                } else if ($project_number == 4) {
                                    echo "<p class='project_css'>Project: 4/5 - WebApp</p>";
                                    $purl = "https://www.youtube.com/embed/skc-bR90Cro";
                                } else if ($project_number == 5) {
                                    echo "<p class='project_css'>Project: 5/5 - MyClass Bot</p>";
                                    $purl = "https://www.youtube.com/embed/nCiRPV4wMkA";
                                }
                                ?>

                                <iframe class="shadow" height="457" style="border-radius: 12px;" src="<?php echo $purl ?>" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
                            </div>
                            <p style="text-align: center;"><i>Reload page for new video</i></p>
                        </div>
                    </div>
                </div>
            </div>
    </section>


    <?php include("footercredit.php") ?>

    <!---- Footers End ---->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script>
        function getVote(int) {
            var xmlhttp = new XMLHttpRequest();
            xmlhttp.onreadystatechange = function() {
                if (this.readyState == 4 && this.status == 200) {
                    document.getElementById("poll").innerHTML = this.responseText;
                }
            }
            xmlhttp.open("GET", "vote.php?vote=" + int, true);
            xmlhttp.send();
        }
    </script>

    <script>
        var playBtn = document.getElementById('play'),
            resetBtn = document.getElementById('reset'),
            hearbeat = document.getElementById('heartbeat')
        audios = document.querySelectorAll('audio');
        console.log(audios);


        playBtn.addEventListener('mouseover', function() {
            [].forEach.call(audios, function(audio) {
                // do whatever
                audio.play();
            });
        }, false);

        playBtn.addEventListener('mouseleave', function() {
            heartbeat.pause();
            heartbeat.currentTime = 0;
        }, false);

        resetBtn.addEventListener('mouseover', function() {
            heartbeat.play();
        }, false);

        resetBtn.addEventListener('mouseleave', function() {
            heartbeat.pause();
            heartbeat.currentTime = 0;
        }, false);
    </script>

    <?php include("footer.php") ?>