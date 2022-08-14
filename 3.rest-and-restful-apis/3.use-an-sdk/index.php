<?php

$api_key = "XXXXX";

$data = [
    "name" => "Bob",
    "email" => "bob@example.com"
];

require __DIR__ . "/vendor/autoload.php";

$stripe = new \Stripe\StripeClient($api_key);

$customer = $stripe->customers->create($data);

echo $customer;
