<?php 

    class db {
        private $dbHost = "localhost";
        private $dbUser = "root";
        private $dbPassword = "";
        private $dbName = "pwci_db";

        public function connection() {
            $mysqli = new mysqli($this->dbHost, $this->dbUser, $this->dbPassword, $this->dbName);
            if ($mysqli->connect_errno) {
                echo "Problema con la conexion a la base de datos";
            }
            return $mysqli;
        }

        public function disconnect() {
            mysqli_close();
        }
    }

?>