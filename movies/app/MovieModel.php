<?php
require_once './app/Movie.php';
class MovieModel
{
    private $db;

    public function __construct()
    {
        $this->db = new PDO('mysql:host=localhost;' . 'dbname=db_movies;charset=utf8', 'root', '');
    }

    public function getMovies($genre = null)
    {
        $sql = 'SELECT * FROM movies';
        if(!empty($genre))
            $sql .= " WHERE genre = ?";
        $query = $this->db->prepare($sql . " ORDER BY audience_score DESC");
        (!empty($genre)) ? $query->execute([$genre]) : $query->execute();
        return $query->fetchAll(PDO::FETCH_CLASS, 'Movie'); 
    }

    public function getMoviesByStudio($studio){
        $query = $this->db->prepare("SELECT * FROM movies WHERE studio = ?");
        $query->execute([$studio]);
        return $query->fetchAll(PDO::FETCH_CLASS, 'Movie');
    }

    public function genreExists($genre) : bool{
        $query = $this->db->prepare("SELECT genre FROM movies WHERE genre = ?");
        $query->execute([$genre]);
        return (count($query->fetchAll()) > 0) ? true : false;
    }
}
