<?php
namespace app\controllers;

use app\core\Application;
use app\core\Controller;
use app\core\Request;
use app\core\Response;
use app\models\Estudiante;
use app\models\User; // Asegúrate de importar el modelo User

class EstudianteController extends Controller
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
        if ($user && $user->ID_ROL !== 3) { // Asumiendo que 3 es el rol de estudiante
            // Si el rol no es estudiante, redirigir al home ("/")
            Application::$app->response->redirect('/');
            return;
        }

        // Si el usuario es estudiante, continuar con el proceso
        $estudiante = new Estudiante();
        $userID = $_SESSION['user_id']; // Obtener el ID del usuario de la sesión
        $estudiante->ID = $userID; // Asignar el ID al modelo Estudiante

        if ($request->isPost()) {
            // Cargar los datos del formulario
            $estudiante->loadData($request->getBody());

            // Validar y guardar los datos
            if ($estudiante->validate() && $estudiante->save()) {
                Application::$app->session->setFlash('success', 'Estudiante guardado correctamente');
                return $response->redirect('/');  // Redirigir a la página principal o lista de estudiantes
            }
        }

        return $this->render('estudianteForm', [
            'model' => $estudiante,  // Pasamos el modelo a la vista
        ]);
    }


    
}
