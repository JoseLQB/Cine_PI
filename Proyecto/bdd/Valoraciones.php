<?php 
    /**
     * Valoraciones
     * Clase Valoraciones
     * 
     *
     * @package      bdd
     * @author       Jose Luis Quintanilla Blanco
     * @copyright    Jose Luis Quintanilla Blanco - 2020
     */
require_once("CineDB.php");
    /**
     * Esta clase contiene los métodos necesarios para calvular las valoraciones
     */
class Valoraciones{

    /**
     * Devuelve un la nota puesta por un usuario a una película
     * 
     * @param int $idUsuario id del usuario
     * @param int $idPelicula id de la película
     * @return array
     */
    public static function getVal($idUsuario, $idPelicula){
        $conexion = CineDB::conectar();
        $sql = "SELECT valoracion FROM valoracion WHERE idUsuario = $idUsuario AND idPelicula = $idPelicula";
        $consulta= $conexion->query($sql)->fetch();
        return $consulta;
        $conexion = null;
    }

    /**
     * Devuelve 1 o 0 dependiendo de si existe un usuario en la tabla valoraciones para que no se repitan y tanto la media como a la hora de aparecer en la vista no haya conflicto
     * 
     * @param int $idUsuario id del usuario
     * @param int $idPelicula id de la película
     * @return int
     */
    public static function getConfirm($idUsuario, $idPelicula){
        $conexion = CineDB::conectar();
        $sql = "SELECT * FROM valoracion WHERE idPelicula = $idPelicula AND $idUsuario = $idUsuario";
        $consulta= $conexion->query($sql)->fetch();
        $confirm = 0;
        if(sizeof($consulta)>0){
            foreach ($consulta as $k) {
                if($idUsuario == $k){
                    $confirm = 1;
                }
            }
        }
        return $confirm;
        $conexion = null;
    }
    
    /**
     * Actualiza las valoraciones. Para ello recibe el id del usuario, el id de la película y la valoración
     * 
     * @param int $idUsuario id del usuario
     * @param int $idPelicula id de la película
     * @param int $valoracion Valoración numérica de la película
     * @return void
     */
    public static function update($idUsuario, $idPelicula, $valoracion){
        $conexion = CineDB::conectar();
        $sql = "UPDATE valoracion SET 
                idUsuario = :idUsuario,
                idPelicula = :idPelicula,
                valoracion = :valoracion WHERE idPelicula = $idPelicula AND idUsuario = $idUsuario";
        $sentencia = $conexion->prepare($sql);
        $sentencia->bindParam(':idUsuario', $idUsuario);
        $sentencia->bindParam(':idPelicula', $idPelicula);
        $sentencia->bindParam(':valoracion', $valoracion);
        $sentencia->execute();
        $conexion = null;
        
    }

    /**
     * Inserta una nueva valoración. Para ello recibe el id del usuario, el id de la película y la valoración
     * 
     * @param int $idUsuario id del usuario
     * @param int $idPelicula id de la película
     * @param int $valoracion Valoración numérica de la película
     * @return void
     */
    public static function insertaValoracion($idUsuario, $idPelicula, $valoracion){

        $conexion = CineDB::conectar();
        $sql = "INSERT INTO valoracion(idUsuario, idPelicula, valoracion) VALUES(:idUsuario, :idPelicula, :valoracion)";
        $sentencia = $conexion->prepare($sql);
        $sentencia->bindParam(':idUsuario', $idUsuario);
        $sentencia->bindParam(':idPelicula', $idPelicula);
        $sentencia->bindParam(':valoracion', $valoracion);
        $sentencia->execute();
        $conexion = null;
    }
}
?>