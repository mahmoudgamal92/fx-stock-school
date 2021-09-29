<?php
session_start();
// The data to send to the API
$price = $_GET['price'];
$postData = array(
    'auth_token' => $_SESSION['auth_token'],
    'delivery_needed' => "false",
    'amount_cents' => $price,   
    );

// Setup cURL
$ch = curl_init('https://accept.paymobsolutions.com/api/ecommerce/orders');
curl_setopt_array($ch, array(
    CURLOPT_POST => TRUE,
    CURLOPT_RETURNTRANSFER => TRUE,
    CURLOPT_HTTPHEADER => array(
        'Content-Type: application/json'
    ),
    CURLOPT_POSTFIELDS => json_encode($postData)
));

// Send the request
$response = curl_exec($ch);

// Check for errors
if($response === FALSE){
    die(curl_error($ch));
    echo "Failed";
}

// Decode the response
$responseData = json_decode($response, TRUE);

// Close the cURL handler
curl_close($ch);

// Print the date from the response
//echo $response;

$_SESSION['order_id'] =  $responseData['id'];
header("Location: request.php?price=$price");
