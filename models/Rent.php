<?php

class Rent
    extends AbstractModel
{
    protected static $table = 'rent';
    protected static $id = 'id_users';
    protected static $city = 'city_rent';
    protected static $spec = 'rented';
    protected static $tab_spec = 'rented_name';
    protected static $id_spec = 'id_rented';

    public function findAllRent()
    {
        $sql = 'SELECT * FROM rented_name';
        $db = new DB();
        $val = $db->query($sql);
        return $val;
    }
/*
    public function getOwnRent($id){
        $str = '';
        $val = self::findOneByPk($id);
        $allId = explode(',',$val->rented);
        foreach($allId as $voo){
           $str.= $this->nameRentForId($voo) . ', ';
        }
        return trim($str,',' );
    }
    private function nameRentForId($id){
        $sql = ("SELECT value_rented FROM rented_name WHERE id_rented = $id");
        $db = new DB();
        $v = $db->fetch($sql);
        return $v->value_rented;
    }
*/
    public function updateRent()
    {
        $data = [];
        foreach ($this->data as $k => $v) {
            $data[':' . $k] = $v;
        }
        $sql = ' UPDATE rent SET rented = :rented, city_rent = :city_rent WHERE id_users = :id';
        //var_dump($sql,$data);
        $db = new DB();
        $db->execute($sql, $data);
    }

    public function getOptValue($id)
    {

        $val = self::findOneByPk($id);
        $allId = explode(',',$val->rented);
        $rented = $this->findAllRent();

        foreach($allId as $voo){
            foreach ($rented as $item) {
                    if($item->id_rented == $voo) $item->select = 'selected';
                    if(!isset($item->select)) $item->select = '';
                }
            }
        return $rented;
    }
    public function deleteRent($id){
        $sql = "DELETE FROM `rent` WHERE `id_users` = $id";
        $db = new DB();
        $db->query($sql);
    }
    public function getCity($id){
        $user = new User();
        $spec = $user->specProfile($id);
        if($spec == 1) $act = New Org();
        if($spec == 2) $act = New Masters();
        if($spec == 3) $act = New Shop();
         $out = $act->giveCity($id);
        return $out;
    }
}