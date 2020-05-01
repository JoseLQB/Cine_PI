<?php 

require_once("CineDB.php");

class Tarifas{

    private $id;
    private $nombre;
    private $precio;


    function __construct($id, $nombre, $precio){
        $this->id = $id;
        $this->nombre = $nombre;
        $this->precio = $precio;

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

    public static function getTarifas(){
        $conexion = CineDB::conectar();
        $query = "SELECT * FROM tarifas";
        $consulta = $conexion->query($query);
        $tarifas=[];
        while($registro = $consulta->fetchObject()){
            $tarifas[]= new Tarifas($registro->codTarifa, $registro->nombre, $registro->precio);
        }
        return $tarifas;

    }
  



}

?>