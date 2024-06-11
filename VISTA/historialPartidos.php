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
                    
                    <div class="col-md-6 col-sm-12 px-2">
                        <div class="card mb-3">
                            <div class="card-header"><?php echo $deporte->getNombre() ?></div>
                            <div class="card-body">
                                <h5 class="card-title"><?php echo $local->getNombre() ?> vs <?php echo $visitante->getNombre() ?></h5>
                                <h6 class="card-subtitle mb-2 text-body-secondary"><?php echo $partido->getFecha() ?></h6>
                                <p class="card-text">Jornada <?php echo $partido->getJornada() ?> - Temporada <?php echo $partido->getTemporada() ?></p>
                                <p class="card-text"><?php echo $polideportivo->getUbicacion() ?> - <?php echo $pueblo->getNombre() ?></p>
                                <a href="https://www.google.com/maps/search/?api=1&query=<?php echo $polideportivo->getUbicacion() ?>" class="btn btn-primary id='redirectButton'">Ubicación</a>
                                <button class="btn btn-primary" data-bs-target="#exampleModalToggle" data-bs-toggle="modal">Incidencia</button>
                                <div class="modal fade" id="exampleModalToggle" aria-hidden="true" aria-labelledby="exampleModalToggleLabel" tabindex="-1">
                                    <div class="modal-dialog modal-dialog-centered">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h1 class="modal-title fs-5" id="exampleModalToggleLabel">Incidencia</h1>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                            </div>
                                        
                                            <form action="../CONTROLADOR/enviarIncidencia.php" method="POST">
                                                <div class="modal-body">
                                                    <div class="mb-3">
                                                        <label class="form-label">Partido</label>
                                                        <input type="text" class="form-control fw-bold" name="idPartido" value="<?php echo $partido->getId() ?>" hidden>
                                                        <input type="text" class="form-control fw-bold" value="<?php echo $local->getNombre() ?> vs <?php echo $visitante->getNombre() ?>" readonly>
                                                        <label class="form-label">Árbitro</label>
                                                        <input type="text" class="form-control fw-bold" name="idArbitro" value="<?php echo $idArbitro ?>" hidden>
                                                        <input type="text" class="form-control fw-bold" value="<?php echo $arbitro->getNombre()." ".$arbitro->getApellidos() ?>" readonly>
                                                    </div>
                                                    <div class="mb-3">
                                                        <label for="exampleFormControlTextarea1" class="form-label">Comentario</label>
                                                        <textarea name="comentario" class="form-control" id="exampleFormControlTextarea1" rows="3"></textarea>
                                                    </div>
                                                </div>
                                                
                                                <div class="modal-footer">
                                                    <button class="btn btn-primary" data-bs-target="#exampleModalToggle2" data-bs-toggle="modal">Enviar Incidencia</button>
                                                </div>                                      
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <input type="hidden" id="idArbitro" value=<?php echo $arbitro->getId() ?>>
                </div>
            </div>
        </div>
    </main>
    <?php include_once "footer.php" ?>



    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    
    <script>
    
    </script>
</body>

</html>

