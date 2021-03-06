<?php

class MastersController
extends AbstractController
{

    protected static $model = 'masters';
    protected static $city = 'city';
    protected static $spec = 'profession';
    protected static $id_spec = 'id_prof';
    protected static $tab_spec = 'profess';

    public function actionProfileMaster()
    {
        $data = new Masters();
        $id = ($_SESSION['user']['id']) ? $_SESSION['user']['id'] : $_COOKIE['user_id'];
        if ($data->findOneByPk($id) == false) {
            $data->id_masters = $id;
            $data->name_masters = '';
            $data->surname_masters = '';
            $data->profession = '';
            $data->city = '';
            $data->comment = '';
            $data->avatar = '0';
            $data->insert();
        }
        $this->actionProfile($id);
    }

    public function actionUpdateProfileMaster(){
        $id = ($_SESSION['user']['id']) ? $_SESSION['user']['id'] : $_COOKIE['user_id'];

        $data = new Masters();
        $data->id = $id;

        if($_POST['password'] === "" || $_POST['password'] === 0){}
        else{$data->password = validate::hashInit($_POST['password']);}

        $data->name_masters = $_POST['name'];
        $data->surname_masters = $_POST['surname'];


        $data->city = $this->trimArray('city');
        $data->profession = $this->trimArray('spc');

        $data->comment = $_POST['comment'];
        $data->update();
    }
}