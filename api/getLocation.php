<?php
require_once '../models/location.php';

header('Access-Control-Allow-Origin: *');
header('Content-Type: application/json');
header("Access-Control-Allow-Methods: GET");

$latitude = isset($_GET['latitude']) ? $_GET['latitude'] : die;
$longitude = isset($_GET['longitude']) ? $_GET['longitude'] : die;
Getlocation($latitude, $longitude);

function Getlocation($latitude, $longitude)
{
    $location = new App\Models\Location();

    $stmt = $location->getLocation($latitude, $longitude);
    $count = $stmt->rowCount();

    if($count > 0)
    {
        $result = array(
            'name' => $location->name,
            'colour' => $location->colour
        );
        echo json_encode($result);
    }

    else {
        echo json_encode(
            array('message' => 'location not found')
        );
    }
}