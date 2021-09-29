<?php
$price = $_GET['price']*100;
session_start();
// The data to send to the API
$postData = array(
    'auth_token' => $_SESSION['auth_token'],
    'expiration'=> 3600, 
    'order_id' => $_SESSION['order_id'],
    "amount_cents" => $price,
    "billing_data" => array(
    "apartment" => "489", 
    "email"=> "test@test.com", 
    "floor"=> "12", 
    "first_name"=> "N/A" , 
    "street"=> " Asyut", 
    "building"=> "8028", 
    "phone_number"=> "+201063634580", 
    "shipping_method"=> "PKG", 
    "postal_code"=> "04898", 
    "city"=> "N/A", 
    "country"=> "EG", 
    "last_name"=> "N/A", 
    "state"=> "N/A"),
    "currency"=> "EGP", 
    "integration_id"=> 238224,
    "lock_order_when_paid"=> "false"
    );

// Setup cURL
$ch = curl_init('https://accept.paymob.com/api/acceptance/payment_keys');
curl_setopt_array($ch, array(
    CURLOPT_POST => TRUE,
    CURLOPT_RETURNTRANSFER => TRUE,
    CURLOPT_HTTPHEADER => array(
        'Content-Type:application/json'
    ),
    CURLOPT_POSTFIELDS => json_encode($postData)
));

//curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-Type: application/x-www-form-urlencoded'));


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
//echo $responseData['1'];

 $payment_token = $responseData['token'];

 header("Location: https://accept.paymob.com/api/acceptance/iframes/222516?payment_token=$payment_token");

 