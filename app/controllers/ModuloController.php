<?php
namespace app\controllers;

use app\core\Application;
use app\core\Controller;
use app\core\Request;
use app\core\Response;
use app\models\Modulo;
use app\models\User;

class ModuloController extends Controller
{
    public function index(Request $request, Response $response)
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

        // Recuperar todos los módulos si es docente
        $modulos = Modulo::findAllRecords();

        // Renderizar la vista 'listModulos' y pasar los módulos obtenidos
        return $this->render('listModulos', [
            'modulos' => $modulos,
        ]);
    }

    public function create(Request $request, Response $response)
    {
        // Verificar si el usuario está autenticado
        if (!isset($_SESSION['user_id'])) {
            Application::$app->response->redirect('/login');
            return;
        }

        // Obtener el rol del usuario desde la sesión
        $user = User::findOne(['ID' => $_SESSION['user_id']]);
        if ($user && $user->ID_ROL !== 2) { // Verificar que el rol sea de docente
            Application::$app->response->redirect('/');
            return;
        }

        $modulos = new Modulo();  // Crear una nueva instancia del modelo Modulo

        // Verificar si hay un 'COD_CURSO' en la URL
        $codCurso = $request->getQueryParam('COD_CURSO');
        if ($codCurso) {
            // Si existe, asignamos el COD_CURSO al modelo
            $modulos->COD_CURSO = $codCurso;
        }

        if ($request->isPost()) {
            $modulos->loadData($request->getBody());  // Cargar los datos del formulario

            // Validar y guardar los datos
            if ($modulos->validate() && $modulos->save()) {
                Application::$app->session->setFlash('success', 'Módulo guardado correctamente');
                return $response->redirect('/listModulos');
            }
        }

        return $this->render('moduloForm', [
            'model' => $modulos,  // Pasamos el modelo para que esté disponible en la vista
        ]);
    }

    public function delete(Request $request, Response $response)
    {
        // Obtenemos el ID del permiso que se quiere eliminar desde la URL o del cuerpo de la solicitud
        $idModulo = $request->getBody()['ID_MODULO'] ?? null;

        if ($idModulo) {
            // Buscar el permiso por ID
            $modulo = Modulo::findOne(['ID_MODULO' => $idModulo]);

            if ($modulo) {
                // Si existe el permiso, procedemos a eliminarlo
                if ($modulo->delete()) {
                    Application::$app->session->setFlash('success', 'Permiso eliminado correctamente');
                } else {
                    Application::$app->session->setFlash('error', 'No se pudo eliminar el permiso');
                }
            } else {
                Application::$app->session->setFlash('error', 'Permiso no encontrado');
            }
        } else {
            Application::$app->session->setFlash('error', 'ID de permiso inválido');
        }

        return $response->redirect('/listModulos');  // Redirigir a la lista de permisos
    }

}
