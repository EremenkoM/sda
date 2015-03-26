<?php

class UsersController {

    public  function actionAll()
    {
        $items = Users::getAll();
        $view = new View();
        $view->assign('items', $items);
        $view->display('users/all.php');
    }


    public function actionOne()
    {
        $id = $_GET['id'];
        $item = Users::getOne($id);
        $view = new View();
        $view->assign('items', $item);
        $view->display('users/one.php');
    }

}