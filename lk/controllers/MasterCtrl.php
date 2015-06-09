<?php

class MasterCtrl {
    public function actionMaster()
    {
        $data = new Masters();
        $id = ($_SESSION['user']['id']) ? $_SESSION['user']['id'] : $_COOKIE['user_id'];
        if ($data->showProfile($id) == false) {
            $data->id_masters = $id;
            $data->name_masters = '';
            $data->surname_masters = '';
            $data->profession = '';
            $data->city = '';
            $data->comment = '';
            $data->avatar = '0';
            $data->insert();
        }
        $master = $data->showProfile($id);
        $view = new ViewLk();
        $view->master = $master ;
        $view->display('profile.tpl.php');
    }

    public function updateMaster(){
        $id = ($_SESSION['user']['id']) ? $_SESSION['user']['id'] : $_COOKIE['user_id'];

        $data = new Masters();
        $data->id = $id;
        $data->email = $_POST['email'];

        if($_POST['password'] === "" || $_POST['password'] === 0){}
        else{$data->password = validate::hashInit($_POST['password']);}

        $data->name_masters = $_POST['name'];
        $data->surname_masters = $_POST['surname'];
        $data->city = $_POST['city'];
        $data->profession = $_POST['prof'];
        $data->comment = $_POST['comment'];
        $data->update();
        $this->actionMaster();
    }

}