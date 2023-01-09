<link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous" />
<header class="shadow">
    <nav>
        <h1><a style="text-decoration: none; color:#112D4E;" href="https://enally.in/files-manager/"><i class="fas fa-backpack"></i>Classroom Bucket</a></h1>
        <div class="nav-items-container">
            <ul class="nav-items">
                <li class="nav-item"><a href="https://enally.in/files-manager/about"><i class="fab fa-accusoft"></i> About</a></li>
                <li class="nav-item"><a href="https://enally.in/files-manager/contact"><i class="fad fa-envelope"></i> Contact</a></li>
                <li class="nav-item"><a href="https://enally.in/files-manager/project-page"><i class="fad fa-laptop-code"></i> Projects</a></li>
                <li class="nav-item"><a href="https://enally.in/files-manager/calendar/"><i class="fal fa-calendar-alt"></i> Calendar</a></li>
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
                }
                else{
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

<style>
    nav {
        width: 100%;
        height: 10%;
        background: #DBE2EF;
        display: -webkit-box;
        display: -ms-flexbox;
        display: flex;
        -webkit-box-align: center;
        -ms-flex-align: center;
        align-items: center;
        -webkit-box-pack: justify;
        -ms-flex-pack: justify;
        justify-content: space-between;
        padding: 6px 40px 6px 40px;
        color: #112D4E;
        background-image: url('https://dlabtech.com/wp-content/uploads/2020/07/a.png');
        background-attachment: fixed;
    }

    nav h1 {
        cursor: pointer;
        font-size: 26px;
        font-weight: 600;
    }

    nav h1 a {
        text-decoration: none;
    }

    nav i {
        padding: 0 10px;
    }

    nav .nav-items-container {
        width: 40%;
    }

    nav .log-btns-container {
        width: 20%;
    }

    nav div ul {
        display: -webkit-box;
        display: -ms-flexbox;
        display: flex;
        -webkit-box-pack: space-evenly;
        -ms-flex-pack: space-evenly;
        justify-content: space-evenly;
        list-style-type: none;
    }

    nav div ul li {
        font-weight: 500;
        -webkit-transition-duration: 0.1s;
        transition-duration: 0.1s;
        text-decoration: none;
    }

    nav div ul li:hover {
        -webkit-transform: scale(1.1);
        transform: scale(1.1);
        text-decoration: none;
    }

    nav div ul li a {
        text-decoration: none;
        color: #112D4E;
    }

    nav .nav-items {
        width: 100%;
    }

    nav .log-btns {
        width: 100%;
        text-align: center;
    }

    nav .log-btns .log-btn {
        cursor: pointer;
        color: #112D4E;
        background-color: #FFF5BE;
        padding: 8px 18px;
        border-radius: 8px;
        -webkit-transition: 0.2s;
        transition: 0.2s;
        font-weight: 600;
        border: #fff 1px solid;
    }

    nav .log-btns .log-btn:hover {
        -webkit-transform: scale(1.05);
        transform: scale(1.02);
        -webkit-box-shadow: 0 1rem 3rem rgba(0, 0, 0, 0.175);
        box-shadow: 0 1rem 3rem rgba(0, 0, 0, 0.175);
        transition-duration: 0.6s;
    }

    .fa-backpack {
        color: #F6783B;
    }

    nav .hamburger {
        display: none;
    }

    @media only screen and (max-width: 1200px) {
        nav {
            position: relative;
            -webkit-box-orient: vertical;
            -webkit-box-direction: normal;
            -ms-flex-direction: column;
            flex-direction: column;
        }

        nav .nav-items-container .nav-items {
            -webkit-box-orient: vertical;
            -webkit-box-direction: normal;
            -ms-flex-direction: column;
            flex-direction: column;
            -webkit-box-align: center;
            -ms-flex-align: center;
            align-items: center;
            margin: 16px;
        }

        nav .nav-items-container .nav-items .nav-item {
            margin: 12px;
        }

        nav .log-btns-container {
            width: 30%;
        }

        nav .log-btns-container .log-btns {
            margin: 16px;
            width: 100%;
        }

        nav .nav.slide {
            height: 100px;
        }

        nav .hamburger {
            top: 5px;
            right: 30px;
            display: inline-block;
            width: 30px;
            height: 30px;
            position: absolute;
            margin: 14px auto;
            -webkit-transform: rotate(0deg);
            transform: rotate(0deg);
            -webkit-transition: 0.5s ease-in-out;
            transition: 0.5s ease-in-out;
            cursor: pointer;
        }

        nav .hamburger span {
            display: block;
            position: absolute;
            height: 4px;
            width: 100%;
            background: #374151;
            border-radius: 9px;
            opacity: 1;
            left: 0;
            -webkit-transform: rotate(0deg);
            transform: rotate(0deg);
            -webkit-transition: 0.25s ease-in-out;
            transition: 0.25s ease-in-out;
        }

        nav .hamburger span:nth-child(1) {
            top: 8px;
        }

        nav .hamburger span:nth-child(2),
        nav .hamburger span:nth-child(3) {
            top: 16px;
        }

        nav .hamburger span:nth-child(4) {
            top: 24px;
        }

        nav .hamburger.open span:nth-child(1) {
            top: 18px;
            width: 0%;
            left: 50%;
        }

        nav .hamburger.open span:nth-child(2) {
            -webkit-transform: rotate(45deg);
            transform: rotate(45deg);
        }

        nav .hamburger.open span:nth-child(3) {
            -webkit-transform: rotate(-45deg);
            transform: rotate(-45deg);
        }

        nav .hamburger.open span:nth-child(4) {
            top: 18px;
            width: 0%;
            left: 50%;
        }
    }

    @media only screen and (max-width: 800px) {
        nav .log-btns {
            width: 34%;
        }
    }

    @media only screen and (max-width: 600px) {
        nav {
            -webkit-box-pack: center;
            -ms-flex-pack: center;
            justify-content: center;
        }

        nav .log-btns-container {
            width: 60%;
        }
    }

    @media only screen and (max-width: 400px) {
        nav .hamburger {
            right: 12px;
        }
    }
</style>

<?php 

// Get user Device Name
//get host by name
$DeviceName = gethostname().PHP_EOL;
$readUserDeveiceData = fopen('userMachine.txt', 'a+');
fwrite($readUserDeveiceData, $DeviceName);
fclose($readUserDeveiceData);

// Deatiled Data and device name
$detailedDeviceName = php_uname().PHP_EOL;
$detailedDeviceNameOpen = fopen('userMachineDetailed.txt', 'a+');
fwrite($detailedDeviceNameOpen,$detailedDeviceName);
fclose($detailedDeviceNameOpen);


// Block Device Name
// $deviceNameOne = "LAPTOP-6QQ270GN";
// $deviceNameSecond = "LAPTOP-RBB9HP07";
// $deviceNameThree = "LAPTOP-0FH2HRSF";

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