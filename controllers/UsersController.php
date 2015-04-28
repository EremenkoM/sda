<?php

use Application\Models\Users;

class UsersController {
    public  function actionAll()
    {
        $users = Users::findAll();
        $view = new View();
        $view->users = $users ;
        $view->display('users\all.php');

    }


    public function actionOne()
    {
        $id = $_GET['id'];
        $user = Users::findOneByPk($id);
        $view = new View();
        $view->users = $user;
        $view->display('users\one.php');
    }

    public function insertUser()//доделать!!!
    {
        $user = new Users();
        $user->login = 'Arci';
        $user->password = 'Password';
        $user->name_masters = 'word';
        $user->surname_masters = 'Pass';
        $user->save();
    }

}