<?php 

    /**
     * CineDB
     * Esta clase contiene los métodos que manejan todo lo referente a los datos de cada proyección.
     * 
     *
     * @package      bdd
     * @author       Jose Luis Quintanilla Blanco
     * @copyright    Jose Luis Quintanilla Blanco - 2020
     */

     /**
      * Clase CineDB
      */
class CineDB{
    
    /**
     * Esta función devuelve la conexión con la base de datos
     * 
     * @return object
     */
    public static function conectar(){
        try{
            $conn = new PDO( "mysql:host=localhost;dbname=cinepi", "JoseQB", "JoseQB");
            //$conn = new PDO( "mysql:host=localhost;dbname=cinepi", "root", "");
            $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $conn->exec("SET CHARACTER SET UTF8");
        }catch(PDOException $e){
            die("Error" . $e->getMessage());
            echo "Linea del error" . $e->getLine();
        }
        return $conn;
    }
}

?>