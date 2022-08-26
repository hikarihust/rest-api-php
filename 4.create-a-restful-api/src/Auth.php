<?php

class Auth
{
    private $user_gateway;
    private $user_id;
    private $codec;

    public function __construct(UserGateway $user_gateway, JWTCodec $codec)
    {
        $this->user_gateway = $user_gateway;
        $this->codec = $codec;
    }

    public function authenticateAPIKey(): bool
    {
        if (empty($_SERVER["HTTP_X_API_KEY"])) {

            http_response_code(400);
            echo json_encode(["message" => "missing API key"]);
            return false;
        }

        $api_key = $_SERVER["HTTP_X_API_KEY"];

        $user = $this->user_gateway->getByAPIKey($api_key);

        if ($user === []) {

            http_response_code(401);
            echo json_encode(["message" => "invalid API key"]);
            return false;
        }

        $this->user_id = $user["id"];

        return true;
    }

    public function getUserID(): int
    {
        return $this->user_id;
    }

    public function authenticateAccessToken(): bool
    {
        if (!preg_match("/^Bearer\s+(.*)$/", $_SERVER["HTTP_AUTHORIZATION"], $matches)) {
            http_response_code(400);
            echo json_encode(["message" => "incomplete authorization header"]);
            return false;
        }

        try {
            $data = $this->codec->decode($matches[1]);
        } catch (Exception $e) {

            http_response_code(400);
            echo json_encode(["message" => $e->getMessage()]);
            return false;
        }

        $this->user_id = $data["sub"];

        return true;
    }
}
