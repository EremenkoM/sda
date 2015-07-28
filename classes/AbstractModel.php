<?php

abstract class AbstractModel
{
    static protected $table;
    static protected $id;
    static protected $city;
    static protected $spec;
    static protected $id_spec;
    static protected $tab_spec;
    static protected $val_spec;

    protected $data = [];

    public function __set($k, $v)
    {
        $this->data[$k] = $v;
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
        $sql = 'SELECT * FROM ' . static::$table; /*.
            ' JOIN city ON ' . static::$city . ' = id_city
                 JOIN ' . static::$tab_spec .  ' ON ' . static::$spec . ' = ' . static::$id_spec;*/
       // var_dump($sql);
        $temp = self::getValueForId($db->query($sql));

        return $temp;
    }
    public static function getValueForId ($array){
        //var_dump($array);

        $spc = static::$spec;
        $value = static::$val_spec;
        $city = static::$city;
        foreach($array as $v) {
            $str='';
            $str2='';
            $str.= $v->$spc;
            $str2= $v->$city;
            $arr = explode(',',$str);
            $arr2 = explode(',',$str2);
            //var_dump($arr);
            $str='';
            $str2='';
            foreach($arr as $voo){
                $str.= self::nameSpecValForId($voo).', ';
            }
            foreach($arr2 as $voo){
                $str2.= self::nameCityValForId($voo).', ';
            }
            $str = trim($str,', ');
            $str2 = trim($str2,', ');
            $v->$value = $str;
            $v->$city = $str2;
        }
        //var_dump($array);die;
        return $array;
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
        $temp = $db->query($sql, [':id' => $id]);
        $out = self::getOwnValue($temp);
        return $out[0];
    }

    public static function getOwnValue($val){//!!!not end
        $str='';
        $spc = static::$spec;
        //var_dump($val);
        foreach($val as $v) {
            $str.= $v->$spc;
            $arr = explode(',',$str);
            $str='';
                foreach($arr as $voo){
                    $str.= self::nameValForId($voo).',';
                }
            $str = trim($str,',');
            $v->value_rented = $str;
        }
        //var_dump($val);die;
        return $val;
    }

    private static function nameSpecValForId($id){
        $value = static::$val_spec;
        $sql = ("SELECT $value FROM " . static::$tab_spec . " WHERE ". static::$id_spec. " = $id");
        $db = new DB();
        $v = $db->fetch($sql);
        return $v->$value;
    }
    private static function nameCityValForId($id){
        $sql = ("SELECT value_city FROM  city WHERE id_city = $id");
        $db = new DB();
        $v = $db->fetch($sql);
        return $v->value_city;
    }



    public static function findOneByColumm($val, $val2)
    {
       // $class = get_called_class();
        $sql = 'SELECT * FROM ' . static::$table .
            ' WHERE '. static::$spec ." LIKE '%".$val."%' AND ". static::$city . " LIKE '%".$val2."%'";
        $db = new DB();
        //var_dump($sql);
        //$db->setClassName($class);
        $res = self::getValueForId($db->query($sql));
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
    /*
     *  город аренды в профиле пользователя
     * */
    public static function giveCity($id)
    {
        $sql = 'SELECT * FROM ' . static::$table . ' WHERE ' .  static::$id  . '=:id ';
        $db = new DB();
        $out = $db->fetch($sql, [':id' => $id]);
        $par = static::$city;
        return $out->$par;
    }
    /*
     * получаем выбранные опции
     * для селекторов
     * */
    public static function findAllOpt($param)
    {
        $sql = 'SELECT * FROM '. $param;
        $db = new DB();
        return $db->query($sql);
    }

    public function getOpt($id,$param)
    {
        if ($param == 'city'){
            $spc = static::$city;
            $idspc = 'id_city';
            $data = self::findAllOpt('city');
        }else{
            $spc = static::$spec;
            $idspc = static::$id_spec;
            $data = self::findAllOpt(static::$tab_spec);
        }
        $val = self::findOneByPk($id);
        $allId = explode(',',$val->$spc);

        foreach($allId as $voo){
            foreach ($data as $item) {
                if($item->$idspc == $voo) $item->select = 'selected';
                if(!isset($item->select)) $item->select = '';
            }
        }//var_dump($param);
        return $data;
    }
}