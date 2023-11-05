<?php
require_once 'db_fake.php';

function showObject($obj)
{
    $objects = getObjects();
    if (isset($_GET['object']) && isset($objects[$_GET['object']])) {
        $selected_object = $objects[$_GET['object']];
        echo "<h1>" . $selected_object["name"] . "</h1>";
        foreach ($selected_object["images"] as $image)
            echo "<img src='img/$image'/><br>";
    }
    echo "<a href='home'>VOLVER</a>";
}

function showHome(){
    $objects = getObjects();
    echo "<p>Seleccione un objecto:</p><br>";
        foreach ($objects as $object => $data)
            echo "<a href='$object'>" . $data["name"] . "</a><br>";
}

function show404(){
    echo '<h1>PAGINA NO ENCONTRADAD</h1>';
}
