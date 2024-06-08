<?php 
require_once '../MODELO/Funciones.php';
require_once '../VISTA/FuncionesVista.php';

// Archivos de PHPMailer
require '../phpmailer/src/Exception.php';
require '../phpmailer/src/PHPMailer.php';
require '../phpmailer/src/SMTP.php';
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;


if($_SERVER["REQUEST_METHOD"] != "GET"){
    header("Location: ../index.php?error=true");
    exit();
}

if(isset($_GET['identificador'])){
    $dni = $_GET["identificador"];
    $arbitro = Funciones::obtenerArbitroPorDni($dni);
    if (!$arbitro) header("Location: ../index.php?error=true");

    $idArbitro = $arbitro->getId();
    $email = $arbitro->getEmail();
    $nombre = $arbitro->getNombre()." ".$arbitro->getApellidos();
}


$token = Funciones::crearToken($idArbitro);
if(!$token){
    header("Location: ../index.php?error=true");
}

$mail = new PHPMailer(true);

$asunto = "Recuperación de contraseña";

// Construir el mensaje HTML
$contenido = '
<div style="background-color: white; border: solid; border-radius: 2rem; padding: 1rem;">
	<h1 style="text-align: center;">Recuperación de contraseña</h1>
	<p>Ha solicitado usted la recuperación de contraseña para <em>'.$nombre.'</em></p>
	<p>Para cambiar su contraseña acceda a el siguiente link:</p>
	<p style="text-align: center;"><a href="https://acreditacionesparaeventos.com/VISTA/recuperarContrasenia.php?token='.$token.'">Recuperar contraseña</a></p>
	<p style="text-align: center;"><strong>Muchas gracias!</strong></p>
</div>
';

// Construir el mensaje en Texto Plano
$contenidoPlano = "
Recuperación de contraseña\n\n
Ha solicitado usted la recuperación de contraseña para el usuario '.$nombre.'.\n\n

Para cambiar su contraseña acceda a el siguiente link:\n
https://acreditacionesparaeventos.com/VISTA/recuperarContrasenia.php?token='.$token.'

Muchas gracias!
";

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
    $mail->addAddress($email, $nombre);

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