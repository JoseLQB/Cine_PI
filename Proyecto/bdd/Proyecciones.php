<?php 
require_once("CineDB.php");
class Proyecciones{

    public $idProyeccion;
    public $idSala;
    public $idPelicula;
    public $fechaProyeccion;
    public $horaProyeccion;
    public $codTarifa;

    function __construct($idProyeccion, $idSala, $idPelicula, $fechaProyeccion, $horaProyeccion, $codTarifa){
        $this->idProyeccion = $idProyeccion;
        $this->idSala = $idSala;
        $this->idPelicula = $idPelicula;
        $this->fechaProyeccion = $fechaProyeccion;
        $this->horaProyeccion = $horaProyeccion;
        $this->codTarifa = $codTarifa;
    }
    public static function getProyecciones(){
        $conexion = CineDB::conectar();
        $query = "SELECT * FROM proyecciones";
        $consulta = $conexion->query($query);
        $tarifas=[];
        while($registro = $consulta->fetch(PDO::FETCH_ASSOC)){

            $tarifas[]= new Proyecciones($registro["idProyeccion"], $registro["idSala"], $registro["idPelicula"], $registro["fechaProyeccion"], $registro["horaProyeccion"], $registro["codtarifa"]);

            
        }
        return $tarifas;
    }



}


?>