<?php

/**
 * Class NameGenerator
 *
 * Generating unique names for files
 */
class NameGenerator {

    public static $length = 5;
    private static $charList = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';

    /**
     * Generating random string with given length
     * @param int|null $nameLength
     * @return string
     */
    public static function getRandomString($nameLength = null) {

        $nameLength = $nameLength ? (int) $nameLength : self::$length;
        $outputString = '';

        for($i = 0; $i < $nameLength; $i++) {
            $outputString .= self::$charList[rand(0, strlen(self::$charList) - 1)];
        }

        return $outputString;
    }

}

