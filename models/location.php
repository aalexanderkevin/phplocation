<?php
namespace App\Models;

require_once '../db/database.php';

class Location
{
    private $table = "location";

    public $latitude;
    public $longitude;
    public $name;
    public $colour;

    public function __construct()
    {
        $this->connection = \App\Database::getConnection();
    }

    public function getlocation($lat, $longi)
    {
        $query = "SELECT * FROM " . $this->table . " WHERE latitude=? AND longitude=?";
        $stmt = $this->connection->prepare($query);
        $stmt->bindParam(1, $lat);
        $stmt->bindParam(2, $longi);
        $stmt->execute();
        $this->parse($stmt->fetch(\PDO::FETCH_ASSOC));
        return $stmt;
    }

    public function getCoordinate($locationName){
        $query = "SELECT * FROM " . $this->table . " WHERE name=?";
        $stmt = $this->connection->prepare($query);
        $stmt->bindParam(1, $locationName);
        $stmt->execute();
        $this->parse($stmt->fetch(\PDO::FETCH_ASSOC));
        return $stmt;
    }

    public function parse($result)
    {
        $this->latitude = $result['latitude'];
        $this->longitude = $result['longitude'];
        $this->name = $result['name'];
        $this->colour = $result['colour'];
    }
}