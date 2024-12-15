<?php

namespace app\core;

/**
 * The main application class that initializes and runs the app.
 * 
 * @package app\core
 */
class Application
{

    /**
     * Router instance to handle routing.
     *
     * @var Router
     */
    public static string $ROOT_DIR;

    public string $userClass;
    public Router $router;
    public Request $request;
    public Response $response;

    public Session $session;

    public Database $db;
    public ?DbModel $user=null;

    public static Application $app;
    public Controller $controller;

    /**
     * Initializes the application by creating Request and Router instances.
     */

    public function __construct($rootPath, array $config)
    {
        $this->userClass = $config['userClass'];
        self::$ROOT_DIR = $rootPath;
        self::$app = $this;
        $this->request = new Request();
        $this->response = new Response();
        $this->session = new Session();
        $this->router = new Router($this->request, $this->response);
        $this->db = new Database($config['db']);

        $primaryValue = $this->session->get('user');
        if ($primaryValue) {
            $userModel = new $this->userClass();
            $primaryKey = $userModel->primaryKey();
            $this->user = $this->userClass::findOne([$primaryKey => $primaryValue]) ?? null;;
        } else {
            $this->user = null;
        }
    }

    public static function isGuest()
    {
        return !self::$app->user;
    }

    /**
     * Runs the application by resolving the current route.
     */
    public function run()
    {
       
    
        echo $this->router->resolve();
    }
    /**
     * 
     * @return app/core/Controller
     */
    public function getController()
    {
        return $this->controller;
    }

    /**
     * 
     * @return app/core/Controller $controller
     */
    public function setController(\app\core\Controller $controller): void
    {
        $this->controller = $controller;
    }
    public function login(DbModel $user)
    {

        $this->user = $user;
        $primaryKey = $user->primaryKey();
        $primaryValue = $user->{$primaryKey};
        $this->session->set('user', $primaryValue);
        return true;
    }
    public function logout()
{
    // Asegurarte de que la sesión está activa
    if (session_status() === PHP_SESSION_NONE) {
        session_start();
    }

    // Eliminar al usuario de la aplicación
    $this->user = null;

    // Eliminar toda la información de la sesión
    session_unset();

    // Destruir la sesión completamente
    session_destroy();

    // Borrar la cookie de sesión en el navegador
    if (ini_get("session.use_cookies")) {
        $params = session_get_cookie_params();
        setcookie(
            session_name(),
            '',
            time() - 42000,
            $params["path"],
            $params["domain"],
            $params["secure"],
            $params["httponly"]
        );
    }

    // Regenerar el ID de sesión para mayor seguridad
    session_regenerate_id(true);
}

}
