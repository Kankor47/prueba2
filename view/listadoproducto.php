<!DOCTYPE html>
<?php
require_once '../model/Produtos.php';
session_start();
?>
<html>
    <head>
        <meta charset="UTF-8">
        <title>PRODUCTOS</title>
        <script src="js/jquery-2.1.4.js"></script>
        <script src="js/bootstrap.js"></script>
        <script src="js/bootstrap-table.js"></script>
        <link href="css/bootstrap.css" rel="stylesheet">
        <link href="css/bootstrap-table.css" rel="stylesheet">
    </head>
    <body>
        <div class="container">
            <img src="images/banner_contacto.jpg">
            <div class="row">
                <h3>PRODUCTOS</h3>

            </div>
            <div class="row">
                <a class="btn btn-primary" href="../view/index.php">Inicio</a>
            </div>
            <p>
            <form action="../controller/controller.php">
                <input type="hidden" name="opcion" value="crear_producto">
                <div class="panel panel-primary">
                    <div    class=" panel-heading"><b>INGRESO DATOS DE PRODUCTOS</b></div>
                    <div class=" panel-body">
                        <table>
                            <tr><td>Código:</td><td><input type="text" name="codigo" required="true" autocomplete="off" required="" value=""></td></tr>
                            <tr><td>Descripción:</td><td><input type="text" name="descripcion" required="true" autocomplete="off" required="" value=""></td></tr>
                            <tr><td>Cantidad:</td><td><input type="text" name="cantidad" required="true" autocomplete="off" required="" value=""></td></tr>
                            <tr><td>Precio:</td><td><input type="text" name="precio" required="true" autocomplete="off" required="" value=""></td></tr>
                        </table>

                        <input type="submit" value="Crear">
                    </div>
                </div>
            </form>
        </p>
        <div class="panel panel-primary">
            <div    class=" panel-heading"><b>INGRESO DATOS DE PRODUCTOS</b></div>
            <div class=" panel-body">
                <table data-toggle="table">

                    <thead>
                        <tr>
                            <th>CODIGO</th>
                            <th>DESCRIPCION</th>
                            <th>CANTIDAD</th>
                            <th>PRECIO</th>
                            <th>OPCIONES</th>

                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        //verificamos si existe en sesion el listado de clientes:
                        if (isset($_SESSION['listado_pro'])) {
                            $listado_pro = unserialize($_SESSION['listado_pro']);
                            foreach ($listado_pro as $prod) {
                                echo "<tr>";
                                echo "<td>" . $prod->getCodigo() . "</td>";
                                echo "<td>" . $prod->getDescripcion() . "</td>";
                                echo "<td>" . $prod->getCantidad() . "</td>";
                                echo "<td>" . $prod->getPrecio() . "</td>";
                                echo "<td><a href='../controller/controller.php?opcion=eliminar_producto&codigo=" . $prod->getCodigo() . "'>ELIMINAR</a></td>";
                                echo "</tr>";
                            }
                        } else {
                            echo "No se han cargado datos.";
                        }
                        ?>
                    </tbody>
                </table>
            </div></div>
    </div>
</body>

</html>
