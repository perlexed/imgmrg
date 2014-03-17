<?php

class DatabaseConnector {

    private $connection;

    public function __construct() {

        $host = DB_HOST;
        $databaseName = DB_DATABASE;

        $user = DB_USERNAME;
        $password = DB_PASSWORD;

        try {
            $this->connection = new PDO("mysql:host=$host;dbname=$databaseName", $user, $password);

            if(IS_DEV) {
                $this->connection->setAttribute( PDO::ATTR_ERRMODE, PDO::ERRMODE_WARNING );
            } else {
                $this->connection->setAttribute( PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION );
            }

        } catch(PDOException $e) {
            echo $e->getMessage();
        }
    }

}