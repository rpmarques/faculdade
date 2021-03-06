<?php
require_once './header.php';
if ($_GET) {
  if (isset($_GET['id'])) {
    $tarefa = $objTarefa->pegaTarega(base64_decode($_GET['id']), $_SESSION['usuario_id']);
    if (!empty($tarefa)) {
      Logger("LOCALIZAMOS A TAREFA ID:[" . base64_decode($_GET['id']) . "]");
    }
  }
}
if ($_POST) {
  if (isset($_POST['id'])) {
    $ret = $objTarefa->delete($_POST['id'], $_SESSION['usuario_id']);
    $tarefa = $objTarefa->pegaTarega($_POST['id'], $_SESSION['usuario_id']);
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
          <?php if (!empty($tarefa)) { ?>
            <div class="card card-danger">
              <div class="card-header">
                <h3 class="card-title">Excluir Tarefa</h3>
              </div> <!-- /.card-header -->
              <!-- form start -->
              <form method="post">
                <input type="hidden" name="id" value="<?= $tarefa->id ?>">
                <div class="card-body">
                  <div class="row">
                    <div class="col-md-2">
                      <div class="form-group">
                        <label>Semestre</label>
                        <?= $objSemestre->montaSelect('semestre_id', $tarefa->semestre_id); ?>
                      </div>
                    </div>
                    <div class="col-md-4">
                      <div class="form-group">
                        <label>Matéria</label>
                        <?= $objMateria->montaSelect('materia_id', $tarefa->materia_id); ?>
                      </div>
                    </div>
                    <div class="col-md-3">
                      <div class="form-group">
                        <label>Data Inicial</label>
                        <input class="form-control form-control-sm data" name="datac" value="<?= formataData($tarefa->datac) ?>">
                      </div>
                    </div>
                    <div class="col-md-3">
                      <div class="form-group">
                        <label>Data Final</label>
                        <input class="form-control form-control-sm data" name="data_venc" value="<?= formataData($tarefa->data_venc) ?>">
                      </div>
                    </div>
                    <div class="col-md-4">
                      <div class="form-group">
                        <label>Tipo de Atividade</label>
                        <?= $objTipoAtividade->montaSelect('nome_abrev', $tarefa->tipo_atividade_id); ?>
                      </div>
                    </div>
                    <div class="col-md-4">
                      <div class="form-group">
                        <label>Gabarito</label>
                        <input class="form-control form-control-sm " name="gabarito" type="text" value="<?= $tarefa->gabarito ?>">
                      </div>
                    </div>
                    <div class="col-md-2">
                      <div class="form-check">
                        <br><br>
                        <input type="checkbox" class="form-check-input" id="exampleCheck1" name="finalizado" <?php echo $tarefa->finalizado === '1' ? 'checked' : ''; ?>>
                        <label class="form-check-label" for="exampleCheck1">Finalizado</label>
                      </div>
                    </div>
                    <div class="col-md-12">
                      <div class="form-group">
                        <label>Observação</label>
                        <input class="form-control form-control-sm " name="observacao" type="text" value="<?= $tarefa->gabarito ?>">
                      </div>
                    </div>
                  </div>
                </div> <!-- /.card-body -->
                <div class="card-footer">
                  <button type="submit" class="btn btn-danger">Excluir</button>
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