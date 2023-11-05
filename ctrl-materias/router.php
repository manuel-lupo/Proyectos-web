<?php
try {
    require_once './app/universidad.php';
    define('BASE_URL', '//' . $_SERVER['SERVER_NAME'] . ':' . $_SERVER['SERVER_PORT'] . dirname($_SERVER['PHP_SELF']));

    $action = 'home'; // accion por defecto
    if (!empty($_GET['action'])) {
        $action = $_GET['action'];
    }


    // parsea la accion para separar accion real de parametros
    $params = explode('/', $action);
    require_once './templates/header.php';
    switch ($params[0]) {
        
        case 'home':
            showCarreras();
            showMaterias();
            break;

        case 'carreras':
            showCarreras();
            break;
        
        case 'materias':
            if(empty($params[1]))
            try {
                showMaterias();
            } catch (\Throwable $th) {
               echo $th;
            }    
            else
            try {
                showMaterias($params[1]);
            } catch (\Throwable $th) {
               echo $th;
            }   
            break;

        case 'admin':
            showAdminPanel();
            break;

        default:
            show404();
            break;
    }
    require_once './templates/footer.php';
} catch (\Throwable $th) {
    throw $th;
}