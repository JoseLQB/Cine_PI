<?php 

require_once("CineDB.php");

class Cartelera{

    public function consulta(){
    
        $conexion = CineDB::conectar();
        $select = "SELECT * FROM pelicula";
        $consulta= $conexion->query($select);

        return $consulta;

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
    public function getTitulo(){  
        $consulta = Cartelera::consulta();
        while($reg = $consulta->fetch(PDO::FETCH_ASSOC)){
            $titulo= $reg["titulo"];
        }
        return $titulo;
    }
    public function getFecha(){  
        $consulta = Cartelera::consulta();
        while($reg = $consulta->fetch(PDO::FETCH_ASSOC)){
            $fecha= $reg["anEstreno"];
        }
        return $fecha;
    }
    public function getCartel(){  
        $consulta = Cartelera::consulta();
        while($reg = $consulta->fetch(PDO::FETCH_ASSOC)){
            $cartel= $reg["cartel"];
        }
        return $cartel;
    }
    public function getTrailer(){  
        $consulta = Cartelera::consulta();
        while($reg = $consulta->fetch(PDO::FETCH_ASSOC)){
            $trailer= $reg["trailer"];
        }
        return $trailer;
    }
    public function getSinopsis(){  
        $consulta = Cartelera::consulta();
        while($reg = $consulta->fetch(PDO::FETCH_ASSOC)){
            $sinopsis= $reg["sinopsis"];
        }
        return $sinopsis;
    }


}




?>