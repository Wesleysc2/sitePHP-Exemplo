<?php
class ConexaoBanco extends PDO{

  private static $instance = null;

  public function __construct($dsn,$user,$pass){
    parent::__construct($dsn,$user,$pass);
  }

  public static function getInstance(){
    if(!isset(self::$instance)){
      try{
        self::$instance = new ConexaoBanco("mysql:dbname=dados;host=localhost","root","");
      }catch(PDOException $e){
        echo "Erro ao conectar! ".$e;
      }
      return self::$instance;
    }//fim if
  }// fecha metodo
}//fecha classe
