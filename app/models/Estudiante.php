<?php

namespace app\models;

use app\core\DbModel;

class Estudiante extends User
{
    public int $USER_ID;

    public function tableName(): string
    {
        return 'estudiantes';  // Tabla de estudiantes
    }

    public function primaryKey(): string
    {
        return 'ID';  // Clave primaria de estudiantes
    }

    public function attributes(): array
    {
        return ['USER_ID'];  // Solo necesitamos el USER_ID
    }

    public function save()
    {
        // Guardamos el estudiante en la tabla 'estudiantes' con solo el USER_ID
        return parent::save();
    }
}
