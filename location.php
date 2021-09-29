<?php

$curl = curl_init();
curl_setopt_array($curl, [
	CURLOPT_URL => "http://ip-api.com/json",
    CURLOPT_FOLLOWLOCATION => true,
	CURLOPT_ENCODING => "",
	CURLOPT_MAXREDIRS => 10,
	CURLOPT_TIMEOUT => 30,
	CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
]);

$response = curl_exec($curl);
echo $response;