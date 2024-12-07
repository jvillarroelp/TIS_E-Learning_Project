<?php

namespace app\controllers;

use app\core\Controller;
use app\core\Request;
use app\core\Response;
use app\models\Profesor;
use app\core\Application;

class ProfesorController extends Controller
{
    // Registrar un profesor
    public function ProfesorForm(Request $request, Response $response)
    {
        // Aquí puedes obtener el ID del usuario que se registró, pasándolo por URL o de otra forma.
        // Por ejemplo, usando un parámetro en la URL como /profesor/form?id=1234
        $userId = $request->getQueryParam('userId');  // Obtener el ID de usuario

        // Verifica si el ID de usuario está presente
        if (!$userId) {
            // Si no hay un ID de usuario, redirigir o mostrar un error
            $response->redirect('/error');  // Redirigir si no hay un ID válido
            return;
        }

        $profesor = new Profesor();
        
        // Si es un POST, cargamos los datos del formulario
        if ($request->isPost()) {
            $profesor->loadData($request->getBody());
            
            // Asignamos el ID de usuario al profesor antes de guardarlo
            $profesor->ID = $userId;  // Aseguramos que el ID del usuario se asigne al profesor

            // Validamos y guardamos el profesor
            if ($profesor->validate() && $profesor->save()) {
                // Redirigimos al listado de docentes
                $response->redirect('/docentes');
                return;
            }
        }

        // Renderizamos el formulario del profesor y pasamos el modelo
        return $this->render('profesorForm', [
            'model' => $profesor,
        ]);
    }
}
