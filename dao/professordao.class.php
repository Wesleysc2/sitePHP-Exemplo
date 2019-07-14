prof<?php
require "conexaobanco.class.php";
class ProfessorDAO {

  private $conexao = null;

  public function __construct(){
    $this->conexao = ConexaoBanco::getInstance();
  }

  public function cadastrarProfessor($prof){
    try{
      $stat = $this->conexao->prepare("insert into professor
      (idprofessor, nome, estado, cidade, bairro, genero, anonasc, email, contato, disciplina, login, senha, tipo)
      value(null,?,?,?,?,?,?,?,?,?,?,?,?)");
      $stat->bindValue(1, $prof->nome);
      $stat->bindValue(2, $prof->estado);
      $stat->bindValue(3, $prof->cidade);
      $stat->bindValue(4, $prof->bairro);
      $stat->bindValue(5, $prof->genero);
      $stat->bindValue(6, $prof->anoNasc);
      $stat->bindValue(7, $prof->email);
      $stat->bindValue(8, $prof->contato);
      $stat->bindValue(9, $prof->disciplina);
      $stat->bindValue(10, $prof->login);
      $stat->bindValue(11, $prof->senha);
      $stat->bindValue(12, $prof->tipo);
      $stat->execute();
      $this->conexao = null;
    }catch(PDOException $e){
      echo "Erro ao cadastrar professor! ".$e;
    }
  }

  public function buscarProfessor() {
    try {
      $stat = $this->conexao->query("select * from professor");
      $array = $stat->fetchAll(PDO::FETCH_CLASS,'Professor');
      return $array;
    } catch(PDOException $e) {
      echo "Erro ao buscar Professores! ".$e;
    }
  }

  public function deletarProfessor($id) {
      try {
        $stat = $this->conexao->prepare(
          "delete from professor where idprofessor = ?");
        $stat->bindValue(1, $id);
        $stat->execute();
      } catch(PDOException $e) {
        echo "Erro ao deletar Professor! ".$e;
      }
  }

  public function filtrarProfessor($query) {
    try {
      $stat = $this->conexao->query("select * from professor ".$query);

      $array = $stat->fetchAll(PDO::FETCH_CLASS,'Professor');
      return $array;

    } catch(PDOException $e) {
      echo "Erro ao filtrar professor! ".$e;
    }//fecha catch
  }//fecha filtrar

  public function alterarProfessor($prof){
    try{
      $stat = $this->conexao->prepare("update professor set nome=?, estado=?, cidade=?, bairro=?, genero=?, anonasc=?, email=?, contato=?, disciplina=?, login=?, senha=?, tipo=? where idprofessor=?");

      $stat->bindValue(1, $prof->nome);
      $stat->bindValue(2, $prof->estado);
      $stat->bindValue(3, $prof->cidade);
      $stat->bindValue(4, $prof->bairro);
      $stat->bindValue(5, $prof->genero);
      $stat->bindValue(6, $prof->anoNasc);
      $stat->bindValue(7, $prof->email);
      $stat->bindValue(8, $prof->contato);
      $stat->bindValue(9, $prof->disciplina);
      $stat->bindValue(10, $prof->login);
      $stat->bindValue(11, $prof->senha);
      $stat->bindValue(12, $prof->tipo);
      $stat->bindVprofe(13, $prof->idProfessor);
      $stat->execute();
    }catch(PDOException $e){
      echo "Erro ao alterar Dados!".$e;
    }
  }
  public function verificarProfessor($prof){
    try {
      $stat = $this->conexao->query("select * from professor where login='$prof->login' and senha='$prof->senha' and tipo='$prof->tipo'");
      $profesor = null;
      $professor = $stat->fetchObject('Professor');
      return $profesor;
    } catch (PDOException $ex) {
        echo 'Erro ao verificar! '.$ex;
    }//fecha catch
  }

 public function gerarJSON($query) {
      try {
          $stat = $this->conexao->query("select * from professor ".$query);

          return json_encode($stat->fetchAll(PDO::FETCH_ASSOC));

      } catch (PDOException $exc) {
          echo 'Erro ao gerar JSON de professor! ' . $exc;
      }//fecha catch
  }//fecha método filtrar
}//fecha classe
