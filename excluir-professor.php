<?php session_start(); ?>
<!DOCTYPE html>
<html lang="pt-br">
  <head>
    <title>Excluir Professores</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script type="text/javascript" src="js/jquery-3.2.1.min.js"></script>
    <script type="text/javascript" src="js/bootstrap.min.js"></script>
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/estilo.css" rel="stylesheet">
  </head>
  <body>
    <div class="container">
      <h1 class="jumbotron">Excluir Professores</h1>
      <form name="excaluno" action="" method="post"
          enctype="multipart/form-data">
          <div class="form-group">
            <label>Digite a ID do professor que deseja excluir</label>
            <input type="number" name="txtcodigo"
                   placeholder="Código" class="form-control">
          </div>
          <div class="form-group">
            <input type="submit" class="btn btn-danger" name="excluir" value="Excluir">
            <input type="submit" class="btn btn-primary" name="home" value="Home">
          </div>
    </form>
    <?php
    if(isset($_POST["excluir"])) {
      include 'dao/professordao.class.php';
      $profDAO = new ProfessorDAO();
      $profDAO->deletarprofessor($_POST["txtcodigo"]);
      header("location:consulta-professor.php");
    }else if(isset($_POST['home'])){
      header("location:index.php");
    }
    ?>
    </div> <!-- fecha div class container -->
  </body>
</html>
