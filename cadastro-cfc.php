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
            <li><a href="cadastro-cfc.php">Cadastro</a></li>
            <li><a href="consulta-cfc.php">Consulta</a></li>
            <li><a href="filtrar-cfc.php">Filtro</a></li>
            <li><a href="excluir-cfc.php">Excluir</a></li>
            <li><a href="login.php">Login</a></li>
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
          <<option value="Administrador">Administrador</option>
        </select>
      </div>
      <div class="form-group">
        <input type="submit" name="formulario"
               value="Formulario" class="btn btn-info">
      </div>
    </form>
    <?php
    if(isset($_POST['formulario']) && $_POST['seltipo'] == "Escolher"){
      header("location:cadastro-cfc.php");
    }else if(isset($_POST['formulario']) && $_POST['seltipo'] == "Aluno"){
      header("location:cadastro-aluno.php");
    }else if(isset($_POST['formulario']) && $_POST['seltipo'] == "Professor"){
      header("location:cadastro-professor.php");
    }else if(isset($_POST['formulario']) && $_POST['seltipo'] == "Administrador"){
      header("location:cadastro-administrador.php");
    }
    ?>
  </body>
</html>
