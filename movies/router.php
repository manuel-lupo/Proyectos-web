<?php
try {
    define('BASE_URL', '//' . $_SERVER['SERVER_NAME'] . ':' . $_SERVER['SERVER_PORT'] . dirname($_SERVER['PHP_SELF']));

    require_once './app/MovieController.php';
    $controller = new MovieController();

    $action = 'home'; // accion por defecto
    if (!empty($_GET['action'])) {
        $action = $_GET['action'];
    }


    // parsea la accion para separar accion real de parametros
    $params = explode('/', $action);
    require_once './templates/header.php';
    switch ($params[0]) {

        case 'home':
            $controller->showHome();
            break;

        case 'genero':
            if (empty($params[1]))
                $controller->showMovies();
            else
                $controller->showMovies($params[1]);
            break;
        
        case 'estudio':
            if (empty($params[1]))
                $controller->show404();
            else
                $controller->showMoviesByStudio($params[1]);
            break;

        case 'about':
            
            break;

        default:
            $controller->show404();
            break;
    }
    require_once './templates/footer.php';
} catch (\Throwable $th) {
    echo $th;
}