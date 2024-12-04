<?php

namespace app\controllers;
use app\core\Request;
use app\core\Application;
use app\core\Controller;

/**
 * 
 * 
 * @author 
 * @package app\controllers
 */



 class SiteController extends Controller{
 

    public function home() {
        $params = [
            'name' => "Yomara"
        ];

        return $this->render('home',$params);
     }

     public function contact() {

         return $this->render('contact');
     }
 
     public static function handleContact(Request $request) {
        $body = Application::$app->request->getBody();
         return 'Handling submitted data';
     }
 }
 