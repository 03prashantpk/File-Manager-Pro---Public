<?php // total file counts
error_reporting(0);

$cookie_name = "user";
$cookie_value = "John Doe";
setcookie($cookie_name, $cookie_value, time() + (86400 * 30), "/");

$filecounts =  "Images (" . $count_total_images . ") | Presentation (" . $count_total_ppt . ") | Documents (" . $count_total_docs . ") | Videos (" . $count_total_videos . ") | Pdf (" . $count_total_pdf . ") | Musics (" . $count_total_musics . ")" . "| Archives (" . $count_total_archive . ")";

$total_no_of_files = $count_total_images + $count_total_ppt + $count_total_docs + $count_total_videos + $count_total_pdf +  $count_total_musics + $count_total_archive;

function folderSize($dir)
{
    $count_size = 0;
    $count = 0;
    $dir_array = scandir($dir);
    foreach ($dir_array as $key => $filename) {
        if ($filename != ".." && $filename != ".") {
            if (is_dir($dir . "/" . $filename)) {
                $new_foldersize = foldersize($dir . "/" . $filename);
                $count_size = $count_size + $new_foldersize;
            } else if (is_file($dir . "/" . $filename)) {
                $count_size = $count_size + filesize($dir . "/" . $filename);
                $count++;
            }
        }
    }
    return $count_size;
}

function sizeFormat($bytes)
{
    $kb = 1024;
    $mb = $kb * 1024;
    $gb = $mb * 1024;
    $tb = $gb * 1024;

    if (($bytes >= 0) && ($bytes < $kb)) {
        return $bytes . ' B';
    } elseif (($bytes >= $kb) && ($bytes < $mb)) {
        return ceil($bytes / $kb)  /*' KB' */;
    } elseif (($bytes >= $mb) && ($bytes < $gb)) {
        return ceil($bytes / $mb)  /*' MB'*/;
    } elseif (($bytes >= $gb) && ($bytes < $tb)) {
        return ceil($bytes / $gb) . ' GB';
    } elseif ($bytes >= $tb) {
        return ceil($bytes / $tb) . ' TB';
    } else {
        return $bytes . ' B';
    }
}


$folder_name = "./";
//echo folderSize($folder_name);
//echo sizeFormat(folderSize($folder_name));

$used_size = sizeFormat(folderSize($folder_name));
$total_size = "2048";
@$used_percentage = $used_size / $total_size * 100;


@$Product_price = $_POST["Product_price"];
@$Donate = "Donate";
@$_SESSION['product_name_and_price'] = @$Product_price;
@$_SESSION['donate'] = @$Donate;
//echo @$Product_price;

$amount_true = is_int($Product_price);

if ($Product_price != "") {
    echo "<script>
        window.location='payment.php';
        </script>";
} else if ($Product_price == "") {
    //$enter = "Enter an valid amount to continue";
}

// Page code to hide sidebar tabs

if ($page_code == "contact") {
    $hide_div = "hidden";
}



$blockedDevicesNames = array("LAPTOP-6QQ270GN","LAPTOP-RBB9HP07");

// if(gethostname() == "LAPTOP-0FH2HRSF"){
//     echo "Blocked";
// }


if(in_array(gethostname(),$blockedDevicesNames)){
    echo "Blocked "; 
    echo gethostname();

    // header("Location: https://enally.in");
    header( "refresh:10;url=https://enally.in" );

}


?>
<style>
    .btn33 {
        background-color: #88D4C1;
    }

    .btn33:hover {
        background-color: #3BD09C;
    }

    .btn23 {
        background-color: #fff5be;
    }

    .btn23:hover {
        background-color: #F5AC00;
    }

    .req {
        font-size: 12px;
        padding-top: 8px;
    }

    .req2 {
        font-size: 16px;
        padding-top: 8px;
    }

    #progressBar {
        background-color: #fff5be;
        border: none;
        height: 8px;

    }

    .padd-rit {
        padding-right: 8px;
    }

    .cursoree {
        cursor: pointer;
    }

    .cursoree:hover {
        cursor: pointer;
        text-decoration: underline;
    }

    .icoo {
        box-shadow:
            0 2.8px 2.2px rgba(0, 0, 0, 0.034),
            0 6.7px 5.3px rgba(0, 0, 0, 0.048),
            0 12.5px 10px rgba(0, 0, 0, 0.06),
            0 22.3px 17.9px rgba(0, 0, 0, 0.072),
            0 41.8px 33.4px rgba(0, 0, 0, 0.086),
            0 100px 80px rgba(0, 0, 0, 0.12);
        background-color: none;
        border-radius: 12px;

    }

    .icoo:hover {
        box-shadow:
            0 2.8px 2.2px rgba(0, 0, 0, 0.034),
            0 6.7px 5.3px rgba(0, 0, 0, 0.048),
            0 12.5px 10px rgba(0, 0, 0, 0.06),
            0 22.3px 17.9px rgba(0, 0, 0, 0.072),
            0 41.8px 33.4px rgba(0, 0, 0, 0.086),
            0 100px 80px rgba(0, 0, 0, 0.12);
        background-color: #fff;
        border-radius: 12px;

    }

    .flip-card {
        background-color: transparent;
        width: 220px;
        height: 220px;
        perspective: 1000px;
        padding: 0px;
        /* Remove this if you don't want the 3D effect */
    }

    .img-cardd {
        width: 100%;
    }

    /* This container is needed to position the front and back side */
    .flip-card-inner {
        position: relative;
        width: 100%;
        height: 100%;
        text-align: center;
        transition: transform 0.8s;
        transform-style: preserve-3d;
    }

    /* Do an horizontal flip when you move the mouse over the flip box container */
    .flip-card:hover .flip-card-inner {
        transform: rotateY(180deg);
    }

    /* Position the front and back side */
    .flip-card-front,
    .flip-card-back {
        position: absolute;
        width: 100%;
        height: 100%;
        backface-visibility: hidden;
    }

    /* Style the front side (fallback if image is missing) */
    .flip-card-front {
        color: black;
    }

    /* Style the back side */
    .flip-card-back {
        background-color: #EFFBFF;
        color: white;
        transform: rotateY(180deg);
        border-radius: 0px 0px 30px;
        box-shadow:
            0 2.8px 2.2px rgba(0, 0, 0, 0.034),
            0 6.7px 5.3px rgba(0, 0, 0, 0.048),
            0 12.5px 10px rgba(0, 0, 0, 0.06),
            0 22.3px 17.9px rgba(0, 0, 0, 0.072),
            0 41.8px 33.4px rgba(0, 0, 0, 0.086),
            0 100px 80px rgba(0, 0, 0, 0.12);
        color: #555371;
    }

    .flip-card-back:hover {
        border-radius: 0px 0px 110px;
        transition: 1.2s;
    }

    .project_btn {
        text-align: right;
        background-color: #F5AC00;
        padding: 4px 18px;
        color: #fff;
        border-radius: 8px;
        font-size: 18px;
        text-decoration: none;
        box-shadow:
            0 2.8px 2.2px rgba(0, 0, 0, 0.034),
            0 6.7px 5.3px rgba(0, 0, 0, 0.048),
            0 12.5px 10px rgba(0, 0, 0, 0.06),
            0 22.3px 17.9px rgba(0, 0, 0, 0.072),
            0 41.8px 33.4px rgba(0, 0, 0, 0.086),
            0 100px 80px rgba(0, 0, 0, 0.12);
    }

    .float_to_right {
        display: flex;
        justify-content: right;
    }

    .fixed-bottom {
        text-align: right;
        padding-bottom: 2px;
        padding-right: 0px;

    }

    .footer-nav_bar {
        background-color: #FFDE25;
        color: #000;
        padding: 8px 6px;
        box-shadow: -34px 2px 13px -7px rgba(0, 0, 0, 0.21);
        -webkit-box-shadow: -34px 2px 13px -7px rgba(0, 0, 0, 0.21);
        -moz-box-shadow: -34px 2px 13px -7px rgba(0, 0, 0, 0.21);
        border-radius: 12px 0px 0px 0px;

    }

    .footer-nav_bar a {
        color: #000;
        font-size: 14px;
    }

    @media only screen and (max-width: 600px) {

        .fixed-bottom {
            visibility: hidden;
        }
    }

    .donate {
        text-align: center;
        padding: 8px;
    }

    .donate input {
        padding: 5px;
        background-color: #F7F7FF;
        border: none;
        border-radius: 4px;

    }

    .donate input[Type="submit"] {
        padding: 5px 30px;
        background-color: #74C1ED;
        border: none;
        border-radius: 4px;

    }

    .donate input[Type="submit"]:hover {
        padding: 5px 30px;
        background-color: #FFDA89;
        border: none;
        border-radius: 4px;
    }

    .tooltip {
        position: relative;
        display: inline-block;
        border-bottom: 1px dotted black;
    }

    .tooltip .tooltiptext {
        visibility: hidden;
        width: 120px;
        background-color: black;
        color: #fff;
        text-align: center;
        border-radius: 6px;
        padding: 5px 0;

        /* Position the tooltip */
        position: absolute;
        z-index: 1;
        bottom: 100%;
        left: 50%;
        margin-left: -60px;
    }

    .tooltip:hover .tooltiptext {
        visibility: visible;
    }

    @media only screen and (max-width: 768px) {

        /* For mobile phones: */
        .meta-image {
            visibility: hidden;
            height: 0px;
            width: 0px;
        }

        .hide_onmob {
            visibility: hidden;
            height: 0px;
            width: 0px;
        }

        .padding-on-mobile {
            padding: 0px 40px;
        }

        .image_on_mob {
            width: 200px;
            text-align: center;
        }

    }
    #totalpg{
        font-weight: 800;
        color: #555371;
    }
    #CName{
        padding: 2px 8px;
    }
</style>

<?php
function isMobileDevice()
{
    return preg_match(
        "/(android|avantgo|blackberry|bolt|boost|cricket|docomo
|fone|hiptop|mini|mobi|palm|phone|pie|tablet|up\.browser|up\.link|webos|wos)/i",
        $_SERVER["HTTP_USER_AGENT"]
    );
}
if (isMobileDevice()) {
    //echo "Mobile Browser Detected";
    $width = "0";
} else {
    //echo "Mobile Browser Not Detected";
    $hidden_on_desk = "hidden";
}
?>


<!-- <div class="justify-content-center shadow-lg" style="width: <?php echo $width; ?>;">
    <nav class="fixed-bottom" style="width: <?php echo $width; ?>;">
        <span class="footer-nav_bar" style="width: <?php echo $width; ?>;">
            <a style="font-weight: 600; width: <?php echo $width; ?>;" href="#">VIEWS - <span id="totalpg"></span> </a> <span style="padding: 0 2px;"> | </span>
            <a style="font-weight: 600; width: <?php echo $width; ?>;" href="https://enally.in/files-manager/gallery/Mics/gallery/File%20Manager%20-%20Enally%20(Windows%20App%20Setup).rar"><span class="iconify" data-icon="logos:microsoft-windows"></span> APP </a> <span style="padding: 0 2px;"></span>
        </span>
    </nav>
</div> -->

<div class="col-12 col-lg-3 padding-on-mobile">
    
    <div class="card" style="padding-bottom: 0px; background-color: #E0F8F9;" >
        <div class="card-body" >
            </h5>
            <div class="d-grid" style="text-align:center;">
            <strong>Total Page Visit: <h6 id="totalpg"></h6></strong> 
            </div>
        </div>
    </div>
    <div class="card" style="padding-bottom: 0px; background-color: #E9F8E7;" >
        <div class="card-body" style="padding-bottom: 0px;">
            </h5>
            <div class="d-grid" style="text-align:center;">
                <a onclick="window.location.href='https://enally.in/files-manager/projects-upload'" class=" shadow-sm btn btn-primary btn23 border border-light"><span class="iconify" data-icon="fa-solid:upload"></span> Upload Projects </a>
                <a style="background-color: #E33E5C; margin-top: 8px;" onclick="window.location.href='https://enally.in/files-manager/CHE110-Presentation/'" class=" shadow-sm btn btn-primary btn23 border border-light"><span class="iconify" data-icon="fa-solid:upload" ></span> Upload CHE110 </a>
                <p class="req">Upload Projects and share links with your friends</p>
            </div>
        </div>
    </div>


    <div class="card" style="padding-bottom: 0px; background-color: #FFD8CC;" >
        <div class="card-body" style="padding-bottom: 0px;">
            <div class="d-grid" style="text-align:center;">
                <?php
                $upload_url = "'https://enally.in/files-manager/upload/'";
                if ($_SESSION['UserData']['Username'] == 'prashant' || $_SESSION['UserData']['Username'] == 'superuser' || $_SESSION['UserData']['Username'] == 'superuser') {
                    echo '
                <a onclick="window.location.href=' . $upload_url . '" class="shadow-sm btn btn-primary btn33 border border-light"><span class="iconify" data-icon="icon-park:notes"></span> Upload Notes</a>
                ';
                } else {
                    echo '
                    <a  style=" pointer-events: none; cursor: none;" class="shadow-sm btn btn-primary btn33 border border-light"><span class="iconify" data-icon="icon-park:notes"></span> Upload Notes</a>
                    <p class="req">Login as Superuser or admin to upload Files</p>
                    ';

                    if (!isset($_COOKIE[$cookie_name])) {
                        //echo "Thank you for Visiting";
                        //include("new_visit.php");
                    } else {
                        //echo "Regular Visitor";
                        //echo "Value is: " . $_COOKIE[$cookie_name];

                    }
                }
                ?>
            </div>
            <hr>
            <div class="d-grid" style="text-align:center;">
                <a onclick="window.location.href='https://enally.in/files-manager/request'" class=" shadow-sm btn btn-primary btn23 border border-light"><span class="iconify icoo" data-icon="logos:google-gmail" data-width="28"></span> Request Notes</a>
                <p class="req">Request File From Your Friend or Teacher</p>
            </div>

        </div>
    </div>
    <div class="card hide_onmob" >
        <div class="card-body" style="text-align:center; background-color: #EFFBFF;  background-image: url('https://enally.in/files-manager/assets/level-widget-bg.svg' ); background-position: bottom; background-size:cover; color:#EFFBFF; background-repeat:no-repeat;">
            <div class="flip-card">
                <div class="flip-card-inner">
                    <div class="flip-card-front shadow">
                        <img class="img-cardd" src="http://api.qrserver.com/v1/create-qr-code/?data=https://enally.in/files-manager/gallery/Mics/gallery/Classroom_Bucket_v2.1.apk" alt="Avatar">
                    </div>
                    <div class="flip-card-back">
                        <br>
                        <img src="https://cdn.freebiesupply.com/logos/large/2x/android-logo-png-transparent.png" width="100" alt="android img">
                        <h5>Android App</h5>
                        <a href="https://enally.in/files-manager/gallery/Mics/gallery/Classroom_Bucket_v2.1.apk" style="text-decoration: none;">Scan or Click Here<span class="iconify" data-icon="eva:download-fill"></span></a>
                    </div>
                </div>
            </div>
            <p>Touch Me <span class="iconify" data-icon="akar-icons:pointing-up" data-width="30"></span><br><b>Download Our App</b></p>

        </div>
    </div>
    <div class="card" >
        <div class="card-body" style="text-align:center; background-color: #EFFBFF;  background-image: url('https://enally.in/files-manager/assets/banner3.webp' ); background-position: bottom; background-size:contain; background-repeat:no-repeat;">
            <h5 class="my-3">My Drive</h5>
            <div class="fm-menu" style="text-align:center; background-color: #FFDE2500;">
                <div class="list-group list-group-flush" style="text-align:center; background-color: #FFDE2500;">
                    <a style="text-align:center; background-color: #FFDE2500;" href="javascript:;" class="list-group-item py-1"><span class="iconify" data-icon="bi:folder-fill" style="color: orange;"></span></i><span>All
                            Files <span class="badge bg-success text-dark"><?php echo $total_no_of_files - 1; ?>+</span></span></a>
                    <a style="text-align:center; background-color: #FFDE2500;" onclick="window.location.href='https://enally.in/files-manager/gallery/Mics/'" class="list-group-item py-1 cursoree"><span class="iconify" data-icon="carbon:data-structured"></span><span> Softwares</span></a>
                    <a style="text-align:center; background-color: #FFDE2500;" onclick="window.location.href='https://enally.in/files-manager/gallery/syllabus/'" class="list-group-item py-1 cursoree"><span class="iconify" data-icon="foundation:clipboard-notes" style="color: darkred;"></span><span> SYLLABUS</span></a>
                    <a style="text-align:center; background-color: #FFDE2500;" onclick="window.location.href='https://enally.in/files-manager/project-page'" class="list-group-item py-1 cursoree"><span class="iconify" data-icon="codicon:symbol-misc" style="color: orange;"></span><span> Download Projects</span></a>
                    <a style="text-align:center; background-color: #FFDE2500;" onclick="window.location.href='https://enally.in/files-manager/gallery/Helper/'" class="list-group-item py-1 cursoree"><span class="iconify" data-icon="emojione:books" style="color: orange;"></span><span>CS, MCQ, ETE</span></a>
                    <a style="text-align:center; background-color: #FFDE2500;" onclick="window.location.href='https://enally.in/files-manager/gallery/user-upload/'" class="list-group-item py-1 cursoree"><span class="iconify" data-icon="et:upload" style="color: orange;"></span><span> Users Upload</span></a>
                    <div style="height: 120px;"></div>
                </div>
            </div>
        </div>
    </div>

    <?php

    if ($page_code2 == "subscribe") {
        echo " ";
    } else {
            
    ?>
        <div class="card" style="padding-bottom: 0px;" >
            <div class="card-body" style=" padding-bottom: 0px; text-align:center; background-color: #EFFBFF;  background-image: url('https://enally.in/files-manager/assets/booster.svg' ); background-size:cover; background-repeat:no-repeat;">

                <form id="login-form" method="post" style="text-align:center;">
                    <h5>Subscribe</h5>
                    <div class="form-group">
                        <input type="email" name="email" id="email" class="form-control form-control-sm border-0" style="border: #ccc 1px solid; background-color: #F7F7FF;" placeholder="Email" required>
                    </div>
                    <span class="field_error" id="email_error"></span>
                    <div class="mb-4">
                        <a type="button" onclick="subscribe()" id="btn_submit" class="shadow-sm btn btn-primary btn23 border border-light">Subscribe <span class="iconify" data-icon="logos:google-gmail"></span></span></a>
                    </div>
                </form>

            </div>
        </div>


    <?php
    }

    ?>
    <div class="card" style="padding-bottom: 0px;"  hidden>
        <div class="card-body" style="text-align:center; background-color: #EFFBFF;  background-image: url('https://enally.in/files-manager/assets/ribbons-ads.png' ); background-size:cover; background-repeat:no-repeat;">
            <script async src="https://pagead2.googlesyndication.com/pagead/js/adsbygoogle.js?client=ca-pub-4554043228187575" crossorigin="anonymous"></script>
            <!-- Enally - File manager S1 -->
            <ins class="adsbygoogle" style="display:inline-block;width:180px;height:180px" data-ad-client="ca-pub-4554043228187575" data-ad-slot="2078197993"></ins>
            <script>
                (adsbygoogle = window.adsbygoogle || []).push({});
            </script>
            <div class="mt-3"></div>
            <p class="req" style="text-align: center;">Google Ads</p>
        </div>
    </div>

    <div class="card hide_onmob" style="padding-bottom: 0px;"  <?php echo $hide_div; ?>>
        <div class="card-body" style="padding-bottom: 0px; text-align:center; background-color: #EFFBFF;  background-image: url('https://enally.in/files-manager/assets/ribbon_grade.png' ); background-size: contain; background-repeat:no-repeat;">
            <h5 class="mb-0 text-primary font-weight-bold"><?php echo sizeFormat(folderSize($folder_name)); ?> MB <span class="float-end text-secondary">2GB</span></h5>
            <p class="mb-0 mt-2"><span class="text-secondary">Space Used</span><span class="float-end text-primary"> <?php echo round($used_percentage, 2); ?>%
                    <!--Upgrade-->
                </span>
            </p>
            <div class="progress mt-3" style="height:7px;">
                <div class="progress-bar bg-danger" role="progressbar" style="width: <?php echo $used_percentage; ?>%" aria-valuenow="<?php echo round($used_percentage, 2); ?>" aria-valuemin="0" aria-valuemax="100"></div>
            </div>
            <?php
            // Program to display current page URL.
            $link = (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on' ? "https" : "http") . "://" . $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI'];
            //echo $link;

            ?>
            <div style="height: 20px;"></div>
            <div class="mt-3"></div>
        </div>
    </div>


    <div class="card hide_onmob" style="padding-bottom: 0px; border-radius: 12px;" id="donate" >
        <div class="card-body" style="text-align:center; background-color: #EFFBFF;  background-image: url('https://enally.in/files-manager/assets/top.webp' ); background-position: bottom; background-size:contain; background-repeat:no-repeat;">
            <h5 class="mb-0 text-primary font-weight-bold" style="text-align: center;">Support Us <span class="float-end text-secondary"><span class="iconify" data-width="35" data-icon="iconoir:donate"></span></span></h5>
            <!-- <p class="mb-0 mt-2" style="text-align: center; font-size: 14px;"><span class="text-secondary">This is a NON-PROFIT website. </span><span class="float-end text-primary"> Support us to improve its maintenance and security.
                   
                </span>
            </p> -->
            <form class="donate" action="" method="POST">
                <input type="text" list="amount" type="number" name="Product_price" placeholder="Enter an amount to donate" style="background-color: #018383; color:#fff; ">
                <datalist id="amount">
                    <option value="50">₹50</option>
                    <option value="100">₹100</option>
                    <option value="150">₹150</option>
                    <option value="200">₹200</option>
                </datalist>
                <br>
                <input type="submit" onclick="buy_btn()" value="Donate">
                <p><?php echo @$enter; ?></p>
            </form>

            <script>
                function donate_why() {
                    document.getElementById("donate_why").innerHTML = "Donate to keep this site up and running.";
                }
            </script>
            <?php
            // echo gethostname();
            // echo u_name();
            ?>

            <p id="donate_why" onclick="donate_why()" style="text-align: center; font-size: 12px; color:midnightblue">Donate Why? <span class="iconify" data-icon="flat-color-icons:info"></span></p>

            <div style="height: 100px;"></div>
            <div class="mt-3"></div>
        </div>
    </div>
</div>

<script>
    function subscribe() {
        jQuery('#email_error').html('');
        var email = jQuery('#email').val();
        if (email == '') {
            jQuery('#email_error').html('Please Enter a valid Email. ');
        
        } else {
            jQuery('#btn_submit').html('Please wait...');
            jQuery('#btn_submit').attr('disabled', true);
            jQuery.ajax({
                url: 'subscribe.php',
                type: 'POST',
                data: 'email=' + email,
                success: function(result) {
                    jQuery('#email').val('');
                    jQuery('#email_error').html(result);
                    jQuery('#btn_submit').html('Subscribe <span class="iconify" data-icon="logos:google-gmail"></span>');
                    jQuery('#btn_submit').attr('disabled', false);
                }
            })
        }
    }
</script>