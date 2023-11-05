<?php

require_once 'Producto.php';

class ProductosModel
{
    private $db;


    private function getConection()
    {
        try {
            return new PDO('mysql:host=localhost;dbname=db_productos_limpieza;charset=utf8', 'root', '');
        } catch (\Throwable $th) {
            throw $th;
        }
    }
    function __construct(){
        $this->db = $this->getConection();
    }
    

    public function getProductos(){
        $query = $this->db->prepare('SELECT * FROM productos');
        $query->execute();
        return $query->fetchAll(PDO::FETCH_CLASS, 'Producto');
    }

    public function getProductoByID($id_producto){
        $query = $this->db->prepare("SELECT * FROM productos WHERE id = ?");
        $query->execute([$id_producto]);
        $query->setFetchMode(PDO::FETCH_CLASS, 'Producto');
        return $query->fetch();
    }
}