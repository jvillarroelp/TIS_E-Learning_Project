<?php

namespace app\core;

abstract class DbModel extends Model
{

    abstract public function tableName(): string;

    abstract public function attributes(): array;

    abstract public function primaryKey(): string;

    public function save()
    {

        $tableName = $this->tableName();
        $attributes = $this->attributes();
        $params = array_map(fn($attr) => ":$attr", $attributes);
        $statement = self::prepare("INSERT INTO $tableName (" . implode(',', $attributes) . ")

        VALUES(" . implode(',', $params) . ")");
        foreach ($attributes as $attribute) {
            $statement->bindValue(":$attribute", $this->{$attribute});
        }
        $statement->execute();
        return true;
    }

    public static function findOne($where)
    {
        $model = new static();  // Usar static para la clase hija
        $tableName = $model->tableName();  // Llamar a tableName de una instancia
        $attributes = array_keys($where);

        $sql = implode(" AND ", array_map(fn($attr) => "$attr = :$attr", $attributes));
        $statement = self::prepare("SELECT * FROM $tableName WHERE $sql");

        foreach ($where as $key => $item) {
            $statement->bindValue(":$key", $item);
        }

        $statement->execute();

        // Asegúrate de devolver null si no se encuentra ningún registro
        $result = $statement->fetchObject(static::class);
        return $result ?: null;
    }
    public static function findAllRecords(): array
    {
        // Crear una instancia de la clase hija (Roles)
        $model = new static();  // Usar `static` para que se instancie la clase hija

        // Obtener el nombre de la tabla desde la instancia de la clase
        $tableName = $model->tableName();  // Llamar al método no estático `tableName()`

        // Ejecutar la consulta para obtener todos los registros
        $sql = "SELECT * FROM $tableName";
        $statement = Application::$app->db->pdo->prepare($sql);
        $statement->execute();

        // Retornar todos los registros como objetos de la clase que llama el método
        return $statement->fetchAll(\PDO::FETCH_CLASS, static::class);
    }


    public static function prepare($sql)
    {
        return Application::$app->db->pdo->prepare($sql);
    }
}
