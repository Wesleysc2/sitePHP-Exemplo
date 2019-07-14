<?php session_start(); ?>
<!DOCTYPE html>
<html lang="pt-br">
  <head>
    <meta charset="utf-8">
    <title>Filtrar Professores</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
     <script type="text/javascript" src="js/jquery-3.2.1.min.js"></script>
     <script type="text/javascript" src="js/bootstrap.min.js"></script>
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/estilo.css" rel="stylesheet">
  </head>
  <body>
    <div class="container">
      <h1 class="jumbotron">Filtrar Professores</h1>
      <div class="row">
        <nav style="margin-bottom: 30px" class="navbar navbar-inverse">
          <ul class="nav navbar-nav">
            <li><a href="index.php">Página Inicial</a></li>
            <li><a href="cadastro-cfc.php">Cadastro</a></li>
            <li><a href="consulta-cfc.php">Consulta</a></li>
            <li class="active"><a href="filtrar-cfc.php">Filtrar</a></li>
            <li><a href="excluir-cfc.php">Excluir</a></li>
            <li><a href="login.php">Login</a></li>
          </ul>
        </nav>
      </div>
      <?php
      if(isset($_SESSION["erro"])){
        echo "<p>".$_SESSION["erro"]."</p>";
        unset($_SESSION["erro"]);
      }
      ?>
      <form name="filtprofessores" action="" method="post">
        <div class="form-group">
          <input type="text" name="txtpesq" placeholder="Pesquisa" class="form-control">
        </div>
        <div class="radio">
          <label><input type="radio" name="rdfiltro" value="idprofessor">Código</label>
        </div>
        <div class="radio">
          <label><input type="radio" name="rdfiltro" value="nome">Nome</label>
        </div>
        <div class="radio">
          <label><input type="radio" name="rdfiltro" value="estado">Estado</label>
        </div>
        <div class="radio">
          <label><input type="radio" name="rdfiltro" value="cidade">Cidade</label>
        </div>
        <div class="radio">
          <label><input type="radio" name="rdfiltro" value="bairro">Bairro</label>
        </div>
        <div class="radio">
          <label><input type="radio" name="rdfiltro" value="genero">Gênero</label>
        </div>
        <div class="radio">
          <label><input type="radio" name="rdfiltro" value="anonasc">Ano de Nascimento</label>
        </div>
        <div class="radio">
          <label><input type="radio" name="rdfiltro" value="email">Email</label>
        </div>
        <div class="radio">
          <label><input type="radio" name="rdfiltro" value="contato">Contato</label>
        </div>
        <div class="form-group">
          <input type="submit" name="filtrar" value="Filtrar" class="btn btn-success">
        </div>
      </form>
      <?php
      if(isset($_SESSION["professores"])){
        include_once "modelo/professor.class.php";
        $professor = unserialize($_SESSION["professores"]);
        if(count($professor) != 0 ){
      ?>
      <div class="table-responsive">
      <table class="table table-striped table-bordered table-hover table-condensed">
        <thead>
          <tr>
            <th>Código</th>
            <th>Nome</th>
            <th>Estado</th>
            <th>Cidade</th>
            <th>Bairro</th>
            <th>Genero</th>
            <th>Ano Nascimento</th>
            <th>Email</th>
            <th>Contato</th>
          </tr>
        </thead>
        <tfoot>
          <tr>
            <th>Código</th>
            <th>Nome</th>
            <th>Estado</th>
            <th>Cidade</th>
            <th>Bairro</th>
            <th>Genero</th>
            <th>Ano Nascimento</th>
            <th>Email</th>
            <th>Contato</th>
          </tr>
        </tfoot>
        <tbody>
      <?php
      foreach($professor as $prof){
        echo "<tr>";
          echo "<td>$prof->idProfessor</td>";
          echo "<td>$prof->nome</td>";
          echo "<td>$prof->estado</td>";
          echo "<td>$prof->cidade</td>";
          echo "<td>$prof->bairro</td>";
          echo "<td>$prof->genero</td>";
          echo "<td>$prof->anoNasc</td>";
          echo "<td>$prof->email</td>";
          echo "<td>$prof->contato</td>";
        echo "</tr>";
      }
      ?>
        </tbody>
      </table>
      </div>
      <?php
        }else{
          echo "Não há professores relacionados!";
        }
        unset($_SESSION["professores"]);
      }
      ?>

      <?php
      if(isset($_POST["filtrar"])){
        if(isset($_POST["rdfiltro"])){
          $pesq = $_POST['txtpesq'];
          $filtro = $_POST['rdfiltro'];

          $query = "";

          if($filtro == "idprofessor"){
            $query = "where idprofessor = ".$pesq;
          }else if($filtro == "nome"){
            $query = "where nome like '%".$pesq."%'";
          }else if($filtro == "estado"){
            $query = "where estado like '%".$pesq."%'";
          }else if($filtro == "cidade"){
            $query = "where cidade like '%".$pesq."%'";
          }else if($filtro == "bairro"){
            $query = "where bairro like '%".$pesq."%'";
          }else if($filtro == "genero"){
            $query = "where genero like '%".$pesq."%'";
          }else if($filtro == "anonasc"){
            $query = "where anonasc like '%".$pesq."%'";
          }else if($filtro == "email"){
            $query = "where email like '%".$pesq."%'";
          }else if($filtro == "contato"){
            $query = "where contato like '%".$pesq."%'";
          }
          include "dao/professordao.class.php";
          include_once "modelo/professor.class.php";
          $profDAO = new ProfessorDAO();
          $array = $profDAO->filtrarProfessor($query);
          $_SESSION['professores'] = serialize($array);
          header("location:filtrar-professor.php");

        } else {
          $_SESSION['erro'] = "Selecione uma opção!";
          header("location:filtrar-professor.php");
        }
      }
      ?>
    </div>
  </body>
</html>
