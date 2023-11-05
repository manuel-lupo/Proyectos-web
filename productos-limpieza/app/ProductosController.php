<?php
require_once './app/ProductosModel.php';
require_once './app/ProductosView.php';

class ProductosController{

    private $view;
    private $model;

    public function __construct(){
        $this->view = new ProductosView();
        $this->model = new ProductosModel();
    }

    public function showListaProductos(){
        $productos = $this->model->getProductos();
        $this->view->renderListaProductos($productos);
    }

    public function show404(){
        $this->view->render404();
    }

    public function showProducto($id_producto){
        $producto = $this->model->getProductoByID($id_producto);
        if($producto)
            $this->view->renderProducto($producto);
        else
            $this->view->render404();
    }
}