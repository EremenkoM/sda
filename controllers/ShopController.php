<?php

class ShopController
extends AbstractController
{
    protected static $model = 'shop';
    protected static $city = 'city_shop';
    protected static $spec = 'goods';
    protected static $id_spec = 'id_goods';



    public function actionProfileShop()
    {
        $data = new Shop();
        $id = ($_SESSION['user']['id']) ? $_SESSION['user']['id'] : $_COOKIE['user_id'];

        if ($data->existString($id) == false) {
            //var_dump($data->existString($id));
            $data->id_shop = $id;
            $data->name_shop = '';
            $data->city_shop = '';
            $data->goods = '';
            $data->comment = '';
            $data->avatar = '0';
            $data->insert();
        }
        $this->actionProfile($id);
    }
    public function actionUpdateProfileShop(){

        $id = ($_SESSION['user']['id']) ? $_SESSION['user']['id'] : $_COOKIE['user_id'];

        $data = new Shop();
        $data->id = $id;

        if($_POST['password'] === "" || $_POST['password'] === 0){}
        else{$data->password = validate::hashInit($_POST['password']);}

        $data->name_shop = $_POST['name'];
        $data->city_shop = $this->trimArray('city');
        $data->goods = $this->trimArray('spc');

        $data->comment = $_POST['comment'];
        $data->update();
    }
}