<?php

abstract class AbstractModel
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



    public static function  findAll()

    {
        $class = get_called_class();
        $db = new DB();
        $db->setClassName($class);

        $sql = ' SELECT * FROM ' . static::$table;
        return $db->query($sql);
    }

    public static function findOneByPk($id)
    {
        $class = get_called_class();
        $sql = ' SELECT * FROM ' . static::$table . ' WHERE ' .  static::$id  . '=:id ';
        $db = new DB();
        $db->setClassName($class);
        return $db->query($sql, [':id' => $id]);
    }
    public static function findOneByColumm($coloumm ,$value)
    {
        $class = get_called_class();
        $sql = ' SELECT * FROM ' . static::$table . ' WHERE '. $coloumm .  ' =:value ';
        $db = new DB();
        $db->setClassName($class);
        $res = $db->query($sql, [':value' => $value]);
        /*if (empty($res)) {//исключения для ошибок в PDO
            throw new ModelException('Ничего не найдено...');
        }*/
        if (!empty($res)) {
            return $res[0];
        }
        return false;

    }
/*
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

        var_dump($sql);
        var_dump($data);

        $db = new DB();
        $db->execute($sql, $data);
        if (isset($this)) {
            $this->id = $db->lastInsertId();
        }
    }
*/
    /*
   public function update()
    {
        $cols = [];
        $data = [];
        foreach ($this->data as $k => $v) {
            if ('id' == $k){
                continue;
            }
            $data[':' . $k] = $v;
            $cols[] = $k . '=:' . $k;
        }

        $sql =
            ' UPDATE '. static::$table .
            ' SET ' . implode(', ', $cols) .
            ' WHERE ' . static::$table . ' . ' . static::$id . '=:id';
        var_dump($sql);
        var_dump($data);
        $db = new DB();
        $db->execute($sql, $data);
    }
*/
   /*
    public function save()
    { var_dump($this->id);
        if (!isset($this->id)){
            $this->insert();
        } else {
            $this->update();
        }
    }
   */
}