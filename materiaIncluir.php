<?php
require_once './header.php';
if ($_POST) {
  if (isset($_POST['nome'])) {
    $nome = $_POST['nome'];
    $ret = $objMateria->insert($nome, $_SESSION['usuario_id']);
  }
}
?>
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header"> </section> <!-- Main content -->
  <section class="content">
    <div class="container-fluid">
      <div class="row">
        <!-- left column -->
        <div class="col-md-12">
          <?php
          if (isset($ret)) {
            if ($ret) {
              require_once './alertaSucesso.php';
            } else {
              require_once './alertaErro.php.php';
            }
          }
          ?>
          <!-- general form elements -->
          <div class="card card-primary">
            <div class="card-header">
              <h3 class="card-title">Cadastrar Matéria</h3>
            </div> <!-- /.card-header -->
            <!-- form start -->
            <form method="post">
              <div class="card-body">
                <div class="row">
                  <div class="col-md-6">
                    <div class="form-group">
                      <label>Matéria</label>
                      <input type="text" class="form-control form-control-sm" name="nome">
                    </div>
                  </div>
                </div>
              </div> <!-- /.card-body -->
              <div class="card-footer">
                <button type="submit" class="btn btn-primary">Gravar</button>
              </div>
            </form>
          </div> <!-- /.card -->
        </div>
        <!--/.col  -->
      </div> <!-- /.row -->
    </div><!-- /.container-fluid -->
  </section> <!-- /.content -->
</div> <!-- /.content-wrapper -->
<?php require_once './footer.php'; ?>