<?php

namespace app\Controllers;
use app\core\Application;
use app\core\Controller;

use app\core\Request;use app\core\Router;
use app\models\Evaluacion;
use app\models\LoginForm;
use app\core\Response;


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
}
