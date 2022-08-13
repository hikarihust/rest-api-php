<?php

$ch = curl_init();

curl_setopt_array($ch, [
    CURLOPT_URL => "https://api.github.com/gists/c273c46b7d0320d9b85ceee7823XXXXX",
    CURLOPT_RETURNTRANSFER => true,
    CURLOPT_USERAGENT => "vudinhquang"
]);

$response = curl_exec($ch);

curl_close($ch);

$data = json_decode($response, true);

echo "<pre>";
print_r($data);
echo "</pre>";
