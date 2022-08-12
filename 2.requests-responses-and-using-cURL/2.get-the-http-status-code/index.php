<?php

$ch = curl_init();

curl_setopt_array($ch, [
    CURLOPT_URL => "https://api.openweathermap.org/data/2.5/weather?q=London&appid=XXXXXX",
    CURLOPT_RETURNTRANSFER => true
]);

$response = curl_exec($ch);

$status_code = curl_getinfo($ch, CURLINFO_HTTP_CODE);

curl_close($ch);

echo $status_code, "</br>";

echo $response;
