<?php 
    /**
     * Cine
     * Clase Cartelera
     * 
     *
     * @package      bdd
     * @author       Jose Luis Quintanilla Blanco
     * @copyright    Jose Luis Quintanilla Blanco - 2020
     */
require_once("CineDB.php");
    /**
     * Esta clase contiene los métodos que manejan todo lo referente a los datos de cada película.
     */
class Cartelera{  
    /** @var $Pelicula id de la película */  
    public $idPelicula;
    /** @var $pais país de origen de la película */
    public $pais;
    /** @var $genero género de la película */
    public $genero;
    /** @var $duracion duración de la película */
    public $duracion;
    /** @var $anEstreno año de estreno de la película */
    public $anEstreno;
    /** @var $sinopsis sinopsis de la película */
    public $simopsis;
    /** @var $título título de la película */
    public $titulo;
    /** @var $director director de la película */
    public $director;
    /** @var $trailer código que completa la url del tráiler de la película */
    public $trailer;
    /** @var $carte url del cartel de la película */
    public $cartel;

    /**
     * Constructor de calse. Recibe los parámetros necesarios para construir el objeto Cartelera
     * 
     * @param int $idPelicula id de la película
     * @param string $pais nombre del pais
     * @param string $genero género de la película
     * @param int $duracion duracion de la película
     * @param int $anEstreno año de estreno de la película
     * @param string $simopsis resumen del argumento de la película
     * @param string $titulo título de la película
     * @param string $director director de la película
     * @param string $trailer codigo de youtube para enlazar el tráiler de la película
     * @param string $cartel enlace a la imagen del cartel de la película
     */
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

    /**
     * Devuelve una consulta genérica de todos los campos de la tabla películas
     *
     * @return object
     */
    public static function consulta(){
        $conexion = CineDB::conectar();
        $select = "SELECT * FROM pelicula";
        $consulta= $conexion->query($select);
        
        return $consulta;

    }

    /**
     * Devuelve un objeto películas con los datos necesario para construir la cartelera
     *
     * @return object
     */
    public static function creaListado(){
        $conexion = CineDB::conectar();
        $query = "SELECT * FROM pelicula";
        $consulta = $conexion->query($query);
        
        while($registro = $consulta->fetch(PDO::FETCH_ASSOC)){

            $cartel[]= new Cartelera($registro["idPelicula"], $registro["pais"], $registro["genero"], $registro["duracion"], $registro["anEstreno"], $registro["sinopsis"], $registro["titulo"], $registro["director"], $registro["trailer"], $registro["cartel"]);     
        }
        return $cartel;
        
    }

    /**
     * Dado el id de la película, devuelve el título de esta
     *
     * @param int $id id de la película
     * @return array
     */
    public static function getTitulo($id){  
        $consulta = Cartelera::consulta();
        while($reg = $consulta->fetch(PDO::FETCH_ASSOC)){
            if($reg["idPelicula"]==$id){
                $titulo= $reg["titulo"];

            }
        }
        return $titulo;
    }

    /**
     * Dado el id de la pelícla, devuelve la duración de esta
     *
     * @param int $id id de la película
     * @return array
     */
    public static function getDuracion($id){  
        $consulta = Cartelera::consulta();
        while($reg = $consulta->fetch(PDO::FETCH_ASSOC)){
            if($reg["idPelicula"]==$id){
                $duracion= $reg["duracion"];

            }
        }
        return $duracion;
    }
  
    /**
     * Dado el id de la pelícla, devuelve el cartel de esta
     *
     * @param int $id id de la película
     * @return array
     */  
    public static function getCartel($id){ 
        $consulta = Cartelera::consulta();
        while($reg = $consulta->fetch(PDO::FETCH_ASSOC)){
            if($reg["idPelicula"]==$id){
                $cartel= $reg["cartel"];

            }
        }
        return $cartel;
    }

    /**
     * Dado el id de la pelícla, devuelve la fecha de esta
     *
     * @param int $id id de la película
     * @return array
     */
    public static function getFecha($id){ 
        $consulta = Cartelera::consulta();
        while($reg = $consulta->fetch(PDO::FETCH_ASSOC)){
            if($reg["idPelicula"]==$id){
                $fecha= $reg["anEstreno"];
            }
        }
        return $fecha;
    }
    
    
    /**
     * Dado el id de la pelícla, devuelve el género de esta
     *
     * @param int $id id de la película
     * @return array
     */
    public static function getGenero($id){ 
        $consulta = Cartelera::consulta();
        while($reg = $consulta->fetch(PDO::FETCH_ASSOC)){
            if($reg["idPelicula"]==$id){
                $fecha= $reg["genero"];
            }
        }
        return $fecha;
    }

    /**
     * Dado el id de la pelícla, devuelve el enlace del tráiler de esta
     *
     * @param int $id id de la película
     * @return array
     */
    public static function getTrailer($id){ 
        $consulta = Cartelera::consulta();
        while($reg = $consulta->fetch(PDO::FETCH_ASSOC)){
            if($reg["idPelicula"]==$id){
                $trailer= $reg["trailer"];
            }
        }
        return $trailer;
    }

    /**
     * Dado el id de la pelícla, devuelve la sinopsis de esta
     *
     * @param int $id id de la película
     * @return array
     */
    public static function getSinopsis($id){ 
        $consulta = Cartelera::consulta();
        while($reg = $consulta->fetch(PDO::FETCH_ASSOC)){
            if($reg["idPelicula"]==$id){
                $sinopsis= $reg["sinopsis"];
            }
        }
        return $sinopsis;
    }
    
    /**
     * Dado el id de la pelícla, devuelve el pais de origen de esta
     *
     * @param int $id id de la película
     * @return array
     */
    public static function getPais($id){ 
        $consulta = Cartelera::consulta();
        while($reg = $consulta->fetch(PDO::FETCH_ASSOC)){
            if($reg["idPelicula"]==$id){
                $pais= $reg["pais"];
            }
        }
        return $pais;
    }
    
    /**
     * Dado el id de la pelícla, devuelve el director de esta
     *
     * @param int $id id de la película
     * @return array
     */
    public static function getDirector($id){ 
        $consulta = Cartelera::consulta();
        while($reg = $consulta->fetch(PDO::FETCH_ASSOC)){
            if($reg["idPelicula"]==$id){
                $director= $reg["director"];
            }
        }
        return $director;
    }


    /**
     * Dado el titulo de la pelícla, devuelve el id de esta
     *
     * @param int $titulo id de la película
     * @return array
     */
    public static function getIDbyTitle($titulo){
        $consulta = Cartelera::consulta();
        while($reg = $consulta->fetch(PDO::FETCH_ASSOC)){
            if($reg["titulo"]==$titulo){
                $id= $reg["idPelicula"];
            }
        }
        return $id;
    }

    /**
     * Dado el id de la pelícla, devuelve la media de esta
     *
     * @param int $id id de la película
     * @return int
     */
    public static function getMedia($id){
        $conexion = CineDB::conectar();
        $sql="SELECT AVG(valoracion) FROM valoracion WHERE idPelicula =$id";
        $consulta =  $conexion->query($sql)->fetchAll()[0];
        if($consulta[0] != ""){
            return $consulta;
        }else{
            return "5";
        }
    }
    
    /**
     * Metodo que inserta una nueva película con todos sus datos
     * 
     * @param int $idPelicula id de la película
     * @param string $pais nombre del pais
     * @param string $genero género de la película
     * @param int $duracion duracion de la película
     * @param int $anEstreno año de estreno de la película
     * @param string $sinopsis resumen del argumento de la película
     * @param string $titulo título de la película
     * @param string $director director de la película
     * @param string $trailer codigo de youtube para enlazar el tráiler de la película
     * @param string $cartel enlace a la imagen del cartel de la película
     * 
     * @return void
     */
    public static function nuevaPelicula($idPelicula, $pais,  $genero, $duracion, $anEstreno, $sinopsis, $titulo, $director, $trailer, $cartel){
        $conexion = CineDB::conectar();
        $sql = "INSERT INTO pelicula(idPelicula, pais, genero, duracion, anEstreno, sinopsis, titulo, director, trailer, cartel) VALUES(:idPelicula, :pais, :genero, :duracion, :anEstreno, :sinopsis, :titulo, :director, :trailer, :cartel)";
        $sentencia = $conexion->prepare($sql);
        $sentencia->bindParam(':idPelicula', $idPelicula, PDO::PARAM_INT);
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

    /**
     * Metodo que elimina una película a partir del id de esta
     * 
     * @param int $idPelicula id de la película
     * 
     * @return void
     */
    public static function delete($idPelicula){
        $conexion = CineDB::conectar();
        $sql = "DELETE FROM pelicula WHERE idPelicula =  :idPelicula";
        $sentencia = $conexion->prepare($sql);
        $sentencia->bindParam(':idPelicula', $idPelicula);
        $sentencia->execute();
    }

    /**
     * Metodo que actualiza una nueva película con todos sus datos
     * 
     * @param int $idPelicula id de la película
     * @param string $pais nombre del pais
     * @param string $genero género de la película
     * @param int $duracion duracion de la película
     * @param int $anEstreno año de estreno de la película
     * @param string $sinopsis resumen del argumento de la película
     * @param string $titulo título de la película
     * @param string $director director de la película
     * @param string $trailer codigo de youtube para enlazar el tráiler de la película
     * @param string $cartel enlace a la imagen del cartel de la película
     * 
     * @return void
     */
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