<?php

use app\core\Application;

?>
<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- ICONOS DE LA LIBRERÍA UNICONS -->
    <link rel="stylesheet" href="https://unicons.iconscout.com/release/v4.0.0/css/line.css">

    <!-- GOOGLE FONTS (MONTSERRAT) -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@100;200;300;400;500;600;700;800;900&display=swap" rel="stylesheet">

    <title>Plataforma E-learning</title>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="estilo.css">

</head>

<body>
    <nav class="navbar navbar-expand-lg navbar-light pb-4 pt-4 ps-5" style="background-color: #2e3267;">
        <div class="container-fluid">
            <a class="navbar-brand text-white ps-5" href="/">
                <h1>ProEduca</h1>
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse justify-content-center" id="navbarNav">
                <ul class="navbar-nav">
                    <!-- Siempre visible -->
                    <li class="nav-item">
                        <a class="nav-link active text-white" aria-current="page" href="/">Inicio</a>
                    </li>

                    <!-- Elementos visibles solo para Docentes -->
                    <?php if (!Application::isGuest() && Application::$app->user->isTeacher()): ?>
                        <li class="nav-item">
                            <a class="nav-link text-white" href="/">Tablero de aprendizaje</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link text-white" href="/curso">Crear Curso</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link text-white" href="/evaluacion">Evaluación</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link text-white" href="/listEvaluacion">Lista Evaluaciones</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link text-white" href="/listar">Panel de Cursos</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link text-white" href="/listLecciones">Lista Lecciones</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link text-white" href="/listModulos">Lista Módulos</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link text-white" href="/preguntas">Preguntas</a>
                        </li>
                    <?php endif; ?>

                    <!-- Elementos visibles solo para Estudiantes -->
                    <?php if (!Application::isGuest() && Application::$app->user->isStudent()): ?>
                        <li class="nav-item">
                            <a class="nav-link text-white" href="/misCursos">Mis Cursos</a>
                        </li>
                    <?php endif; ?>

                    <!-- Elementos visibles para todos -->
                    <?php if (Application::isGuest()): ?>
                        <!-- Invitado -->
                        <li class="nav-item">
                            <a class="nav-link text-white" href="/login">Iniciar Sesión</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link text-white" href="/register">Registrarse</a>
                        </li>
                    <?php endif; ?>

                </ul>

                <!-- Área de usuario logueado -->
                <?php if (!Application::isGuest()): ?>
                    <ul class="navbar-nav ml-auto">
                        <li class="nav-item">
                            <a class="nav-link text-white" href="/logout">Bienvenido <?php echo Application::$app->user->getDisplayName() ?> (Logout)</a>
                        </li>
                    </ul>
                <?php endif; ?>
            </div>
        </div>
    </nav>
    <div class="container">
        <?php if (Application::$app->session->getFlash('sucess')): ?>
            <div class="alert alert-success">
                <?php echo Application::$app->session->getFlash('sucess') ?>
            </div>
        <?php endif; ?>


        {{content}}
    </div>

</body>

</html>
