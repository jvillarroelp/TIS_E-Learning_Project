// /models/User.php

<?php
include_once '../models/database.php'; 

class User {
    private $db;

    public function __construct($db) {
        $this->db = $db; // Obtener la conexión
    }

    public function create($data) {
        $stmt = $this->db->prepare("INSERT INTO usuario (NOMBRE, CORREO, CONTRASENIA, RUT_USUARIO, REGION, COMUNA) VALUES (?, ?, ?, ?, ?, ?)");
        if (!$stmt) {
            die("Error en la preparación de la consulta: " . $this->db->error);
        }
        $stmt->bind_param("ssssss", $data['NOMBRE'], $data['CORREO'], $data['CONTRASENIA'], $data['RUT_USUARIO'], $data['REGION'], $data['COMUNA']);
        return $stmt->execute(); // Retorna true si se ejecuta correctamente
    }

    public function validateUser($rut_usuario, $CONTRASENIA) {
        $stmt = $this->db->prepare("SELECT * FROM usuario WHERE RUT_USUARIO = ? AND CONTRASENIA = ?");
        if (!$stmt) {
            die("Error en la preparación de la consulta: " . $this->db->error);
        }
        $stmt->bind_param("ss", $rut_usuario, $CONTRASENIA);
        $stmt->execute();
        $result = $stmt->get_result();
        return $result->num_rows > 0; // Retorna true si el usuario existe
    }

    public function getUserByRut($rut_usuario) {
        $stmt = $this->db->prepare("SELECT * FROM usuario WHERE RUT_USUARIO = ?");
        if (!$stmt) {
            die("Error en la preparación de la consulta: " . $this->db->error);
        }
    
        $stmt->bind_param("s", $rut_usuario);
        $stmt->execute();
        $result = $stmt->get_result();

        if ($result->num_rows > 0) {
            return $result->fetch_assoc(); // Devuelve los datos del usuario como un arreglo asociativo
        } else {
            return null; // Retorna null si no se encontró el usuario
        }
    }

    public function __destruct() {
        $this->db->close(); // Cierra la conexión al finalizar la instancia
    }
}
?>
