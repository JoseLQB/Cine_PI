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

    //Función que agrega una compra, se activa cada vez que el usuario realiza una compra

    
    public static function nuevaProyeccion($idUsuario, $idProyeccion,$cantidad){
        $cantidad = (int)$cantidad;
        $conexion = CineDB::conectar();
        for ($i=0; $i < $cantidad; $i++) { 
            $sql = "INSERT INTO reserva(idUsuario, idProyeccion) VALUES(:idUsuario, :idProyeccion)";
            $sentencia = $conexion->prepare($sql);
            $sentencia->bindParam(':idUsuario', $idUsuario);
            $sentencia->bindParam(':idProyeccion', $idProyeccion);
            $sentencia->execute();
        }
    }



    //Devuelve un array con las sesiones disponibles que ha comprado un usuario

    public static function getProyecciones($idUsuario){
        $conexion = CineDB::conectar();
        $sql = "SELECT DISTINCT(idProyeccion) from reserva WHERE idUsuario = $idUsuario";
        $consulta =  $conexion->query($sql)->fetchAll();
        return $consulta;    
    }

    ////Devuelve el id de la pelicula a la que pertenece una proyección
    public static function getIDPelis($arrIDProyeccion){
        $conexion = CineDB::conectar();
        foreach ($$arrIDProyeccion as $k) {
            $sql = "SELECT idPelicula FROM proyecciones WHERE idProyeccion = $k";
            $consulta =  $conexion->query($sql)->fetchAll();
            
        }
        return $consulta;
    }

    public static function getProyeccionesCompradas($idProyeccion, $idUsuario){
        $conexion = CineDB::conectar();
        $sql = "SELECT COUNT(idProyeccion) FROM reserva WHERE idProyeccion = $idProyeccion AND idUsuario = $idUsuario";
        $consulta =  $conexion->query($sql)->fetchAll()[0];
        return $consulta;
    }

    //Función que permite al usuario valorar una película

}
/*
echo "-dasdasdada-";
var_dump( Reserva::getProyecciones(24));
var_dump(Reserva::getIDPelis(44));*/
?>
