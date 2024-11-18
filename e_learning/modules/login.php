// /modules/login.php

<?php
include_once '../config.php'; // Conexión a la base de datos
include_once '../models/user.php'; 
include_once '../controllers/AuthController.php'; // Controlador de autenticación

// Iniciar la sesión
session_start();



// Verifica si el método de solicitud es POST
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Recibe los datos del formulario
    $rut_usuario = $_POST['rut_usuario'];
    $contrasenia = $_POST['contrasenia'];

    // Normalizar el RUT: quitar puntos y guiones
    $rut_usuario = preg_replace('/[.-]/', '', $rut_usuario); // Eliminar puntos y guiones

    

    // Crear una instancia de Database y logramos la conexión
    $database = new Database();
    $db = $database->getConnection();

    // Crear una instancia del controlador de autenticación y pasar la conexión a la base de datos
    $authController = new AuthController($db);

    
    // Llama al método de login del controlador
    $data = ['RUT_USUARIO' => $rut_usuario, 'CONTRASENIA' => $contrasenia];
    $result = $authController->login($data);

    

    if ($result['status']) {
        header("Location: ../index.php");
        exit();
    } else {
        header("Location: ../views/login_view.php?error=true");
        exit();
    }
}
?>
