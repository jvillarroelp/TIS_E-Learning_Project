<!-- /modules/register.php -->

<?php
include_once '../config.php'; // Conexión a la base de datos
include_once '../models/user.php'; // Clase User
include_once '../controllers/AuthController.php'; // Controlador de autenticación

if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    // Normalizar RUT: quitar puntos y guiones
    $rut_usuario = preg_replace('/[.-]/', '', $_POST['RUT_USUARIO']); // Eliminar puntos y guiones

   

    // Obtener datos del formulario
    $data = [
        'NOMBRE' => $_POST['NOMBRE'],
        'CORREO' => $_POST['CORREO'],
        'CONTRASENIA' => $_POST['CONTRASENIA'],
        'RUT_USUARIO' => $rut_usuario,
        'REGION' => $_POST['REGION'],
        'COMUNA' => $_POST['COMUNA'],
    ];

    

    // Crear una instancia de Database y obtener la conexión
    $database = new Database();
    $db = $database->getConnection();

    // Crear una instancia del controlador de autenticación y pasar la conexión a la base de datos
    $authController = new AuthController($db);

    // Intentar crear el usuario usando el controlador de autenticación
    $result = $authController->register($data);


    if ($result['status']) {
        // Registro exitoso, redirigir a la página principal
        header("Location: ../index.php");
        exit();
    } else {
        //var_dump($data);
        //exit();
        // Redirigir de nuevo a la vista de registro con un mensaje de error
        header("Location: ../views/register_view.php?error=true");
        exit();
    }
}
?>
