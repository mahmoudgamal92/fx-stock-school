<?php
$price = $_POST['price'];
session_start();
// The data to send to the API
$postData = array(
    'api_key' => 'ZXlKaGJHY2lPaUpJVXpVeE1pSXNJblI1Y0NJNklrcFhWQ0o5LmV5SmpiR0Z6Y3lJNklrMWxjbU5vWVc1MElpd2libUZ0WlNJNkltbHVhWFJwWVd3aUxDSndjbTltYVd4bFgzQnJJam81TkRVNE1uMC5tTE9vYWtQT2QzVUVBMXZWMVhuMmhHQ1lTYnpXcHpEbHBaZXU4eXNBMGg4UEM1R0xKM2VSd0JoakJscTZKYkprRG1MWTZTai1kSEswZ0Fpbk1DOTBLQQ==',
);

// Setup cURL
$ch = curl_init('https://accept.paymob.com/api/auth/tokens');
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
//echo $responseData['1'];

$_SESSION['auth_token'] = $responseData['token'];
header("Location: order.php?price=$price");
