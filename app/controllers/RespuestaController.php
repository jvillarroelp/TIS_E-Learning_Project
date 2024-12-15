<?php

namespace app\controllers;

use app\core\Controller;
use app\core\Request;
use app\models\Pregunta;
use app\core\Application;
use app\core\Router;
use app\core\Response;
use app\models\Estudiante;
use app\models\User;
use app\models\Respuesta;

class RespuestaController extends Controller
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
        if ($user && $user->ID_ROL !== 3) { // Verificar que el rol sea de docente (suponiendo que 2 es docente)
            Application::$app->response->redirect('/');
            return;
        }
    
        // Obtener el ID del docente desde la sesión
        $estudianteID = $_SESSION['user_id'];
    
        // Verificar si el docente existe en la base de datos
        $estudiante = Estudiante::findOne(['ID' => $estudianteID]);
        if (!$estudiante) {
            echo 'El estudiante no existe.';
            exit();  // Detener la ejecución
        }
    
        // Crear una nueva instancia del modelo Evaluacion
        $respuesta = new Respuesta;
    
        // Verificar si hay un 'COD_CURSO' en la URL
        $id_pregunta = $request->getQueryParam('ID_PREGUNTA');
        if ($id_pregunta) {
            // Si existe, asignamos el COD_CURSO al modelo
            $respuesta->ID_PREGUNTA = $id_pregunta;
        } else {
            echo 'El código del curso no fue proporcionado.';
            exit();  // Detener la ejecución
        }
    
        // Si es una solicitud POST, procesar el formulario
        if ($request->isPost()) {
            $respuesta->loadData($request->getBody());  // Cargar los datos del formulario
    
            // Asignar el ID del docente autenticado
            $respuesta->ID = $estudiante->ID;
    
            // Validar y guardar los datos
            if ($respuesta->validate() && $respuesta->save()) {
                Application::$app->session->setFlash('success', 'Evaluación creada correctamente');
                return $response->redirect('/'); // Cambia a la ruta deseada
            }
        }
    
        // Renderizar el formulario de evaluación
        return $this->render('respuestaForm', [
            'model' => $respuesta,  // Pasamos el modelo a la vista
        ]);
    }


    

   
}
