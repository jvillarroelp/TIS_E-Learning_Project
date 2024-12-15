<?php
namespace app\models;

use app\core\DbModel;

class Realiza extends DbModel
{
    public int $ID;
    public int $COD_CURSO;

    // Definir la tabla que utilizará este modelo
    public function tableName(): string
    {
        return 'realiza';
    }

    // Definir los atributos de la tabla
    public function attributes(): array
    {
        return ['ID', 'COD_CURSO'];
    }

    // Definir la clave primaria
    public function primaryKey(): string
    {
        return 'COD_CURSO'; // Puedes modificar esto dependiendo de cómo configures la clave primaria
    }

    public function rules(): array
    {
        return [
            'ID' => [self::RULE_REQUIRED],
            'COD_CURSO' => [self::RULE_REQUIRED],
          
        ];
    }

}
