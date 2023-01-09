<?php
session_start();
if (!isset($_SESSION['UserData']['Username'])) {
    header("location:login");
    exit;
}
?>
<!DOCTYPE html>
<html>
<link rel="icon" href="assets/Fevicon.png" type="image/x-icon">
<style>
    @import url('https://fonts.googleapis.com/css2?family=Poppins&display=swap');
    @import url('https://fonts.googleapis.com/css2?family=Poppins:wght@300;400&display=swap');

    body {
        margin: 0;
        padding: 0;
    }

    .photo {
        background-image: linear-gradient(rgba(0, 0, 0, 0.2), rgba(0, 0, 0, 0.5)), url(https://source.unsplash.com/1600x900/?forest,mountain,road,mist,fog,night,car,universe);
        background-repeat: no-repeat;
        background-position: center;
        background-size: cover;
        height: 100vh;
        display: grid;
        grid-template-columns: 1fr 1fr 1fr 1fr;
        grid-template-rows: 1fr 1fr 1fr 1fr 1fr;
    }

    .times {
        padding: 1rem;
        margin-bottom: 4rem;
        margin-left: 4rem;
        grid-area: 5/1/5/2;
        font-family: -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, Oxygen, Ubuntu, Cantarell, 'Open Sans', 'Helvetica Neue', sans-serif;
        font-weight: 100;
        text-align: right;
        color: white;
    }

    .time {
        text-align: center;
        color: white;
        font-size: 1.5rem;
    }

    .times .t {
        margin: 0;
        padding: 0;
        font-size: 10rem;
        text-align: left;
    }

    .times .d {
        text-align: left;
        margin: 0;
        padding: 0;
        font-size: 2.1rem;
        padding-left: 20px;
        font-weight: 600;
    }

    @media screen and (max-width:768px) {
        .photo {
            background-image: linear-gradient(rgba(0, 0, 0, 0.6), rgba(0, 0, 0, 0.607)), url(https://source.unsplash.com/1600x900/?forest,city,mountain,road,lake,water,river,station);
            display: flex;
            height: 100vh;
            justify-content: center;
            align-content: center;
            align-items: center;
        }

        .times {
            margin: 0;
            padding: 0;
            font-family: -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, Oxygen, Ubuntu, Cantarell, 'Open Sans', 'Helvetica Neue', sans-serif;
            font-weight: 100;
            font-size: 42px;
            text-align: center;
            color: white;
        }

        .time {
            display: none;
            /* text-align: center; color: white; font-size: 1rem; border: 4px solid white; */
        }

        .times .t {
            font-size: 5rem;
            text-align: center;
        }

        .times .d {
            text-align: center;
            font-size: 1.3rem;
        }
    }

    .unlocker {
        font-size: 16px;
        cursor: pointer;
        color: #fff;
        font-weight: 500;
        text-shadow: rgba(167, 161, 161, 0.925) 2px 2px 8px;
    }
</style>
<link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" />
<script src="https://code.iconify.design/2/2.0.3/iconify.min.js"></script>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lock Screen</title>
    <link rel="stylesheet" href="css/style.css">
</head>

<body onload="startTime()">
    <div class="photo">
        <div class="time"></div>
        <div class="time"></div>
        <div class="time"></div>
        <div class="time"></div>
        <div class="time"></div>
        <div class="time"></div>
        <div class="time"></div>
        <div class="time"></div>
        <div class="time"></div>
        <div class="time"></div>
        <div class="time"></div>
        <div class="time"></div>
        <div class="time"></div>
        <div class="time"></div>
        <div class="time"></div>
        <div class="time"></div>
        <div class="times">
            <p class="t" id="txt"></p>
            <p class="d" id="date"></p><br>
            <p class="d" style="font-size: 16px;">You are not logged out</p>
            <p class="d unlocker" onclick="history.back()"><span class="iconify" data-icon="clarity:unlock-line" style="color: white;"></span>Unlock </p>
        </div>
        <div class="time"></div>
        <div class="time"></div>
    </div>
    <script src="js/app.js"></script>
</body>
<script>
    function startTime() {
        var today = new Date();
        var h = today.getHours();
        var m = today.getMinutes();
        m = checkTime(m);
        document.getElementById('txt').innerHTML = h + ":" + m;
        var t = setTimeout(startTime, 500);
    }

    function checkTime(i) {
        if (i < 10) {
            i = "0" + i
        };
        return i;
    }
    var options = {
        day: 'numeric',
        year: 'numeric',
        month: 'long'
    };
    var today1 = new Date();
    document.getElementById('date').innerHTML = (today1.toLocaleDateString("en-US"));
    document.getElementById('date').innerHTML = (today1.toLocaleDateString("en-US", options)); 
</script>

</html>