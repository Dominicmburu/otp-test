<?php
//incule the accessToken file
include 'accessToken.php';

date_default_timezone_set('Africa/Nairobi');
$processrequestUrl = 'https://sandbox.safaricom.co.ke/mpesa/stkpush/v1/processrequest';
# callback url 
$callbackurl = 'https://umeskiasoftwares.com/darajaapp/callback.php';
$Passkey = 'bfb279f9aa9bdbcf158e97dd71a467cd2e0c893059b10f78e6b72ada1ed2c919';
$BusinessShortCode = '174379';
$Timestamp = date('YmdHis');
//ENCRYPT DATA TO GVET PASSWORD
$Password = base64_encode($BusinessShortCode . $Passkey . $Timestamp);
$phone = "254706526569";
$money = '1';
$PartyA = $phone; // This is your phone number, 
$PartyB = '254708374149'; //This os the sane as business short code
$AccountReference = 'MESS APP';
$TransactionDesc = 'Please cornfirm payment made to DOMINIC SOFTWARES.';
$Amount = $money;
$stkpushheader = ['Content-Type:application/json', 'Authorization:Bearer ' . $access_token];
# initiating the transaction
$curl = curl_init();
curl_setopt($curl, CURLOPT_URL, $processrequestUrl);
curl_setopt($curl, CURLOPT_HTTPHEADER, $stkpushheader); //setting custom header

$curl_post_data = array(
    //Fill in the request parameters with valid values
    'BusinessShortCode' => $BusinessShortCode,
    'Password' => $Password,
    'Timestamp' => $Timestamp,
    'TransactionType' => 'CustomerPayBillOnline',
    'Amount' => $Amount,
    'PartyA' => $PartyA,
    'PartyB' => $BusinessShortCode,
    'PhoneNumber' => $PartyA,
    'CallBackURL' => $callbackurl,
    'AccountReference' => $AccountReference,
    'TransactionDesc' => $TransactionDesc
);

$data_string = json_encode($curl_post_data);
curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
curl_setopt($curl, CURLOPT_POST, true);
curl_setopt($curl, CURLOPT_POSTFIELDS, $data_string);
$curl_response = curl_exec($curl);

$data = json_decode($curl_response);
$CheckoutRequestID = $data->CheckoutRequestID;
$RequestCode = $data->RequestCode;
if ($RequestCode == "0") {
    echo "The CheckoutRequestID for this transaction is : " . $CheckoutRequestID;
}


?>