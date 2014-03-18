<?php

class BaseModel {

    protected $dataSource;

    public function __construct() {
        $dbConn = new DatabaseConnector();
        $this->dataSource = $dbConn->getConnection();
    }

}