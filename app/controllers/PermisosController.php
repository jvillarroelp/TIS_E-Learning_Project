<?php

namespace app\controllers;

use app\core\Application;
use app\core\Controller;
use app\core\Request;
use app\core\Response;
use app\models\Roles;
use app\models\Permisos;

class PermisosController extends Controller
{
    public function create(Request $request, Response $response)
    {
        $permisos = new Permisos();  // Crear una nueva instancia del modelo Roles

        // Si la solicitud es POST (cuando se envía el formulario)
        if ($request->isPost()) {
            $permisos->loadData($request->getBody());  // Cargar los datos del formulario

            // Validar y guardar los datos
            if ($permisos->validate() && $permisos->save()) {
                Application::$app->session->setFlash('success', 'Rol guardado correctamente');
                // Redirigir a la página de roles o donde sea necesario
                return $response->redirect('/permisos');  // Cambia esta ruta si es necesario
            }
        }

        // Si no es un POST (solicitud GET), simplemente renderiza el formulario vacío
        return $this->render('permisos', [
            'model' => $permisos,  // Pasamos el modelo para que esté disponible en la vista
        ]);
    }
    // Método para mostrar todos los roles
    public function index(Request $request, Response $response)
    {
        // Usar el método estático findAllRecords de Roles para obtener todos los roles
        $permisos = Permisos::findAllRecords();  // Recuperar todos los roles

        // Verificación: Muestra los roles obtenidos para depuración

        // Renderizar la vista 'roles-list' y pasar los roles obtenidos
        return $this->render('listPermisos', [
            'permisos' => $permisos,
        ]);
    }
    // En el controlador PermisosController
    public function delete(Request $request, Response $response)
    {
        // Obtenemos el ID del permiso que se quiere eliminar desde la URL o del cuerpo de la solicitud
        $idPermiso = $request->getBody()['ID_PERMISO'] ?? null;

        if ($idPermiso) {
            // Buscar el permiso por ID
            $permiso = Permisos::findOne(['ID_PERMISO' => $idPermiso]);

            if ($permiso) {
                // Si existe el permiso, procedemos a eliminarlo
                if ($permiso->delete()) {
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

        return $response->redirect('/listPermisos');  // Redirigir a la lista de permisos
    }
}
