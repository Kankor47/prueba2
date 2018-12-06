<?php
require_once '../model/ProductoModelo.php';
session_start();
$productoModel = new ProductoModelo();
$opcion = $_REQUEST['opcion'];

switch($opcion){
    case "listar":
        //obtenemos la lista de productos:
        $listado = $productoModel->getProductos();
        //y los guardamos en sesion:
        $_SESSION['listado'] = serialize($listado);
        header('Location: ../index.php');
        break;
    case "crear":
        //navegamos a la pagina de creacion:
        header('Location: ../view/crear.php');
        break;
    case "guardar":
        //obtenemos los valores ingresados por el usuario en el formulario:
        $codigo=$_REQUEST['codigo'];
        $descripcion=$_REQUEST['descripcion'];
        $cantidad=$_REQUEST['cantidad'];
        $precio=$_REQUEST['precio'];
        //creamos un nuevo producto:
        $productoModel->crearProducto($codigo, $descripcion, $cantidad, $precio);
        //actualizamos la lista de productos para grabar en sesion:
        $listado = $productoModel->getProductos();
        $_SESSION['listado'] = serialize($listado);
        header('Location: ../index.php');
        break;
    case "eliminar":
        //obtenemos el codigo del producto a eliminar:
        $codigo=$_REQUEST['codigo'];
        //eliminamos el producto:
        $productoModel->eliminarProducto($codigo);
        //actualizamos la lista de productos para grabar en sesion:
        $listado = $productoModel->getProductos();
        $_SESSION['listado'] = serialize($listado);
        header('Location: ../index.php');
        break;
    case "cargar":
        //para permitirle actualizar un producto al usuario primero
        //obtenemos los datos completos de ese producto:
        $codigo=$_REQUEST['codigo'];
        $producto=$productoModel->getProducto($codigo);
        //guardamos en sesion el producto para posteriormente visualizarlo
        //en un formulario para permitirle al usuario editar los valores:
        $_SESSION['producto']=$producto;
        header('Location: ../view/actualizar.php');
        break;
    case "actualizar":
        //obtenemos los datos modificados por el usuario:
        $codigo=$_REQUEST['codigo'];
        $descripcion=$_REQUEST['descripcion'];
        $cantidad=$_REQUEST['cantidad'];
        $precio=$_REQUEST['precio'];
        //actualizamos los datos del producto:
        $productoModel->actualizarProducto($codigo, $descripcion, $cantidad, $precio);
        //actualizamos la lista de productos para grabar en sesion:
        $listado = $productoModel->getProductos();
        $_SESSION['listado'] = serialize($listado);
        header('Location: ../index.php');
        break;
    default:
        //si no existe la opcion recibida por el controlador, siempre
        //redirigimos la navegacion a la pagina index:
        header('Location: ../index.php');
}
