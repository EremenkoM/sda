<?php

namespace Application\Models;

/**
 * Class UsersModel
 * @property $id
 * @property $login
 * @property $password
 * @property $name_masters
 * @property $surname_masters
 */

class Users
    extends \AbstractModel
{
    protected static $table = 'masters';
}