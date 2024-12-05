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
        $this->user = null;
        $this->session->remove('user');
    }
}
