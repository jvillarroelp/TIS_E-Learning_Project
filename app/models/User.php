<?php

namespace app\models;

use app\core\Model;
use app\core\DbModel;


/**
 * 
 * @package app/models
 */

class User extends DbModel
{
    public string $rut = '';
    public string $nombre = '';
    public string $apellido = '';
    public string $email = '';
    public string $password = '';
    public string $confirmPassword = '';

    public function tableName(): string
    {
        return 'users';
    }

    public function register()
    {
        return $this->save();
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
    public function attributes(): array
    {
        return ['rut', 'nombre', 'apellido', 'email', 'password'];
    }
}
