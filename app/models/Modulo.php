<?php
namespace app\models;

use app\core\DbModel;

class Modulo extends DbModel
{
    public int $ID_MODULO;   // Auto incrementable, no lo necesitas asignar manualmente
    public int $COD_CURSO;    // Este campo debe ser inicializado adecuadamente
    public string $NOMBRE_MODULO = '';

    // Constructor para asegurarse de que las propiedades son inicializadas correctamente
    public function __construct()
    {
        $this->COD_CURSO = 0;  // Asegúrate de darle un valor por defecto si es necesario
    }

    public function loadData($data)
    {
        // Asignamos los datos del formulario al modelo
        $this->COD_CURSO = $data['COD_CURSO'] ?? 0;  // Usamos un valor por defecto si no existe en los datos
        $this->NOMBRE_MODULO = $data['NOMBRE_MODULO'] ?? '';
    }

    public function tableName(): string
    {
        return 'modulos'; // Nombre de la tabla
    }

    public function attributes(): array
    {
        return ['COD_CURSO', 'NOMBRE_MODULO']; // Atributos a insertar/actualizar
    }

    public function primaryKey(): string
    {
        return 'ID_MODULO';
    }


    public function rules(): array
    {
        return [
          'NOMBRE_MODULO' => [self::RULE_REQUIRED],
            'COD_CURSO' => [self::RULE_REQUIRED],   // Asegúrate de que la propiedad NOMBRE esté incluida en las reglas
        ];
    }
}
