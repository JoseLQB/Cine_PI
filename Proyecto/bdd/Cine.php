<?php 

require_once("CineDB.php");

class Cartelera{    
    public $idPelicula;
    public $pais;
    public $genero;
    public $duracion;
    public $anEstreno;
    public $simopsis;
    public $titulo;
    public $director;
    public $trailer;
    public $cartel;

    function __construct($idPelicula, $pais, $genero, $duracion, $anEstreno, $simopsis, $titulo, $director, $trailer, $cartel){
        $this->idPelicula = $idPelicula;
        $this->pais = $pais;
        $this->genero = $genero;
        $this->duracion = $duracion;
        $this->anEstreno = $anEstreno;
        $this->simopsis = $simopsis;
        $this->titulo = $titulo;
        $this->director = $director;
        $this->trailer = $trailer;
        $this->cartel = $cartel;
    }

    //Consulta genérica de todos los campos de la tabla
    public static function consulta(){
        $conexion = CineDB::conectar();
        $select = "SELECT * FROM pelicula";
        $consulta= $conexion->query($select);

        return $consulta;

    }

    public static function creaListado(){
        $conexion = CineDB::conectar();
        $query = "SELECT * FROM pelicula";
        $consulta = $conexion->query($query);
        $tarifas=[];
        while($registro = $consulta->fetch(PDO::FETCH_ASSOC)){

            $cartel[]= new Cartelera($registro["idPelicula"], $registro["pais"], $registro["genero"], $registro["duracion"], $registro["anEstreno"], $registro["sinopsis"], $registro["titulo"], $registro["director"], $registro["trailer"], $registro["cartel"]);     
        }
        return $cartel;
    }

    public static function getListado(){
        $consulta = Cartelera::consulta();
        while ($reg = $consulta->fetch(PDO::FETCH_ASSOC)) {
            echo"<ul><li>".$reg["idPelicula"].  " -- ". $reg["titulo"]."</li></ul>";
        }
    }
    
    public static function getIDs(){
        $consulta = Cartelera::consulta();
        while ($reg = $consulta->fetch(PDO::FETCH_ASSOC)) {
            echo $reg["idPelicula"];
        }
    }
    public static function getTitulos(){
        $consulta = Cartelera::consulta();
        while ($reg = $consulta->fetch(PDO::FETCH_ASSOC)) {
            echo $reg["titulo"];
        }
    }

    //--Métodos para mostrar los datos uno a uno

    public static function getTitulo($id){  
        $consulta = Cartelera::consulta();
        while($reg = $consulta->fetch(PDO::FETCH_ASSOC)){
            if($reg["idPelicula"]==$id){
                $titulo= $reg["titulo"];

            }
        }
        return $titulo;
    }
    public static function getDuracion($id){  
        $consulta = Cartelera::consulta();
        while($reg = $consulta->fetch(PDO::FETCH_ASSOC)){
            if($reg["idPelicula"]==$id){
                $duracion= $reg["duracion"];

            }
        }
        return $duracion;
    }

    
    public static function getCartel($id){ 
        $consulta = Cartelera::consulta();
        while($reg = $consulta->fetch(PDO::FETCH_ASSOC)){
            if($reg["idPelicula"]==$id){
                $cartel= $reg["cartel"];

            }
        }
        return $cartel;
    }
    public static function getFecha($id){ 
        $consulta = Cartelera::consulta();
        while($reg = $consulta->fetch(PDO::FETCH_ASSOC)){
            if($reg["idPelicula"]==$id){
                $fecha= $reg["anEstreno"];
            }
        }
        return $fecha;
    }
    
    public static function getGenero($id){ 
        $consulta = Cartelera::consulta();
        while($reg = $consulta->fetch(PDO::FETCH_ASSOC)){
            if($reg["idPelicula"]==$id){
                $fecha= $reg["genero"];
            }
        }
        return $fecha;
    }

    public static function getTrailer($id){ 
        $consulta = Cartelera::consulta();
        while($reg = $consulta->fetch(PDO::FETCH_ASSOC)){
            if($reg["idPelicula"]==$id){
                $trailer= $reg["trailer"];
            }
        }
        return $trailer;
    }
    public static function getSinopsis($id){ 
        $consulta = Cartelera::consulta();
        while($reg = $consulta->fetch(PDO::FETCH_ASSOC)){
            if($reg["idPelicula"]==$id){
                $sinopsis= $reg["sinopsis"];
            }
        }
        return $sinopsis;
    }
    public static function getPais($id){ 
        $consulta = Cartelera::consulta();
        while($reg = $consulta->fetch(PDO::FETCH_ASSOC)){
            if($reg["idPelicula"]==$id){
                $pais= $reg["pais"];
            }
        }
        return $pais;
    }
    public static function getDirector($id){ 
        $consulta = Cartelera::consulta();
        while($reg = $consulta->fetch(PDO::FETCH_ASSOC)){
            if($reg["idPelicula"]==$id){
                $director= $reg["director"];
            }
        }
        return $director;
    }

    public static function getIDbyTitle($titulo){
        $consulta = Cartelera::consulta();
        while($reg = $consulta->fetch(PDO::FETCH_ASSOC)){
            if($reg["titulo"]==$titulo){
                $id= $reg["idPelicula"];
            }
        }
        return $id;
    }

    //Saca la media de cada película a partir de su id
    public static function getMedia($id){
        $conexion = CineDB::conectar();
        $sql="SELECT AVG(valoracion) FROM valoracion WHERE idPelicula =$id";
        $consulta =  $conexion->query($sql)->fetchAll()[0];
        return $consulta;
    }
    
    public static function nuevaPelicula($idPelicula, $pais,  $genero, $duracion, $anEstreno, $sinopsis, $titulo, $director, $trailer, $cartel){
        $conexion = CineDB::conectar();
        $sql = "INSERT INTO pelicula(idPelicula, pais, genero, duracion, anEstreno, sinopsis, titulo, director, trailer, cartel) VALUES(:idPelicula, :pais, :genero, :duracion, :anEstreno, :sinopsis, :titulo, :director, :trailer, :cartel)";
        $sentencia = $conexion->prepare($sql);
        $sentencia->bindParam(':idPelicula', $idPelicula);
        $sentencia->bindParam(':pais', $pais);
        $sentencia->bindParam(':genero', $genero);
        $sentencia->bindParam(':duracion', $duracion);
        $sentencia->bindParam(':anEstreno', $anEstreno);
        $sentencia->bindParam(':sinopsis', $sinopsis);
        $sentencia->bindParam(':titulo', $titulo);
        $sentencia->bindParam(':director', $director);
        $sentencia->bindParam(':trailer', $trailer);
        $sentencia->bindParam(':cartel', $cartel);
        $sentencia->execute();
    }
    //Elimina a un usuario a partir de su id
    public static function delete($idPelicula){
        $conexion = CineDB::conectar();
        $sql = "DELETE FROM pelicula WHERE idPelicula =  :idPelicula";
        $sentencia = $conexion->prepare($sql);
        $sentencia->bindParam(':idPelicula', $idPelicula);
        $sentencia->execute();
    }
    //Modifica a un usuario pasándole a la función los nuevos datos
    public static function update($idPelicula, $pais,  $genero, $duracion, $anEstreno, $sinopsis, $titulo, $director, $trailer, $cartel){
        $conexion = CineDB::conectar();
        $sql = "UPDATE pelicula SET 
                idPelicula = :idPelicula,
                pais = :pais,
                genero = :genero,
                duracion = :duracion,
                anEstreno = :anEstreno,
                sinopsis = :sinopsis,
                titulo = :titulo,
                director = :director,
                trailer = :trailer, 
                cartel = :cartel WHERE idPelicula = $idPelicula";
        $sentencia = $conexion->prepare($sql);
        $sentencia->bindParam(':idPelicula', $idPelicula);
        $sentencia->bindParam(':pais', $pais);
        $sentencia->bindParam(':genero', $genero);
        $sentencia->bindParam(':duracion', $duracion);
        $sentencia->bindParam(':anEstreno', $anEstreno);
        $sentencia->bindParam(':sinopsis', $sinopsis);
        $sentencia->bindParam(':titulo', $titulo);
        $sentencia->bindParam(':director', $director);
        $sentencia->bindParam(':trailer', $trailer);
        $sentencia->bindParam(':cartel', $cartel);
        $sentencia->execute();
        
    }


    

}




?>