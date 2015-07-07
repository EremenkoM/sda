<?php


class User
extends AbstractModel
{
    protected static $table = 'users';
    protected static $id = 'id';

    protected $db;

    public function __construct(){
        $this->db = new DB();
    }
    /***
     * Авторизация пользователей
     * */
    public function login($data){
        if(empty($data['email']))
            throw new Exception('E-mail не может быть пустым');
        if(strlen($data['password']) <= 5)
            throw new Exception('Длина пароля должна быть не менее 6 символов');

        $email = strtolower(validate::clear($data['email']));
        $password = validate::hashInit($data['password']);

        $sql = "SELECT `id`,`email`, `password`,`activate` FROM ".self::$table." WHERE `email` = :email";
        $result = $this->db->fetch($sql,array(':email'=>$email));

        //Проверяем активирован ли аккаунт пользователя
        if($result->activate == 0){
            throw new Exception("Ваш аккаунт не активирован!");
        }
        if($result->email === $email && $password === $result->password){

            if($data['remember'] == 1){
                setCookie("user_id", $result->id, time() +3600 * 24 * 30);
            }
            $_SESSION['user']['id'] = $result->id;

            return true;
        }
        return false;
    }
    /**
     * определение профиля пользователя
     */
    public function specProfile($id){
        $sql = "SELECT `id_spec` FROM ".self::$table." WHERE `id` = $id";
        $result = $this->db->fetch($sql);

        return $result->id_spec;
    }
    /**
     * вывод данных одного пользователя
     */
    public function oneUserData($id){
        $result = $this->db->fetch("SELECT * FROM ".self::$table." WHERE `id` = " . $id);
        return $result;
    }
    /**
     * Регистрация пользователей
     * */
    public function signup($data){

        if(strlen($data['password']) < 6)
            throw new Exception('Длина пароля должна быть не менее 6 символов');

        if(empty($data['email']))
            throw new Exception('E-mail не может быть пустым');

        if($data['captcha'] != $_SESSION['captcha'])
            throw new Exception("Капча введена не верно");

        $email = strtolower(validate::clear($data['email']));

        if($this->UniqEmail($email)) throw new Exception('Такой email уже зарегистрирован!');

        $password = validate::hashInit($data['password']);

        if(validate::EmailValidate($email) === false)
            throw new Exception('Введите корректный email');

        $time = time();
        $spc = $data['id_spec'];

        //Регистрируем пользователя
        $sql = "INSERT INTO ".self::$table." (`email`,`password`,`date_register`, `activate`, id_spec )
	                                 VALUES(:email, :password, $time, 0, $spc)";
        $result = $this->db->execute($sql,[':email'=> $email,':password'=> $password]);

        if($result == true)
        {
            $id = $this->db->lastInsertId();
            //отправляем письмо активации
            $key_hash = validate::hashInit($email."::".$password);
            $link_activate = HTTP_PATH."activate/".$id."/".$key_hash;
            mail::new_mail($email, "Активация аккаунта!", "Здравствуйте, вы зарегистрировались на сайте SDA.com. \n\r
	     Для подтверждения аккаунта, кликните по ссылке активации:" .  $link_activate . "\n\r");

            return true;
        }

        //Записываем в лог ошибку
        $info = $this->db->errorInfo();

        error::ErrLog("- Ошибка PDO: ". $info[2] . "\n". __FILE__ . "\n" . __LINE__);
    }



    /**
     * Активация аккаунта
     * */
    public function activate_account($id, $activate_key){
        $sql = "SELECT `email`, `password` FROM ".self::$table." WHERE `id` = $id";
        $result = $this->db->fetch($sql);
        if($activate_key === validate::hashInit($result->email."::".$result->password)){
            if($this->db->execute("UPDATE ".self::$table." SET `activate` = 1")) return true;
        }

        return false;
    }
    /**
     * Проверка E-mail на уникальность
     * */
    public function UniqEmail($email){
        $sql = ("SELECT `id` FROM ".self::$table." WHERE `email` = :email");
        $result = $this->db->fetch($sql,[':email' => $email]);
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
        $new_password = rand(10,100) . "hgkl" . rand(1,9);
        $password = validate::hashInit($new_password);
        //Перезаписываем пароль пользователю
        $sql = ("UPDATE ".self::$table." SET password = :password WHERE email = :email");
        $result = $this->db->execute($sql,[':password'=>$password,':email'=>$email]);
        if(!$result) return false;
        //отправляем письмо пользователю с новым паролем
        mail::new_mail($email, "Новый пароль", "Ваш новый пароль, для доступа к аккаунту\n". $new_password);

        return true;
    }

    /**
     * Выход пользователей
     * */
    public function logout(){
        session_destroy();
        setCookie("user_id", "" , time() -3600);
    }

}