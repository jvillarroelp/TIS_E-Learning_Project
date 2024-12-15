<?php
namespace app\controllers;

use app\core\Application;
use app\core\Controller;
use app\core\Request;
use app\core\Response;
use app\models\Contenido;
use app\models\User;

class ContenidoController extends Controller
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

        $contenidos = new Contenido();  // Crear una nueva instancia del modelo Contenido

        // Verificar si hay un 'ID_LECCION' en la URL
        $idLeccion = $request->getQueryParam('ID_LECCION');
        if ($idLeccion) {
            // Si existe, asignamos el ID_LECCION al modelo
            $contenidos->ID_LECCION = $idLeccion;
        }

        if ($request->isPost()) {
            $contenidos->loadData($request->getBody());  // Cargar los datos del formulario

            // Validar y guardar los datos
            if ($contenidos->validate() && $contenidos->save()) {
                Application::$app->session->setFlash('success', 'Módulo guardado correctamente');
                return $response->redirect('/listLecciones');
            }
        }

        return $this->render('contenidoForm', [
            'model' => $contenidos,  // Pasamos el modelo para que esté disponible en la vista
        ]);
    }
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

        // Obtener todos los contenidos desde la base de datos
        $contenidos = Contenido::findAllRecords();  // Método que obtiene todos los contenidos

        // Renderizar la vista 'listContenidos' y pasar los contenidos
        return $this->render('listContenidos', [
            'contenidos' => $contenidos,
        ]);
    }



    public function delete(Request $request, Response $response)
{
    // Obtenemos el ID del permiso que se quiere eliminar desde la URL o del cuerpo de la solicitud
    $idContenido = $request->getBody()['ID_CONTENIDO'] ?? null;

    if ($idContenido) {
        // Buscar el permiso por ID
        $contenido =  contenido::findOne(['ID_CONTENIDO' => $idContenido]);

        if ($contenido) {
            // Si existe el permiso, procedemos a eliminarlo
            if ($contenido->delete()) {
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

    return $response->redirect('/listContenidos');  // Redirigir a la lista de permisos
}

}