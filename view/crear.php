<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Crear producto</title>
    </head>
    <body>
        <form action="../controller/controller.php">
            <input type="hidden" value="guardar" name="opcion">
            Codigo:<input type="text" name="codigo"><br>
            Descripcion:<input type="text" name="descripcion"><br>
            Cantidad:<input type="text" name="cantidad"><br>
            Precio:<input type="text" name="precio"><br>
            <input type="submit" value="Crear">
        </form>
    </body>
</html>

