<?php 
require_once("CineDB.php");
class Valoraciones{

    public static function insetaValoracion($idUsuario, $idPelicula, $valoracion){

        $conexion = CineDB::conectar();
        $sql = "INSERT INTO valoracion(idUsuario, idPelicula, valoracion) VALUES(:idUsuario, :idPelicula, :valoracion)";
        $sentencia = $conexion->prepare($sql);
        $sentencia->bindParam(':idUsuario', $idUsuario);
        $sentencia->bindParam(':idPelicula', $idPelicula);
        $sentencia->bindParam(':valoracion', $valoracion);
        $sentencia->execute();
        
    }
}

?>