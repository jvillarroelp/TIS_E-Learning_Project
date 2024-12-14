<?php

namespace app\models;


use app\core\DbModel;

class Recurso extends DbModel
{
   
    public string $ID_LECCION;
    public string $COD_RECURSO='';
    public string $NOMBRE_RECURSO= '';
    public string $TIPO_RECURSO = '';
    public string $DESCRIPCION_RECURSO = '';

    public function tableName(): string
    {
        return 'recursos'; 
    }

    public function primaryKey(): string
    {
        return 'COD_RECURSO'; 
    }

    public function rules(): array
{
    return [
        'ID_LECCION' => [self::RULE_REQUIRED], 
        'COD_RECURSO' => [self::RULE_REQUIRED],
        'NOMBRE_RECURSO' => [self::RULE_REQUIRED], 
        'TIPO_RECURSO' => [self::RULE_REQUIRED],
        'DESCRIPCION_RECURSO' => [self::RULE_REQUIRED],
    ];
}


    public function attributes(): array
{
    return ['ID_LECCION','COD_RECURSO','NOMBRE_RECURSO','TIPO_RECURSO','DESCRIPCION_RECURSO'];
}

    


    
    
}
