<?php

class OrgCtrl {


    public function actionOrg()
        {
            $data = new Org();
            $id = ($_SESSION['user']['id']) ? $_SESSION['user']['id'] : $_COOKIE['user_id'];
            if ($data->showProfile($id) == false) {
                $data->id_org = $id;
                $data->name_org = '';
                $data->city_org = '';
                $data->specification = '';
                $data->avatar = '0';
                $data->insert();
            }
            $org = $data->showProfile($id);
            $view = new ViewLk();
            $view->org = $org ;
            $view->display('profile.org.tpl.php');
        }
    public function updateOrg(){

        $id = ($_SESSION['user']['id']) ? $_SESSION['user']['id'] : $_COOKIE['user_id'];


        $data = new Org();
        $data->id = $id;
        $data->email = $_POST['email'];

        if($_POST['password'] === "" || $_POST['password'] === 0){}
        else{$data->password = validate::hashInit($_POST['password']);}

        $data->name_org = $_POST['name'];
        $data->city_org = $_POST['city'];
        $data->specification = $_POST['spc'];
        $data->update();
        $this->actionOrg();
    }
}