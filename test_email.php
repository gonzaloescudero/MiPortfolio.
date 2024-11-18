<?php
// Mostrar errores en pantalla para diagnosticar problemas
ini_set('display_errors', 1);
error_reporting(E_ALL);

// Incluir PHPMailer
require 'phpmailer/src/PHPMailer.php';
require 'phpmailer/src/SMTP.php';
require 'phpmailer/src/Exception.php';

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

$mail = new PHPMailer(true);


try {
    // Configuración del servidor SMTP
    $mail->isSMTP();
    $mail->Host = 'smtp.gmail.com'; // Servidor SMTP de Gmail
    $mail->SMTPAuth = true;
    $mail->Username = 'gonzaloescudero287@gmail.com'; // Tu Gmail
    $mail->Password = 'wzof wqeh lihb nohs'; // Contraseña de aplicación generada en Gmail
    $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
    $mail->Port = 587;

    // Configuración del correo
    $mail->setFrom('gonzaloescudero287@gmail.com', 'Prueba PHPMailer'); // Correo y nombre del remitente
    $mail->addAddress('gonzaloescudero287@gmail.com'); // Tu correo como destinatario

    // Contenido del correo
    $mail->isHTML(true);
    $mail->Subject = 'Correo de prueba';
    $mail->Body    = '¡Esto es un correo de prueba enviado con PHPMailer!';
    $mail->AltBody = 'Esto es un correo de prueba en texto plano.';

    // Enviar correo
    $mail->send();
    echo 'El correo se envió correctamente.';
} catch (Exception $e) {
    echo "No se pudo enviar el correo. Error: {$mail->ErrorInfo}";
}
?>
