<?php 

class CineDB{
    
    public static function conectar(){
        try{
            $conn = new PDO( "mysql:host=localhost;dbname=cinepi", "JoseQB", "JoseQB");
            $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $conn->exec("SET CHARACTER SET UTF8"); 
         //   echo "Conexión establecida";
        }catch(PDOException $e){
            die("Error" . $e->getMessage());
            echo "Linea del error" . $e->getLine();
        }
        return $conn;
    }
}

?>