<?php 
require_once("CineDB.php");
require_once("Cine.php");
require_once("Proyecciones.php");

class Reserva{


    
    //Funciones para calcular el aforo disponible en una sala

    public static function getSala($idProyeccion){
        $conexion = CineDB::conectar();
        $sql = "SELECT idSala FROM proyecciones WHERE idProyeccion = $idProyeccion";
        $consulta =  $conexion->query($sql)->fetchAll()[0];
        return $consulta;
    }

    public static function getAforo($idSala){
        $conexion = CineDB::conectar();
        $sql = "SELECT aforo FROM salas WHERE  idSala = $idSala";
        $consulta =  $conexion->query($sql)->fetchAll()[0];
        return $consulta;
    }

    public static function getResto($idProyeccion){
        $conexion = CineDB::conectar();
        $sql= "SELECT count(idProyeccion) FROM reserva WHERE idProyeccion = $idProyeccion";
        $consulta =  $conexion->query($sql)->fetchAll()[0];
        return $consulta;

    }

}


?>