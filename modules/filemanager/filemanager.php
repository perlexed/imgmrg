<?php

require('services/NameGenerator.php');
require('StorageEngine.php');
require('connectors/BaseConnector.php');
require('connectors/DatabaseConnector.php');

require_once 'models/BaseModel.php';
require_once 'models/FileModel.php';


class FileManager {

    public function run() {
        $this->processBatch();
    }

    public function processBatch() {

        $filesList = scandir(IMG_TEMP_DIR);

        foreach($filesList as $fileKey => $fileName) {

            // Skip filename if it's '.', '..', or a directory
            if(false !== array_search($fileName, array('.', '..'))
                || is_dir(IMG_TEMP_DIR . DS . $fileName)
            ) {
                unset($filesList[$fileKey]);
            } else {
                $this->processFile($fileName);
            }
        }
    }

    /**
     * @param string $fileName
     * @param string $directory
     */
    public function processFile($fileName, $directory = IMG_TEMP_DIR) {

        $uidFileName = 'i' . NameGenerator::getRandomString(5);

        $fileInfo = pathinfo($directory . DS . $fileName);
        $newName = $uidFileName . '.' . $fileInfo['extension'];

        // @todo envelope rename into try/catch statement
//        $renameSuccessful = rename($directory . DS . $filename, IMG_STORE_DIR . DS . $newName);
        $renameSuccessful = true;

        if($renameSuccessful) {
            $fileModel = new FileModel();
            $fileModel->save($fileName, $uidFileName, $fileInfo['extension']);
        }
    }
}