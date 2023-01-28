<?php
 class Database{
    protected $dbhost = "localhost";
    protected $dbname = "real_estate";
    protected $dbuser = "root";
    protected $dbpass = "";
    protected $connection = null;
    public function __construct(){
        try {
            $this->connection = new PDO("mysql:host=127.0.0.1:3306 $this->dbhost;dbname=$this->dbname", $this->dbuser, $this->dbpass);
        }
        catch(Exception $ex){
            throw new Exception($ex->getMessage());
        }
    }
    public function select(){
        $stmt = $this->connection->prepare("select * from users");
        $stmt->execute();
        $row = $stmt->fetch(PDO::FETCH_ASSOC);
        // print all the values of the array
        var_dump($row);

        return $row;
    }
 }
?>