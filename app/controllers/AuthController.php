<?php

namespace app\controllers;

use app\core\Application;
use app\core\Controller;
use app\core\Request;
use app\core\Router;
use app\models\User;
use app\models\LoginForm;
use app\core\Response;



class AuthController extends Controller
{

  public function login(Request $request, Response $response)
{
    $loginForm = new LoginForm();
    if ($request->isPost()) {
        $loginForm->loadData($request->getBody());

        // Si la validación y el login son correctos
        if ($loginForm->validate() && $loginForm->login()) {
            // Si el login es exitoso, redirige al inicio
            $response->redirect('/');
            return;
        }
    }

    // Si el login no es exitoso, mostramos el formulario de login
    $this->setLayout('auth');
    return $this->render('login', [
        'model' => $loginForm
    ]);
}



  public function register(Request $request)
  {
    $user = new User();
    if ($request->isPost()) {
      $user->loadData($request->getBody());
      $user->ID_ROL = 3; 

      if ($user->validate() && $user->save()) {
        Application::$app->session->setFlash('sucess', 'Gracias por registrarte');
        Application::$app->response->redirect('/');
        exit;
      }


      return $this->render('register', [
        'model' => $user
      ]);
    }
    $this->setLayout('auth');
    return $this->render('register', [
      'model' => $user
    ]);
  }
  public function logout(Request $request, Response $response){
    Application::$app->logout();
    $response->redirect('/');
  }

}
