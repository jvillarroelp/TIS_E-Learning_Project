<?php

namespace app\models;

use app\core\DbModel;

class Permisos extends DbModel
{
    public string $NOMBRE = '';  // Define la propiedad NOMBRE

    public function tableName(): string
    {
        return 'permisos';  // Asegúrate de que el nombre de la tabla sea correcto
    }

    public function primaryKey(): string
    {
        return 'ID_PERMISO';  // Asegúrate de que esta sea la clave primaria de tu tabla
    }

    public function attributes(): array
    {
        return ['NOMBRE'];  // Define que la propiedad NOMBRE es un atributo de la tabla
    }
    
    public function rules(): array
    {
        return [
            'NOMBRE' => [self::RULE_REQUIRED],  // Asegúrate de que la propiedad NOMBRE esté incluida en las reglas
        ];
    }
}
