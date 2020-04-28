<?php 

require_once("CineDB.php");

class Cartelera{

    public function consulta(){
    
        $conexion = CineDB::conectar();
        $select = "SELECT * FROM pelicula";
        $consulta= $conexion->query($select);

        return $consulta;

    }


}




?>