<?php
require 'phpmailer/src/PHPMailer.php';
require 'phpmailer/src/SMTP.php';
require 'phpmailer/src/Exception.php';

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Iniciar el buffer de salida para evitar conflictos con header()
    ob_start();

    $name = htmlspecialchars($_POST['name']);
    $email = htmlspecialchars($_POST['email']);
    $message = htmlspecialchars($_POST['message']);

    $mail = new PHPMailer(true);
    $mail->SMTPDebug = 0; // Cambiar a 0 para evitar mostrar salida de depuración

    try {
        $mail->isSMTP();
        $mail->Host = 'smtp.gmail.com';
        $mail->SMTPAuth = true;
        $mail->Username = 'gonzaloescudero287@gmail.com';
        $mail->Password = 'loze yubv reuq bseq'; // Contraseña de aplicación generada
        $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
        $mail->Port = 587;

        $mail->setFrom('gonzaloescudero287@gmail.com', 'Formulario de Contacto');
        $mail->addAddress('gonzaloescudero287@gmail.com');

        $mail->isHTML(true);
        $mail->Subject = 'Nuevo mensaje de contacto desde tu portafolio';
        $mail->Body    = "<p>Has recibido un nuevo mensaje:</p>
                           <p><strong>Nombre:</strong> $name</p>
                           <p><strong>Correo Electrónico:</strong> $email</p>
                           <p><strong>Mensaje:</strong></p>
                           <p>$message</p>";
        $mail->AltBody = "Nombre: $name\nCorreo Electrónico: $email\nMensaje:\n$message";

        $mail->send();

        // Redirigir a la página de agradecimiento
        header("Location: thank_you.html");
        exit();
    } catch (Exception $e) {
        echo "No se pudo enviar el correo. Error: {$mail->ErrorInfo}";
    } finally {
        // Cerrar el buffer de salida
        ob_end_flush();
    }
}
?>