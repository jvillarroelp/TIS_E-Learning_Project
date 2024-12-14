<?php
namespace app\models;

use app\core\DbModel;

class Docente extends DbModel
{
    public string $ID;           // ID del usuario (usuario autenticado)
    public string $ESPECIALIDAD = ''; // Número de teléfono del estudiante

    // Nombre de la tabla en la base de datos
    public function tableName(): string
    {
        return 'docente'; // Nombre de la tabla de estudiantes en tu base de datos
    }

    // Nombre de la clave primaria
    public function primaryKey(): string
    {
        return 'ID'; // La clave primaria es 'ID' en la tabla estudiantes
    }

    // Reglas de validación
    public function rules(): array
    {
        return [
            'ID' => [self::RULE_REQUIRED],  // Asegurarse de que ID esté presente
            'ESPECIALIDAD' => [self::RULE_REQUIRED],  // Validación para el teléfono
        ];
    }

    // Los atributos que se pueden cargar
    public function attributes(): array
    {
        return ['ID', 'ESPECIALIDAD'];  // Los campos que se pueden asignar en la base de datos
    }

    // Aquí puedes agregar otros métodos que necesites para el modelo
}
