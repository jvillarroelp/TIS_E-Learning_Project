<?php

namespace app\controllers;

use app\core\Application;
use app\core\Controller;
use app\core\Request;
use app\core\Response;
use app\models\Roles;

class RolesController extends Controller
{
    // Método para mostrar todos los roles
    public function index(Request $request, Response $response)
    {
        // Usar el método estático findAllRecords de Roles para obtener todos los roles
        $roles = Roles::findAllRecords();  // Recuperar todos los roles

        // Verificación: Muestra los roles obtenidos para depuración

        // Renderizar la vista 'roles-list' y pasar los roles obtenidos
        return $this->render('listRoles', [
            'roles' => $roles,
        ]);
    }

    // Método para crear un rol
    public function create(Request $request, Response $response)
    {
        $roles = new Roles();  // Crear una nueva instancia del modelo Roles

        // Si la solicitud es POST (cuando se envía el formulario)
        if ($request->isPost()) {
            $roles->loadData($request->getBody());  // Cargar los datos del formulario

            // Validar y guardar los datos
            if ($roles->validate() && $roles->save()) {
                Application::$app->session->setFlash('success', 'Rol guardado correctamente');
                // Redirigir a la página de roles o donde sea necesario
                return $response->redirect('/roles');  // Cambia esta ruta si es necesario
            }
        }

        // Si no es un POST (solicitud GET), simplemente renderiza el formulario vacío
        return $this->render('roles', [
            'model' => $roles,  // Pasamos el modelo para que esté disponible en la vista
        ]);
    }
    public function delete(Request $request, Response $response)
    {
        // Obtenemos el ID del permiso que se quiere eliminar desde la URL o del cuerpo de la solicitud
        $idRol = $request->getBody()['ID_ROL'] ?? null;

        if ($idRol) {
            // Buscar el permiso por ID
            $rol = Roles::findOne(['ID_ROL' => $idRol]);

            if ($rol) {
                // Si existe el permiso, procedemos a eliminarlo
                if ($rol->delete()) {
                    Application::$app->session->setFlash('success', 'Permiso eliminado correctamente');
                } else {
                    Application::$app->session->setFlash('error', 'No se pudo eliminar el permiso');
                }
            } else {
                Application::$app->session->setFlash('error', 'Permiso no encontrado');
            }
        } else {
            Application::$app->session->setFlash('error', 'ID de permiso inválido');
        }

        return $response->redirect('/listRoles');  // Redirigir a la lista de permisos
    }
    
}
