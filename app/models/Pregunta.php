<?php

namespace app\models;

use app\core\DbModel;

class Pregunta extends DbModel
{
    public int $ID_PREGUNTA = 0;
    public int $COD_EVALUACION = 0;
    public int $ID;
    public string $PREGUNTA = '';
    public ?string $COMENTARIO = '';
    public ?string $TIPO_PREGUNTA = '';
    public ?string $RESPUESTA_CORRECTA = '';
    public ?string $ALTERNATIVA = '';
    public ?string $FECHA_PREGUNTA = '';

    public function primaryKey(): string
    {
        return 'ID';
    }

    // Asegúrate de no utilizar 'static' aquí
    public function tableName(): string
    {
        return 'preguntas_evaluacion';
    }

    public function attributes(): array
    {
        return [
            'ID_PREGUNTA', 'COD_EVALUACION', 'RUT_USUARIO', 'PREGUNTA',
            'COMENTARIO', 'TIPO_PREGUNTA', 'RESPUESTA_CORRECTA', 'ALTERNATIVA', 'FECHA_PREGUNTA'
        ];
    }

    public function rules(): array
    {
        return [
            'PREGUNTA' => [self::RULE_REQUIRED],
            'RESPUESTA_CORRECTA' => [self::RULE_REQUIRED],
            'COD_EVALUACION' => [self::RULE_REQUIRED],
            'RUT_USUARIO' => [self::RULE_REQUIRED]
        ];
    }
}
