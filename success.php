<?php
session_start();
/*Note : After completing transaction process it is recommended to make an enquiry call with PayU to validate the response received and then save the response to DB or display it on UI*/

$postdata = $_POST;
$msg = '';
$salt = $_SESSION['salt']; //Salt already saved in session during initial request.

/* Response received from Payment Gateway at this page.

It is absolutely mandatory that the hash (or checksum) is computed again after you receive response from PayU and compare it with request and post back parameters. This will protect you from any tampering by the user and help in ensuring a safe and secure transaction experience. It is mandate that you secure your integration with PayU by implementing Verify webservice and Webhook/callback as a secondary confirmation of transaction response.

Process response parameters to generate Hash signature and compare with Hash sent by payment gateway 
to verify response content. Response may contain additional charges parameter so depending on that 
two order of strings are used in this kit.

Hash string without Additional Charges -
hash = sha512(SALT|status||||||udf5|||||email|firstname|productinfo|amount|txnid|key)

With additional charges - 
hash = sha512(additionalCharges|SALT|status||||||udf5|||||email|firstname|productinfo|amount|txnid|key)

*/
if (isset($postdata['key'])) {
    $key                =   $postdata['key'];
    $txnid                 =     $postdata['txnid'];
    $amount              =     $postdata['amount'];
    $productInfo          =     $postdata['productinfo'];
    $firstname            =     $postdata['firstname'];
    $email                =    $postdata['email'];
    $udf5                =   $postdata['udf5'];
    $status                =     $postdata['status'];
    $resphash            =     $postdata['hash'];
    //Calculate response hash to verify	
    $keyString               =      $key . '|' . $txnid . '|' . $amount . '|' . $productInfo . '|' . $firstname . '|' . $email . '|||||' . $udf5 . '|||||';
    $keyArray               =     explode("|", $keyString);
    $reverseKeyArray     =     array_reverse($keyArray);
    $reverseKeyString    =    implode("|", $reverseKeyArray);
    $CalcHashString     =     strtolower(hash('sha512', $salt . '|' . $status . '|' . $reverseKeyString)); //hash without additionalcharges

    //check for presence of additionalcharges parameter in response.
    $additionalCharges  =     "";

    if (isset($postdata["additionalCharges"])) {
        $additionalCharges = $postdata["additionalCharges"];
        //hash with additionalcharges
        $CalcHashString     =     strtolower(hash('sha512', $additionalCharges . '|' . $salt . '|' . $status . '|' . $reverseKeyString));
    }
    //Comapre status and hash. Hash verification is mandatory.
    if ($status == 'success'  && $resphash == $CalcHashString) {
        $msg = "Transaction Successful, Hash Verified...<br />";
        $msg1 = "Thank You for your kindness!";
        //Do success order processing here...
        //Additional step - Use verify payment api to double check payment.
        if (verifyPayment($key, $salt, $txnid, $status))
            $msg = "<span style='color: green; font-size: 16px;'>Transaction Successful</span>";
        else
            $msg = "Transaction Successful, Hash Verified...Payment Verification failed...";
    } else {
        //tampered or failed
        $msg = "Transaction Failed Please retry!";
        $msg2 = "Transaction Failed!";
    }
} else exit(0);


//This function is used to double check payment
function verifyPayment($key, $salt, $txnid, $status)
{
    $command = "verify_payment"; //mandatory parameter

    $hash_str = $key  . '|' . $command . '|' . $txnid . '|' . $salt;
    $hash = strtolower(hash('sha512', $hash_str)); //generate hash for verify payment request

    $r = array('key' => $key, 'hash' => $hash, 'var1' => $txnid, 'command' => $command);

    $qs = http_build_query($r);
    //for production
    $wsUrl = "https://info.payu.in/merchant/postservice.php?form=2";

    //for test
    //$wsUrl = "https://test.payu.in/merchant/postservice.php?form=2";

    try {
        $c = curl_init();
        curl_setopt($c, CURLOPT_URL, $wsUrl);
        curl_setopt($c, CURLOPT_POST, 1);
        curl_setopt($c, CURLOPT_POSTFIELDS, $qs);
        curl_setopt($c, CURLOPT_CONNECTTIMEOUT, 30);
        curl_setopt($c, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($c, CURLOPT_SSLVERSION, 6); //TLS 1.2 mandatory
        curl_setopt($c, CURLOPT_SSL_VERIFYHOST, 0);
        curl_setopt($c, CURLOPT_SSL_VERIFYPEER, 0);
        $o = curl_exec($c);
        if (curl_errno($c)) {
            $sad = curl_error($c);
            throw new Exception($sad);
        }
        curl_close($c);

        /*
		Here is json response example -
		
		{"status":1,
		"msg":"1 out of 1 Transactions Fetched Successfully",
		"transaction_details":</strong>
		{	
			"Txn72738624":
			{
				"mihpayid":"403993715519726325",
				"request_id":"",
				"bank_ref_num":"670272",
				"amt":"6.17",
				"transaction_amount":"6.00",
				"txnid":"Txn72738624",
				"additional_charges":"0.17",
				"productinfo":"P01 P02",
				"firstname":"Viatechs",
				"bankcode":"CC",
				"udf1":null,
				"udf3":null,
				"udf4":null,
				"udf5":"PayUBiz_PHP7_Kit",
				"field2":"179782",
				"field9":" Verification of Secure Hash Failed: E700 -- Approved -- Transaction Successful -- Unable to be determined--E000",
				"error_code":"E000",
				"addedon":"2019-08-09 14:07:25",
				"payment_source":"payu",
				"card_type":"MAST",
				"error_Message":"NO ERROR",
				"net_amount_debit":6.17,
				"disc":"0.00",
				"mode":"CC",
				"PG_TYPE":"AXISPG",
				"card_no":"512345XXXXXX2346",
				"name_on_card":"Test Owenr",
				"udf2":null,
				"status":"success",
				"unmappedstatus":"captured",
				"Merchant_UTR":null,
				"Settled_At":"0000-00-00 00:00:00"
			}
		}
		}
		
		Decode the Json response and retrieve "transaction_details" 
		Then retrieve {txnid} part. This is dynamic as per txnid sent in var1.
		Then check for mihpayid and status.
		
		*/
        $response = json_decode($o, true);

        if (isset($response['status'])) {
            // response is in Json format. Use the transaction_detailspart for status
            $response = $response['transaction_details'];
            $response = $response[$txnid];

            if ($response['status'] == $status) //payment response status and verify status matched
                return true;
            else
                return false;
        } else {
            return false;
        }
    } catch (Exception $e) {
        return false;
    }
}
?>


<!DOCTYPE html>
<html>

<head>
    <title></title>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title>Transection Successful</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <link rel="icon" href="assets/Fevicon.png" type="image/x-icon">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

    <style type="text/css">
        body,
        table,
        td,
        a {
            -webkit-text-size-adjust: 100%;
            -ms-text-size-adjust: 100%;
        }

        img {
            -ms-interpolation-mode: bicubic;
        }

        img {
            border: 0;
            height: auto;
            line-height: 100%;
            outline: none;
            text-decoration: none;
        }

        table {
            border-collapse: collapse !important;
        }

        body {
            height: 100% !important;
            margin: 0 !important;
            padding: 0 !important;
            width: 100% !important;
        }

        a[x-apple-data-detectors] {
            color: inherit !important;
            text-decoration: none !important;
            font-size: inherit !important;
            font-family: inherit !important;
            font-weight: inherit !important;
            line-height: inherit !important;
        }

        @media screen and (max-width: 480px) {
            .mobile-hide {
                display: none !important;
            }

            .mobile-center {
                text-align: center !important;
            }
        }

        div[style*="margin: 16px 0;"] {
            margin: 0 !important;
        }
    </style>

<body style="margin: 30 !important; padding: 30 !important; background-color: #eeeeee;" bgcolor="#eeeeee">
    <br><br><br>
    <table border="0" cellpadding="0" cellspacing="0" width="100%">
        <tr>
            <td align="center" style="background-color: #eeeeee;" bgcolor="#eeeeee">
                <table class="shadow-lg" align="center" border="0" cellpadding="0" cellspacing="0" width="100%" style="max-width:600px; border-radius: 12px;">
                    <tr>
                        <td align="center" valign="top" style="font-size:0; padding: 35px;" bgcolor="#4BB543">
                            <div style="display:inline-block; max-width:50%; min-width:100px; vertical-align:top; width:100%;">
                                <table align="left" border="0" cellpadding="0" cellspacing="0" width="100%" style="max-width:300px;">
                                    <tr>
                                        <td align="left" valign="top" style="font-family: Open Sans, Helvetica, Arial, sans-serif; font-size: 36px; font-weight: 800; line-height: 48px;" class="mobile-center">
                                            <h1 style="font-size: 36px; font-weight: 800; margin: 0; color: #ffffff;">Enally</h1>
                                        </td>
                                    </tr>
                                </table>
                            </div>
                            <div style="display:inline-block; max-width:50%; min-width:100px; vertical-align:top; width:100%;" class="mobile-hide">
                                <table align="left" border="0" cellpadding="0" cellspacing="0" width="100%" style="max-width:300px;">
                                    <tr>
                                        <td align="right" valign="top" style="font-family: Open Sans, Helvetica, Arial, sans-serif; font-size: 48px; font-weight: 400; line-height: 48px;">
                                            <table cellspacing="0" cellpadding="0" border="0" align="right">
                                                <tr>
                                                    <td style="font-family: Open Sans, Helvetica, Arial, sans-serif; font-size: 18px; font-weight: 400;">
                                                        <p style="font-size: 18px; font-weight: 400; margin: 0; color: #ffffff;"><a href="#" target="_blank" style="color: #ffffff; text-decoration: none;">Marketplace &nbsp;</a></p>
                                                    </td>
                                                    <td style="font-family: Open Sans, Helvetica, Arial, sans-serif; font-size: 18px; font-weight: 400; line-height: 24px;"> <a href="#" target="_blank" style="color: #ffffff; text-decoration: none;"><img src="https://img.icons8.com/color/48/000000/small-business.png" width="27" height="23" style="display: block; border: 0px;" /></a> </td>
                                                </tr>
                                            </table>
                                        </td>
                                    </tr>
                                </table>
                            </div>
                        </td>
                    </tr>
                    <tr>
                        <td align="center" style="padding: 35px 35px 20px 35px; background-color: #ffffff;" bgcolor="#ffffff">
                            <table align="center" border="0" cellpadding="0" cellspacing="0" width="100%" style="max-width:600px;">
                                <tr>
                                    <td align="center" style="font-family: Open Sans, Helvetica, Arial, sans-serif; font-size: 16px; font-weight: 400; line-height: 24px; padding-top: 25px;"> <img src="https://img.icons8.com/carbon-copy/100/000000/checked-checkbox.png" width="125" height="120" style="display: block; border: 0px;" /><br>
                                        <h2 style="font-size: 30px; font-weight: 800; line-height: 36px; color: #333333; margin: 0;"> <?php echo @$msg2; echo @$msg1 ?> </h2>
                                    </td>
                                </tr>

                                <tr>
                                    <td align="left" style="padding-top: 20px;">
                                        <table cellspacing="0" cellpadding="0" border="0" width="100%">
                                            <tr>
                                                <td width="75%" align="left" bgcolor="#eeeeee" style="font-family: Open Sans, Helvetica, Arial, sans-serif; font-size: 16px; font-weight: 800; line-height: 24px; padding: 10px;"> Order Confirmation # </td>
                                                <td width="25%" align="left" bgcolor="#eeeeee" style="font-family: Open Sans, Helvetica, Arial, sans-serif; font-size: 16px; font-weight: 800; line-height: 24px; padding: 10px;"> <?php echo $txnid; ?> </td>
                                            </tr>
                                            <tr>
                                                <td width="75%" align="left" style="font-family: Open Sans, Helvetica, Arial, sans-serif; font-size: 16px; font-weight: 400; line-height: 24px; padding: 15px 10px 5px 10px;"> Purchased Item (1) </td>
                                                <td width="25%" align="left" style="font-family: Open Sans, Helvetica, Arial, sans-serif; font-size: 16px; font-weight: 400; line-height: 24px; padding: 15px 10px 5px 10px;"> <?php echo $productInfo; ?> </td>
                                            </tr>

                                        </table>
                                    </td>
                                </tr>
                                <tr>
                                    <td align="left" style="padding-top: 20px;">
                                        <table cellspacing="0" cellpadding="0" border="0" width="100%">
                                            <tr>
                                                <td width="75%" align="left" style="font-family: Open Sans, Helvetica, Arial, sans-serif; font-size: 16px; font-weight: 800; line-height: 24px; padding: 10px; border-top: 3px solid #eeeeee; border-bottom: 3px solid #eeeeee;"> TOTAL </td>
                                                <td width="25%" align="left" style="font-family: Open Sans, Helvetica, Arial, sans-serif; font-size: 16px; font-weight: 800; line-height: 24px; padding: 10px; border-top: 3px solid #eeeeee; border-bottom: 3px solid #eeeeee;"> ₹<?php echo $amount; ?> </td>
                                            </tr>
                                        </table>
                                    </td>
                                </tr>
                            </table>
                        </td>
                    </tr>
                    <tr>
                        <td align="center" height="100%" valign="top" width="100%" style="padding: 0 35px 35px 35px; background-color: #ffffff;" bgcolor="#ffffff">
                            <table align="center" border="0" cellpadding="0" cellspacing="0" width="100%" style="max-width:660px;">
                                <tr>
                                    <td align="center" valign="top" style="font-size:0;">
                                        <div style="display:inline-block; max-width:50%; min-width:240px; vertical-align:top; width:100%;">
                                            <table align="left" border="0" cellpadding="0" cellspacing="0" width="100%" style="max-width:300px;">
                                                <tr>
                                                    <td align="left" valign="top" style="font-family: Open Sans, Helvetica, Arial, sans-serif; font-size: 16px; font-weight: 400; line-height: 24px;">
                                                        <p style="font-weight: 800;">Order Details</p>
                                                        <p><?php echo $firstname; ?><br>Email: <?php echo $email; ?><br>Status: <?php echo $status; ?></p>
                                                    </td>
                                                </tr>
                                            </table>
                                        </div>
                                        <div style="display:inline-block; max-width:50%; min-width:240px; vertical-align:top; width:100%;">
                                            <table align="left" border="0" cellpadding="0" cellspacing="0" width="100%" style="max-width:300px;">
                                                <tr>
                                                    <td align="left" valign="top" style="font-family: Open Sans, Helvetica, Arial, sans-serif; font-size: 16px; font-weight: 400; line-height: 24px;">
                                                        <p style="font-weight: 800;">Verification Message: </p>
                                                        <p><?php echo $msg; ?></p>
                                                    </td>
                                                </tr>
                                            </table>
                                        </div>
                                    </td>
                                </tr>
                            </table>
                        </td>
                    </tr>
                    <tr>
                        <td align="center" style=" padding: 35px; background-color: #ff7361;" bgcolor="#1b9ba3">
                            <table align="center" border="0" cellpadding="0" cellspacing="0" width="100%" style="max-width:600px;">
                                <tr>
                                    <td align="center" style="font-family: Open Sans, Helvetica, Arial, sans-serif; font-size: 16px; font-weight: 400; line-height: 24px; padding-top: 25px;">
                                        <h2 style="font-size: 24px; font-weight: 800; line-height: 30px; color: #ffffff; margin: 0;">
                                            <!--Get 30% off your next order.--> Print Order Receipt
                                        </h2>
                                    </td>
                                </tr>
                                <tr>
                                    <td align="center" style="padding: 25px 0 15px 0;">
                                        <table border="0" cellspacing="0" cellpadding="0">
                                            <tr>
                                                <td align="center" style="border-radius: 5px;" bgcolor="#66b3b7"> <a href="#" target="_blank" style="font-size: 18px; font-family: Open Sans, Helvetica, Arial, sans-serif; color: #ffffff; text-decoration: none; border-radius: 5px; background-color: #F44336; padding: 15px 30px; border: 1px solid #F44336; display: block;" onclick="window.print();">Print</a> </td>
                                            </tr>
                                        </table>
                                    </td>
                                </tr>
                            </table>
                        </td>
                    </tr>
                    <!-- <tr>
                        <td align="center" style="padding: 35px; background-color: #ffffff;" bgcolor="#ffffff">
                            <table align="center" border="0" cellpadding="0" cellspacing="0" width="100%" style="max-width:600px;">
                                <tr>
                                    <td align="center"> <img src="logo-footer.png" width="37" height="37" style="display: block; border: 0px;" /> </td>
                                </tr>
                                <tr>
                                    <td align="center" style="font-family: Open Sans, Helvetica, Arial, sans-serif; font-size: 14px; font-weight: 400; line-height: 24px; padding: 5px 0 10px 0;">
                                        <p style="font-size: 14px; font-weight: 800; line-height: 18px; color: #333333;"> 675 Parko Avenue<br> LA, CA 02232 </p>
                                    </td>
                                </tr>
                                <tr>
                                    <td align="left" style="font-family: Open Sans, Helvetica, Arial, sans-serif; font-size: 14px; font-weight: 400; line-height: 24px;">
                                        <p style="font-size: 14px; font-weight: 400; line-height: 20px; color: #777777;"> If you didn't create an account using this email address, please ignore this email or <a href="#" target="_blank" style="color: #777777;">unsusbscribe</a>. </p>
                                    </td>
                                </tr>
                            </table>
                        </td>
                    </tr> -->
                </table>
            </td>
        </tr>
    </table>
    <br><br><br>
</body>

</html>

<?php

function download_file()
{
    $original_name = "Unit 1 Proposition - Proof Strategy 7.pdf";
    //$random_name = uniqid();
    $new_name = "your_file_enally.pdf";

    rename($original_name, $new_name);

    $file_url = $new_name;
    header('Content-Type: application/octet-stream');
    header("Content-Transfer-Encoding: utf-8");
    header("Content-disposition: attachment; filename=\"" . basename($file_url) . "\"");
    readfile($file_url);

    sleep(5);
    rename($new_name, $original_name);
}

?>





<!-- Response Parameters 
	For more details please refer PDF...
	
	  1
      mihpayid
      It is a unique reference number created for each transaction at PayU’s end. For every new transaction request that hits PayU’s server (coming from any of our merchants), a unique reference ID is created and it is known as <strong>mihpayid (or PayU ID)
    
    
      2
      mode
      This parameter describes the payment category by which the transaction was completed/attempted by the customer. The values are mentioned below:</p>
        
    
      3
      status
      This parameter gives the status of the transaction. Hence, the value of this parameter depends on whether the transaction was successful or not. You must map the order status using this parameter only. The values are as below:
        If the transaction is successful, the value of ‘status’ parameter would be ‘success’.
		The value of ‘status’ as ‘failure’ or ‘pending’ must be treated as a failed transaction only.
    
    
      4
      key
      This parameter would contain the merchant key for the merchant’s account at PayU. It would be the same as the key used while the transaction request is being posted from merchant’s end to PayU.
    
    
      5
      txnid
      This parameter would contain the transaction ID value posted by the merchant during the transaction request.
    
    
      6
      amount
      This parameter would contain the original amount which was sent in the transaction request by the merchant.
    
      7
      discount
      This parameter would contain the discount given to user - based on the type of offer applied by the merchant.
    
    
      8
      offer
      This parameter would contain the offer key which was sent in the transaction request by the merchant.
    
    
      9
      productinfo
      This parameter would contain the same value of productinfo which was sent in the transaction request from merchant’s end to PayU
    
    
      10
      firstname
      This parameter would contain the same value of firstname which was sent in the transaction request from merchant’s end to PayU
    
    
      11
      lastname
      This parameter would contain the same value of lastname which was sent in the transaction request from merchant’s end to PayU
    
    
      12
      address1
      This parameter would contain the same value of address1 which was sent in the transaction request from merchant’s end to PayU
    
    
      13
      address2
      This parameter would contain the same value of address2 which was sent in the transaction request from merchant’s end to PayU
    
    
      14
      city
      This parameter would contain the same value of city which was sent in the transaction request from merchant’s end to PayU
    
    
      15
      state
      This parameter would contain the same value of state which was sent in the transaction request from merchant’s end to PayU
    
    
      16
      country
      This parameter would contain the same value of country which was sent in the transaction request from merchant’s end to PayU
    
    
      17
      zipcode
      This parameter would contain the same value of zipcode which was sent in the transaction request from merchant’s end to PayU
    
    
      18
      email
      This parameter would contain the same value of email which was sent in the transaction request from merchant’s end to PayU
    
    
      19
      phone
      This parameter would contain the same value of phone which was sent in the transaction request from merchant’s end to PayU
    
    
      20
      udf1
      This parameter would contain the same value of udf1 which was sent in the transaction request from merchant’s end to PayU
    
    
      21
      udf2
      This parameter would contain the same value of udf2 which was sent in the transaction request from merchant’s end to PayU
    
    
      22
      udf3
      This parameter would contain the same value of udf3 which was sent in the transaction request from merchant’s end to PayU
    
    
      23
      udf4
      This parameter would contain the same value of udf4 which was sent in the transaction request from merchant’s end to PayU
    
    
      24
      udf5
      This parameter would contain the same value of udf5 which was sent in the transaction request from merchant’s end to PayU
    
      25
      hash
      This parameter is absolutely crucial and is similar to the hash parameter used in the transaction request send by the merchant to PayU. PayU calculates the hash using a string of other parameters and returns to the merchant. The merchant must verify the hash and then only mark a transaction as success/failure. This is to make sure that the transaction hasn’t been tampered with. The calculation is as below:
      
        sha512(SALT|status||||||udf5|udf4|udf3|udf2|udf1|email|firstname|productinfo|amount|txnid|key)
        The handling of udf1 – udf5 parameters remains similar to the hash calculation when the merchant sends it in the transaction request to PayU. If any of the udf (udf1-udf5) was posted in the transaction request, it must be taken in hash calculation also.
        If none of the udf parameters were posted in the transaction request, they should be left empty in the hash calculation too.
    
    
      26
      error
      For the failed transactions, this parameter provides the reason of failure. Please note that the reason of failure depends upon the error codes provided by different banks and hence the detailing of error reason may differ from one transaction to another. The merchant can use this parameter to retrieve the reason of failure for a particular transaction.
    
    
      27
      bankcode
      This parameter would contain the code indicating the payment option used for the transaction. For example, in Debit Card mode, there are different options like Visa Debit Card, Mastercard, Maestro etc. For each option, a unique bankcode exists. It would be returned in this bankcode parameter. For example, Visa Debit Card – VISA, Master Debit Card – MAST.
    
    
      28
      PG_TYPE
      This parameter gives information on the payment gateway used for the transaction. For example, if SBI PG was used, it would contain the value SBIPG. If SBI Netbanking was used for the transaction, the value of PG_TYPE would be SBINB. Similarly, it would have a unique value for all different type of payment gateways.
    
    
      29
      bank_ref_num
      For each successful transaction – this parameter would contain the bank reference number generated by the bank.
    
    
      30
      shipping_firstname
      This parameter would contain the same value of shipping_firstname which was sent in the transaction request from merchant’s end to PayU
    
      31
      shipping_lastname
      This parameter would contain the same value of shipping_lastname which was sent in the transaction request from merchant’s end to PayU
    
    
      32
      shipping_address1
      This parameter would contain the same value of shipping_address1 which was sent in the transaction request from merchant’s end to PayU
    
    
      33
      shipping_address2
      This parameter would contain the same value of shipping_address2 which was sent in the transaction request from merchant’s end to PayU
    
    
      34
      shipping_city
      This parameter would contain the same value of shipping_city which was sent in the transaction request from merchant’s end to PayU
    
    
      35
      shipping_state
      This parameter would contain the same value of shipping_state which was sent in the transaction request from merchant’s end to PayU
    
    
      36
      shipping_country
      This parameter would contain the same value of shipping_country which was sent in the transaction request from merchant’s end to PayU
    
    
      37
      shipping_zipcode
      This parameter would contain the same value of shipping_zipcode which was sent in the transaction request from merchant’s end to PayU
    
    
      38
      shipping_phone
      This parameter would contain the same value of shipping_phone which was sent in the transaction request from merchant’s end to PayU
    
    
      39
      unmappedstatus
      This parameter contains the status of a transaction as per the internal database of PayU. PayU’s system has several intermediate status which are used for tracking various activities internal to the system. Hence, this status contains intermediate states of a transaction also - and hence is known as unmappedstatus.
        For example: dropped/bounced/captured/auth/failed/usercancelled/pending
    //-->