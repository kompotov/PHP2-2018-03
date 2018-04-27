<?php

namespace App;

use App\Exceptions\Errors;
use App\Exceptions\NotFoundException;

abstract class Model
{

    public const TABLE = '';

    public $id;

    /**
     * @return \Generator
     * @throws Exceptions\DbException
     */
    public static function findAll()
    {
        $db = new Db();
        $sql = 'SELECT * FROM ' . static::TABLE;
        return $db->queryEach(
            $sql,
            static::class
        );
    }

    /**
     * @param int $id
     * @return Model|false
     * @throws Exceptions\DbException
     * @throws NotFoundException
     */
    public static function findById($id)
    {
        $db = new Db();
        $sql = 'SELECT * FROM ' . static::TABLE . ' WHERE id=:id';
        $data = $db->query(
            $sql,
            static::class,
            [
                ':id' => $id
            ]
        );
        if ($data == []) {
            throw new NotFoundException();
        }
        return $data[0];
    }

    /**
     * @throws Exceptions\DbException
     */
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

    /**
     * @throws Exceptions\DbException
     */
    public function update()
    {
        $fields = get_object_vars($this);

        $cols = [];
        $data = [];

        foreach ($fields as $name => $value) {
            if ('id' == $name) {
                $data[':' . $name] = $value;
                continue;
            }
            $cols[] = $name . '=:' . $name;
            $data[':' . $name] = $value;
        }

        $sql = 'UPDATE ' . static::TABLE . ' 
        SET ' . implode(',', $cols) . ' 
        WHERE id=:id';

        $db = new Db();
        $db->execute($sql, $data);
    }

    /**
     * @throws Exceptions\DbException
     */
    public function save()
    {
        if (isset($this->id)) {
            $this->update();
        } else {
            $this->insert();
        }
    }

    /**
     * @throws Exceptions\DbException
     */
    public function delete()
    {
        $sql = 'DELETE FROM ' . static::TABLE . ' WHERE id=:id';
        $db = new Db();
        $db->execute($sql, [':id' => $this->id]);
    }

    /**
     * @param iterable $data
     * @throws Errors
     */
    public function fill(iterable $data)
    {
        $errors = new Errors();

        foreach ($data as $name => $value) {
            if ('id' == $name) {
                continue;
            }

            if (strlen($data[$name]) < 4 || false !== strpos($data[$name], '42') ) {

                if (strlen($data[$name]) < 4) {
                    $errors->addError(new \Exception('Поле ' . $name . ' короче 4 символов'));
                }

                if (strpos($data[$name], '42') !== false) {
                    $errors->addError(new \Exception('В поле ' . $name . ' есть число 42'));
                }

                continue;
            }

            $this->$name = $value;
        }

        if (!$errors->isErrorsArrayEmpty()) {
            throw $errors;
        }
    }

}