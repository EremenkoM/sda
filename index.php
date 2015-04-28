<?php
require __DIR__ . '/autoload.php';

$ctrl = isset($_GET['ctrl']) ? $_GET['ctrl']:'Users';
$act = isset($_GET['act']) ? $_GET['act']:'All';

$controllerClassName = $ctrl . 'Controller';

$controller = new $controllerClassName;

$method = 'action' . $act;
$controller->$method();

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

$path = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);
$pathParts = explode('/', $path);

$ctrl = !empty($pathParts[1]) ? ucfirst($pathParts[1]) : 'Users';
$act = !empty($pathParts[2]) ? ucfirst($pathParts[2]) : 'All';

*/


