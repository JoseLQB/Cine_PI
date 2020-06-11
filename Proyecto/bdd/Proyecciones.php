<?php 
    /**
     * Proyecciones
     * Clase Proyecciones
     * 
     *
     * @package      bdd
     * @author       Jose Luis Quintanilla Blanco
     * @copyright    Jose Luis Quintanilla Blanco - 2020
     */
require_once("CineDB.php");
    /**
     * Esta clase contiene los métodos que manejan todo lo referente a los datos de cada proyección.
    */
class Proyecciones{

    /** @var $idProyeccion id de la proyección */
    public $idProyeccion;

    /** @var $idSala id de la sala */
    public $idSala;

    /** @var $idPelicula id de la película */
    public $idPelicula;
    
    /** @var $fechaProyeccion fecha de la proyección */
    public $fechaProyeccion;
    
    /** @var $horaProyeccion hora de la proyección */
    public $horaProyeccion;
    
    /** @var $codTarifa código de la tarifa */
    public $codTarifa;

    /**
     * Constructor de calse. Recibe los parámetros necesarios para construir el objeto Proyecciones
     * 
     * @param int $idProyeccion id de la de la proyección
     * @param int $idSala id de la sala
     * @param int $idPelicula id de la película
     * @param mixed $fechaProyeccion fecha en la que se emite la proyección
     * @param mixed $horaProyeccion hora a la que se emite la proyeccion
     * @param string $codTarifa codigo de la tarifa
     */
    function __construct($idProyeccion, $idSala, $idPelicula, $fechaProyeccion, $horaProyeccion, $codTarifa){
        $this->idProyeccion = $idProyeccion;
        $this->idSala = $idSala;
        $this->idPelicula = $idPelicula;
        $this->fechaProyeccion = $fechaProyeccion;
        $this->horaProyeccion = $horaProyeccion;
        $this->codTarifa = $codTarifa;
    }

    /**
     * Devuelve un objeto proyecciones con los datos necesarios de cada proyeccion
     *
     * @return object
     */
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
    
    /**
     * Devuelve el objeto proyecciones a partir de su id, este contiene todos los datos de una las tarifa 
     * @param string $idProyeccion Codigo de la proyeccion
     * @return object
     */
    public static function getProyeccionesById($idProyeccion){
        $conexion = CineDB::conectar();
        $query = "SELECT * FROM proyecciones";
        $consulta = $conexion->query($query);
        $tarifas=[];
        while($registro = $consulta->fetch(PDO::FETCH_ASSOC)){
            if($idProyeccion == $registro["idProyeccion"]){
                $tarifas[]= new Proyecciones($registro["idProyeccion"], $registro["idSala"], $registro["idPelicula"], $registro["fechaProyeccion"], $registro["horaProyeccion"], $registro["codtarifa"]);
            }  
        }
        return $tarifas;
    }

    /**
     * Devuelve una consulta genérica de todos los campos de la tabla proyecciones
     *
     * @return object
     */
    public static function consulta(){
        $conexion = CineDB::conectar();
        $select = "SELECT * FROM proyecciones";
        $consulta= $conexion->query($select);

        return $consulta;

    }

    /**
     * Dado el id de la proyección, devuelve 1 o 0 dependiendo de si esta está repetisa o no
     *
     * @param int $id id de la proyeccion
     * @return int
     */ 
    public static function consultaIdProy($id){ 
        $consulta = Proyecciones::consulta();
        $repeat = 0;
        while($reg = $consulta->fetch(PDO::FETCH_ASSOC)){
            if($reg["idProyeccion"]==$id){
                $repeat= 1;
            }
        }
        return $repeat;
    }

    /**
     * Dado el id de la proyección, devuelve el título de la película proyectada
     *
     * @param int $id id de la proyección
     * @return array
     */  
    public static function getTitulo($id){  
        $consulta = Proyecciones::consulta();
        while($reg = $consulta->fetch(PDO::FETCH_ASSOC)){
            if($reg["idPelicula"]==$id){
                $titulo= $reg["idProyeccion"];

            }
        }
        return $titulo;
    }

    /**
     * Dado el id de la proyección, devuelve la fecha de la proyección
     *
     * @param int $id id de la proyección
     * @return array
     */ 
    public static function getFechaProyeccion($id){  
        $consulta = Proyecciones::consulta();
        while($reg = $consulta->fetch(PDO::FETCH_ASSOC)){
            if($reg["idPelicula"]==$id){
                $fecha= $reg["fechaProyeccion"];

            }
        }
        return $fecha;
    }

    /**
     * Dado el id de la pelicula proyectada, devuelve la fecha de la proyección
     *
     * @param int $id id de la película
     * @return array
     */ 
    public static function getFechaProyeccionByPro($id){  
        $consulta = Proyecciones::consulta();
        while($reg = $consulta->fetch(PDO::FETCH_ASSOC)){
            if($reg["idProyeccion"]==$id){
                $fecha= $reg["fechaProyeccion"];

            }
        }
        return $fecha;
    }
    
    /**
     * Dado el id de la proyección, devuelve la hora de la proyección
     *
     * @param int $id id de la proyección
     * @return array
     */
    public static function getHoraProyeccionByPro($id){  
        $consulta = Proyecciones::consulta();
        while($reg = $consulta->fetch(PDO::FETCH_ASSOC)){
            if($reg["idProyeccion"]==$id){
                $fecha= $reg["horaProyeccion"];

            }
        }
        return $fecha;
    }
    
    /**
     * Dado el id de la proyección, devuelve el id de la película proyectada
     *
     * @param int $id id de la proyección
     * @return array
     */
    public static function getIDPeliByPro($id){  
        $consulta = Proyecciones::consulta();
        while($reg = $consulta->fetch(PDO::FETCH_ASSOC)){
            if($reg["idProyeccion"]==$id){
                $fecha= $reg["idPelicula"];

            }
        }
        return $fecha;
    }

    /**
     * Método que inserta una nueva proyección en la base de datos
     * 
     * @param int $idProyeccion id de la de la proyección
     * @param int $idSala id de la sala
     * @param int $idPelicula id de la película
     * @param mixed $fechaProyeccion fecha en la que se emite la proyección
     * @param mixed $horaProyeccion hora a la que se emite la proyeccion
     * @param string $codTarifa codigo de la tarifa
     * 
     * @return void
     */
    public static function nuevaProyeccion($idProyeccion, $idSala,  $idPelicula, $fechaProyeccion, $horaProyeccion, $codTarifa){
        $conexion = CineDB::conectar();
        $sql = "INSERT INTO proyecciones(idProyeccion, idSala, idPelicula, fechaProyeccion, horaProyeccion, codTarifa) VALUES(:idProyeccion, :idSala, :idPelicula, :fechaProyeccion, :horaProyeccion, :codTarifa)";
        $sentencia = $conexion->prepare($sql);
        $sentencia->bindParam(':idProyeccion', $idProyeccion);
        $sentencia->bindParam(':idSala', $idSala);
        $sentencia->bindParam(':idPelicula', $idPelicula);
        $sentencia->bindParam(':fechaProyeccion', $fechaProyeccion);
        $sentencia->bindParam(':horaProyeccion', $horaProyeccion);
        $sentencia->bindParam(':codTarifa', $codTarifa);
        $sentencia->execute();
    }

    /**
     * Método que elimina una proyección de la base de datos
     * 
     * @param int $idPelicula id de la película
     * 
     * @return void
     */
    public static function delete($idPelicula){
        $conexion = CineDB::conectar();
        $sql1 = "DELETE FROM reserva WHERE idProyeccion IN (SELECT `idProyeccion` FROM `proyecciones` WHERE  idPelicula =  :idPelicula)";
        $sql2 = "DELETE FROM valoracion WHERE idPelicula =  :idPelicula";
        $sql = "DELETE FROM proyecciones WHERE idPelicula =  :idPelicula";
        $sentencia1 = $conexion->prepare($sql1);
        $sentencia2 = $conexion->prepare($sql2);
        $sentencia = $conexion->prepare($sql);
        $sentencia1->bindParam(':idPelicula', $idPelicula);
        $sentencia2->bindParam(':idPelicula', $idPelicula);
        $sentencia->bindParam(':idPelicula', $idPelicula);
        $sentencia1->execute();
        $sentencia2->execute();
        $sentencia->execute();
    }

    /**
     * Método que, dado el id de la película y el id de la proyección, elimina una proyección
     * 
     * @param int $idPelicula id de la película
     * @param int $idProyeccion id de la de la proyección
     * 
     * @return void
     */
    public static function deletebyProy($idPelicula, $idProyeccion){
        $conexion = CineDB::conectar();
        $sql1 = "DELETE FROM reserva WHERE idProyeccion IN (SELECT `idProyeccion` FROM `proyecciones` WHERE  idPelicula =  :idPelicula)";
        $sql2 = "DELETE FROM valoracion WHERE idPelicula =  :idPelicula";
        $sql = "DELETE FROM proyecciones WHERE idProyeccion =  :idProyeccion";
        $sentencia1 = $conexion->prepare($sql1);
        $sentencia2 = $conexion->prepare($sql2);
        $sentencia = $conexion->prepare($sql);
        $sentencia1->bindParam(':idPelicula', $idPelicula);
        $sentencia2->bindParam(':idPelicula', $idPelicula);
        $sentencia->bindParam(':idProyeccion', $idProyeccion);
        $sentencia1->execute();
        $sentencia2->execute();
        $sentencia->execute();
    }

    /**
     * Método que actualiza una proyección en la base de datos con los datos nuevos
     * 
     * @param int $idProyeccion id de la de la proyección
     * @param int $idSala id de la sala
     * @param int $idPelicula id de la película
     * @param mixed $fechaProyeccion fecha en la que se emite la proyección
     * @param mixed $horaProyeccion hora a la que se emite la proyeccion
     * @param string $codTarifa codigo de la tarifa
     * 
     * @return void
     */

    public static function update($idProyeccion, $idSala,  $idPelicula, $fechaProyeccion, $horaProyeccion, $codTarifa){
        $conexion = CineDB::conectar();
        $sql = "UPDATE proyecciones SET 
                idProyeccion = :idProyeccion,
                idSala = :idSala,
                idPelicula = :idPelicula,
                fechaProyeccion = :fechaProyeccion,
                horaProyeccion = :horaProyeccion,
                codTarifa = :codTarifa 
                WHERE idProyeccion = $idProyeccion";
        $sentencia = $conexion->prepare($sql);
        $sentencia->bindParam(':idProyeccion', $idProyeccion);
        $sentencia->bindParam(':idSala', $idSala);
        $sentencia->bindParam(':idPelicula', $idPelicula);
        $sentencia->bindParam(':fechaProyeccion', $fechaProyeccion);
        $sentencia->bindParam(':horaProyeccion', $horaProyeccion);
        $sentencia->bindParam(':codTarifa', $codTarifa);
        $sentencia->execute();    
    }
}
?>