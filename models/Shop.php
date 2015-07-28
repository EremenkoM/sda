<?php
/**
 * Class Org
 * @property $id_org
 * @property $name_org
 * @property $city_org
 * @property $specification
 */
class Shop
    extends AbstractModel
{
    protected static $table = 'shop';
    protected static $id = 'id_shop';
    protected static $city = 'city_shop';
    protected static $spec = 'goods';
    protected static $tab_spec = 'goods_shop';
    protected static $id_spec = 'id_goods';
    protected static $val_spec = 'value_goods';

}