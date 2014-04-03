<?php

require_once 'bootstrap.php';

$fileManager = new FileManager();
$GLOBALS['fileManager'] = $fileManager;

$fileManager->run();

//ob_start();
//include 'client/imageList.php';
//ob_flush();