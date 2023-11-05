<?php
define('BASE_URL', '//'.$_SERVER['SERVER_NAME'] . ':' . $_SERVER['SERVER_PORT'] . dirname($_SERVER['PHP_SELF']));
require_once 'templates/header.php';
require_once 'script.php';
// el router va a leer la action desde el paramtro "action"

$action = 'tabla'; // accion por defecto
if (!empty( $_GET['action'])) {
    $action = $_GET['action'];
}

$params = explode('/', $action);
imprimirForm();
if ($params[1] != null)
    imprimirTabla($params[1]);
require_once 'templates/footer.php';