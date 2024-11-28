<!-- /modules/register_course.php -->
<?php
include_once '../config.php'; // Conexión a la base de datos
include_once '../models/Course.php'; // Clase Course
include_once '../controllers/CourseController.php'; // Controlador de Cursos

if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    // Obtener datos del formulario
    $data = [
        'COD_CURSO' => $_POST['COD_CURSO'],
        'NOMBRE_CURSO' => $_POST['NOMBRE_CURSO'],
        'ESTADO' => $_POST['ESTADO'],
        'FECHA_INICIO' => $_POST['FECHA_INICIO'],
        'FECHA_FIN' => $_POST['FECHA_FIN'],
        'DESCRIPCION_CURSO' => $_POST['DESCRIPCION_CURSO'],
    ];

    // Crear una instancia de Database y obtener la conexión
    $database = new Database();
    $db = $database->getConnection();

    // Crear una instancia del controlador de Cursos y pasar la conexión a la base de datos
    $courseController = new CourseController($db);

    // Intentar crear el curso usando el controlador de cursos
    $result = $courseController->register($data);

    if ($result['status']) {
        // Registro exitoso, redirigir a la página principal
        header("Location: ../index.php");
        exit();
    } else {
        // Redirigir de nuevo al formulario con un mensaje de error
        header("Location: ../views/curso/create.php?error=true");
        exit();
    }
}
?>
