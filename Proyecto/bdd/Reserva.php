<?php 
    /**
     * Reservas
     * Clase Reserva
     * 
     *
     * @package      bdd
     * @author       Jose Luis Quintanilla Blanco
     * @copyright    Jose Luis Quintanilla Blanco - 2020
     */
require_once("CineDB.php");
require_once("Cine.php");
require_once("Proyecciones.php");

    /**
     * Esta clase contiene los métodos que manejan todo lo referente a los datos de cada reserva.
     */
class Reserva{

    /**
     * Dado el id de la proyección, retorna los id de la sala de esa proyección
     * 
     * @param int $idProyeccion id de la proyección
     * 
     * @return array
     */
    public static function getSala($idProyeccion){
        $conexion = CineDB::conectar();
        $sql = "SELECT idSala FROM proyecciones WHERE idProyeccion = $idProyeccion";
        $consulta =  $conexion->query($sql)->fetchAll()[0];
        return $consulta;
    }

    /**
     * Dado el id de la sala, retorna el aforo que pertenece a la sala
     * 
     * @param int $idSala
     * 
     * @return array
     */
    public static function getAforo($idSala){
        $conexion = CineDB::conectar();
        $sql = "SELECT aforo FROM salas WHERE  idSala = $idSala";
        $consulta =  $conexion->query($sql)->fetchAll()[0];
        return $consulta;
    }

    /**
     * Retorna una consulta del total de proyecciones dada una id de esa proyección
     * 
     * @param int $idProyeccion
     * 
     * @return array
     */
    public static function getResto($idProyeccion){
        $conexion = CineDB::conectar();
        $sql= "SELECT count(idProyeccion) FROM reserva WHERE idProyeccion = $idProyeccion";
        $consulta =  $conexion->query($sql)->fetchAll()[0];
        return $consulta;

    }

    /**
     * Inserta una nueva reserva cuando el usuario realiza la compra a partir del id de este, el id de la proyección y la cantidad de tickets adquiridos
     * 
     * @param int $idUsuario
     * @param int $idProyeccion
     * @param int $cantidad
     * 
     * @return void
     */
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

    /**
     * Devuelve las proyecciones reservadas por un usuario sin que estas se repitan
     * 
     * @param int $idUsuario
     * 
     * @return array
     */
    public static function getProyecciones($idUsuario){
        $conexion = CineDB::conectar();
        $sql = "SELECT DISTINCT(idProyeccion) from reserva WHERE idUsuario = $idUsuario";
        $consulta =  $conexion->query($sql)->fetchAll();
        return $consulta;    
    }

    /**
     * Devuelve el id de la pelicula a la que pertenece una proyección
     * 
     * @param array $arrIDProyeccion
     * 
     * @return int
     */
    public static function getIDPelis($arrIDProyeccion){
        $conexion = CineDB::conectar();
        foreach ($$arrIDProyeccion as $k) {
            $sql = "SELECT idPelicula FROM proyecciones WHERE idProyeccion = $k";
            $consulta =  $conexion->query($sql)->fetchAll();
            
        }
        return $consulta;
    }

    /**
     * Dados el id de la proyección y el id del usuario devuelve el número de proyecciones
     * 
     * @param int $idProyeccion
     * @param int $idUsuario
     * 
     * @return array
     */
    public static function getProyeccionesCompradas($idProyeccion, $idUsuario){
        $conexion = CineDB::conectar();
        $sql = "SELECT COUNT(idProyeccion) FROM reserva WHERE idProyeccion = $idProyeccion AND idUsuario = $idUsuario";
        $consulta =  $conexion->query($sql)->fetchAll()[0];
        return $consulta;
    }


}
?>
