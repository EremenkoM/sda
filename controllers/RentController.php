<?php

class RentController
extends AbstractController
{
    protected static $model = 'rent';
    protected static $city = 'city_rent';
    protected static $spec = 'rented';
    protected static $id_spec = 'id_rented';


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