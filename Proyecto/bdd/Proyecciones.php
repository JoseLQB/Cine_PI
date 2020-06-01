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

    
    public static function consulta(){
        $conexion = CineDB::conectar();
        $select = "SELECT * FROM proyecciones";
        $consulta= $conexion->query($select);

        return $consulta;

    }
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


    public static function getTitulo($id){  
        $consulta = Proyecciones::consulta();
        while($reg = $consulta->fetch(PDO::FETCH_ASSOC)){
            if($reg["idPelicula"]==$id){
                $titulo= $reg["idProyeccion"];

            }
        }
        return $titulo;
    }


    public static function getFechaProyeccion($id){  
        $consulta = Proyecciones::consulta();
        while($reg = $consulta->fetch(PDO::FETCH_ASSOC)){
            if($reg["idPelicula"]==$id){
                $fecha= $reg["fechaProyeccion"];

            }
        }
        return $fecha;
    }
    public static function getFechaProyeccionByPro($id){  
        $consulta = Proyecciones::consulta();
        while($reg = $consulta->fetch(PDO::FETCH_ASSOC)){
            if($reg["idProyeccion"]==$id){
                $fecha= $reg["fechaProyeccion"];

            }
        }
        return $fecha;
    }
    public static function getHoraProyeccionByPro($id){  
        $consulta = Proyecciones::consulta();
        while($reg = $consulta->fetch(PDO::FETCH_ASSOC)){
            if($reg["idProyeccion"]==$id){
                $fecha= $reg["horaProyeccion"];

            }
        }
        return $fecha;
    }
    public static function getIDPeliByPro($id){  
        $consulta = Proyecciones::consulta();
        while($reg = $consulta->fetch(PDO::FETCH_ASSOC)){
            if($reg["idProyeccion"]==$id){
                $fecha= $reg["idPelicula"];

            }
        }
        return $fecha;
    }


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


    //Borra proyecciones de una película en concreto a partir de una id
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

    //Funciones para calcular el aforo disponible en una sala


}


/*
SELECT COUNT(idUsuario) FROM `reserva` WHERE idProyeccion = 111
El resultado de esta consulta se restará al número de aforo de cada sala para obtener el total



*/
?>