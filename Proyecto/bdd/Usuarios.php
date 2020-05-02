<?php 

    require_once("CineDB.php");
    class Usuario{
        
        public $id;
        public $nombre;
        public $mail;
        public $pass;
        public $admin;

        function __construct($id, $nombre, $mail, $pass, $admin){
           $this->id=$id;
           $this->nombre=$nombre;
           $this->mail=$mail;
           $this->pass=$pass;
           $this->admin=$admin;
           
        } 

        public static function getUsuaios(){
            $conexion = CineDB::conectar();
            $query = "SELECT * from USUARIO";
            $consulta = $conexion->query($query);
            $usuarios = [];
            while($registro = $consulta->fetch(PDO::FETCH_ASSOC)){
                $usuarios = new Usuario($registro["idUsuario"], $registro["nombre"], $registro["mail"], $registro["pass"], $registro["admin"]);
            }
            return $usuarios;
        }

        public static function compruebaLogin($user, $pass, $location){



        }

    }

?>