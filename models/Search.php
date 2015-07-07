<?php

class Search

extends AbstractModel
{
    public static function findAllProf()
    {
        $sql = 'SELECT * FROM profess';
        $db = new DB();
        return $db->query($sql);
    }
    public static function findAllCity()
    {
        $sql = 'SELECT * FROM city';
        $db = new DB();
        return $db->query($sql);
    }
    public static function findAllGoods()
    {
        $sql = 'SELECT * FROM goods_shop';
        $db = new DB();
        return $db->query($sql);
    }

}