<?php
    class DestinoModel extends Model{
        public function __constructor()
        {
            parent::_constructor();
        }


        //Aca irian las operaciones del CRUD y los metodos que el controlador llamaria
        public function registrarNuevoDestino()
        {
            echo "Insertamios ebn la BD";
            $sql="INSERT TANTO";
            $this->db->connect()->prepare($sql)->execute();

            //$this->db->connect();
        }
    }

