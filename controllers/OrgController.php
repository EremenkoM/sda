<?php


class OrgController
extends AbstractController
{

    protected static $model = 'org';
    protected static $city = 'city_org';
    protected static $spec = 'specification';
    protected static $id_spec = 'id_spec';
    protected static $tab_spec = 'specification_org';

    public function actionProfileOrg()
    {
        $data = new Org();
        $id = ($_SESSION['user']['id']) ? $_SESSION['user']['id'] : $_COOKIE['user_id'];
        if ($data->findOneByPk($id) == false) {
            $data->id_org = $id;
            $data->name_org = '';
            $data->city_org = '';
            $data->specification = '';
            $data->comment = '';
            $data->avatar = '0';
            $data->insert();
        }
        $this->actionProfile($id);
    }
    public function actionUpdateProfileOrg(){
        $id = ($_SESSION['user']['id']) ? $_SESSION['user']['id'] : $_COOKIE['user_id'];
        $data = new Org();
        $data->id = $id;
        if($_POST['password'] === "" || $_POST['password'] === 0){}
        else{$data->password = validate::hashInit($_POST['password']);}

        $data->name_org = $_POST['name'];

        $data->city_org = $this->trimArray('city');

        $data->specification = $this->trimArray('spc');

        $data->comment = $_POST['comment'];
        $data->update();
    }
}