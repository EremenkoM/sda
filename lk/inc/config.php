<?php
 //Ошибки (выводить на экран) - В реальном проекте лучше поменять на false
 ini_set('display_errors', 1);
 //Отображать все ошибки - В реальном проекте лучше поставить E_ERROR или 0
 error_reporting(E_ALL & E_NOTICE);
 
 //подключение библиотек
 spl_autoload_register(function($className){
    if(file_exists(LIB.'/'.$className.'.lib.php'))
        require_once LIB.'/'.$className.'.lib.php';

    if(file_exists(MOD.'/'.$className.'.php'))
        require_once MOD.'/'.$className.'.php';

    if(file_exists(CTRL.'/'.$className.'.php'))
        require_once CTRL.'/'.$className.'.php';

 });
 
 //http путь до корня
 $root_url = explode("/", filter_input(INPUT_SERVER, "PHP_SELF"));
 $dirname = empty($root_url[1]) ? '/' : '/'.$root_url[1].'/';
 /**
  * текущий каталог, если скрипт в каталоге
  * */
  if($root_url[1] != 'index.php') define("DIR", $root_url[1]);
 
 define("HTTP_PATH", 'http://'.  
        filter_input(INPUT_SERVER, "HTTP_HOST") .$dirname);
 
 //Подключение к БД
 /**
  * - Имя пользователя MySQL
  * - Пароль пользователя MySQL
  * - Имя Базы Данных
  * 
  * Если имя сервера не localhost, пропишите имя сервера 4м параметром
  * */
 Connect::_self()->setDatabase("root", "", "SDA" );