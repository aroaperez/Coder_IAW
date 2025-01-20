<?php

    $json = file_get_contents('php://input');
    $request = json_decode($json, true);

    $numero= $request["num"];
    $numeroDoble = $numero * 2;
    $response = ["num" => $numeroDoble];

    header('Content-Type: application/json');
    echo json_encode($response);