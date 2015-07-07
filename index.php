<?php
/**
 * @author SDA
 * @desc Входной файл
 */
session_start();
//Проверка версии пыхи
if(version_compare(phpversion(), '5.3.0', '<') == true){
    die ('Ваша версия PHP старее 5.3. 
          Для корректной работы скрипта, требуется версия 5.3 и выше!');
}
/**
* Константа полного пути до корня
*/

define("ROOT_DIR",dirname(__FILE__));

/**
 * Путь до папки с классами
 */
define("LIB", ROOT_DIR.'/classes');
/**
 * Путь к модели
 */
define("MOD", ROOT_DIR.'/models');
/**
 * Путь к контроллерам
 */
define("CTRL", ROOT_DIR.'/controllers');
/**
  * Путь к шаблонам
  */
define("TMP", ROOT_DIR.'/views');
//Инициализируем скрипт
require_once ROOT_DIR . '/inc/initialization.php';
initialization::init();

/*
$path = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);
//var_dump($path);
$pathParts = explode('/', $path);
//var_dump($pathParts);
$ctrl = !empty($pathParts[2]) ? ucfirst($pathParts[2]) : 'Masters';
$act = !empty($pathParts[3]) ? ucfirst($pathParts[3]) : 'All';
//var_dump($ctrl);
//var_dump($act);
/**/
$ctrl = isset($_GET['ctrl']) ? $_GET['ctrl']:'Masters';
$act = isset($_GET['act']) ? $_GET['act']:'All';

$controllerClassName =  $ctrl . 'Controller';

$controller = new $controllerClassName;

$method = 'action' . $act;
$controller->$method();
?>
