<?php

// Set your API credentials
$consumer_key = "YOUR_CONSUMER_KEY";
$consumer_secret = "YOUR_CONSUMER_SECRET";

// Set the endpoint URL
$endpoint_url = "https://sandbox.safaricom.co.ke/mpesa/c2b/v1/registerurl";

// Set the request headers
$headers = [
  "Authorization: Basic " . base64_encode("$consumer_key:$consumer_secret"),
  "Content-Type: application/json"
];

// Set the request body
$body = [
  "ShortCode" => "YOUR_SHORTCODE",
  "ResponseType" => "Completed",
  "ConfirmationURL" => "https://example.com/confirmation",
  "ValidationURL" => "https://example.com/validation"
];

// Convert the request body to JSON
$json_body = json_encode($body);

// Make the API request using cURL
$curl = curl_init();
curl_setopt_array($curl, [
  CURLOPT_URL => $endpoint_url,
  CURLOPT_RETURNTRANSFER => true,
  CURLOPT_HTTPHEADER => $headers,
  CURLOPT_POST => true,
  CURLOPT_POSTFIELDS => $json_body
]);
$response = curl_exec($curl);
curl_close($curl);

// Print the API response
echo $response;

?>
