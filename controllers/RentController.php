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
        $opt = $rent->getOptValue($id);
        $view = new View();
        $view->option = $opt;
        $view->displayLk('/lk/rent.tpl.php');
    }

    public function actionUpdateRent(){
        $str = '';
        $id = ($_SESSION['user']['id']) ? $_SESSION['user']['id'] : $_COOKIE['user_id'];
        $data = new Rent();

        foreach($_POST['rented'] as $voo){
            $str.= $voo . ',';
        }
        $data->id = $id;
        $data->rented = trim($str,',' );
        $data->updateRent();
    }

}