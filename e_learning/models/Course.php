<!-- /models/Course.php -->
<?php
include_once '../models/database.php';

class Course {
    private $db;

    public function __construct($db) {
        $this->db = $db; // Obtener la conexión
    }

    public function create($data) {
        $stmt = $this->db->prepare("INSERT INTO curso (COD_CURSO, NOMBRE_CURSO, FECHA_INICIO, FECHA_FIN, ESTADO, DESCRIPCION_CURSO) VALUES (?, ?, ?, ?, ?, ?)");
        if (!$stmt) {
            die("Error en la preparación de la consulta: " . $this->db->error);
        }
        $stmt->bind_param("ssssss", $data['COD_CURSO'], $data['NOMBRE_CURSO'], $data['FECHA_INICIO'], $data['FECHA_FIN'], $data['ESTADO'], $data['DESCRIPCION_CURSO']);
        return $stmt->execute(); // Retorna true si se ejecuta correctamente
    }


   

    public function __destruct() {
        $this->db->close(); // Cierra la conexión al finalizar la instancia
    }
}
?>
