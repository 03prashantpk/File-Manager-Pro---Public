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
    <title>Classroom Bucket - Home</title>
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
    <link href="https://enally.in/files-manager/assets/main.css" rel="stylesheet">
    <link rel="icon" href="https://enally.in/files-manager/assets/Fevicon.png" type="image/x-icon">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://unpkg.com/boxicons@2.0.9/dist/boxicons.js"></script>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Gochi+Hand&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://unpkg.com/aos@next/dist/aos.css" />
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous" />


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
    <script async src="https://pagead2.googlesyndication.com/pagead/js/adsbygoogle.js?client=ca-pub-7927904998579486"
     crossorigin="anonymous"></script>
</head>

<body>

    <?php include("navbar.php"); ?>
    <section class="main-section">
        <div class="container">
            <div class="row">
                <?php include("sidebar.php"); ?>
                <div class="col-12 col-lg-9">
                    <div class="card">
                        <div class="card-body">
                            <div class="fm-search" hidden>
                                <div class="mb-0">
                                    <div class="input-group input-group-lg"> <span class="input-group-text bg-transparent"><i class="lni lni-keyword-research"></i></span>
                                        <input type="text" class="form-control" placeholder="Search the files">
                                    </div>
                                </div>
                            </div>

                            <div class="alert alert-info alert-dismissible fade show shadow-sm" role="alert">
                                <strong>New Update!</strong> Download MyClass Bot - <a href="https://enally.in/files-manager/myclassbot">Click Here to View</a>.
                            </div>
                            <!-- <div class="alert alert-info alert-dismissible fade show shadow-sm" role="alert">
                                <strong>New Message!</strong> Classroom Bucket Mobile App has new update available.
                            </div> -->

                            <?php
                            if (!isset($_SESSION['UserData']['Username'])) {
                                echo '
                                <div class="alert alert-danger alert-dismissible fade show shadow-sm" role="alert">
                                <strong>Recommended!</strong> Please login to Unlock more features. <a href="https://enally.in/files-manager/subscribe-us">How to get login details? <span class="iconify" data-icon="ic:baseline-open-in-new"></span></a></b>
                            </div>
                            <br>
                                ';
                            }
                            ?>

                            <div class="row mt-3">
                                <div class="col-12 col-lg-4" >
                                    <div class="card border radius-15 hovershadowout">
                                        <div class="card-body">
                                            <div class="d-flex align-items-center">
                                                <div class="fm-icon-box radius-15 bg-primary text-white"><i class="lni lni-google-drive"></i>
                                                </div>
                                                <div class="ms-auto font-24"><i class="fa fa-ellipsis-h"></i>
                                                </div>
                                            </div>
                                            <h5 class="mt-3 mb-0">Google Drive</h5>
                                            <p style="font-size: 12px;">Not Ready</p>
                                            <p class="mb-1 mt-4"><span>45.5 GB</span> <span class="float-end">50 GB</span>
                                            </p>
                                            <div class="progress" style="height: 7px;">
                                                <div class="progress-bar bg-primary" role="progressbar" style="width: 75%;" aria-valuenow="75" aria-valuemin="0" aria-valuemax="100"></div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-12 col-lg-4" onclick="location.href='https://www.youtube.com/channel/UCUh3A9fQkuTRtmVVRf3O_Ng'">
                                    <div class="card border radius-15 hovershadowout">
                                        <div class="card-body">
                                            <div class="d-flex align-items-center">
                                                <div class="fm-icon-box radius-15 bg-danger text-white"><i class="lni lni-youtube"></i>
                                                </div>
                                                <div class="ms-auto font-24"><i class="fa fa-ellipsis-h"></i>
                                                </div>
                                            </div>
                                            <h5 class="mt-3 mb-0">YouTube</h5>
                                            <p style="font-size: 12px;">Temporarily Active</p>
                                            <p class="mb-1 mt-4"><span>Watch Now</span> <span class="float-end"><a href="https://www.youtube.com/channel/UCUh3A9fQkuTRtmVVRf3O_Ng?sub_confirmation=1&feature=subscribe-embed-click">Subscribe</a></span>
                                            </p>
                                            <div class="progress" style="height: 7px;">
                                                <div class="progress-bar bg-danger" role="progressbar" style="width: 45%;" aria-valuenow="55" aria-valuemin="0" aria-valuemax="100"></div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-12 col-lg-4" onclick="location.href='https://github.com/03prashantpk'">
                                    <div class="card border radius-15 hovershadowout">
                                        <div class="card-body">
                                            <div class="d-flex align-items-center">
                                                <div class="fm-icon-box radius-15 bg-warning text-dark"><i class="lni lni-github-original"></i>
                                                </div>
                                                <div class="ms-auto font-24"><i class="fa fa-ellipsis-h"></i>
                                                </div>
                                            </div>
                                            <h5 class="mt-3 mb-0">Github</h5>
                                            <p style="font-size: 12px;">Temporarily Active</p>
                                            <p class="mb-1 mt-4"><span>Only Public Repositories</span> <span class="float-end"></span>
                                            </p>
                                            <div class="progress" style="height: 7px;">
                                                <div class="progress-bar bg-warning" role="progressbar" style="width: 65%;" aria-valuenow="65" aria-valuemin="0" aria-valuemax="100"></div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!--end row-->
                            <br>
                            <h5>Download Projects</h5>
                            <div class="card">
                                <div class="card-body" style="text-align:center; background-color: #74C1ED; border-radius: 4px;">
                                    <span class="image_on_mob">
                                        <img class="image_on_mob" src="https://media1.giphy.com/media/OatYTMZ3cW8Bq/source.gif" style="object-fit: cover; object-position: 70% 90%;float: left;" width="320px" alt="announcement">

                                    </span>
                                    <br>
                                    <h5 style="font-weight: 600; font-size: 36px; font-family: 'Gochi Hand', cursive;">Download Projects</h5>
                                    <hr>
                                    <p class="req2">Projets Developed by Graduates and Undergraduates <br>Language: C, C++, Java, Python, HTML, CSS, JS, PHP, MSQL, POD, JQuery, Ajax and more</p>
                                    <div class="float_to_right"> <a style="text-decoration: none;" href="project-page" class="project_btn"> Download Projects <span class="iconify" data-icon="bx:bxs-cart-download"></span></a> </div>
                                </div>
                            </div>


                            <h5><strong>REAPPEAR</strong> or <strong>IMPROVEMENT</strong></h5>
                            <div class="card">
                                <div class="card-body" id="ete_mcq_ads" style="text-align:center; background-color: #FFFA9F; border-radius: 4px;">
                                    <span class="image_on_mob">
                                        <img class="image_on_mob" src="https://enally.in/files-manager/assets/exams.png" style="object-fit: cover; object-position: 70% 90%;float: left;" width="320px" alt="announcement">
                                    </span>
                                    <br>
                                    <h5 style="font-weight: 600; font-size: 36px; font-family: 'Gochi Hand', cursive;">ETE MCQ's - Reapper and Improvement</h5>
                                    <hr>
                                    <p class="req2">Download MTE, ETE, CA's and other MCQ's with answer. Important DOC's for Reappear and Improvement Exams.</p>
                                    <div class="float_to_right"> <a style="text-decoration: none;" href="https://enally.in/files-manager/gallery/Helper/" class="project_btn"> Download <span class="iconify" data-icon="akar-icons:download"></span></a> </div>
                                </div>
                            </div>

                            <h5>Choose Semester</h5>

                            <!-- Sem -5 -->
                            <div style="height: 4px;"></div>

                            <button  class="accordion">B-Tech - Semester 5 <span class="spiin" style="float: right;"><span class="iconify" data-icon="ant-design:plus-outlined"></span></span></button>
                            <div class="panel" >
                                <div class="row mt-3">

                                    <div class="col-12 col-lg-4">
                                        <div class="card border radius-15 shadowhover" style="cursor: pointer;" onclick="window.location.href='gallery/CSE322/'">
                                            <div class="card-body">
                                                <div class="d-flex align-items-center">
                                                    <div class="font-30 text-primary"><i class="lni lni-folder"></i>
                                                    </div>
                                                    <div class="user-groups ms-auto">
                                                        <img src="https://w7.pngwing.com/pngs/178/419/png-transparent-man-illustration-computer-icons-avatar-login-user-avatar-child-web-design-face-thumbnail.png" width="35" height="35" class="rounded-circle" alt="">
                                                        <img src="https://bootdey.com/img/Content/avatar/avatar2.png" width="35" height="35" class="rounded-circle" alt="">
                                                    </div>
                                                    <div class="user-plus">+</div>
                                                </div>
                                                <h6 class="mb-0 text-primary">CSE322 - FLAT </h6>
                                                <small># FORMAL LANGUAGES AND AUTOMATION THEORY </small>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-12 col-lg-4">
                                        <div class="card border radius-15 shadowhover" style="cursor: pointer;" onclick="window.location.href='gallery/CSE332/'">
                                            <div class="card-body">
                                                <div class="d-flex align-items-center">
                                                    <div class="font-30 text-primary"><i class="lni lni-folder"></i>
                                                    </div>
                                                    <div class="user-groups ms-auto">
                                                        <img src="https://w7.pngwing.com/pngs/178/419/png-transparent-man-illustration-computer-icons-avatar-login-user-avatar-child-web-design-face-thumbnail.png" width="35" height="35" class="rounded-circle" alt="">
                                                        <img src="https://bootdey.com/img/Content/avatar/avatar2.png" width="35" height="35" class="rounded-circle" alt="">
                                                    </div>
                                                    <div class="user-plus">+</div>
                                                </div>
                                                <h6 class="mb-0 text-primary">CSE332 - IELI</h6>
                                                <small># INDUSTRY ETHICS AND LEGAL ISSUES</small>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-12 col-lg-4">
                                        <div class="card border radius-15 shadowhover" style="cursor: pointer;" onclick="window.location.href='gallery/INT219/'">
                                            <div class="card-body">
                                                <div class="d-flex align-items-center">
                                                    <div class="font-30 text-primary"><i class="lni lni-folder"></i>
                                                    </div>
                                                    <div class="user-groups ms-auto">
                                                        <img src="https://w7.pngwing.com/pngs/178/419/png-transparent-man-illustration-computer-icons-avatar-login-user-avatar-child-web-design-face-thumbnail.png" width="35" height="35" class="rounded-circle" alt="">
                                                        <img src="https://bootdey.com/img/Content/avatar/avatar2.png" width="35" height="35" class="rounded-circle" alt="">
                                                    </div>
                                                    <div class="user-plus">+</div>
                                                </div>
                                                <h6 class="mb-0 text-primary">INT219 - FRONTEND</h6>
                                                <small># FRONT END WEB DEVELOPER </small>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-12 col-lg-4">
                                        <div class="card border radius-15 shadowhover" style="cursor: pointer;" onclick="window.location.href='gallery/MKT309/'">
                                            <div class="card-body">
                                                <div class="d-flex align-items-center">
                                                    <div class="font-30 text-primary"><i class="lni lni-folder"></i>
                                                    </div>
                                                    <div class="user-groups ms-auto">
                                                        <img src="https://i.ibb.co/2dgfQVT/circleprofile.png" width="35" height="35" class="rounded-circle" alt="">
                                                    </div>
                                                </div>
                                                <h6 class="mb-0 text-primary">MKT309 - DM</h6>
                                                <small># DIGITAL MARKETING </small>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-12 col-lg-4">
                                        <div class="card border radius-15 shadowhover" style="cursor: pointer;" onclick="window.location.href='gallery/PEA305/'">
                                            <div class="card-body">
                                                <div class="d-flex align-items-center">
                                                    <div class="font-30 text-primary"><i class="lni lni-folder"></i>
                                                    </div>
                                                    <div class="user-groups ms-auto">
                                                        <img src="https://i.ibb.co/2dgfQVT/circleprofile.png" width="35" height="35" class="rounded-circle" alt="">
                                                    </div>
                                                </div>
                                                <h6 class="mb-0 text-primary">PEA305 - ANALYTICAL</h6>
                                                <small># ANALYTICAL SKILLS-I </small>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-12 col-lg-4">
                                        <div class="card border radius-15 shadowhover" style="cursor: pointer;" onclick="window.location.href='gallery/PEV107/'">
                                            <div class="card-body">
                                                <div class="d-flex align-items-center">
                                                    <div class="font-30 text-primary"><i class="lni lni-folder"></i>
                                                    </div>
                                                    <div class="user-groups ms-auto">
                                                        <img src="https://i.ibb.co/2dgfQVT/circleprofile.png" width="35" height="35" class="rounded-circle" alt="">
                                                    </div>
                                                </div>
                                                <h6 class="mb-0 text-primary">PEV107 - VERBAL ABILITY</h6>
                                                <small># VERBAL ABILITY-II </small>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-12 col-lg-4">
                                        <div class="card border radius-15 shadowhover" style="cursor: pointer;" onclick="window.location.href='gallery/PLNS52/'">
                                            <div class="card-body">
                                                <div class="d-flex align-items-center">
                                                    <div class="font-30 text-primary"><i class="lni lni-folder"></i>
                                                    </div>
                                                    <div class="user-groups ms-auto">
                                                        <img src="https://bootdey.com/img/Content/avatar/avatar2.png" width="35" height="35" class="rounded-circle" alt="">
                                                        <img src="https://bootdey.com/img/Content/avatar/avatar3.png" width="35" height="35" class="rounded-circle" alt="">
                                                    </div>
                                                </div>
                                                <h6 class="mb-0 text-primary">PLNS52 - SO&P</h6>
                                                <small># SKILL ORIENTATION - PLANNING  </small>
                                            </div>
                                        </div>
                                    </div>

                                </div>
                            </div>

                            <!-- Sem -4 -->
                            <div style="height: 4px;"></div>

                            <button  class="accordion">B-Tech - Semester 4 <span class="spiin" style="float: right;"><span class="iconify" data-icon="ant-design:plus-outlined"></span></span></button>
                            <div class="panel" >
                                <div class="row mt-3">

                                    <div class="col-12 col-lg-4">
                                        <div class="card border radius-15 shadowhover" style="cursor: pointer;" onclick="window.location.href='gallery/CSE306/'">
                                            <div class="card-body">
                                                <div class="d-flex align-items-center">
                                                    <div class="font-30 text-primary"><i class="lni lni-folder"></i>
                                                    </div>
                                                    <div class="user-groups ms-auto">
                                                        <img src="https://w7.pngwing.com/pngs/178/419/png-transparent-man-illustration-computer-icons-avatar-login-user-avatar-child-web-design-face-thumbnail.png" width="35" height="35" class="rounded-circle" alt="">
                                                        <img src="https://bootdey.com/img/Content/avatar/avatar2.png" width="35" height="35" class="rounded-circle" alt="">
                                                    </div>
                                                    <div class="user-plus">+</div>
                                                </div>
                                                <h6 class="mb-0 text-primary">CSE306 - CN </h6>
                                                <small># COMPUTER NETWORKS</small>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-12 col-lg-4">
                                        <div class="card border radius-15 shadowhover" style="cursor: pointer;" onclick="window.location.href='gallery/CSE307/'">
                                            <div class="card-body">
                                                <div class="d-flex align-items-center">
                                                    <div class="font-30 text-primary"><i class="lni lni-folder"></i>
                                                    </div>
                                                    <div class="user-groups ms-auto">
                                                        <img src="https://w7.pngwing.com/pngs/178/419/png-transparent-man-illustration-computer-icons-avatar-login-user-avatar-child-web-design-face-thumbnail.png" width="35" height="35" class="rounded-circle" alt="">
                                                        <img src="https://bootdey.com/img/Content/avatar/avatar2.png" width="35" height="35" class="rounded-circle" alt="">
                                                    </div>
                                                    <div class="user-plus">+</div>
                                                </div>
                                                <h6 class="mb-0 text-primary">CSE307 - NE</h6>
                                                <small># INTERNETWORKING ESSENTIALS</small>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-12 col-lg-4">
                                        <div class="card border radius-15 shadowhover" style="cursor: pointer;" onclick="window.location.href='gallery/CSE310/'">
                                            <div class="card-body">
                                                <div class="d-flex align-items-center">
                                                    <div class="font-30 text-primary"><i class="lni lni-folder"></i>
                                                    </div>
                                                    <div class="user-groups ms-auto">
                                                        <img src="https://w7.pngwing.com/pngs/178/419/png-transparent-man-illustration-computer-icons-avatar-login-user-avatar-child-web-design-face-thumbnail.png" width="35" height="35" class="rounded-circle" alt="">
                                                        <img src="https://bootdey.com/img/Content/avatar/avatar2.png" width="35" height="35" class="rounded-circle" alt="">
                                                    </div>
                                                    <div class="user-plus">+</div>
                                                </div>
                                                <h6 class="mb-0 text-primary">CSE310 - JAVA</h6>
                                                <small># PROGRAMMING IN JAVA</small>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-12 col-lg-4">
                                        <div class="card border radius-15 shadowhover" style="cursor: pointer;" onclick="window.location.href='gallery/CSE408/'">
                                            <div class="card-body">
                                                <div class="d-flex align-items-center">
                                                    <div class="font-30 text-primary"><i class="lni lni-folder"></i>
                                                    </div>
                                                    <div class="user-groups ms-auto">
                                                        <img src="https://i.ibb.co/2dgfQVT/circleprofile.png" width="35" height="35" class="rounded-circle" alt="">
                                                    </div>
                                                </div>
                                                <h6 class="mb-0 text-primary">CSE408 - DAA</h6>
                                                <small># DESIGN AND ANALYSIS OF ALGORITHMS</small>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-12 col-lg-4">
                                        <div class="card border radius-15 shadowhover" style="cursor: pointer;" onclick="window.location.href='gallery/MTH302/'">
                                            <div class="card-body">
                                                <div class="d-flex align-items-center">
                                                    <div class="font-30 text-primary"><i class="lni lni-folder"></i>
                                                    </div>
                                                    <div class="user-groups ms-auto">
                                                        <img src="https://i.ibb.co/2dgfQVT/circleprofile.png" width="35" height="35" class="rounded-circle" alt="">
                                                    </div>
                                                </div>
                                                <h6 class="mb-0 text-primary">MTH302 - P&S</h6>
                                                <small># PROBABILITY AND STATISTICS</small>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-12 col-lg-4">
                                        <div class="card border radius-15 shadowhover" style="cursor: pointer;" onclick="window.location.href='gallery/CSE316/'">
                                            <div class="card-body">
                                                <div class="d-flex align-items-center">
                                                    <div class="font-30 text-primary"><i class="lni lni-folder"></i>
                                                    </div>
                                                    <div class="user-groups ms-auto">
                                                        <img src="https://i.ibb.co/2dgfQVT/circleprofile.png" width="35" height="35" class="rounded-circle" alt="">
                                                    </div>
                                                </div>
                                                <h6 class="mb-0 text-primary">CSE316 - OS</h6>
                                                <small># OPERATING SYSTEMS</small>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-12 col-lg-4">
                                        <div class="card border radius-15 shadowhover" style="cursor: pointer;" onclick="window.location.href='gallery/INT404/'">
                                            <div class="card-body">
                                                <div class="d-flex align-items-center">
                                                    <div class="font-30 text-primary"><i class="lni lni-folder"></i>
                                                    </div>
                                                    <div class="user-groups ms-auto">
                                                        <img src="https://bootdey.com/img/Content/avatar/avatar2.png" width="35" height="35" class="rounded-circle" alt="">
                                                        <img src="https://bootdey.com/img/Content/avatar/avatar3.png" width="35" height="35" class="rounded-circle" alt="">
                                                    </div>
                                                </div>
                                                <h6 class="mb-0 text-primary">INT404 - AI</h6>
                                                <small># ARTIFICIAL INTELLIGENCE </small>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-12 col-lg-4">
                                        <div class="card border radius-15 shadowhover" style="cursor: pointer;" onclick="window.location.href='gallery/PEV106/'">
                                            <div class="card-body">
                                                <div class="d-flex align-items-center">
                                                    <div class="font-30 text-primary"><i class="lni lni-folder"></i>
                                                    </div>
                                                    <div class="user-groups ms-auto">
                                                        <img src="https://w7.pngwing.com/pngs/178/419/png-transparent-man-illustration-computer-icons-avatar-login-user-avatar-child-web-design-face-thumbnail.png" width="35" height="35" class="rounded-circle" alt="">
                                                        <img src="https://bootdey.com/img/Content/avatar/avatar2.png" width="35" height="35" class="rounded-circle" alt="">
                                                    </div>
                                                    <div class="user-plus">+</div>
                                                </div>
                                                <h6 class="mb-0 text-primary">PEV106 - VA</h6>
                                                <small># VERBAL ABILITY-I </small>
                                            </div>
                                        </div>
                                    </div>

                                </div>
                            </div>

                            <!---- 3rd Semester ---->
                            <div style="height: 4px;"></div>

                            <button  class="accordion">B-Tech - Semester 3 <span class="spiin" style="float: right;"><span class="iconify" data-icon="ant-design:plus-outlined"></span></span></button>
                            <div class="panel">
                                <div class="row mt-3">
                                    <div class="col-12 col-lg-4">
                                        <div class="card border radius-15 shadowhover" style="cursor: pointer;" onclick="window.location.href='gallery/CSE205/'">
                                            <div class="card-body">
                                                <div class="d-flex align-items-center">
                                                    <div class="font-30 text-primary"><i class="lni lni-folder"></i>
                                                    </div>
                                                    <div class="user-groups ms-auto">
                                                        <img src="https://w7.pngwing.com/pngs/178/419/png-transparent-man-illustration-computer-icons-avatar-login-user-avatar-child-web-design-face-thumbnail.png" width="35" height="35" class="rounded-circle" alt="">
                                                        <img src="https://bootdey.com/img/Content/avatar/avatar2.png" width="35" height="35" class="rounded-circle" alt="">
                                                    </div>
                                                    <div class="user-plus">+</div>
                                                </div>
                                                <h6 class="mb-0 text-primary">CSE205 - DSA</h6>
                                                <small># Data structure & Algorithm</small>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-12 col-lg-4">
                                        <div class="card border radius-15 shadowhover" style="cursor: pointer;" onclick="window.location.href='gallery/CSE211/'">
                                            <div class="card-body">
                                                <div class="d-flex align-items-center">
                                                    <div class="font-30 text-primary"><i class="lni lni-folder"></i>
                                                    </div>
                                                    <div class="user-groups ms-auto">
                                                        <img src="https://i.ibb.co/2dgfQVT/circleprofile.png" width="35" height="35" class="rounded-circle" alt="">
                                                    </div>
                                                </div>
                                                <h6 class="mb-0 text-primary">CSE211 - COS</h6>
                                                <small># Computer Organization & Design</small>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-12 col-lg-4">
                                        <div class="card border radius-15 shadowhover" style="cursor: pointer;" onclick="window.location.href='gallery/CSE320/'">
                                            <div class="card-body">
                                                <div class="d-flex align-items-center">
                                                    <div class="font-30 text-primary"><i class="lni lni-folder"></i>
                                                    </div>
                                                    <div class="user-groups ms-auto">
                                                        <img src="https://bootdey.com/img/Content/avatar/avatar2.png" width="35" height="35" class="rounded-circle" alt="">
                                                        <img src="https://bootdey.com/img/Content/avatar/avatar3.png" width="35" height="35" class="rounded-circle" alt="">
                                                    </div>
                                                </div>
                                                <h6 class="mb-0 text-primary">CSE320 - SE</h6>
                                                <small># Software Engineering</small>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-12 col-lg-4">
                                        <div class="card border radius-15 shadowhover" style="cursor: pointer;" onclick="window.location.href='gallery/INT213/'">
                                            <div class="card-body">
                                                <div class="d-flex align-items-center">
                                                    <div class="font-30 text-primary"><i class="lni lni-folder"></i>
                                                    </div>
                                                    <div class="user-groups ms-auto">
                                                        <img src="https://w7.pngwing.com/pngs/178/419/png-transparent-man-illustration-computer-icons-avatar-login-user-avatar-child-web-design-face-thumbnail.png" width="35" height="35" class="rounded-circle" alt="">
                                                        <img src="https://bootdey.com/img/Content/avatar/avatar2.png" width="35" height="35" class="rounded-circle" alt="">
                                                    </div>
                                                    <div class="user-plus">+</div>
                                                </div>
                                                <h6 class="mb-0 text-primary">INT213 - PYTHON</h6>
                                                <small># Python Programming</small>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-12 col-lg-4">
                                        <div class="card border radius-15 shadowhover" style="cursor: pointer;" onclick="window.location.href='gallery/INT306/'">
                                            <div class="card-body">
                                                <div class="d-flex align-items-center">
                                                    <div class="font-30 text-primary"><i class="lni lni-folder"></i>
                                                    </div>
                                                    <div class="user-groups ms-auto">
                                                        <img src="https://i.ibb.co/2dgfQVT/circleprofile.png" width="35" height="35" class="rounded-circle" alt="">
                                                    </div>
                                                </div>
                                                <h6 class="mb-0 text-primary">INT306 - DBMS</h6>
                                                <small># Database Management System</small>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-12 col-lg-4">
                                        <div class="card border radius-15 shadowhover" style="cursor: pointer;" onclick="window.location.href='gallery/MTH401/'">
                                            <div class="card-body">
                                                <div class="d-flex align-items-center">
                                                    <div class="font-30 text-primary"><i class="lni lni-folder"></i>
                                                    </div>
                                                    <div class="user-groups ms-auto">
                                                        <img src="https://bootdey.com/img/Content/avatar/avatar2.png" width="35" height="35" class="rounded-circle" alt="">
                                                        <img src="https://bootdey.com/img/Content/avatar/avatar3.png" width="35" height="35" class="rounded-circle" alt="">
                                                    </div>
                                                </div>
                                                <h6 class="mb-0 text-primary">MTH401 - DISCRETE</h6>
                                                <small># Discrete Mathematics</small>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-12 col-lg-4">
                                        <div class="card border radius-15 shadowhover" style="cursor: pointer;" onclick="window.location.href='gallery/PEL131/'">
                                            <div class="card-body">
                                                <div class="d-flex align-items-center">
                                                    <div class="font-30 text-primary"><i class="lni lni-folder"></i>
                                                    </div>
                                                    <div class="user-groups ms-auto">
                                                        <img src="https://bootdey.com/img/Content/avatar/avatar2.png" width="35" height="35" class="rounded-circle" alt="">
                                                        <img src="https://bootdey.com/img/Content/avatar/avatar3.png" width="35" height="35" class="rounded-circle" alt="">
                                                    </div>
                                                </div>
                                                <h6 class="mb-0 text-primary" style="text-transform: uppercase;">PEL131 - Communication Skill</h6>
                                                <small># Communication Skill II</small>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <!-- Sem 2 --->
                            <div style="height: 4px;"></div>

                            <button  class="accordion">B-Tech - Semester 2 <span class="spiin" style="float: right;"><span class="iconify" data-icon="ant-design:plus-outlined"></span></span></button>
                            <div class="panel">
                                <!--- will update tooo --->
                                <div style="padding: 5% 2%; text-align:center;">
                                    <img src="https://enally.in/files-manager/assets/Sem%202.JPG" style="width: 100%;" alt="">
                                    <p style="padding: 2% 2%;font-size: 22px; color: #DC3545; font-weight: 600;">Files Download Link: <a target="_blank" href="https://terabox.com/s/12IF7bRZMYIOKi8n7gW1yqA">Open in New Tab</a> - <span>Password: <span style="color: green;">7hdy</span> </span></p>
                                    <br>
                                    <p>If you are facing any issue accessing the files, <a href="https://enally.in/files-manager/contact">Contact Us</a> ASAP. We'll try to fix it for you within 24hrs-48hrs.</p>
                                </div>
                            </div>


                            <!-- Sem 1 --->
                            <div style="height: 4px;"></div>

                            <button  class="accordion">B-Tech - Semester 1 <span class="spiin" style="float: right;"><span class="iconify" data-icon="ant-design:plus-outlined"></span></span></button>
                            <div class="panel">
                                <!--- will update tooo --->
                                <div style=" padding: 5% 2%; text-align:center;">
                                    <img src="https://enally.in/files-manager/assets/Sem%201.JPG" style="width: 100%;" alt="">
                                    <p style=" padding: 2% 2%;font-size: 22px; color: #DC3545; font-weight: 600;">Files Download Link: <a target="_blank" href="https://terabox.com/s/19NUG74g6aAy_WXaQ7aAsiA">Open in New Tab</a> - <span>Password: <span style="color: green;">hrgv</span></span></p>
                                    <br>
                                    <p>If you are facing any issue accessing the files, <a target="_blank" href="https://enally.in/files-manager/contact">Contact Us</a> ASAP. We'll try to fix it for you within 24hrs-48hrs.</p>
                                </div>
                            </div>

                            <br><br>


                            <!--end row-->
                            <div class="d-flex align-items-center">
                                <div>
                                    <h5 class="mb-0">Miscellaneous Files</h5>
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
                            <br>
                            <hr>
                            <?php
                            $fn = fopen("subscriber.txt", "r");

                            while (!feof($fn)) {
                                $result = fgets($fn);
                                //echo $result. "<br>";
                            }

                            fclose($fn);
                            ?>

                            <!-- <div id="poll">
                                <h5>Do you like this so far?</h5>
                                <form>
                                    Yes: <input type="radio" name="vote" value="0" onclick="getVote(this.value)"><br>
                                    No: <input type="radio" name="vote" value="1" onclick="getVote(this.value)">
                                </form>
                            </div> -->
                            <br>

                            <!-- <div class="card">
                                <div class="card-body" style="text-align:center; background-color: #FEDC8B; border-radius: 4px;">
                                    <img src="https://image.freepik.com/free-photo/light-bulb-with-great-idea-text-yellow-background_23-2147865547.jpg" width="320px" style="float: left;" alt="announcement">
                                    <br>
                                    <h5 style="font-weight: 600; font-size: 36px; font-family: 'Gochi Hand', cursive;">Launching New Platform "LPU - Assignments & Doubts Helper"</h5>
                                    <hr>
                                    <p class="req">Join Me. If you're interested! <br>Requirements: HTML, CSS, JS, PHP, MSQL, POD, JQuery and Ajax</p>
                                    <div class="mt-3"></div>
                                </div>
                            </div> -->
                            <h5 data-aos-duration="500">My Other Projects</h5>
                            <br>
                            <div class="card" data-aos-duration="500">

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

                                <iframe data-aos-duration="500" class="shadow" height="457" style="border-radius: 12px;" src="<?php echo $purl ?>" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
                            </div>
                            <p style="text-align: center;" ><i>Reload page for new video</i></p>


                            <div style="text-align: center;">
                                <script src="https://apis.google.com/js/platform.js"></script>
                                <div class="g-ytsubscribe" data-channelid="UCUh3A9fQkuTRtmVVRf3O_Ng" data-layout="full" data-count="hidden"></div>
                            </div>


                            <!--- adsense ----------->
                            <div hidden >
                                <p class="req" style="text-align: center;">Google Ads</p>
                            </div>
                        </div>
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
    var color = ["#03A5BA", "#FF8080", "#F6E9CB", "#C2F0F2", "#ff0000"];
    setInterval(function() {
        var rand = Math.floor((Math.random() * 4));
        //document.body.style.backgroundColor = color[rand];
        document.getElementById("ete_mcq_ads").style.backgroundColor = color[rand - 1];
        document.getElementById("CName").style.backgroundColor = color[rand - 1];
    }, 300)
</script>

<?php include("footer.php");?>