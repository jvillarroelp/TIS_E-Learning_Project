<?php

namespace app\controllers;

use app\core\Application;
use app\core\Controller;
use app\core\Request;
use app\core\Response;
use app\models\Recurso;
use app\models\User;

class RecursosController extends Controller
{
    public function create(Request $request, Response $response)
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

        $recursos = new Recurso();  // Crear una nueva instancia del modelo Recurso

        // Verificar si hay un 'ID_LECCION' en la URL
        $idLeccion = $request->getQueryParam('ID_LECCION');
        if ($idLeccion) {
            // Si existe, asignamos el ID_LECCION al modelo
            $recursos->ID_LECCION = $idLeccion;
        }

        if ($request->isPost()) {
            $recursos->loadData($request->getBody());  // Cargar los datos del formulario

            // Validar y guardar los datos
            if ($recursos->validate() && $recursos->save()) {
                Application::$app->session->setFlash('success', 'Recurso guardado correctamente');
                return $response->redirect('/listRecursos');
            }
        }

        return $this->render('recursoForm', [
            'model' => $recursos,  // Pasamos el modelo para que esté disponible en la vista
        ]);
    }

    public function index(Request $request, Response $response)
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

        // Obtener todos los recursos si el usuario es docente
        $recursos = Recurso::findAllRecords();

        // Renderizar la vista 'listRecursos' y pasar los recursos obtenidos
        return $this->render('listRecursos', [
            'recursos' => $recursos,
        ]);
    }
}
