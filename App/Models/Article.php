<?php

namespace App\Models;

use App\Db;
use App\Model;

class Article extends Model
{

    public const TABLE = 'news';

    public $title;
    public $content;

    public static function getLast3Articles()
    {
        $db = new Db();

        $sql = 'SELECT * FROM ' . self::TABLE . ' ORDER BY id DESC LIMIT 3';
        return $db->query(
            $sql,
            self::class,
            []
        );
    }
}