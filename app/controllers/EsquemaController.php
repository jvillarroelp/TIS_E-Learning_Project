<?php

namespace app\controllers;

use app\core\Controller;
use app\core\Request;
use app\core\Response;
use app\models\Modulo;
use app\models\Leccion;
use app\models\Contenido;
use app\models\Evaluacion;
use app\core\Application;

class EsquemaController extends Controller
{
    public function index(Request $request, Response $response)
    {
        // Verificar si se proporciona el código del curso
        $cod_curso = $request->getQueryParam('COD_CURSO');
        if (!$cod_curso) {
            Application::$app->response->redirect('/');
            return;
        }

        // Obtener los módulos asociados al curso
        $modulos = Modulo::filtro('COD_CURSO', $cod_curso);

        // Crear una estructura para almacenar módulos, lecciones y contenidos
        $esquema = [];

        foreach ($modulos as $modulo) {
            // Obtener lecciones del módulo
            $lecciones = Leccion::filtro('ID_MODULO', $modulo->ID_MODULO);

            // Obtener contenidos relacionados a cada lección
            foreach ($lecciones as &$leccion) {
                $leccion->contenidos = Contenido::filtro('ID_LECCION', $leccion->ID_LECCION);
            }

            // Agregar al esquema
            $esquema[] = [
                'modulo' => $modulo,
                'lecciones' => $lecciones,
            ];
        }

        // Cargar evaluación del curso
        $evaluacion = Evaluacion::findOne(['COD_CURSO' => $cod_curso]);

        // Renderizar la vista
        return $this->render('esquema', [
            'esquema' => $esquema,
            'evaluacion' => $evaluacion,
        ]);
    }
}
