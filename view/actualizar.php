<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Actualizar producto</title>
    </head>
    <body>
        <?php
        include_once '../model/Productos.php';
        //obtenemos los datos de sesion:
        session_start();
        $producto = $_SESSION['producto'];
        ?>
        <form action="../controller/controller.php">
            <input type="hidden" value="actualizar" name="opcion">
            <!-- Utilizamos pequeños scripts PHP para obtener los valores del producto: -->
            <input type="hidden" value="<?php echo $producto->getCodigo(); ?>" name="codigo">
            Codigo:<b><?php echo $producto->getCodigo(); ?></b><br>
            Descripcion:<input type="text" name="descripcion" value="<?php echo $producto->getDescripcion(); ?>"><br>
            Cantidad:<input type="text" name="cantidad" value="<?php echo $producto->getCantidad(); ?>"><br>
            Precio:<input type="text" name="precio" value="<?php echo $producto->getPrecio(); ?>"><br>
            <input type="submit" value="Actualizar">
        </form>
    </body>
</html>

