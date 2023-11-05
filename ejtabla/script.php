<?php

function imprimirForm(){
    echo "
        <h3> Inserte el limite de la tabla:</h3>
        <form id='limite'>
            <input type='number' name='lmite'>
            <button type='submit'>IMPRIMIR</button>
        </form>
    ";
}
function primeCheck($y){
    $num = $y;
    if ($num == 1) {
        return 0;
    }
    for ($i = 2; $i <= $num / 2; $i++) {
        if ($num % $i == 0)
            return 0;
    }
    return 1;
}
$num = 27;
$x = primeCheck($num);
if ($x == 1) {
    return true;
} else {
    return false;
}

function imprimirTabla($limite){
    echo"
        <br></br>
        <table>";
    for ($i=0; $i < ($limite + 1); $i++) { 
        echo "
            <tr>
        ";
        for ($j=0; $j < ($limite + 1); $j++) { 
            if($i == 0)
                if($j == 0)
                    echo "<td class='borde punta'>Tabla $limite</td>";
                else echo "<td class='borde'>$j</td>";
            if(($j == 0) and ($i != 0))
                echo"<td class='borde'>$i</td>";
            if(($j != 0) and ($i !=0)){
                $mult = $i*$j;
                if(primeCheck($mult)){
                    echo"<td class='destacado'>$mult</td>";
                } else echo"<td>$mult</td>";
            }
        }
        echo"</tr>";
    }
    echo"
        </table>
        <br></br>";
}