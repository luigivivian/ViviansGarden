<?php
/**
 * Created by PhpStorm.
 * User: luigi
 * Date: 16/04/18
 * Time: 21:56
 */

class DAO {
    protected static $db;

    public function __construct()
    {
        if(!isset(self::$db)){
            DAO::$db = new PDO('mysql:host=127.0.0.1;dbname=trab165137;charset=utf8mb4', 'root', 'root');
            DAO::$db->exec('SET CHARSET UTF8');
        }
    }
}
