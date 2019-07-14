<?php
class Professor {

  private $idProfessor;
  private $nome;
  private $estado;
  private $cidade;
  private $bairro;
  private $genero;
  private $anoNasc;
  private $email;
  private $contato;
  private $disciplina;
  private $login;
  private $senha;
  private $tipo = "professor";

  public function __construct(){}
  public function __destruct(){}
  public function __get($a) { return $this->$a; }
  public function __set($a,$v){ $this->$a = $v; }

  public function __toString() {
    return nl2br("Nome: $this->nome
                  Estado: $this->estado
                  Cidade: $this->cidade
                  Bairro: $this->bairro
                  Genero: $this->genero
                  Ano de Nascimento: $this->anoNasc
                  Email: $this->email
                  Contato: $this->contato
                  Disciplina: $this->disciplina
                  Login: $this->login
                  Senha: $this->senha
                  Tipo: $this->tipo
                  ");
  }
}
