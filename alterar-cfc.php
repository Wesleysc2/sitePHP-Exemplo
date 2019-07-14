<?php session_start(); ?>
<!DOCTYPE html>
<html lang="pt-br">
  <head>
    <meta charset="utf-8">
    <title>Cadastrar</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script type="text/javascript" src="js/jquery-3.2.1.min.js"></script>
    <script type="text/javascript" src="js/bootstrap.min.js"></script>
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/estilo.css" rel="stylesheet">
  </head>
  <body>
    <div class="container">
      <h1 class="jumbotron">Cadastrar</h1>
      <div class="row">
        <nav style="margin-bottom: 30px" class="navbar navbar-inverse">
          <ul class="nav navbar-nav">
            <li><a href="index.php">Página Inicial</a></li>        
          </ul>
        </nav>
      </div>
    <form name="cadcfc" action=""
          method="post" enctype="multipart/form-data">
      <label>Escolha uma das opções abaixo</label>
      <div class="form-group">
        <select name="seltipo">
          <option value="Escolher">Escolher</option>
          <option value="Aluno">Aluno</option>
          <option value="Professor">Professor</option>
        </select>
      </div>
      <div class="form-group">
        <input type="submit" name="alterar"
               value="Alterar" class="btn btn-info">
      </div>
    </form>
    <?php
    if(isset($_POST['alterar']) && $_POST['seltipo'] == "Escolher"){
      header("location:alterar-cfc.php");
    }else if(isset($_POST['alterar']) && $_POST['seltipo'] == "Aluno"){
      header("location:alterar-aluno.php");
    }else if(isset($_POST['alterar']) && $_POST['seltipo'] == "Professor"){
      header("location:alterar-professor.php");
    }
    ?>
  </body>
</html>
