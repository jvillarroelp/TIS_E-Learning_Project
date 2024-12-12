<?php

namespace app\controllers;

use app\core\Application;
use app\core\Controller;
use app\core\Request;
use app\core\Response;
use app\models\RolPermiso;
use app\models\Roles;
use app\models\Permisos;

class RolPermisoController extends Controller
{
    // Método para asignar un permiso a un rol
    public function assignPermission(Request $request, Response $response)
    {
        $rolId = $request->getBody()['ID_ROL'] ?? null;
        $permisoId = $request->getBody()['ID_PERMISO'] ?? null;

        // Verificamos que los IDs no estén vacíos
        if ($rolId && $permisoId) {
            // Instanciamos el modelo RolPermiso para guardar la relación
            $rolPermiso = new RolPermiso();

            // Asignamos el permiso al rol
            if ($rolPermiso->assignPermission($rolId, $permisoId)) {
                Application::$app->session->setFlash('success', 'Permiso asignado correctamente');
            } else {
                Application::$app->session->setFlash('error', 'No se pudo asignar el permiso');
            }
        } else {
            Application::$app->session->setFlash('error', 'ID de rol o permiso inválido');
        }

        return $response->redirect('/listRoles');
    }
}
