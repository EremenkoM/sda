<?php
/**
 * @author SDA
 * @desc Data class
 */
 class Data{
 	private $db;
 	public function __construct(){
 		$this->db = Connect::_self()->mysql();
    }
	/**
	 * Регистрация пользователей
	 * */
	 public function signup($data){
	 	if(strlen($data['password']) < 6)
		  throw new Exception('Длина пароля должна быть не менее 6 символов');
		if(empty($data['email']))
		  throw new Exception('E-mail не может быть пустым'); 
		if($data['captcha'] != $_SESSION['captcha']){
			throw new Exception("Капча введена не верно");
		}
	 	$email = strtolower(validate::clear($data['email']));
		if($this->UniqEmail($email)) throw new Exception('Такой email уже зарегистрирован!');
		$password = validate::hashInit($data['password']);
		if(validate::EmailValidate($email) === false)
		   throw new Exception('Введите корректный email');
		$time = time();
        $spc = $data['id_spec'];
	    //Регистрируем пользователя
	    $query = $this->db->prepare("INSERT INTO `users` (`email`,`password`,`date_register`, `activate`, id_spec )
	                                 VALUES(:email, :password, $time, 0, $spc)");
		$query->bindParam(':email', $email, PDO::PARAM_STR, 155);
		$query->bindParam(':password', $password, PDO::PARAM_STR, 155);

	   if($query->execute()){

           //добавляем таблицу  или мастера или организации в БД
	    $id = $this->db->lastInsertId();
           //отправляем письмо активации
	    $key_hash = validate::hashInit($email."::".$password);
	    $link_activate = HTTP_PATH."lk/activate/".$id."/".$key_hash;
	    mail::new_mail($email, "Активация аккаунта!", "Здравствуйте, вы зарегистрировались на сайте SDA.com. \n\r
	     Для подтверждения аккаунта, кликните по ссылке активации:" .  $link_activate . "\n\r"); 
		 
	     return true;
	   }
	   
	   //Записываем в лог ошибку
	   $info = $this->db->errorInfo();
	   
	   error::ErrLog("- Ошибка PDO: ". $info[2] . "\n". __FILE__ . "\n" . __LINE__);
	  }
      /***
	   * Авторизация пользователей
	   * */
	   public function login($data){
           var_dump($data);
	     if(empty($data['email']))
		  throw new Exception('E-mail не может быть пустым'); 
	   	 if(strlen($data['password']) < 5)
		  throw new Exception('Длина пароля должна быть не менее 6 символов');
		 
		 $email = strtolower(validate::clear($data['email']));
		 $password = validate::hashInit($data['password']);
		 $query = $this->db->prepare("SELECT `id`,`email`, `password`,`activate` FROM `users` WHERE `email` = :email");
		 $query->bindParam(":email", $email, PDO::PARAM_STR);
		 $query->execute();
		 
		 $result = $query->fetch();
		 //Проверяем активирован ли аккаунт пользователя
		 if($result->activate == 0){
		 	throw new Exception("Ваш аккаунт не активирован!");
		 }
		 if($result->email === $email && $password === $result->password){

		 	/*if($data['remember'] == 1){
		 		setCookie("user_id", $result->id, time() +3600 * 24 * 30);
		 	}*/
			$_SESSION['user']['id'] = $result->id;
			
			return true;
		 }
		 return false;
	   }
	   /**
	    * Активация аккаунта
	    * */
	    public function activate_account($id, $activate_key){
	      $query = $this->db->query("SELECT `email`, `password` FROM `users` WHERE `id` = $id");
		  $result = $query->fetch();
		  if($activate_key === validate::hashInit($result->email."::".$result->password)){
		  	if($this->db->exec("UPDATE `users` SET `activate` = 1")) return true;
		  }	
		  
		  return false;
	    }
		 /**
		  * Проверка E-mail на уникальность
		  * */
		  public function UniqEmail($email){
		  	$query = $this->db->prepare("SELECT `id` FROM `users` WHERE `email` = :email");
			$query->bindParam(":email",$email, PDO::PARAM_STR);
			$query->execute();
			$result = $query->fetch();
			if($result->id > 0){
                return true;
            }
			else return false;
		  }
		  /**
		   * Востановление пароля
		   **/
		   public  function recover($email){
		   	 if(!$this->UniqEmail($email))
			    throw new Exception('Такого email адреса не существует в БД!');
			 //Генерируем новый пароль
			 $email = $this->db->quote($email);
			 $new_password = rand(10,100) . "hgkl" . rand(1,9);
			 $password = validate::hashInit($new_password);
			 //Перезаписываем пароль пользователю
			 $query = $this->db->query("UPDATE `users` SET `password` = '$password' WHERE `email` = $email");
			 if(!$query) return false;
			 //отправляем письмо пользователю с новым паролем
			 mail::new_mail($email, "Новый пароль", "Ваш новый пароль, для доступа к аккаунту\n". $new_password);
			 
			 return true;
		   }
     /**
      * определение профиля пользователя
      */
     public function specProfile($id){
         $query = $this->db->prepare("SELECT `id_spec` FROM `users` WHERE `id` = $id");
         $query->execute();
         $result = $query->fetch();

         return $result->id_spec;
     }
     /**
		 * Выход пользователей
		 * */
		 public function logout(){
		 	session_destroy();
			setCookie("user_id", "" , time() -3600);
		 }
	   
 }
