<?php

// @todo move to serv config
define("IS_LOCAL", 1);


// @todo move configs to git-free dir
if(IS_LOCAL) {
    require_once 'local_config.php';
} else {
    require_once 'config.php';
}


require_once 'modules/FileManager/FileManager.php';
