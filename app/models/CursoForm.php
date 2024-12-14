<?php

namespace app\models;

use app\core\DbModel;

/**
 * Modelo para manejar los cursos en la plataforma
 * 
 * @package app/models
 */
class CursoForm extends DbModel
{
    public int $ID;
    public int $COD_CURSO = 0;
    public string $NOMBRE_CURSO = '';
    public string $FECHA_INICIO = '';
    public string $FECHA_FIN = '';
    public string $ESTADO = '';
    public string $DESCRIPCION_CURSO = '';

    public function tableName(): string
    {
        return 'curso'; // Nombre de la tabla en la base de datos
    }

    public function primaryKey(): string
    {
        return 'COD_CURSO';
    }

    public function attributes(): array
    {
        return ['COD_CURSO','ID', 'NOMBRE_CURSO', 'FECHA_INICIO', 'FECHA_FIN', 'ESTADO', 'DESCRIPCION_CURSO'];
    }

    public function rules(): array
    {
        return [
            'COD_CURSO' => [self::RULE_REQUIRED],

            'NOMBRE_CURSO' => [self::RULE_REQUIRED],
            'FECHA_INICIO' => [self::RULE_REQUIRED],
            'FECHA_FIN' => [self::RULE_REQUIRED],
            'ESTADO' => [self::RULE_REQUIRED],
            'DESCRIPCION_CURSO' => [self::RULE_REQUIRED],
            'ID' => [self::RULE_REQUIRED],
        ];
    }

    public function labels(): array
    {
        return [
            'NOMBRE_CURSO' => 'Nombre del Curso',
            'FECHA_INICIO' => 'Fecha de Inicio',
            'FECHA_FIN' => 'Fecha de Fin',
            'ESTADO' => 'Estado',
            'DESCRIPCION_CURSO' => 'Descripción del Curso',
        ];
    }
}
