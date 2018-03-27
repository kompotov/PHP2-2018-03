<?php

namespace App;

abstract class Model
{

    public const TABLE = '';

    public $id;

    public static function findAll()
    {
        $db = new Db();

        $sql = 'SELECT * FROM ' . static::TABLE;
        return $db->query(
            $sql,
            static::class
        );
    }

    public static function findById($id)
    {
        $db = new Db();

        $sql = 'SELECT * FROM ' . static::TABLE . ' WHERE id=:id';
        $data = $db->query(
            $sql,
            static::class,
            [
                'int' => [
                    ':id' => $id
                ]
            ]
        );
        if ($data == []) {
            return false;
        }
        return $data[0];
    }

}