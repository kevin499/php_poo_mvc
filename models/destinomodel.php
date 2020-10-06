<?php
    class DestinoModel extends Model{

        private $id;
        private $nombre;
        private $descripcion;
        private $imagen;

        public function __constructor()
        {
            parent::_constructor();
        }

        public function listar()
        {
            $sql="SELECT id, nombre, descripcion, imagen FROM Destino";
            try {
                $pdo = $this->db->connect();
                $stmt = $pdo->prepare($sql);
                $stmt->execute();
                $resultado = $stmt->fetchAll();
            }
            catch (PDOException $e){
                $resultado = [];
            }
            return $resultado;

        }

        public function registrarNuevoDestino()
        {
            echo "Insertamios ebn la BD";
            $sql="INSERT TANTO";
            $this->db->connect()->prepare($sql)->execute();

            //$this->db->connect();
        }

        /**
         * @return mixed
         */
        public function getId()
        {
            return $this->id;
        }

        /**
         * @param mixed $id
         */
        public function setId($id)
        {
            $this->id = $id;
        }

        /**
         * @return mixed
         */
        public function getNombre()
        {
            return $this->nombre;
        }

        /**
         * @param mixed $nombre
         */
        public function setNombre($nombre)
        {
            $this->nombre = $nombre;
        }

        /**
         * @return mixed
         */
        public function getDescripcion()
        {
            return $this->descripcion;
        }

        /**
         * @param mixed $descripcion
         */
        public function setDescripcion($descripcion)
        {
            $this->descripcion = $descripcion;
        }

        /**
         * @return mixed
         */
        public function getImagen()
        {
            return $this->imagen;
        }

        /**
         * @param mixed $imagen
         */
        public function setImagen($imagen)
        {
            $this->imagen = $imagen;
        }

    }

