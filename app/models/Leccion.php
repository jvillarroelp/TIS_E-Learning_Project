<?php

namespace app\models;

use app\core\DbModel;

class Leccion extends DbModel
{
   
    public int $ID_MODULO = 0;
    public string $NOMBRE_LECCION = '';

    public function tableName(): string
    {
        return 'LECCION'; // Nombre de la tabla
    }

    public function primaryKey(): string
    {
        return 'ID_LECCION'; // Llave primaria
    }

    public function attributes(): array
    {
        return [ 'ID_MODULO', 'NOMBRE_LECCION'];
    }

    public function rules(): array
    {
        return [
            
            'ID_MODULO' => [self::RULE_REQUIRED],
            'NOMBRE_LECCION' => [self::RULE_REQUIRED],
        ];
    }

    public function labels(): array
    {
        return [
           
            'ID_MODULO' => 'ID del Módulo',
            'NOMBRE_LECCION' => 'Nombre de la Lección',
        ];
    }
}
