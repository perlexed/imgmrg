<?php

require('services/NameGenerator.php');

class FileManager {

    private static $instance;

    public function get() {
        if( empty(self::$instance)) {
            self::$instance = new self();
        }
        return self::$instance;
    }

    public function run() {



    }

    public function processFile($filename) {
        echo NameGenerator::getRandomString(10);
    }

    public function getFiles() {
        return array('testfilename');
    }

}