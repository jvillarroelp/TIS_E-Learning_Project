<!-- /views/login_view.php -->

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Inicio de Sesión</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 20px;
            padding: 20px;
            background-color: #f4f4f4;
        }
        h2 {
            color: #333;
        }
        form {
            background: white;
            padding: 20px;
            border-radius: 5px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }
        label {
            display: block;
            margin-bottom: 8px;
        }
        input {
            width: 100%;
            padding: 8px;
            margin-bottom: 10px;
            border: 1px solid #ccc;
            border-radius: 4px;
        }
        button {
            padding: 10px;
            background-color: #5cb85c;
            color: white;
            border: none;
            border-radius: 4px;
            cursor: pointer;
        }
        button:hover {
            background-color: #4cae4c;
        }
        .error {
            color: red;
            margin-top: 10px;
        }
    </style>
</head>
<body>
    <h2>Iniciar Sesión</h2>
    
    <?php
    // Muestra mensaje de error si existe
    if (isset($_GET['error'])) {
        echo '<div class="error">Credenciales incorrectas. Intenta nuevamente.</div>';
    }
    ?>

    <form action="../modules/login.php" method="POST">
        <label for="rut_usuario¿">RUT:</label>
        <input type="number" name="rut_usuario" required>

        <label for="contrasenia">Contraseña:</label>
        <input type="password" name="contrasenia" required>

        <button type="submit">Ingresar</button>
    </form>
</body>
</html>
