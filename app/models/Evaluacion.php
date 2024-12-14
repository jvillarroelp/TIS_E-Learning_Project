<?php

namespace app\models;


use app\core\DbModel;

class Evaluacion extends DbModel
{
    public string $COD_EVALUACION = '';
    public string $COD_CURSO;
    
    public string $FECHA_DIAGNOSTICO = '';
    public string $DESCRIPCION_EVALUACION = '';
    public string $NOMBRE_EVALUACION= '';





    public function tableName(): string
    {
        return 'evaluacion'; 
    }

    public function primaryKey(): string
    {
        return 'CODIGO_EVALUACION'; 
    }

    public function rules(): array
    {
        return [
            'COD_EVALUACION' => [self::RULE_REQUIRED],  
            'COD_CURSO' => [self::RULE_REQUIRED], 
            'FECHA_DIAGNOSTICO' => [self::RULE_REQUIRED], 
            'DESCRIPCION_EVALUACION' => [self::RULE_REQUIRED],
            'NOMBRE_EVALUACION' => [self::RULE_REQUIRED],
        ];
    }

    public function attributes(): array
    {
        return ['COD_EVALUACION', 'COD_CURSO', 'FECHA_DIAGNOSTICO','DESCRIPCION_EVALUACION','NOMBRE_EVALUACION'];
    }

    
    public function labels(): array
    
    {
        return [
            'COD_EVALUACION' => 'Codigo de evaluación',
            'COD_CURSO' => 'Codigo del curso',
            'FECHA_DIAGNOTICO' => 'Fecha de realizamiento',
            'DESCRIPCION_EVALUACION' =>'Descripcion',
            'NOMBRE_EVALUACION' => 'Nombre'
        ];
    }
}
