<?php
namespace app\models;

use app\core\DbModel;

class RolPermiso extends DbModel
{
    public int $ID_ROL;
    public int $ID_PERMISO;

    // Definir la tabla que utilizará este modelo
    public function tableName(): string
    {
        return 'rol_permisos';
    }

    // Definir los atributos de la tabla
    public function attributes(): array
    {
        return ['ID_ROL', 'ID_PERMISO'];
    }

    // Definir la clave primaria
    public function primaryKey(): string
    {
        return 'ID_ROL'; // Puedes modificar esto dependiendo de cómo configures la clave primaria
    }

    // Método para asignar un permiso a un rol
    public function assignPermission(int $rolId, int $permisoId): bool
    {
        $this->ID_ROL = $rolId;
        $this->ID_PERMISO = $permisoId;

        // Intentamos guardar la relación en la tabla rol_permisos
        return $this->save();  // Usa el método `save` de DbModel para insertar la relación
    }

    public function rules(): array
    {
        return [
            'ID_ROL' => [self::RULE_REQUIRED],
            'ID_PERMISO' => [self::RULE_REQUIRED],
          
        ];
    }

}
