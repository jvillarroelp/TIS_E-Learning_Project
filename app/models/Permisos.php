<?php
namespace app\models;

use app\core\DbModel;

class Permisos extends DbModel
{
    
    public string $NOMBRE_PERMISO = '';

    public function tableName(): string
    {
        return 'permisos';  // Tabla de permisos
    }

    public function primaryKey(): string
    {
        return 'ID_PERMISO';  // Clave primaria
    }

    public function attributes(): array
    {
        return ['NOMBRE'];  // Atributos de la tabla
    }
    public function rules(): array
    {
        return [
            
            'NOMBRE' => [self::RULE_REQUIRED],
            
        ];
    }
}
