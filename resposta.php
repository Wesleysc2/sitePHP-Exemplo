<?php session_start(); ?>
<!DOCTYPE html>
<html lang="pt-br">
  <head>
    <meta charset="utf-8">
    <title>Resposta(teste)</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script type="text/javascript" src="js/jquery-3.2.1.min.js"></script>
    <script type="text/javascript" src="js/bootstrap.min.js"></script>
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/estilo.css" rel="stylesheet">
  </head>
  <body>
    <div class="container">
      <h1 class="jumbotron">Resposta(teste)</h1>
      <div class="row">
        <nav style="margin-bottom: 30px" class="navbar navbar-inverse">
          <ul class="nav navbar-nav">
            <li class="active"><a href="index.php">Página Inicial</a></li>
            <li><a href="cadastro-cfc.php">Cadastro</a></li>
            <?php
            if(isset($_SESSION['privateUser'])){
              include_once "modelo/aluno.class.php";
              include_once "modelo/professor.class.php";
              include_once "modelo/administrador.class.php";
              $alu = unserialize($_SESSION['privateUser']);
              $prof = unserialize($_SESSION['privateUser']);
              $adm = unserialize($_SESSION['privateUser']);
              if($alu->tipo == "aluno"){
            ?>
            <li><a href="consulta-professor.php">Consulta</a></li>
            <li><a href="filtrar-professor.php">Filtrar</a></li>
            <?php
            }else if($prof->tipo == "professor"){
            ?>
            <li><a href="consulta-cfc.php">Consulta</a></li>
            <li><a href="filtrar-cfc.php">Filtrar</a></li>
            <li><a href="excluir-cfc.php">Excluir</a></li>
            <?php
            }else if($adm->tipo == "administrador"){
            ?>
            <li><a href="consulta-cfc.php">Consulta</a></li>
            <li><a href="filtrar-cfc.php">Filtrar</a></li>
            <li><a href="excluir-cfc.php">Excluir</a></li>
            <?php
            }
            }else if(!isset($_SESSION['privateUser'])){
            ?>
            <li><a href="login.php">Login</a></li>
            <?php
            }
            ?>
          </ul>
        </nav>
      </div>
    <?php
    if(isset($_SESSION['msg']) && isset($_SESSION['alu'])) {
         include 'modelo/aluno.class.php';

         $alu = unserialize($_SESSION['alu']);
         echo "<p>";
         echo $_SESSION['msg'];
         echo "<br>";
         echo "<br>".$alu;
         echo "</p>";
         unset($_SESSION['msg']);
         unset($_SESSION['alu']);
     }
     if(isset($_SESSION['msg']) && isset($_SESSION['prof'])) {
          include 'modelo/professor.class.php';

          $prof = unserialize($_SESSION['prof']);
          echo "<p>";
          echo $_SESSION['msg'];
          echo "<br>";
          echo "<br>".$prof;
          echo "</p>";
          unset($_SESSION['msg']);
          unset($_SESSION['prof']);
    }
    if(isset($_SESSION['msg']) && isset($_SESSION['adm'])) {
         include 'modelo/administrador.class.php';

         $prof = unserialize($_SESSION['adm']);
         echo "<p>";
         echo $_SESSION['msg'];
         echo "<br>";
         echo "<br>".$adm;
         echo "</p>";
         unset($_SESSION['msg']);
         unset($_SESSION['adm']);
   }
    ?>
  </body>
</html>
