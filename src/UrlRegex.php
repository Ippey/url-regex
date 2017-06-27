<?php

namespace Ippey;

/**
 * Created by PhpStorm.
 * User: ippei
 * Date: 2017/06/26
 * Time: 15:42
 */
class UrlRegex
{
    const PATTERN = '_(?:(?:https?|ftp)://)(?:\S+(?::\S*)?@)?(?:(?!(?:10|127)(?:\.\d{1,3}){3})(?!(?:169\.254|192\.168)(?:\.\d{1,3}){2})(?!172\.(?:1[6-9]|2\d|3[0-1])(?:\.\d{1,3}){2})(?:[1-9]\d?|1\d\d|2[01]\d|22[0-3])(?:\.(?:1?\d{1,2}|2[0-4]\d|25[0-5])){2}(?:\.(?:[1-9]\d?|1\d\d|2[0-4]\d|25[0-4]))|(?:(?:[a-z\x{00a1}-\x{ffff}0-9]-*)*[a-z\x{00a1}-\x{ffff}0-9]+)(?:\.(?:[a-z\x{00a1}-\x{ffff}0-9]-*)*[a-z\x{00a1}-\x{ffff}0-9]+)*(?:\.(?:[a-z\x{00a1}-\x{ffff}]{2,}))\.?)(?::\d{2,5})?(?:[/?#][^\s"]*)?_iuS';

    public static function isMatch($url) {
        $result = preg_match_all(self::PATTERN, $url) > 0 ? true : false;
        return $result;
    }

    public static function match($url) {
        preg_match_all(self::PATTERN, $url, $result);
        return $result[0];
    }
}