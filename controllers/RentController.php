<?php

class RentController
extends AbstractController
{
    protected static $model = 'rent';
    protected static $city = 'city_rent';
    protected static $spec = 'rented';
    protected static $id_spec = 'id_rented';
    protected static $tab_spec = 'rented_name';

    public function getNameUserForId($id){
        $act = $this->getModelForId($id);
        $out = new $act();
        return $out->giveName($id);
    }
    public function getModelForId($id){
        $user = new User();
        $spec = $user->specProfile($id);
        if ($spec == 1) {
            $act = 'Org';
        }elseif($spec == 2){
            $act = 'Masters';
        }else{
            $act = 'Shop';
        }
        return $act;
    }
    public function actionOne()
    {
        $id = $_GET['id'];
        $model =  $this->getModelForId($id);
        $v = new $model();
        $val = $v->findOneByPk($id);
        $c = $model . 'Controller';
        $ctrl = new $c();
        $ctrl->actionOne();
    }
    public function actionFind()
    {
        if (isset($_GET['id'])){
            $col = $_GET['id'];
            $col2 = '%';
        }else {
            $col = $_POST['id_rented'];
            $col2 = $_POST['city_rent'];
        }
        $val = Rent::findOneByColumm($col,$col2);

        foreach ($val as $v){
            $v->name = $this->getNameUserForId($v->id_users);
        }
        //var_dump($val);
        $view = new View();
        $view->rent = $val ;
        $view->display('rent\find.php');
    }

    public  function actionAll()
    {
        $data = new Rent();
        $city = $data->findAllOpt('city');
        $spc = $data->findAllOpt('rented_name');
        $view = new View();
        $view->city = $city;
        $view->spc = $spc ;
        $view->display( 'rent\all.php');
    }

    public function actionShowRent()
    {
        $id = ($_SESSION['user']['id']) ? $_SESSION['user']['id'] : $_COOKIE['user_id'];
        $rent = new Rent();
        $view = new View();
        if (Rent::findOneByPk($id)) {
            $opt = $rent->getOptValue($id);
            $view->option = $opt;
            $view->displayLk('/lk/rent.tpl.php');
        }else $view->displayLk('/lk/newRent.tpl.php');
    }

    public function actionUpdateRent(){

        $id = ($_SESSION['user']['id']) ? $_SESSION['user']['id'] : $_COOKIE['user_id'];
        $data = new Rent();
        $city = $data->getCity($id);
        $data->city_rent = $city;
        $data->id = $id;
        $data->rented = $this->trimArray('rented');
        $data->updateRent();
    }
    public function actionNewRent(){
        $id = ($_SESSION['user']['id']) ? $_SESSION['user']['id'] : $_COOKIE['user_id'];
        $data = new Rent();
        $city = $data->getCity($id);
        $data->id_users = $id;
        $data->city_rent = $city;
        $data->rented = '1';
        $data->insert();
        $this->actionShowRent();
    }
    public function actionDeleteRent(){
        $id = ($_SESSION['user']['id']) ? $_SESSION['user']['id'] : $_COOKIE['user_id'];
        $data = new Rent();
        $data->deleteRent($id);
        $this->actionShowRent();
    }

}