<?php
namespace app\controllers;

use app\core\Application;
use app\core\Controller;
use app\core\Request;
use app\core\Response;
use app\models\Contenido;
use app\models\User;

class ContenidoController extends Controller
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

        $contenidos = new Contenido();  // Crear una nueva instancia del modelo Contenido

        // Verificar si hay un 'ID_LECCION' en la URL
        $idLeccion = $request->getQueryParam('ID_LECCION');
        if ($idLeccion) {
            // Si existe, asignamos el ID_LECCION al modelo
            $contenidos->ID_LECCION = $idLeccion;
        }

        if ($request->isPost()) {
            $contenidos->loadData($request->getBody());  // Cargar los datos del formulario

            // Validar y guardar los datos
            if ($contenidos->validate() && $contenidos->save()) {
                Application::$app->session->setFlash('success', 'Módulo guardado correctamente');
                return $response->redirect('/listLecciones');
            }
        }

        return $this->render('contenidoForm', [
            'model' => $contenidos,  // Pasamos el modelo para que esté disponible en la vista
        ]);
    }
}

