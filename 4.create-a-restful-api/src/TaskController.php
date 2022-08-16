<?php

class TaskController
{
    public function processRequest(string $method, ?string $id): void
    {
        if ($id === null) {

            if ($method == "GET") {

                echo json_encode("index");
            } elseif ($method == "POST") {

                echo json_encode("create");
            }
        } else {

            switch ($method) {

                case "GET":
                    echo json_encode("show $id");
                    break;

                case "PATCH":
                    echo json_encode("update $id");
                    break;

                case "DELETE":
                    echo json_encode("delete $id");
                    break;
            }
        }
    }
}
