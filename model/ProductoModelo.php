<?php
include_once 'Produtos.php';
include_once 'Database.php';
class ProductoModelo {
    //put your code here
    
    public function getProductos()
    {
        $pdo= Database::connect();
        $sql="select * from productos";
        $resultado = $pdo->query($sql);
        $listado = array();
        foreach ($reultado as $res){
            $producto = new Productos();
            $producto->setCodigo($res['codigo']);
            $producto->setDescripcion($res['descripcion']);
            $producto->setCantidad($res['cantidad']);
            $producto->setPrecio($res['precio']);
            array_push($listado, $producto);
        }
        Database::disconnect();
        return $listado;
    }
    
    public function getProducto($codigo)
    {
        $pdo = Database::connect();
        //Utilizamos parametros para la consulta:
        $sql = "select * from productos where codigo=?";
        $consulta = $pdo->prepare($sql);
        //Ejecutamos y pasamos los parametros para la consulta:
        $consulta->execute(array($codigo));
        //Extraemos el registro especifico:
        $dato = $consulta->fetch(PDO::FETCH_ASSOC);
        //Transformamos el registro obtenido a objeto:
        $producto=new Productos();
        $producto->setCodigo($dato['codigo']);
        $producto->setDescripcion($dato['descripcion']);
        $producto->setCantidad($dato['cantidad']);
        $producto->setPrecio($dato['precio']);
        Database::disconnect();
        return $producto;

    }
    
    public function crearProducto($codigo,$nombre,$cantidad,$precio){
        //Preparamos la conexion a la bdd:
        $pdo=Database::connect();
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        //Preparamos la sentencia con parametros:
        $sql="insert into productos (codigo,descripcion,cantidad,precio) values(?,?,?,?)";
        $consulta=$pdo->prepare($sql);
        //Ejecutamos y pasamos los parametros:
        $consulta->execute(array($codigo,$nombre,$cantidad,$precio));
        Database::disconnect();
    }

    
    public function actualizarProducto($codigo,$nombre,$cantidad,$precio){
        //Preparamos la conexión a la bdd:
        $pdo=Database::connect();
        $sql="update producto set descripcion=?,cantidad=?,precio=? where codigo=?";
        $consulta=$pdo->prepare($sql);
        //Ejecutamos la sentencia incluyendo a los parametros:
        $consulta->execute(array($nombre,$cantidad,$precio,$codigo));
        Database::disconnect();
    }

    
    public function eliminarProducto($codigo){
        //Preparamos la conexion a la bdd:
        $pdo=Database::connect();
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $sql="delete from productos where codigo=?";
        $consulta=$pdo->prepare($sql);
        //Ejecutamos la sentencia incluyendo a los parametros:
        $consulta->execute(array($codigo));
        Database::disconnect();
    }

}
