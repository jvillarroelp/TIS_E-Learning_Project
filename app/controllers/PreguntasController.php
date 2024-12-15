<?php

namespace app\controllers;

use app\core\Controller;
use app\core\Request;
use app\models\Pregunta;
use app\core\Application;
use app\core\Router;
use app\core\Response;
use app\models\Docente;
use app\models\User;
use app\models\Estudiante;

class PreguntasController extends Controller
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
        if ($user && !in_array($user->ID_ROL, [2, 3])) { // Verificar que el rol sea 2 (docente) o 3
            Application::$app->session->setFlash('error', 'No tienes permiso para acceder a esta página.');
            return Application::$app->response->redirect('/');
        }
    
        // Obtener el ID del docente desde la sesión
        $docenteID = $_SESSION['user_id'];
    
        // Verificar si el docente existe en la base de datos
        $docente = Docente::findOne(['ID' => $docenteID]);
        if (!$docente) {
            echo 'El docente no existe.';
            exit();  // Detener la ejecución
        }
    
        // Crear una nueva instancia del modelo Evaluacion
        $pregunta = new Pregunta;
    
        // Verificar si hay un 'COD_CURSO' en la URL
        $cod_evaluacion = $request->getQueryParam('COD_EVALUACION');
        if ($cod_evaluacion) {
            // Si existe, asignamos el COD_CURSO al modelo
            $pregunta->COD_EVALUACION = $cod_evaluacion;
        } else {
            echo 'El código del curso no fue proporcionado.';
            exit();  // Detener la ejecución
        }
    
        // Si es una solicitud POST, procesar el formulario
        if ($request->isPost()) {
            $pregunta->loadData($request->getBody());  // Cargar los datos del formulario
    
            // Asignar el ID del docente autenticado
            $pregunta->ID = $docente->ID;
    
            // Validar y guardar los datos
            if ($pregunta->validate() && $pregunta->save()) {
                Application::$app->session->setFlash('success', 'Evaluación creada correctamente');
                return $response->redirect('/'); // Cambia a la ruta deseada
            }
        }
    
        // Renderizar el formulario de evaluación
        return $this->render('preguntasForm', [
            'model' => $pregunta,  // Pasamos el modelo a la vista
        ]);
    }

    public function index(Request $request, Response $response)
    {
        // Usar el método estático findAllRecords de Roles para obtener todos los roles
        $preguntas = Pregunta::findAllRecords();  

       

        // Verificación: Muestra los roles obtenidos para depuración

        // Renderizar la vista 'roles-list' y pasar los roles obtenidos
        return $this->render('listPreguntas', [
            'preguntas' => $preguntas,
           
        ]);
    }



    


    

   
}
