<?php

namespace app\models;

use app\core\DbModel;

class Respuesta extends DbModel
{
    public int $ID_PREGUNTA;
    public int $ID;
    public string $FECHA_RESPUESTA = '';
    public string $RESPUESTA = '';

    public function primaryKey(): string
    {
        return 'ID_RESPUESTA';
    }

    public function tableName(): string
    {
        return 'respuesta_evaluacion';
    }

    public function attributes(): array
    {
        return [
            'ID',
            'ID_PREGUNTA',
            'FECHA_RESPUESTA',
            'RESPUESTA'
        ];
    }

    public function rules(): array
    {
        return [
            'RESPUESTA' => [self::RULE_REQUIRED],
            'ID_PREGUNTA' => [self::RULE_REQUIRED],
            'FECHA_RESPUESTA' => [self::RULE_REQUIRED],
        ];
    }
}
