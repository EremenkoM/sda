<?php

class UsersController {


    public  function actionAll()
    {
        $users = Users::getAll();
        $view = new View();
        $view->assign('users', $users);
        //$view->items = $users;
        //var_dump($view->items);
        $view->display('users/all.php');
    }


    public function actionOne()
    {
        $id = $_GET['id'];
        $user = Users::getOne($id);
        $view = new View();
        $view->assign('user', $user);
        //var_dump($user);
        //$view->item = $user;
        $view->display('users/one.php');
    }

}