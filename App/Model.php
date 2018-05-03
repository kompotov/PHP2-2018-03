<?php

namespace App;

use App\Exceptions\Errors;
use App\Exceptions\NotFoundException;

abstract class Model
{

    public const TABLE = '';

    public $id;

    /**
     * @return array
     * @throws Exceptions\DbException
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
     * @return Model|false
     * @throws Exceptions\DbException
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
        return $data[0] ?? false;
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

            if (!$this->existsField($name)) {
                $errors->addError(new \Exception('В моделе нет данного свойства.'));
                continue;
            }

            $validator = 'validate' . $name . 'Field';
            if (method_exists($this, $validator)) {
                try {
                    $this->$validator($value);
                } catch (\Exception $e) {
                    $errors->addError($e);
                    continue;
                }
            }

            $this->$name = $value;
        }

        if (!$errors->isErrorsArrayEmpty()) {
            throw $errors;
        }
    }

    public function existsField($name)
    {
        $fields = get_object_vars($this);
        return array_key_exists($name, $fields);
    }

}