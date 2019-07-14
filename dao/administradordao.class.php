<?php
require "conexaobanco.class.php";
class AdministradorDAO {

  private $conexao = null;

  public function __construct(){
    $this->conexao = ConexaoBanco::getInstance();
  }

  public function cadastrarAdministrador($adm){
    try{
      $stat = $this->conexao->prepare("insert into administrador
      (idadministrador, nome, estado, cidade, bairro, genero, anonasc, email, contato, codigo, login, senha, tipo)
      values(null,?,?,?,?,?,?,?,?,?,?,?,?)");
      $stat->bindValue(1, $adm->nome);
      $stat->bindValue(2, $adm->estado);
      $stat->bindValue(3, $adm->cidade);
      $stat->bindValue(4, $adm->bairro);
      $stat->bindValue(5, $adm->genero);
      $stat->bindValue(6, $adm->anoNasc);
      $stat->bindValue(7, $adm->email);
      $stat->bindValue(8, $adm->contato);
      $stat->bindValue(9, $adm->codigo);
      $stat->bindValue(10, $adm->login);
      $stat->bindValue(11, $adm->senha);
      $stat->bindValue(12, $adm->tipo);
      $stat->execute();
      $this->conexao = null;
    }catch(PDOException $e){
      echo "Erro ao cadastrar Administrador! ".$e;
    }
  }

  public function buscarAdministrador() {
    try {
      $stat = $this->conexao->query("select * from administrador");
      $array = $stat->fetchAll(PDO::FETCH_CLASS,'Administrador');
      return $array;
    } catch(PDOException $e) {
      echo "Erro ao buscar Administrador! ".$e;
    }
  }

  public function deletarAdministrador($id) {
      try {
        $stat = $this->conexao->prepare(
          "delete from administrador where idadministrador = ?");
        $stat->bindValue(1, $id);
        $stat->execute();
      } catch(PDOException $e) {
        echo "Erro ao deletar Administrador! ".$e;
      }
  }

  public function filtrarAdministrador($query) {
    try {
      $stat = $this->conexao->query("select * from administrador ".$query);

      $array = $stat->fetchAll(PDO::FETCH_CLASS,'Administrador');
      return $array;

    } catch(PDOException $e) {
      echo "Erro ao filtrar administrador! ".$e;
    }//fecha catch
  }//fecha filtrar

  public function alterarAdministrador($adm){
    try{
      $stat = $this->conexao->prepare("update administrador set nome=?, estado=?, cidade=?, bairro=?, genero=?, anonasc=?, email=?, contato=?, codigo=?, login=?, senha=?, tipo=? where idadministrador=?");

      $stat->bindValue(1, $adm->nome);
      $stat->bindValue(2, $adm->estado);
      $stat->bindValue(3, $adm->cidade);
      $stat->bindValue(4, $adm->bairro);
      $stat->bindValue(5, $adm->genero);
      $stat->bindValue(6, $adm->anoNasc);
      $stat->bindValue(7, $adm->email);
      $stat->bindValue(8, $adm->contato);
      $stat->bindValue(9, $adm->codigo);
      $stat->bindValue(10, $adm->login);
      $stat->bindValue(11, $adm->senha);
      $stat->bindValue(12, $adm->tipo);
      $stat->bindValue(13, $adm->idAdministrador);
      $stat->execute();
    }catch(PDOException $e){
      echo "Erro ao alterar Dados!".$e;
    }
  }
  public function verificarAdministrador($adm){
    try {
      $stat = $this->conexao->query("select * from administrador where login='$adm->login' and senha='$adm->senha' and tipo='$adm->tipo'");
      $administrador = null;
      $administrador = $stat->fetchObject('Administrador');
      return $administrador;
    } catch (PDOException $ex) {
        echo 'Erro ao verificar! '.$ex;
    }//fecha catch
  }

 public function gerarJSON($query) {
      try {
          $stat = $this->conexao->query("select * from administrador ".$query);

          return json_encode($stat->fetchAll(PDO::FETCH_ASSOC));

      } catch (PDOException $exc) {
          echo 'Erro ao gerar JSON de administrador! ' . $exc;
      }//fecha catch
  }//fecha método filtrar
}//fecha classe
