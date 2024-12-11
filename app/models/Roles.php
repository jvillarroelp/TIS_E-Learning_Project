<?php
namespace app\models;

use app\core\DbModel;
use app\core\Application;
class Role extends DbModel
{
    public int $ID = 0;
    public string $NOMBRE = '';

    public function tableName(): string
    {
        return 'roles';
    }

    public function primaryKey(): string
    {
        return 'ID';
    }

    public function attributes(): array
    {
        return ['NOMBRE'];
    }

    // Método para obtener los permisos de un rol
  
    public function rules(): array
    {
        return [
          
            'NOMBRE_ROL' => [self::RULE_REQUIRED],
            


        ];
    }
}
