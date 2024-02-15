<?php
 namespace core;
 use PDO;
class Database{
    public $connect;
    public $statement;

     public function __construct($config,$username="root",$pass=""){
        $dsn='mysql:'.http_build_query($config,'',';');
        if($this->connect=new PDO($dsn,$username,$pass,[PDO::ATTR_DEFAULT_FETCH_MODE=>PDO::FETCH_ASSOC])){
            return $this->connect;
        }
        else{
            exit("Connection Error");
        }

    }
    public function query($query,$param=[]){

        $this->statement=$this->connect->prepare($query);
       if($this->statement->execute($param)){
        return $this;
       }
       else{
        return false;
       }
     }
     
     public function getAll(){
        return $this->statement->fetchAll();
     }
     public function find(){

       return $this->statement->fetch();
     }
     public function findOrFail(){

        $result=$this->find();
        if(!$result){
            abort();
        }
        return $result;
     }
     public function single(){
        $result=$this->find();
        if(!$result){
            return false;
        }
        return $result;
     }
     public function developer(){
          $this->statement=$this->connect->prepare("SELECT `name` FROM `developer`");
        if($this->statement->execute()){
        return $this;
       }
       else{
        return false;
       }
     }
      public function enginner(){
        $this->statement=$this->connect->prepare("SELECT `name` FROM `copyright`");
        if($this->statement->execute()){
        return $this;
       }
       else{
        return false;
       }
     }
}
?>