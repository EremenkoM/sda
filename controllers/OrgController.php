<?php


class OrgController {

    public  function actionAll()
    {
        $org = Org::findAll();
        $view = new View();
        $view->org = $org ;
        var_dump($org);
        $view->display('org\all.php');

    }


    public function actionOne()
    {
        $id = $_GET['id'];
        $org = Org::findOneByPk($id);
        $view = new View();
        $view->org = $org;

        $view->display('org\one.php');
    }

}