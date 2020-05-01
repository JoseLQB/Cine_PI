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


    //Muestra los datos de las películas
    public function datos(){      
        $consulta = Cartelera::consulta();
        while($reg = $consulta->fetch(PDO::FETCH_ASSOC)){
            echo $reg["titulo"]. " (".$reg["anEstreno"].")<br>";
            echo '<img src="'.$reg["cartel"].'" alt="">';
            echo '<iframe width="560" height="315" src="'.$reg["trailer"].'" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>'."<br>";
            echo $reg["sinopsis"]. "<br>";
            echo '<input type="button" value="COMPRAR"><br>';
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

}




?>