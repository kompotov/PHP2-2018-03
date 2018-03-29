<?php

namespace App;

class Config
{
    public $data;
    protected static $object = null;

    protected function __construct()
    {
        $this->data = (include __DIR__ . '/../config.php');
    }

    public static function getObject()
    {
        if (static::$object === null) {
            static::$object = new static();
        }
        return static::$object;
    }
}