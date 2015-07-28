<?php


/**
 * Class Masters
 * @property $id
 * @property $login
 * @property $password
 * @property $name_masters
 * @property $surname_masters
 * @property $profession
 * @property $comment
 */

class Masters
    extends AbstractModel
{
    protected static $table = 'masters';
    protected static $id = 'id_masters';
    protected static $city = 'city';
    protected static $spec = 'profession';
    protected static $tab_spec = 'profess';
    protected static $id_spec = 'id_prof';
    protected static $val_spec = 'value_prof';
}