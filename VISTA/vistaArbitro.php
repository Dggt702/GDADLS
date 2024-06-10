<?php
include_once "../MODELO/Funciones.php";
include_once "../VISTA/FuncionesVista.php";

session_start();
if(!isset($_SESSION['idArbitro'])) header('Location: ../index.php');

$arbitro = Funciones::obtenerArbitro($_SESSION['idArbitro']);
?>
<!DOCTYPE html>
<html lang="es" class="h-100">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">    <title>Document</title>

    <link href='https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/3.10.2/fullcalendar.min.css' rel='stylesheet' />
    <script src='https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js'></script>
    <script src='https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.29.1/moment.min.js'></script>
    <script src='https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/3.10.2/fullcalendar.min.js'></script>
    <script src='https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/3.10.2/locale/es.js'></script>

    <style>
        .fc-unthemed td.fc-today {
            background: #cfffaf;            
        }
    </style>
</head>
</head>
<body class="d-flex flex-column h-100">
    <?php include_once "header.php" ?>
    <?php include_once "navArbitro.php" ?>

    <main class="d-flex mb-5">
        <div class="container p-3">
            <div class="row">
                <div class="col-12 d-flex flex-wrap">
                    <h2 class="col-12 text-center mb-3">Partidos asignados</h2>
                    <?php echo FuncionesVista::imprimirCardsPartido($arbitro->getId()) ?>
                    <input type="hidden" id="idArbitro" value=<?php echo $arbitro->getId() ?>>
                </div>
                <div class="col-12" id='calendar'></div>
            </div>
        </div>
    </main>
    <?php include_once "footer.php" ?>



    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    
    <script>
    $(document).ready(function() {
        var idArbitro = document.getElementById('idArbitro').value; // Obtener el valor del parámetro fijo

        $('#calendar').fullCalendar({
            header: {
                left: 'prev,next today',
                center: 'title',
                right: 'month,agendaWeek'
            },
            defaultView: 'month', // Vista por defecto: semana
            locale: 'es', // Idioma: español
            events: function(start, end, timezone, callback) {
                $.ajax({
                    url: '../CONTROLADOR/eventosCalendario.php',
                    dataType: 'json',
                    data: {
                        idArbitro: idArbitro // Pasar el parámetro fijo
                    },
                    success: function(data) {
                        callback(data);
                    },
                    error: function(xhr, status, error) {
                        alert('Error en la solicitud AJAX: ' + status + ', ' + error);
                    }
                });
            }
        });
    });

    </script>
</body>

</html>

