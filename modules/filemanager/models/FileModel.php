<?php

class FileModel extends BaseModel {

    public function save($sourceFileName, $uidFileName, $fileExtension) {

        $STH = $this->dataSource->prepare("INSERT INTO `files_history`(`sourceName`, `uid`, `extension`) VALUES (?, ?, ?)");
        $STH->execute(array($sourceFileName, $uidFileName, $fileExtension));
    }

}
