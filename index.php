<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    
    <title>Document</title>
</head>
<body>
    <?php include_once "VISTA/header.php" ?>
    <main>
        <div class="container">
            <div class="row">
                <button id="btnAdmin">Administrador</button>
                <button id="btnArbitro">Árbitro</button>
            </div>
        </div>
    </main>
    <?php include_once "VISTA/footer.php" ?>

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