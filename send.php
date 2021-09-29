<?php
$postData = array(
    'from' => 'FX School',
    'text' => 'Test Message',
    'to' => '20117902448',
    'api_key' => '991a357e',
    'api_secret' => '4XefePf0QiJ0nzvy'
);

// Setup cURL
$ch = curl_init('https://rest.nexmo.com/sms/json');
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
    //return "false";
}
curl_close($ch);
   //return "true";
echo $response;