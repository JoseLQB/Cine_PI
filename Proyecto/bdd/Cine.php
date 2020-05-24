<?php 

require_once("CineDB.php");

class Cartelera{

    public function consulta(){
    
        $conexion = CineDB::conectar();
        $select = "SELECT * FROM pelicula";
        $consulta= $conexion->query($select);

        return $consulta;

    }
    
    public function portada(){
        $consulta = Cartelera::consulta();
        while ($reg = $consulta->fetch(PDO::FETCH_ASSOC)) {
            echo"<div class='col-sm my-3'><div class='card cartel'>
            <a href='compra.php?varID=".$reg["idPelicula"]." '><img class='' src='" . $reg['cartel'] . "' alt='' srcset=''></a>
                <div class='card-body'><h5 class='card-title'>" . $reg['titulo'] . " (" . $reg['anEstreno'] . ")" . "</h5>
                </div></div></div>";
        }
    }
    public function getListado(){
        $consulta = Cartelera::consulta();
        while ($reg = $consulta->fetch(PDO::FETCH_ASSOC)) {
            echo"<ul><li>".$reg["idPelicula"].  " -- ". $reg["titulo"]."</li></ul>";
        }
    }
    
    public function getIDs(){
        $consulta = Cartelera::consulta();
        while ($reg = $consulta->fetch(PDO::FETCH_ASSOC)) {
            echo $reg["idPelicula"];
        }
    }
    public function getTitulos(){
        $consulta = Cartelera::consulta();
        while ($reg = $consulta->fetch(PDO::FETCH_ASSOC)) {
            echo $reg["titulo"];
        }
    }

    //--Métodos para mostrar los datos uno a uno

    public function getTitulo($id){  
        $consulta = Cartelera::consulta();
        while($reg = $consulta->fetch(PDO::FETCH_ASSOC)){
            if($reg["idPelicula"]==$id){
                $titulo= $reg["titulo"];

            }
        }
        return $titulo;
    }

    
    public function getCartel($id){ 
        $consulta = Cartelera::consulta();
        while($reg = $consulta->fetch(PDO::FETCH_ASSOC)){
            if($reg["idPelicula"]==$id){
                $cartel= $reg["cartel"];

            }
        }
        return $cartel;
    }
    public function getFecha($id){ 
        $consulta = Cartelera::consulta();
        while($reg = $consulta->fetch(PDO::FETCH_ASSOC)){
            if($reg["idPelicula"]==$id){
                $fecha= $reg["anEstreno"];
            }
        }
        return $fecha;
    }
    
    public function getGenero($id){ 
        $consulta = Cartelera::consulta();
        while($reg = $consulta->fetch(PDO::FETCH_ASSOC)){
            if($reg["idPelicula"]==$id){
                $fecha= $reg["genero"];
            }
        }
        return $fecha;
    }

    public function getTrailer($id){ 
        $consulta = Cartelera::consulta();
        while($reg = $consulta->fetch(PDO::FETCH_ASSOC)){
            if($reg["idPelicula"]==$id){
                $trailer= $reg["trailer"];
            }
        }
        return $trailer;
    }
    public function getSinopsis($id){ 
        $consulta = Cartelera::consulta();
        while($reg = $consulta->fetch(PDO::FETCH_ASSOC)){
            if($reg["idPelicula"]==$id){
                $sinopsis= $reg["sinopsis"];
            }
        }
        return $sinopsis;
    }
    public function getPais($id){ 
        $consulta = Cartelera::consulta();
        while($reg = $consulta->fetch(PDO::FETCH_ASSOC)){
            if($reg["idPelicula"]==$id){
                $pais= $reg["pais"];
            }
        }
        return $pais;
    }
    public function getDirector($id){ 
        $consulta = Cartelera::consulta();
        while($reg = $consulta->fetch(PDO::FETCH_ASSOC)){
            if($reg["idPelicula"]==$id){
                $director= $reg["director"];
            }
        }
        return $director;
    }
    
    public function nuevaPelicula($idPelicula, $pais,  $genero, $duracion, $anEstreno, $sinopsis, $titulo, $director, $trailer, $cartel){
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
    public function delete($idPelicula){
        $conexion = CineDB::conectar();
        $sql = "DELETE FROM pelicula WHERE idPelicula =  :idPelicula";
        $sentencia = $conexion->prepare($sql);
        $sentencia->bindParam(':idPelicula', $idPelicula);
        $sentencia->execute();
    }
    //Modifica a un usuario pasándole a la función los nuevos datos
    public function update($idPelicula, $pais,  $genero, $duracion, $anEstreno, $sinopsis, $titulo, $director, $trailer, $cartel){
        $conexion = CineDB::conectar();
        $sql = "UPDATE usuario SET 
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