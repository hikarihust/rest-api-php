<?php

$ch = curl_init();

$headers = [
    "Authorization: Client-ID XXXXX"
];

curl_setopt_array($ch, [
    CURLOPT_URL => "https://api.unsplash.com/photos/random",
    CURLOPT_RETURNTRANSFER => true,
    CURLOPT_HTTPHEADER => $headers,
    CURLOPT_HEADER => true
]);

$response = curl_exec($ch);

$status_code = curl_getinfo($ch, CURLINFO_HTTP_CODE);

$content_type = curl_getinfo($ch, CURLINFO_CONTENT_TYPE);


curl_close($ch);

echo $status_code, "</br>";
echo $content_type, "</br>";

echo "<pre>";
print_r($response);
echo "</pre>";
