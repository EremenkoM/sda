<?php


class UserController {
    public function actionShowProfile(){
        $user = new User();
        $id = ($_SESSION['user']['id'])? $_SESSION['user']['id'] : $_COOKIE['user_id'];
        $spec = $user->specProfile($id);
        if ($spec == 1) {
            $act = New OrgController();
            $act->actionProfileOrg();
        }elseif($spec == 2){
            $act = New MastersController();
            $act->actionProfileMaster();
        }else{
            $act = New ShopController();
            $act->actionProfileShop();
        }
    }
    public function actionSignProfile(){
        $view = new View();
        $view->displayLogin('/lk/sign.tpl.php');
    }
    public function actionRecover(){
        $view = new View();
        $view->displayLogin('/lk/repassword.tpl.php');
    }
}