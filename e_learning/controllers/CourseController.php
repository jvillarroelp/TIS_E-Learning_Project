<!-- /controllers/CourseController.php -->
<?php
include_once '../models/Course.php';
include_once '../models/database.php';

class CourseController
{
    private $courseModel;
    private $db;

    public function __construct($db)
    {
        // Se crea la conexión a la Base de Datos
        $this->db = $db;
        $this->courseModel = new Course($this->db);
    }

    public function register($data)
    {
        // Validación básica de los datos antes de registrar el curso
        if (empty($data['COD_CURSO']) || empty($data['NOMBRE_CURSO']) || empty($data['ESTADO']) || empty($data['FECHA_INICIO']) || empty($data['FECHA_FIN']) || empty($data['DESCRIPCION_CURSO'])) {
            return ['status' => false, 'message' => 'Todos los campos son obligatorios.'];
        }

        // Intento de creación del curso
        if ($this->courseModel->create($data)) {
            return ['status' => true, 'message' => 'Curso registrado exitosamente.'];
        } else {
            return ['status' => false, 'message' => 'Error en el registro del curso.'];
        }
    }
   
}
?>