<?php

require_once '../models/location.php';

header('Access-Control-Allow-Origin: *');
header('Content-Type: application/json');
header("Access-Control-Allow-Methods: GET");

$locationName = isset($_GET['name']) ? $_GET['name'] : die;

GetCoordinate($locationName);

function GetCoordinate($locationName)
{
    $location = new \App\Models\Location();

    $stmt = $location->getCoordinate($locationName);
    $count = $stmt->rowCount();

    if($count > 0)
    {
        $result = array(
            'latitude' => $location->latitude,
            'longitude' => $location->longitude,
            'name' => $location->name
        );
        echo json_encode($result);
    }

    else {
        echo json_encode(
            array('message' => 'location not found')
        );
    }
}