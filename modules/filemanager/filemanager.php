<?php

require('services/NameGenerator.php');
require('StorageEngine.php');
require('connectors/BaseConnector.php');
require('connectors/DatabaseConnector.php');

require_once 'models/BaseModel.php';
require_once 'models/FileModel.php';


class FileManager {

    public $dbConnection;

    public function __construct() {
        $this->dbConnection = new DatabaseConnector();

    }

    public function run() {

        $model = new FileModel();

        $model->save('asdasd');

//        $inputFiles = $this->getFiles();
//
//        foreach($inputFiles as $file) {
//            $this->processFile($file);
//        }
    }

    public function processFile($filename) {
        echo NameGenerator::getRandomString(10);
    }

    public function getFiles() {
        return array('testfilename');
    }

}