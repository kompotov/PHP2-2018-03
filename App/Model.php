<?php

namespace App;

/**
 * Class Model
 * @package App
 */

abstract class Model
{

    public const TABLE = '';

    public $id;

    /**
     * @return array
     */
    public static function findAll(): array
    {
        $db = new Db();

        $sql = 'SELECT * FROM ' . static::TABLE;
        return $db->query(
            $sql,
            static::class
        );
    }

    /**
     * @param int $id
     */
    public static function findById(int $id)
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


    public function insert()
    {
        $fields = get_object_vars($this);

        $cols = [];
        $data = [];

        foreach ($fields as $name => $value) {
            if ('id' == $name) {
                continue;
            }
            $cols[] = $name;
            $data[':' . $name] = $value;
        }

        $sql = 'INSERT INTO ' . static::TABLE . ' 
            (' . implode(',', $cols) . ') 
        VALUES 
            (' . implode(',', array_keys($data)) . ')
        ';

        $db = new Db();
        $db->execute($sql, $data);

        $this->id = $db->getLastId();
    }

    public function update()
    {
        $fields = get_object_vars($this);

        $cols = [];
        $data = [];

        foreach ($fields as $name => $value) {
            if ('id' == $name) {
                continue;
            }
            $cols[] = $name . '=:' . $name;
            $data[':' . $name] = $value;
        }

        $sql = 'UPDATE ' . static::TABLE . ' 
        SET ' . implode(',', $cols) . ' 
        WHERE id=' . $this->id . '
        ';

        $db = new Db();
        $db->execute($sql, $data);

    }

    public function save()
    {
        if (false === static::findById($this->id)) {
            $this->insert();
        } else {
            $this->update();
        }
    }

    public function delete()
    {
        $sql = 'DELETE FROM ' . static::TABLE . ' WHERE id=' . $this->id;
        $db = new Db();
        $db->execute($sql);
    }

}