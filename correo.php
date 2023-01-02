
<?php

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

require 'email/vendor/autoload.php';

/*require 'email/src/PHPMailer.php';
require 'email/src/SMTP.php';
require 'email/src/Exception.php';
*/
$mail = new PHPMailer(true);    

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
    $mail->addAddress('gbtrestablecimiento@gmail.com','GBTRAIDING');
    $mail->addCC('davidsotofaa@gmail.com');

    $mail->isHTML(true);
    $mail->Subject = 'Prueba N1';
    $mail->Body = 'Prueba de correo electrónico';
    $mail->send();

    echo 'Correo enviado';

}catch(Exception $e){
    echo 'Mensaje' . $mail->ErrorInfo;
}

?>
