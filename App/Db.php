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
     */
    public function query($sql, $class, $data=[])
    {
        $sth = $this->dbh->prepare($sql);
        $sth->execute($data);
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