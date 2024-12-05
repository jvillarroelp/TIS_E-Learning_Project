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
    public Router $router;


    /**
     * Request instance to handle HTTP requests.
     *
     * @var Request
     */
    public Request $request;
    public Response $response;
    public Database $db;
    public Session $session;

    public static Application $app;
    public Controller $controller;

    /**
     * Initializes the application by creating Request and Router instances.
     */

    public function __construct($rootPath, array $config)
    {
        self::$ROOT_DIR = $rootPath;
        self::$app = $this;
        $this->request = new Request();
        $this->response = new Response();
        $this->session = new Session();
        $this->router = new Router($this->request, $this->response);
        $this->db = new Database($config['db']);
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
}
