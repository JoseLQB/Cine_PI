<?php 
//echo json_encode("Conexión establecida con el servidor");
require_once("../bdd/CineDB.php");
if($_SERVER["REQUEST_METHOD"]=="POST"){ //comprueba que el metodo sea post
    header("Content-Type: application/json");
    $array=[];
    $mail=strtolower($_POST["email"]);
    
    $conexion =CineDB::conectar();
    $query = "SELECT * FROM usuarios WHERE mail = '$mail'";
    $busca_usuario= $conexion->prepare($query);
    $busca_usuario->bindParam(":mail", $mail, PDO::PARAM_STR);
    $busca_usuario->execute();

    //Validar que sea un email nuevo
    if($busca_usuario->rowCount()==1){
        //existe
        $array["error"] = "Este mail ya existe";
        $array["is_login"]=false;
    }else{
        //no existe
        $pass = password_hash($_POST['password'], PASSWORD_DEFAULT);
        $nombre = $_POST["nombre"];
        $insert = "INSERT INTO usuarios (nombre, mail, pass) VALUES (:nombre, :mail, :pass)";
        $nuevo_usuario = $conexion->prepare($insert);
        $nuevo_usuario->bindParam(":nombre", $nombre, PDO::PARAM_STR);
        $nuevo_usuario->bindParam(":mail", $mail, PDO::PARAM_STR);
        $nuevo_usuario->bindParam(":pass", $pass, PDO::PARAM_STR);
        $nuevo_usuario->execute();

        $user_id = $conexion->lastInsertId();
        $_SESSION["idUsuario"]=(int) $user_id;
        $array["redirect"]="";
        $array["is_login"]=true;

    }

    echo json_encode($array);
}else{
    exit("Hasta luego");

}

?>