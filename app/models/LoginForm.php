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
        $user = User::findOne(['CORREO' => $this->email]);
        if (!$user) {
            $this->addError('CORREO', 'Este usuario no existe');
        return false;
        }
        if(!password_verify($this->password, $user->CONTRASENIA)){
            $this->addError('CONTRASENIA', 'La contraseña es incorrecta');
            return false;
        }
        return Application::$app->login($user);
    }
}
