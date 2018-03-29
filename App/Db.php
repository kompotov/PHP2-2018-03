<?php

namespace App;

class Db
{

    protected $dbh;

    public function __construct()
    {
        $config = Config::getObject();
        $dbConfig = $config->data['db'];
        $this->dbh = new \PDO(
            'mysql:host='.$dbConfig['host'] . ';dbname=' .$dbConfig['dbname'],
            $dbConfig['user'],
            $dbConfig['password']
        );
    }

    public function execute($query, $params=[])
    {
        $sth = $this->dbh->prepare($query);
        return $sth->execute($params);
    }

    public function query($sql, $class, $data=[])
    {
        $sth = $this->dbh->prepare($sql);
        if (isset($data['str'])) {
            foreach ($data['str'] as $param => $str) {
                $sth->bindParam($param, $str, \PDO::PARAM_STR);
            }
        }
        if (isset($data['int'])) {
            foreach ($data['int'] as $param => $int) {
                $sth->bindParam($param, $int, \PDO::PARAM_INT);
            }
        }
        $sth->execute();
        return $sth->fetchAll(\PDO::FETCH_CLASS, $class);
    }

    public function getLastId()
    {
        return $this->dbh->lastInsertId();
    }

}