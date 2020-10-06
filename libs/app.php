<?php

    class App{
        public function __construct()
        {
            $url = $_GET["url"];

            $url = rtrim($url,'/');

            $url = explode('/',$url);

            $fileController = 'controllers/'.$url[0].'.php';

            if (empty($url[0])){
                require_once 'controllers/main.php';
                $controller = new Main;
                $controller->loadModel('main');
                //$controller->render();
            }
            elseif (file_exists($fileController)){
                require_once $fileController;
                $controller = new $url[0];
                $controller->loadModel($url[0]);
            }
            else{
                require_once 'controllers/errores.php';
                $controller = new errores;
                $controller->loadModel('errores');

            }

            if (isset($url[1])){
                $controller->{$url[1]}();
            }
            else{
                $controller->render();
            }

        }
    }


