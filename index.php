<!DOCTYPE html>
<?php
include_once './model/Produtos.php';
session_start();
?>
<html>
    <head>
        <meta charset="UTF-8">
        <title>CRUD Productos</title>
    </head>
    <body>
        <table>
            <tr><td>
                    <form action="controller/controller.php">
                        <input type="hidden" value="listar" name="opcion">
                        <input type="submit" value="Consultar listado">
                    </form>
                </td><td>
                    <form action="controller/controller.php">
                        <input type="hidden" value="crear" name="opcion">
                        <input type="submit" value="Crear producto">
                    </form>
                </td></tr>
        </table>
        <table border="1">
            <tr>
                <th>CODIGO</th>
                <th>DESCRIPCION</th>
                <th>CANTIDAD</th>
                <th>PRECIO</th>
                <th>ELIMINAR</th>
                <th>ACTUALIZAR</th>
            </tr>
            <?php
            
            //verificamos si existe en sesion el listado de productos:
            if (isset($_SESSION['listado'])) {
                $listado = unserialize($_SESSION['listado']);
                foreach ($listado as $prod) {
                    echo "<tr>";
                    echo "<td>" . $prod->getCodigo() . "</td>";
                    echo "<td>" . $prod->getDescripcion() . "</td>";
                    echo "<td>" . $prod->getCantidad() . "</td>";
                    echo "<td>" . $prod->getPrecio() . "</td>";
                    //opciones para invocar al controlador indicando la opcion eliminar o cargar
                    //y la fila que selecciono el usuario (con el codigo del producto):
                    echo "<td><a href='controller/controller.php?opcion=eliminar&codigo=" . $prod->getCodigo() . "'>eliminar</a></td>";
                    echo "<td><a href='controller/controller.php?opcion=cargar&codigo=" . $prod->getCodigo() . "'>actualizar</a></td>";
                    echo "</tr>";
                }
            } else{
                echo "No se han cargado datos.";
            }
            ?>
        </table>
</body>
</html>

