<?php

    class Conexion{
        private $host;
        private $db;
        private $user;
        private $password;
        private $charset;

        public function __construct(){

            $this->host = constant('HOST');
            $this->db = constant('DB');
            $this->user = constant('USER');
            $this->password = constant('PASSWORD');
            $this->charset = constant('CHARSET');

        }

        public static function connect()
        {
            try {
                $conexion
                $pdo = new PDO();

                return $pdo;
            }
            catch (PDOException $e){
                return $e->getMessage();
            }
        }
    }

