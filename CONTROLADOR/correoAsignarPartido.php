<?php

// Archivos de PHPMailer
require '../phpmailer/src/Exception.php';
require '../phpmailer/src/PHPMailer.php';
require '../phpmailer/src/SMTP.php';
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

$arbitro = Funciones::obtenerArbitro($partido->getArbitro());
$categoria = Funciones::obtenerCategoria($partido->getCategoria());
$local = Funciones::obtenerClub($partido->getLocal());
$visitante = Funciones::obtenerClub($partido->getVisitante());
$polideportivo = Funciones::obtenerPolideportivo($local->getPolideportivo());

$email = $arbitro->getEmail();
$nombre = $arbitro->getNombre();
$apellidos = $arbitro->getApellidos();

$asunto = "Asignación de partido";

// Construir el mensaje HTML
$contenido = '
<div style="background-color: white; border: solid; border-radius: 2rem; padding: 1rem">
    <h1 style="text-align: center;">Se le ha asignado un partido para la fecha '.$partido->getFecha().'</h1>
    <p>Los datos del partido son: </p>
    <ul>
        <li>Categoría: <strong>'.$categoria->getDescripcion().'</strong></li>
        <li>Equipo Local: <strong>'.$local->getNombre().'</strong></li>
        <li>Equipo Visitante: <strong>'.$visitante->getNombre().'</strong></li>
        <li>Jornada: <strong>'.$jornada.'</strong></li>
        <li>Temporada: <strong>'.$temporada.'</strong></li>
        <li>Ubicación: <strong>'.$local->getPolideportivo().'</strong></li>
    </ul>
    <h3>Si no puede acudir, avise cuanto antes a los administradores.</h3>
    <br>
    <p style="text-align: center;"><strong>Muchas gracias!</strong></p>
</div>
';

// Construir el mensaje en Texto Plano
$contenidoPlano = "
Se le ha asignado un partido para la fecha ".$partido->getFecha()."\n\n

Categoría -> ".$categoria->getDescripcion()."\n
Equipo Local -> ".$local->getNombre()."\n
Equipo Visitante -> ".$visitante->getNombre()."\n
Jornada -> ".$jornada."\n
Temporada -> ".$temporada."\n
Ubicación -> ".$local->getPolideportivo()."\n\n

Si no puede acudir, avise cuanto antes a los administradores.\n\n

Muchas gracias!
";

$mail = new PHPMailer(true);

try {
    // Configuración del servidor SMTP
    $mail->isSMTP();
    $mail->Host = 'smtp.gmail.com'; // Reemplaza con tu servidor SMTP
    $mail->SMTPAuth = true;
    $mail->Username = 'gestiondearbitros@gmail.com'; // Reemplaza con tu email
    $mail->Password = 'vnfvmldlktmnzmgh'; // Reemplaza con tu contraseña
    $mail->SMTPSecure = 'tls'; // Establecer la encriptación TLS
    $mail->Port = 587;

    // Configuración del correo
    $mail->setFrom('gestiondearbitros@gmail.com', 'Gestión ADS');
    $mail->addAddress($email, $nombre.' '.$apellidos);
    $mail->addBCC('caicedo.david2002@gmail.com', 'David Caicedo');
    $mail->addBCC('dioggovr702@gmail.com', 'Dioggo Vásquez');


    // Contenido del correo
    $mail->isHTML(true);
    $mail->CharSet = 'UTF-8';
    $mail->Subject = $asunto;
    $mail->Body    = $contenido;
    $mail->AltBody = $contenidoPlano;

    $mail->send();
    echo FuncionesVista::pantallaDeOperacion("Se ha asignado el partido correctamente",true);
    exit();
} catch (Exception $e) {
    echo "El mensaje no pudo ser enviado. Mailer Error: {$mail->ErrorInfo}";
}