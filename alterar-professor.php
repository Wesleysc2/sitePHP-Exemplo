<?php
session_start();

?>
<!DOCTYPE html>
<html lang="pt-br">
  <head>
    <meta charset="utf-8">
    <title>Alterar Professor</title>

    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- Bootstrap +
     JQuery (necessário para os plugins de Javascript do Bootstrap) -->
    <script type="text/javascript" src="js/jquery-3.2.1.min.js"></script>
    <script type="text/javascript" src="js/bootstrap.min.js"></script>
    <link href="css/bootstrap.min.css" rel="stylesheet">

    <!-- CSS padrão da página -->
    <link href="css/estilo.css" rel="stylesheet">
  </head>
  <body>
    <div class="container">
      <h1 class="jumbotron">Alterar Professor</h1>
      <div class="row">
        <nav style="margin-bottom: 30px" class="navbar navbar-inverse">
          <ul class="nav navbar-nav">
            <li><a href="index.php">Página Inicial</a></li>
          </ul>
        </nav>
      </div>

      <?php
      include 'modelo/professor.class.php';
      require 'dao/professordao.class.php';
      include 'util/padronizacao.class.php';
      include 'util/validacao.class.php';

      $profDAO = new ProfessorDAO();

      if(isset($_GET['id'])){

        $query = "where idprofessor =".$_GET['id'];
        $array = $profDAO->filtrarProfessor($query);
        $_SESSION['obj'] = serialize($array);
      }
      ?>

      <?php
      if(isset($_SESSION['erros'])){
        $erros = unserialize($_SESSION['erros']);
        echo "<p>";
        foreach ($erros as $e) {
          echo "<br>".$e;
        }
        echo "</p>";
        unset($_SESSION['erros']);
      }
      ?>
      <form name="cadprof" action=""
            method="post" enctype="multipart/form-data">
            <label>Dados Pessoais</label>
            <div class="form-group">
              <input type="text" name="txtnome"
                     placeholder="Nome" class="form-control">
            </div>
            <div class="form-group">
              <input type="text" name="txtestado"
                     placeholder="Estado" class="form-control">
            </div>
            <div class="form-group">
              <input type="text" name="txtcidade"
                     placeholder="Cidade" class="form-control">
            </div>
            <div class="form-group">
              <input type="text" name="txtbairro"
                     placeholder="Bairro" class="form-control">
            </div>

            <div>
              <label>Gênero: </label>
              <select name="selgenero">
                <option value="Escolher">Escolher</option>
                <option value="Masculino">Masculino</option>
                <option value="Feminino">Feminino</option>
              </select>
            </div>
            <div class="form-group">
              <input type="text" name="txtanonasc"
                     placeholder="Ano de Nascimento" class="form-control">
            </div>
            <label>Dados de Contato</label>
            <div class="form-group">
              <input type="email" name="email"
                      placeholder="E-mail" class="form-control">
            </div>
            <div class="form-group">
              <input type="text" name="txtcontato"
                    placeholder="Contato(Telefone)" class="form-control">
            </div>
            <div class="form-group">
              <label>Disciplina: </label>
              <select name="seldis">
                <option value="Escolher">Escolher</option>
                <option value="A">A</option>
                <option value="B">B</option>
                <option value="AB">AB</option>
                <option value="C">C</option>
                <option value="D">D</option>
                <option value="E">E</option>
              </select>
          </div>
          <label>Criar Senha</label>
          <div class="form-group">
            <input type="text" name="txtlogin" placeholder="Login" class="form-control">
          </div>
          <div class="form-group">
            <input type="text" name="txtsenha" placeholder="Senha" class="form-control">
          </div>
            <div class="form-group">
              <input type="submit" name="alterar"
                     value="Alterar" class="btn btn-primary">
            </div>
      </form>
      <?php
      if(isset($_POST['alterar'])){
        include 'modelo/professor.class.php';
        require 'dao/professordao.class.php';
        include 'util/padronizacao.class.php';
        include 'util/validacao.class.php';

        $nome = Padronizacao::padronizarNome($_POST['txtnome']);
        $estado = Padronizacao::padronizarNome($_POST['txtestado']);
        $cidade = Padronizacao::padronizarNome($_POST['txtcidade']);
        $bairro = Padronizacao::padronizarNome($_POST['txtbairro']);
        $genero = $_POST['selgenero'];
        $anoNasc = $_POST['txtanonasc'];
        $email = Padronizacao::padronizarEmail($_POST['email']);
        $contato = $_POST['txtcontato'];
        $disciplina = $_POST['seldis'];
        $login = $_POST["txtlogin"];
        $senha = $_POST['txtsenha'];

        $erros = array();

        if(!Validacao::validarNome($nome)){
          $erros[] = "Nome invalido";
        }
        if(!Validacao::validarEstado($estado)){
          $erros[] = "Estado invalido!";
        }
        if(!Validacao::validarCidade($cidade)){
          $erros[] = "Cidade invalida!";
        }
        if(!Validacao::validarBairro($bairro)){
          $erros[] = "Bairro invalido!";
        }
        if(!Validacao::validarGenero($genero)){
          $erros[] = "Genero invalido!";
        }
        if(!Validacao::validarAnoNasc($anoNasc)){
          $erros[] = "Ano de nascimento invalido!";
        }
        if(!Validacao::validarEmail($email)){
          $erros[] = "Email invalida!";
        }
        if(!Validacao::validarContato($contato)){
          $erros[] = "Contato invalida!";
        }
        if(!Validacao::validarSenha($senha)){
          $erros[] = "Senha inválida";
        }
        if(!Validacao::validarNome($login)){
          $erros[] = "Login inválida";
        }

        if(count($erros) == 0){
          $prof = new Professor();
          $prof->nome = $nome;
          $prof->estado = $estado;
          $prof->cidade = $cidade;
          $prof->bairro = $bairro;
          $prof->genero = $genero;
          $prof->anoNasc = $anoNasc;
          $prof->email = $email;
          $prof->contato = $contato;
          $prof->disciplina = $disciplina;
          $prof->login = $login;
          $prof->senha = $senha;
          $profDAO->alterarProfessor($prof);
          $_SESSION['msg'] = "Professor alterado com sucesso!";
          $_SESSION['prof'] = serialize($prof);
          header("location:resposta.php");
        }else{
          $_SESSION['erros'] = serialize($erros);
          header("location:alterar-professor.php");
        }
      }
      ?>
    </div><!-- fecha class container -->
  </body>
</html>
