<?php

namespace app\controllers;

use app\core\Controller;
use app\core\Request;
use app\core\Response;
use app\models\Leccion;
use app\core\Application;
use app\models\User;

class LeccionController extends Controller
{
    public function index(Request $request, Response $response)
    {
        // Verificar si el usuario está autenticado
        if (!isset($_SESSION['user_id'])) {
            Application::$app->response->redirect('/login');
            return;
        }

        // Obtener el rol del usuario desde la sesión
        $user = User::findOne(['ID' => $_SESSION['user_id']]);
        if ($user && $user->ID_ROL !== 2) { // Verificar que el rol sea de docente (suponiendo que 2 es docente)
            Application::$app->response->redirect('/');
            return;
        }

        // Recuperar todas las lecciones si es docente
        $lecciones = Leccion::findAllRecords();  // Recuperar todas las lecciones

        // Renderizar la vista 'listLecciones' y pasar las lecciones obtenidas
        return $this->render('listLecciones', [
            'lecciones' => $lecciones,
        ]);
    }

    public function create(Request $request, Response $response)
    {
        // Verificar si el usuario está autenticado
        if (!isset($_SESSION['user_id'])) {
            Application::$app->response->redirect('/login');
            return;
        }

        // Obtener el rol del usuario desde la sesión
        $user = User::findOne(['ID' => $_SESSION['user_id']]);
        if ($user && $user->ID_ROL !== 2) { // Verificar que el rol sea de docente
            Application::$app->response->redirect('/');
            return;
        }

        $lecciones = new Leccion();  // Crear una nueva instancia del modelo Leccion

        // Verificar si hay un 'ID_MODULO' en la URL
        $id_modulo = $request->getQueryParam('ID_MODULO');
        if ($id_modulo) {
            // Si existe, asignamos el ID_MODULO al modelo
            $lecciones->ID_MODULO = $id_modulo;
        }

        if ($request->isPost()) {
            $lecciones->loadData($request->getBody());  // Cargar los datos del formulario

            // Validar y guardar los datos
            if ($lecciones->validate() && $lecciones->save()) {
                Application::$app->session->setFlash('success', 'Lección guardada correctamente');
                return $response->redirect('/listLecciones');
            }
        }

        return $this->render('leccionForm', [
            'model' => $lecciones,  // Pasamos el modelo para que esté disponible en la vista
        ]);
    }
    
    public function delete(Request $request, Response $response)
    {
        // Obtenemos el ID del permiso que se quiere eliminar desde la URL o del cuerpo de la solicitud
        $idLeccion = $request->getBody()['ID_LECCION'] ?? null;

        if ($idLeccion) {
            // Buscar el permiso por ID
            $leccion =  Leccion::findOne(['ID_LECCION' => $idLeccion]);

            if ($leccion) {
                // Si existe el permiso, procedemos a eliminarlo
                if ($leccion->delete()) {
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

        return $response->redirect('/listLecciones');  // Redirigir a la lista de permisos
    }
}
