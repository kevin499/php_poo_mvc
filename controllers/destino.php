<?php
    class Destino extends Controller{
        public function __construct()
        {
            parent::__construct();
            $this->view->render('destino/index');
        }

        public function registrarNuevoDestino()
        {
            echo "destino";

            $this->model->registrarNuevoDestino();

        }
    }


