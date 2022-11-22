<?php 
class DB{
    private $connection;

    public function __construct(){

            $connection = new mysqli(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME);
            if (isset($this->connection) and $this->connection->connect_error) {
                die("Connection failed: " . $this->connection->connect_error);
            }else{
                $this->connection = $connection;
                return $this->connection;
        }

        }

//  To get results from executing queries
        public function executeQuery($query){
            $result = $this->connection->query($query);
            return $result;
        }

//  To get results from prepared statements
        public function prepare($query){
            return $this->connection->prepare($query);
        }

        public function executePrepared($stmt){
            return $stmt->execute();
        }

        public function fetchOne($stmt){
            $stmt->execute();
            return $stmt->get_result()->fetch_row();
        }

        public function fetchAll($stmt){
            $stmt->execute();
            return $stmt->fetch();
        }
    }

?>