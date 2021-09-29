<?php
$code = $_POST['code'];
$curl = curl_init();
curl_setopt_array($curl, [
	CURLOPT_URL => "https://twelve-data1.p.rapidapi.com/price?symbol=$code&format=json&outputsize=30",
	CURLOPT_RETURNTRANSFER => true,
	CURLOPT_FOLLOWLOCATION => true,
	CURLOPT_ENCODING => "",
	CURLOPT_MAXREDIRS => 10,
	CURLOPT_TIMEOUT => 30,
	CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
	CURLOPT_CUSTOMREQUEST => "GET",
	CURLOPT_HTTPHEADER => [
		"x-rapidapi-host: twelve-data1.p.rapidapi.com",
		"x-rapidapi-key: f9649d0eaemshd3fb6d251503b6ap147e90jsnc64437121485"
	],
]);

$response = curl_exec($curl);
$err = curl_error($curl);
curl_close($curl);

if ($err) {
	echo "cURL Error #:" . $err;
} else {

   $current_price = json_decode($response);

	echo $current_price -> price;
}

?>