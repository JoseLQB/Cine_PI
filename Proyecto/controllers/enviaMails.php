<?php 
session_start();
require "mailApi/Exception.php";
require "mailApi/PHPMailer.php";
require "mailApi/SMTP.php";

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

//Envía mail al admin a través del formulario de contacto
if(isset($_POST["enviaContacto"])){
    $nombre =$_POST["nombre"];
    $apellidos =$_POST["apellidos"];
    $asunto =$_POST["asunto"];
    $email =$_POST["email"];
    $tlf=$_POST["telefono"];
    $pob=$_POST["pob"];
    $msg=$_POST["msg"];
    
    $oMail = new PHPMailer();
    $oMail->isSMTP();
    $oMail->Host="smtp.gmail.com";
    $oMail->Port=587;
    $oMail->SMTPSecure="tls";
    $oMail->SMTPAuth=true;
    $oMail->Username="cinespipsur@gmail.com";//de
    $oMail->Password="psur2020";
    $oMail->setFrom("cinespipsur@gmail.com", "Contacto");
    $oMail->addAddress("cinespipsur@gmail.com", "cpi");//para
    $oMail->Subject=$asunto ;
    $oMail->msgHTML("<h3>Mensaje nuevo de ".$nombre . " " .$apellidos  . "</h3><br><p>Desde ".$pob ."</p><b>Correo ". $email ."<br><br><h3>MENSAJE:</h3><p>".$msg."</p>");
    
    if(!$oMail->send()){
        echo $oMail->ErrorInfo;
    }else{
        header("Location:../vistas/contacto.php?conf=yes");
    }

//Envía mail al usuario con la entrada reservada
}elseif(isset($_POST["confComprar"])) {
    $oMail = new PHPMailer();
    $oMail->isSMTP();
    $oMail->Host="smtp.gmail.com";
    $oMail->Port=587;
    $oMail->SMTPSecure="tls";
    $oMail->SMTPAuth=true;
    $oMail->Username="cinespipsur@gmail.com";//de
    $oMail->Password="psur2020";
    $oMail->setFrom("cinespipsur@gmail.com", "Tu compra");
    $oMail->addAddress($_SESSION["mail"], $_SESSION["nombre"]);//para
    $oMail->Subject="Tus entradas";
    $oMail->msgHTML("<h3>Aquí tienes tus entradas</h3><br><h5> ".$_SESSION["titulo"]."<br>Día ". $_SESSION["fecha"] . " a las " . $_SESSION["hora"] ." en la sala ".$_SESSION["sala"]."<br>Has pagado ".$_SESSION["precio"] *$_SESSION["cantidad"] ."€</h5>");
    
    if(!$oMail->send()){
        echo $oMail->ErrorInfo;
    }else{
        header("Location:../vistas/compraExito.php");
    }

}

?>
