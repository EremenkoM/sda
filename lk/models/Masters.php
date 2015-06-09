<?php


/**
 * Class Masters
 * @property $id_masters
 * @property $city
 * @property $name_masters
 * @property $surname_masters
 * @property $profession
 * @property $comment
 * @property $avatar
 */

class Masters
    extends AbstractLkModel
{
    protected static $table = 'masters';
    protected static $id = 'id_masters';
}