<?php

require __DIR__ . '/autoload.php';

$path = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);
//var_dump($path);
$pathParts = explode('/', $path);
//var_dump($pathParts);
$ctrl = !empty($pathParts[2]) ? ucfirst($pathParts[2]) : 'Masters';
$act = !empty($pathParts[3]) ? ucfirst($pathParts[3]) : 'All';
//var_dump($ctrl);
//var_dump($act);
/*
$ctrl = isset($_GET['ctrl']) ? $_GET['ctrl']:'Masters';
$act = isset($_GET['act']) ? $_GET['act']:'All';
*/
$controllerClassName =  $ctrl . 'Controller';

$controller = new $controllerClassName;

$method = 'action' . $act;
$controller->$method();

/*
//применяем json
$content = file_get_contents(__DIR__ . '/composer.json');
$obj = json_decode($content);
echo $obj->foo;
//обратная функция
//json_encode($obj); //можно записать в файл
*/
/* реализаци исключений примерная. Ловим исключения

try {
    $controller = new $controllerClassName;
    $method = 'action' . $act;
    $controller->$method();
} catch (Exception $e) {
    $view = new View();
    $view->error = $e->getMessage();
    $view->display('error.php');
}

*/

/* реализация ЧП URL пока не понял смотреть 7 урок у Альберта
положить этот фаил в корень
(.htaccess)
        RewriteEngine On
        RewriteBase /

        RewriteRule ^(.*)$ index.php
)



*/


