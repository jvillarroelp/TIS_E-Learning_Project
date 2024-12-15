<?php

namespace app\Controllers;

use app\core\Application;
use app\core\Controller;
use app\core\Request;
use app\core\Response;
use app\models\Evaluacion;
use app\models\User;
use app\models\Docente;
use app\models\CursoForm;

class EvaluacionController extends Controller
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
    
        // Obtener el ID del docente desde la sesión
        $docenteID = $_SESSION['user_id'];
    
        // Verificar si el docente existe en la base de datos
        $docente = Docente::findOne(['ID' => $docenteID]);
        if (!$docente) {
            echo 'El docente no existe.';
            exit();  // Detener la ejecución
        }
    
        // Crear una nueva instancia del modelo Evaluacion
        $evaluacion = new Evaluacion();
    
        // Verificar si hay un 'COD_CURSO' en la URL
        $cod_curso = $request->getQueryParam('COD_CURSO');
        if ($cod_curso) {
            // Si existe, asignamos el COD_CURSO al modelo
            $evaluacion->COD_CURSO = $cod_curso;
        } else {
            echo 'El código del curso no fue proporcionado.';
            exit();  // Detener la ejecución
        }
    
        // Si es una solicitud POST, procesar el formulario
        if ($request->isPost()) {
            $evaluacion->loadData($request->getBody());  // Cargar los datos del formulario
    
            // Asignar el ID del docente autenticado
            $evaluacion->ID = $docente->ID;
    
            // Validar y guardar los datos
            if ($evaluacion->validate() && $evaluacion->save()) {
                Application::$app->session->setFlash('success', 'Evaluación creada correctamente');
                return $response->redirect('/'); // Cambia a la ruta deseada
            }
        }
    
        // Renderizar el formulario de evaluación
        return $this->render('evaluacionForm', [
            'model' => $evaluacion,  // Pasamos el modelo a la vista
        ]);
    }
    
    
    

    // Método para mostrar la lista de evaluaciones
    public function index(Request $request, Response $response)
    {
        // Obtener todas las evaluaciones desde el modelo
        $evaluaciones = Evaluacion::findAllRecords();

        // Renderizar la vista con la lista de evaluaciones
        return $this->render('/listEvaluacion', [
            'evaluaciones' => $evaluaciones,
        ]);
    }
}
