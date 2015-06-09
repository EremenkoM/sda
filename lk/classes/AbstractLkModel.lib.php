<?php

abstract class AbstractLkModel
{
    static protected $table;
    static protected $id;

    protected $data = [];

    public function __set($k, $v)
    {
        $this->data[$k] =$v;
    }

    public function __get($k)
    {
        $this->data[$k];
    }

    public function __isset($k)
    {
        return isset($this->data[$k]);
    }


    private $db;
    public function __construct(){
        $this->db = Connect::_self()->mysql();
    }

    public function showProfile($id){
        $id = intval($id);
        $query = $this->db->query(
            'SELECT * FROM users,'. static::$table . ' WHERE id = '.$id. ' AND ' . static::$id . '=' . $id
            );
        return  $query->fetch();
    }

    /**
     * вставка новой записи
     */

    public function insert ()
    {
        $cols = array_keys($this->data);
        $data = [];
        foreach ($cols as $col){
            $data [':' . $col] = $this->data[$col];
        }
        $sql = 'INSERT INTO ' . static::$table . '
          ('. implode(', ', $cols) . ')
          VALUES
         ('. implode(', ', array_keys($data)) . ')';

        $query = $this->db->prepare($sql);
        $query->execute($data);
    }

    /**
     * изменение профиля пользователя
     */
    public function update()
    {
        $cols = [];
        $data = [];
        foreach ($this->data as $k => $v) {
            $data[':' . $k] = $v;
            $cols[] = $k . '=:' . $k;
        }
        $sql =
            ' UPDATE users,'. static::$table .
            ' SET ' . implode(', ', $cols) .
            ' WHERE ' . static::$id . " = :id AND id = :id";

        $query = $this->db->prepare($sql);
        $query->execute($data);
    }
    public function changeAvatar($id){
        $sql = ("UPDATE ". static::$table . " SET avatar = $id WHERE ". static::$id . " = $id");
        $query = $this->db->prepare($sql);
        var_dump($sql);
        $query->execute();
    }

}