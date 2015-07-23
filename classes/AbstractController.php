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
    public function actionProfile($id)
    {
        $mod = static::$model;
        $data = new $mod();
        $v = $data->findOneByPk($id);
        $city = $data->getOpt($id,'city');
        $spc = $data->getOpt($id,static::$spec);
        $view = new View();
        $view->$mod = $v ;
        $view->city = $city;
        $view->spc = $spc ;
        $view->displayLk('/lk/profile.'.$mod.'.tpl.php');
    }
    public function trimArray($param){
        $str = '';
        foreach($_POST[$param] as $voo){
            $str.= $voo . ',';
        }
        return trim($str,',' );
    }

}