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
            $sql="SELECT id, nombre, descripcion, imagen FROM Destino ORDER BY id DESC";
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

        public function registrarNuevoDestino($datos)
        {
            $sql="INSERT INTO destino(nombre,descripcion,imagen) VALUES (:nombre,:descripcion,:imagen)";
            try {
                $query = $this->db->connect()->prepare($sql);
                $query->execute(['nombre'=>$datos['nombre'],'descripcion'=>$datos['descripcion'],'imagen'=>$datos['imagen']]);
                return true;
            }
            catch (PDOException $e){
                return false;
            }

        }
        public function modificarDestino($datos)
        {
            $sql = "UPDATE destino SET nombre = :nombre, descripcion = :descripcion, imagen = :imagen WHERE id = :id";
            try {
                $query = $this->db->connect()->prepare($sql);
                $query->execute(['id'=>$datos['id'],'nombre'=>$datos['nombre'],'descripcion'=>$datos['descripcion'],'imagen'=>$datos['imagen']]);
                return true;
            }
            catch (PDOException $e){
                return false;
            }
        }

        public function eliminarDestino($id)
        {
            $sql = "DELETE FROM destino WHERE id = :id";
            try {
                $query = $this->db->connect()->prepare($sql);
                $query->bindParam('id', $id, PDO::PARAM_INT);
                $query->execute();
                return true;
            }
            catch (PDOException $e){
                return false;
            }
        }

        public function traerDestinoPorId($id)
        {
            $sql="SELECT id,nombre,descripcion,imagen FROM destino WHERE id = :id";
            try {
                $query = $this->db->connect()->prepare($sql);
                $query->bindParam(':id', $id, PDO::PARAM_INT);
                $query->execute();
                $response = $query->fetch();
                return $response;
            }
            catch (PDOException $e){
                return false;
            }
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

