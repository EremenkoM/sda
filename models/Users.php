<?php


/**
 * Class Users
 * @property $id
 * @property $login
 * @property $password
 * @property $name_masters
 * @property $surname_masters
 * @property $profession
 * @property $comment
 */

class Users
    extends AbstractModel
{
    protected static $table = 'masters';
    protected static $id = 'id_masters';
}