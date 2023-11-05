<?php
class Movie{
    private $id;
    private $title;
    private $genre;
    private $studio;
    private $audience_score;
    private $profitability;
    private $year;
    
    

	/**
	 * @return mixed
	 */
	public function getId() {
		return $this->id;
	}
	
	/**
	 * @param mixed $id 
	 * @return self
	 */
	public function setId($id): self {
		$this->id = $id;
		return $this;
	}
	
	/**
	 * @return mixed
	 */
	public function getTitle() {
		return $this->title;
	}
	
	/**
	 * @param mixed $title 
	 * @return self
	 */
	public function setTitle($title): self {
		$this->title = $title;
		return $this;
	}
	
	/**
	 * @return mixed
	 */
	public function getGenre() {
		return $this->genre;
	}
	
	/**
	 * @param mixed $genre 
	 * @return self
	 */
	public function setGenre($genre): self {
		$this->genre = $genre;
		return $this;
	}
	
	/**
	 * @return mixed
	 */
	public function getStudio() {
		return $this->studio;
	}
	
	/**
	 * @param mixed $studio 
	 * @return self
	 */
	public function setStudio($studio): self {
		$this->studio = $studio;
		return $this;
	}
	
	/**
	 * @return mixed
	 */
	public function getAudience_score() {
		return $this->audience_score;
	}
	
	/**
	 * @param mixed $audience_score 
	 * @return self
	 */
	public function setAudience_score($audience_score): self {
		$this->audience_score = $audience_score;
		return $this;
	}
	
	/**
	 * @return mixed
	 */
	public function getProfitability() {
		return $this->profitability;
	}
	
	/**
	 * @param mixed $profitability 
	 * @return self
	 */
	public function setProfitability($profitability): self {
		$this->profitability = $profitability;
		return $this;
	}
	
	/**
	 * @return mixed
	 */
	public function getYear() {
		return $this->year;
	}
	
	/**
	 * @param mixed $year 
	 * @return self
	 */
	public function setYear($year): self {
		$this->year = $year;
		return $this;
	}
}