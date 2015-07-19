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