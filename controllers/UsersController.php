<?php

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


        $db = new DB();
        var_dump($db->lastInsertId());

    }

}