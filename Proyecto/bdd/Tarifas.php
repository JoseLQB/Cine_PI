<?php 

require_once("CineDB.php");

class Tarifas{
    /**
     * Tarifa
     * @author Jose Luis Quintanilla Blanco
     *
     * Description: Esta clase contiene los métodos que manejan todo lo referente a los datos de cada tarifa
     */

    public $id;
    public $nombre;
    public $precio;
    public $descripcion;


    function __construct($id, $nombre, $precio, $descripcion){
        $this->id = $id;
        $this->nombre = $nombre;
        $this->precio = $precio;
        $this->descripcion = $descripcion;

    }
    public function getId() {
        return $this->id;
    }  
    public function getNombre() {
        return $this->nombre;
    }  
    public function getPrecio() {
        return $this->precio;
    }    
    public function getDescripcion() {
        return $this->descripcion;
    }  

    public static function getTarifas(){
        $conexion = CineDB::conectar();
        $query = "SELECT * FROM tarifas";
        $consulta = $conexion->query($query);
        $tarifas=[];
        while($registro = $consulta->fetch(PDO::FETCH_ASSOC)){
            $tarifas[]= new Tarifas($registro["codTarifa"], $registro["nombre"], $registro["precio"], $registro["descripcion"]);
        }
        return $tarifas;
    }

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
    }




}

?>