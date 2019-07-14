<?php
require "conexaobanco.class.php";
class AlunoDAO {

  private $conexao = null;

  public function __construct(){
    $this->conexao = ConexaoBanco::getInstance();
  }

  public function cadastrarAluno($alu){
    try{
      $stat = $this->conexao->prepare("insert into aluno
      (idaluno, nome, estado, cidade, bairro, genero, anonasc, email, contato, categoria, login, senha, tipo)
      values(null,?,?,?,?,?,?,?,?,?,?,?,?)");
      $stat->bindValue(1, $alu->nome);
      $stat->bindValue(2, $alu->estado);
      $stat->bindValue(3, $alu->cidade);
      $stat->bindValue(4, $alu->bairro);
      $stat->bindValue(5, $alu->genero);
      $stat->bindValue(6, $alu->anoNasc);
      $stat->bindValue(7, $alu->email);
      $stat->bindValue(8, $alu->contato);
      $stat->bindValue(9, $alu->categoria);
      $stat->bindValue(10, $alu->login);
      $stat->bindValue(11, $alu->senha);
      $stat->bindValue(12, $alu->tipo);
      $stat->execute();
      $this->conexao = null;
    }catch(PDOException $e){
      echo "Erro ao cadastrar aluno! ".$e;
    }
  }

  public function buscarAluno() {
    try {
      $stat = $this->conexao->query("select * from aluno");
      $array = $stat->fetchAll(PDO::FETCH_CLASS,'Aluno');
      return $array;
    } catch(PDOException $e) {
      echo "Erro ao buscar Alunos! ".$e;
    }
  }

  public function deletarAluno($id) {
      try {
        $stat = $this->conexao->prepare(
          "delete from aluno where idaluno = ?");
        $stat->bindValue(1, $id);
        $stat->execute();
      } catch(PDOException $e) {
        echo "Erro ao deletar aluno! ".$e;
      }
  }

  public function filtrarAluno($query) {
    try {
      $stat = $this->conexao->query("select * from aluno ".$query);

      $array = $stat->fetchAll(PDO::FETCH_CLASS,'Aluno');
      return $array;

    } catch(PDOException $e) {
      echo "Erro ao filtrar aluno! ".$e;
    }//fecha catch
  }//fecha filtrar

  public function alterarAluno($alu){
    try{
      $stat = $this->conexao->prepare("update aluno set nome=?, estado=?, cidade=?, bairro=?, genero=?, anonasc=?, email=?, contato=?, categoria=?, login=?, senha=?, tipo=? where idaluno=?");

      $stat->bindValue(1, $alu->nome);
      $stat->bindValue(2, $alu->estado);
      $stat->bindValue(3, $alu->cidade);
      $stat->bindValue(4, $alu->bairro);
      $stat->bindValue(5, $alu->genero);
      $stat->bindValue(6, $alu->anoNasc);
      $stat->bindValue(7, $alu->email);
      $stat->bindValue(8, $alu->contato);
      $stat->bindValue(9, $alu->categoria);
      $stat->bindValue(10, $alu->login);
      $stat->bindValue(11, $alu->senha);
      $stat->bindValue(12, $alu->tipo);
      $stat->bindValue(13, $alu->idAluno);
      $stat->execute();
    }catch(PDOException $e){
      echo "Erro ao alterar Dados!".$e;
    }
  }
  public function verificarAluno($alu){
    try {
      $stat = $this->conexao->query("select * from aluno where login='$alu->login' and senha='$alu->senha' and tipo='$alu->tipo'");
      $aluno = null;
      $aluno = $stat->fetchObject('Aluno');
      return $aluno;
    } catch (PDOException $ex) {
        echo 'Erro ao verificar! '.$ex;
    }//fecha catch
  }

 public function gerarJSON($query) {
      try {
          $stat = $this->conexao->query("select * from aluno ".$query);

          return json_encode($stat->fetchAll(PDO::FETCH_ASSOC));

      } catch (PDOException $exc) {
          echo 'Erro ao gerar JSON de alunos! ' . $exc;
      }//fecha catch
  }//fecha método filtrar
}//fecha classe
