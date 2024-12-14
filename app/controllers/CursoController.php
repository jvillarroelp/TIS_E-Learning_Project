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

    public function create(Request $request)
    {
        // Suponiendo que tienes el ID del rol almacenado en la sesión del usuario
        $roleId = Application::$app->session->get('user_role');  // Esto es un ejemplo, ajusta según tu lógica

        // Verificar si el usuario tiene permiso para crear cursos
        if (!DbModel::checkPermission($roleId, 'Crear curso')) {
            Application::$app->session->setFlash('error', 'No tienes permisos para crear cursos.');
            Application::$app->response->redirect('/');
            return;
        }

        // Si tiene el permiso, proceder con la creación del curso
        $curso = new CursoForm();
        if ($request->isPost()) {
            $curso->loadData($request->getBody());
            if ($curso->validate() && $curso->save()) {
                Application::$app->session->setFlash('success', 'Curso creado con éxito.');
                Application::$app->response->redirect('/');
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
