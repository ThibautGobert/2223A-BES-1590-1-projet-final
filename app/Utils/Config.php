<?php

namespace App\Utils;

class Config
{
    public static array $configs = [];

    /**
     * @param string $key
     * @return string|null
     */
    public static function getConfig(string $key) :? string
    {
        if(!self::$configs) {
            self::$configs = require __DIR__.'/../../config.php';
        }
        if(is_array(self::$configs) && array_key_exists($key, self::$configs)) {
            return self::$configs[$key];
        }
        return null;
    }
}