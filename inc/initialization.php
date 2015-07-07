<?php
/**
 * @desc Главный клас системы
 */

class initialization{
	/**
	 * Инициализация скрипта
	 * */
	public static function init(){
	  //Подключаем конфигурацию
	  require dirname(__FILE__) . '/config.php';
	  new route();
	}
}
