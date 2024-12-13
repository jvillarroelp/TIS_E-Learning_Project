<?php

namespace app\models;


use app\core\DbModel;

class Contenido extends DbModel
{
   
    public string $ID_LECCION;
    public string $TITULO_CONTENIDO = '';
    public string $SUB_TITULO = '';
    public string $CUERPO_CONTENIDO = '';
    public string $CREACION_CONTENIDO = '';

    public function tableName(): string
    {
        return 'contenido'; 
    }

    public function primaryKey(): string
    {
        return 'ID_CONTENIDO'; 
    }

    public function rules(): array
    {
        return [
            'ID_LECCION' => [self::RULE_REQUIRED], 
            'TITULO_CONTENIDO' => [self::RULE_REQUIRED], 
            'SUB_TITULO' => [self::RULE_REQUIRED],
            'CUERPO_CONTENIDO' => [self::RULE_REQUIRED],
            'CREACION_CONTENIDO' => [self::RULE_REQUIRED],

        ];
    }

    public function attributes(): array
    {
        return ['ID_LECCION','TITULO_CONTENIDO','SUB_TITULO','CUERPO_CONTENIDO','CREACION_CONTENIDO'];
    }
    


    
    
}
