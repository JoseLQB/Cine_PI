<?php 
require_once("CineDB.php");
class Valoraciones{

    //Devuelve un la nota puesta por un usuario a una película
    public static function getVal($idUsuario, $idPelicula){
        $conexion = CineDB::conectar();
        $sql = "SELECT valoracion FROM valoracion WHERE idUsuario = $idUsuario AND idPelicula = $idPelicula";
        $consulta= $conexion->query($sql)->fetch();
        return $consulta;
    }


    //Devuelve 1 o 0 dependiendo de si existe un usuario en la tabla valoraciones
    public static function getConfirm($idUsuario, $idPelicula){
        $conexion = CineDB::conectar();
        $sql = "SELECT * FROM valoracion WHERE idPelicula = $idPelicula";
        $consulta= $conexion->query($sql)->fetch();
        $confirm = 0;
        if($consulta>0){
            foreach ($consulta as $k) {
                if($idUsuario == $k){
                    $confirm = 1;
                }
            }
        }
        return $confirm;
    }


    
    public static function update($idUsuario, $idPelicula, $valoracion){
        $conexion = CineDB::conectar();
        $sql = "UPDATE valoracion SET 
                idUsuario = :idUsuario,
                idPelicula = :idPelicula,
                valoracion = :valoracion WHERE idPelicula = $idPelicula";
        $sentencia = $conexion->prepare($sql);
        $sentencia->bindParam(':idPelicula', $idPelicula);
        $sentencia->bindParam(':idUsuario', $idUsuario);
        $sentencia->bindParam(':valoracion', $valoracion);
        $sentencia->execute();
        
    }

    public static function insertaValoracion($idUsuario, $idPelicula, $valoracion){

        $conexion = CineDB::conectar();
        $sql = "INSERT INTO valoracion(idUsuario, idPelicula, valoracion) VALUES(:idUsuario, :idPelicula, :valoracion)";
        $sentencia = $conexion->prepare($sql);
        $sentencia->bindParam(':idUsuario', $idUsuario);
        $sentencia->bindParam(':idPelicula', $idPelicula);
        $sentencia->bindParam(':valoracion', $valoracion);
        $sentencia->execute();
    }
}
echo Valoraciones::getConfirm(24,32);
echo Valoraciones::getVal(24,32)[0];
?>