<?php
require_once 'Producto.php';
class ProductosView{

    public function renderListaProductos ($productos){
        require_once './templates/tables/table-productos/thead.php';
        foreach ($productos as $producto) {
        ?>
        <tr href='producto/<?php echo $producto->getID()?>'>
            <td><?php echo $producto->getNombre()?></td>
            <td><?php echo $producto->getMarca()?></td>
        </tr>
        <?php }
        require_once './templates/tables/table-productos/tfoot.php';
    }

    public function renderProducto(Producto $producto){
        ?> 
        <ul>
            <li>ID: <?php echo $producto->getID()?></li>
            <li>Nombre: <?php echo $producto->getNombre()?></li>
            <li>Marca: <?php echo $producto->getMarca()?></li>
        </ul>
    <?php }

    public function render404(){
        echo "<h1>PAGINA NO ENCONTRADA</h1>";
    }

}