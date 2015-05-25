<?php

class AdminController

    extends UsersController
{



    public function actionViewUpdate()
    {
        $id = $_GET['id'];
        $user = Users::findOneByPk($id);
        $view = new View();
        $view->users = $user;
        $view->display('users\update.php');
    }
    public function actionViewInsert()
    {
        $view = new View();
        $view->display('users\insert.php');
    }

    public function actionUpdate()
    {
        $user = new Users();
        $user->id = $_GET['id'];
        $user->login = $_POST['login'];
        $user->password = $_POST['password'];
        $user->name_masters = $_POST['name_masters'];
        $user->surname_masters = $_POST['surname_masters'];
        $user->profession = $_POST['profession'];
        $user->comment = $_POST['comment'];
        $user->Update();
        $this->actionOne();
    }
    public function actionInsert()//доделать!!!
    {
        $user = new Users();
        $user->login = $_POST['login'];
        $user->password = $_POST['password'];
        $user->name_masters = $_POST['name_masters'];
        $user->surname_masters = $_POST['surname_masters'];
        $user->comment = $_POST['comment'];
        $user->profession = $_POST['profession'];
        $user->Insert();
        $this->actionOne();
    }

}