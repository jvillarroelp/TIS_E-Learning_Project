<?php

namespace app\controllers;

use app\core\Application;
use app\core\Controller;
use app\core\Request;
use app\core\Router;
use app\models\User;
use app\models\LoginForm;
use app\core\Response;
use app\models\Docente;


class AuthController extends Controller
{

  public function login(Request $request, Response $response)
{
    $loginForm = new LoginForm();
    if ($request->isPost()) {
        $loginForm->loadData($request->getBody());

        // Si la validación y el login son correctos
        if ($loginForm->validate() && $loginForm->login()) {
            // Obtener el ID del usuario autenticado
            $userID = Application::$app->user->{Application::$app->user->primaryKey()};  // Suponiendo que este es el ID del usuario

            // Buscar el rol del usuario en la base de datos
            $user = User::findOne([Application::$app->user->primaryKey() => $userID]);  // Obtener el usuario con el ID
            $userRole = $user->ID_ROL;  // Obtener el ID del rol del usuario

            // Guardar el ID del usuario y el ID_ROL en la sesión
            $_SESSION['user_id'] = $userID;
            $_SESSION['user_role'] = $userRole; // Guardamos el ID_ROL del usuario en la sesión

            // Redirigir al usuario
            $response->redirect('/');  // O la página de tu preferencia
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
