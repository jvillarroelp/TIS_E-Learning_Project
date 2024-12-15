<?php

namespace app\controllers;

use app\core\Controller;
use app\core\Request;
use app\core\Response;
use app\models\Leccion;
use app\core\Application;
use app\models\CursoForm;
use app\models\Modulo;
use app\models\User;
use app\models\Realiza;

class TableroController extends Controller
{
    public function tablero(Request $request, Response $response)
    {
        // Verificar si el usuario está autenticado
        if (!isset($_SESSION['user_id'])) {
            Application::$app->response->redirect('/login');
            return;
        }

        // Obtener el ID del usuario desde la sesión
        $userId = $_SESSION['user_id'];

        // Usar la función filtro para obtener los registros de la tabla 'Realiza' donde el 'ID' coincida con el usuario
        $cursos = Realiza::filtro('ID', $userId);

        if (!$cursos) {
            echo 'No tienes cursos inscritos.';
            exit();
        }

        // Crear un array para almacenar los detalles de los cursos
        $detalleCursos = [];

        // Recorrer los registros de cursos en la tabla Realiza
        foreach ($cursos as $curso) {
            // Obtener el detalle del curso desde la tabla CursoForm usando el COD_CURSO
            $cursoDetalles = CursoForm::findOne(['COD_CURSO' => $curso->COD_CURSO]);

            // Si el curso existe, agregarlo a la lista de detalles
            if ($cursoDetalles) {
                $detalleCursos[] = $cursoDetalles;
            }
        }

        // Pasar los detalles de los cursos a la vista
        return $this->render('tablero', [
            'cursos' => $detalleCursos
        ]);
    }
}
