<?php
    class Controller{
        public function __construct()
        {
            $this->view = new View();
        }

        public function loadModel($model)
        {
            $url = 'models/'.$model.'model.php';

            if (file_exists($url)){
                require $url;

                $model_name = $model.'Model';
                $this->model = new $model_name();
            }
        }
    }

