<?php

abstract class AbstractModel
{

   static protected $table;
   static protected $class;

    static public function  getAll()
    {
        $db = new DB;
        $sql = 'SELECT * FROM ' . static::$table;
        return $db->queryAll($sql, static::$class);
    }
    public static  function getOne($id)
    {
        $db = new DB();
        $sql = ' SELECT * FROM '. static::$table . ' WHERE id = ' .$id;
        return $db->queryOne($sql, static::$class);
    }

}