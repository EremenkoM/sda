<?php


/**
 * Class Org
 * @property $id_org
 * @property $name_org
 * @property $city_org
 * @property $specification
 * @property $avatar
 */
class Org
    extends AbstractLkModel
{
    protected static $table = 'org';
    protected static $id = 'id_org';
}