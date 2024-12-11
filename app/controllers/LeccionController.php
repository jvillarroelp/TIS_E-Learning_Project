<?php

namespace app\controllers;

use app\core\Controller;
use app\core\Request;
use app\core\Response;
use app\models\Leccion;
use app\core\Application;

class LeccionController extends Controller
{
    public function create(Request $request, Response $response)
    {
        $leccion = new Leccion();

        if ($request->isPost()) {
            $leccion->loadData($request->getBody());

            // Validar y guardar los datos
            if ($leccion->validate() && $leccion->save()) {
                Application::$app->session->setFlash('success', 'Lección guardada correctamente');
                $response->redirect('/lecciones'); // Redirige al listado o donde sea necesario
                return;
            }
        }

        return $this->render('leccionForm', [
            'model' => $leccion,
        ]);
    }
}
