<?php

namespace app\core;

use app\models\User;

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

    public function update(): bool
    {
        $tableName = $this->tableName(); // Obtener nombre de la tabla
        $attributes = $this->attributes(); // Obtener atributos de la tabla
        $primaryKey = $this->primaryKey(); // Obtener la clave primaria

        // Preparamos los campos para la actualización
        $set = implode(", ", array_map(fn($attr) => "$attr = :$attr", $attributes));

        // Aquí asumimos que el valor de la clave primaria es un atributo de la clase
        $primaryKeyValue = $this->{$primaryKey};  // Suponiendo que el valor de la clave primaria está en el objeto

        // Preparamos la sentencia SQL
        $sql = "UPDATE $tableName SET $set WHERE $primaryKey = :primaryKey";
        $statement = self::prepare($sql);

        // Vinculamos los valores
        foreach ($attributes as $attribute) {
            $statement->bindValue(":$attribute", $this->{$attribute});
        }

        // Vinculamos el valor de la clave primaria
        $statement->bindValue(":primaryKey", $primaryKeyValue);

        // Ejecutamos la consulta de actualización
        $statement->execute();

        return true;
    }

    public function delete(): bool
    {
        $tableName = $this->tableName(); // Obtener el nombre de la tabla
        $primaryKey = $this->primaryKey(); // Obtener la clave primaria

        // Obtener el valor de la clave primaria del objeto
        $primaryKeyValue = $this->{$primaryKey};

        // Preparar la sentencia SQL de eliminación
        $sql = "DELETE FROM $tableName WHERE $primaryKey = :primaryKey";

        // Preparar la sentencia
        $statement = self::prepare($sql);

        // Vincular el valor de la clave primaria
        $statement->bindValue(":primaryKey", $primaryKeyValue);

        // Ejecutar la consulta de eliminación
        $result = $statement->execute();

        return $result;
    }





    public static function prepare($sql)
    {
        return Application::$app->db->pdo->prepare($sql);
    }

    public static function checkPermission($roleId, $accion)
    {
        // Consulta SQL para verificar el permiso
        $sql = "SELECT p.ID_PERMISO
                FROM permisos p
                JOIN rol_permisos rp ON rp.ID_PERMISO = p.ID_PERMISO
                JOIN roles r ON rp.ID_ROL = r.ID_ROL
                WHERE r.ID_ROL = :role_id AND p.NOMBRE_PERMISO = :accion";

        // Preparar la consulta
        $statement = Application::$app->db->pdo->prepare($sql);
        $statement->bindValue(":role_id", $roleId);
        $statement->bindValue(":accion", $accion);  // El nombre del permiso, por ejemplo 'Crear curso'
        $statement->execute();

        // Si existe un permiso para ese rol, se devuelve true, de lo contrario, false
        $result = $statement->fetch(\PDO::FETCH_ASSOC);
        return $result ? true : false;
    }


    public static function filtro($campo, $valor): array
    {
        // Instanciar el modelo (para la clase hija que la llama)
        $model = new static();

        // Obtener el nombre de la tabla desde la instancia de la clase
        $tableName = $model->tableName();

        // Construir la consulta SQL para filtrar por el campo y valor proporcionado
        $sql = "SELECT * FROM $tableName WHERE $campo = :valor";

        // Preparar la consulta
        $statement = Application::$app->db->pdo->prepare($sql);

        // Asociar el valor del campo al parámetro en la consulta
        $statement->bindValue(":valor", $valor);

        // Ejecutar la consulta
        $statement->execute();

        // Retornar los registros como objetos de la clase que llama el método
        return $statement->fetchAll(\PDO::FETCH_CLASS, static::class);
    }




    public static function isStudent(): bool
    {
        if (!isset($_SESSION['user_id'])) {
            return false;  // No está autenticado
        }

        // Verificar si el usuario tiene un registro en la tabla ESTUDIANTE
        $userId = $_SESSION['user_id'];
        $sql = "SELECT * FROM ESTUDIANTE WHERE ID = :user_id";
        $statement = Application::$app->db->pdo->prepare($sql);
        $statement->bindValue(':user_id', $userId);
        $statement->execute();

        // Si encuentra un registro en la tabla ESTUDIANTE, es estudiante
        return $statement->fetch() ? true : false;
    }

    public static function isTeacher(): bool
    {
        if (!isset($_SESSION['user_id'])) {
            return false;  // No está autenticado
        }

        // Verificar si el usuario tiene un registro en la tabla DOCENTE
        $userId = $_SESSION['user_id'];
        $sql = "SELECT * FROM DOCENTE WHERE ID = :user_id";
        $statement = Application::$app->db->pdo->prepare($sql);
        $statement->bindValue(':user_id', $userId);
        $statement->execute();

        // Si encuentra un registro en la tabla DOCENTE, es docente
        return $statement->fetch() ? true : false;
    }
}



