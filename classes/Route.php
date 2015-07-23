<?php
/**
 * @author SDA
 * @desc Роутинг
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

        $view = new View();
        $user = new User();

		if(count($route) > 1){
			switch($route[0]){
				case "activate":
				 $activate_key = trim($route[2]);
			     $id = intval($route[1]);
				 if($user->activate_account($id, $activate_key)){
				   self::location(HTTP_PATH.'login', 3);
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
                case "recover":
                    $view->displayLk('repassword.tpl.php');
                    break;
				case "logout":
                    $user->logout();
					self::location(HTTP_PATH);
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

        $user = new User();
        $view = new View();
   	 	if(isset($_POST['signup'])){
            var_dump($_POST);
   	 		if($user->signup($_POST)){
   	 		 die("Успешная регистрация! На ваш E-mail отправлено письмо с инструкцией по активации аккаунта");	
   	 		}else{
   	 			echo "<div class='error'>Произоша ошибка в момент регистрации!</div>";
   	 		}	
   	 	}
		if(isset($_POST['login'])){
			if($user->login($_POST)){
                //$view->displayLk('/lk/newRent.tpl.php');
                echo "<div class='error'>Добро пожаловать!!</div>";
					}else{
                        echo "<div class='error'>Ошибка при входе</div>";
                        //$view->display('login.tpl.php');
					}
		}
		if(isset($_POST['recover'])){
			$email = validate::clear($_POST['email']);
			if($user->recover($email)){
				die("На ваш e-mail отправлен новый пароль!");
			}
		}
         if(isset($_POST['profile_org'])){
             var_dump($_POST);
             $org = new OrgController();
             $org->actionUpdateProfileOrg();
             echo "<div class='error'>Профиль изменен</div>";
         }
         if(isset($_POST['profile'])){
             $mas = new MastersController();
             $mas->actionUpdateProfileMaster();
             echo "<div class='error'>Профиль изменен</div>";
         }
         if(isset($_POST['profile_shop'])){
             $shop = new ShopController();
             $shop->actionUpdateProfileShop();
             echo "<div class='error'>Профиль изменен</div>";
         }
         if(isset($_POST['upload'])){
             Upload::uploadImage();
         }
         if(isset($_POST['rent'])){
			 if (isset($_POST['rented'])){
                 $rent = new RentController();
                 $rent->actionUpdateRent();
                 echo "<div class='error'>Профиль изменен</div>";
             }else echo "<div class='error'>Профиль не изменен!!! Поле не может быть пустым</div>";
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


