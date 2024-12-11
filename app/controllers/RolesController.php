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
        $roles = new Roles();

        if ($request->isPost()) {
            $roles->loadData($request->getBody());

            // Validar y guardar los datos
            if ($roles->validate() && $roles->save()) {
                Application::$app->session->setFlash('success', 'Rol guardado correctamente');
                $response->redirect('/listRoles');
                return;
            }
        }
    }
}
