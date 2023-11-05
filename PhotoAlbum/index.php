<html>
<?php
define('BASE_URL', '//' . $_SERVER['SERVER_NAME'] . ':' . $_SERVER['SERVER_PORT'] . dirname($_SERVER['PHP_SELF']));
require_once 'handler.php';
?>

<head>
    <meta charset="UTF-8">
    <base href="<?php echo BASE_URL ?>">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>eAA</title>
</head>

<body>
    <?php

    // el router va a leer la object desde el paramtro "object"
    
    $object = 'home'; // accion por defecto
    if (!empty($_GET['object'])) {
        $object = $_GET['object'];
    }

    switch ($object) {
        case 'home':
            showHome();
            break;

        case 'flower':
            showObject('flower');
            break;

        case 'tree':
            showObject('tree');
            break;
        
        case 'duck':
            showObject('duck');
            break;

        default:
            show404();
            break;
    }

    ?>
</body>

</html>