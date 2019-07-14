<?php session_start(); ?>
<!DOCTYPE html>
<html lang="pt-br">

  <head>
    <meta charset="utf-8">
    <title>Consulta de Professores</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script type="text/javascript" src="js/jquery-3.2.1.min.js"></script>
    <script type="text/javascript" src="js/bootstrap.min.js"></script>
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/estilo.css" rel="stylesheet">
  </head>

  <body>
    <div class="container">
      <h1 class="jumbotron">Consulta de Professores</h1>
      <div class="row">
        <nav style="margin-bottom: 30px" class="navbar navbar-inverse">
          <ul class="nav navbar-nav">
            <li><a href="index.php">Página Inicial</a></li>
          </ul>
        </nav>
      </div>
    <?php
      include 'dao/professordao.class.php';
      include 'modelo/professor.class.php';
      $profDAO = new ProfessorDAO();
      $professor = $profDAO->buscarProfessor();
      if(count($professor) != 0){
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
          <th>Disciplina</th>
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
          <th>Disciplina</th>
        </tr>
      </tfoot>
      <tbody>
        <label>Dados de Professores</label>
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
        echo "<td>$prof->disciplina</td>";
      echo "</tr>";
    }
    ?>
      </tbody>
    </table>
    </div>
    <?php
    } else {
      echo "Dados de professores não encontrados!";
    }
    //FIM DO PROFESSOR
    ?>
  </div>
  </body>
</html>
