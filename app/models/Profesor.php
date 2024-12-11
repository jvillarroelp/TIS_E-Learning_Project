<?php 
namespace app\models;

use app\core\DbModel;

class Profesor extends DbModel
{
    public int $ID;
    public string $ESPECIALIDAD = '';  // Atributo especialidad

    public function tableName(): string
    {
        return 'docente';  // Nombre de la tabla
    }

    public function primaryKey(): string
    {
        return 'ID';  // Clave primaria de la tabla
    }

    // Implementa reglas de validación específicas para Profesor
    public function rules(): array
    {
        return [
            'ESPECIALIDAD' => [self::RULE_REQUIRED],  // Validación de 'ESPECIALIDAD' como requerido
        ];
    }

    // Define los atributos que quieres guardar en la base de datos
    public function attributes(): array
    {
        return ['ESPECIALIDAD'];
    }

    // Define las etiquetas para mostrar en los formularios
    public function labels(): array
    {
        return [
            'ESPECIALIDAD' => 'Especialidad',
        ];
    }
}
