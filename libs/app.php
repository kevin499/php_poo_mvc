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
            }
            elseif (file_exists($fileController)){
                require_once $fileController;
                $controller = new $url[0];
            }
            else{
                require_once 'controllers/errores.php';
                $controller = new errores;
            }

            if (!empty($url[1])){
                $controller->{$url[1]}();
            }

        }
    }


