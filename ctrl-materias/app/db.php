<?php
define('CLAVE_ELIMINACION', 443);         
function getConection()
{
    try {
        return new PDO('mysql:host=localhost;dbname=db_carreras;charset=utf8', 'root', '');
    } catch (\Throwable $th) {
        throw $th;
    }
}

function getMaterias($id_carrera = null)
{
    $db = getConection();
    $sql = "SELECT * FROM materias";
    if (!empty($id_carrera))
        $sql = $sql . " WHERE id_carrera = $id_carrera;";
    else
        $sql = $sql . " ORDER BY id_carrera , nombre";
    $query = $db->prepare($sql);
    $query->execute();
    return $query->fetchAll(PDO::FETCH_OBJ);
}

function getCarreras()
{
    $db = getConection();
    $query = $db->prepare('SELECT * FROM carreras');
    $query->execute();
    return $query->fetchAll(PDO::FETCH_OBJ);
}

function getMateria($id_materia)
{
    $db = getConection();
    $query = $db->prepare("SELECT * FROM materias WHERE id = ?");
    $query->execute([$id_materia]);
    if ($query->rowCount() == 0)
        return false;
    return $query->fetchAll(PDO::FETCH_OBJ)[0];
}

function getCarrera($id_carrera)
{
    $db = getConection();
    $query = $db->prepare("SELECT * FROM carreras WHERE id = ?");
    $query->execute([$id_carrera]);
    if ($query->rowCount() == 0)
        return false;
    return $query->fetchAll(PDO::FETCH_OBJ)[0];
    
}

function existeMateria($id_materia){
    if (getMateria($id_materia) == false)
        return false;
    return true;
}

function existeCarrera($id_carrera){
    if (getCarrera($id_carrera) == false)
        return false;
    return true;
}

function addCarrera($nombre, $duracion){
    $db = getConection();
    $query = $db->prepare("INSERT INTO `carreras`(`nombre`, `duracion`) VALUES (?,?)");
    try {
        $duracion = floatval($duracion);
        $query->execute([$nombre,$duracion]);
    } catch (\Throwable $th) {
        throw new Exception("Debe ingresar un numero valido", 1);
    }
}

function addMateria($nombre, $profesor, $id_carrera){
    $db = getConection();
    $query = $db->prepare("INSERT INTO `materias`(`nombre`, `profesor`, `id_carrera`) VALUES (?,?,?)");
    if(existeCarrera($id_carrera))
        $query->execute([$nombre,$profesor,$id_carrera]);
    else
        throw new Exception("La carrera indicada no existe", 1); 
}

function removeMateria($id_materia, $clave){
    if(($clave == CLAVE_ELIMINACION) and (existeMateria($id_materia))){
        $db= getConection();
        $query= $db->prepare("DELETE FROM materias WHERE id= ?");
        $query->execute([$id_materia]);
    }
}

function removeCarrera($id_carrera, $clave){
    if(($clave == CLAVE_ELIMINACION) and (existeCarrera($id_carrera))){
        $db= getConection();
        $query= $db->prepare("DELETE FROM carreras WHERE id= ?");
        $query->execute([$id_carrera]);
    }
}

if(!empty($_POST['type']))
    switch ($_POST['type']) {
        case 'add_carrera':
            addCarrera($_POST['nombre'], $_POST['duracion']);
            break;
        
        case 'add_materia':
            addMateria($_POST['nombre'], $_POST['profe'], $_POST['carrera']);
            break;

        case 'remove_carrera':
            removeCarrera($_POST['carrera'], $_POST['clave']);
            break;
        
        case 'remove_materia':
            removeMateria($_POST['materia'], $_POST['clave']);
            break;
    }