<?php

$ch = curl_init();

$headers = [
    "Authorization: token XXXXX",
    // "User-Agent: vudinhquang"
];

curl_setopt_array($ch, [
    CURLOPT_URL => "https://api.github.com/user/starred/httpie/httpie",
    CURLOPT_RETURNTRANSFER => true,
    CURLOPT_HTTPHEADER => $headers,
    CURLOPT_USERAGENT => "vudinhquang"
]);

$response = curl_exec($ch);

$status_code = curl_getinfo($ch, CURLINFO_HTTP_CODE);

curl_close($ch);

echo $status_code, "</br>";

echo $response;
