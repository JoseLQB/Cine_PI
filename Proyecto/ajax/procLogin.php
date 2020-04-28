<?php 
//echo json_encode("Conexión establecida con el servidor");
require_once("../bdd/CineDB.php");
if($_SERVER["REQUEST_METHOD"]=="POST"){ //comprueba que el metodo sea post
    header("Content-Type: application/json");
    $array=[];
    $mail=strtolower($_POST["email"]);
    $password = $_POST["password"];
    $conexion =CineDB::conectar();
    $query = "SELECT * FROM usuarios WHERE mail = '$mail'";
    $busca_usuario= $conexion->prepare($query);
    $busca_usuario->bindParam(":mail", $mail, PDO::PARAM_STR);
    $busca_usuario->execute();

    if($busca_usuario->rowCount()==1){
        //existe
        $usuario = $busca_usuario->fetch(PDO::FETCH_ASSOC);
        $user_id =  $usuario["idUsuario"];
        $hash = $usuario["pass"];                        ///////////////////////////////LOGIN NO FUNCIONA
        if(password_verify($password, $hash)){
            $array["redirect"]="https://www.forocoches.com/foro/showthread.php?t=7904839";
        }else{
            $array["error"]="Los datos son erróneos";
        }
    }else{
        $array["error"]="No tienes cuenta en la web <a href='../vistas/registro.php'>Regístrate</a>";
    }

    echo json_encode($array);
}else{
    exit("Hasta luego");

}
echo $hash;
echo $password;

?>