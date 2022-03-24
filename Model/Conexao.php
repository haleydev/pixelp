<?php
namespace Model;
use mysqli;
use PDO;
use PDOException;

class Conexao
{  
  private $database = "phpmyadmin";
  private $username = "root";  
  private $servername = "127.0.0.1";
  private $password = "";
  public $conect = null;
  
  public function mysqli(){
    if($_SERVER["HTTP_HOST"]!='localhost'){    
      $this->servername = "localhost";
    }   
    $this->conect = mysqli_connect($this->servername, $this->username, $this->password, $this->database);  
    if(!$this->conect){
      die("Falha na conexao" . mysqli_connect_error());
    }
  }

  public function pdo(){
    if($_SERVER["HTTP_HOST"]!='localhost'){    
      $this->servername = "localhost";
    }
    try{
      $this->conect = new PDO("mysql:host=$this->servername;dbname=$this->database", $this->username, $this->password);        
      } catch (PDOException $pe){
        die("Falha na conexao: $this->database : ".$pe->getMessage());
    } 
  } 
  
  public function close(){
    if($this->conect != null){
      $this->conect = null;
    }
  }
}  
