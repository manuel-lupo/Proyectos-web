<?php
require_once 'MovieModel.php';
require_once 'MovieView.php';
class MovieController
{

    private $view;

    private $model;

    public function __construct()
    {
        $this->model = new MovieModel();
        $this->view = new MovieView();
    }

    public function showHome()
    {
        $this->view->renderHome();
    }

    public function showMovies($genre = null)
    {
        if (empty($genre)) {
            $movies = $this->model->getMovies();
            $this->view->renderMovieTable($movies);
            return;
        }
        $movies = $this->model->getMovies($genre);
        $this->view->renderMovieTable($movies, $genre);
    }

    public function showMoviesByStudio($studio){
        $movies = $this->model->getMoviesByStudio($studio);
        $this->view->renderMovieTable($movies);
    }

    public function moviesOf($genre) : int{
        if($this->model->genreExists($genre))
            return count($this->model->getMovies());
        return 0;
    }

    public function show404(){
        $this->view->render404();
    }
}