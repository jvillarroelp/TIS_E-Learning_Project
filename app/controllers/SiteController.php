<?php

namespace app\controllers;
use app\core\Request;
use app\core\Application;
use app\core\Controller;
use app\models\CursoForm;
/**
 * 
 * 
 * @author 
 * @package app\controllers
 */



 class SiteController extends Controller{
 

    public function home() {
        $cursos = CursoForm::findAllRecords();
    
        return $this->render('home', ['cursos' => $cursos]);
    }

     public function contact() {

         return $this->render('contact');
     }
 
     public static function handleContact(Request $request) {
        $body = Application::$app->request->getBody();
         return 'Handling submitted data';
     }
 }
 