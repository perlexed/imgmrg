<?php

require_once 'bootstrap.php';

$fileManager = new FileManager();
$GLOBALS['fileManager'] = $fileManager;

$fileManager->run();

