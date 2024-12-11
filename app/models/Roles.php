<?php

namespace app\models;
use app\core\DbModel;

class Roles extends DbModel
{
    public string $NOMBRE = '';

    public function tableName(): string
    {
        return 'roles'; // Asegúrate de que el nombre de la tabla sea 'roles'
    }

    public function primaryKey(): string
    {
        return 'ID';  // Asegúrate de que 'ID' es la clave primaria en tu tabla
    }

    public function attributes(): array
    {
        return ['NOMBRE'];  // Define los atributos de la tabla
    }
    public function rules(): array
    {
        return [
            
            'NOMBRE' => [self::RULE_REQUIRED],
            
        ];
    }
}
