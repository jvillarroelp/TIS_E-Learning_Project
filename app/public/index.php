<?php
use app\controllers\ProfesorController;
use app\controllers\AuthController;
use app\controllers\SiteController;
use app\controllers\EvaluacionController;
use app\core\Application;
use app\models\Profesor;

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
$app->router->get('/profesor', [ProfesorController::class, 'ProfesorForm']);  
$app->router->post('/profesor', [ProfesorController::class, 'ProfesorForm']); 
$app->router->get('/evaluacion', [EvaluacionController::class, 'create']);  
$app->router->post('/evaluacion', [EvaluacionController::class, 'create']); 



$app->run();
