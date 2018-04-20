<?php

namespace App;

use App\Exceptions\DbException;

class Db
{

    protected $dbh;

    /**
     * Db constructor.
     * @throws DbException
     */
    public function __construct()
    {
        $config = Config::getObject();
        $dbConfig = $config->data['db'];
        try {
            $this->dbh = new \PDO(
                'mysql:host=' . $dbConfig['host'] . ';dbname=' . $dbConfig['dbname'],
                $dbConfig['user'],
                $dbConfig['password']
            );
        } catch (\PDOException $e) {
            throw new DbException('Ошибка подключения');
        }
    }

    /**
     * @param string $query
     * @param array $params
     * @return bool
     */
    public function execute($query, $params=[])
    {
        $sth = $this->dbh->prepare($query);
        return $sth->execute($params);
    }

    /**
     * @param string $sql
     * @param string $class
     * @param array $data
     * @return array
     * @throws DbException
     */
    public function query($sql, $class, $data=[])
    {
        $sth = $this->dbh->prepare($sql);
        $res = $sth->execute($data);
        if (!$res) {
            throw new DbException();
        }
        return $sth->fetchAll(\PDO::FETCH_CLASS, $class);
    }

    /**
     * @return string
     */
    public function getLastId()
    {
        return $this->dbh->lastInsertId();
    }

}