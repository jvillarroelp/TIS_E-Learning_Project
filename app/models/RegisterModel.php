<?php

namespace app\models;

use app\core\Model;

/**
 * 
 * @package app/models
 */

class RegisterModel extends Model
{
    public string $rut = '';
    public string $nombre = '';
    public string $apellido = '';
    public string $email = '';
    public string $password = '';
    public string $confirmPassword = '';


    public function register()
    {
        echo "crear nuevo usuario";
    }
    public function rules(): array
    {
        return [
            'rut' => [self::RULE_REQUIRED],
            'nombre' => [self::RULE_REQUIRED],
            'apellido' => [self::RULE_REQUIRED],

            'email' => [self::RULE_REQUIRED, self::RULE_EMAIL],
            'password' => [self::RULE_REQUIRED, [self::RULE_MIN, 'min' => 8], [self::RULE_MAX, 'max' => 24]],
            'confirmPassword' => [self::RULE_REQUIRED, [self::RULE_MATCH, 'match' => 'password']],



        ];
    }
}
