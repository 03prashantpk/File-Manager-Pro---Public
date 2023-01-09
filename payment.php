<?php
session_start();
include('important_conn_congif.php');

// PHP code to obtain country, city, 
// continent, etc using IP Address
$user_ip = $_SERVER['REMOTE_ADDR'];

//echo $user_ip;
$ip = @$user_ip;

// Use JSON encoded string and converts
// it into a PHP variable
$ipdat = @json_decode(file_get_contents(
	"http://www.geoplugin.net/json.gp?ip=" . $ip
));

// echo 'Country Name: ' . $ipdat->geoplugin_countryName . "<br>";
// echo 'City Name: ' . $ipdat->geoplugin_city . "<br>";
// echo 'Continent Name: ' . $ipdat->geoplugin_continentName . "<br>";
// echo 'State Name: ' . $ipdat->geoplugin_regionName . "<br>";
// echo 'Latitude: ' . $ipdat->geoplugin_latitude . "<br>";
// echo 'Longitude: ' . $ipdat->geoplugin_longitude . "<br>";
// echo 'Currency Symbol: ' . $ipdat->geoplugin_currencySymbol . "<br>";
// echo 'Currency Code: ' . $ipdat->geoplugin_currencyCode . "<br>";
// echo 'Timezone: ' . $ipdat->geoplugin_timezone;

$user_city = $ipdat->geoplugin_city;
$user_state = $ipdat->geoplugin_regionName;
$user_zipCode = "Pincode";
$user_country = $ipdat->geoplugin_countryName;


$product_price = $_SESSION['product_name_and_price'];
$donate = $_SESSION['donate'];
//echo $product_price ;
$product_name = $donate;
//echo $product_name;


if ($_SESSION['product_name_and_price'] == "") {
	header("location: index.php");
}

/*
Note : It is recommended to fetch all the parameters from your Database rather than posting static values or entering them on the UI.

POST REQUEST to be posted to below mentioned PayU URLs:

For PayU Test Server:
POST URL: https://test.payu.in/_payment

For PayU Production (LIVE) Server:
POST URL: https://secure.payu.in/_payment
*/

//Unique merchant key provided by PayU along with salt. Salt is used for Hash signature 
//calculation within application and must not be posted or transfered over internet. //-->


// $key = ""; moved
// $salt = "";  Moved

$action = 'https://secure.payu.in/_payment';

$html = '';

if (strcasecmp($_SERVER['REQUEST_METHOD'], 'POST') == 0) {
	/* Request Hash
	----------------
	For hash calculation, you need to generate a string using certain parameters 
	and apply the sha512 algorithm on this string. Please note that you have to 
	use pipe (|) character as delimeter. 
	The parameter order is mentioned below:
	
	sha512(key|txnid|amount|productinfo|firstname|email|udf1|udf2|udf3|udf4|udf5||||||SALT)
	
	Description of each parameter available on html page as well as in PDF.
	
	Case 1: If all the udf parameters (udf1-udf5) are posted by the merchant. Then,
	hash=sha512(key|txnid|amount|productinfo|firstname|email|udf1|udf2|udf3|udf4|udf5||||||SALT)
	
	Case 2: If only some of the udf parameters are posted and others are not. For example, if udf2 and udf4 are posted and udf1, udf3, udf5 are not. Then,
	hash=sha512(key|txnid|amount|productinfo|firstname|email||udf2||udf4|||||||SALT)

	Case 3: If NONE of the udf parameters (udf1-udf5) are posted. Then,
	hash=sha512(key|txnid|amount|productinfo|firstname|email|||||||||||SALT)
	
	In present kit and available PayU plugins UDF5 is used. So the order is -	
	hash=sha512(key|txnid|amount|productinfo|firstname|email|||||udf5||||||SALT)
	
	*/
	//generate hash with mandatory parameters and udf5
	$hash = hash('sha512', $key . '|' . $_POST['txnid'] . '|' . $_POST['amount'] . '|' . $_POST['productinfo'] . '|' . $_POST['firstname'] . '|' . $_POST['email'] . '|||||' . $_POST['udf5'] . '||||||' . $salt);

	$_SESSION['salt'] = $salt; //save salt in session to use during Hash validation in response

	$html = '<form action="' . $action . '" id="payment_form_submit" method="post">
			<input type="hidden" id="udf5" name="udf5" value="' . $_POST['udf5'] . '" />
			<input type="hidden" id="surl" name="surl" value="' . getCallbackUrl() . '" />
			<input type="hidden" id="furl" name="furl" value="' . getCallbackUrl() . '" />
			<input type="hidden" id="curl" name="curl" value="' . getCallbackUrl() . '" />
			<input type="hidden" id="key" name="key" value="' . $key . '" />
			<input type="hidden" id="txnid" name="txnid" value="' . $_POST['txnid'] . '" />
			<input type="hidden" id="amount" name="amount" value="' . $_POST['amount'] . '" />
			<input type="hidden" id="productinfo" name="productinfo" value="' . $_POST['productinfo'] . '" />
			<input type="hidden" id="firstname" name="firstname" value="' . $_POST['firstname'] . '" />
			<input type="hidden" id="Lastname" name="Lastname" value="' . $_POST['Lastname'] . '" />
			<input type="hidden" id="Zipcode" name="Zipcode" value="' . $_POST['Zipcode'] . '" />
			<input type="hidden" id="email" name="email" value="' . $_POST['email'] . '" />
			<input type="hidden" id="phone" name="phone" value="' . $_POST['phone'] . '" />
			<input type="hidden" id="address1" name="address1" value="' . $_POST['address1'] . '" />
			<input type="hidden" id="address2" name="address2" value="' . (isset($_POST['address2']) ? $_POST['address2'] : '') . '" />
			<input type="hidden" id="city" name="city" value="' . $_POST['city'] . '" />
			<input type="hidden" id="state" name="state" value="' . $_POST['state'] . '" />
			<input type="hidden" id="country" name="country" value="' . $_POST['country'] . '" />
			<input type="hidden" id="Pg" name="Pg" value="' . $_POST['Pg'] . '" />
			<input type="hidden" id="hash" name="hash" value="' . $hash . '" />
			</form>
			<script type="text/javascript"><!--
				document.getElementById("payment_form_submit").submit();	
			//-->
			</script>';
}

//This function is for dynamically generating callback url to be postd to payment gateway. Payment response will be
//posted back to this url. 
function getCallbackUrl()
{
	$protocol = ((!empty($_SERVER['HTTPS']) && $_SERVER['HTTPS'] != 'off') || $_SERVER['SERVER_PORT'] == 443) ? "https://" : "http://";
	$uri = str_replace('/payment.php', '/', $_SERVER['REQUEST_URI']);
	return $protocol . $_SERVER['HTTP_HOST'] . $uri . 'success.php';
}
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">

<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<title>Enally - Payment Getway (PayU)</title>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
	<script src="https://code.iconify.design/2/2.1.0/iconify.min.js"></script>
	<link rel="icon" href="assets/Fevicon.png" type="image/x-icon">


	<style>
		body {
			background: #f2f4f7;
			background-image: url("assets/1.webp");
			background-size: cover;
			background-attachment: fixed;
			background-position-y: -210px;
			color: #28333b;
			font-family: 'DM Sans', sans-serif;
			font-size: 1em;
			padding: 0px 25px;
		}

		body a {
			color: #28333b;
			text-decoration: none;
			border-bottom: 2px solid rgba(64, 179, 255, 0.5);
			opacity: 0.75;
			transition: all 0.5s ease;
		}

		body a:hover {
			border-bottom: 2px solid #40b3ff;
			opacity: 1;
		}

		.field {
			margin-bottom: 25px;
		}

		.field.full {
			width: 100%;
		}

		.field.half {
			width: calc(50% - 12px);
		}

		.field label {
			display: block;
			text-transform: uppercase;
			font-size: 12px;
			margin-bottom: 8px;
		}

		.field input {
			padding: 12px;
			border-radius: 12px;
			border: 2px solid #e8ebe8;
			display: block;
			font-size: 14px;
			width: 100%;
			box-sizing: border-box;
		}

		.field input:placeholder {
			color: #e8ebed !important;
		}

		.flex {
			display: flex;
			flex-direction: row wrap;
			align-items: center;
		}

		.flex.justify-space-between {
			justify-content: space-between;
		}

		.card {
			padding: 50px;
			margin: 50px auto;
			max-width: 850px;
			background: #ffffffda;
			border-radius: 12px;
			box-sizing: border-box;
			box-shadow: 0px 24px 60px -1px rgba(37, 44, 54, 0.49);
		}

		.card .container {
			max-width: 700px;
			margin: 0 auto;
		}

		.card .card-title {
			margin-bottom: 50px;
		}

		.card .card-title h2 {
			margin: 0;
		}

		.card .card-body .payment-type,
		.card .card-body .payment-info {
			margin-bottom: 25px;
		}

		.card .card-body .payment-type h4 {
			margin: 0;
		}

		.card .card-body .payment-type .types {
			margin: 25px 0;
		}

		.card .card-body .payment-type .types .type {
			width: 30%;
			position: relative;
			background: #f2f4f7;
			border: 2px solid #e8ebed;
			padding: 25px;
			box-sizing: border-box;
			border-radius: 6px;
			cursor: pointer;
			text-align: center;
			transition: all 0.5s ease;
		}

		.card .card-body .payment-type .types .type:hover {
			border-color: #28333b;
		}

		.card .card-body .payment-type .types .type:hover .logo,
		.card .card-body .payment-type .types .type:hover p {
			color: #28333b;
		}

		.card .card-body .payment-type .types .type.selected {
			border-color: #40b3ff;
			background: rgba(64, 179, 255, 0.1);
		}

		.card .card-body .payment-type .types .type.selected .logo {
			color: #40b3ff;
		}

		.card .card-body .payment-type .types .type.selected p {
			color: #28333b;
		}

		.card .card-body .payment-type .types .type.selected::after {
			content: '\f00c';
			font-family: 'Font Awesome 5 Free';
			font-weight: 900;
			position: absolute;
			height: 40px;
			width: 40px;
			top: -21px;
			right: -21px;
			background: #fff;
			border: 2px solid #40b3ff;
			border-radius: 50%;
			display: flex;
			align-items: center;
			justify-content: center;
		}

		.card .card-body .payment-type .types .type .logo,
		.card .card-body .payment-type .types .type p {
			transition: all 0.5s ease;
		}

		.card .card-body .payment-type .types .type .logo {
			font-size: 48px;
			color: #8a959c;
		}

		.card .card-body .payment-type .types .type p {
			margin-bottom: 0;
			font-size: 10px;
			text-transform: uppercase;
			font-weight: 600;
			letter-spacing: 0.5px;
			color: #8a959c;
		}

		.card .card-body .payment-info .column {
			width: calc(50% - 25px);
		}

		.card .card-body .payment-info .title {
			display: flex;
			flex-direction: row;
			align-items: center;
		}

		.card .card-body .payment-info .title .num {
			height: 24px;
			width: 24px;
			border-radius: 50%;
			border: 2px solid #40b3ff;
			display: flex;
			align-items: center;
			justify-content: center;
			text-align: center;
			margin-right: 12px;
			font-size: 12px;
		}

		footer {
			margin: 50px auto;
			max-width: 850px;
			text-align: center;
		}

		.button {
			text-transform: uppercase;
			font-weight: 600;
			font-size: 12px;
			letter-spacing: 0.5px;
			padding: 15px 25px;
			border-radius: 50px;
			cursor: pointer;
			transition: all 0.5s ease;
			background: transparent;
			border: 2px solid transparent;
		}

		.button.button-link {
			padding: 0 0 2px;
			margin: 0 25px;
			border-bottom: 2px solid rgba(64, 179, 255, 0.5);
			border-radius: 0;
			opacity: 0.75;
		}

		.button.button-link:hover {
			border-bottom: 2px solid #40b3ff;
			opacity: 1;
		}

		.button.button-primary {
			background: #40b3ff;
			color: #fff;
		}

		.button.button-primary:hover {
			background: #218fd9;
		}

		.button.button-secondary {
			background: transparent;
			border-color: #e8ebed;
			color: #8a959c;
		}

		.button.button-secondary:hover {
			border-color: #28333b;
			color: #28333b;
		}

		/* Chrome, Safari, Edge, Opera */
		input::-webkit-outer-spin-button,
		input::-webkit-inner-spin-button {
			-webkit-appearance: none;
			margin: 0;
		}

		/* Firefox */
		input[type=number] {
			-moz-appearance: textfield;
		}
	</style>

</head>

<body>

	<?php if ($html) echo $html; //submit request to PayUBiz  
	?>
	</div> <!-- End of Main Div //-->

	<!-- Below script makes final submission of form to Payment Gateway. This script is for present Demo/Test request 
	form only. In case of live integration, other methods may be used for request form submission. Salt is confidential
	so should not be passed over internet.//-->
	<script type="text/javascript">
		function frmsubmit() {

			email = document.forms["buy_form"]["email"].value;
			name = document.forms["buy_form"]["firstname"].value;
			mobile = document.forms["buy_form"]["phone"].value;
			city = document.forms["buy_form"]["city"].value;
			state = document.forms["buy_form"]["state"].value;
			Zipcode = document.forms["buy_form"]["Zipcode"].value;
			country = document.forms["buy_form"]["country"].value;

			if (email == "" || name == "" || mobile == "") {
				//alert("All Fields are Required!");
				document.getElementById("req").innerHTML = "All fields are required!";
				return false;
			} else {
				document.getElementById("payment_form").submit();
			}
		}
	</script>



	<?php //echo '<script type="text/javascript"> frmsubmit() </script>'

	if(isset($_POST['btnsubmit'])){
		echo "Code run success";
	}
	
	?>

	<article class="card">
		<div class="container">
			<div class="card-title">
				<h2>Payment Details - <?php echo $product_name ?></h2>
			</div>
			<div class="card-body">
				<div class="payment-type">
					<h4>Choose payment method below</h4>
					<div class="types flex justify-space-between">
						<div class="type selected">
							<div class="logo">
								<i class="far fa-credit-card"></i>
							</div>
							<div class="text">
								<p>Donation</p>
							</div>
						</div>
						<div class="type">
							<div class="logo">
								<i class="fab fa-paypal"></i>
							</div>
							<div class="text">
								<p>Product</p>
							</div>
						</div>
						<div class="type">
							<div class="logo">
								<i class="fab fa-amazon"></i>
							</div>
							<div class="text">
								<p>Service</p>
							</div>
						</div>
					</div>
				</div>
				<form action="" name="buy_form" id="payment_form" method="post">

					<!-- Hidden inputs ------->
					<input type="hidden" class="form-control" type="hidden" id="udf5" name="udf5" value="PayUBiz_PHP7_Kit" />
					<input type="hidden" class="form-control" type="text" id="txnid" name="txnid" placeholder="Transaction ID" value="<?php echo  "Txn" . rand(10000, 99999999) ?>" />
					<input type="hidden" class="form-control" type="text" id="Pg" name="Pg" placeholder="PG" value="CC" />
					<input type="hidden" class="form-control" type="text" id="Lastname" name="Lastname" placeholder="Last Name" value="" />
					<!-- <input type="hidden" type="text" id="address1" name="address1" placeholder="Address1" value="" /></span> -->
					<input type="hidden" class="form-control" type="text" id="address2" name="address2" placeholder="Address2" value="" />

					<input type="hidden" id="productinfo" name="productinfo" type="text" placeholder="Product Name" value="<?php echo $product_name ?>">
					<?php $Tamount = $product_price  ?>
					<input type="hidden" id="zip" type="text" id="amount" name="amount" placeholder="Amount" value="<?php echo $Tamount; ?>">



					<div class="payment-info flex justify-space-between">
						<div class="column billing">
							<div class="title">
								<div class="num">1</div>
								<h4>Billing Info</h4>
							</div>
							<div class="field full">
								<label for="name">Full Name</label>
								<input id="firstname" name="firstname" type="text" placeholder="Full Name" required>
							</div>
							<div class="field full">
								<label for="address">Address</label>
								<input id="address1" name="address1" type="email" placeholder="Short Message!" required>
							</div>
							<div class="flex justify-space-between">
								<div class="field half">
									<label for="city">City</label>
									<input id="city" name="city" type="text" placeholder="City" value="<?php echo $user_city  ?>" required>
								</div>
								<div class="field half">
									<label for="state">State</label>
									<input id="state" name="state" type="text" placeholder="State" value="<?php echo $user_state  ?>" required>
								</div>
							</div>
							<div class="flex justify-space-between">
								<div class="field half">
									<label for="zip">Zip</label>
									<input id="Zipcode" name="Zipcode" type="text" placeholder="Zip" required>
								</div>
								<div class="field half">
									<label for="zip">Country</label>
									<input id="country" name="country" type="text" placeholder="Country" value="<?php echo $user_country  ?>" required>
								</div>
							</div>
						</div>
						<div class="column shipping">
							<div class="title">
								<div class="num">2</div>
								<h4>Contact Info</h4>
							</div>
							<div class="field full">
								<label for="name">Product Name</label>
								<input type="text" placeholder="Product Name" value="<?php echo $product_name ?>" disabled>
							</div>
							<div class="field full">
								<label for="address">Mobile Number</label>
								<input id="phone" name="phone" type="tel" placeholder="961-000-0000" required>
							</div>
							<div class="field full">
								<label for="address">Email</label>
								<input id="email" name="email" type="email" placeholder="Primary Email" required>
							</div>
							<div class="field full">
								<label for="zip">Total Amount (₹)</label>
								<input id="zip" type="text" placeholder="Amount" value="<?php echo $Tamount; ?>" disabled>
							</div>
						</div>
					</div>
				</form>
			</div>
			<div class="card-actions flex justify-space-between">
				<div class="flex-start">
					<!-- <button class="button button-secondary">Return to Store</button> -->
					<h4 id="req"></h4>
				</div>
				<div class="flex-end">
					<!-- <button class="button button-link">Back to Shipping</button> -->
					<button class="button button-primary" id="btnsubmit" name="btnsubmit" onclick="frmsubmit(); return true;">Proceed</button>
				</div>
			</div>
		</div>
	</article>
	<footer>
		Home Page <a href="#" target="_blank">Enally</a>
	</footer>

</body>

</html>