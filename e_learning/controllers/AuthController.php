// /controllers/AuthController.php

<?php
include_once '../models/user.php';
include_once '../models/database.php';

class AuthController {
    private $userModel;
    private $db;

    public function __construct($db) {
        // Se crea la conexión a la Base de Datos
        $database = new Database();
        $this->db = $database->getConnection();
        $this->userModel = new User($this->db);
    }

    public function register($data) {
        
        // Validación básica de los datos antes de registrarse
        if (empty($data['NOMBRE']) || empty($data['CORREO']) || empty($data['CONTRASENIA']) || empty($data['RUT_USUARIO']) || empty($data['REGION']) || empty($data['COMUNA'])) {
            var_dump($data);
            echo 'Faltan datos';
            
            return ['status' => false, 'message' => 'Todos los campos son obligatorios.'];
        }
        
        // Hash de la contraseña
        $hashed_password = password_hash($data['CONTRASENIA'], PASSWORD_DEFAULT);
        $data['CONTRASENIA'] = $hashed_password;
        
        // Intento de creación del usuario
        if ($this->userModel->create($data)) {
            return ['status' => true, 'message' => 'Usuario registrado exitosamente.'];
        } else {
            return ['status' => false, 'message' => 'Error en el registro de usuario.'];
        }
    }

    public function login($data) {
        // Verificación de datos de inicio de sesión
        if (empty($data['RUT_USUARIO']) || empty($data['CONTRASENIA'])) {
            return ['status' => false, 'message' => 'RUT y contraseña son obligatorios.'];
        }

        // Verificar si el usuario existe y obtener sus datos
        $user = $this->userModel->getUserByRut($data['RUT_USUARIO']);

        if (!$user) {
            return ['status' => false, 'message' => 'Usuario no encontrado.'];
        }



        // Verificación de contraseña
        if (password_verify($data['CONTRASENIA'], $user['CONTRASENIA'])) {
            return ['status' => true, 'message' => 'Inicio de sesión exitoso.'];
        } else {
            return ['status' => false, 'message' => 'Contraseña incorrecta.'];
        }
    }

    public function logout(): void{
        session_destroy();
    }
}
?>
