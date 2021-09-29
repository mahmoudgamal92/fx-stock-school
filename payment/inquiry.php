<?php
// The data to send to the API
$postData = array(
    'auth_token' => 'ZXlKMGVYQWlPaUpLVjFRaUxDSmhiR2NpT2lKSVV6VXhNaUo5LmV5SmpiR0Z6Y3lJNklrMWxjbU5vWVc1MElpd2laWGh3SWpveE5qSXpNREF3TXpJM0xDSndhR0Z6YUNJNkltRTRNekV3TlRVeVlUTXhNems1WmpVek4yWmtZakZqWkdSbE56VXhObU16TnpVNVpXSTBPVEUwTTJVME1UWm1NR0ptWkRGak1EQTNaVEkwTXpBd01HTWlMQ0p3Y205bWFXeGxYM0JySWpvNU5EVTRNbjAubTIxeXM5cU14VEtVYTlZdWlCZ3o4Mm8xR2VXZDd1YzhmSW5sUDFaVFltV2cwMVRmcERtZUZ1azJKQlNDRnBoOEJXajN0aGpKbnRJRGtkaU5wXzFYMFE=',
    'merchant_order_id' => "94582",
    'order_id' => "12142492",   
    );

// Setup cURL
$ch = curl_init('https://accept.paymobsolutions.com/api/ecommerce/orders/transaction_inquiry');
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
//$responseData = json_decode($response, TRUE);

// Close the cURL handler
curl_close($ch);

// Print the date from the response
//echo $responseData['1'];

echo $response;