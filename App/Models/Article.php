<?php

namespace App\Models;

use App\Db;
use App\Model;

class Article extends Model
{

    public const TABLE = 'news';

    public $title;
    public $content;

    public static function getNumOfLastArticles($num)
    {
        $db = new Db();

        $sql = 'SELECT * FROM ' . self::TABLE . ' ORDER BY id DESC LIMIT :limit';
        return $db->query(
            $sql,
            self::class,
            [
                'int' => [
                    ':limit' => $num
                ]
            ]
        );
    }

}