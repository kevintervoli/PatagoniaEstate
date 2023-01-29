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
        $row = $stmt->fetchAll(PDO::FETCH_ASSOC);
        return $row;
    }
    public function search($id , $username){
        $stmt = $this->connection->prepare("select * from users where ID = :id or username = :username");
        $stmt->execute(
            [':id'=>$id, ':username'=>$username]
        );
        $row = $stmt->fetchAll(PDO::FETCH_ASSOC);
        return $row;
    }
    public function insert($name,$surname,$age,$email,$address,$username, $password, $status){
        $stmt = $this->connection->prepare("insert into users (id,name,surname,age,email,address,username, password, status) values (0,:name,:surname,:age,:email,:address,:username, :password, :status)");
        $stmt->execute(
            [':name'=>$name,':surname'=>$surname,':age'=>$age,':email'=>$email,':address'=>$address,':username'=>$username, ':password'=>$password, ':status'=>$status]
        );
        return;
    }
    public function update($id,$name,$surname,$age,$email,$address,$username, $password, $status){
        $stmt = $this->connection->prepare("update users set name=:name,surname=:surname,age=:age,email=:email,address=:address,username=:username, password=:password, status=:status where id=:id");
        $stmt->execute(
            [':id'=>$id,':name'=>$name,':surname'=>$surname,':age'=>$age,':email'=>$email,':address'=>$address,':username'=>$username, ':password'=>$password, ':status'=>$status]
        );
        return;
    }
    public function delete($id):void{
        $sql = "DELETE FROM users WHERE id=4";
        $stmt = $this->connection->prepare($sql);
        $stmt->execute();
        
    }

 }
?>