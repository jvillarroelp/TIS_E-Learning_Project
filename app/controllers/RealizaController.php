<?php

namespace app\controllers;

use app\core\Application;
use app\core\Controller;
use app\core\Request;
use app\core\Response;
use app\models\RolPermiso;
use app\models\Roles;
use app\models\Permisos;
use app\models\Realiza;
use app\models\CursoForm;
use app\models\Modulo;
use app\models\Estudiante;
use app\models\Leccion;

class RealizaController extends Controller
{
    // Método para asignar un permiso a un rol
    public function index(Request $request, Response $response)
    {
        // Obtener el COD_CURSO desde la URL
        $cod_curso = $request->getQueryParam('COD_CURSO');
        if (!$cod_curso) {
            Application::$app->response->redirect('/');
            return;
        }

        // Buscar los detalles del curso desde la base de datos
        $curso = CursoForm::findOne(['COD_CURSO' => $cod_curso]);
        if (!$curso) {
            echo 'Curso no encontrado.';
            exit();
        }

        // Obtener los módulos del curso utilizando la función personalizada `filtro`
        $modulos = Modulo::filtro('COD_CURSO', $cod_curso);

        // Verificar si hay módulos y pasar solo si existen
        if (!empty($modulos)) {
            // Extraer los IDs de los módulos para filtrar las lecciones
            $moduloIDs = array_map(fn($modulo) => $modulo->ID_MODULO, $modulos);

            // Construir una lista de lecciones asociadas a los módulos
            $lecciones = [];
            foreach ($moduloIDs as $idModulo) {
                $leccionesModulo = Leccion::filtro('ID_MODULO', $idModulo);
                $lecciones = array_merge($lecciones, $leccionesModulo);
            }
        } else {
            $modulos = null; // No pasar módulos si no existen
            $lecciones = null; // Tampoco lecciones
        }

        // Pasar los detalles del curso, módulos y lecciones a la vista
        return $this->render('realizaForm', [
            'curso' => $curso,
            'modulos' => $modulos,
            'lecciones' => $lecciones
        ]);
    }




    public function inscribirseCurso(Request $request, Response $response)
    {
        // Verificar si el usuario está autenticado
        if (!isset($_SESSION['user_id'])) {
            // Si no está logueado, redirigir al login
            Application::$app->response->redirect('/login');
            return;
        }

        // Obtener el ID del estudiante desde la sesión
        $estudianteID = $_SESSION['user_id'];
        $estudiante = Estudiante::findOne(['ID' => $estudianteID]);

        if (!$estudiante) {
            echo 'El estudiante no existe.';
            exit(); // Detener la ejecución si no existe el estudiante
        }

        // Crear una nueva instancia del modelo `Realiza`
        $realiza = new Realiza();

        // Obtener el COD_CURSO de los parámetros de la URL
        $codCurso = $request->getQueryParam('COD_CURSO');
        if ($codCurso) {
            $realiza->COD_CURSO = $codCurso; // Asignar el COD_CURSO al modelo
        } else {
            echo 'El código del curso no fue proporcionado.';
            exit(); // Detener la ejecución si no se proporciona el curso
        }

        // Si es una solicitud POST, procesar los datos
        if ($request->isPost()) {
            // Cargar los datos del formulario
            $realiza->loadData($request->getBody());

            // Asignar el ID del estudiante autenticado
            $realiza->ID = $estudiante->ID;

            // Validar y guardar los datos
            if ($realiza->validate() && $realiza->save()) {
                Application::$app->session->setFlash('success', 'Te has inscrito correctamente en el curso');
                return $response->redirect('/'); // Cambia a la ruta deseada después de inscribirse
            }
        }

        // Renderizar o manejar solicitudes no POST
        echo "No se pudo completar la inscripción.";
        exit();
    }
}
