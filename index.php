<?php
session_start();

require_once 'config/database.php';

require_once 'helpers/session_helper.php';
require_once 'helpers/url_helper.php';

spl_autoload_register(function ($className) {
    $filename = 'controllers/' . $className . '.php';
    if (file_exists($filename)) {
        require_once $filename;
    }
});

$url = isset($_GET['url']) ? rtrim($_GET['url'], '/') : 'feedback/index';
$url = filter_var($url, FILTER_SANITIZE_URL);
$urlParts = explode('/', $url);

$controllerName = ucfirst($urlParts[0]) . 'Controller';
$methodName = isset($urlParts[1]) ? $urlParts[1] : 'index';

$params = array_slice($urlParts, 2);


if (file_exists('controllers/' . $controllerName . '.php')) {
    require_once 'controllers/' . $controllerName . '.php';
    $controller = new $controllerName();

    if (method_exists($controller, $methodName)) {
        call_user_func_array([$controller, $methodName], $params);
    } else {
        die('Method does not exist');
    }
} else {
    die('Controller does not exist');
}
?>