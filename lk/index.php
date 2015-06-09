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
define("ROOT_DIR", dirname(__FILE__));
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
require_once ROOT_DIR.'/inc/initialization.php';
initialization::init();

?>
