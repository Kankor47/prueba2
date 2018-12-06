<?php
/**
 * Clase utilitaria que maneja la conexion/desconexion a la base de datos
 * mediante las funciones PDO (PHP Data Objects).
 * Utiliza el patron de diseno singleton para el manejo de la conexion.
* @author Mateo Salcedo
 */
class Database {

    //Propiedades estaticas con la informacion de la conexion (DSN):
    private static $dbName = 'd7gvq9ga1jkp6t';
    private static $port = '5432';
    private static $dbHost = 'ec2-184-72-239-186.compute-1.amazonaws.com';
    private static $dbUsername = 'hfvhqhqrlounbc';
    private static $dbUserPassword = '4ef841e16541be8f75f3f75be6d20d7097dcbb4faa1c440e47f3b6c5c9811dba';
    //Propiedad para control de la conexion:
    private static $conexion = null;

    /**
     * No se permite instanciar esta clase, se utilizan sus elementos
     * de tipo estatico.
     */
    public function __construct() {
        exit('No se permite instanciar esta clase.');
    }

    /**
     * Metodo estatico que crea una conexion a la base de datos.
     * @return type
     */
    public static function connect() {
        // Una sola conexion para toda la aplicacion (singleton):
        if (null == self::$conexion) {
            try {
                self::$conexion = new PDO("pgsql:host=" . self::$dbHost . ";"."port=".self::$port .";". "dbname=" . self::$dbName, self::$dbUsername, self::$dbUserPassword);
            } catch (PDOException $e) {
                die($e->getMessage());
            }
        }
        return self::$conexion;
    }
    /**
     * Metodo estatico para desconexion de la bdd.
     */
    public static function disconnect() {
        self::$conexion = null;
    }
}
?>
