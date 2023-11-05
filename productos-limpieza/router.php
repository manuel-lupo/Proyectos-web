<?php
try {
    define('BASE_URL', '//' . $_SERVER['SERVER_NAME'] . ':' . $_SERVER['SERVER_PORT'] . dirname($_SERVER['PHP_SELF']));
   
    require_once './app/ProductosController.php';
    $controller = new ProductosController();

    $action = 'home'; // accion por defecto
    if (!empty($_GET['action'])) {
        $action = $_GET['action'];
    }


    // parsea la accion para separar accion real de parametros
    $params = explode('/', $action);
    require_once './templates/header.php';
    switch ($params[0]) {
        
        case 'home':
            $controller->showListaProductos();
            break;
        
        case 'producto':
            if(empty($params[1]))
                header('Location: /home');
            else
                $controller->showProducto($params[1]);
            break;
        
        default:
            $controller->show404();
            break;
    }
    require_once './templates/footer.php';
} catch (\Throwable $th) {
    echo $th;
}