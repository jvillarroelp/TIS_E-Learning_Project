<?php
namespace app\controllers;

use app\core\Application;
use app\core\Controller;
use app\core\Request;
use app\core\Response;
use app\models\Modulo;

class ModuloController extends Controller
{


    public function index(Request $request, Response $response)
    {
        // Usar el método estático findAllRecords de Roles para obtener todos los roles
        $modulos = Modulo::findAllRecords();  // Recuperar todos los roles
        $modulos = Modulo::findAllRecords(); 

       

        // Verificación: Muestra los roles obtenidos para depuración

        // Renderizar la vista 'roles-list' y pasar los roles obtenidos
        return $this->render('listModulos', [
            'modulos' => $modulos,
        ]);
    }






    public function create(Request $request, Response $response)
    {
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

}
