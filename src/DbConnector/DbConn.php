<?php 
namespace src\DbConnector;

class DbConn {

    private $conn = null;

    public function __construct(){
    }

    public function connect(){
        try{
            // $this->conn = mysqli_connect($_ENV['DB_HOST'], $_ENV['DB_USERNAME'], $_ENV["DB_PASSWORD"], $_ENV["DB_DATABASE"]);

            $dsn = 'mysql:host=' . $_ENV['DB_HOST'] . ';dbport=' . $_ENV['DB_PORT'] .';dbname=' . $_ENV['DB_DATABASE'];

            $this->conn = new \PDO($dsn, $_ENV['DB_USERNAME'], $_ENV['DB_PASSWORD']);

            $this->conn->setAttribute(\PDO::ATTR_DEFAULT_FETCH_MODE, \PDO::FETCH_ASSOC);
            $this->conn->setAttribute(\PDO::ATTR_ERRMODE, \PDO::ERRMODE_EXCEPTION);
            $this->conn->setAttribute(\PDO::ATTR_EMULATE_PREPARES,TRUE);
            return $this->conn;

        } catch (\PDOException $e){
            exit($e->getMessage());
        }
    }
    
}