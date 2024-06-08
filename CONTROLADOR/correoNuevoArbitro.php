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

$asunto = "Bienvenido a Gestión de Árbitros de ADS";

// Construir el mensaje HTML
$contenido = '
<div style="background-color: white; border: solid; border-radius: 2rem; padding: 1rem">
    <h1 style="text-align: center;">Bienvenido a Gestión de Árbitros de ADS</h1>
    <p>
        Le damos la bienvenida a Gestión de Árbitros de ADS para la gestión de partidos de la Agrupación Deportiva de la Sierra.<br/>
        Sus datos de acceso son:
    </p>
    <ul>
        <li>Identificador: <strong>'.$dni.'</strong></li>
        <li>Contraseña: <strong>'.$contrasenia.'</strong></li>
    </ul>
    <h2 style="color: #2e6c80;"><span style="color: #3366ff;">Datos complementarios</span></h2>
    <table class="editorDemoTable" style="width: 600px; border-style: dotted; margin-left: auto; margin-right: auto;">
        <tbody>
            <tr style="height: 30px;">
                <td>Nombre</td>
                <td style="width: 75%; text-align: center;"">'.$nombre.'</td>
            </tr>
            <tr style="height: 30px;">
                <td>Apellidos</td>
                <td style="text-align: center;">'.$apellidos.'</td>
            </tr>
            <tr style="height: 30px;">
                <td>Teléfono</td>
                <td style="text-align: center;">'.$telefono.'</td>
            </tr>
            <tr style="height: 30px;">
                <td>Correo electrónico</td>
                <td style="text-align: center;">'.$email.'</td>
            </tr>
        </tbody>
    </table>
    <br>
    <p style="text-align: center;"><strong>Muchas gracias!</strong></p>
</div>
';

// Construir el mensaje en Texto Plano
$contenidoPlano = "
Bienvenido a Gestión de Árbitros de ADS\n\n
Le damos la bienvenida a Gestión de Árbitros de ADS para la gestión de partidos de la Agrupación Deportiva de la Sierra.\n\n

Sus datos de acceso son:\n
***Identificador*** -> '.$dni.'\n
***Contraseña***        -> '.$contrasenia.'\n\n

Datos complementarios:\n
\t- Nombre: '.$nombre.'\n
\t- Apellidos: '.$apellidos.'\n
\t- Telefono: ".$telefono."\n
\t- Correo electrónico: ".$email."\n\n

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