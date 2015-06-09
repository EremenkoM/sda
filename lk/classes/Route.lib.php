<?php
/**
 * @author SDA
 * @desc Раутинг
 */
class Route {
   private static $tmp;
   public function __toString(){}
   public function __construct(){
       self::dispatcher();   
	   self::data(); 
	}
   /**
    * Роутирование данных
    * */
   public static function dispatcher(){
     if(isset($_GET['route']) && !empty($_GET['route'])){
     	$route = explode("/", strip_tags($_GET['route']));
		$data  = new Data();
        $view = new ViewLk();

		if(count($route) > 1){
			switch($route[0]){
				case "activate":
				 $activate_key = trim($route[2]);
			     $id = intval($route[1]);
				 if($data->activate_account($id, $activate_key)){
				   self::location(HTTP_PATH.'lk/login', 3);
				   exit("Аккаунт успешно активирован!" . nl2br("\n"). 
				        "Через несколько минут, вас перенаправит на страницу авторизации...");
				 }		
				 else{ 
				   exit("Произошла ошибка при активации акаунта! Пожалуйста, обратитесь к Администрации сайта.");	
				 }
				break;
			}
		}else{
			switch($route[0]){
				case "signup":
                    $view->display('sign.tpl.php');
				break;
                case "start":
                    if(Validate::UserStatus() == true){
                        $view->display('news.tpl.php');
                    }else{
                        $view->display('login.tpl.php');
                    }
                    break;
                case "login":
                    $view->display('login.tpl.php');
				break;
				case "profile":
                    $id = ($_SESSION['user']['id'])? $_SESSION['user']['id'] : $_COOKIE['user_id'];
                    if ($data->specProfile($id) == 1) {
                        $act = New OrgCtrl();
                        $act->actionOrg();
                    }else{
                        $act = New MasterCtrl();
                        $act->actionMaster();
                    }
				break;
                case "recover":
                    $view->display('repassword.tpl.php');
                    break;
				case "logout":
					self::location(HTTP_PATH, 0.5);
					$data->logout();
				break;		
			}
		}
     }
	 
   }
   /**
    * Работа с данными POST / COOKIE / SESSION
    * */
   public static function data(){
        try{
   	 if(isset($_POST) && !empty($_POST)){
   	 	$data = new Data();
        $view = new ViewLk();
   	 	if(isset($_POST['signup'])){
   	 		if($data->signup($_POST)){
   	 		 die("Успешная регистрация! На ваш E-mail отправлено письмо с инструкцией по активации аккаунта");	
   	 		}else{
   	 			echo "<div class='error'>Произоша ошибка в момент регистрации!</div>";
   	 		}	
   	 	}
		if(isset($_POST['login'])){
			if($data->login($_POST)){
                $view->display('news.tpl.php');
					}else{
						echo "<div class='error'>Ошибка при входе</div>";
					}
		}
		if(isset($_POST['recover'])){
			$email = validate::clear($_POST['email']);
			if($data->recover($email)){
				die("На ваш e-mail отправлен новый пароль!");
			}
		}
         if(isset($_POST['profile_org'])){
             $org = new OrgCtrl();
             $org->updateOrg();
             echo "<div class='error'>Профиль изменен</div>";
         }
         if(isset($_POST['profile'])){
             $mas = new MasterCtrl();
             $mas->updateMaster();
             echo "<div class='error'>Профиль изменен</div>";
         }
         if(isset($_POST['upload'])){
             Upload::uploadImage();
         }
   	 }

	 
	}catch(Exception $e){
		echo "<div class='error'>".$e->getMessage()."</div>";
	
	} 
   } 
   /**
	 * Редирект
	 * */
	 public static function location($url, $time = 0){
	 	if($time == 0)
		  @header("Location:" . $url);
		else 
		  @header("Refresh:". $time . ";url=". $url);	
	 }
}


