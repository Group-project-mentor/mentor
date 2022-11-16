<?php 
    class DB{
        private $connection;

        public function __construct(){

            $connection = new mysqli(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME);
            if ($this->connection->connect_error) {
                die("Connection failed: " . $this->connection->connect_error);
            }else{
                $this->connection = $connection;
                return $this->connection;
            }

        }

        public function executeQuery($query){
            $result = $this->connection->query($query);
            return $result;
        }
    }
?>