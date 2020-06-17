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
    $oMail->msgHTML("</head><body><h3>Aqu&iacute; tienes tus entradas</h3><br><h5><h3>Mensaje nuevo de ".$nombre . " " .$apellidos  . "</h3><br><p>Desde ".$pob ."</p><b>Correo ". $email ."<br><br><h3>MENSAJE:</h3><p>".$msg."</p>");
    
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
    $oMail->msgHTML("</head><body><h3>Aqu&iacute; tienes tus entradas</h3><br><h5> ".$_SESSION["titulo"]."<br>D&iacute;a ". $_SESSION["fecha"] . " a las " . $_SESSION["hora"] ." en la sala ".$_SESSION["sala"]."<br>Has pagado ".$_SESSION["precio"] *$_SESSION["cantidad"] ."&euro;</h5>");
    
    if(!$oMail->send()){
        echo $oMail->ErrorInfo;
    }else{
        header("Location:../vistas/compraExito.php");
    }

//Envía mail al usuario que se acaba de registrar, además, al final crea las cookies que se utilizarán para el registro
}elseif(isset($_POST["regis"])){
    $oMail = new PHPMailer();
    $oMail->isSMTP();
    $oMail->Host="smtp.gmail.com";
    $oMail->Port=587;
    $oMail->SMTPSecure="tls";
    $oMail->SMTPAuth=true;
    $oMail->Username="cinespipsur@gmail.com";//de
    $oMail->Password="psur2020";
    $oMail->setFrom("cinespipsur@gmail.com", "Bienvenido");
    $oMail->addAddress($_POST["mail"], $_POST["usuario"]);//para
    $oMail->Subject="Bienvenido a cines PI";
    $oMail->msgHTML("<h3>Gracias por registrarte en nuestra web.<br>Disfruta de nuestro cine</h3><br><h4>Tus datos:</h4>Nombre de usuario: ".$_POST["usuario"] . "<br>Tu email: ".$_POST["mail"] . "<br>Tu contrase&ntilde;a: ".$_POST["pass"]);
    
    if(!$oMail->send()){
        echo $oMail->ErrorInfo;
    }else{
        setcookie("usuario", $_POST["usuario"], time() +(15), "/" );
        setcookie("pass", $_POST["pass"], time() +(15), "/" );
        setcookie("passc", $_POST["passc"], time() +(15), "/" );
        setcookie("mail", $_POST["mail"], time() +(15), "/" );
        header("Location:../vistas/registro.php");
    }

}

?>
