<?php

namespace app\controllers;

use app\core\Controller;
use app\core\Request;
use app\core\Response;
use app\models\Leccion;
use app\core\Application;

class LeccionController extends Controller
{


    public function index(Request $request, Response $response)
    {
        // Usar el método estático findAllRecords de Roles para obtener todos los roles
        $lecciones = Leccion::findAllRecords();  // Recuperar todos los roles
        $lecciones = Leccion::findAllRecords(); 

       

        // Verificación: Muestra los roles obtenidos para depuración

        // Renderizar la vista 'roles-list' y pasar los roles obtenidos
        return $this->render('listLecciones', [
            'lecciones' => $lecciones,
        ]);
    }





    public function create(Request $request, Response $response)
    {
        $lecciones = new Leccion();  // Crear una nueva instancia del modelo Modulo

        // Verificar si hay un 'COD_CURSO' en la URL
        $id_modulo = $request->getQueryParam('ID_MODULO');
        if ($id_modulo) {
            // Si existe, asignamos el COD_CURSO al modelo
            $lecciones->ID_MODULO = $id_modulo;
        }

        if ($request->isPost()) {
            $lecciones->loadData($request->getBody());  // Cargar los datos del formulario

            // Validar y guardar los datos
            if ($lecciones->validate() && $lecciones->save()) {
                Application::$app->session->setFlash('success', 'Módulo guardado correctamente');
                return $response->redirect('/listLecciones');
            }
        }

        return $this->render('leccionForm', [
            'model' => $lecciones,  // Pasamos el modelo para que esté disponible en la vista
        ]);
    }
    public function delete(Request $request, Response $response)
    {
        // Obtenemos el ID del permiso que se quiere eliminar desde la URL o del cuerpo de la solicitud
        $idLeccion = $request->getBody()['ID_LECCION'] ?? null;

        if ($idLeccion) {
            // Buscar el permiso por ID
            $leccion =  Leccion::findOne(['ID_LECCION' => $idLeccion]);

            if ($leccion) {
                // Si existe el permiso, procedemos a eliminarlo
                if ($leccion->delete()) {
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

        return $response->redirect('/listLecciones');  // Redirigir a la lista de permisos
    }
}
