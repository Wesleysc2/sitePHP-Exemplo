<?php session_start(); ?>
<!DOCTYPE html>
<html lang="pt-br">
  <head>
    <meta charset="utf-8">
    <title>CFC</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script type="text/javascript" src="js/jquery-3.2.1.min.js"></script>
    <script type="text/javascript" src="js/bootstrap.min.js"></script>
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/estilo.css" rel="stylesheet">
  </head>
  <body>
    <div class="container">
      <h1 class="jumbotron">CFC</h1>
      <div class="row">
        <nav style="margin-bottom: 30px" class="navbar navbar-inverse">
          <ul class="nav navbar-nav">
            <li><a href="index.php">Página Inicial</a></li>
            <li><a href="cadastro-cfc.php">Cadastro</a></li>
            <li><a href="consulta-cfc.php">Consulta</a></li>
            <li><a href="filtrar-cfc.php">Filtro</a></li>
            <li><a href="excluir-cfc.php">Excluir</a></li>
            <li><a href="login.php">Login</a></li>
          </ul>
        </nav>
      </div>

      <?php
      if(isset($_SESSION['privateUser'])){
        include_once "modelo/aluno.class.php";
        include_once "modelo/professor.class.php";
        $alu = unserialize($_SESSION['privateUser']);
        $prof = unserialize($_SESSION['privateUser']);
        echo "<h2>";
        echo "Você esta logado(a)!";
        echo "</h2>";
        echo "<h3>";
        echo "Bem vindo(a).";
        echo "</h3>";
      }
      ?>
      <?php
      if(isset($_SESSION['privateUser'])){
      ?>
      <form name="deslogar" action="" method="post" enctype="multipart/form-data">
        <div class="form-group">
          <input type="submit" name="deslogar"
          value="Deslogar" class="btn btn-primary">
        </div>
      </form>
      <?php
      }
      ?>
      <?php
      if(isset($_SESSION['privateUser']) && isset($_POST['deslogar'])){
        unset($_SESSION['privateUser']);
        header("location:index.php");
      }
      ?>
    </div>
  </body>
</html>
