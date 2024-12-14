<?php

namespace app\models;

use app\core\Model;
use app\core\Application;

/**
 * @package app\models
 */

class LoginForm extends Model
{

    public string $email = '';
    public string $password = '';

    public function rules(): array
    {
        return [
            'email' => [self::RULE_REQUIRED, self::RULE_EMAIL],
            'password' => [self::RULE_REQUIRED]
        ];
    }

    public function labels(): array{
        return [
            'CORREO' => 'Correo',
            'CONTRASENIA' => 'Contraseña'
        ];
    }
    public function login()
    {
        // Busca el usuario por correo
        $user = User::findOne(['CORREO' => $this->email]);

        if (!$user) {
            $this->addError('CORREO', 'Este usuario no existe');
            return false;
        }

        // Verifica la contraseña
        if(!password_verify($this->password, $user->CONTRASENIA)){
            $this->addError('CONTRASENIA', 'La contraseña es incorrecta');
            return false;
        }

        // Almacena el role_id del usuario en la sesión
        $_SESSION['user_role'] = $user->ID_ROL;  // Guarda el ID del rol en la sesión

        // Realiza el login
        return Application::$app->login($user);
    }
}
