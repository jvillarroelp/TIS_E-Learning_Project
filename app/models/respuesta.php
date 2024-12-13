<?php

namespace app\models;

use app\core\DbModel;

class Respuesta extends DbModel
{
    public int $ID_RESPUESTA = 0;
    public int $ID_PREGUNTA = 0;
    public int $COD_EVALUACION = 0;
    public int $RUT_USUARIO = 0;
    public ?string $FECHA_RESPUESTA = '';
    public string $RESPUESTA = '';

    public static function tableName(): string
    {
        return 'respuesta_evaluacion';
    }

    public function attributes(): array
    {
        return [
            'ID_RESPUESTA', 'ID_PREGUNTA', 'COD_EVALUACION', 'RUT_USUARIO', 
            'FECHA_RESPUESTA', 'RESPUESTA'
        ];
    }

    public function rules(): array
    {
        return [
            'RESPUESTA' => [self::RULE_REQUIRED],
            'ID_PREGUNTA' => [self::RULE_REQUIRED],
            'COD_EVALUACION' => [self::RULE_REQUIRED],
            'RUT_USUARIO' => [self::RULE_REQUIRED],
        ];
    }
}
