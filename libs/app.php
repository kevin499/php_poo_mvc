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
                //$controller->loadModel('main');
                $controller->render();
            }
            elseif (file_exists($fileController)){
                require_once $fileController;
                $controller = new $url[0];
                $controller->loadModel($url[0]);

                $nparam = sizeof($url);
                if ($nparam > 1){
                    if ($nparam > 2){
                        $param = [];
                        for ($i=2; $i<$nparam; $i++){
                            array_push($param,$url[$i]);
                        }
                        $controller->{$url[1]}($param);
                    }
                    else{
                        $controller->{$url[1]}();
                    }
                }
                else{
                    $controller->render();

                }

            }
            else{
                require_once 'controllers/errores.php';
                $controller = new errores;
                $controller->loadModel('errores');

            }
        }
    }


