<?php

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

require '../email/vendor/autoload.php';

include('../servicios/_conexion.php');


$correo             = trim($_REQUEST['email']); //Quitamos algun espacion en blanco
$consulta           = ("SELECT * FROM usuario WHERE email ='".$correo."'");
$queryconsulta      = mysqli_query($con, $consulta);
$cantidadConsulta   = mysqli_num_rows($queryconsulta);
$dataConsulta       = mysqli_fetch_array($queryconsulta);

if($cantidadConsulta == 0){ 

    echo 'no se encontro el correo';
 

}else{

/*require 'email/src/PHPMailer.php';
require 'email/src/SMTP.php';
require 'email/src/Exception.php';
*/
$mail = new PHPMailer(true);    

$linkRecuperar = "http://127.0.0.1/pifinal/pi/nuevaClave.php?ID=".$dataConsulta['ID'];

try{

    $mail ->SMTODebug = SMTP::DEBUG_SERVER;
    $mail->isSMTP();
    $mail->Host = 'smtp.gmail.com';
    $mail->SMTPAuth = true;
    $mail->Username='gbtrestablecimiento@gmail.com';
    $mail->Password = 'xemsgbqcqqphtays';
    $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
    $mail->Port = 587;

    $mail->setfrom('gbtrestablecimiento@gmail.com','GBTRAIDING');
    $mail->addAddress($correo,'GBTRAIDING');

    $mail->isHTML(true);
    $mail->Subject = 'Prueba N1';
    $mail->Body = 'Recuperar Clave de Usuario';
    $mail->Body = 'Hola entra en el link para que puedas recuperar tu clave '.$linkRecuperar;
    $mail->send();

    echo "<script>alert('*** Se envió un correo para recuperar la contraseña  ***');
    window.location='../login.php';
</script>";

}catch(Exception $e){
    echo 'Mensaje' . $mail->ErrorInfo;
}
}