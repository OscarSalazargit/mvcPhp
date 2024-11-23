<?php
function console_log($data) {
    echo '<script>';
    echo 'console.log(' . json_encode($data) . ')';
    echo '</script>';
}

define('CONTROLLERS_FOLDER', "controller/");

define('DEFAULT_CONTROLLER', "imagen");

define('DEFAULT_ACTION', "home");

$controller = DEFAULT_CONTROLLER;

if (!empty($_GET['controlador']))  $controller = $_GET['controlador'];

$action = DEFAULT_ACTION;

if (!empty($_GET['action']))   $action = $_GET['action'];

$controller = CONTROLLERS_FOLDER . $controller . '_controller.php';

try {
    if (is_file($controller)) require_once($controller);
    else
        throw new Exception('El controlador no existe- 404 not found');
    //Si la variable $action es una funcion la ejecutamos o detenemos el script
    if (is_callable($action))   $action();
    else
        throw new Exception('La accion no existe- 404 not found');
} catch (Exception $e) {
    console_log($e->getMessage());
}
