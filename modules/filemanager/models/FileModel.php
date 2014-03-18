<?php

class FileModel extends BaseModel {

    public function save($saveData) {
        echo $saveData;
        $STH = $this->dataSource->prepare("INSERT INTO `files_history`(`sourceName`, `guid`, `name`, `extension`) VALUES ('qwe','asd','zxc','wer')");
        $STH->execute();
    }

}
