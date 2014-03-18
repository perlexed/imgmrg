<?php

class BaseConnector {

    protected $connection;

    public function __construct() {
        $this->_initConnection();
    }

    protected function _initConnection() {

    }

    public function getConnection() {
        return $this->connection;
    }

} 