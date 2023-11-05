<?php
class MovieView
{

    public function renderHome()
    {
        ?>
        <h1>Peliculas por género</h1>

        <ul>
            <li><a href="/genero/Comedy">Comedias</a></li>
            <li><a href="/genero/Drama">Drama</a></li>
            <li><a href="/genero/Romance">Románticas</a></li>
            <li><a href="/genero/Animation">Animación</a></li>
            <li><a href="/genero/Action">Acción</a></li>
        </ul>
    <?php }

    public function renderMovieTable($movies, $genre = null)
    {
        echo "<h1>" . ((empty($genre)) ? "Lista de peliculas: " :"Lista por género: $genre") . "</h2>" ;
        echo "<a href='/home'> Volver </a>";
        echo "<table>
        <thead>
            <tr>
                <th>Título</th>
                <th>Año</th>
                <th>Estudio</th>
                <th>Rating de audienca</th>
            </tr>
        <thead>
        <tbody>
";
        foreach ($movies as $movie) {
            echo "
            <tr>
                <td>" .(($movie->getAudience_score() > 80) ? "✯" : "" ). $movie->getTitle() ."</td>
                <td>" .$movie->getYear() ."</td>
                <td>" .$movie->getStudio() ."</td>
                <td>". $movie->getAudience_score() ."%</td>
            </tr>
    ";
        }
        echo " </tbody>    
    </table>";
    }


    public function render404(){
        echo "<h1>PAGINA NO ENCONTRADA</h1>";
    }
}