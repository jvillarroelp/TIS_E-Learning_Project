<?php

namespace app\controllers;

use app\core\Application;
use app\core\Controller;
use app\core\Request;
use app\core\Router;
use app\models\Curso;
use app\models\CursoForm;
use app\models\User;
use app\models\LoginForm;
use app\core\Response;
use app\core\DbModel;

/**
 * Controlador para la creación de los cursos
 */

class CursoController extends Controller
{

    public function create(Request $request, Response $response)
    {
        // Verificar si el usuario está autenticado
        if (Application::isGuest()) {
            // Si no está autenticado, redirigir al login
            Application::$app->session->setFlash('error', 'Por favor, inicia sesión para crear un curso.');
            $response->redirect('/login');
            return;
        }

        $curso = new CursoForm();

        if ($request->isPost()) {
            $curso->loadData($request->getBody());

            if ($curso->validate() && $curso->save()) {
                Application::$app->session->setFlash('success', 'Curso creado con éxito.');
                $response->redirect('/');
                return;
            }
        }

        return $this->render('curso/curso', ['model' => $curso]);
    }



    public function listar()
    {

        $cursos = CursoForm::findAllRecords();


        return $this->render('listar/listar', [
            'cursos' => $cursos
        ]);
    }
}
