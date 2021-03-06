<?php 
    /**
     * Usuario
     * Clase usuario
     * 
     *
     * @package      bdd
     * @author       Jose Luis Quintanilla Blanco
     * @copyright    Jose Luis Quintanilla Blanco - 2020
     */
    require_once("CineDB.php");
    /**
     * Esta clase contiene los métodos que manejan todo lo referente a los datos de los usuarios
     */
    class Usuario{
        
        /** @var $id id del usuario */
        public $id;
        /** @var $nombre id del usuario */
        public $nombre;
        /** @var $mail correo del usuario */
        public $mail;
        /** @var $pass contraseña del usuario */
        public $pass;
        /** @var $rol id del usuario */
        public $admin;

        /**
         * Constructor de calse. Recibe los parámetros necesarios para construir el objeto Usuario
         * 
         * @param int $id id del usuario
         * @param string $nombre nombre del usuario
         * @param string $mail correo del usuario
         * @param string $pass contraseña de acceso del usuario
         * @param boolean $admin rol del usuario (administrador o usuario normal)
         */
        function __construct($id, $nombre, $mail, $pass, $admin){
           $this->id=$id;
           $this->nombre=$nombre;
           $this->mail=$mail;
           $this->pass=$pass;
           $this->admin=$admin;
           
        } 

        /**
         * Devuelve el objeto usuario, este contiene todos los datos de un usuario
         * 
         * @return object
         */
        public static function getUsuaios(){
            $conexion = CineDB::conectar();
            $query = "SELECT * from usuarios";
            $consulta = $conexion->query($query);
            $usuarios = [];
            while($registro = $consulta->fetch(PDO::FETCH_ASSOC)){
                $usuarios = new Usuario($registro["idUsuario"], $registro["nombre"], $registro["mail"], $registro["pass"], $registro["admin"]);
            }
            return $usuarios;
            $conexion = null;
        }
        
        public static function usuarios(){
            $conexion = CineDB::conectar();
            $select = "SELECT nombre FROM usuarios";
            $consulta= $conexion->query($select);
    
            return $consulta;
            $conexion = null;
        }


    }

?>