<?php
class Producto{

    private $nombre;
    private $marca;
    private $id;


    public function getNombre(){
        return $this->nombre;
    }

    public function getMarca(){
        return $this->marca;
    }

    public function getID(){
        return $this->id;
    }
}