<?php


abstract class AbstractController {

    static protected $model;

    static protected $city;
    static protected $spec;
    static protected $id_spec;

    public  function actionAll()
    {
        $v = static::$model;
        $val = $v::findAll();
        $view = new View();
        $view->$v = $val;
        $view->display( $v . '\all.php');
    }

    public function actionOne()
    {
        $id = $_GET['id'];
        $v = static::$model;
        $val = $v::findOneByPk($id);
        $view = new View();
        $view->$v = $val;
        $view->display( $v . '\one.php');
    }
/*
    protected static $id = 'id_masters';
    protected static $city = 'city';
    protected static $spec = 'profession';
    protected static $tab_spec = 'profess';
    protected static $id_spec = 'id_prof';

    protected static $id = 'id_org';
    protected static $city = 'city';
    protected static $spec = 'specification';
    protected static $tab_spec = 'specification_org';
    protected static $id_spec = 'id_spec';
*/
    public function actionFind()
    {
        $v = static::$model;
        $col = $_POST[static::$id_spec];
        $col2 = $_POST[static::$city];
        $val = $v::findOneByColumm(static::$spec,$col,static::$city,$col2);
        //var_dump($val);
        $view = new View();
        $view->$v = $val ;
        $view->display($v . '\all.php');
    }

}