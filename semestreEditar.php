<?php
require_once './header.php';
if ($_GET) {
  if (isset($_GET['id'])) {
    $semestreID = base64_decode($_GET['id']);
    $semestre = $objSemestre->pegaSemestre($semestreID, $_SESSION['usuario_id']);
  }
}
if ($_POST) {
  if (isset($_POST['id'])) {
    $semestreID = $_POST['id'];
    $semestre = $_POST['semestre'];
    $ret = $objSemestre->update($semestre, $semestreID, $_SESSION['usuario_id']);
    $semestre = $objSemestre->pegaSemestre($semestreID, $_SESSION['usuario_id']);
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
          if (!empty($semestre)) { ?>
            <div class="card card-success">
              <div class="card-header">
                <h3 class="card-title">Edição de Semestre</h3>
              </div> <!-- /.card-header -->
              <!-- form start -->
              <form method="post">
                <input type="hidden" value="<?= $semestre->id; ?>" name="id">
                <div class="card-body">
                  <div class="row">
                    <div class="col-md-6">
                      <div class="form-group">
                        <label>Semestre</label>
                        <input type="text" class="form-control form-control-sm" name="semestre" value="<?= $semestre->semestre; ?>">
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