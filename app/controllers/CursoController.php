<?php

namespace app\controllers;

use app\core\Application;
use app\core\Controller;
use app\core\Request;
use app\core\Response;
use app\models\CursoForm;
use app\models\User;
use app\models\Docente;

class CursoController extends Controller
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

        // Si el docente no existe, mostrar un mensaje y detener la ejecución
        if (!$docente) {
            echo 'El docente no existe.';
            exit();  // Detiene la ejecución del código
        }

        // Crear una nueva instancia de CursoForm
        $curso = new CursoForm();

        // Si es una solicitud POST, cargar los datos y guardar
        if ($request->isPost()) {
            // Cargar los datos del formulario en el modelo
            $curso->loadData($request->getBody());

            // Asignar el ID del docente al curso
            $curso->ID = $docente->ID;

            // Validar y guardar el curso
            if ($curso->validate() && $curso->save()) {
                Application::$app->session->setFlash('success', 'Curso creado correctamente');
                Application::$app->response->redirect('/'); // Redirigir a la lista de cursos
                return;
            }
        }

        // Solo necesitas pasar el modelo de curso, no la lista de docentes
        return $this->render('curso/curso', [
            'model' => $curso,
        ]);
    }






    public function listar()
    {
        $cursos = CursoForm::findAllRecords();

        return $this->render('listar/listar', [
            'cursos' => $cursos
        ]);
    }
}
