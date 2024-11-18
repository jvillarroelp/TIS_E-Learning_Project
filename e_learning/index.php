<!-- /mi_proyecto/index.php -->

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
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:ital@0;1&display=swap" rel="stylesheet">

    <title>Plataforma E-learning</title>
    <link rel="stylesheet" href="css/styles.css"> <!-- Vincula el archivo de estilos -->
</head>
<body>
    <header>
        <div class="nav__container"> <!--Contenedor para la barra de navegación-->
            <a href="index.php"><h1>ProEduca</h1></a>
                <nav class="nav__menu">
                    <a href="index.php">Inicio</a>
                    <a href="views/login_view.php">Iniciar sesión</a>
                    <a href="views/register_view.php">Registrarse</a>
                </nav>
        </div>
    </header>
    <!-- =============Termino para la Barra de Navegación==============-->

    <!-- =============Sección de Información==============-->
    <section class="info-section">
        <div class="container section__container">
            <div class="section__left">
                <h1>Texto de Ejemplo</h1>
                <p>
                    Lorem ipsum dolor sit amet consectetur, adipisicing elit. Quidem laudantium, ut aliquam perferendis ipsum vero laboriosam tempore neque totam dolore.
                </p>
                <a href="Courses.html" class="btn btn-primary">Get Started</a>
            </div>
            <div class="section_right">
                <div class="section_right-image">
                    <img src="./images/header.svg">
                </div>
            </div>
        </div>
    </section>
    <!-- =============Termino para la sección de Información==============-->


    <!-- =============Contenedor para la sección de Categorías==============-->

    <section class="categories-section">
        <div class="container categories__container">
            <div class="categories__left">
                <h1>Categorías</h1>
                <p>
                    Lorem ipsum dolor sit, amet consectetur adipisicing elit. Esse deleniti quaerat, ipsum aliquid voluptatum ad magnam veritatis eaque corporis dicta.
                </p>
                <a href="#" class="btn">Aprender Mas</a>
            </div>
            <div class="categories__right">
                <article class="category">
                    <span class="category__icon"><i class="uil uil-pricetag-alt"></i></span>
                    <h5>Marketing Digital</h5>
                    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Error, dolorem.</p>
                </article>

                <article class="category">
                    <span class="category__icon"><i class="uil uil-dollar-alt"></i></span>
                    <h5>Gestión Financiera</h5>
                    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Error, dolorem.</p>
                </article>

                <article class="category">
                    <span class="category__icon"><i class="uil uil-puzzle-piece"></i></span>
                    <h5>Estrategias de Recursos</h5>
                    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Error, dolorem.</p>
                </article>
                
            </div>
        </div>
    </section>

    <!-- =============Termino para la sección de Categorías==============-->

    <script src="js/scripts.js"></script> <!-- Vincula el archivo de scripts -->
</body>
</html>
