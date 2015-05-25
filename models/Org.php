<?php


/**
 * Class Org
 * @property $id_org
 * @property $name_org
 * @property $city_org
 * @property $specification
 */
class Org
    extends AbstractModel
{
    protected static $table = 'organizations';
    protected static $id = 'id_org';
}