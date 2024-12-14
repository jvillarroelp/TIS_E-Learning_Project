<?php
namespace app\controllers;

use app\core\Application;
use app\core\Controller;
use app\core\Request;
use app\core\Response;
use app\models\Docente;
use app\models\User; // Asegúrate de importar el modelo User

class DocenteController extends Controller
{
    public function create(Request $request, Response $response)
    {
        // Verificar si el usuario está autenticado
        if (!isset($_SESSION['user_id'])) {
            // Si no está autenticado, redirigir al login
            Application::$app->response->redirect('/login');
            return;
        }

        // Obtener el rol del usuario desde la sesión
        $user = User::findOne(['ID' => $_SESSION['user_id']]); // Obtener el usuario por ID
        if ($user && $user->ID_ROL !== 2) { // Asumiendo que 2 es el rol de docente
            // Si el rol no es docente, redirigir al home ("/")
            Application::$app->response->redirect('/');
            return;
        }

        // Si el usuario es docente, continuar con el proceso
        $docente = new Docente();
        $userID = $_SESSION['user_id']; // Obtener el ID del usuario de la sesión
        $docente->ID = $userID; // Asignar el ID al modelo Docente

        if ($request->isPost()) {
            // Cargar los datos del formulario
            $docente->loadData($request->getBody());

            // Validar y guardar los datos
            if ($docente->validate() && $docente->save()) {
                Application::$app->session->setFlash('success', 'Docente guardado correctamente');
                return $response->redirect('/');  // Redirigir a la página principal o lista de docentes
            }
        }

        return $this->render('docenteForm', [
            'model' => $docente,  // Pasamos el modelo a la vista
        ]);
    }
}
