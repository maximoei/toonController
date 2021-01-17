<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

// The data to send to the API
$postData = array(
    'entity_id' => 'script.slapen'
);

// Create the context for the request
$context = stream_context_create(array(
    'http' => array(
        // http://www.php.net/manual/en/context.http.php
        'method' => 'POST',
        'content' => json_encode($postData)
    ),
    "ssl"=>array(
        "verify_peer"=>false,
        "verify_peer_name"=>false,
    ),
));

// Send the request
$response = file_get_contents("https://192.168.1.11:8123/api/services/script/turn_on?api_password=maximmaxim", FALSE, $context);

// Check for errors
if($response === FALSE){
    die('Error: ' . $response);
}

// Decode the response
$responseData = json_decode($response, TRUE);

// Print the date from the response
print_r($responseData);
