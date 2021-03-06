<?php

namespace App\Core;

use Exception;

class App
{
    protected static $container = [];

    public static function bind($key, $value)
    {
        static::$container[$key] = $value;
    }

    public static function get($key)
    {
        if (! array_key_exists($key, static::$container))
        {
            throw new Exception("{$key} isn't bound yet!");
        }
        return static::$container[$key];
    }
}