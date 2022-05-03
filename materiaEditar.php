<?php
require_once './header.php';
if ($_GET) {
  if (isset($_GET['id'])) {
    $materiaID = base64_decode($_GET['id']);
    $materia = $objMateria->pegaMateria($materiaID, $_SESSION['usuario_id']);
  }
}
if ($_POST) {
  if (isset($_POST['id'])) {
    $materiaID = $_POST['id'];
    $nome = $_POST['nome'];
    $ret = $objMateria->update($nome, $materiaID, $_SESSION['usuario_id']);
    $materia = $objMateria->pegaMateria($materiaID, $_SESSION['usuario_id']);
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
          if (!empty($materia)) { ?>
            <div class="card card-success">
              <div class="card-header">
                <h3 class="card-title">Edição de Matéria</h3>
              </div> <!-- /.card-header -->
              <!-- form start -->
              <form method="post">
                <input type="hidden" value="<?= $materia->id; ?>" name="id">
                <div class="card-body">
                  <div class="row">
                    <div class="col-md-6">
                      <div class="form-group">
                        <label>Materia</label>
                        <input type="text" class="form-control form-control-sm" name="nome" value="<?= $materia->nome; ?>">
                      </div>
                    </div>
                  </div>
                </div> <!-- /.card-body -->
                <div class="card-footer">
                  <button type="submit" class="btn btn-success">Gravar</button>
                </div>
              </form>
            </div> <!-- /.card -->
          <?php } ?>
        </div>
        <!--/.col  -->
      </div> <!-- /.row -->
    </div><!-- /.container-fluid -->
  </section> <!-- /.content -->
</div> <!-- /.content-wrapper -->
<?php require_once './footer.php'; ?>