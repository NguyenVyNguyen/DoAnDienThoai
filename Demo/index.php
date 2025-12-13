<?php
session_start();

// Load các file cần thiết
require_once 'config/database.php';

// Router đơn giản
$controllerName = isset($_GET['c']) ? ucfirst($_GET['c']) . 'Controller' : 'HomeController';
$actionName = isset($_GET['a']) ? $_GET['a'] : 'index';

// Đường dẫn file controller
$controllerPath = "controllers/$controllerName.php";

if (file_exists($controllerPath)) {
    require_once $controllerPath;
    if (class_exists($controllerName)) {
        $controller = new $controllerName();
        if (method_exists($controller, $actionName)) {
            $controller->$actionName();
        } else {
            echo "404 - Method not found";
        }
    }
} else {
    echo "404 - Controller not found";
}
?>