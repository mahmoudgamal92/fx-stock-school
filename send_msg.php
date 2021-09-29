<?php 
require_once './vendor/autoload.php'; 
 
use Twilio\Rest\Client; 
 
$sid    = "AC0fe0c9d0b9ba4de94eb9ddde9f98ab7b"; 
$token  = "fc101fc1ed1d134b1f19325ee147c61f"; 
$twilio = new Client($sid, $token); 

$message = $twilio->messages ->create("+201063634580", 
array("body" => "Hello Mahmoud This Is test Message", "from" => "+12528884140", )); 
print($message->sid);
?>