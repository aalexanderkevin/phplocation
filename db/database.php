<?php

namespace App;

use PDO;

/**
 * Database Connection related
 */
class Database {

    /** 
     * Database Connection
     * 
     * @static
     */
    private static $connection;
    
    /**
     * Get Database Connection
     * 
     * @return Object $connection
     */
    public static function getConnection()
    {
        if (!self::$connection) {
            $host = 'host.docker.internal';
            $port = '5432';
            $db_name = 'geocoding';
            $user = 'postgres';
            $password = 'postgres';
    
            try {
                $dsn = "pgsql:host=" . $host .";port=" . $port . ";dbname=" . $db_name . ";";

                //create PDO instance
                self::$connection = new PDO($dsn, $user, $password );
                self::$connection->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_OBJ);
                self::$connection->setAttribute(PDO::ATTR_EMULATE_PREPARES, false);
                self::$connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                return self::$connection;
    
            } catch (PDOException $e) {
                throw new \PDOException("Connection to PostgreSQL failed: " . $e->getMessage(), (int)$e->getCode());
                echo "Connection to PostgreSQL failed: " . $e->getMessage();
            }

        } else return self::$connection;
        
    }

    // Close PDO
    public static function closeConnection() {
        self::$connection = null;
    }

}