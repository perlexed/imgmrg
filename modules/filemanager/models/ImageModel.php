<?php

class ImageModel extends BaseModel {

    protected $schema = array(
        'uid',
        'sourceFilename',
        'thumbnails',
        'fileinfo'
    );

    public function save() {

        $STH = $this->dataSource->prepare("INSERT INTO `files_history`(`sourceName`, `uid`, `extension`) VALUES (?, ?, ?)");
        $STH->execute(array($sourceFileName, $uidFileName, $fileExtension));
    }

}
