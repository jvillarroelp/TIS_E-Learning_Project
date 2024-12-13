<?php

namespace app\controllers;

use app\core\Controller;
use app\core\Request;
use app\models\Pregunta;
use app\core\Application;
use app\core\Router;

class PreguntasController extends Controller
{
    public function create(Request $request)
    {
        $pregunta = new Pregunta();
        if ($request->isPost()) {
            $pregunta->loadData($request->getBody());

            if ($pregunta->validate() && $pregunta->save()) {
                Application::$app->response->redirect('/preguntas');
                return;
            }
        }

        return $this->render('preguntas', [
            'model' => $pregunta
        ]);
    }

    public function index()
    {
        // Usar findAllRecords() en lugar de findAll()
        $preguntas = Pregunta::findAllRecords();
        return $this->render('preguntas/index', [
            'preguntas' => $preguntas
        ]);
    }
}
