<?php
require_once './app/db.php';


function showSelectMaterias(){
    $materias = getMaterias();
    echo "<option selected disabled'>Materia</option>";
    foreach ($materias as $materia) {
        ?>
        <option value="<?php echo $materia->id?>"><?php echo $materia->nombre?></option>
    <?php }
}

function showSelectCarreras(){
    $carreras = getCarreras();
    echo "<option selected disabled'>Carrera</option>";
    foreach ($carreras as $carrera) {
        ?>
        <option value="<?php echo $carrera->id?>"><?php echo $carrera->nombre?></option>
    <?php }
}

function showAdminPanel()
{
    require_once './templates/admin_panel.php';
}
function showCarreras(){
    require_once './templates/tables/table-carreras/thead.php';
    $carreras = getCarreras();
    foreach ($carreras as $carrera) {
        ?>
        <tr>
            <td><?php echo $carrera->nombre ?> </td>
            <td><?php echo $carrera->duracion ?></td>
            <td><a href="materias/<?php echo $carrera->id?>">Ver materias</a></td>
        </tr>
    <?php }
    require_once './templates/tables/table-carreras/tfoot.php';
}

function showMaterias($id_carrera = null){
    if(empty($id_carrera))
        $materias = getMaterias();  
    else{
        if(!existeCarrera($id_carrera)){
            header("Location: /404");
            die();
        }
        $materias = getMaterias($id_carrera);
        $carrera = getCarrera($id_carrera);
        $nombre_carrera = $carrera->nombre;
    }
    require_once './templates/tables/table-materias/thead.php';
    ?>
    <ul>
    <?php foreach ($materias as $materia) {
        $carrera = getCarrera($materia->id_carrera);
        ?>
        <tr>
            <td><?php echo $materia->nombre?></td>
            <td> <?php echo $materia->profesor ?></td>
            <?php if (empty($id_carrera)){ ?>
                <td><a href="materias/<?php echo $carrera->id ?>"><?php echo $carrera->nombre; 
                ?> </td> <?php } ?>
        </tr>
    <?php } 
    require_once './templates/tables/table-materias/tfoot.php';?>
    </ul> <?php
}

function show404(){
    echo '<h1>PAGINA NO ENCONTRADA</h1>';
}