<?php

abstract class AbstractModel
{
    static protected $table;
    static protected $id;
    static protected $city;
    static protected $spec;
    static protected $id_spec;
    static protected $tab_spec;

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
        //$class = get_called_class();
        $db = new DB();
        //$db->setClassName($class);
        $sql = 'SELECT * FROM ' . static::$table .
            ' JOIN city ON ' . static::$city . ' = id_city
                 JOIN ' . static::$tab_spec .  ' ON ' . static::$spec . ' = ' . static::$id_spec;
       // var_dump($sql);
        return $db->query($sql);
    }

    public static function findOneByPk($id)
    {
        //$class = get_called_class();
        $sql = 'SELECT * FROM ' . static::$table .
            ' JOIN city ON ' . static::$city . ' = id_city
                 JOIN ' . static::$tab_spec .  ' ON ' . static::$spec . ' = ' . static::$id_spec . ' WHERE ' .  static::$id  . '=:id ';
        $db = new DB();
        //var_dump($sql);
        //$db->setClassName($class);
        return $db->fetch($sql, [':id' => $id]);
    }
    public static function findOneByColumm($col ,$val,$col2, $val2)
    {
       // $class = get_called_class();
        $sql = 'SELECT * FROM ' . static::$table .
            ' JOIN city ON ' . static::$city .
            ' = id_city JOIN ' . static::$tab_spec .
            ' ON ' . static::$spec . ' = ' . static::$id_spec .
            ' WHERE '. $col .  ' =:value OR '. $col2 . '=:value2';
        $db = new DB();
        var_dump($sql);
        //$db->setClassName($class);
        $res = $db->query($sql, [':value' => $val,':value2' => $val2]);
        /*if (empty($res)) {//исключения для ошибок в PDO
            throw new ModelException('Ничего не найдено...');
        }*/
        if (!empty($res)) {
            return $res;
        }
        return false;
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

        $db = new DB();
        $db->execute($sql, $data);
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

        $db = new DB();
        $db->execute($sql, $data);
    }

    public function changeAvatar($id){
        $sql = ("UPDATE ". static::$table . " SET avatar = $id WHERE ". static::$id . " = $id");
        $db = new DB();
        $db->execute($sql);
    }
    public static function existString($id)
    {
        $sql = 'SELECT * FROM ' . static::$table . ' WHERE ' .  static::$id  . '=:id ';
        $db = new DB();
        return $db->fetch($sql, [':id' => $id]);
    }

}