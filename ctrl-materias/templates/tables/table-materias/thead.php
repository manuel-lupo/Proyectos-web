<?php $es_carrera = !empty($nombre_carrera) ?>
<table>
    <thead>
        <tr class='titulo'>
            <th colspan = '<?php echo ($es_carrera) ? '2' : '3'; ?>'> LISTA DE MATERIAS <?php if ($es_carrera) echo "DE ". strtoupper($nombre_carrera); ?> </th>
        </tr>
    </thead>
    <tbody>
        <tr class ="titulo">
            <td>Materia</td>
            <td>Profesor</td>
            <?php if (!($es_carrera)) echo "<td>Carrera</td>" ?>
        </tr>