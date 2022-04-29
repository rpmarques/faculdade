<?php
//DEIXO SOMENTE APARECENDO OS ERROS CRÍTICOS
//error_reporting(E_ERROR|E_PARSE);
// REPORTA TODOS OS ERROS E AVISOS
error_reporting(E_ALL);
ini_set("display_errors", 1);
require_once './classes/funcoes.class.php';
require_once './classes/logger.class.php';
require_once './classes/conexao.class.php';
require_once './classes/usuarios.class.php';
$objUsuarios = Usuarios::getInstance(Conexao::getInstance());

if (isset($_POST['email'])) {
    $wEmail = $_POST['email'];
    define('LOGIN', $wEmail);
    $wSenha = md5($_POST['senha']);
    $usuarios = $objUsuarios->selectUM(" WHERE TRIM(email)='$wEmail' AND TRIM(senha)='$wSenha' ");

    if (!empty($usuarios)) {
        session_start();
        $_SESSION['versao'] = '1.00';
        $_SESSION['login'] = $usuarios->nome;
        $_SESSION['usuario_id'] = $usuarios->id;
        Logger('USUARIO:[' . $_SESSION['login'] . '] - LOGOU NO SISTEMA');
        header('Location: principal.php');
    }
}
?>
<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Controle de Tarefas</title>
    <!-- Google Font: Source Sans Pro -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="./plugins/fontawesome-free/css/all.min.css">
    <!-- icheck bootstrap -->
    <link rel="stylesheet" href="./plugins/icheck-bootstrap/icheck-bootstrap.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="./dist/css/adminlte.min.css">
</head>

<body class="hold-transition login-page">
    <div class="login-box">
        <!-- /.login-logo -->
        <div class="card card-outline card-primary">
            <div class="card-header text-center">
                <a href="./index.php" class="h1"><b>Tarefas </b>1.00</a>
            </div>
            <div class="card-body">
                <p class="login-box-msg">Faça seu login para acessar</p>
                <form action="" method="post">
                    <div class="input-group mb-3">
                        <input type="email" name="email" class="form-control" placeholder="exemplo@exemplo.com">
                        <div class="input-group-append">
                            <div class="input-group-text">
                                <span class="fas fa-envelope"></span>
                            </div>
                        </div>
                    </div>
                    <div class="input-group mb-3">
                        <input type="password" name="senha" class="form-control" placeholder="Senha">
                        <div class="input-group-append">
                            <div class="input-group-text">
                                <span class="fas fa-lock"></span>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <!-- MANTER CONECTADO 
                            <div class="col-8">
                            <div class="icheck-primary">
                                <input type="checkbox" id="remember">
                                <label for="remember">
                                    Manter Conectado
                                </label>
                            </div>
                        </div> -->
                        <!-- /.col -->
                        <div class="col-4">
                            <button type="submit" class="btn btn-primary btn-block">Login</button>
                        </div> <!-- /.col -->
                    </div>
                </form>
                <p class="mb-1">
                    <a href="./recuperarSenha.php">Recuperar Senha</a>
                </p>
                <p class="mb-0">
                    <a href="./registrar.php" class="text-center">Faça seu registro</a>
                </p>
            </div> <!-- /.card-body -->
        </div> <!-- /.card -->
    </div> <!-- /.login-box -->

    <!-- jQuery -->
    <script src="./plugins/jquery/jquery.min.js"></script>
    <!-- Bootstrap 4 -->
    <script src="./plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
    <!-- AdminLTE App -->
    <script src="./dist/js/adminlte.min.js"></script>
</body>

</html>