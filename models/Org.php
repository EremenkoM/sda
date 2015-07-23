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
    protected static $table = 'org';
    protected static $id = 'id_org';
    protected static $city = 'city_org';
    protected static $spec = 'specification';
    protected static $tab_spec = 'specification_org';
    protected static $id_spec = 'id_spec';


}