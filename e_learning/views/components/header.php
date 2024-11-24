<!-- Planilla HTML como boceto para trabajar con extensión Live Preview y luego añadirlo al archivo .PHP -->

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- ICONOS DE LA LIBRERÍA UNICONS -->
    <link rel="stylesheet" href="https://unicons.iconscout.com/release/v4.0.0/css/line.css">
    <link rel="stylesheet" href="estilo.css">
    <!-- GOOGLE FONTS (MONTSERRAT) -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:ital@0;1&display=swap" rel="stylesheet">
    <title>Plataforma E-learning</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
</head>
<body>
    <nav class="navbar navbar-expand-lg navbar-light pb-4 pt-4 ps-5" style="background-color: #2e3267;">
        <div class="container-fluid">
            <a class="navbar-brand text-white" href="#">ProEduca</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse justify-content-center  " id="navbarNav">
                <ul class="navbar-nav ">
                    <li class="nav-item">
                        <a class="nav-link active text-white" aria-current="page" href="index.php" >Inicio</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link text-white" href="views/login_view.php">Iniciar Sesion</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link text-white" href="views/register_view.php">Registrarse</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link  text-white" href="views/user/panel.php" tabindex="-1" aria-disabled="true">Tablero de aprendizaje</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
    
      <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script></body>
</html>
