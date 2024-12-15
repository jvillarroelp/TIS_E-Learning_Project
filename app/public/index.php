<?php
use app\controllers\ProfesorController;
use app\controllers\AuthController;
use app\controllers\SiteController;
use app\controllers\EvaluacionController;
use app\controllers\CursoController;
use app\Controllers\ModuloController;
use app\core\Application;
use app\models\Profesor;
use app\controllers\RolesController;
use app\models\Permisos;
use app\controllers\RolPermisoController;
use app\controllers\PermisosController;
use app\models\Leccion;
use app\models\Modulo;
use app\models\RolPermiso;
use app\controllers\LeccionController;
use app\controllers\ContenidoController;
use app\controllers\RecursosController;
use app\controllers\EstudianteController;
use app\controllers\DocenteController;
use app\controllers\PreguntasController;
use app\models\Pregunta;
use app\controllers\RespuestaController;
use app\controllers\RealizaController;
use app\models\Realiza;
use app\controllers\TableroController;

require_once __DIR__ . '/../vendor/autoload.php';
$dotenv = Dotenv\Dotenv::createImmutable(dirname(__DIR__));
$dotenv->load();


$config= [
    'userClass' => \app\models\User::class,
    'db' =>[
        'dsn' => $_ENV['DB_DSN'], 
        'user' => $_ENV['DB_USER'],
        'password' => $_ENV['DB_PASSWORD'], 

    ]
];

$app = new Application(dirname(__DIR__),$config);

$app->router->get('/', [SiteController::class,'home']);
$app->router->get('/contact', [SiteController::class, 'contact']);

$app->router->get('/login', [AuthController::class, 'login']);
$app->router->post('/login', [AuthController::class, 'login']);
$app->router->get('/register', [AuthController::class, 'register']);
$app->router->post('/register', [AuthController::class, 'register']);
$app->router->get('/logout',[AuthController::class, 'logout']);

// app/config/routes.php

$app->router->post('/evaluacion', [EvaluacionController::class, 'create']);
$app->router->get('/evaluacion', [EvaluacionController::class, 'create']);
// En Router.php
$app->router->get('/curso', [CursoController::class, 'create']);  // Para el método GET
$app->router->post('/curso', [CursoController::class, 'create']);  // Para el método POST



$app->router->get('/listEvaluacion', [EvaluacionController::class, 'index']); // Ruta para lista de evaluaciones

$app->router->get('/roles', [RolesController::class, 'create']);  
$app->router->post('/roles', [RolesController::class, 'create']);


$app->router->get('/listRoles', [RolesController::class, 'index']);

$app->router->post('/deleteRol', [RolesController::class, 'delete']);

$app->router->post('/rolPermiso/assignPermission', [RolPermisoController::class, 'assignPermission']); // Ruta para asignar permiso a rol




$app->router->get('/permisos', [PermisosController::class, 'create']);  
$app->router->post('/permisos', [PermisosController::class, 'create']);
$app->router->get('/listPermisos', [PermisosController::class, 'index']);

$app->router->get('/editPermiso', [PermisosController::class, 'edit']);

// Para procesar la actualización del permiso (POST)
$app->router->post('/editPermiso', [PermisosController::class, 'update']);  

// En routes.php 
$app->router->post('/deletePermiso', [PermisosController::class, 'delete']);

$app->router->get('/listar', [CursoController::class, 'listar']);


$app->router->get('/modulos/create', [ModuloController::class, 'create']);

$app->router->post('/modulos/create', [ModuloController::class, 'create']);

$app->router->get('/listModulos', [ModuloController::class, 'index']);
$app->router->post('/deleteModulo', [ModuloController::class, 'delete']);

$app->router->get('/lecciones/create', [LeccionController::class, 'create']);

$app->router->post('/lecciones/create', [LeccionController::class, 'create']);
$app->router->get('/listLecciones', [LeccionController::class, 'index']);

$app->router->post('/deleteLeccion', [LeccionController::class, 'delete']);


$app->router->get('/contenidos/create', [ContenidoController::class, 'create']);

$app->router->post('/contenidos/create', [ContenidoController::class, 'create']);

$app->router->get('/recursos/create', [RecursosController::class, 'create']);
$app->router->post('/recursos/create', [RecursosController::class, 'create']);
$app->router->get('/listRecursos', [RecursosController::class, 'index']);


$app->router->get('/estudiantes', [EstudianteController::class, 'create']);
$app->router->post('/estudiantes', [EstudianteController::class, 'create']);



$app->router->get('/docentes', [DocenteController::class, 'create']);
$app->router->post('/docentes', [DocenteController::class, 'create']);

$app->router->get('/preguntas', [PreguntasController::class, 'create']);
$app->router->post('/preguntas', [PreguntasController::class, 'create']);

$app->router->get('/listPreguntas', [PreguntasController::class, 'index']);

$app->router->get('/respuestas', [RespuestaController::class, 'create']);
$app->router->post('/respuestas', [RespuestaController::class, 'create']);

$app->router->get('/realizas', [RealizaController::class, 'index']);

$app->router->post('/realiza/inscribirseCurso', [RealizaController::class, 'inscribirseCurso']);

// Definir la ruta para mostrar los cursos del usuario
$app->router->get('/misCursos', [TableroController::class, 'tablero']);




$app->run();
