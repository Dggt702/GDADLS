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
                <form action="comprobarUsuario.php" method="POST">
                    <div class="col-12">
                        <label for="nombreUsuario" class="form-label">Nombre de usuario</label>
                        <input type="text" class="form-control" id="nombreUsuario">
                    </div>
                </form>
            </div>
        </div>
    </main>
    <?php include_once "VISTA/header.php" ?>
</body>
</html>