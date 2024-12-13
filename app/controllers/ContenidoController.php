<?php
namespace app\controllers;

use app\core\Application;
use app\core\Controller;
use app\core\Request;
use app\core\Response;
use app\models\Modulo;
use app\models\Contenido;

class ContenidoController extends Controller
{

    public function create(Request $request, Response $response)
    {
        $contenidos = new Contenido();  // Crear una nueva instancia del modelo Modulo

        // Verificar si hay un 'COD_CURSO' en la URL
        $idLeccion = $request->getQueryParam('ID_LECCION');
        if ($idLeccion) {
            // Si existe, asignamos el COD_CURSO al modelo
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


   

}
