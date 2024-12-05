<?php

namespace app\models; // Asegúrate de que el namespace sea correcto

use app\core\Model;
use app\core\DbModel;
use app\core\UserModel;

/**
 * 
 * @package app/models
 */

class User extends UserModel
{
    const STATUS_INACTIVE = 0;
    const STATUS_ACTIVE = 1;
    const STATUS_DELETED = 2;

    public string $rut = '';
    public string $nombre = '';
    public string $apellido = '';
    public string $email = '';
    public string $region = '';
    public string $comuna = '';
    public int $status = self::STATUS_INACTIVE;

    public string $password = '';
    public string $confirmPassword = '';

    public function tableName(): string
    {
        return 'users';
    }
    public function primaryKey(): string
    {
        return 'id';
    }

    public function save()
    {
        $this->status = self::STATUS_INACTIVE;
        $this->password = password_hash($this->password, PASSWORD_DEFAULT);
        return parent::save();
    }
    public function rules(): array
    {
        return [
            'rut' => [self::RULE_REQUIRED],
            'nombre' => [self::RULE_REQUIRED],
            'apellido' => [self::RULE_REQUIRED],
            'email' => [self::RULE_REQUIRED, self::RULE_EMAIL, [
                self::RULE_UNIQUE,
                'class' => self::class,
                'attribute '
            ]],
            'password' => [self::RULE_REQUIRED, [self::RULE_MIN, 'min' => 8], [self::RULE_MAX, 'max' => 24]],
            'confirmPassword' => [self::RULE_REQUIRED, [self::RULE_MATCH, 'match' => 'password']],



        ];
    }
    public function attributes(): array
    {
        return ['rut', 'nombre', 'apellido', 'email', 'region', 'comuna', 'password', 'status'];
    }
    public function labels(): array
    {
        return [
            'rut' => 'Rut',
            'nombre' => 'Nombre',
            'apellido' => 'Apellido',
            'email' => 'Email',
            'region' => 'Region',
            'comuna' => 'Comuna',
            'password' => 'Contraseña',
            'passwordConfirm' => 'Confirma tu contraseña',

        ];
    }
    public function getDisplayName(): string {
        return $this->nombre . ' ' . $this->apellido;
    }
}
