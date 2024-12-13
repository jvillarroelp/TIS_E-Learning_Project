<?php

namespace app\Controllers;

use app\core\Application;
use app\core\Controller;
use app\core\Request;
use app\core\Response;
use app\models\Evaluacion;

class EvaluacionController extends Controller
{
    public function create(Request $request, Response $response)
    {
        $evaluacion = new Evaluacion();

        if ($request->isPost()) {
            $evaluacion->loadData($request->getBody());

            // Validar y guardar los datos
            if ($evaluacion->validate() && $evaluacion->save()) {
                Application::$app->session->setFlash('success', 'Evaluación guardada correctamente');
                $response->redirect('/evaluacion');
                return;
            }
        }

        return $this->render('evaluacionForm', [
            'model' => $evaluacion,
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
