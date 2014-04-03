<?php

require('services/NameGenerator.php');
require('services/ImageProcessor.php');
require('StorageEngine.php');
require('connectors/BaseConnector.php');
require('connectors/DatabaseConnector.php');

require_once 'models/BaseModel.php';
require_once 'models/ImageModel.php';


class FileManager {

    public function run() {

        $fileModel = new ImageModel();
        $fileModel->setAttributes(array(
            'uid' => 'qweqwe',
            'fileinfo' => 'asdasd',
            'sourceFilename' => 'zxczxc',
        ));

//        $fileModel->save();


//        $imgProcessor = new ImageProcessor();
//        $imgProcessor->load(IMG_TEMP_DIR . DS . 'img_jpg_normal.jpg');
//        $imgProcessor->makeThumbnail();

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

        $uid = NameGenerator::getRandomString(5);
        $uidFileName = 'i' . $uid;

        $fileinfo = pathinfo($directory . DS . $fileName);
        $newName = $uidFileName . '.' . $fileinfo['extension'];

        // @todo envelope rename into try/catch statement
//        $renameSuccessful = rename($directory . DS . $fileName, IMG_STORE_DIR . DS . $newName);
        $renameSuccessful = true;

        if($renameSuccessful) {
            $fileModel = new ImageModel();
            $fileModel->setAttributes(array(
                'uid' => $uid,
                'fileinfo' => pathinfo(IMG_STORE_DIR . DS . $newName),
                'sourceFilename' => $fileName,
            ));
            $fileModel->save();
        }
    }
}