<?php

class DatabaseConnector extends BaseConnector {

    protected $connection;

    protected function _initConnection() {
        $host = DB_HOST;
        $databaseName = DB_DATABASE;

        $user = DB_USERNAME;
        $password = DB_PASSWORD;

        $connection = null;

        try {
            $connection = new PDO("mysql:host=$host;dbname=$databaseName", $user, $password);

            if(IS_DEV) {
                $connection->setAttribute( PDO::ATTR_ERRMODE, PDO::ERRMODE_WARNING );
            } else {
                $connection->setAttribute( PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION );
            }

            $this->connection = $connection;

        } catch(PDOException $e) {
            echo $e->getMessage();
            die();
        }
    }

    public function getConnection() {

        return $this->connection;
    }

}