<?php

require __DIR__ . "/vendor/autoload.php";

$client = new GuzzleHttp\Client;

$response = $client->request("GET", "https://api.github.com/user/repos", [
    "headers" => [
        "Authorization" => "token XXXXX",
        "User-Agent" => "vudinhquang"
    ]
]);

echo $response->getStatusCode(), "</br>";

echo $response->getHeader("content-type")[0], "</br>";

echo substr($response->getBody(), 0, 200), "...</br>";
