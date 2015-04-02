<?php

class UsersController {


    public  function actionAll()
    {
        $users = Users::getAll();
        $view = new View();
        //$view->assign('users', $users);
        $view->users = $users;
        $view->display('users/all.php');
    }


    public function actionOne()
    {
        $id = $_GET['id'];
        $user = Users::getOne($id);

        $view = new View();
        //$view->assign('user', $user);
        $view->user = $user;
        $view->display('users/one.php');
    }

}