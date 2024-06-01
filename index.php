<!DOCTYPE html>
<html lang="es" class="h-100">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <title>Document</title>
</head>
<body class="d-flex flex-column h-100">
    <?php include_once "VISTA/header.php" ?>
    <main class="mt-5">
        <div class="container">
            <div class="row">
                <div class="col-6 d-flex justify-content-center">
                    <button id="btnAdmin" class="btn btn-success">Administrador</button>
                </div>
                <div class="col-6 d-flex justify-content-center">
                    <button id="btnArbitro" class="btn btn-primary">Árbitro</button>
                </div>
                <div class="col-12">
                    <?php include_once "VISTA/loginAdmin.php" ?>
                    <?php include_once "VISTA/loginArbitro.php" ?>
                </div>               
            </div>
        </div>
    </main>
    <?php include_once "VISTA/footer.php" ?>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    <script>
        document.addEventListener("DOMContentLoaded", function() {
            const btnAdmin = document.getElementById("btnAdmin");
            const btnArbitro = document.getElementById("btnArbitro");
            const formAdmin = document.getElementById("formAdmin");
            const formArbitro = document.getElementById("formArbitro");

            // Mostrar el Formulario 1 y ocultar el Formulario 2
            btnAdmin.addEventListener("click", function() {
                formAdmin.style.display = "block";
                formArbitro.style.display = "none";
            });

            // Mostrar el Formulario 2 y ocultar el Formulario 1
            btnArbitro.addEventListener("click", function() {
                formArbitro.style.display = "block";
                formAdmin.style.display = "none";
            });
        }); 
    </script>
</body>
</html>