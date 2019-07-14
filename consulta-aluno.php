<?php session_start(); ?>
<!DOCTYPE html>
<html lang="pt-br">

  <head>
    <meta charset="utf-8">
    <title>Consulta Geral</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script type="text/javascript" src="js/jquery-3.2.1.min.js"></script>
    <script type="text/javascript" src="js/bootstrap.min.js"></script>
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/estilo.css" rel="stylesheet">
  </head>

  <body>
    <div class="container">
      <h1 class="jumbotron">Consulta Geral</h1>
      <div class="row">
        <nav style="margin-bottom: 30px" class="navbar navbar-inverse">
          <ul class="nav navbar-nav">
            <li><a href="index.php">Página Inicial</a></li>
          </ul>
        </nav>
      </div>
    <?php
      include 'dao/alunodao.class.php';
      include 'modelo/aluno.class.php';
      $aluDAO = new AlunoDAO();
      $aluno = $aluDAO->buscarAluno();
      if(count($aluno) != 0){
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
          <th>Categoria</th>
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
          <th>Categoria</th>
        </tr>
      </tfoot>
      <tbody>
        <label>Dados de Alunos</label>
    <?php
    foreach($aluno as $alu){
      echo "<tr>";
        echo "<td>$alu->idAluno</td>";
        echo "<td>$alu->nome</td>";
        echo "<td>$alu->estado</td>";
        echo "<td>$alu->cidade</td>";
        echo "<td>$alu->bairro</td>";
        echo "<td>$alu->genero</td>";
        echo "<td>$alu->anoNasc</td>";
        echo "<td>$alu->email</td>";
        echo "<td>$alu->contato</td>";
        echo "<td>$alu->categoria</td>";
      echo "</tr>";
    }
    ?>
      </tbody>
    </table>
    </div>
    <?php
    } else {
      echo "Dados de alunos não encontrados!";
    }
    //FIM DO ALUNO
    ?>
  </div>
  </body>
</html>
