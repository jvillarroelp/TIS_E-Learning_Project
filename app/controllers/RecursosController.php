<?php

namespace app\controllers;

use app\core\Application;
use app\core\Controller;
use app\core\Request;
use app\core\Response;
use app\models\Modulo;
use app\models\Contenido;
use app\models\Recurso;

class RecursosController extends Controller
{

    public function create(Request $request, Response $response)
    {
        $recursos = new Recurso();  // Crear una nueva instancia del modelo Recurso

        // Verificar si hay un 'ID_LECCION' en la URL
        $idLeccion = $request->getQueryParam('ID_LECCION');
        if ($idLeccion) {
            // Si existe, asignamos el ID_LECCION al modelo
            $recursos->ID_LECCION = $idLeccion;
        }

        if ($request->isPost()) {
            $recursos->loadData($request->getBody());  // Cargar los datos del formulario

            // Validar y guardar los datos
            if ($recursos->validate() && $recursos->save()) {
                Application::$app->session->setFlash('success', 'Recurso guardado correctamente');
                return $response->redirect('/listRecursos');
            }
        }

        return $this->render('recursoForm', [
            'model' => $recursos,  // Pasamos el modelo para que esté disponible en la vista
        ]);
    }


    public function index(Request $request, Response $response)
    {
        // Usar el método estático findAllRecords de Roles para obtener todos los roles
        $recursos = Recurso::findAllRecords();



        // Verificación: Muestra los roles obtenidos para depuración

        // Renderizar la vista 'roles-list' y pasar los roles obtenidos
        return $this->render('listRecursos', [
            'recursos' => $recursos,

        ]);
    }
}
