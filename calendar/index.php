<?php
error_reporting(0);
session_start();
include("./database.php");
$uid = "k20bn"; // set your user id settings
$datetime_string = date('c', time());

if (isset($_POST['action']) or isset($_GET['view'])) {
    if (isset($_GET['view'])) {
        header('Content-Type: application/json');
        $start = mysqli_real_escape_string($connection, $_GET["start"]);
        $end = mysqli_real_escape_string($connection, $_GET["end"]);

        $result = mysqli_query($connection, "SELECT `id`, `start` ,`end` ,`title` FROM  `events` where (date(start) >= '$start' AND date(start) <= '$end') and uid='" . $uid . "'");
        while ($row = mysqli_fetch_assoc($result)) {
            $events[] = $row;
        }
        echo json_encode($events);
        exit;
    } elseif ($_POST['action'] == "add") {
        mysqli_query($connection, "INSERT INTO `events` (
                    `title` ,
                    `start` ,
                    `end` ,
                    `uid` 
                    )
                    VALUES (
                    '" . mysqli_real_escape_string($connection, $_POST["title"]) . "',
                    '" . mysqli_real_escape_string($connection, date('Y-m-d H:i:s', strtotime($_POST["start"]))) . "',
                    '" . mysqli_real_escape_string($connection, date('Y-m-d H:i:s', strtotime($_POST["end"]))) . "',
                    '" . mysqli_real_escape_string($connection, $uid) . "'
                    )");
        header('Content-Type: application/json');
        echo '{"id":"' . mysqli_insert_id($connection) . '"}';
        exit;
    } elseif ($_POST['action'] == "update") {
        mysqli_query($connection, "UPDATE `events` set 
            `start` = '" . mysqli_real_escape_string($connection, date('Y-m-d H:i:s', strtotime($_POST["start"]))) . "', 
            `end` = '" . mysqli_real_escape_string($connection, date('Y-m-d H:i:s', strtotime($_POST["end"]))) . "' 
            where uid = '" . mysqli_real_escape_string($connection, $uid) . "' and id = '" . mysqli_real_escape_string($connection, $_POST["id"]) . "'");
        exit;
    } elseif ($_POST['action'] == "delete") {
        mysqli_query($connection, "DELETE from `events` where uid = '" . mysqli_real_escape_string($connection, $uid) . "' and id = '" . mysqli_real_escape_string($connection, $_POST["id"]) . "'");
        if (mysqli_affected_rows($connection) > 0) {
            echo "1";
        }
        exit;
    }
}

?>

<!doctype html>
<html lang="en">

<head>
    <title>Classroom Bucket - Calender</title>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
    <script type="text/javascript" src="js/script.js"></script>

    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" crossorigin="anonymous"></script>
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.lineicons.com/3.0/lineicons.css" rel="stylesheet">
    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" />
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous" />
    <link href="css/fullcalendar.css" rel="stylesheet" />
    <link href="css/style.css" rel="stylesheet" />
    <link href="css/fullcalendar.print.css" rel="stylesheet" media="print" />
    <script src="js/moment.min.js"></script>
    <script src="js/fullcalendar.js"></script>
    <script src="https://cdn.ckeditor.com/ckeditor5/32.0.0/classic/ckeditor.js"></script>

    <!-- Meta tags ----->
    <meta charset='UTF-8'>
    <meta name="author" content="" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name='keywords' content='K20BN, Notes, File-manager, enally.in, enally, Prashant Kumar Enally, Prashant enally,Classroom Bucket,Everything in one Bucket '>
    <meta name="description" content="Classroom Bucket it an online platform where Collage, Schools and University can share Study Materials for their students. Student's can also upload their hand-written notes, Projects and other study materials related to course to share or help another students." />
    <meta name="author" content="Prashant Kumar">
    <meta name="copyright" content="Enally.in">
    <link rel="icon" href="https://enally.in/files-manager/assets/Fevicon.png" type="image/x-icon">
    <meta property="og:image" content="https://enally.in/files-manager/assets/about_img.webp">
    <meta property="og:image" content="https://enally.in/files-manager/assets/about_img.webp">
    <meta name="twitter:image" content="https://enally.in/files-manager/assets/about_img.webp">
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous" />

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


    <meta http-equiv="Content-Type" content="text/html;charset=utf-8" />
    <style type="text/css">
        img {
            border-width: 0
        }

        * {
            font-family: 'Lucida Grande', sans-serif;
        }
    </style>
</head>

<body>
    <!-- add calander in this div -->

    <header class="shadow">
        <nav>
            <h1><a style="text-decoration: none; color:#112D4E;" href="https://enally.in/files-manager/"><i class="fas fa-backpack"></i>Classroom Bucket</a></h1>
            <div class="nav-items-container">
                <ul class="nav-items">
                    <li class="nav-item"><a href="https://enally.in/files-manager/about"><i class="fab fa-accusoft"></i> About</a></li>
                    <li class="nav-item"><a href="https://enally.in/files-manager/contact"><i class="fad fa-envelope"></i> Contact</a></li>
                    <li class="nav-item"><a href="https://enally.in/files-manager/"><i class="fas fa-books"></i> Notes</a></li>
                    <li class="nav-item"><a href="https://enally.in/files-manager/project-page"><i class="fas fa-laptop-code"></i> Projects</a></li>
                </ul>
            </div>
            <div class="log-btns-container">
                <ul class="log-btns">
                    <li class="log-btn">
                        <a style="text-decoration: none; color:#112D4E;" href="https://enally.in/files-manager/subscribe-us">Subscribe</a>
                    </li>

                    <?php
                    if (!isset($_SESSION['UserData']['Username'])) {
                        echo '
                    <li class="log-btn">
                        <a style="text-decoration: none; color:#112D4E;" href="https://enally.in/files-manager/login">Login </a>
                    </li>';
                    } else {
                        echo '
                    <li class="log-btn">
                        <a style="text-decoration: none; color:#112D4E;" href="https://enally.in/files-manager/logout">Logout </a>
                    </li>';
                    }
                    ?>

                </ul>
            </div>
            <div class="hamburger">
                <span></span>
                <span></span>
                <span></span>
                <span></span>
            </div>
        </nav>
    </header>
    <div class="main">
        <div class="container">
            <div class="row">
                <h4 class="tile2"><i class="fad fa-calendar"></i> Calendar - <span style="text-transform: uppercase; "><?php echo $uid; ?></span></h4>
                <!-- <form action="" method="POST" style="text-align:center">
                        <select name="section" id="">
                            <option value="k20bn">K20BNG1</option>
                            <option value="k20bn">K20BNG2</option>
                        </select>
                        <input type="submit" name="y" value="Show">
                    </form> -->
                <p id="clock"></p>
                <div id="calendar"></div>

            </div>
        </div>
        

        <!-- Modal -->

        <?php
        if ($_SESSION['UserData']['Username'] == 'prashant' || $_SESSION['UserData']['Username'] == 'superuser') {
        ?>

            <div id="createEventModal" class="modal fade" role="dialog">
                <div class="modal-dialog">

                    <!-- Modal content-->
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                            <h4 class="modal-title">Add Event for <span style="text-transform: uppercase; "><?php echo $uid; ?></span></h4>
                        </div>
                        <div class="modal-body">
                            <div class="control-group">
                                <label class="control-label" for="inputPatient">Event:</label>
                                <div class="field desc">
                                    <textarea style="height: 280px;" required class="form-control" id="title" name="title" placeholder="Event" type="text" value=""></textarea>
                                </div>
                            </div>

                            <input type="hidden" id="startTime" />
                            <input type="hidden" id="endTime" />


                            <div class="control-group">
                                <label class="control-label when-even" for="when"><i class="fas fa-clock"></i> When:</label>
                                <div class="controls controls-row" id="when" style="margin-top:5px;">
                                </div>
                            </div>

                        </div>
                        <div class="modal-footer">
                            <button class="btn" data-dismiss="modal" aria-hidden="true">Cancel</button>
                            <button type="submit" class="btn btn-primary" id="submitButton">Save</button>
                        </div>
                    </div>

                </div>
            </div>

            <div id="calendarModal" class="modal fade">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                            <h4 class="modal-title">Event Details for <span style="text-transform: uppercase; "><?php echo $uid; ?></span></h4>
                        </div>
                        <div id="modalBody" class="modal-body">
                            <h4 id="modalTitle" class="modal-title"></h4>
                            <i class="fas fa-clock"></i> <span id="modalWhen" style="margin-top:5px;"></span>
                        </div>
                        <input type="hidden" id="eventID" />
                        <div class="modal-footer">
                            <button class="btn" data-dismiss="modal" aria-hidden="true">Cancel</button>
                            <button type="submit" class="btn btn-danger" id="deleteButton">Delete</button>
                        </div>
                    </div>
                </div>
            </div>

        <?php
        } else {
        ?>

            <div id="createEventModal" class="modal fade" role="dialog">
                <div class="modal-dialog">

                    <!-- Modal content-->
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                            <h4 class="modal-title">Alert!</h4>
                        </div>
                        <div class="modal-body">
                            <h4 style="text-align: center;">
                                Please Login as Superuser or Admin to add or Delete Events
                                
                            </h4>
                            <div style="text-align: center;">
                                <img src="https://cdn.dribbble.com/users/932780/screenshots/14261164/media/942553dfa7454fc1d7ebe40e2b727d61.png" width="70%" alt="">
                                <br><a style="padding: 18px; font-size: 17px; text-decoration:none; background-color:#DB9A96; padding: 10px 18px; color: #DBE2EF; box-shadow: 0 1rem 3rem rgba(0, 0, 0, .175); border-radius: 12px;" href="https://enally.in/files-manager/login">Login Here</a>
                            </div>
                            

                        </div>
                        <div class="modal-footer">
                            <button class="btn" data-dismiss="modal" aria-hidden="true">Cancel</button>

                        </div>
                    </div>

                </div>
            </div>

            <div id="calendarModal" class="modal fade">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                            <h4 class="modal-title">Event Details for <span style="text-transform: uppercase; "><?php echo $uid; ?></span></h4>
                        </div>
                        <div id="modalBody" class="modal-body">
                            <h4 id="modalTitle" class="modal-title"></h4>
                            <div id="modalWhen" style="margin-top:5px;"></div>
                        </div>
                        <input type="hidden" id="eventID" />
                        <div class="modal-footer">
                            <button class="btn" data-dismiss="modal" aria-hidden="true">Cancel</button>

                        </div>
                    </div>
                </div>
            </div>


        <?php
        }

        ?>




        <!--Modal-->


        <div style='margin-left: auto;margin-right: auto;text-align: center;'>
        </div>
    </div>

    <!---- Footer ---------->
    <footer id="footer" class="d-flex-column overlap" data-aos="fade-up" data-aos-duration="300">
        <div class="over">
            <!-- <hr class="mt-0"> -->
            <!--Social buttons-->


            <!--/.Footer Links-->
            <!--Copyright-->
            <div class="py-3 " style="background-color: #DBE2EF;">
                <div>
                    <h5>You Can Find Me At</h5>
                    <ul class="list-unstyled list-inline">
                        <li class="list-inline-item">
                            <a href="https://www.facebook.com/Prashant96120Pk/" class="sbtn btn-large mx-1" title="Facebook">
                                <i class="lni lni-facebook"></i>
                            </a>
                        </li>
                        <li class="list-inline-item">
                            <a href="https://www.linkedin.com/in/03prashantpk/" class="sbtn btn-large mx-1" title="Linkedin">
                                <i class="lni lni-linkedin"></i>
                            </a>
                        </li>
                        <li class="list-inline-item">
                            <a href="https://github.com/03prashantpk/" class="sbtn btn-large mx-1" title="GitHub">
                                <i class="lni lni-github"></i>
                            </a>
                        </li>
                        <li class="list-inline-item">
                            <a href="https://www.instagram.com/prashantpkumar/" class="sbtn btn-large mx-1" title="Youtube">
                                <i class="lni lni-instagram"></i>
                            </a>
                        </li>
                        <li class="list-inline-item">
                            <a href="https://www.youtube.com/channel/UCUh3A9fQkuTRtmVVRf3O_Ng" class="sbtn btn-large mx-1" title="Youtube">
                                <span class="iconify" data-icon="logos:youtube" data-width="80"></span>
                            </a>
                        </li>
                    </ul>

                </div>
                <p> If you find any bugs or irrelevant stuff. Please report it here <a href="https://enally.in/files-manager/contact">Contact or Report Bugs</a><br>
                    Developed By <b>Prashant Kumar</b> <br> <?php echo date("Y") ?> © Enally.in <i class="lni lni-friendly"></i></p>


                <br><br>
            </div>

            <!--/.Copyright-->
        </div>
    </footer>

    <script>
        ClassicEditor
            .create(document.querySelector('#editor'))
            .then(editor => {
                console.log(editor);
            })
            .catch(error => {
                console.error(error);
            });
    </script>


    <script>
        $(function() {
            if ($(window).width() < 1200) {
                $(".nav-items-container ").slideUp(0, "swing")
                $(".log-btns-container ").slideUp(0, "swing")
            }
        })


        $(".hamburger").click(function() {
            $(".hamburger").toggleClass("open")
            $(".nav-items-container").slideToggle(300, "swing")
            $(".log-btns-container").slideToggle(300, "swing")
        })

        $(window).resize(function() {
            $(".hamburger").removeClass("open")

        })

        $(window).resize(function() {
            if ($(window).width() > 1200) {
                $(".nav-items-container").slideDown(300, "swing")
                $(".log-btns-container").slideDown(300, "swing")
                // $(".hamburger").toggleClass("open")
            }

        });
        $(window).resize(function() {
            if ($(window).width() < 1200) {
                $(".nav-items-container ").slideUp(0, "swing")
                $(".log-btns-container ").slideUp(0, "swing")
            }

        });
    </script>

    <script>
        (function(i, s, o, g, r, a, m) {
            i['GoogleAnalyticsObject'] = r;
            i[r] = i[r] || function() {
                (i[r].q = i[r].q || []).push(arguments)
            }, i[r].l = 1 * new Date();
            a = s.createElement(o),
                m = s.getElementsByTagName(o)[0];
            a.async = 1;
            a.src = g;
            m.parentNode.insertBefore(a, m)
        })(window, document, 'script', '//www.google-analytics.com/analytics.js', 'ga');

        ga('create', 'UA-21769945-4', 'auto');
        ga('send', 'pageview');
    </script>

    <script>
        var myVar = setInterval(function() {
            myTimer();
        }, 1000);

        function myTimer() {
            var d = new Date();
            document.getElementById("clock").innerHTML = d.toLocaleTimeString();
        }
    </script>

</body>

</html>