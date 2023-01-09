<?php session_start(); /* Starts the session */

/* Check Login form submitted */
if (isset($_POST['Submit'])) {

	/* Define username and associated password array */

	include("important_conn_congif.php");
	// new users added

	/* Check and assign submitted Username and Password to new variable */

	$Username = isset($_POST['Username']) ? $_POST['Username'] : '';
	$Password = isset($_POST['Password']) ? $_POST['Password'] : '';

	/* Check Username and Password existence in defined array */

	if (isset($logins[$Username]) && $logins[$Username] == $Password) {

		/* Success: Set session variables and redirect to Protected page  */

		$_SESSION['UserData']['Username'] = $logins[$Username];

		header("location: index");

		exit;
	} else {

		/*Unsuccessful attempt: Set error message */

		$msg = "<hr class='my-4'><span style='color:red'>Wrong Password! (Ask for Password on WhatsApp or <a href='https://enally.in'>Enally.in</a>)</span>";
	}
}
?>
<html>

<head>
	<!-- Title -------->
	<title>Classroom Bucket - Login </title>
	<link rel="icon" href="assets/Fevicon.png" type="image/x-icon">

	<!-- Js and CSS Links ---->
	<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.js"></script>
	<script type="text/javascript" src="//code.jquery.com/jquery-1.10.2.min.js"></script>
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
	<!-- CSS only -->
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
	<!-- JavaScript Bundle with Popper -->
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
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
	<style>
		:root {
			--input-padding-x: 1.5rem;
			--input-padding-y: .75rem;
		}

		body {
			background: linear-gradient(rgba(0, 0, 0, .6), rgba(0, 0, 0, .6)), url('https://source.unsplash.com/1600x900/?study,laptop,desktop,study-room');
			opacity: 0.89;
			background-attachment: fixed;
			background-size: cover;
			background-position: bottom;
			margin-top: 7%;
		}

		.card-signin {
			border: 0;
			border-radius: 1rem;
			box-shadow: 0 0.5rem 2rem 0 rgba(0, 0, 0, 0.5);
			opacity: 0.97;
		}

		.card-signin .card-title {
			margin-bottom: 2rem;
			font-weight: 600;
			font-size: 1.5rem;
		}

		.card-signin .card-body {
			padding: 2rem;
		}

		.form-signin {
			width: 100%;
		}

		.form-signin .btn {
			font-size: 80%;
			border-radius: 5rem;
			letter-spacing: .1rem;
			font-weight: bold;
			padding: 1rem;
			transition: all 0.2s;
			background-color: #F94620;
			border: none;
		}

		.form-signin .btn:hover {
			font-size: 80%;
			border-radius: 5rem;
			letter-spacing: .1rem;
			font-weight: bold;
			padding: 1rem;
			transition: all 0.2s;
			background-color: #F94610;
			border: none;
		}

		.form-label-group {
			position: relative;
			margin-bottom: 1rem;
		}

		.form-label-group input {
			height: auto;
			border-radius: 2rem;
		}

		.form-label-group>input,
		.form-label-group>label {
			padding: var(--input-padding-y) var(--input-padding-x);
		}

		.form-label-group>label {
			position: absolute;
			top: 0;
			left: 0;
			display: block;
			width: 100%;
			margin-bottom: 0;
			/* Override default `<label>` margin */
			line-height: 1.5;
			color: #495057;
			border: 1px solid transparent;
			border-radius: .25rem;
			transition: all .1s ease-in-out;
		}

		.form-label-group input::-webkit-input-placeholder {
			color: transparent;
		}

		.form-label-group input:-ms-input-placeholder {
			color: transparent;
		}

		.form-label-group input::-ms-input-placeholder {
			color: transparent;
		}

		.form-label-group input::-moz-placeholder {
			color: transparent;
		}

		.form-label-group input::placeholder {
			color: transparent;
		}

		.form-label-group input:not(:placeholder-shown) {
			padding-top: calc(var(--input-padding-y) + var(--input-padding-y) * (2 / 3));
			padding-bottom: calc(var(--input-padding-y) / 3);
		}

		.form-label-group input:not(:placeholder-shown)~label {
			padding-top: calc(var(--input-padding-y) / 3);
			padding-bottom: calc(var(--input-padding-y) / 3);
			font-size: 12px;
			color: #777;
		}

		.btn-google {
			color: white;
			background-color: #ea4335;
		}

		.btn-facebook {
			color: white;
			background-color: #3b5998;
		}

		/* Fallback for Edge
-------------------------------------------------- */

		@supports (-ms-ime-align: auto) {
			.form-label-group>label {
				display: none;
			}

			.form-label-group input::-ms-input-placeholder {
				color: #777;
			}
		}

		/* Fallback for IE
-------------------------------------------------- */

		@media all and (-ms-high-contrast: none),
		(-ms-high-contrast: active) {
			.form-label-group>label {
				display: none;
			}

			.form-label-group input:-ms-input-placeholder {
				color: #777;
			}
		}

		footer {
			position: fixed;
			left: 0;
			bottom: 0;
			width: 100%;
			color: white;
			text-align: center;
			padding-bottom: 2px;
		}

		footer:hover {
			position: fixed;
			left: 0;
			color: #fff;
			bottom: 0;
			width: 100%;
			color: white;
			text-align: center;
			padding-bottom: 2px;
		}

		header {
			position: fixed;
			left: 0;
			top: 2%;
			width: 100%;
			color: white;
			text-align: center;
			padding-bottom: 2px;
		}

		header:hover {
			position: fixed;
			left: 0;
			top: 2%;
			width: 100%;
			color: white;
			text-align: center;
			padding-bottom: 2px;
		}

		#clock {
			text-align: center;
			margin-top: 0%;
			font-size: 22px;
			font-weight: 600;
			width: 150px;
			border-radius: 12px;
			float: left;
			margin-left: 10px;
			color: #f1f1f194;
			text-shadow: #f1f1f11a;
		}

		#clock2 {
			text-align: center;
			margin-top: 0%;
			font-size: 22px;
			font-weight: 600;
			width: 150px;
			border-radius: 12px;
			float: right;
			margin-right: 10px;
			color: #f1f1f194;
			text-shadow: #f1f1f11a;
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

		input[Type=text] {
			opacity: 1.0;
		}.fa-backpack{
			color: #ea4335;
		}
	</style>
</head>

<body>
	<div class="container">
		<div class="row">
			<div class="col-sm-9 col-md-7 col-lg-5 mx-auto">
				<div class="card card-signin my-5">
					<div class="card-body">
						<h5 class="card-title text-center"><i class="fas fa-backpack"></i> Classroom Bucket <br><span style="font-size:17px;"></span></h5>
						<form class="form-signin" action="" method="POST">
							<div class="form-label-group">
								<input id="inputEmail" class="form-control" list="inputEmail" name="Username" placeholder="Username" required>
								<label for="inputEmail">Username</label>
								<datalist id="inputEmail">
									<option value="user">Normal User</option>
									<option value="">Btech User</option>
								</datalist>
							</div>

							<div class="form-label-group">
								<input type="password" id="inputPassword" class="form-control" name="Password" placeholder="Password" required>
								<label for="inputPassword">Password</label>
							</div>
							<button data-aos="fade-down" class="btn btn-lg btn-primary btn-block text-uppercase" name="Submit" type="submit">Sign in</button>
							<div style="display:flex; justify-content:center;">
								<hr style="width: 30%;">
							</div>
							<p  style="text-align: center;">Subscribe to get - <b>Username & Password <a href="https://enally.in/files-manager/subscribe-us"><i class="fas fa-external-link-square"></i></a></b> <br> <span style="color: #F94610; font-size: 14px;">For Super User Access Contact Admin</span><br> <a style="text-decoration: none;" href="https://enally.in/files-manager/">Continue Without Login</a> </p>
							<p><?php if (isset($msg)) {
									echo $msg;
								} ?></p>
						</form>
					</div>
				</div>
			</div>
		</div>
	</div>

	<header>
		<h3 style="color: #000; text-shadow: #f1f1f1 -2px;">
			<script>
				function clock() {

					//Save the times in variables

					var today = new Date();

					var hours = today.getHours();
					var minutes = today.getMinutes();
					var seconds = today.getSeconds();


					//Set the AM or PM time

					if (hours >= 12) {
						meridiem = " PM";
					} else {
						meridiem = " AM";
					}


					//convert hours to 12 hour format and put 0 in front
					if (hours > 12) {
						hours = hours - 12;
					} else if (hours === 0) {
						hours = 12;
					}

					//Put 0 in front of single digit minutes and seconds

					if (minutes < 10) {
						minutes = "0" + minutes;
					} else {
						minutes = minutes;
					}

					if (seconds < 10) {
						seconds = "0" + seconds;
					} else {
						seconds = seconds;
					}


					document.getElementById("clock").innerHTML = (hours + ":" + minutes + ":" + seconds + meridiem);

				}


				setInterval('clock()', 1000);
			</script>


			<footer>
				<!-- <div data-aos="fade-up" data-aos-duration="3000" style="width: 80%; font-size: 16px; text-align:center; display: flex; justify-content:center; padding-left: 25%;">
					<div class="alert alert-success alert-dismissible fade show" role="alert">
						<strong>Information!</strong> Website Says Unsecure? Yes, Because we don't have SSL. But, No need to worry. We don't need your personal information. <b>- Admin Prashant</b>
						<button type="button" style="font-size: 22px; font-weight: 600;" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
					</div>
				</div> -->

				<h3 id="clock" style=" color: #ffffff91;">
				</h3>

				<a href="../" data-aos='fade-left' data-aos-anchor='#example-anchor' data-aos-offset='700' data-aos-duration='500' style=" color: #ffffff91; text-align: center; float: right; padding-right: 10px; font-size: 25px; padding-bottom: 10px"><i class="fa fa-home" aria-hidden="true"></i>
				</a>
				<?php
				//checking connection with @fopen
				if (@fopen("https://enally.in", "r")) {
					echo " <a href='#' data-aos='fade-left'
					data-aos-anchor='#example-anchor'
					data-aos-offset='500'
					data-aos-duration='500' onclick='return false;' style=' color: #ffffff91; text-align: center; float: right; padding-right: 10px; font-size: 27px; padding-bottom: 10px;'><i class='fa fa-check-circle' style='color: green' aria-hidden='true'> <span style='color: #ffffff91;  font-size: 22px;
            font-weight: 600;'>Online</span></i>
            </a>";
				} else {
					echo " <a href='#' onclick='return false;'  style=' color: #ffffff91; text-align: center; float: right; padding-right: 10px; font-size: 27px; padding-bottom: 10px;'><i class='fa fa-times-circle' style='color:#ffffff91 ' aria-hidden='true'><span style='color: green;  font-size: 22px;
            font-weight: 600;'> Offline</span></i>
            </a>";
				} ?>
			</footer>
</body>
</html>