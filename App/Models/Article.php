<?php

namespace App\Models;

use App\Db;
use App\Model;

class Article extends Model
{

    public const TABLE = 'news';

    public $title;
    public $content;
    public $author_id;

    /**
     * @param string $name
     * @return Model|false|null
     * @throws \App\Exceptions\DbException
     */
    public function __get($name)
    {
        if ($name == 'author') {
            if (isset($this->author_id)) {
                return Author::findById($this->author_id);
            }
        }
        return null;
    }

    /**
     * @param int $num
     * @return array
     * @throws \App\Exceptions\DbException
     */
    public static function getNumOfLastArticles($num)
    {
        $db = new Db();
        $sql = 'SELECT * FROM ' . self::TABLE . ' ORDER BY id DESC LIMIT ' . (int)$num;
        return $db->query(
            $sql,
            self::class
        );
    }

}