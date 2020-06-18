<?php 

    /**
     * Tarifas
     * Clase Tarifas
     * 
     * @package      bdd
     * @author       Jose Luis Quintanilla Blanco
     * @copyright    Jose Luis Quintanilla Blanco - 2020
     */
require_once("CineDB.php");

    /**
     * Esta clase contiene los métodos que manejan todo lo referente a los datos de cada tarifa.
    */
class Tarifas{
    
    /** @var $id id de la tarifa */
    public $id;
    /** @var $nombre id de la tarifa */
    public $nombre;
    /** @var $precio precio que se aplica con la tarifa */
    public $precio;
    /** @var $descripcion descripcion de la tarifa */
    public $descripcion;

    /**
     * Constructor de calse. Recibe los parámetros necesarios para construir el objeto Tarifas
     * 
     * @param int $id id de la tarifa
     * @param string $nombre nombre de la tarifa
     * @param string $precio de la tarifa
     * @param string $descripcion descripción de la tarifa
     */
    function __construct($id, $nombre, $precio, $descripcion){
        $this->id = $id;
        $this->nombre = $nombre;
        $this->precio = $precio;
        $this->descripcion = $descripcion;

    }

    /**
     * Devuelve el objeto tarifas, este contiene todos los datos de las tarifas
     * 
     * @return object
     */
    public static function getTarifas(){
        $conexion = CineDB::conectar();
        $query = "SELECT * FROM tarifas";
        $consulta = $conexion->query($query);
        $tarifas=[];
        while($registro = $consulta->fetch(PDO::FETCH_ASSOC)){
            $tarifas[]= new Tarifas($registro["codTarifa"], $registro["nombre"], $registro["precio"], $registro["descripcion"]);
        }
        return $tarifas;
        $conexion = null;
    }

    /**
     * Devuelve el objeto tarifas, este contiene todos los datos de una las tarifa a partir de su código
     * @param string $cod Codigo de la tarifa
     * @return object
     */
    public static function getTarifasByCod($cod){
        $conexion = CineDB::conectar();
        $query = "SELECT * FROM tarifas";
        $consulta = $conexion->query($query);
        $tarifas=[];
        while($registro = $consulta->fetch(PDO::FETCH_ASSOC)){
            if($cod == $registro["codTarifa"]){
                $tarifas[]= new Tarifas($registro["codTarifa"], $registro["nombre"], $registro["precio"], $registro["descripcion"]);
            }
        }
        return $tarifas;
        $conexion = null;
    }


    public static function update($codTarifa, $precio){
        $conexion = CineDB::conectar();
        $sql = "UPDATE tarifas SET 
                precio = :precio
                WHERE codTarifa = :codTarifa";
        $sentencia = $conexion->prepare($sql);
        $sentencia->bindParam(':precio', $precio);
        $sentencia->bindParam(':codTarifa', $codTarifa);
        $sentencia->execute();  
        $conexion = null;  
    }

}

?>