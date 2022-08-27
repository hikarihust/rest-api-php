<?php

declare(strict_types=1);

require __DIR__ . "/bootstrap.php";

ini_set("display_errors", "On");

if ($_SERVER["REQUEST_METHOD"] !== "POST") {

    http_response_code(405);
    header("Allow: POST");
    exit;
}

$data = (array) json_decode(file_get_contents("php://input"), true);

if (!array_key_exists("token", $data)) {

    http_response_code(400);
    echo json_encode(["message" => "missing token"]);
    exit;
}

$codec = new JWTCodec($_ENV["SECRET_KEY"]);

try {
    $payload = $codec->decode($data["token"]);
} catch (Exception $e) {

    http_response_code(400);
    echo json_encode(["message" => $e->getMessage()]);
    exit;
}

$user_id = $payload["sub"];

echo json_encode($user_id);
