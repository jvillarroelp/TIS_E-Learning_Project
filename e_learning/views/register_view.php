<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registro de Usuario</title>
    
    <!-- Incluye los estilos globales -->
    <link rel="stylesheet" href="https://unicons.iconscout.com/release/v4.0.0/css/line.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Montserrat:ital@0;1&display=swap">
    <link rel="stylesheet" href="../css/styles.css"> <!-- Asegúrate de que la ruta sea correcta -->
</head>
<body>

    <!-- Contenido del Header -->
    <header>
        <nav class="nav__container">
            <a href="#"><h1>ProEduca</h1></a>
            <ul class="nav__menu">
                <li><a href="#">Inicio</a></li>
                <li><a href="#">Servicios</a></li>
                <li><a href="#">Contacto</a></li>
            </ul>
        </nav>
    </header>

    <!-- Sección de Registro -->
    
    <div class="register__container">

        <div class="register-form">
            <img src="" alt="" class="logo">
            <h1 class="title">Iniciar Sesion</h1>

            <form action="../modules/register.php" method="POST" class="form">

                <label for="NOMBRE">Nombre:</label>
                <input type="text" name="NOMBRE" required class="input-field">

                <label for="CORREO">Correo:</label>
                <input type="email" name="CORREO" required class="input-field">

                <label for="CONTRASENIA">Contraseña:</label>
                <input type="password" name="CONTRASENIA" required class="input-field">

                <label for="rut_usuario">RUT:</label>
                <input type="number" name="RUT_USUARIO" required class="input-field">

                <label for="REGION">Región:</label>
                <select name="REGION" id="REGION" required class="input-field">
                    <option value="">Selecciona una región</option>
                    <option value="Arica y Parinacota">Arica y Parinacota</option>
                    <option value="Tarapacá">Tarapacá</option>
                    <option value="Antofagasta">Antofagasta</option>
                    <option value="Atacama">Atacama</option>
                    <option value="Coquimbo">Coquimbo</option>
                    <option value="Valparaíso">Valparaíso</option>
                    <option value="Metropolitana">Metropolitana</option>
                    <option value="O'Higgins">O'Higgins</option>
                    <option value="Maule">Maule</option>
                    <option value="Biobío">Biobío</option>
                    <option value="Araucanía">Araucanía</option>
                    <option value="Los Ríos">Los Ríos</option>
                    <option value="Los Lagos">Los Lagos</option>
                    <option value="Aysén">Aysén</option>
                    <option value="Magallanes">Magallanes</option>
                    <!-- Añadir todas las regiones -->
                </select>

                <label for="COMUNA">Comuna:</label>
                <select name="COMUNA" id="COMUNA" required class="input-field">
                    <option value="">Selecciona una comuna</option>
                    <!-- Las comunas se llenarán dinámicamente con JavaScript -->
                </select>

                <input type="submit" value="Ingresar">
            </form>

            <span class="text-footer">¿Ya tienes una cuenta?
                <a href="#">Inicia Sesión</a>
            </span>
        </div>

        <div class="content-texto">
            <div class="capa"></div>
            <h1 class="title-description">Lorem ipsum dolor sit amet.</h1>
            <p class="text-description">Lorem ipsum dolor sit, amet consectetur adipisicing elit. Libero repudiandae ipsa unde consequuntur vel, cum at fugit possimus nulla esse.</p>
        </div>

    </div>
    
    <!-- Contenido del Footer -->
    <footer>
        <p>&copy; 2024 Mi Sitio Web. Todos los derechos reservados.</p>
    </footer>

    <script src="../js/scripts.js"></script>
</body>
</html>
