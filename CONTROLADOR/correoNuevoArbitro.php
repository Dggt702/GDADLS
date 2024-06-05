<?php

// Archivos de PHPMailer
require '../phpmailer/src/Exception.php';
require '../phpmailer/src/PHPMailer.php';
require '../phpmailer/src/SMTP.php';
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

$nombre = $arbitro->getNombre();
$apellidos = $arbitro->getApellidos();
$dni = $arbitro->getDni();
$telefono = $arbitro->getTelefono();
$email = $arbitro->getEmail();

$mail = new PHPMailer(true);

$asunto = "Bienvenido a Gestión de Árbitros ADS";

// Construir el mensaje HTML
$contenido = 'prueba
';

// Construir el mensaje en Texto Plano
$contenidoPlano = "prueba
";

try {
    // Configuración del servidor SMTP
    $mail->isSMTP();
    $mail->Host = 'smtp.gmail.com'; // Reemplaza con tu servidor SMTP
    $mail->SMTPAuth = true;
    $mail->Username = 'caicedo4.2002@gmail.com'; // Reemplaza con tu email
    $mail->Password = 'DAVID6210'; // Reemplaza con tu contraseña
    $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
    $mail->Port = 587;

    // Configuración del correo
    $mail->setFrom('caicedo4.2002@gmail.com', 'David');
    $mail->addAddress($email, $nombre.' '.$apellidos);

    // Contenido del correo
    $mail->isHTML(true);
    $mail->CharSet = 'UTF-8';
    $mail->Subject = $asunto;
    $mail->Body    = $contenido;
    $mail->AltBody = $contenidoPlano;

    $mail->send();
    echo FuncionesVista::pantallaDeOperacion("Se ha introducido el usuario correctamente",true);
    exit();
} catch (Exception $e) {
    echo "El mensaje no pudo ser enviado. Mailer Error: {$mail->ErrorInfo}";
}