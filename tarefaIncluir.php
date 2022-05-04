<?php
require_once './header.php';
// ["semestre_id"]=> string(1) "2" 
// ["materia_id"]=> string(1) "1" 
// ["datac"]=> string(10) "04/05/2022" 
// ["data_venc"]=> string(10) "31/05/2022" 
// ["nome_abrev"]=> string(4) "AAP1" 
// ["gabarito"]=> string(0) "" 
// ["finalizado"]=> string(2) "on" 
// ["Observação"]=> string(0) "" 
if ($_POST) {
  if (isset($_POST['semestre_id']) && isset($_POST['materia_id']) && isset($_POST['nome_abrev'])) {
    $semestreId = $_POST['semestre_id'];
    $materiaId = $_POST['materia_id'];
    $datac = $_POST['datac'];
    $data_venc = $_POST['data_venc'];
    $nomeAbrev = $_POST['nome_abrev'];
    $gabarito = $_POST['gabarito'];
    $finalizado = (isset($_POST['finalizado']) ? "TRUE" : "FALSE");
    $observacao = $_POST['observacao'];
  }
}

// if (isset($_POST['nome'])) {
//   $nome = $_POST['nome'];
//   $cnpj = $_POST['cgc'];
//   $fone1 = $_POST['fone1'];
//   $fone2 = $_POST['fone2'];
//   $email = $_POST['email'];
//   $contato = '';
//   $ret = $objClientes->insert($nome, $cnpj, $fone1, $fone2, $email, $contato);
// }
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
              <h3 class="card-title">Cadastrar Tarefa</h3>
            </div> <!-- /.card-header -->
            <!-- form start -->
            <form method="post">
              <div class="card-body">
                <div class="row">
                  <div class="col-md-2">
                    <div class="form-group">
                      <label>Semestre</label>
                      <?= $objSemestre->montaSelect('semestre_id'); ?>
                    </div>
                  </div>
                  <div class="col-md-4">
                    <div class="form-group">
                      <label>Matéria</label>
                      <?= $objMateria->montaSelect('materia_id'); ?>
                    </div>
                  </div>
                  <div class="col-md-3">
                    <div class="form-group">
                      <label>Data Inicial</label>
                      <input class="form-control form-control-sm data" name="datac" value="<?php echo date('d/m/Y') ?>">
                    </div>
                  </div>
                  <div class="col-md-3">
                    <div class="form-group">
                      <label>Data Final</label>
                      <input class="form-control form-control-sm data" name="data_venc">
                    </div>
                  </div>
                  <div class="col-md-4">
                    <div class="form-group">
                      <label>Atividade</label>
                      <?= $objTipoAtividade->montaSelect('nome_abrev'); ?>
                    </div>
                  </div>
                  <div class="col-md-4">
                    <div class="form-group">
                      <label>Gabarito</label>
                      <input class="form-control form-control-sm " name="gabarito" type="text">
                    </div>
                  </div>
                  <div class="col-md-2">
                    <div class="form-check">
                      <br><br>
                      <input type="checkbox" class="form-check-input" id="exampleCheck1" name="finalizado">
                      <label class="form-check-label" for="exampleCheck1">Finalizado</label>
                    </div>
                  </div>
                  <div class="col-md-12">
                    <div class="form-group">
                      <label>Observação</label>
                      <input class="form-control form-control-sm " name="Observação" type="text">
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