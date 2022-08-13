<?php

$ch = curl_init();

curl_setopt_array($ch, [
    CURLOPT_URL => "https://api.github.com/gists",
    CURLOPT_RETURNTRANSFER => true,
    CURLOPT_USERAGENT => "vudinhquang"
]);

$response = curl_exec($ch);

curl_close($ch);

$data = json_decode($response, true);

foreach ($data as $gist) {

    echo $gist["id"], " - ", $gist["description"], "</br>";
}
