<html>
<head>
    <title>Home Page</title>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="Keywords" content="Get Job, Hire, work online, Online projects, Collagorate, Enally, Prashant Enally">
    <meta name="description" content="EnALly - Entrepreneur's Abode of Alliance! An association of human assets and inventive minds. Merge of skills and passion is our mantra.">
    <link rel="icon" href="https://enally.in/files-manager/assets/Fevicon.png" type="image/x-icon">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

    <!---- Google Analytics Tag ----------------->
    <!-- Global site tag (gtag.js) - Google Analytics -->
    <script async src="https://www.googletagmanager.com/gtag/js?id=G-5BHYZ0D5LV"></script>
    <script async src="https://pagead2.googlesyndication.com/pagead/js/adsbygoogle.js?client=ca-pub-7927904998579486"
     crossorigin="anonymous"></script>
    <script>
        window.dataLayer = window.dataLayer || [];

        function gtag() {
            dataLayer.push(arguments);
        }
        gtag('js', new Date());

        gtag('config', 'G-5BHYZ0D5LV');
    </script>


    <style>
        html,
        body,
        .wrapper {
            height: 100%;
        }

        html,
        body {
            padding: 0;
            margin: 0;
        }

        body {
            font: 0.6596306069rem 'Montserrat', Arial, sans-serif;
        }

        .wrapper {
            position: relative;
            <?php
            /* This sets the $time variable to the current hour in the 24 hour clock format */
            $time = date("H");
            /* Set the $timezone variable to become the current timezone */
            $timezone = date("e");
            /* If the time is less than 1200 hours, show good morning */
            if ($time < "12") {
                echo "background: linear-gradient(rgba(0, 0, 0, .6), rgba(0, 0, 0, .4)), url(https://wallpaperaccess.com/full/633957.jpg) no-repeat center center / cover;";
            } else
            /* If the time is grater than or equal to 1200 hours, but less than 1700 hours, so good afternoon */
            if ($time >= "12" && $time < "17") {
                echo "background: linear-gradient(rgba(0, 0, 0, .6), rgba(0, 0, 0, .4)), url(https://wallpaperaccess.com/full/633995.jpg) no-repeat center center / cover;";
            } else
            /* Should the time be between or equal to 1700 and 1900 hours, show good evening */
            if ($time >= "17" && $time < "19") {
                echo "background: linear-gradient(rgba(0, 0, 0, .6), rgba(0, 0, 0, .4)), url(https://wallpaperaccess.com/full/634001.jpg) no-repeat center center / cover;";
            } else
            /* Finally, show good night if the time is greater than or equal to 1900 hours */
            if ($time >= "19") {
                echo "background: linear-gradient(rgba(0, 0, 0, .6), rgba(0, 0, 0, .3)), url(https://wallpaperaccess.com/full/634045.jpg) no-repeat center center / cover;";
            }
            ?>
            /*background: url(https://wallpaperaccess.com/full/633957.jpg) no-repeat center center / cover; 
            background: linear-gradient(rgba(0, 0, 0, .6), rgba(0, 0, 0, .6)), url('/images/bakgnd.jpg');
            
            */
        }

        .wrapper:before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background-color: rgba(33, 33, 33, .25);
        }

        header,
        .content,
        footer {
            position: absolute;
        }

        header,
        footer {
            width: 100%;
        }

        header {
            top: 0;
            text-align: center;
        }

        .header__logo {
            max-width: 65px;
            fill: #fff;
        }

        .content {
            top: 50%;
            left: 50%;
            text-align: center;
            color: #fff;
            transform: translate(-50%, -50%);
        }

        .content h1 {
            margin-top: 0;
            font-size: 52px;
        }

        .content form {
            margin: auto;
            display: table;
        }

        .content input {
            float: left;
            font-size: 16px;
            border: 1px solid #fff;
        }

        .content input[type=email] {
            padding: 12px;
            background: #fff;
            border-top-left-radius: 4px;
            border-bottom-left-radius: 4px;
        }

        .content input[type=submit] {
            padding: 12px 24px;
            color: #fff;
            background: transparent;
            border-top-right-radius: 4px;
            border-bottom-right-radius: 4px;
            cursor: pointer;
            transition: all 0.235s ease-in-out;
        }

        .content input[type=submit]:hover {
            color: #212121;
            background: #fff;
        }

        .countdown {
            margin: auto;
            display: table;
            font-size: 28px;
            font-weight: 500;
        }

        .countdown>div {
            float: left;
            min-width: 80px;
        }

        .countdown span {
            position: relative;
            display: block;
            font-size: 16px;
            text-align: center;
        }

        .countdown span:before {
            content: '';
            position: absolute;
            top: -2px;
            right: 0;
            left: 0;
            margin-right: auto;
            margin-left: auto;
            width: 20px;
            height: 1px;
            background: #fff;
        }

        footer {
            padding-bottom: 12px;
            bottom: 0;
        }

        .footer__links {
            text-align: center;
            list-style-type: none;
        }

        .footer__links li {
            display: inline-block;
        }

        .footer__links li:nth-of-type(n+2) {
            margin-left: 12px;
        }

        .footer__links a {
            padding: 8px 0;
            display: block;
            width: 41px;
            text-align: center;
            color: #fff;
            border: 1px solid;
            border-radius: 50%;
            transition: opacity 0.235s ease-in-out;
        }

        .footer__links a:hover {
            opacity: 0.5;
        }

        .footer__links .fa {
            vertical-align: middle;
            font-size: 21px;
        }
        p{
            font-size: 18px;
        }
        button{
            width: 180px;
            background-color: #fff;
            color: #424242;
            border: none;
            border-radius: 8px;
            font-size: 19px;
            padding: 8px;
            cursor: pointer;
            transition: opacity 0.535s ease-in-out;
        }
    </style>
</head>

<body oncontextmenu="return false;">
    <div class="wrapper">


        <main class="content">
            <h1>COMING BACK SOON!</h1>

            <div class="countdown">
                <div class="countdown__days">
                    <div class="number"></div>
                    <span class>Days</span>
                </div>

                <div class="countdown__hours">
                    <div class="number"></div>
                    <span class>Hours</span>
                </div>

                <div class="countdown__minutes">
                    <div class="number"></div>
                    <span class>Minutes</span>
                </div>

                <div class="countdown__seconds">
                    <div class="number"></div>
                    <span class>Seconds</span>
                </div>
            </div>

            <p>Our website is under construction. We`ll be here soon<br />with our new awesome site. <br><br> </p>

    
                <button onclick="window.location.href='contact.php'"  >Contact Us <i class="fa fa-paper-plane"></i> </button>

        </main>

        <footer>
    <ul class="footer__links">
      <li><a href="https://instagram.com/prashantpkumar"><span class="fa fa-instagram"></span></a></li>
      <li><a href="https://facebook.com/Prashant96120Pk"><span class="fa fa-facebook"></span></a></li>
      <li><a href="https://github.com/03prashantpk"><span class="fa fa-github"></span></a></li>
      <li><a href="https://linkedin.com/in/03prashantpk"><span class="fa fa-linkedin"></span></a></li>
    </ul>
  </footer>

       
    </div>

</body>
<script>
    (() => {
  // Specify the deadline date
  const deadlineDate = new Date('January 31, 2022 23:59:59').getTime();
  
  // Cache all countdown boxes into consts
  const countdownDays = document.querySelector('.countdown__days .number');
  const countdownHours= document.querySelector('.countdown__hours .number');
  const countdownMinutes= document.querySelector('.countdown__minutes .number');
  const countdownSeconds= document.querySelector('.countdown__seconds .number');

  // Update the count down every 1 second (1000 milliseconds)
  setInterval(() => {    
    // Get current date and time
    const currentDate = new Date().getTime();

    // Calculate the distance between current date and time and the deadline date and time
    const distance = deadlineDate - currentDate;

    // Calculations the data for remaining days, hours, minutes and seconds
    const days = Math.floor(distance / (1000 * 60 * 60 * 24));
    const hours = Math.floor((distance % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
    const minutes = Math.floor((distance % (1000 * 60 * 60)) / (1000 * 60));
    const seconds = Math.floor((distance % (1000 * 60)) / 1000);

    // Insert the result data into individual countdown boxes
    countdownDays.innerHTML = days;
    countdownHours.innerHTML = hours;
    countdownMinutes.innerHTML = minutes;
    countdownSeconds.innerHTML = seconds;
  }, 1000);
})();
</script>

</html>