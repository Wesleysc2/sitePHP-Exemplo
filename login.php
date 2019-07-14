<?php session_start(); ?>
<!DOCTYPE html>
<html lang="pt-br">
  <head>
    <meta charset="utf-8">
    <title>Login</title>

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
      <h1 class="jumbotron">Login</h1>
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
      </div><!-- fecha class row -->

      <?php
      //FALTA CODIGO
      if(isset($_SESSION['msg'])){
        echo "<p>";
        echo $_SESSION['msg'];
        echo "</p>";
        unset($_SESSION['msg']);
      }
      ?>
      <form name="login" action="" method="post" enctype="multipart/form-data">

          <div class="form-group">
            <input type="text" name="txtlogin" placeholder="Login" class="form-control">
          </div>

          <div class="form-group">
            <input type="password" name="txtsenha" placeholder="Senha" class="form-control">
          </div>

          <div class="form-group">
            <label>Tipo</label>
            <select name="seltipo" class="form-control">
              <option value="aluno">aluno</option>
              <option value="administrador">Administrador</option>
            </select>
          </div>

          <div class="form-group">
            <input type="submit" name="entrar" value="Entrar" class="btn btn-primary">
          </div>
      </form>

      <?php
      if(isset($_POST['entrar']) && $_POST['seltipo'] == "aluno") {

        include 'modelo/aluno.class.php';
        include 'dao/alunodao.class.php';
        include 'util/seguranca.class.php';

        $alu = new Aluno();
        $alu->login = $_POST['txtlogin'];
        $alu->senha = $_POST['txtsenha'];
        $alu->tipo = $_POST['seltipo'];
        echo $alu;//para teste

        //vou pesquisar no banco
        $aluDAO = new AlunoDAO();
        $aluno = $aluDAO->verificarAluno($alu);
        //para teste! se voltar usuario ele encontrou
        var_dump($aluno);

        //fazer um if para verificar se deu erro ou não!
        if($aluno && !is_null($aluno)){
          //enviar usuario para qualquer página que desejar
          $_SESSION['privateUser'] = serialize($alu);
          header("location:index.php");
        }else{
          //dar erro no próprio login
          $_SESSION['msg'] = "Dado(s) invalido(s)";
          header("location:login.php");
        }//fecha else
      }
      ?>
    </div> <!-- fecha div class container -->
  </body>
</html>
