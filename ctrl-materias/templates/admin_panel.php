<div class='admin_panel'>
    <div class= 'add_panels'>
        <form id='add_materia'>
            <label for='nombre'>Ingrese el nombre de la materia:</label>
            <input type='text' name='nombre' id='nombre' placeholder='Materia'></input>
            <label for='profe'>Ingrese el nombre del profesor:</label>
            <input type='text' name='profe' id='profe' placeholder='Profesor'></input>
            <label for='carrera'>Seleccione la carrera a la que pertenece</label>
            <select name='carrera'>
                <?php showSelectCarreras() ?>
            </select>
            <button type='submit'>AÑADIR</button>
        </form>
        <form id='add_carrera'>
            <label for='nombre'>Ingrese el nombre de la carrera:</label>
            <input type='text' name='nombre' id='nombre' placeholder='Carrera'></input>
            <label for='duracion'>Ingrese la duracion de la carrera:</label>
            <input type='float' name='duracion' id='duracion'></input>
            <button type='submit'>AÑADIR</button>
        </form>
    </div>
    <div class= 'remove_panels'>
        <form id='remove_materia'>
            <label for='materia'>Seleccione la materia</label>
            <select name='materia' id='materia'>
                <?php showSelectMaterias() ?>
            </select>
            <label for='clave'>Ingrese la clave de eliminacion:</label>
            <input type='number' name='clave' id='clave'></input>
            <button type='submit'>ELIMINAR</button>
        </form>
        <form id='remove_carrera'>
            <label for='carrera'>Seleccione la carrera</label>
            <select name='carrera' id='carrera'>
            <?php showSelectCarreras() ?>
            </select>
            <label for='clave'>Ingrese la clave de eliminacion:</label>
            <input type='number' name='clave' id='clave'></input>
            <button type='submit'>ELIMINAR</button>
        </form>
    </div>
</div>