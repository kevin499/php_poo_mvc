<?php
class Destino extends Controller{
    public function __construct()
    {
        parent::__construct();

        $this->view->destinos = "";

    }

    public function render(){
        $this->view->render('destino/index');
    }
    public function listar()
    {
        $destinos = $this->model->listar();

        $this->view->destinos = $destinos;

        $this->render();

    }
    public function registrarNuevoDestino()
    {
        if (!empty($_POST["nombre"]) && !empty($_POST["descripcion"]) && !empty($_POST["imagen"])){

            $nombre = $_POST["nombre"];
            $descripcion = $_POST["descripcion"];
            $imagen = $_POST["imagen"];

            if ($this->model->registrarNuevoDestino(['nombre' => $nombre,'descripcion' => $descripcion, 'imagen' => $imagen])){
                echo json_encode(array("success" => true));
            }
            else{
                echo json_encode(array("success" => false,"error" => "Some random error happened"));
            }
        }else{
            echo json_encode(array("success" => false,"error" => "Completar campos"));

        }

    }

    public function traerDestinoPorId()
    {
        $id = $_GET["id"];

        echo json_encode($this->model->traerDestinoPorId($id));

    }
}


