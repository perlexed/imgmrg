<?php

/**
 * Class NameGenerator
 *
 * Generating unique names for files
 */
class NameGenerator {

    const LENGTH = 5;
    private static $charList = 'abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';

    /**
     * Generating random string with given length
     * @param int|null $nameLength
     * @return string
     */
    public static function getRandomString($nameLength = null) {

        $nameLength = $nameLength ? (int) $nameLength : self::LENGTH;
        $outputString = '';

        for($i = 0; $i < $nameLength; $i++) {
            $outputString .= self::$charList[rand(0, strlen(self::$charList) - 1)];
        }

        return $outputString;
    }

}

