<?php

namespace app\controllers;

use app\core\Application;
use app\core\Controller;
use app\core\Request;
use app\core\Response;
use app\models\CursoForm;
use app\core\DbModel;

class CursoController extends Controller
{
    public function create(Request $request, Response $response)
    {
        // Verificar si el usuario está autenticado
        if (Application::isGuest()) {
            Application::$app->session->setFlash('error', 'Por favor, inicia sesión para crear un curso.');
            $response->redirect('/login');
            return;
        }
    
        // Obtener el ID del rol del usuario desde la sesión
        $roleId = $_SESSION['user_role'];  // Suponiendo que el rol se almacena en la sesión
    
        // Verificar si el usuario tiene permiso para crear cursos
        if (!DbModel::checkPermission($roleId, 'Crear curso')) {
            Application::$app->session->setFlash('error', 'No tienes permisos para crear cursos.');
            $response->redirect('/');  // Redirigir a la página de inicio si no tiene permisos
            return;
        }
    
        // El resto de la lógica para crear el curso
        $curso = new CursoForm();
        if ($request->isPost()) {
            $curso->loadData($request->getBody());
    
            if ($curso->validate() && $curso->save()) {
                Application::$app->session->setFlash('success', 'Curso creado con éxito.');
                $response->redirect('/listar');  // O la página que prefieras
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
